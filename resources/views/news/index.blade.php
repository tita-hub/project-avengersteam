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


        <div class="pagination-wrap">

            {{ $news->links() }}

        </div>


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