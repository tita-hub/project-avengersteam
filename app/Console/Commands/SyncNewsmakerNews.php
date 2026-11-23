<?php

namespace App\Console\Commands;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SyncNewsmakerNews extends Command
{
    protected $signature = 'news:sync-newsmaker {--limit=20}';
    protected $description = 'Ambil berita terbaru dari beranda newsmaker.id';

    private const BASE = 'https://www.newsmaker.id';
    private const LINK_RE = '#^(?:https?://(?:www\.)?newsmaker\.id)?(/id/[a-z0-9\-/]+/\d{8}-[a-z0-9\-]+)/?$#i';
    private const MONTHS = [
        'jan' => 1, 'feb' => 2, 'mar' => 3, 'apr' => 4, 'mei' => 5, 'may' => 5,
        'jun' => 6, 'jul' => 7, 'agu' => 8, 'aug' => 8, 'sep' => 9,
        'okt' => 10, 'oct' => 10, 'nov' => 11, 'des' => 12, 'dec' => 12,
    ];
    private const BAD_TITLES = ['baca lainnya', 'read more', 'baca analisis lengkap', 'baca selengkapnya'];

    public function handle(): int
    {
        $res = Http::withHeaders(['User-Agent' => 'Mozilla/5.0 (compatible; RifanSemarangNewsSync/1.0)'])
            ->timeout(25)
            ->retry(2, 500)
            ->get(self::BASE . '/id');

        if (! $res->successful()) {
            $this->error('Gagal membuka newsmaker.id (HTTP ' . $res->status() . ')');
            return self::FAILURE;
        }

        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
        $dom->loadHTML('<?xml encoding="UTF-8">' . $res->body());
        libxml_clear_errors();
        $xp = new \DOMXPath($dom);

        $cards = [];

        $links = $xp->query('//a[@href]');

        if ($links === false) {
            $this->error('Gagal membaca tautan berita.');
            return self::FAILURE;
        }

        foreach ($links as $link) {

            if (! $link instanceof \DOMElement) {
                continue;
            }

            /** @var \DOMElement $a */
            $a = $link;

            $hrefNode = $a->attributes->getNamedItem('href');
            $href = $hrefNode?->nodeValue;

            if (! is_string($href)) {
                continue;
            }

            $path = $this->articlePath($href);

            if (! $path) {
                continue;
            }

            $scope = $this->cardScope($a, $xp);
            $card  = $this->extract($scope, $xp, $path, $a);

            if (! $card) {
                continue;
            }

            // Satu artikel bisa muncul di beberapa tempat; simpan versi paling lengkap.
            $score = ($card['image'] ? 2 : 0) + ($card['has_date'] ? 1 : 0);
            if (! isset($cards[$path]) || $score > $cards[$path]['score']) {
                $card['score'] = $score;
                $cards[$path]  = $card;
            }
        }

        if (empty($cards)) {
            $this->warn('Tidak ada berita yang bisa dibaca. Struktur halaman mungkin berubah.');
            return self::FAILURE;
        }

        $items = collect($cards)
            ->sortByDesc(fn ($c) => $c['published_at']->timestamp)
            ->take((int) $this->option('limit'));

        $saved = 0;

        foreach ($items as $path => $c) {
            try {
                News::updateOrCreate(
                    ['external_url' => self::BASE . $path],
                    [
                        'title'        => Str::limit($c['title'], 250, ''),
                        'slug'         => basename($path),
                        'excerpt'      => $c['category'] . ' - Sumber: Newsmaker.id',
                        'image_url'    => $c['image'],
                        'category'     => $c['category'],
                        'source'       => 'Newsmaker.id',
                        'published_at' => $c['published_at'],
                    ]
                );
                $saved++;
                $this->line('+ ' . $c['published_at']->format('d M H:i') . ' | ' . $c['category'] . ' | ' . Str::limit($c['title'], 60));
            } catch (\Throwable $e) {
                $this->warn('Gagal simpan ' . $path . ': ' . $e->getMessage());
            }
        }

        $this->info("Selesai. {$saved} berita disinkronkan.");
        return self::SUCCESS;
    }

    private function articlePath(string $href): ?string
    {
        return preg_match(self::LINK_RE, trim($href), $m) ? $m[1] : null;
    }

    private function pathsIn(\DOMNode $node, \DOMXPath $xp): array
    {
        $paths = [];

        // Ambil atribut href secara langsung melalui XPath
        $links = $xp->query('.//a/@href', $node);

        if ($links === false) {
            return [];
        }

        foreach ($links as $link) {
            $href = $link->nodeValue;

            if (! is_string($href)) {
                continue;
            }

            $path = $this->articlePath($href);

            if ($path !== null) {
                $paths[$path] = true;
            }
        }

        return array_keys($paths);
    }

    // Naik ke elemen induk terbesar yang masih hanya berisi SATU artikel (= satu kartu).
    private function cardScope(\DOMElement $a, \DOMXPath $xp): \DOMNode
    {
        $scope = $a;
        $node  = $a->parentNode;

        for ($i = 0; $i < 8 && $node instanceof \DOMElement; $i++) {
            if (count($this->pathsIn($node, $xp)) > 1) break;
            $scope = $node;
            $node  = $node->parentNode;
        }

        return $scope;
    }

    private function extract(\DOMNode $scope, \DOMXPath $xp, string $path, \DOMElement $a): ?array
    {
        $q    = fn (string $expr) => $xp->query($expr, $scope);
        $text = fn (?\DOMNode $n) => $n ? trim(preg_replace('/\s+/u', ' ', $n->textContent)) : null;

        // Judul
        $img = $q('.//img[@src]')->item(0);

        if (! $img instanceof \DOMElement) {
            $img = null;
        }

        $title = $text($q('.//p[contains(@class,"line-clamp")]')->item(0));

        if (! $title && $img) {
            $title = trim($img->getAttribute('alt'));
        }
        if (! $title) $title = $text($q('.//h1|.//h2|.//h3')->item(0));
        if (! $title) $title = $text($a);

        if (! $title || mb_strlen($title) < 8 || in_array(Str::lower($title), self::BAD_TITLES, true)) {
            return null;
        }

        // Gambar (tag <img> atau background-image)
        $image = $img ? $img->getAttribute('src') : null;
        if (! $image) {
            foreach ($q('.//*[@style]') as $el) {
                if (! $el instanceof \DOMElement) {
                    continue;
                }

                if (preg_match('/url\(\s*[\'"]?([^\'")]+)/', $el->getAttribute('style'), $m)) {
                    $image = $m[1];
                    break;
                }
            }
        }
        if ($image && str_starts_with($image, '/')) $image = self::BASE . $image;
        if ($image && str_contains($image, 'placeholder.com')) $image = null;

        // Kategori
        $category = $text($q('.//p[contains(@class,"uppercase")]')->item(0))
            ?: $text($q('.//p[contains(@class,"tracking-wide")]')->item(0));
        if (! $category) {
            $seg      = explode('/', trim($path, '/'));
            $category = Str::upper(str_replace('-', ' ', $seg[count($seg) - 2] ?? 'NEWS'));
        }

        // Tanggal: "19 Nov 2026 - 09.55" (WIB)
        $publishedAt = null;
        $hasDate     = false;

        if (preg_match('/(\d{1,2})\s+([A-Za-z]{3,})\s+(\d{4})\s*-\s*(\d{1,2})[.:](\d{2})/u', (string) $text($scope), $m)) {
            $mon = self::MONTHS[strtolower(substr($m[2], 0, 3))] ?? null;
            if ($mon) {
                $publishedAt = Carbon::create((int) $m[3], $mon, (int) $m[1], (int) $m[4], (int) $m[5], 0, 'Asia/Jakarta');
                $hasDate     = true;
            }
        }
        if (! $publishedAt && preg_match('#/(\d{2})(\d{2})(\d{4})-#', $path, $m)) {
            $publishedAt = Carbon::create((int) $m[3], (int) $m[2], (int) $m[1], 0, 0, 0, 'Asia/Jakarta');
        }
        if (! $publishedAt) return null;

        return [
            'title'        => $title,
            'image'        => $image,
            'category'     => $category,
            'published_at' => $publishedAt,
            'has_date'     => $hasDate,
        ];
    }
}
