<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class DataHistorisController extends Controller
{
    public function index()
    {
        // Mengambil data historis dari NewsMaker.
        try {
            $data = Cache::remember(
                'newsmaker_historical_data',
                now()->addMinutes(5),
                function () {
                    $response = Http::acceptJson()
                        ->timeout(20)
                        ->get(
                            'https://www.newsmaker.id/api/historical-data'
                        );

                    $response->throw();

                    $result = $response->json('data', []);

                    return is_array($result) ? $result : [];
                }
            );

            $error = null;
        } catch (\Throwable $e) {
            report($e);

            $data = [];
            $error = 'Data historis belum dapat dimuat. Silakan coba kembali.';
        }

        // Urutkan data terbaru ke data terlama.
        // Hilangkan kategori LSI dari data yang ditampilkan.
        
        $data = collect($data)
            ->filter(fn ($item) =>
                is_array($item) &&
                strtoupper(trim($item['category'] ?? '')) !== 'LSI'
            )
            ->values();

        // Ambil tanggal LGD Daily yang sudah tersedia dari NewsMaker
        $apiLgdDates = $data
            ->filter(fn ($item) =>
                strtoupper(trim($item['category'] ?? '')) === 'LGD DAILY'
            )
            ->pluck('tanggal')
            ->filter()
            ->map(fn ($tanggal) => (string) $tanggal)
            ->flip();

        // Ambil data Excel yang tanggalnya belum tersedia di NewsMaker
        $excelGold = DB::table('gold_historical_data')
            ->where('category', 'LGD Daily')
            ->get()
            ->filter(fn ($item) =>
                !$apiLgdDates->has((string) $item->tanggal)
            )
            ->map(fn ($item) => (array) $item);

        // Gabungkan data NewsMaker dan Excel
        
        // Abaikan tanggal SNI Daily yang formatnya tidak valid.
        $data = $data->reject(function ($item) {
            if (strtoupper(trim($item['category'] ?? '')) !== 'SNI DAILY') {
                return false;
            }

            $tanggal = $item['tanggal'] ?? '';

            if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $tanggal)) {
                return true;
            }

            [$tahun, $bulan, $hari] = array_map('intval', explode('-', $tanggal));

            return !checkdate($bulan, $hari, $tahun);
        });

        // Ambil tanggal SNI Daily yang sudah tersedia dari NewsMaker.
        $apiSniDates = $data
            ->filter(fn ($item) =>
                strtoupper(trim($item['category'] ?? '')) === 'SNI DAILY'
            )
            ->pluck('tanggal')
            ->filter()
            ->map(fn ($tanggal) => (string) $tanggal)
            ->flip();

        // Ambil data Excel yang tanggalnya belum tersedia di NewsMaker.
        $excelNikkei = DB::table('nikkei_historical_data')
            ->where('category', 'SNI Daily')
            ->get()
            ->filter(fn ($item) =>
                !$apiSniDates->has((string) $item->tanggal)
            )
            ->map(fn ($item) => (array) $item);


        // Ambil tanggal AUD/USD yang sudah tersedia dari NewsMaker.
        $apiAudUsdDates = $data
            ->filter(fn ($item) =>
                strtoupper(trim($item['category'] ?? '')) === 'AUD/USD'
            )
            ->pluck('tanggal')
            ->filter()
            ->map(fn ($tanggal) => (string) $tanggal)
            ->flip();

        // Ambil data Excel AUD/USD yang tanggalnya belum tersedia di NewsMaker.
        $excelAudUsd = DB::table('aud_usd_historical_data')
            ->get()
            ->filter(fn ($item) =>
                !$apiAudUsdDates->has((string) $item->tanggal)
            )
            ->map(fn ($item) => [
                'tanggal' => (string) $item->tanggal,
                'open' => $item->open,
                'high' => $item->high,
                'low' => $item->low,
                'close' => $item->close,
                'category' => 'AUD/USD',
            ]);

                    // Ambil tanggal BCO Daily yang sudah tersedia dari NewsMaker.
        $apiBcoDates = $data
            ->filter(fn ($item) =>
                strtoupper(trim($item['category'] ?? '')) === 'BCO DAILY'
            )
            ->pluck('tanggal')
            ->filter()
            ->map(fn ($tanggal) => (string) $tanggal)
            ->flip();

        // Ambil data Excel BCO Daily yang tanggalnya belum tersedia di NewsMaker.
        $excelBco = DB::table('bco_daily_historical_data')
            ->get()
            ->filter(fn ($item) =>
                !$apiBcoDates->has((string) $item->tanggal)
            )
            ->map(fn ($item) => [
                'tanggal' => (string) $item->tanggal,
                'open' => $item->open,
                'high' => $item->high,
                'low' => $item->low,
                'close' => $item->close,
                'category' => 'BCO Daily',
            ]);


        // Gabungkan data NewsMaker dan Excel.
        $data = $data
            ->concat($excelGold)
            ->concat($excelNikkei)
            ->concat($excelAudUsd)
            ->concat($excelBco)
            ->sortByDesc(fn ($item) => $item['tanggal'] ?? '')
            ->values()
            ->all();

        


        // Ambil kategori dari seluruh data gabungan
        $categories = collect($data)
            ->pluck('category')
            ->filter()
            ->unique()
            ->sort()
            ->values();


        // Pilihan kategori hanya berasal dari data API.
        $categories = collect($data)
            ->pluck('category')
            ->filter()
            ->unique()
            ->sort()
            ->values();

        // Mengambil kurs mata uang dari penyedia kurs publik.
        // Cache kurs selama 30 menit agar tidak meminta terus-menerus.
        try {
            $currency = Cache::remember(
                'historis_currency_rates_usd',
                now()->addMinutes(30),
                function () {
                    $response = Http::acceptJson()
                        ->timeout(15)
                        ->get('https://open.er-api.com/v6/latest/USD');

                    $response->throw();

                    $result = $response->json();

                    if (
                        !is_array($result) ||
                        ($result['result'] ?? '') !== 'success' ||
                        !is_array($result['rates'] ?? null)
                    ) {
                        throw new \RuntimeException(
                            'Respons kurs mata uang tidak valid.'
                        );
                    }

                    return [
                        'base' => 'USD',
                        'date' => $result['time_last_update_utc'] ?? null,
                        'rates' => $result['rates'],
                    ];
                }
            );

            $currencyError = null;
        } catch (\Throwable $e) {
            report($e);

            $currency = [
                'base' => 'USD',
                'date' => null,
                'rates' => [],
            ];

            $currencyError =
                'Kurs belum tersedia. Silakan coba beberapa saat lagi.';
        }

        return view('analisis.data-historis', [
            'dataHistoris' => $data,
            'categories' => $categories,
            'error' => $error,
            'currency' => $currency,
            'currencyError' => $currencyError,
        ]);
    }
}
