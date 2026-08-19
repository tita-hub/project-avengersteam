@extends('layouts.app')
@section('content')
<div class="page-header news-page-title"><h1>Berita Terbaru</h1></div>
<section class="news-list-card">
    <div class="section-heading centered"><h2>Berita Terbaru</h2></div>
    <div class="news-grid all-news-grid">
        @forelse($news as $item)
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
            <div class="empty-state">Belum ada berita.</div>
        @endforelse
    </div>
    <div class="pagination-wrap">{{ $news->links() }}</div>
    <div class="bottom-actions"><a class="blue-btn" href="{{ route('dashboard') }}">← Kembali</a></div>
</section>
@endsection
