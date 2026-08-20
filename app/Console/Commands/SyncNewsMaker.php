<?php

namespace App\Console\Commands;

use App\Services\NewsmakerService;
use Illuminate\Console\Command;

class SyncNewsMaker extends Command
{
    protected $signature = 'news:sync {--limit=12}';
    protected $description = 'Ambil berita terbaru dari Newsmaker.id dan simpan ke database';

    public function handle(NewsmakerService $service): int
    {
        $saved = $service->sync((int) $this->option('limit'));
        $this->info("Newsmaker sync selesai. {$saved} artikel diperbarui.");
        return self::SUCCESS;
    }
}