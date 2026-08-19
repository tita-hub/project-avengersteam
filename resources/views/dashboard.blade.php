@extends('layouts.app')
@section('content')
<div class="page-header">
    <h1>Dashboard</h1>
</div>

<section class="welcome-card">
    <div class="office-image"><div class="building-placeholder">RIFAN<br><small>FINANCINDO</small></div></div>
    <div class="welcome-copy">
        <h2>Selamat Datang di Rifan<br>Financindo Berjangka Semarang</h2>
        <p>PT Rifan Financindo Berjangka Semarang merupakan salah satu kantor operasional PT Rifan Financindo Berjangka yang bergerak di bidang Perdagangan Berjangka Komoditi. Perusahaan berfokus pada pelayanan dan edukasi kepada masyarakat mengenai perdagangan komoditas dan pasar derivatif di Indonesia.</p>
        <p>Dalam menjalankan kegiatan operasionalnya, PT Rifan Financindo Berjangka Semarang didukung oleh teknologi informasi dan sumber daya manusia yang profesional serta berada dalam pengawasan Badan Pengawas Perdagangan Berjangka Komoditi (BAPPEBTI), dengan kegiatan perdagangan yang terhubung dengan PT Bursa Berjangka Jakarta (BBJ) dan PT Kliring Berjangka Indonesia (KBI).</p>
    </div>
</section>

<section class="news-section">
    <div class="section-heading">
        <h2>Berita Terbaru</h2>
        <div class="heading-actions">
            <form method="POST" action="{{ route('news.sync') }}">
                @csrf
                <button class="sync-btn" type="submit">↻ Perbarui</button>
            </form>
            <a href="{{ route('news.index') }}" class="see-all">Lihat Semua Berita →</a>
        </div>
    </div>

    <div class="news-grid dashboard-news-grid">
        @forelse($news->take(3) as $item)
            <article class="news-card">
                @if($item->image_url)
                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}">
                @else
                    <div class="news-image-placeholder">{{ $item->category }}</div>
                @endif
                <div class="news-card-body">
                    <div class="news-meta">{{ optional($item->published_at)->translatedFormat('d F Y • H:i') ?? '-' }}</div>
                    <h3>{{ $item->title }}</h3>
                    <p>{{ $item->excerpt }}</p>
                    <a class="read-btn" href="{{ route('news.show', $item) }}">⌕ Baca Selengkapnya</a>
                </div>
            </article>
        @empty
            <div class="empty-state">Belum ada berita. Jalankan <code>php artisan news:sync</code>.</div>
        @endforelse
    </div>
</section>
@endsection
