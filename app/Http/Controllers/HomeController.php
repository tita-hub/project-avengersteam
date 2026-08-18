<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman awal (hero) RFB Semarang.
     */
    public function index()
    {
        return view('home.index');
    }
}
