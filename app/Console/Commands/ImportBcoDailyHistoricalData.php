<?php

namespace App\Console\Commands;

use DateTimeInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;

class ImportBcoDailyHistoricalData extends Command
{
    protected $signature = 'bco:import-historical-data {--dry-run}';

    protected $description = 'Import data historis BCO Daily dari Excel';

    public function handle(): int
    {
        $path = storage_path('app/imports/Historical Data Crude Oil.xlsx');

        if (!file_exists($path)) {
            $this->error('File Excel Crude Oil tidak ditemukan.');
            return self::FAILURE;
        }

        $this->info('Membaca file Excel BCO Daily...');

        $spreadsheet = IOFactory::load($path);
        $records = [];

        $allSheet = $spreadsheet->getSheetByName('ALL');
        $sheet2025 = $spreadsheet->getSheetByName('2025');

        if (!$allSheet || !$sheet2025) {
            $this->error('Sheet ALL atau 2025 tidak ditemukan.');
            return self::FAILURE;
        }

        // ALL: kolom A = Date, B-E = OHLC.
        $this->readSheet(
            $allSheet,
            'ALL',
            1,
            2,
            '2019-01-01',
            '2024-12-31',
            $records
        );

        // 2025: kolom B = Date, C-F = OHLC.
        $this->readSheet(
            $sheet2025,
            '2025',
            2,
            3,
            '2025-01-01',
            '2025-09-30',
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
        $this->info('HASIL PEMERIKSAAN DATA BCO DAILY');

        $this->line('Jumlah data   : ' . count($records));
        $this->line('Tanggal awal  : ' . array_key_first($records));
        $this->line('Tanggal akhir : ' . array_key_last($records));

        if ($this->option('dry-run')) {
            $this->warn('DRY RUN: Data belum disimpan ke database.');
            return self::SUCCESS;
        }

        // Simpan data ke database.
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

            $inserted += DB::table('bco_daily_historical_data')
                ->insertOrIgnore($rows);
        }

        $this->newLine();
        $this->info("Import selesai. Data baru dimasukkan: {$inserted}");

        return self::SUCCESS;
    }

    private function readSheet(
        $sheet,
        string $sheetName,
        int $dateColumn,
        int $firstOhlcColumn,
        string $startDate,
        string $endDate,
        array &$records
    ): void {
        $this->info("Memeriksa sheet {$sheetName}...");

        for ($row = 2; $row <= $sheet->getHighestRow(); $row++) {
            $dateColumnLetter =
                \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(
                    $dateColumn
                );

            $dateValue = $sheet->getCell(
                $dateColumnLetter . $row
            )->getValue();

            $date = $this->parseDate($dateValue);

            if (!$date || $date < $startDate || $date > $endDate) {
                continue;
            }

            $open = $sheet->getCell(
                \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(
                    $firstOhlcColumn
                ) . $row
            )->getValue();

            $high = $sheet->getCell(
                \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(
                    $firstOhlcColumn + 1
                ) . $row
            )->getValue();

            $low = $sheet->getCell(
                \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(
                    $firstOhlcColumn + 2
                ) . $row
            )->getValue();

            $close = $sheet->getCell(
                \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex(
                    $firstOhlcColumn + 3
                ) . $row
            )->getValue();

            // Lewati hari libur dan data OHLC tidak valid.
            if (
                !is_numeric($open) ||
                !is_numeric($high) ||
                !is_numeric($low) ||
                !is_numeric($close)
            ) {
                continue;
            }

            // Hindari tanggal duplikat.
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

        foreach (['Y-m-d', 'm/d/Y', 'n/j/Y', 'd/m/Y'] as $format) {
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
