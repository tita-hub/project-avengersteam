@extends('layouts.app')

@section('title', 'Data Historis — Analisis Pasar')

@section('content')
<div class="analysis-page">
    <section class="analysis-hero">
        <p class="analysis-eyebrow">Analisis Pasar / Data Historis</p>
        <h1>Data Historis</h1>
        <p>Telusuri data harga periode sebelumnya untuk membantu membaca tren, volatilitas, dan area pergerakan harga. Data historis tidak menjamin hasil di masa mendatang.</p>
    </section>
    
    <h2 class="analysis-section-title">Pilih parameter data</h2>
    <div class="analysis-card">
      <div class="analysis-form">
        <div class="analysis-field"><label for="historis-instrumen">Instrumen</label><select id="historis-instrumen"><option>Emas (XAU/USD)</option><option>Minyak (Crude Oil)</option><option>Hang Seng</option><option>Indeks saham</option></select></div>
        <div class="analysis-field"><label for="historis-periode">Periode</label><select id="historis-periode"><option>1 bulan</option><option>3 bulan</option><option>6 bulan</option><option>1 tahun</option></select></div>
        <div class="analysis-field"><label for="historis-interval">Interval</label><select id="historis-interval"><option>Harian</option><option>Mingguan</option><option>Bulanan</option></select></div>
      </div>
      <div class="analysis-result" id="historis-status">Parameter siap dipilih. Data harga belum terhubung ke penyedia data pada versi ini.</div>
    </div>
    <h2 class="analysis-section-title">Kolom data yang disarankan</h2>
    <div class="analysis-table-wrap"><table class="analysis-table"><thead><tr><th>Tanggal / waktu</th><th>Open</th><th>High</th><th>Low</th><th>Close</th><th>Volume</th></tr></thead><tbody><tr><td colspan="6">Data akan tampil setelah sumber data historis diintegrasikan.</td></tr></tbody></table></div>
    <div class="analysis-notice"><strong>Integrasi berikutnya:</strong> hubungkan endpoint atau API penyedia data yang berlisensi, tetapkan zona waktu, interval, dan kebijakan batas permintaan.</div>

</div>
@endsection
