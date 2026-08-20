@extends('layouts.app')

@section('content')

<div class="news-page">

    <div class="news-page-header">

        <h1>
            Isi Berita
        </h1>

    </div>


    <article class="article-card">

        <header class="article-header">

            @if($news->category)

                <div class="article-category">
                    {{ $news->category }}
                </div>

            @endif


            <h1>
                {{ $news->title }}
            </h1>


            <div class="article-date">

                {{ optional($news->published_at)->translatedFormat('d F Y • H:i') ?? '-' }}

                <span>·</span>

                Sumber:
                {{ $news->source }}

            </div>

        </header>


        @if($news->image_url)

            <img
                src="{{ $news->image_url }}"
                alt="{{ $news->title }}"
                class="article-image"
            >

        @endif


        <div class="article-content">

            @if($news->content)

                {!! $news->content !!}

            @elseif($news->excerpt)

                <p>
                    {{ $news->excerpt }}
                </p>

            @else

                <p>
                    Isi berita belum tersedia.
                </p>

            @endif

        </div>


        <div class="article-actions">

            <a
                href="{{ route('news.index') }}"
                class="blue-btn"
            >
                <i class="bi bi-arrow-left"></i>
                Kembali ke Halaman Berita
            </a>


            @if($news->external_url)

                <a
                    href="{{ $news->external_url }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="source-btn"
                >
                    Buka Newsmaker.id
                    <i class="bi bi-box-arrow-up-right"></i>
                </a>

            @endif

        </div>

    </article>

</div>

@endsection