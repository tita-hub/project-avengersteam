<?php

namespace App\Http\Controllers;

class ProsedurController extends Controller
{
    public function pembukaanRekening()
    {
        return view('prosedur.pembukaan-rekening');
    }

    public function penarikan()
    {
        return view('prosedur.penarikan');
    }

    public function petunjukTransaksi()
    {
        return view('prosedur.petunjuk-transaksi');
    }
}