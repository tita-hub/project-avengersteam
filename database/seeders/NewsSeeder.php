<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['title' => 'RBA Tahan Suku Bunga 4,35%, Pasar Kini Menunggu Data Berikutnya', 'category' => 'GLOBAL', 'excerpt' => 'Reserve Bank of Australia mempertahankan cash rate di 4,35% dan pasar menunggu data ekonomi berikutnya.', 'image_url' => '', 'external_url' => 'https://www.newsmaker.id/demo/' . str()->slug('RBA Tahan Suku Bunga 4,35%, Pasar Kini Menunggu Data Berikutnya'), 'published_at' => now()->subMinutes(15)],
            ['title' => 'Emas Tembus Level Tertinggi Dua Bulan, CPI Jadi Perhatian', 'category' => 'GOLD', 'excerpt' => 'Harga emas melanjutkan penguatan untuk sesi keempat berturut-turut pada perdagangan Selasa dan pasar menanti data inflasi.', 'image_url' => '', 'external_url' => 'https://www.newsmaker.id/demo/' . str()->slug('Emas Tembus Level Tertinggi Dua Bulan, CPI Jadi Perhatian'), 'published_at' => now()->subMinutes(30)],
            ['title' => 'Trump\'s New Demands Keep Oil on Watch', 'category' => 'OIL', 'excerpt' => 'Harga minyak dunia mempertahankan kenaikan selama empat hari perdagangan terakhir.', 'image_url' => '', 'external_url' => 'https://www.newsmaker.id/demo/' . str()->slug("Trump's New Demands Keep Oil on Watch"), 'published_at' => now()->subMinutes(45)],
            ['title' => 'Trump Klaim AS Kuasai Hormuz, Tuntutan Ganti Rugi Muncul', 'category' => 'GLOBAL', 'excerpt' => 'Perkembangan geopolitik kembali menjadi perhatian pasar dan berpotensi memengaruhi sentimen risiko.', 'image_url' => '', 'external_url' => 'https://www.newsmaker.id/demo/' . str()->slug('Trump Klaim AS Kuasai Hormuz, Tuntutan Ganti Rugi Muncul'), 'published_at' => now()->subHour()],
            ['title' => 'Trump Tambah Tuntutan, Deal Iran Makin Jauh?', 'category' => 'GLOBAL', 'excerpt' => 'Pasar menilai perkembangan terbaru dapat memperkeras sikap terhadap Iran.', 'image_url' => '', 'external_url' => 'https://www.newsmaker.id/demo/' . str()->slug('Trump Tambah Tuntutan, Deal Iran Makin Jauh?'), 'published_at' => now()->subHours(2)],
            ['title' => 'Hang Seng Tertahan Jelang CPI AS', 'category' => 'HONGKONG', 'excerpt' => 'Indeks Hang Seng bergerak tipis saat investor menunggu data inflasi Amerika Serikat.', 'image_url' => '', 'external_url' => 'https://www.newsmaker.id/demo/' . str()->slug('Hang Seng Tertahan Jelang CPI AS'), 'published_at' => now()->subHours(3)],
        ];

        foreach ($items as $item) {
            News::updateOrCreate(['title' => $item['title']], $item + ['slug' => str()->slug($item['title']), 'content' => '<p>' . e($item['excerpt']) . '</p>', 'source' => 'Newsmaker.id']);
        }
    }
}
