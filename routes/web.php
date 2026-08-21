<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TentangKamiController;

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