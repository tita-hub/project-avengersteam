<?php

namespace App\Http\Controllers;

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
        return view('edukasi.umum');
    }
}