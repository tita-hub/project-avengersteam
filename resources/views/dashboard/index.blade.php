@extends('layouts.app')

@section('content')

<div class="dashboard-page">

    {{-- ==========================================
         TOP NEWS TICKER + JAM WIB
    =========================================== --}}
    @if($tickerNews->isNotEmpty())
        <div class="dashboard-topbar">

            <div class="ticker-wrap">

                <span class="ticker-label">
                    <i class="bi bi-broadcast"></i>
                    Top News
                </span>

                <div class="ticker-track">
                    <div class="ticker-content">

                        @foreach($tickerNews as $t)
                            <a href="{{ route('news.show', $t) }}" class="ticker-item">
                                {{ $t->title }}
                            </a>
                            <span class="ticker-dot">&bull;</span>
                        @endforeach

                        {{-- diulang supaya animasinya nyambung mulus (seamless loop) --}}
                        @foreach($tickerNews as $t)
                            <a href="{{ route('news.show', $t) }}" class="ticker-item" aria-hidden="true" tabindex="-1">
                                {{ $t->title }}
                            </a>
                            <span class="ticker-dot" aria-hidden="true">&bull;</span>
                        @endforeach

                    </div>
                </div>

            </div>

            <div class="dashboard-clock" id="dashboardClock">
                <i class="bi bi-clock-history"></i>
                <span id="clockDate">--</span>
                <span class="clock-sep">|</span>
                <span id="clockTime">--:--:--</span>
                <span class="clock-tz">WIB</span>
            </div>

        </div>
    @endif

    {{-- ==========================================
         WELCOME SECTION
    =========================================== --}}
    <section class="welcome-card">

        <div class="welcome-image">

            <div class="building-placeholder">
                <i class="bi bi-building"></i>
            </div>

        </div>

        <div class="welcome-content">

            <h1>
                Selamat Datang di Rifan
                <br>
                Financindo Berjangka Semarang
            </h1>

            <p>
                PT Rifan Financindo Berjangka Semarang merupakan salah satu
                kantor operasional PT Rifan Financindo Berjangka yang bergerak
                di bidang Perdagangan Berjangka Komoditi. Perusahaan berfokus
                pada pelayanan dan edukasi kepada masyarakat mengenai
                perdagangan komoditas dan pasar derivatif di Indonesia.
            </p>

            <p>
                Dalam menjalankan kegiatan operasionalnya, PT Rifan Financindo
                Berjangka didukung oleh teknologi informasi dan sumber daya
                manusia yang profesional serta berada dalam pengawasan Badan
                Pengawas Perdagangan Berjangka Komoditi (BAPPEBTI), dengan
                kegiatan perdagangan yang terhubung dengan PT Bursa Berjangka
                Jakarta (BBJ) dan PT Kliring Berjangka Indonesia (KBI).
            </p>

        </div>

    </section>


    {{-- ==========================================
         BERITA TERBARU
    =========================================== --}}
    <section class="dashboard-news">

        <div class="section-header">

            <h2>
                Berita Terbaru
            </h2>

            <a
                href="{{ route('news.index') }}"
                class="see-all-news"
            >
                Lihat Semua Berita
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>


        <div class="news-grid">

            @forelse($latestNews as $item)

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

    </section>

</div>

@if($tickerNews->isNotEmpty())
<script>
    (function () {
        const dateEl = document.getElementById('clockDate');
        const timeEl = document.getElementById('clockTime');

        if (!dateEl || !timeEl) return;

        function updateClock() {
            const now = new Date();

            dateEl.textContent = now.toLocaleDateString('id-ID', {
                timeZone: 'Asia/Jakarta',
                day: '2-digit',
                month: 'long',
                year: 'numeric',
            });

            timeEl.textContent = now.toLocaleTimeString('id-ID', {
                timeZone: 'Asia/Jakarta',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false,
            });
        }

        updateClock();
        setInterval(updateClock, 1000);
    })();
</script>
@endif

@endsection