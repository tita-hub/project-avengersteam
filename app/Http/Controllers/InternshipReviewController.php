<?php

namespace App\Http\Controllers;

use App\Models\InternshipReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class InternshipReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'institution' => [
                'required',
                'string',
                'max:150',
            ],

            'photo' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'review' => [
                'required',
                'string',
                'min:10',
                'max:3000',
            ],
        ], [
            'name.required' => 'Nama wajib diisi.',
            'institution.required' => 'Asal sekolah atau universitas wajib diisi.',
            'photo.required' => 'Foto profil wajib diunggah.',
            'photo.image' => 'File harus berupa gambar.',
            'photo.mimes' => 'Foto harus berformat JPG, JPEG, PNG, atau WEBP.',
            'photo.max' => 'Ukuran foto maksimal 2 MB.',
            'review.required' => 'Ulasan wajib diisi.',
            'review.min' => 'Ulasan minimal 10 karakter.',
            'review.max' => 'Ulasan maksimal 3000 karakter.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | AI MODERATION
        |--------------------------------------------------------------------------
        */

        $moderation = $this->moderateContent(
            $validated['review'],
            $request->file('photo')
        );

        if (!$moderation['approved']) {

            return back()
                ->withInput()
                ->with(
                    'review_error',
                    'Ulasan belum dapat dipublikasikan karena mengandung konten yang tidak sesuai.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN FOTO
        |--------------------------------------------------------------------------
        */

        $photoPath = $request
            ->file('photo')
            ->store('internship-reviews', 'public');

        /*
        |--------------------------------------------------------------------------
        | SIMPAN REVIEW
        |--------------------------------------------------------------------------
        */

        InternshipReview::create([
            'name' => $validated['name'],
            'institution' => $validated['institution'],
            'photo' => $photoPath,
            'review' => $validated['review'],
            'status' => 'published',
            'moderation_reason' => null,
        ]);

        return back()->with(
            'review_success',
            'Terima kasih! Pengalaman kamu berhasil dipublikasikan.'
        );
    }


    private function moderateContent(string $review, $photo): array
    {
        $apiKey = config('services.openai.api_key');

        if (!$apiKey) {
            return [
                'approved' => false,
                'reason' => 'OpenAI API key belum dikonfigurasi.',
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | TEXT INPUT
        |--------------------------------------------------------------------------
        */

        $input = [
            [
                'type' => 'text',
                'text' => $review,
            ],
        ];

        /*
        |--------------------------------------------------------------------------
        | IMAGE INPUT
        |--------------------------------------------------------------------------
        |
        | Foto dikirim sebagai data URL agar tidak perlu dibuat public terlebih
        | dahulu sebelum lolos moderation.
        |
        */

        $imageData = base64_encode(
            file_get_contents($photo->getRealPath())
        );

        $mimeType = $photo->getMimeType();

        $input[] = [
            'type' => 'image_url',
            'image_url' => [
                'url' => "data:{$mimeType};base64,{$imageData}",
            ],
        ];

        try {

            $response = Http::withToken($apiKey)
                ->timeout(60)
                ->post(
                    'https://api.openai.com/v1/moderations',
                    [
                        'model' => 'omni-moderation-latest',
                        'input' => $input,
                    ]
                );

            if (!$response->successful()) {

                return [
                    'approved' => false,
                    'reason' => 'Moderation API gagal dipanggil.',
                ];
            }

            $result = $response->json();

            $flagged = data_get(
                $result,
                'results.0.flagged',
                true
            );

            return [
                'approved' => !$flagged,
                'reason' => $flagged
                    ? 'Content flagged by moderation.'
                    : null,
            ];

        } catch (\Throwable $e) {

            report($e);

            return [
                'approved' => false,
                'reason' => 'Terjadi kesalahan saat moderation.',
            ];
        }
    }
}