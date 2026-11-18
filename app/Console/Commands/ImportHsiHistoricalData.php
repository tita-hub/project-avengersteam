<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Throwable;

class ImportHsiHistoricalData extends Command
{
    protected $signature = 'app:import-hsi-historical-data
                            {--dry-run : Simulasi tanpa menyimpan data}';

    protected $description = 'Import data historis HSI Daily dari Excel';

    public function handle(): int
    {
        $file = storage_path('app/imports/Historical Data HSI.xlsx');

        $this->info('======================================');
        $this->info('       IMPORT HSI HISTORICAL DATA');
        $this->info('======================================');

        if (!file_exists($file)) {
            $this->error("File Excel tidak ditemukan: {$file}");
            return self::FAILURE;
        }

        if (!class_exists(IOFactory::class)) {
            $this->error('PhpSpreadsheet belum terpasang.');
            return self::FAILURE;
        }

        try {
            $spreadsheet = IOFactory::load($file);

            $sheets = ['ALL', '2025'];

            $startDate = '2015-01-01';
            $endDate = '2025-09-30';

            $records = [];
            $seenDates = [];
            $duplicateDates = [];
            $sheetCounts = [];

            $invalidRows = 0;
            $duplicateExcel = 0;

            // Membaca kedua sheet Excel
            foreach ($sheets as $sheetName) {

                $sheet = $spreadsheet->getSheetByName($sheetName);

                if (!$sheet) {
                    $this->error("Sheet {$sheetName} tidak ditemukan.");
                    $spreadsheet->disconnectWorksheets();
                    return self::FAILURE;
                }

                $this->info("Membaca sheet: {$sheetName}");

                $sheetValid = 0;

                $lastRow = $sheet->getHighestRow();

                for ($row = 1; $row <= $lastRow; $row++) {

                    // Kolom B = Tanggal
                    // Kolom C = Open
                    // Kolom D = High
                    // Kolom E = Low
                    // Kolom F = Close

                    $rawDate = $sheet->getCell("B{$row}")->getValue();

                    $open = $sheet->getCell("C{$row}")->getCalculatedValue();
                    $high = $sheet->getCell("D{$row}")->getCalculatedValue();
                    $low = $sheet->getCell("E{$row}")->getCalculatedValue();
                    $close = $sheet->getCell("F{$row}")->getCalculatedValue();

                    $tanggal = $this->parseDate($rawDate);

                    // =====================================================
                    // KOREKSI TANGGAL EXCEL TANPA MENGUBAH FILE ASLI
                    // =====================================================

                    // Koreksi tanggal ALL baris 4905
                    // Seharusnya 26 Oktober 2015, bukan 26 Oktober 2016
                    if (
                        $sheetName === 'ALL' &&
                        $row === 4905 &&
                        $tanggal !== null
                    ) {
                        $tanggal = '2015-10-26';
                    }

                    // Koreksi tanggal April 2025
                    // Tanggal pada baris 87-108 terbaca sebagai April 2024.
                    // Tambahkan 365 hari agar menjadi tanggal April 2025.
                    if (
                        $sheetName === '2025' &&
                        $row >= 87 &&
                        $row <= 108 &&
                        $tanggal !== null
                    ) {
                        $tanggal = (new \DateTime($tanggal))
                            ->modify('+365 days')
                            ->format('Y-m-d');
                    }

                    if (!$tanggal) {

                        if (
                            $rawDate !== null &&
                            trim((string) $rawDate) !== ''
                        ) {
                            $invalidRows++;
                        }

                        continue;
                    }

                    if (
                        $tanggal < $startDate ||
                        $tanggal > $endDate
                    ) {
                        continue;
                    }

                    $open = $this->parseNumber($open);
                    $high = $this->parseNumber($high);
                    $low = $this->parseNumber($low);
                    $close = $this->parseNumber($close);

                    if (
                        $open === null ||
                        $high === null ||
                        $low === null ||
                        $close === null
                    ) {
                        $invalidRows++;
                        continue;
                    }

                    $sheetValid++;

                    // Simpan data untuk pemeriksaan duplikasi
                    $currentRecord = [
                        'tanggal' => $tanggal,
                        'sheet' => $sheetName,
                        'baris' => $row,

                        'raw_date' => $rawDate,

                        'formatted_date' => $sheet
                            ->getCell("B{$row}")
                            ->getFormattedValue(),

                        'date_type' => $sheet
                            ->getCell("B{$row}")
                            ->getDataType(),

                        'open' => $open,
                        'high' => $high,
                        'low' => $low,
                        'close' => $close,
                    ];

                    if (isset($seenDates[$tanggal])) {

                        $duplicateExcel++;

                        $duplicateDates[] = [
                            'tanggal' => $tanggal,
                            'pertama' => $seenDates[$tanggal],
                            'kedua' => $currentRecord,
                        ];

                        continue;
                    }

                    $seenDates[$tanggal] = $currentRecord;

                    $records[] = [
                        'tanggal' => $tanggal,
                        'open' => $open,
                        'high' => $high,
                        'low' => $low,
                        'close' => $close,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                $sheetCounts[$sheetName] = $sheetValid;
            }

            $spreadsheet->disconnectWorksheets();
            unset($spreadsheet);

            // Urutkan berdasarkan tanggal
            usort($records, function ($a, $b) {
                return strcmp($a['tanggal'], $b['tanggal']);
            });

            // Periksa data yang sudah ada di database
            $existingDates = [];

            foreach (
                array_chunk(array_column($records, 'tanggal'), 500)
                as $dates
            ) {

                $existing = DB::table('hsi_historical_data')
                    ->whereIn('tanggal', $dates)
                    ->pluck('tanggal')
                    ->toArray();

                $existingDates = array_merge(
                    $existingDates,
                    $existing
                );
            }

            $existingDates = array_flip($existingDates);

            $newRecords = [];

            foreach ($records as $record) {

                if (isset($existingDates[$record['tanggal']])) {
                    continue;
                }

                $newRecords[] = $record;
            }

            $skippedDatabase = count($records) - count($newRecords);

            // Rincian per sheet
            $this->newLine();

            $this->info('========== RINCIAN PER SHEET ==========');

            foreach ($sheetCounts as $name => $count) {
                $this->line("Sheet {$name}: {$count} data valid");
            }

            // Detail duplikasi
            $this->newLine();

            $this->info('========== DETAIL DUPLIKASI ==========');

            if (empty($duplicateDates)) {

                $this->info('Tidak ditemukan duplikasi.');

            } else {

                foreach ($duplicateDates as $duplicate) {

                    $first = $duplicate['pertama'];
                    $second = $duplicate['kedua'];

                    $sameOHLC = (
                        $first['open'] === $second['open'] &&
                        $first['high'] === $second['high'] &&
                        $first['low'] === $second['low'] &&
                        $first['close'] === $second['close']
                    );

                    $this->newLine();

                    $this->line('Tanggal: ' . $duplicate['tanggal']);

                    $this->line(
                        'Tanggal asli pertama: ' . $first['raw_date']
                    );

                    $this->line(
                        'Format tampilan pertama: ' . $first['formatted_date']
                    );

                    $this->line(
                        'Tipe sel pertama: ' . $first['date_type']
                    );

                    $this->line(
                        'Tanggal asli kedua: ' . $second['raw_date']
                    );

                    $this->line(
                        'Format tampilan kedua: ' . $second['formatted_date']
                    );

                    $this->line(
                        'Tipe sel kedua: ' . $second['date_type']
                    );

                    $this->line(
                        'Data pertama: Sheet ' . $first['sheet'] .
                        ' | Baris ' . $first['baris']
                    );

                    $this->line(
                        'Data kedua: Sheet ' . $second['sheet'] .
                        ' | Baris ' . $second['baris']
                    );

                    $this->line(
                        'OHLC pertama: ' .
                        $first['open'] . ' | ' .
                        $first['high'] . ' | ' .
                        $first['low'] . ' | ' .
                        $first['close']
                    );

                    $this->line(
                        'OHLC kedua:   ' .
                        $second['open'] . ' | ' .
                        $second['high'] . ' | ' .
                        $second['low'] . ' | ' .
                        $second['close']
                    );

                    $this->line(
                        'Status OHLC: ' .
                        ($sameOHLC ? 'IDENTIK' : 'BERBEDA')
                    );
                }
            }

            // Hasil validasi
            $this->newLine();

            $this->info('========== HASIL VALIDASI ==========');

            $this->line('Data Excel valid        : ' . count($records));
            $this->line('Data baru               : ' . count($newRecords));
            $this->line('Sudah ada di database   : ' . $skippedDatabase);
            $this->line('Duplikasi dalam Excel   : ' . $duplicateExcel);
            $this->line('Baris tidak valid       : ' . $invalidRows);
            $this->line('Periode awal            : ' . $startDate);
            $this->line('Periode akhir           : ' . $endDate);

            $this->newLine();

            // Mode dry-run
            if ($this->option('dry-run')) {

                $this->warn('MODE DRY-RUN AKTIF');

                $this->info(
                    'Simulasi selesai. Tidak ada data yang disimpan.'
                );

                $this->line(
                    'Data yang akan diimport: ' . count($newRecords)
                );

                return self::SUCCESS;
            }

            // Import database
            if (empty($newRecords)) {

                $this->warn('Tidak ada data baru untuk diimport.');

                return self::SUCCESS;
            }

            $this->info('Memulai penyimpanan data HSI...');

            DB::transaction(function () use ($newRecords) {

                foreach (array_chunk($newRecords, 500) as $chunk) {

                    DB::table('hsi_historical_data')
                        ->insertOrIgnore($chunk);
                }
            });

            $this->newLine();

            $this->info('======================================');
            $this->info('       IMPORT HSI SELESAI');
            $this->info('======================================');

            $this->info(
                'Jumlah data yang diproses: ' . count($newRecords)
            );

            return self::SUCCESS;

        } catch (Throwable $e) {

            $this->newLine();

            $this->error('Terjadi kesalahan saat import HSI.');

            $this->error($e->getMessage());

            return self::FAILURE;
        }
    }

    /**
     * Mengubah tanggal Excel menjadi YYYY-MM-DD.
     */
    private function parseDate($value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }

        try {

            if (
                is_numeric($value) &&
                $value >= 20000 &&
                $value <= 80000
            ) {
                return ExcelDate::excelToDateTimeObject((float) $value)
                    ->format('Y-m-d');
            }

            $value = trim((string) $value);

            $formats = [
                'Y-m-d',
                'd/m/Y',
                'm/d/Y',
                'd-m-Y',
                'Y/m/d',
            ];

            foreach ($formats as $format) {

                $date = \DateTime::createFromFormat(
                    '!' . $format,
                    $value
                );

                if (
                    $date &&
                    $date->format($format) === $value
                ) {
                    return $date->format('Y-m-d');
                }
            }

        } catch (Throwable $e) {

            return null;
        }

        return null;
    }

    /**
     * Mengubah nilai OHLC menjadi angka desimal.
     */
    private function parseNumber($value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }

        if (is_numeric($value)) {
            return number_format((float) $value, 2, '.', '');
        }

        $value = trim((string) $value);

        if (
            preg_match('/^-?\d{1,3}(,\d{3})+(\.\d+)?$/', $value)
        ) {
            $value = str_replace(',', '', $value);

        } elseif (
            strpos($value, ',') !== false &&
            strpos($value, '.') === false
        ) {
            $value = str_replace(',', '.', $value);
        }

        if (!is_numeric($value)) {
            return null;
        }

        return number_format((float) $value, 2, '.', '');
    }
}
