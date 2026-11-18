<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Throwable;

class ImportUsdChfHistoricalData extends Command
{
    protected $signature = 'usdchf:import-historical-data
                            {--dry-run : Simulasi tanpa menyimpan data}';

    protected $description = 'Import data historis USD/CHF dari Excel';

    public function handle(): int
    {
        $file = storage_path('app/imports/Historical Data CHF.xlsx');
        $table = 'usd_chf_historical_data';

        $this->info('======================================');
        $this->info('      IMPORT USD/CHF HISTORICAL DATA');
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
            $skippedHeaders = 0;
            $duplicateExcel = 0;
            $invalidRowDetails = [];

            // ==========================================
            // MEMBACA SHEET EXCEL
            // ==========================================

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

                    $rawOpen = $sheet->getCell("C{$row}")->getCalculatedValue();
                    $rawHigh = $sheet->getCell("D{$row}")->getCalculatedValue();
                    $rawLow = $sheet->getCell("E{$row}")->getCalculatedValue();
                    $rawClose = $sheet->getCell("F{$row}")->getCalculatedValue();

                    // ======================================
                    // LEWATI BARIS HEADER
                    // ======================================

                    if (
                        is_string($rawDate) &&
                        strtolower(trim($rawDate)) === 'date'
                    ) {
                        $skippedHeaders++;
                        continue;
                    }

                    $tanggal = $this->parseDate($rawDate);

                    // ======================================
                    // KOREKSI TANGGAL EXCEL
                    // ======================================

                    // Baris 4496 sheet ALL seharusnya
                    // 30 November 2015.

                    if (
                        $sheetName === 'ALL' &&
                        $row === 4496 &&
                        $rawDate !== null &&
                        trim((string) $rawDate) !== ''
                    ) {
                        $tanggal = '2015-11-30';
                    }

                    // Koreksi data April dan Agustus 2025.
                    // Baris 87-108: April 2024 menjadi April 2025.
                    // Baris 201-221: Agustus 2024 menjadi Agustus 2025.
                    // Hanya tanggal yang dikoreksi, OHLC tetap asli.

                    if (
                        $sheetName === '2025' &&
                        $tanggal !== null
                    ) {
                        $isApril = (
                            $row >= 87 &&
                            $row <= 108 &&
                            str_starts_with($tanggal, '2024-04-')
                        );

                        $isAugust = (
                            $row >= 201 &&
                            $row <= 221 &&
                            str_starts_with($tanggal, '2024-08-')
                        );

                        if ($isApril || $isAugust) {
                            $tanggal = (new \DateTimeImmutable($tanggal))
                                ->modify('+1 year')
                                ->format('Y-m-d');
                        }
                    }

                    // ======================================
                    // VALIDASI TANGGAL
                    // ======================================

                    if (!$tanggal) {
                        // Baris kosong dilewati tanpa dihitung.
                        if (
                            $rawDate !== null &&
                            trim((string) $rawDate) !== ''
                        ) {
                            $invalidRows++;

                            $invalidRowDetails[] = [
                                'sheet' => $sheetName,
                                'baris' => $row,
                                'tanggal' => $rawDate,
                                'alasan' => 'Tanggal tidak terbaca',
                            ];
                        }

                        continue;
                    }

                    // Batasi periode data.
                    if (
                        $tanggal < $startDate ||
                        $tanggal > $endDate
                    ) {
                        continue;
                    }

                    // ======================================
                    // VALIDASI OHLC
                    // ======================================

                    $open = $this->parseNumber($rawOpen);
                    $high = $this->parseNumber($rawHigh);
                    $low = $this->parseNumber($rawLow);
                    $close = $this->parseNumber($rawClose);

                    if (
                        $open === null ||
                        $high === null ||
                        $low === null ||
                        $close === null
                    ) {
                        $invalidRows++;

                        $invalidRowDetails[] = [
                            'sheet' => $sheetName,
                            'baris' => $row,
                            'tanggal' => $tanggal,
                            'open' => $rawOpen,
                            'high' => $rawHigh,
                            'low' => $rawLow,
                            'close' => $rawClose,
                            'alasan' => 'OHLC tidak lengkap atau tidak valid',
                        ];

                        continue;
                    }

                    $sheetValid++;

                    $currentRecord = [
                        'tanggal' => $tanggal,
                        'sheet' => $sheetName,
                        'baris' => $row,
                        'raw_date' => $rawDate,
                        'open' => $open,
                        'high' => $high,
                        'low' => $low,
                        'close' => $close,
                    ];

                    // ======================================
                    // CEK DUPLIKASI ANTAR SHEET
                    // ======================================

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

            // ==========================================
            // URUTKAN TANGGAL
            // ==========================================

            usort($records, function ($a, $b) {
                return strcmp($a['tanggal'], $b['tanggal']);
            });

            // ==========================================
            // CEK DATA DATABASE
            // ==========================================

            $existingDates = [];

            foreach (
                array_chunk(array_column($records, 'tanggal'), 500)
                as $dates
            ) {
                $existing = DB::table($table)
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

            // ==========================================
            // RINCIAN PER SHEET
            // ==========================================

            $this->newLine();
            $this->info('========== RINCIAN PER SHEET ==========');

            foreach ($sheetCounts as $name => $count) {
                $this->line("Sheet {$name}: {$count} data valid");
            }

            // ==========================================
            // DETAIL DUPLIKASI
            // ==========================================

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
                        'Data pertama: Sheet ' . $first['sheet'] .
                        ' | Baris ' . $first['baris']
                    );

                    $this->line(
                        'Data kedua: Sheet ' . $second['sheet'] .
                        ' | Baris ' . $second['baris']
                    );

                    $this->line(
                        'OHLC pertama: ' .
                        implode(' | ', [
                            $first['open'],
                            $first['high'],
                            $first['low'],
                            $first['close'],
                        ])
                    );

                    $this->line(
                        'OHLC kedua: ' .
                        implode(' | ', [
                            $second['open'],
                            $second['high'],
                            $second['low'],
                            $second['close'],
                        ])
                    );

                    $this->line(
                        'Status OHLC: ' .
                        ($sameOHLC ? 'IDENTIK' : 'BERBEDA')
                    );
                }
            }

            // ==========================================
            // HASIL VALIDASI
            // ==========================================

            $this->newLine();
            $this->info('========== HASIL VALIDASI ==========');

            $this->line('Data Excel valid       : ' . count($records));
            $this->line('Data baru              : ' . count($newRecords));
            $this->line('Sudah ada di database  : ' . $skippedDatabase);
            $this->line('Duplikasi dalam Excel  : ' . $duplicateExcel);
            $this->line('Header dilewati        : ' . $skippedHeaders);
            $this->line('Baris tidak valid      : ' . $invalidRows);
            $this->line('Periode awal           : ' . $startDate);
            $this->line('Periode akhir          : ' . $endDate);

            // ==========================================
            // DETAIL BARIS TIDAK VALID
            // ==========================================

            $this->newLine();
            $this->info('========== DETAIL BARIS TIDAK VALID ==========');

            if (empty($invalidRowDetails)) {
                $this->info('Tidak ditemukan baris tidak valid.');
            } else {
                foreach ($invalidRowDetails as $detail) {
                    $this->line(
                        'Sheet: ' . $detail['sheet'] .
                        ' | Baris Excel: ' . $detail['baris'] .
                        ' | Tanggal: ' . $detail['tanggal'] .
                        ' | Alasan: ' . $detail['alasan']
                    );

                    if (array_key_exists('open', $detail)) {
                        $this->line(
                            'OHLC asli: ' .
                            ($detail['open'] ?? 'KOSONG') . ' | ' .
                            ($detail['high'] ?? 'KOSONG') . ' | ' .
                            ($detail['low'] ?? 'KOSONG') . ' | ' .
                            ($detail['close'] ?? 'KOSONG')
                        );
                    }
                }
            }

            // ==========================================
            // DRY RUN
            // ==========================================

            if ($this->option('dry-run')) {
                $this->newLine();
                $this->warn('MODE DRY-RUN AKTIF');

                $this->info(
                    'Simulasi selesai. Tidak ada data yang disimpan.'
                );

                $this->line(
                    'Data yang akan diimport: ' . count($newRecords)
                );

                return self::SUCCESS;
            }

            // ==========================================
            // IMPORT DATABASE
            // ==========================================

            if (empty($newRecords)) {
                $this->warn('Tidak ada data baru untuk diimport.');
                return self::SUCCESS;
            }

            $this->info('Memulai penyimpanan data USD/CHF...');

            DB::transaction(function () use ($newRecords, $table) {
                foreach (array_chunk($newRecords, 500) as $chunk) {
                    DB::table($table)->insertOrIgnore($chunk);
                }
            });

            $this->newLine();
            $this->info('======================================');
            $this->info('       IMPORT USD/CHF SELESAI');
            $this->info('======================================');

            $this->info(
                'Jumlah data yang diproses: ' . count($newRecords)
            );

            $this->info(
                'Total data dalam database: ' .
                DB::table($table)->count()
            );

            return self::SUCCESS;

        } catch (Throwable $e) {
            $this->newLine();
            $this->error('Terjadi kesalahan saat import USD/CHF.');
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
     * Mengubah nilai OHLC menjadi angka desimal 6 digit.
     */
    private function parseNumber($value): ?string
    {
        if ($value === null || $value === '') {
            return null;
        }

        if (is_numeric($value)) {
            return number_format((float) $value, 6, '.', '');
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

        return number_format((float) $value, 6, '.', '');
    }
}
