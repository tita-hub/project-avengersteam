<?php

namespace App\Http\Controllers;

class TentangKamiController extends Controller
{
    public function profilePerusahaan()
    {
        return view('tentang.profile-perusahaan');
    }

    public function teamProfile()
    {
        return view('tentang.team-profile');
    }

    public function wakilPialang()
    {
        return view('tentang.wakil-pialang');
    }
}