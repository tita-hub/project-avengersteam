<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;

class ImportEurUsdHistoricalData extends Command
{
    protected $signature = 'eurusd:import-historical-data {--dry-run}';

    protected $description = 'Import historical EUR/USD data from Excel';

    public function handle()
    {
        $path = storage_path('app/imports/Historical Data EUR.xlsx');

        if (!file_exists($path)) {
            $this->error('File Excel EUR/USD tidak ditemukan.');
            return self::FAILURE;
        }

        $spreadsheet = IOFactory::load($path);

        $records = [];

        $sheets = [
            'ALL' => 3,
            '2017' => 4,
            '2018' => 4,
            '2019' => 4,
            '2020' => 4,
            '2021' => 4,
            '2022' => 4,
            '2023' => 4,
            '2024' => 4,
            '2025' => 4,
        ];

        foreach ($sheets as $sheetName => $startRow) {
            $sheet = $spreadsheet->getSheetByName($sheetName);

            if (!$sheet) {
                $this->warn("Sheet {$sheetName} tidak ditemukan.");
                continue;
            }

            $lastRow = $sheet->getHighestDataRow();

            for ($row = $startRow; $row <= $lastRow; $row++) {
                $dateValue = $sheet->getCell('B' . $row)->getValue();

                if (!is_numeric($dateValue)) {
                    continue;
                }

                try {
                    $tanggal = ExcelDate::excelToDateTimeObject(
                        (float) $dateValue
                    )->format('Y-m-d');
                } catch (\Throwable $e) {
                    continue;
                }

                // ALL hanya digunakan untuk tahun 2015-2016.
                if ($sheetName === 'ALL') {
                    if ($tanggal < '2015-01-01' || $tanggal > '2016-12-31') {
                        continue;
                    }
                }

                // Sheet tahunan digunakan mulai 2017.
                if ($sheetName !== 'ALL') {
                    $tahun = (int) $sheetName;

                    if ((int) substr($tanggal, 0, 4) !== $tahun) {
                        continue;
                    }
                }

                // Batas akhir data: 30 September 2025.
                if ($tanggal < '2015-01-01' || $tanggal > '2025-09-30') {
                    continue;
                }

                $open  = $sheet->getCell('C' . $row)->getValue();
                $high  = $sheet->getCell('D' . $row)->getValue();
                $low   = $sheet->getCell('E' . $row)->getValue();
                $close = $sheet->getCell('F' . $row)->getValue();

                // Lewati baris libur atau data OHLC yang tidak valid.
                if (
                    !is_numeric($open) ||
                    !is_numeric($high) ||
                    !is_numeric($low) ||
                    !is_numeric($close)
                ) {
                    continue;
                }

                $records[$tanggal] = [
                    'tanggal' => $tanggal,
                    'open' => $open,
                    'high' => $high,
                    'low' => $low,
                    'close' => $close,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        ksort($records);

        $this->info('Jumlah data valid: ' . count($records));

        if ($this->option('dry-run')) {
            $this->info('Dry run selesai. Database belum diubah.');
            return self::SUCCESS;
        }

        foreach (array_chunk(array_values($records), 500) as $chunk) {
            DB::table('eur_usd_historical_data')->upsert(
                $chunk,
                ['tanggal'],
                ['open', 'high', 'low', 'close', 'updated_at']
            );
        }

        $this->info('Import EUR/USD berhasil.');

        $this->info(
            'Total data dalam database: ' .
            DB::table('eur_usd_historical_data')->count()
        );

        return self::SUCCESS;
    }
}
