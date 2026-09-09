@extends('layouts.app')

@section('content')

<div class="news-page">

    <div class="news-page-header">

        <h1>
            Berita Terbaru
        </h1>

    </div>


    <section class="news-list-card">

        <div class="news-list-title">
            <h2>
                Berita Terbaru
            </h2>
        </div>


        <div class="news-grid all-news-grid">

            @forelse($news as $item)

                <article class="news-card">

                    @if($item->image_url)

                        <img
                            src="{{ $item->image_url }}"
                            alt="{{ $item->title }}"
                            class="news-card-image"
                        >

                    @else

                        <div class="news-card-placeholder">
                            <i class="bi bi-newspaper"></i>
                        </div>

                    @endif


                    <div class="news-card-body">

                        <div class="news-meta">
                            {{ optional($item->published_at)->translatedFormat('d F Y • H:i') ?? '-' }}
                        </div>


                        <h3>
                            {{ $item->title }}
                        </h3>


                        <p>
                            {{ \Illuminate\Support\Str::limit($item->excerpt, 120) }}
                        </p>


                        <a
                            href="{{ route('news.show', $item) }}"
                            class="read-btn"
                        >
                            <i class="bi bi-search"></i>
                            Baca Selengkapnya
                        </a>

                    </div>

                </article>

            @empty

                <div class="empty-state">

                    <i class="bi bi-newspaper"></i>

                    <p>
                        Belum ada berita.
                    </p>

                </div>

            @endforelse

        </div>


        @if($news->hasPages())

    <nav class="news-pagination" aria-label="Navigasi berita">

        {{-- PREVIOUS --}}
        @if($news->onFirstPage())

            <span
                class="news-page-btn disabled"
                aria-disabled="true"
            >
                <i class="bi bi-chevron-left"></i>
                Previous
            </span>

        @else

            <a
                href="{{ $news->previousPageUrl() }}"
                class="news-page-btn"
                rel="prev"
            >
                <i class="bi bi-chevron-left"></i>
                Previous
            </a>

        @endif


        {{-- NOMOR HALAMAN --}}
        <div class="news-page-numbers">

            @foreach($news->getUrlRange(1, $news->lastPage()) as $page => $url)

                @if($page == $news->currentPage())

                    <span
                        class="news-page-number active"
                        aria-current="page"
                    >
                        {{ $page }}
                    </span>

                @else

                    <a
                        href="{{ $url }}"
                        class="news-page-number"
                    >
                        {{ $page }}
                    </a>

                @endif

            @endforeach

        </div>


        {{-- NEXT --}}
        @if($news->hasMorePages())

            <a
                href="{{ $news->nextPageUrl() }}"
                class="news-page-btn"
                rel="next"
            >
                Next
                <i class="bi bi-chevron-right"></i>
            </a>

        @else

            <span
                class="news-page-btn disabled"
                aria-disabled="true"
            >
                Next
                <i class="bi bi-chevron-right"></i>
            </span>

        @endif

    </nav>


    {{-- JUMLAH BERITA --}}
    <div class="pagination-summary">

        Menampilkan

        <strong>{{ $news->firstItem() }}</strong>

        –

        <strong>{{ $news->lastItem() }}</strong>

        dari

        <strong>{{ $news->total() }}</strong>

        berita

    </div>

@endif


        <div class="bottom-actions">

            <a
                href="{{ route('dashboard') }}"
                class="blue-btn"
            >
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>

        </div>

    </section>

</div>

@endsection