@extends('layouts.app')
@section('content')
<div class="page-header news-page-title"><h1>Isi Berita</h1></div>
<article class="article-card">
    <div class="article-header">
        <div class="article-category">{{ $news->category }}</div>
        <h1>{{ $news->title }}</h1>
        <div class="article-date">{{ optional($news->published_at)->translatedFormat('d F Y • H:i') ?? '-' }} · Sumber: {{ $news->source }}</div>
    </div>

    @if($news->image_url)
        <img class="article-image" src="{{ $news->image_url }}" alt="{{ $news->title }}">
    @endif

    <div class="article-content">
        @if($news->content)
            {!! $news->content !!}
        @else
            <p>{{ $news->excerpt }}</p>
            <p>Konten lengkap belum tersimpan. Silakan buka sumber asli untuk membaca artikel selengkapnya.</p>
        @endif
    </div>

    <div class="article-actions">
        <a class="blue-btn" href="{{ route('news.index') }}">← Kembali ke Halaman Berita</a>
        <a class="source-btn" href="{{ $news->external_url }}" target="_blank" rel="noopener">Buka Newsmaker.id ↗</a>
    </div>
</article>
@endsection
