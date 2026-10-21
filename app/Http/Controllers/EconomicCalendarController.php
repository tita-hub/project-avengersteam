<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EconomicCalendarController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        try {
            $response = Http::acceptJson()
                ->timeout(25)
                ->get('https://www.newsmaker.id/api/economic-calendar/this-week');

            if (!$response->successful()) {
                Log::error('NewsMaker HTTP error', [
                    'status' => $response->status(),
                    'body' => substr($response->body(), 0, 1000),
                ]);

                return response()->json([
                    'status' => 502,
                    'message' => 'NewsMaker mengembalikan HTTP ' . $response->status(),
                    'data' => [],
                ], 502);
            }

            $result = $response->json();

            if (
                !is_array($result) ||
                !isset($result['data']) ||
                !is_array($result['data'])
            ) {
                Log::error('Format respons NewsMaker tidak sesuai');

                return response()->json([
                    'status' => 502,
                    'message' => 'Format data dari NewsMaker tidak sesuai.',
                    'data' => [],
                ], 502);
            }

            $events = $result['data'];
            $date = $request->query('date');

            if (
                $date &&
                preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)
            ) {
                $events = array_values(array_filter(
                    $events,
                    fn ($event) => ($event['date'] ?? '') === $date
                ));
            }

            return response()->json([
                'status' => 200,
                'message' => 'OK',
                'data' => $events,
            ]);

        } catch (\Throwable $e) {
            Log::error('Economic calendar exception', [
                'message' => $e->getMessage(),
            ]);

            return response()->json([
                'status' => 500,
                'message' => config('app.debug')
                    ? $e->getMessage()
                    : 'Laravel gagal mengambil data kalender. Periksa log aplikasi.',
                'data' => [],
            ], 502);
        }
    }
}