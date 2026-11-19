<?php

namespace App\Console\Commands;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SyncNewsmakerNews extends Command
{
    protected $signature = 'news:sync-newsmaker {--limit=15}';
    protected $description = 'Ambil berita terbaru dari newsmaker.id';

    private const BASE = 'https://www.newsmaker.id';

    public function handle(): int
    {
        $http = Http::withHeaders(['User-Agent' => 'RifanSemarangNewsSync/1.0'])
            ->timeout(20)
            ->retry(2, 500);

        $home = $http->get(self::BASE . '/id');

        if (! $home->successful()) {
            $this->error('Gagal membuka newsmaker.id (HTTP ' . $home->status() . ')');
            return self::FAILURE;
        }

        // Link artikel berpola: /id/<seksi>/.../19112026-judul-artikel
        preg_match_all(
            '#href=["\'](?:https?://(?:www\.)?newsmaker\.id)?(/id/[a-z0-9\-/]+/\d{8}-[a-z0-9\-]+)["\']#i',
            $home->body(),
            $m
        );

        $paths = collect($m[1])->unique()->take((int) $this->option('limit'));

        if ($paths->isEmpty()) {
            $this->warn('Tidak ada link artikel ditemukan. Struktur halaman mungkin berubah.');
            return self::FAILURE;
        }

        $saved = 0;

        foreach ($paths as $path) {
            $url = self::BASE . $path;

            try {
                $res = $http->get($url);
                if (! $res->successful()) continue;

                $html  = $res->body();
                $title = $this->meta($html, 'og:title');
                if (! $title) continue;

                // /id/news/commodity/oil/19112026-slug -> "OIL"
                $segments = explode('/', trim($path, '/'));
                $category = Str::upper(str_replace('-', ' ', $segments[count($segments) - 2] ?? 'NEWS'));

                $published = $this->meta($html, 'article:published_time');
                try {
                    $publishedAt = $published
                        ? Carbon::parse($published)->timezone('Asia/Jakarta')
                        : Carbon::createFromFormat('dmY', substr(basename($path), 0, 8), 'Asia/Jakarta')->startOfDay();
                } catch (\Throwable) {
                    $publishedAt = now();
                }

                News::updateOrCreate(
                    ['external_url' => $url],
                    [
                        'title'        => Str::limit($title, 250, ''),
                        'excerpt'      => Str::limit($this->meta($html, 'og:description') ?? '', 300),
                        'image_url'    => $this->meta($html, 'og:image'),
                        'category'     => $category,
                        'source'       => 'Newsmaker.id',
                        'published_at' => $publishedAt,
                    ]
                );

                $saved++;
            } catch (\Throwable $e) {
                $this->warn("Lewati {$url}: " . $e->getMessage());
            }
        }

        $this->info("Selesai. {$saved} berita disinkronkan.");
        return self::SUCCESS;
    }

    private function meta(string $html, string $prop): ?string
    {
        $p = preg_quote($prop, '#');

        $patterns = [
            '#<meta[^>]+(?:property|name)=["\']' . $p . '["\'][^>]*content=["\']([^"\']*)["\']#i',
            '#<meta[^>]+content=["\']([^"\']*)["\'][^>]*(?:property|name)=["\']' . $p . '["\']#i',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $html, $m)) {
                return trim(html_entity_decode($m[1], ENT_QUOTES | ENT_HTML5, 'UTF-8'));
            }
        }

        return null;
    }
}
