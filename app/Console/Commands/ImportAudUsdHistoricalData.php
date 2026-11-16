<?php

namespace App\Console\Commands;

use DateTimeInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;

class ImportAudUsdHistoricalData extends Command
{
    protected $signature = 'audusd:import-historical-data {--dry-run}';

    protected $description = 'Import data historis AUD/USD dari Excel';

    public function handle(): int
    {
        $path = storage_path('app/imports/Historical Data AUD.xlsx');

        if (!file_exists($path)) {
            $this->error('File Excel AUD/USD tidak ditemukan.');
            return self::FAILURE;
        }

        $this->info('Membaca file Excel AUD/USD...');

        $spreadsheet = IOFactory::load($path);

        $records = [];

        // ALL digunakan untuk tahun 2015 sampai 2024.
        $allSheet = $spreadsheet->getSheetByName('ALL');

        if (!$allSheet) {
            $this->error('Sheet ALL tidak ditemukan.');
            return self::FAILURE;
        }

        $this->readSheet(
            $allSheet,
            'ALL',
            $records
        );

        // Sheet 2025 digunakan sampai 30 September 2025.
        $sheet2025 = $spreadsheet->getSheetByName('2025');

        if (!$sheet2025) {
            $this->error('Sheet 2025 tidak ditemukan.');
            return self::FAILURE;
        }

        $this->readSheet(
            $sheet2025,
            '2025',
            $records
        );

        ksort($records);

        if (empty($records)) {
            $this->error('Tidak ada data valid yang ditemukan.');
            return self::FAILURE;
        }

        // Jumlah data per tahun.
        $yearCounts = [];

        foreach ($records as $record) {
            $year = substr($record['tanggal'], 0, 4);

            $yearCounts[$year] = ($yearCounts[$year] ?? 0) + 1;
        }

        $this->newLine();
        $this->info('JUMLAH DATA PER TAHUN');

        foreach ($yearCounts as $year => $total) {
            $this->line("{$year}: {$total} data");
        }

        $this->newLine();
        $this->info('HASIL PEMERIKSAAN DATA AUD/USD');

        $this->line('Jumlah data   : ' . count($records));
        $this->line('Tanggal awal  : ' . array_key_first($records));
        $this->line('Tanggal akhir : ' . array_key_last($records));

        if ($this->option('dry-run')) {
            $this->warn('DRY RUN: Data belum disimpan ke database.');
            return self::SUCCESS;
        }

        $now = now();
        $inserted = 0;

        foreach (array_chunk(array_values($records), 500) as $chunk) {
            $rows = [];

            foreach ($chunk as $record) {
                $rows[] = array_merge($record, [
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }

            $inserted += DB::table('aud_usd_historical_data')
                ->insertOrIgnore($rows);
        }

        $this->newLine();
        $this->info("Import selesai. Data baru dimasukkan: {$inserted}");

        return self::SUCCESS;
    }

    private function readSheet(
        $sheet,
        string $sheetName,
        array &$records
    ): void {
        $lastRow = $sheet->getHighestRow();

        $this->info("Memeriksa sheet {$sheetName}...");

        for ($row = 3; $row <= $lastRow; $row++) {
            $dateValue = $sheet->getCell("B{$row}")->getValue();

            $date = $this->parseDate($dateValue);

            if (!$date) {
                continue;
            }

            $year = (int) substr($date, 0, 4);

            // ALL hanya untuk tahun 2015 sampai 2024.
            if (
                $sheetName === 'ALL' &&
                ($year < 2015 || $year > 2024)
            ) {
                continue;
            }

            // Sheet 2025 hanya sampai 30 September.
            if (
                $sheetName === '2025' &&
                (
                    $year !== 2025 ||
                    $date > '2025-09-30'
                )
            ) {
                continue;
            }

            $open = $sheet->getCell("C{$row}")->getValue();
            $high = $sheet->getCell("D{$row}")->getValue();
            $low = $sheet->getCell("E{$row}")->getValue();
            $close = $sheet->getCell("F{$row}")->getValue();

            // Lewati hari libur dan data OHLC tidak lengkap.
            if (
                !is_numeric($open) ||
                !is_numeric($high) ||
                !is_numeric($low) ||
                !is_numeric($close)
            ) {
                continue;
            }

            // Simpan data pertama jika tanggal sudah pernah ditemukan.
            if (isset($records[$date])) {
                continue;
            }

            $records[$date] = [
                'tanggal' => $date,
                'open' => $open,
                'high' => $high,
                'low' => $low,
                'close' => $close,
            ];
        }
    }

    private function parseDate($value): ?string
    {
        if ($value instanceof DateTimeInterface) {
            return $value->format('Y-m-d');
        }

        if ($value === null || $value === '') {
            return null;
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

        $formats = [
            'n/j/Y',
            'n/j/y',
            'm/d/Y',
            'm/d/y',
            'j/n/Y',
            'j/n/y',
            'd/m/Y',
            'd/m/y',
        ];

        foreach ($formats as $format) {
            $date = \DateTimeImmutable::createFromFormat(
                '!' . $format,
                $value
            );

            if ($date && $date->format($format) === $value) {
                return $date->format('Y-m-d');
            }
        }

        return null;
    }
}
