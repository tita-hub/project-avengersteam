<?php

namespace App\Console\Commands;

use App\Services\NewsmakerService;
use Illuminate\Console\Command;

class SyncNews extends Command
{
    protected $signature = 'news:sync {--limit=12 : Jumlah berita yang diambil}';
    protected $description = 'Mengambil berita terbaru dari Newsmaker.id';

    public function handle(NewsmakerService $service): int
    {
        try {
            $count = $service->sync((int) $this->option('limit'));
            $this->info("{$count} berita berhasil disinkronkan.");
            return self::SUCCESS;
        } catch (\Throwable $e) {
            report($e);
            $this->error('Gagal mengambil berita: ' . $e->getMessage());
            return self::FAILURE;
        }
    }
}
