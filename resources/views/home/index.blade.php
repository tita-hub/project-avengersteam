@extends('layouts.app')

@section('title', 'RFB Semarang — Tim Avengers')

@section('content')

<section class="hero">
  <div class="wrap hero-grid">
    <div>
      <h1>Kepercayaan yang<br><em>diperdagangkan</em>,<br>bukan dijanjikan.</h1>
      <p class="lead">Tim Avengers RFB Semarang mendampingi nasabah bertransaksi komoditas, indeks saham, dan forex — dengan legalitas resmi dan wakil pialang berizin.</p>
      <div class="btn-row">
        <a href="{{ route('pembukaan-rekening.create') }}" class="btn btn-gold">Ajukan Pembukaan Rekening</a>
        <a href="{{ route('dashboard.demo') }}" class="btn btn-line">Lihat Demo Dashboard</a>
      </div>
      <div class="legit-strip">
        <span class="item">Terdaftar Bappebti</span>
        <span class="item">Kliring BBJ</span>
        <span class="item">Wakil Pialang Berizin</span>
      </div>
    </div>
    <div>
      <svg class="ticker-chart" viewBox="0 0 420 260" fill="none" xmlns="http://www.w3.org/2000/svg">
        <line x1="0" y1="60" x2="420" y2="60" stroke="#E5E2DA" stroke-width="1"/>
        <line x1="0" y1="130" x2="420" y2="130" stroke="#E5E2DA" stroke-width="1"/>
        <line x1="0" y1="200" x2="420" y2="200" stroke="#E5E2DA" stroke-width="1"/>
        <polyline points="0,180 40,150 80,165 120,110 160,120 200,70 240,95 280,55 320,75 360,40 420,50" stroke="#B8923F" stroke-width="2.5" fill="none"/>
        <circle cx="420" cy="50" r="5" fill="#B8923F"/>
        <text x="14" y="245" font-family="IBM Plex Mono" font-size="11" fill="#657081">XAU/USD</text>
        <text x="330" y="245" font-family="IBM Plex Mono" font-size="11" fill="#B8923F">▲ 0.84%</text>
      </svg>
    </div>
  </div>
</section>

<div class="wrap" style="padding:0 28px 90px;">
  <p style="font-family:'IBM Plex Mono',monospace;font-size:12px;color:#657081;">
    Section Tentang Kami, Produk, Prosedur, dan Edukasi menyusul di tahap pengembangan berikutnya.
  </p>
</div>

@endsection
