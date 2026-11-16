<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use DateTimeInterface;

class ImportNikkeiHistoricalData extends Command
{
    protected $signature = 'nikkei:import-historical-data {--dry-run}';

    protected $description = 'Import data historis SNI Daily dari Excel';

    public function handle(): int
    {
        $path = storage_path('app/imports/Historical Data Nikkei.xlsx');

        if (!file_exists($path)) {
            $this->error('File Excel Nikkei tidak ditemukan.');
            return self::FAILURE;
        }

        $spreadsheet = IOFactory::load($path);

        // Menampung data berdasarkan tanggal agar tidak duplikat.
        $records = [];

        // ALL hanya digunakan untuk tahun 2015 dan 2016.
        $allSheet = $spreadsheet->getSheetByName('ALL');

        if (!$allSheet) {
            $this->error('Sheet ALL tidak ditemukan.');
            return self::FAILURE;
        }

        $this->readSheet(
            $allSheet,
            3,
            'ALL',
            $records
        );

        // Sheet tahunan 2017 sampai 2025.
        for ($year = 2017; $year <= 2025; $year++) {
            $sheet = $spreadsheet->getSheetByName((string) $year);

            if (!$sheet) {
                $this->warn("Sheet {$year} tidak ditemukan.");
                continue;
            }

            $this->readSheet(
                $sheet,
                4,
                (string) $year,
                $records
            );
        }

        ksort($records);

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

        $count = count($records);

        if ($count === 0) {
            $this->error('Tidak ada data valid yang ditemukan.');
            return self::FAILURE;
        }

        $this->newLine();
        $this->info('HASIL PEMERIKSAAN DATA NIKKEI');
        $this->line('Kategori       : SNI Daily');
        $this->line('Jumlah data    : ' . $count);
        $this->line('Tanggal awal   : ' . array_key_first($records));
        $this->line('Tanggal akhir  : ' . array_key_last($records));

        if ($this->option('dry-run')) {
            $this->warn('DRY RUN: Data belum dimasukkan ke database.');
            return self::SUCCESS;
        }

        $now = now();
        $inserted = 0;

        foreach (array_chunk(array_values($records), 500) as $chunk) {
            $rows = [];

            foreach ($chunk as $record) {
                $rows[] = array_merge($record, [
                    'source' => 'excel',
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }

            // insertOrIgnore menjaga data API yang sudah ada.
            $inserted += DB::table('nikkei_historical_data')
                ->insertOrIgnore($rows);
        }

        $this->newLine();
        $this->info("Impor selesai. Data baru dimasukkan: {$inserted}");

        return self::SUCCESS;
    }

    private function readSheet(
        $sheet,
        int $startRow,
        string $sheetName,
        array &$records
    ): void {
        $lastRow = $sheet->getHighestRow();

        for ($row = $startRow; $row <= $lastRow; $row++) {
            $dateValue = $sheet->getCell("B{$row}")->getValue();

            $date = $this->parseDate($dateValue, $sheetName);

            if (!$date) {
                continue;
            }

            $year = (int) substr($date, 0, 4);

            // ALL hanya untuk 2015–2016.
            if ($sheetName === 'ALL' && !in_array($year, [2015, 2016])) {
                continue;
            }

            // Sheet tahunan harus sesuai dengan nama sheet.
            if ($sheetName !== 'ALL' && $year !== (int) $sheetName) {
                continue;
            }

            // Data 2025 hanya sampai 30 September.
            if ($date > '2025-09-30') {
                continue;
            }

            $open  = $sheet->getCell("C{$row}")->getValue();
            $high  = $sheet->getCell("D{$row}")->getValue();
            $low   = $sheet->getCell("E{$row}")->getValue();
            $close = $sheet->getCell("F{$row}")->getValue();

            // Baris libur atau OHLC tidak lengkap dilewati.
            if (
                !is_numeric($open) ||
                !is_numeric($high) ||
                !is_numeric($low) ||
                !is_numeric($close)
            ) {
                continue;
            }

            $records[$date] = [
                'tanggal' => $date,
                'category' => 'SNI Daily',
                'open' => $open,
                'high' => $high,
                'low' => $low,
                'close' => $close,
            ];
        }
    }

    private function parseDate($value, string $sheetName): ?string
    {
        if ($value instanceof DateTimeInterface) {
            return $value->format('Y-m-d');
        }

        if ($value === null || $value === '') {
            return null;
        }

        // Tanggal Excel berbentuk angka serial.
        if (is_numeric($value)) {
            try {
                return ExcelDate::excelToDateTimeObject((float) $value)
                    ->format('Y-m-d');
            } catch (\Throwable $e) {
                return null;
            }
        }

        $value = trim((string) $value);

        // ALL dan sheet 2017–2019 menggunakan M/D/YYYY.
        // Sheet 2020–2025 menggunakan DD/MM/YYYY.
        $formats = (
            $sheetName === 'ALL' ||
            in_array($sheetName, ['2017', '2018', '2019'])
        )
            ? ['!n/j/Y', '!m/d/Y', '!n/j/y', '!m/d/y']
            : ['!d/m/Y', '!j/n/Y', '!d/m/y', '!j/n/y'];

        foreach ($formats as $format) {
            $date = \DateTime::createFromFormat($format, $value);

            if ($date !== false) {
                $errors = \DateTime::getLastErrors();

                if (
                    $errors === false ||
                    ($errors['warning_count'] === 0 &&
                     $errors['error_count'] === 0)
                ) {
                    return $date->format('Y-m-d');
                }
            }
        }

        return null;
    }
}
