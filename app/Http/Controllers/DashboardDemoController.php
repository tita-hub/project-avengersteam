<?php

namespace App\Http\Controllers;

class DashboardDemoController extends Controller
{
    /**
     * Tampilkan halaman demo dashboard (peran Konsultan & Nasabah).
     * Data di sini masih contoh statis — nanti diganti data asli
     * dari database begitu modul dashboard internal dibuat.
     */
    public function index()
    {
        $statKonsultan = [
            ['label' => 'Prospek Baru',       'nilai' => 128],
            ['label' => 'Follow Up Aktif',    'nilai' => 46],
            ['label' => 'Konversi Bulan Ini', 'nilai' => 12],
            ['label' => 'Target Tercapai',    'nilai' => '78%'],
        ];

        $funnel = [
            ['tahap' => 'Database Prospek',          'jumlah' => 128, 'persen' => 100],
            ['tahap' => 'Broadcast & Follow Up',      'jumlah' => 92,  'persen' => 72],
            ['tahap' => 'Komunikasi & Janji Temu',    'jumlah' => 56,  'persen' => 44],
            ['tahap' => 'Proses Konversi',            'jumlah' => 28,  'persen' => 22],
            ['tahap' => 'Nasabah Tetap',              'jumlah' => 12,  'persen' => 9],
        ];

        $nasabah = [
            'status_akun'  => 'Aktif',
            'wpb'          => 'Rangga Aditya',
            'update_pasar' => 'XAU/USD naik 0.84% menjelang sesi Amerika.',
            'edukasi'      => 'Mengenal Margin — 3 menit baca.',
        ];

        return view('dashboard.demo', compact('statKonsultan', 'funnel', 'nasabah'));
    }
}
