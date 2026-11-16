<?php

namespace App\Console\Commands;

use DateTimeImmutable;
use DateTimeInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;

class ImportGoldHistoricalData extends Command
{
    protected $signature = 'gold:import-historical-data
                            {--dry-run : Hanya memeriksa data tanpa menyimpan ke database}';

    protected $description = 'Import data historis gold dari file Excel';

    public function handle(): int
    {
        $filePath = storage_path('app/imports/Historical Data Gold.xlsx');

        if (!file_exists($filePath)) {
            $this->error('File Excel tidak ditemukan: ' . $filePath);
            return self::FAILURE;
        }

        $this->info('Membaca file Excel...');

        $spreadsheet = IOFactory::load($filePath);

        $years = range(2015, 2026);
        $importData = [];
        $skipped = 0;

        foreach ($years as $year) {
            $sheet = $spreadsheet->getSheetByName((string) $year);

            if (!$sheet) {
                $this->warn("Sheet {$year} tidak ditemukan.");
                continue;
            }

            $this->info("Memeriksa sheet {$year}...");

            $rows = $sheet->toArray(null, true, true, true);

            $headerRow = null;

            // Cari baris judul kolom Date di kolom B
            foreach ($rows as $rowNumber => $row) {
                if (strtolower(trim((string) ($row['B'] ?? ''))) === 'date') {
                    $headerRow = $rowNumber;
                    break;
                }
            }

            if ($headerRow === null) {
                $this->warn("Header Date tidak ditemukan pada sheet {$year}.");
                continue;
            }

            // B = Date, C = Open, D = High, E = Low, F = Close
            foreach ($rows as $rowNumber => $row) {
                if ($rowNumber <= $headerRow) {
                    continue;
                }

                $tanggal = $this->parseExcelDate(
                    $row['B'] ?? null,
                    (int) $year
                );

                $open  = $this->parseNumber($row['C'] ?? null);
                $high  = $this->parseNumber($row['D'] ?? null);
                $low   = $this->parseNumber($row['E'] ?? null);
                $close = $this->parseNumber($row['F'] ?? null);

                // Lewati tanggal kosong, hari libur, dan harga tidak lengkap
                if (
                    !$tanggal ||
                    $open === null ||
                    $high === null ||
                    $low === null ||
                    $close === null
                ) {
                    $skipped++;
                    continue;
                }

                $importData[] = [
                    'tanggal'    => $tanggal,
                    'category'   => 'LGD Daily',
                    'open'       => $open,
                    'high'       => $high,
                    'low'        => $low,
                    'close'      => $close,
                    'source'     => 'excel',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        if (empty($importData)) {
            $this->warn('Tidak ada data valid yang ditemukan.');
            return self::SUCCESS;
        }

        $dates = array_column($importData, 'tanggal');
        sort($dates);

        $this->newLine();
        $this->info('Hasil pemeriksaan data:');
        $this->line('Data valid: ' . count($importData));
        $this->line('Baris dilewati: ' . $skipped);
        $this->line('Tanggal pertama: ' . $dates[0]);
        $this->line('Tanggal terakhir: ' . end($dates));

        if ($this->option('dry-run')) {
            $this->warn('Mode dry-run: data belum disimpan ke database.');
            return self::SUCCESS;
        }

        foreach (array_chunk($importData, 500) as $batch) {
            DB::table('gold_historical_data')->upsert(
                $batch,
                ['tanggal', 'category'],
                ['open', 'high', 'low', 'close', 'source', 'updated_at']
            );
        }

        $this->newLine();
        $this->info('Import data LGD Daily berhasil diselesaikan.');

        return self::SUCCESS;
    }

    private function parseExcelDate($value, int $year): ?string
    {
        if ($value instanceof DateTimeInterface) {
            return $value->format('Y-m-d');
        }

        if (is_numeric($value)) {
            try {
                return ExcelDate::excelToDateTimeObject((float) $value)
                    ->format('Y-m-d');
            } catch (\Throwable $e) {
                return null;
            }
        }

        $value = trim((string) $value);

        // Format tanggal berbeda berdasarkan tahun sheet
        $formats = $year <= 2019
            ? ['n/j/Y', 'n/j/y', 'm/d/Y', 'm/d/y']
            : ['j/n/Y', 'j/n/y', 'd/m/Y', 'd/m/y'];

        foreach ($formats as $format) {
            $date = DateTimeImmutable::createFromFormat(
                '!' . $format,
                $value
            );

            if ($date && $date->format($format) === $value) {
                return $date->format('Y-m-d');
            }
        }

        return null;
    }

    private function parseNumber($value): ?float
    {
        if ($value === null || trim((string) $value) === '') {
            return null;
        }

        if (!is_numeric($value)) {
            return null;
        }

        $number = (float) $value;

        return is_finite($number) ? $number : null;
    }
}
