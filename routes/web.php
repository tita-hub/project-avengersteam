<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PembukaanRekeningController;
use App\Http\Controllers\DashboardDemoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — RFB Semarang Avengers
|--------------------------------------------------------------------------
| Tahap ini baru mencakup: halaman awal, form pembukaan rekening,
| dan demo dashboard (Konsultan / Nasabah). Section lain (Tentang Kami,
| Produk, Prosedur, Edukasi) menyusul di tahap berikutnya.
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/pembukaan-rekening', [PembukaanRekeningController::class, 'create'])
    ->name('pembukaan-rekening.create');
Route::post('/pembukaan-rekening', [PembukaanRekeningController::class, 'store'])
    ->name('pembukaan-rekening.store');

Route::get('/dashboard/demo', [DashboardDemoController::class, 'index'])
    ->name('dashboard.demo');
