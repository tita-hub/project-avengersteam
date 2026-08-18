<?php

namespace App\Http\Controllers;

use App\Models\PembukaanRekening;
use Illuminate\Http\Request;

class PembukaanRekeningController extends Controller
{
    /**
     * Tampilkan form pengajuan pembukaan rekening.
     */
    public function create()
    {
        return view('pembukaan-rekening.create');
    }

    /**
     * Simpan pengajuan pembukaan rekening ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap'     => ['required', 'string', 'max:150'],
            'email'            => ['required', 'email', 'max:150'],
            'no_hp'            => ['required', 'string', 'max:20'],
            'nik'              => ['required', 'string', 'digits:16'],
            'produk_diminati'  => ['required', 'in:emas,nikkei,aud'],
            'catatan'          => ['nullable', 'string', 'max:500'],
        ], [
            'nik.digits' => 'NIK harus terdiri dari 16 digit angka.',
            'produk_diminati.in' => 'Pilih salah satu produk yang tersedia.',
        ]);

        // Status awal setiap pengajuan baru selalu "baru",
        // nanti diproses lebih lanjut oleh konsultan/WPB di dashboard internal.
        $validated['status'] = 'baru';

        PembukaanRekening::create($validated);

        return redirect()
            ->route('pembukaan-rekening.create')
            ->with('sukses', 'Pengajuan kamu sudah kami terima. Tim kami akan menghubungi kamu dalam 1x24 jam.');
    }
}
