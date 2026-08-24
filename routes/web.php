<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProsedurController;
use App\Http\Controllers\EdukasiController;

Route::get('/', [LoginController::class, 'showLoginForm'])
    ->name('login.form');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/berita', [NewsController::class, 'index'])
        ->name('news.index');

    Route::get('/berita/{news}', [NewsController::class, 'show'])
        ->name('news.show');

});

Route::controller(TentangKamiController::class)->group(function () {
    Route::get('/tentang-kami/profile-perusahaan', 'profilePerusahaan')
        ->name('profile.perusahaan');

    Route::get('/tentang-kami/team-profile', 'teamProfile')
        ->name('team.profile');

    Route::get('/tentang-kami/wakil-pialang', 'wakilPialang')
        ->name('wakil.pialang');
});

    Route::controller(ProdukController::class)->group(function () {
        
    Route::get('/produk', 'index')->name('produk.index');
});

Route::controller(ProsedurController::class)->group(function () {

    // Pembukaan Rekening
    Route::get('/prosedur/pembukaan-rekening', 'pembukaanRekening')
        ->name('prosedur.pembukaan');

    // Regular
    Route::get('/prosedur/pembukaan-rekening/regular', 'regular')
        ->name('prosedur.regular');

    // Online
    Route::get('/prosedur/pembukaan-rekening/online', 'online')
        ->name('prosedur.online');

    // Penarikan
    Route::get('/prosedur/penarikan', function () {
        return view('prosedur.penarikan');
    })->name('prosedur.penarikan');

    // Petunjuk Transaksi
    Route::get('/prosedur/petunjuk-transaksi', function () {
        return view('prosedur.petunjuk-transaksi');
    })->name('prosedur.petunjuk');

});

Route::controller(EdukasiController::class)->group(function () {

    // Edukasi Nasabah
    Route::get('/edukasi/nasabah', 'edukasiNasabah')
        ->name('edukasi.nasabah');

    // Edukasi Konsultan
    Route::get('/edukasi/konsultan', 'edukasiKonsultan')
        ->name('edukasi.konsultan');

    // Edukasi Umum
    Route::get('/edukasi/umum', 'edukasiUmum')
        ->name('edukasi.umum');

});