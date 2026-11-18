<?php

namespace App\Console\Commands;

use DateTimeInterface;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportGbpUsdHistoricalData extends Command
{
    protected $signature = 'gbpusd:import-historical-data {--dry-run}';

    protected $description = 'Import data historis GBP/USD dari Excel';

    public function handle(): int
    {
        $path = storage_path('app/imports/Historical Data GBP.xlsx');

        if (!file_exists($path)) {
            $this->error('File Excel GBP/USD tidak ditemukan.');
            return self::FAILURE;
        }

        $this->info('Membaca file Excel GBP/USD...');

        $spreadsheet = IOFactory::load($path);

        $records = [];

        // ALL hanya digunakan untuk tahun 2015–2016.
        $allSheet = $spreadsheet->getSheetByName('ALL');

        if (!$allSheet) {
            $this->error('Sheet ALL tidak ditemukan.');
            return self::FAILURE;
        }

        $this->readSheet($allSheet, 'ALL', $records);

        // Sheet tahunan 2017–2024.
        foreach (range(2017, 2024) as $year) {
            $sheet = $spreadsheet->getSheetByName((string) $year);

            if (!$sheet) {
                $this->error("Sheet {$year} tidak ditemukan.");
                return self::FAILURE;
            }

            $this->readSheet($sheet, (string) $year, $records);
        }

        // Sheet 2025 hanya sampai 30 September 2025.
        $sheet2025 = $spreadsheet->getSheetByName('2025');

        if (!$sheet2025) {
            $this->error('Sheet 2025 tidak ditemukan.');
            return self::FAILURE;
        }

        $this->readSheet($sheet2025, '2025', $records);

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
        $this->info('HASIL PEMERIKSAAN DATA GBP/USD');

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

            $inserted += DB::table('gbp_usd_historical_data')
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

        // Variabel diagnostik.
        $validDateCount = 0;
        $validOhlcCount = 0;
        $duplicateCount = 0;
        $duplicateDates = [];
        $recordRows = [];

        $this->info("Memeriksa sheet {$sheetName}...");

        // Sheet ALL mulai dari baris 3.
        // Sheet tahunan mulai dari baris 4.
        $startRow = $sheetName === 'ALL' ? 3 : 4;

        for ($row = $startRow; $row <= $lastRow; $row++) {
            $dateValue = $sheet->getCell("B{$row}")->getValue();

            $date = $this->parseDate($dateValue, $sheetName);

            if (!$date) {
                continue;
            }

            $year = (int) substr($date, 0, 4);

            // ALL hanya untuk tahun 2015–2016.
            if (
                $sheetName === 'ALL' &&
                ($year < 2015 || $year > 2016)
            ) {
                continue;
            }

            // Sheet 2017–2024 hanya untuk tahunnya masing-masing.
            if (
                $sheetName !== 'ALL' &&
                $sheetName !== '2025' &&
                $year !== (int) $sheetName
            ) {
                continue;
            }

            // Sheet 2025 hanya sampai 30 September.
            if (
                $sheetName === '2025' &&
                (
                    $year !== 2025 ||
                    $date < '2025-01-01' ||
                    $date > '2025-09-30'
                )
            ) {
                continue;
            }

            // Menghitung tanggal dan tahun yang valid.
            $validDateCount++;

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

            // Menghitung data OHLC yang valid.
            $validOhlcCount++;

            // Jangan memasukkan tanggal yang sama dua kali.
            if (isset($records[$date])) {
                $duplicateCount++;

                $first = $records[$date];

                $duplicateDates[] =
                    "Tanggal: {$date}\n" .
                    "Baris pertama: {$recordRows[$date]}\n" .
                    "OHLC pertama: {$first['open']}, {$first['high']}, {$first['low']}, {$first['close']}\n" .
                    "Baris duplikat: {$row}\n" .
                    "OHLC duplikat: {$open}, {$high}, {$low}, {$close}";

                continue;
            }
            
            $records[$date] = [
                'tanggal' => $date,
                'open' => $open,
                'high' => $high,
                'low' => $low,
                'close' => $close,
            ];

            $recordRows[$date] = $row;
        }

        // Diagnostik khusus sheet ALL.
        if ($sheetName === 'ALL') {
            $this->newLine();
            $this->info('DIAGNOSTIK SHEET ALL');

            $this->line("Tanggal dan tahun valid : {$validDateCount}");
            $this->line("Data OHLC valid         : {$validOhlcCount}");
            $this->line("Tanggal duplikat        : {$duplicateCount}");

            foreach ($duplicateDates as $duplicate) {
                $this->warn($duplicate);
            }
        }
    }

    private function parseDate($value, string $sheetName): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }

        // Jika tanggal berupa objek DateTime.
        if ($value instanceof DateTimeInterface) {
            $date = \DateTimeImmutable::createFromInterface($value);
        }

        // Jika tanggal berupa angka serial Excel.
        elseif (is_numeric($value)) {
            try {
                $excelDate = ExcelDate::excelToDateTimeObject((float) $value);
                $date = \DateTimeImmutable::createFromMutable($excelDate);
            } catch (\Throwable $e) {
                return null;
            }
        }

        // Jika tanggal berupa teks.
        else {
            $value = trim((string) $value);

            if (
                $sheetName === 'ALL' ||
                in_array($sheetName, ['2017', '2018', '2019'], true)
            ) {
                $format = 'n/j/Y';
            } else {
                $format = 'd/m/Y';
            }

            $date = \DateTimeImmutable::createFromFormat(
                '!' . $format,
                $value
            );

            if (!$date || $date->format($format) !== $value) {
                return null;
            }
        }

        // Koreksi kesalahan tahun pada Januari 2025.
        if (
            $sheetName === '2025' &&
            $date->format('Y-m') === '2024-01'
        ) {
            $date = $date->setDate(
                2025,
                1,
                (int) $date->format('d')
            );
        }

        return $date->format('Y-m-d');
    }
}
