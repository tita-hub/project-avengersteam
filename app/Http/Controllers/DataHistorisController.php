<?php

namespace App\Http\Controllers;

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
            ->sortByDesc(
                fn ($item) => $item['tanggal'] ?? ''
            )
            ->values()
            ->all();

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
