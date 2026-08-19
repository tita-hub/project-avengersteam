<?php

namespace App\Services;

use App\Models\News;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class NewsmakerService
{
    private const LATEST_URL = 'https://www.newsmaker.id/index.php/id/latest-news';

    public function sync(int $limit = 12): int
    {
        $html = $this->get(self::LATEST_URL)->body();
        $items = $this->parseLatest($html, $limit);
        $saved = 0;

        foreach ($items as $item) {
            $detail = $this->fetchDetail($item['url']);
            $title = $detail['title'] ?: $item['title'];

            News::updateOrCreate(
                ['external_url' => $item['url']],
                [
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'category' => $item['category'] ?: ($detail['category'] ?: 'NEWS'),
                    'excerpt' => $detail['excerpt'] ?: $item['excerpt'],
                    'content' => $detail['content'] ?: '<p>' . e($detail['excerpt'] ?: $item['excerpt']) . '</p>',
                    'image_url' => $detail['image_url'] ?: $item['image_url'],
                    'published_at' => $detail['published_at'] ?: $item['published_at'],
                    'source' => 'Newsmaker.id',
                ]
            );
            $saved++;
        }

        return $saved;
    }

    private function get(string $url): Response
    {
        return Http::timeout(20)
            ->connectTimeout(10)
            ->withHeaders([
                'User-Agent' => 'Avengersteam News Dashboard/1.0',
                'Accept-Language' => 'id-ID,id;q=0.9,en;q=0.8',
            ])
            ->get($url)
            ->throw();
    }

    private function parseLatest(string $html, int $limit): array
    {
        preg_match_all('/<a\b[^>]*href=["\']([^"\']+)["\'][^>]*>(.*?)<\/a>/is', $html, $matches, PREG_SET_ORDER);
        $items = [];
        $seen = [];

        foreach ($matches as $match) {
            $url = $this->absoluteUrl(html_entity_decode($match[1], ENT_QUOTES | ENT_HTML5, 'UTF-8'));
            $title = $this->clean(strip_tags($match[2]));
            if (!$this->isArticleUrl($url) || !$this->isLikelyTitle($title) || isset($seen[$url])) continue;

            $position = strpos($html, $match[0]);
            $context = $position === false ? '' : substr($html, max(0, $position - 1800), 3600);
            $contextText = $this->clean(strip_tags($context));
            $date = $this->extractDate($contextText);
            $hasReadMore = Str::contains(Str::lower($contextText), 'read more');
            if (!$date && !$hasReadMore) continue;

            $seen[$url] = true;
            $items[] = [
                'title' => $title,
                'url' => $url,
                'category' => $this->extractCategory($contextText),
                'excerpt' => $this->makeExcerpt($contextText, $title),
                'image_url' => $this->extractImage($context),
                'published_at' => $date,
            ];

            if (count($items) >= $limit) break;
        }

        return $items;
    }

    private function fetchDetail(string $url): array
    {
        try {
            $html = $this->get($url)->body();
            $title = $this->meta($html, 'og:title') ?: $this->firstTagText($html, 'h1');
            $description = $this->meta($html, 'og:description') ?: $this->metaName($html, 'description');
            $image = $this->meta($html, 'og:image');
            $published = $this->meta($html, 'article:published_time');
            $category = $this->meta($html, 'article:section');
            $content = $this->extractParagraphs($html);

            return [
                'title' => $this->clean($title),
                'excerpt' => $this->clean($description),
                'content' => $content,
                'image_url' => $this->absoluteUrl($image),
                'published_at' => $this->parseDate($published),
                'category' => $this->clean($category),
            ];
        } catch (\Throwable) {
            return ['title' => '', 'excerpt' => '', 'content' => '', 'image_url' => '', 'published_at' => null, 'category' => ''];
        }
    }

    private function extractParagraphs(string $html): string
    {
        preg_match_all('/<p\b[^>]*>(.*?)<\/p>/is', $html, $matches);
        $paragraphs = [];
        foreach ($matches[1] ?? [] as $raw) {
            $text = $this->clean(strip_tags($raw));
            if (strlen($text) < 55) continue;
            if (Str::contains(Str::lower($text), ['disclaimer', 'support@newsmaker.id', 'all rights reserved'])) continue;
            $paragraphs[] = '<p>' . e($text) . '</p>';
        }
        return implode("\n", array_slice($paragraphs, 0, 35));
    }

    private function extractImage(string $html): string
    {
        if (preg_match('/<img\b[^>]+(?:src|data-src)=["\']([^"\']+)["\']/i', $html, $m)) {
            return $this->absoluteUrl(html_entity_decode($m[1], ENT_QUOTES | ENT_HTML5, 'UTF-8'));
        }
        return '';
    }

    private function extractCategory(string $text): string
    {
        $upper = Str::upper($text);
        foreach (['GOLD', 'OIL', 'HONGKONG', 'JAPAN', 'GLOBAL', 'CRYPTO', 'MARKET UPDATE', 'MARKET ANALISYS', 'US DOLLAR', 'SILVER'] as $category) {
            if (Str::contains($upper, $category)) return $category;
        }
        return 'NEWS';
    }

    private function extractDate(string $text): ?Carbon
    {
        if (preg_match('/(\d{1,2}\s+[A-Za-z]+\s+\d{4}\s+\d{1,2}:\d{2})/u', $text, $m)) return $this->parseDate($m[1]);
        return null;
    }

    private function parseDate(?string $value): ?Carbon
    {
        if (!$value) return null;
        try { return Carbon::parse($value); } catch (\Throwable) { return null; }
    }

    private function makeExcerpt(string $text, string $title): string
    {
        $text = Str::replaceFirst($title, '', $text);
        $text = preg_replace('/\d{1,2}\s+[A-Za-z]+\s+\d{4}\s+\d{1,2}:\d{2}/u', '', $text) ?? $text;
        $text = preg_replace('/\bRead More\b/i', '', $text) ?? $text;
        return Str::limit($this->clean($text), 220);
    }

    private function isArticleUrl(string $url): bool
    {
        if (!Str::startsWith($url, 'https://www.newsmaker.id/index.php/id/')) return false;
        $path = parse_url($url, PHP_URL_PATH) ?: '';
        if (Str::endsWith($path, ['/latest-news', '/'])) return false;
        if (Str::contains($url, ['?start=', '&start=', '#'])) return false;
        return true;
    }

    private function isLikelyTitle(string $title): bool
    {
        return strlen($title) >= 15 && strlen($title) <= 220
            && !in_array(Str::lower($title), ['read more', 'home', 'free download'], true)
            && !Str::contains(Str::lower($title), ['facebook', 'twitter', 'instagram', 'whatsapp']);
    }

    private function meta(string $html, string $property): string
    {
        if (preg_match('/<meta\b[^>]*property=["\']' . preg_quote($property, '/') . '["\'][^>]*content=["\']([^"\']*)["\']/i', $html, $m)) return html_entity_decode($m[1], ENT_QUOTES | ENT_HTML5, 'UTF-8');
        if (preg_match('/<meta\b[^>]*content=["\']([^"\']*)["\'][^>]*property=["\']' . preg_quote($property, '/') . '["\']/i', $html, $m)) return html_entity_decode($m[1], ENT_QUOTES | ENT_HTML5, 'UTF-8');
        return '';
    }

    private function metaName(string $html, string $name): string
    {
        if (preg_match('/<meta\b[^>]*name=["\']' . preg_quote($name, '/') . '["\'][^>]*content=["\']([^"\']*)["\']/i', $html, $m)) return html_entity_decode($m[1], ENT_QUOTES | ENT_HTML5, 'UTF-8');
        return '';
    }

    private function firstTagText(string $html, string $tag): string
    {
        if (preg_match('/<' . $tag . '\b[^>]*>(.*?)<\/' . $tag . '>/is', $html, $m)) return $this->clean(strip_tags($m[1]));
        return '';
    }

    private function clean(?string $text): string
    {
        $text = html_entity_decode($text ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8');
        return trim(preg_replace('/\s+/u', ' ', $text) ?? '');
    }

    private function absoluteUrl(?string $url): string
    {
        if (!$url) return '';
        if (Str::startsWith($url, '//')) return 'https:' . $url;
        if (Str::startsWith($url, ['http://', 'https://'])) return $url;
        return 'https://www.newsmaker.id/' . ltrim($url, '/');
    }
}
