@extends('layouts.app')

@section('content')

<style>

/* ============================================================
   DASHBOARD HERO
   KHUSUS HALAMAN DASHBOARD
   ============================================================ */

.dashboard-page .dashboard-hero {
    position: relative;

    width: 100%;
    min-height: 480px;

    margin-bottom: 30px;

    overflow: hidden;

    border-radius: 24px;

    background:
        linear-gradient(
            110deg,
            rgba(255, 255, 255, 0.98) 0%,
            rgba(255, 255, 255, 0.96) 38%,
            rgba(255, 255, 255, 0.82) 62%,
            rgba(255, 255, 255, 0.55) 100%
        );

    border: 1px solid #e1e5e3;

    box-shadow:
        0 18px 50px rgba(25, 35, 30, 0.08);

    isolation: isolate;
}


/* ============================================================
   BACKGROUND
   ============================================================ */

.dashboard-page .hero-background {
    position: absolute;

    inset: 0;

    z-index: -4;

    background-image:
        url("{{ asset('images/produk/emas.png') }}");

    background-size: 58% auto;

    background-position:
        right -50px center;

    background-repeat: no-repeat;

    opacity: 0.22;

    filter: saturate(0.9);

    transform: scale(1.04);

    transition:
        transform 1.2s ease,
        opacity 0.8s ease;
}

.dashboard-page .dashboard-hero:hover .hero-background {
    transform: scale(1.07);

    opacity: 0.27;
}


/* ============================================================
   GRID DEKORASI
   ============================================================ */

.dashboard-page .hero-grid {
    position: absolute;

    inset: 0;

    z-index: -3;

    opacity: 0.25;

    background-image:
        linear-gradient(
            rgba(0, 168, 79, 0.08) 1px,
            transparent 1px
        ),
        linear-gradient(
            90deg,
            rgba(0, 168, 79, 0.08) 1px,
            transparent 1px
        );

    background-size:
        38px 38px;

    mask-image:
        linear-gradient(
            90deg,
            transparent 0%,
            #000000 48%,
            #000000 100%
        );

    -webkit-mask-image:
        linear-gradient(
            90deg,
            transparent 0%,
            #000000 48%,
            #000000 100%
        );
}


/* ============================================================
   COLOR GLOW
   ============================================================ */

.dashboard-page .hero-glow {
    position: absolute;

    z-index: -2;

    width: 230px;
    height: 230px;

    border-radius: 50%;

    filter: blur(55px);

    opacity: 0.14;

    pointer-events: none;
}

.dashboard-page .hero-glow-red {
    right: 25%;
    top: -80px;

    background: #c62828;
}

.dashboard-page .hero-glow-green {
    right: -70px;
    bottom: -90px;

    background: #00a84f;
}


/* ============================================================
   HERO CONTENT
   ============================================================ */

.dashboard-page .hero-content {
    position: relative;

    z-index: 3;

    width: 58%;

    min-height: 480px;

    display: flex;

    flex-direction: column;

    justify-content: center;

    padding:
        55px
        35px
        55px
        55px;

    box-sizing: border-box;
}


/* ============================================================
   BADGE
   ============================================================ */

.dashboard-page .hero-badge {
    display: inline-flex;

    align-items: center;

    gap: 9px;

    width: fit-content;

    margin-bottom: 18px;

    padding:
        7px
        13px;

    border-radius: 30px;

    background: rgba(0, 168, 79, 0.08);

    border:
        1px solid rgba(0, 168, 79, 0.18);

    color: #008f44;

    font-size: 9px;

    font-weight: 800;

    letter-spacing: 1.2px;

    text-transform: uppercase;
}

.dashboard-page .hero-badge-dot {
    width: 7px;
    height: 7px;

    border-radius: 50%;

    background: #00a84f;

    box-shadow:
        0 0 0 4px rgba(0, 168, 79, 0.10);

    animation:
        heroPulse 2s ease-in-out infinite;
}


/* ============================================================
   HERO TITLE
   ============================================================ */

.dashboard-page .dashboard-hero h1 {
    max-width: 680px;

    margin: 0 0 20px;

    color: #111111;

    font-size: clamp(31px, 3.4vw, 52px);

    font-weight: 800;

    line-height: 1.08;

    letter-spacing: -1.3px;
}

.dashboard-page .dashboard-hero h1 span {
    position: relative;

    color: #b52323;
}

.dashboard-page .dashboard-hero h1 span::after {
    content: "";

    position: absolute;

    left: 0;
    right: 0;

    bottom: -4px;

    height: 4px;

    border-radius: 10px;

    background:
        linear-gradient(
            90deg,
            #c62828 0%,
            #00a84f 100%
        );

    opacity: 0.85;
}


/* ============================================================
   DESCRIPTION
   ============================================================ */

.dashboard-page .dashboard-hero p {
    max-width: 610px;

    margin: 0;

    color: #555b58;

    font-size: 14px;

    line-height: 1.8;
}


/* ============================================================
   BUTTONS
   ============================================================ */

.dashboard-page .hero-actions {
    display: flex;

    align-items: center;

    gap: 11px;

    margin-top: 27px;
}

.dashboard-page .hero-btn {
    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 9px;

    min-height: 44px;

    padding:
        0 18px;

    border-radius: 10px;

    text-decoration: none;

    font-size: 12px;

    font-weight: 750;

    transition:
        transform 0.25s ease,
        box-shadow 0.25s ease,
        background 0.25s ease;
}

.dashboard-page .hero-btn i {
    font-size: 13px;

    transition:
        transform 0.25s ease;
}


/* PRIMARY */

.dashboard-page .hero-btn-primary {
    background: #00a84f;

    color: #ffffff;

    box-shadow:
        0 8px 20px rgba(0, 168, 79, 0.20);
}

.dashboard-page .hero-btn-primary:hover {
    background: #008f44;

    color: #ffffff;

    transform: translateY(-2px);

    box-shadow:
        0 12px 25px rgba(0, 168, 79, 0.27);
}

.dashboard-page .hero-btn-primary:hover i {
    transform: translateX(3px);
}


/* SECONDARY */

.dashboard-page .hero-btn-secondary {
    background: #ffffff;

    color: #242424;

    border:
        1px solid #d9dedb;
}

.dashboard-page .hero-btn-secondary:hover {
    color: #b52323;

    border-color: rgba(198, 40, 40, 0.35);

    transform: translateY(-2px);

    box-shadow:
        0 10px 24px rgba(0, 0, 0, 0.07);
}

.dashboard-page .hero-btn-secondary:hover i {
    transform:
        translate(2px, -2px);
}


/* ============================================================
   HERO INFO
   ============================================================ */

.dashboard-page .hero-info {
    display: flex;

    align-items: center;

    gap: 18px;

    margin-top: 32px;
}

.dashboard-page .hero-info-item {
    display: flex;

    align-items: center;

    gap: 10px;
}

.dashboard-page .hero-info-icon {
    width: 34px;
    height: 34px;

    display: flex;

    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 9px;

    background: #ffffff;

    border:
        1px solid #e1e5e3;

    color: #00a84f;

    box-shadow:
        0 5px 14px rgba(0, 0, 0, 0.04);
}

.dashboard-page .hero-info-item strong {
    display: block;

    margin-bottom: 2px;

    color: #222222;

    font-size: 10px;

    font-weight: 800;
}

.dashboard-page .hero-info-item small {
    display: block;

    color: #777d79;

    font-size: 9px;
}

.dashboard-page .hero-info-divider {
    width: 1px;

    height: 30px;

    background: #dfe3e1;
}


/* ============================================================
   HERO VISUAL
   ============================================================ */

.dashboard-page .hero-visual {
    position: absolute;

    z-index: 2;

    right: 0;
    top: 0;

    width: 48%;
    height: 100%;

    display: flex;

    align-items: center;
    justify-content: center;

    pointer-events: none;
}


/* ============================================================
   CIRCLE
   ============================================================ */

.dashboard-page .hero-visual-circle {
    position: absolute;

    width: 365px;
    height: 365px;

    border-radius: 50%;

    background:
        linear-gradient(
            145deg,
            rgba(0, 168, 79, 0.08),
            rgba(198, 40, 40, 0.09)
        );

    border:
        1px solid rgba(0, 168, 79, 0.14);

    box-shadow:
        inset 0 0 50px rgba(255, 255, 255, 0.85);

    animation:
        heroFloat 6s ease-in-out infinite;
}


/* ============================================================
   GOLD IMAGE
   ============================================================ */

.dashboard-page .hero-gold-image {
    position: relative;

    z-index: 3;

    width: 350px;

    transform:
        translate(12px, 20px);

    filter:
        drop-shadow(
            0 25px 25px
            rgba(70, 45, 0, 0.18)
        );

    animation:
        heroGoldFloat 5s ease-in-out infinite;
}

.dashboard-page .hero-gold-image img {
    display: block;

    width: 100%;
    height: auto;

    object-fit: contain;
}


/* ============================================================
   FLOATING MARKET CARD
   ============================================================ */

.dashboard-page .hero-market-card {
    position: absolute;

    z-index: 5;

    display: flex;

    flex-direction: column;

    padding: 13px 16px;

    background:
        rgba(255, 255, 255, 0.92);

    border:
        1px solid rgba(220, 225, 222, 0.9);

    border-radius: 13px;

    box-shadow:
        0 14px 35px rgba(25, 35, 30, 0.10);

    backdrop-filter:
        blur(10px);

    -webkit-backdrop-filter:
        blur(10px);
}

.dashboard-page .hero-market-card-top {
    top: 92px;
    right: 42px;

    min-width: 112px;

    animation:
        heroCardFloat 5s ease-in-out infinite;
}

.dashboard-page .hero-market-card-bottom {
    bottom: 72px;
    right: 55px;

    flex-direction: row;

    align-items: center;

    gap: 9px;

    animation:
        heroCardFloat 5s ease-in-out infinite 1s;
}

.dashboard-page .market-card-label {
    margin-bottom: 4px;

    color: #00a84f;

    font-size: 8px;

    font-weight: 800;

    letter-spacing: 1.2px;
}

.dashboard-page .hero-market-card strong {
    color: #222222;

    font-size: 16px;

    font-weight: 800;
}

.dashboard-page .market-card-status {
    display: flex;

    align-items: center;

    gap: 4px;

    margin-top: 3px;

    color: #6f756f;

    font-size: 8px;
}

.dashboard-page .market-card-status i {
    color: #00a84f;
}

.dashboard-page .market-mini-icon {
    width: 31px;
    height: 31px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 8px;

    background: rgba(198, 40, 40, 0.08);

    color: #c62828;

    font-size: 12px;
}

.dashboard-page .hero-market-card-bottom small {
    display: block;

    margin-bottom: 2px;

    color: #777d79;

    font-size: 8px;
}

.dashboard-page .hero-market-card-bottom strong {
    display: block;

    color: #222222;

    font-size: 11px;
}


/* ============================================================
   BOTTOM LINE
   ============================================================ */

.dashboard-page .hero-bottom-line {
    position: absolute;

    left: 55px;
    bottom: 0;

    width: 190px;
    height: 4px;

    border-radius: 5px 5px 0 0;

    background:
        linear-gradient(
            90deg,
            #c62828 0%,
            #00a84f 100%
        );
}


/* ============================================================
   ANIMATION
   ============================================================ */

@keyframes heroPulse {

    0%,
    100% {
        opacity: 1;

        transform: scale(1);
    }

    50% {
        opacity: 0.55;

        transform: scale(0.82);
    }
}

@keyframes heroFloat {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-8px);
    }
}

@keyframes heroGoldFloat {

    0%,
    100% {
        transform:
            translate(12px, 20px);
    }

    50% {
        transform:
            translate(12px, 11px);
    }
}

@keyframes heroCardFloat {

    0%,
    100% {
        transform:
            translateY(0);
    }

    50% {
        transform:
            translateY(-7px);
    }
}


/* ============================================================
   RESPONSIVE HERO
   ============================================================ */

@media (max-width: 900px) {

    .dashboard-page .dashboard-hero {
        min-height: 590px;
    }

    .dashboard-page .hero-content {
        width: 100%;

        min-height: 590px;

        padding:
            45px
            40px
            250px;
    }

    .dashboard-page .hero-visual {
        width: 100%;

        height: 270px;

        top: auto;
        bottom: -10px;

        align-items: flex-end;
    }

    .dashboard-page .hero-visual-circle {
        width: 245px;
        height: 245px;
    }

    .dashboard-page .hero-gold-image {
        width: 235px;

        transform:
            translate(0, 18px);
    }

    .dashboard-page .hero-market-card-top {
        top: 20px;
        right: 20%;
    }

    .dashboard-page .hero-market-card-bottom {
        bottom: 28px;
        right: 11%;
    }
}


@media (max-width: 650px) {

    .dashboard-page .dashboard-hero {
        min-height: 650px;

        border-radius: 18px;
    }

    .dashboard-page .hero-content {
        min-height: 650px;

        padding:
            32px
            24px
            250px;
    }

    .dashboard-page .dashboard-hero h1 {
        font-size: 31px;

        letter-spacing: -0.7px;
    }

    .dashboard-page .dashboard-hero p {
        font-size: 12px;

        line-height: 1.7;
    }

    .dashboard-page .hero-actions {
        flex-direction: column;

        align-items: stretch;

        width: 100%;
    }

    .dashboard-page .hero-btn {
        width: 100%;

        box-sizing: border-box;
    }

    .dashboard-page .hero-info {
        gap: 10px;

        margin-top: 20px;
    }

    .dashboard-page .hero-info-divider {
        display: none;
    }

    .dashboard-page .hero-info-item {
        flex: 1;
    }

    .dashboard-page .hero-info-item small {
        font-size: 8px;
    }

    .dashboard-page .hero-visual {
        height: 245px;
    }

    .dashboard-page .hero-visual-circle {
        width: 215px;
        height: 215px;
    }

    .dashboard-page .hero-gold-image {
        width: 205px;

        transform:
            translate(0, 15px);
    }

    .dashboard-page .hero-market-card-top {
        top: 8px;
        right: 18px;
    }

    .dashboard-page .hero-market-card-bottom {
        bottom: 15px;
        left: 18px;
        right: auto;
    }

    .dashboard-page .hero-bottom-line {
        left: 24px;

        width: 130px;
    }
}

</style>

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
     HERO DASHBOARD
    =========================================== --}}
    <section class="dashboard-hero">

        {{-- Background decorative elements --}}
        <div class="hero-bg-grid"></div>
        <div class="hero-red-glow"></div>
        <div class="hero-green-glow"></div>

        {{-- Faded market candlestick chart --}}
        <div class="hero-candlestick-bg" aria-hidden="true">
            <svg viewBox="0 0 900 360" preserveAspectRatio="none">
                <defs>
                    <linearGradient id="heroChartFade" x1="0" y1="0" x2="1" y2="0">
                        <stop offset="0%" stop-color="#00a84f" stop-opacity="0" />
                        <stop offset="28%" stop-color="#00a84f" stop-opacity="0.18" />
                        <stop offset="70%" stop-color="#00a84f" stop-opacity="0.30" />
                        <stop offset="100%" stop-color="#00a84f" stop-opacity="0.10" />
                    </linearGradient>
                </defs>

                <g class="chart-grid">
                    <path d="M0 70 H900 M0 145 H900 M0 220 H900 M0 295 H900" />
                    <path d="M100 0 V360 M220 0 V360 M340 0 V360 M460 0 V360 M580 0 V360 M700 0 V360 M820 0 V360" />
                </g>

                <g class="chart-candles">
                    <g class="candle up"><path d="M75 245 V180 M68 198 H82 V238 H68 Z" /></g>
                    <g class="candle down"><path d="M120 225 V145 M113 158 H127 V214 H113 Z" /></g>
                    <g class="candle up"><path d="M165 205 V125 M158 140 H172 V195 H158 Z" /></g>
                    <g class="candle up"><path d="M210 185 V105 M203 116 H217 V172 H203 Z" /></g>
                    <g class="candle down"><path d="M255 205 V118 M248 130 H262 V194 H248 Z" /></g>
                    <g class="candle up"><path d="M300 175 V92 M293 105 H307 V163 H293 Z" /></g>
                    <g class="candle up"><path d="M345 160 V72 M338 84 H352 V148 H338 Z" /></g>
                    <g class="candle down"><path d="M390 175 V90 M383 103 H397 V166 H383 Z" /></g>
                    <g class="candle up"><path d="M435 145 V58 M428 72 H442 V134 H428 Z" /></g>
                    <g class="candle up"><path d="M480 130 V45 M473 57 H487 V120 H473 Z" /></g>
                    <g class="candle down"><path d="M525 148 V63 M518 76 H532 V138 H518 Z" /></g>
                    <g class="candle up"><path d="M570 120 V35 M563 48 H577 V110 H563 Z" /></g>
                    <g class="candle up"><path d="M615 105 V22 M608 34 H622 V95 H608 Z" /></g>
                    <g class="candle down"><path d="M660 120 V40 M653 52 H667 V110 H653 Z" /></g>
                    <g class="candle up"><path d="M705 92 V16 M698 28 H712 V82 H698 Z" /></g>
                    <g class="candle up"><path d="M750 76 V8 M743 20 H757 V66 H743 Z" /></g>
                    <g class="candle down"><path d="M795 96 V28 M788 40 H802 V88 H788 Z" /></g>
                    <g class="candle up"><path d="M840 65 V4 M833 16 H847 V55 H833 Z" /></g>
                </g>

                <path class="chart-trend" d="M35 270 C135 250 155 225 235 205 C315 185 345 155 425 150 C500 145 525 110 600 105 C670 100 700 75 765 70 C815 66 845 40 875 22" />
                <path class="chart-arrow" d="M820 82 L875 22 L850 31 M875 22 L868 50" />
            </svg>
        </div>

        {{-- Decorative market line --}}
        <div class="hero-market-line">
            <svg viewBox="0 0 900 260" preserveAspectRatio="none">
                <path
                    d="M0 210
                    C70 190 90 220 150 175
                    C210 130 225 190 285 145
                    C345 100 365 150 420 115
                    C480 75 500 135 555 90
                    C610 45 650 105 700 65
                    C755 25 800 80 900 25"
                />
            </svg>
        </div>


        {{-- Main Hero Content --}}
        <div class="hero-content">

            <div class="hero-label">
                <span class="hero-label-dot"></span>
                PT RIFAN FINANCINDO BERJANGKA
            </div>


            <h1>
                Selamat Datang di
                <span>Rifan Financindo</span>
                Berjangka Semarang
            </h1>


            <p class="hero-description">
                Perdagangan Berjangka Komoditi dengan layanan profesional,
                edukasi yang informatif, dan dukungan teknologi untuk membantu
                masyarakat memahami dinamika pasar.
            </p>


            <div class="hero-actions">

                <a
                    href="{{ route('produk.index') }}"
                    class="hero-btn hero-btn-primary"
                >
                    Lihat Produk
                    <i class="bi bi-arrow-right"></i>
                </a>

                <a
                    href="{{ route('edukasi.umum') }}"
                    class="hero-btn hero-btn-secondary"
                >
                    Pelajari Lebih Lanjut
                    <i class="bi bi-arrow-up-right"></i>
                </a>

            </div>


            {{-- Small information points --}}
            <div class="hero-info-row">

                <div class="hero-info-item">
                    <span class="hero-info-icon">
                        <i class="bi bi-shield-check"></i>
                    </span>

                    <div>
                        <strong>Terpercaya</strong>
                        <small>Perdagangan terregulasi</small>
                    </div>
                </div>


                <div class="hero-info-item">
                    <span class="hero-info-icon">
                        <i class="bi bi-graph-up-arrow"></i>
                    </span>

                    <div>
                        <strong>Market Insight</strong>
                        <small>Informasi pasar terkini</small>
                    </div>
                </div>


                <div class="hero-info-item">
                    <span class="hero-info-icon">
                        <i class="bi bi-mortarboard"></i>
                    </span>

                    <div>
                        <strong>Edukasi</strong>
                        <small>Informasi untuk nasabah</small>
                    </div>
                </div>

            </div>

        </div>


        {{-- ==========================================
            GOLD VISUAL
        =========================================== --}}
        <div class="hero-visual">

            {{-- Decorative circles --}}
            <div class="hero-circle hero-circle-one"></div>
            <div class="hero-circle hero-circle-two"></div>
            <div class="hero-circle hero-circle-three"></div>


            {{-- Floating market badge --}}
            <div class="hero-market-badge">

                <span>MARKET</span>

                <strong>GOLD</strong>

                <small>
                    <i class="bi bi-arrow-up-right"></i>
                    Market Instrument
                </small>

            </div>


            {{-- Gold image --}}
            <div class="hero-gold-wrapper">

                <div class="hero-gold-glow"></div>

                <img
                    src="{{ asset('images/produk/gold_image.png') }}"
                    alt="Gold Market"
                    class="hero-gold-image"
                >

            </div>


            {{-- Floating market cards --}}
            <div class="hero-floating-card hero-card-price">

                <span>GOLD</span>

                <strong>
                    MARKET
                </strong>

                <small>
                    Live Instrument
                </small>

            </div>


            <div class="hero-floating-card hero-card-trend">

                <i class="bi bi-graph-up-arrow"></i>

                <div>
                    <strong>Market</strong>
                    <span>Insight</span>
                </div>

            </div>


            {{-- Decorative dots --}}
            <span class="hero-dot hero-dot-one"></span>
            <span class="hero-dot hero-dot-two"></span>
            <span class="hero-dot hero-dot-three"></span>

        </div>


        {{-- Bottom accent --}}
        <div class="hero-bottom-line"></div>

    </section>

   {{-- ==========================================
     MARKET DATA
========================================== --}}
<section class="dashboard-market-data">

    {{-- =====================================================
         MARKET CHART — FULL WIDTH
    ====================================================== --}}
    <div class="market-chart-card">

        <div class="market-card-header">

            <div>
                <span class="market-card-label">
                    MARKET CHART
                </span>

                <h2>
                    GOLD / XUL10
                </h2>
            </div>

            <span class="market-symbol-badge">
                XAUUSD
            </span>

        </div>


        <div class="market-chart-widget">

            <div
                class="tradingview-widget-container"
                style="height:100%;width:100%"
            >

                <div
                    class="tradingview-widget-container__widget"
                    style="height:100%;width:100%"
                ></div>

                <script
                    type="text/javascript"
                    src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js"
                    async
                >
                {
                    "autosize": true,
                    "width": "100%",
                    "height": "100%",
                    "symbol": "OANDA:XAUUSD",
                    "interval": "5",
                    "timezone": "Asia/Jakarta",
                    "theme": "light",
                    "style": "1",
                    "locale": "en",
                    "enable_publishing": false,
                    "allow_symbol_change": true,
                    "hide_top_toolbar": false,
                    "hide_side_toolbar": false,
                    "hide_legend": false,
                    "save_image": false,
                    "calendar": false,
                    "hide_volume": false,
                    "support_host": "https://www.tradingview.com"
                }
                </script>

            </div>

        </div>

    </div>


    {{-- =====================================================
         BOTTOM ROW — 70% / 30%
    ====================================================== --}}
    <div class="market-bottom-grid">


        {{-- =================================================
             HARGA PASAR — 70%
        ================================================== --}}
        <div class="market-instruments-card">

            <div class="market-card-header">

                <div>
                    <span class="market-card-label">
                        INSTRUMEN
                    </span>

                    <h2>
                        Harga Pasar
                    </h2>
                </div>

                <span class="market-live-badge">
                    <span></span>
                    Live Data
                </span>

            </div>


            <div class="market-quotes-widget">

                <div
                    class="tradingview-widget-container"
                    style="height:100%;width:100%"
                >

                    <div
                        class="tradingview-widget-container__widget"
                        style="height:100%;width:100%"
                    ></div>

                    <script
                        type="text/javascript"
                        src="https://s3.tradingview.com/external-embedding/embed-widget-market-quotes.js"
                        async
                    >
                    {
                        "title": "",
                        "width": "100%",
                        "height": "100%",
                        "locale": "en",
                        "showSymbolLogo": false,
                        "symbolsGroups": [
                            {
                                "name": "Instrumen",
                                "symbols": [

                                    {
                                        "name": "TVC:GOLD",
                                        "displayName": "XUL10 / GOLD"
                                    },

                                    {
                                        "name": "TVC:UKOIL",
                                        "displayName": "BC010_BBJ / BRENT"
                                    },

                                    {
                                        "name": "INDEX:HSI",
                                        "displayName": "HKK50_BBJ / HANG SENG"
                                    },

                                    {
                                        "name": "INDEX:NKY",
                                        "displayName": "JPK50_BBJ / NIKKEI"
                                    },

                                    {
                                        "name": "FX:AUDUSD",
                                        "displayName": "AU1010_BBJ / AUDUSD"
                                    },

                                    {
                                        "name": "FX:EURUSD",
                                        "displayName": "EU1010_BBJ / EURUSD"
                                    },

                                    {
                                        "name": "FX:GBPUSD",
                                        "displayName": "GU1010_BBJ / GBPUSD"
                                    },

                                    {
                                        "name": "FX:USDCHF",
                                        "displayName": "UC1010_BBJ / USDCHF"
                                    },

                                    {
                                        "name": "FX:USDJPY",
                                        "displayName": "UJ1010_BBJ / USDJPY"
                                    }

                                ]
                            }
                        ],

                        "colorTheme": "light",
                        "isTransparent": true,
                        "showSymbolLogo": true
                    }
                    </script>

                </div>

            </div>

        </div>


        {{-- =================================================
             TEKNIKAL — 30%
        ================================================== --}}
        <div class="market-technical-card">

            <div class="market-card-header">

                <div>
                    <span class="market-card-label">
                        TEKNIKAL
                    </span>

                    <h2>
                        XAUUSD
                    </h2>
                </div>

                <span class="technical-timeframe">
                    1D
                </span>

            </div>


            <div class="technical-widget">

                <script
                    type="module"
                    src="https://widgets.tradingview-widget.com/w/en/tv-technical-analysis.js"
                ></script>

                <tv-technical-analysis
                    symbol="OANDA:XAUUSD"
                    interval="1D"
                ></tv-technical-analysis>

            </div>

        </div>

    </div>


    {{-- =====================================================
         DISCLAIMER
    ====================================================== --}}
    <div class="market-data-note">

        <i class="bi bi-info-circle"></i>

        Data pasar ditampilkan melalui widget TradingView.
        Ketersediaan dan waktu data dapat berbeda sesuai sumber
        pasar masing-masing instrumen.

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