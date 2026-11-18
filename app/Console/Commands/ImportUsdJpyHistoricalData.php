<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;

class ImportUsdJpyHistoricalData extends Command
{
    protected $signature = 'usdjpy:import-historical-data
                            {--dry-run : Simulasi tanpa menyimpan data}';

    protected $description = 'Import data historis USD/JPY dari Excel';

    public function handle(): int
    {
        $filePath = storage_path('app/imports/Historical Data JPY.xlsx');

        if (!file_exists($filePath)) {
            $this->error('File Excel tidak ditemukan: ' . $filePath);
            return self::FAILURE;
        }

        $this->info('Membaca file Excel USD/JPY...');

        $spreadsheet = IOFactory::load($filePath);

        $data = [];

        $statistik = [
            'ALL' => 0,
            '2024' => 0,
            '2025' => 0,
            'tidak_lengkap' => 0,
            'duplikat' => 0,
        ];

        /*
        |--------------------------------------------------------------------------
        | Fungsi membaca data Excel
        |--------------------------------------------------------------------------
        */

        $bacaSheet = function ($sheet, $tahunMulai, $tahunAkhir) use (&$data, &$statistik) {

            for ($row = 1; $row <= $sheet->getHighestRow(); $row++) {

                $values = $sheet->rangeToArray(
                    "B{$row}:F{$row}",
                    null,
                    true,
                    false
                )[0];

                [$serial, $open, $high, $low, $close] = $values;

                // Lewati header dan baris tanpa tanggal
                if (!is_numeric($serial)) {
                    continue;
                }

                try {
                    $tanggal = ExcelDate::excelToDateTimeObject($serial)
                        ->format('Y-m-d');
                } catch (\Throwable $e) {
                    continue;
                }

                $tahun = (int) substr($tanggal, 0, 4);

                // Batasi tahun sesuai sumber
                if ($tahun < $tahunMulai || $tahun > $tahunAkhir) {
                    continue;
                }

                // Lewati tanggal di luar periode yang dibutuhkan
                if (
                    $tanggal < '2015-01-01' ||
                    $tanggal > '2025-09-30'
                ) {
                    continue;
                }

                // Pastikan semua OHLC berupa angka
                if (
                    !is_numeric($open) ||
                    !is_numeric($high) ||
                    !is_numeric($low) ||
                    !is_numeric($close)
                ) {
                    $statistik['tidak_lengkap']++;
                    continue;
                }

                // Hindari tanggal duplikat
                if (isset($data[$tanggal])) {
                    $statistik['duplikat']++;
                    continue;
                }

                $data[$tanggal] = [
                    'tanggal' => $tanggal,
                    'open' => (float) $open,
                    'high' => (float) $high,
                    'low' => (float) $low,
                    'close' => (float) $close,
                ];

                return;
            }
        };

        /*
        |--------------------------------------------------------------------------
        | 1. Sheet ALL: data 2015–2024
        |--------------------------------------------------------------------------
        */

        $sheetAll = $spreadsheet->getSheetByName('ALL');

        if (!$sheetAll) {
            $this->error('Sheet ALL tidak ditemukan.');
            return self::FAILURE;
        }

        $this->info('Membaca sheet ALL...');

        // Proses setiap baris, bukan hanya satu baris
        for ($row = 1; $row <= $sheetAll->getHighestRow(); $row++) {

            $values = $sheetAll->rangeToArray(
                "B{$row}:F{$row}",
                null,
                true,
                false
            )[0];

            [$serial, $open, $high, $low, $close] = $values;

            if (!is_numeric($serial)) {
                continue;
            }

            try {
                $tanggal = ExcelDate::excelToDateTimeObject($serial)
                    ->format('Y-m-d');
            } catch (\Throwable $e) {
                continue;
            }

            if (
                $tanggal < '2015-01-01' ||
                $tanggal > '2024-12-31'
            ) {
                continue;
            }

            if (
                !is_numeric($open) ||
                !is_numeric($high) ||
                !is_numeric($low) ||
                !is_numeric($close)
            ) {
                $statistik['tidak_lengkap']++;
                continue;
            }

            if (isset($data[$tanggal])) {
                $statistik['duplikat']++;
                continue;
            }

            $data[$tanggal] = [
                'tanggal' => $tanggal,
                'open' => (float) $open,
                'high' => (float) $high,
                'low' => (float) $low,
                'close' => (float) $close,
            ];

            $statistik['ALL']++;
        }

        /*
        |--------------------------------------------------------------------------
        | 2. Sheet 2024: tambahan tanggal yang belum ada
        |--------------------------------------------------------------------------
        */

        $sheet2024 = $spreadsheet->getSheetByName('2024');

        if (!$sheet2024) {
            $this->error('Sheet 2024 tidak ditemukan.');
            return self::FAILURE;
        }

        $this->info('Memeriksa tambahan data tahun 2024...');

        for ($row = 1; $row <= $sheet2024->getHighestRow(); $row++) {

            $values = $sheet2024->rangeToArray(
                "B{$row}:F{$row}",
                null,
                true,
                false
            )[0];

            [$serial, $open, $high, $low, $close] = $values;

            if (!is_numeric($serial)) {
                continue;
            }

            try {
                $tanggal = ExcelDate::excelToDateTimeObject($serial)
                    ->format('Y-m-d');
            } catch (\Throwable $e) {
                continue;
            }

            if (
                $tanggal < '2024-01-01' ||
                $tanggal > '2024-12-31'
            ) {
                continue;
            }

            if (
                !is_numeric($open) ||
                !is_numeric($high) ||
                !is_numeric($low) ||
                !is_numeric($close)
            ) {
                continue;
            }

            if (isset($data[$tanggal])) {
                $statistik['duplikat']++;
                continue;
            }

            $data[$tanggal] = [
                'tanggal' => $tanggal,
                'open' => (float) $open,
                'high' => (float) $high,
                'low' => (float) $low,
                'close' => (float) $close,
            ];

            $statistik['2024']++;
        }

        /*
        |--------------------------------------------------------------------------
        | 3. Sheet 2025: data sampai 30 September 2025
        |--------------------------------------------------------------------------
        */

        $sheet2025 = $spreadsheet->getSheetByName('2025');

        if (!$sheet2025) {
            $this->error('Sheet 2025 tidak ditemukan.');
            return self::FAILURE;
        }

        $this->info('Membaca sheet 2025...');

        for ($row = 1; $row <= $sheet2025->getHighestRow(); $row++) {

            $values = $sheet2025->rangeToArray(
                "B{$row}:F{$row}",
                null,
                true,
                false
            )[0];

            [$serial, $open, $high, $low, $close] = $values;

            if (!is_numeric($serial)) {
                continue;
            }

            try {
                $tanggal = ExcelDate::excelToDateTimeObject($serial)
                    ->format('Y-m-d');
            } catch (\Throwable $e) {
                continue;
            }

            if (
                $tanggal < '2025-01-01' ||
                $tanggal > '2025-09-30'
            ) {
                continue;
            }

            if (
                !is_numeric($open) ||
                !is_numeric($high) ||
                !is_numeric($low) ||
                !is_numeric($close)
            ) {
                $statistik['tidak_lengkap']++;
                continue;
            }

            if (isset($data[$tanggal])) {
                $statistik['duplikat']++;
                continue;
            }

            $data[$tanggal] = [
                'tanggal' => $tanggal,
                'open' => (float) $open,
                'high' => (float) $high,
                'low' => (float) $low,
                'close' => (float) $close,
            ];

            $statistik['2025']++;
        }

        /*
        |--------------------------------------------------------------------------
        | 4. Urutkan berdasarkan tanggal
        |--------------------------------------------------------------------------
        */

        ksort($data);

        $total = count($data);

        $this->newLine();
        $this->info('HASIL PEMBACAAN EXCEL');
        $this->table(
            ['Keterangan', 'Jumlah'],
            [
                ['Sheet ALL (2015–2024)', $statistik['ALL']],
                ['Tambahan sheet 2024', $statistik['2024']],
                ['Sheet 2025', $statistik['2025']],
                ['Baris OHLC tidak lengkap', $statistik['tidak_lengkap']],
                ['Tanggal duplikat dilewati', $statistik['duplikat']],
                ['TOTAL DATA UNIK', $total],
            ]
        );

        if ($total > 0) {
            $this->line('Tanggal pertama: ' . array_key_first($data));
            $this->line('Tanggal terakhir: ' . array_key_last($data));
        }

        /*
        |--------------------------------------------------------------------------
        | 5. Dry run: simulasi tanpa menyimpan
        |--------------------------------------------------------------------------
        */

        if ($this->option('dry-run')) {
            $this->newLine();
            $this->warn('DRY RUN: Tidak ada data yang disimpan ke database.');
            return self::SUCCESS;
        }

        /*
        |--------------------------------------------------------------------------
        | 6. Simpan ke database
        |--------------------------------------------------------------------------
        */

        $this->info('Menyimpan data ke database...');

        $now = now();

        $records = [];

        foreach ($data as $item) {
            $records[] = [
                'tanggal' => $item['tanggal'],
                'open' => $item['open'],
                'high' => $item['high'],
                'low' => $item['low'],
                'close' => $item['close'],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        foreach (array_chunk($records, 500) as $chunk) {
            DB::table('usd_jpy_historical_data')->upsert(
                $chunk,
                ['tanggal'],
                ['open', 'high', 'low', 'close', 'updated_at']
            );
        }

        $this->newLine();
        $this->info("Berhasil mengimpor {$total} data USD/JPY.");

        return self::SUCCESS;
    }
}
