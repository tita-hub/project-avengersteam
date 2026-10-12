@extends('layouts.app')

@section('title', 'Kalender Ekonomi — Analisis Pasar')

@section('content')
<div class="analysis-page">
    <section class="analysis-hero">
        <p class="analysis-eyebrow">Analisis Pasar / Kalender Ekonomi</p>
        <h1>Kalender Ekonomi</h1>
        <p>Lihat jenis agenda ekonomi yang umumnya menjadi perhatian pelaku pasar dan siapkan rencana sebelum rilis data berdampak tinggi.</p>
    </section>
    
    <h2 class="analysis-section-title">Agenda yang perlu diperhatikan</h2>
    <div class="analysis-table-wrap"><table class="analysis-table"><thead><tr><th>Indikator</th><th>Wilayah</th><th>Potensi dampak</th><th>Hal yang diamati</th></tr></thead><tbody>
    <tr><td>Inflasi (CPI)</td><td>AS / global</td><td>Menengah–tinggi</td><td>Aktual dibanding konsensus dan data sebelumnya</td></tr>
    <tr><td>Keputusan suku bunga</td><td>Bank sentral</td><td>Tinggi</td><td>Keputusan, proyeksi, dan konferensi pers</td></tr>
    <tr><td>Data tenaga kerja</td><td>AS / global</td><td>Menengah–tinggi</td><td>Perubahan tenaga kerja, upah, dan tingkat pengangguran</td></tr>
    <tr><td>PMI / aktivitas bisnis</td><td>Berbagai negara</td><td>Menengah</td><td>Indikasi ekspansi atau kontraksi aktivitas ekonomi</td></tr>
    </tbody></table></div>
    <div class="analysis-notice"><strong>Penting:</strong> Daftar di atas adalah contoh indikator, bukan jadwal rilis terkini. Integrasi sumber kalender dan zona waktu diperlukan sebelum halaman digunakan sebagai kalender live.</div>

</div>
@endsection
