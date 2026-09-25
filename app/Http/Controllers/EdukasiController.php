<?php

namespace App\Http\Controllers;

use App\Models\InternshipReview;

class EdukasiController extends Controller
{
    public function edukasiNasabah()
    {
        return view('edukasi.nasabah');
    }

    public function edukasiKonsultan()
    {
        return view('edukasi.konsultan');
    }

    public function edukasiUmum()
    {
        $pengalamanMagang = InternshipReview::query()
            ->where('status', 'published')
            ->latest()
            ->get();

        return view(
            'edukasi.umum',
            compact('pengalamanMagang')
        );
    }
}