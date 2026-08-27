<?php

namespace App\Console\Commands;

use App\Services\NewsmakerService;
use Illuminate\Console\Command;

class SyncNewsMaker extends Command
{
    protected $signature = 'news:sync {--limit=12} {--debug : Tampilkan laporan diagnosa tanpa menyimpan ke database}';
    protected $description = 'Ambil berita terbaru dari Newsmaker.id dan simpan ke database';

    public function handle(NewsmakerService $service): int
    {
        if ($this->option('debug')) {
            $report = $service->diagnose();

            $this->info('=== Laporan diagnosa Newsmaker ===');
            foreach ($report as $key => $value) {
                $this->line(str_pad($key, 26) . ': ' . (is_bool($value) ? ($value ? 'true' : 'false') : $value));
            }

            return self::SUCCESS;
        }

        $saved = $service->sync((int) $this->option('limit'));
        $this->info("Newsmaker sync selesai. {$saved} artikel diperbarui.");
        return self::SUCCESS;
    }
}