@extends('layouts.app')

@section('title', 'Pivot & Fibonacci — Analisis Pasar')

@section('content')
<div class="analysis-page">
    <section class="analysis-hero">
        <p class="analysis-eyebrow">Analisis Pasar / Alat Teknikal</p>
        <h1>Pivot & Fibonacci</h1>
        <p>Gunakan level pivot dan Fibonacci sebagai alat bantu untuk memetakan area support dan resistance potensial. Level teknikal bukan kepastian arah harga.</p>
    </section>
    
    <h2 class="analysis-section-title">Kalkulator level teknikal</h2>
    <div class="analysis-card">
      <p>Masukkan harga High, Low, dan Close dari periode sebelumnya untuk menghitung pivot standar serta level Fibonacci retracement dari rentang harga tersebut.</p>
      <div class="analysis-form">
        <div class="analysis-field"><label for="pivot-high">High</label><input type="number" step="any" id="pivot-high" placeholder="Contoh: 2400.00"></div>
        <div class="analysis-field"><label for="pivot-low">Low</label><input type="number" step="any" id="pivot-low" placeholder="Contoh: 2350.00"></div>
        <div class="analysis-field"><label for="pivot-close">Close</label><input type="number" step="any" id="pivot-close" placeholder="Contoh: 2380.00"></div>
      </div>
      <p style="margin-top:16px"><button type="button" class="analysis-btn" id="hitung-level-teknikal">Hitung Level</button></p>
      <div class="analysis-result" id="hasil-level-teknikal" aria-live="polite">Hasil perhitungan akan muncul di sini. Angka contoh di atas hanya petunjuk format, bukan data pasar aktual.</div>
    </div>
    <div class="analysis-grid">
      <article class="analysis-card"><span class="analysis-card-icon"><i class="bi bi-bullseye"></i></span><h2>Pivot Point</h2><p>Pivot standar dihitung dari (High + Low + Close) ÷ 3. Level turunannya dapat membantu memetakan area support dan resistance.</p></article>
      <article class="analysis-card"><span class="analysis-card-icon"><i class="bi bi-bezier2"></i></span><h2>Fibonacci Retracement</h2><p>Rasio yang sering diamati antara lain 23,6%, 38,2%, 50%, 61,8%, dan 78,6% dari rentang high–low.</p></article>
      <article class="analysis-card"><span class="analysis-card-icon"><i class="bi bi-shield-check"></i></span><h2>Manajemen risiko</h2><p>Konfirmasi level dengan konteks pasar dan rencana risiko. Jangan menggunakan satu indikator sebagai sinyal tunggal.</p></article>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
      const button = document.getElementById('hitung-level-teknikal');
      if (!button) return;
      button.addEventListener('click', function () {
        const high = Number(document.getElementById('pivot-high').value);
        const low = Number(document.getElementById('pivot-low').value);
        const close = Number(document.getElementById('pivot-close').value);
        const result = document.getElementById('hasil-level-teknikal');
        if (![high, low, close].every(Number.isFinite) || !document.getElementById('pivot-high').value || !document.getElementById('pivot-low').value || !document.getElementById('pivot-close').value || high <= low || close < low || close > high) {
          result.textContent = 'Masukkan angka yang valid: High harus lebih besar dari Low, dan Close berada di antara Low dan High.'; return;
        }
        const p = (high + low + close) / 3;
        const r1 = 2 * p - low, s1 = 2 * p - high, r2 = p + (high - low), s2 = p - (high - low);
        const range = high - low;
        const fmt = n => n.toLocaleString('id-ID', {minimumFractionDigits: 2, maximumFractionDigits: 5});
        result.innerHTML = '<strong>Pivot standar</strong>: ' + fmt(p) + '<br><strong>Resistance</strong>: R1 ' + fmt(r1) + ' · R2 ' + fmt(r2) + '<br><strong>Support</strong>: S1 ' + fmt(s1) + ' · S2 ' + fmt(s2) + '<br><strong>Fibonacci dari Low ke High</strong>: 23,6% ' + fmt(low + range * .236) + ' · 38,2% ' + fmt(low + range * .382) + ' · 50% ' + fmt(low + range * .5) + ' · 61,8% ' + fmt(low + range * .618) + ' · 78,6% ' + fmt(low + range * .786) + '<br><small>Perhitungan matematis dari angka yang dimasukkan; bukan rekomendasi transaksi.</small>';
      });
    });
    </script>

</div>
@endsection
