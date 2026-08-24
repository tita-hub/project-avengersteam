<?php

namespace App\Http\Controllers;

class ProsedurController extends Controller
{
    public function pembukaanRekening()
    {
        return view('prosedur.pembukaan-rekening');
    }

    public function regular()
    {
        return view('prosedur.regular');
    }

    public function online()
    {
        return view('prosedur.online');
    }
}