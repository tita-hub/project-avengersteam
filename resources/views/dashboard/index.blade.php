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


/* ==========================================================
   AVENGERS DASHBOARD - PREMIUM HERO SLIDER
========================================================== */

.dashboard-page .dashboard-hero {
    width: 100%;
    min-height: 660px;
    height: auto;
    margin-bottom: 45px;
    border-radius: 22px;
    overflow: hidden;
    position: relative;
    background: #101820;
    border: none;
    isolation: isolate;
}

.dashboard-page .rfb-slider {
    position: relative;
    min-height: 660px;
    height: auto;
    overflow: hidden;
}

.dashboard-page .rfb-slide {
    position: absolute;
    inset: 0;
    min-height: 660px;
    padding: 48px 65px 105px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 25px;
    opacity: 0;
    visibility: hidden;
    transform: scale(1.025);
    transition: opacity .8s ease, transform 1s ease,
                visibility .8s ease;
    overflow: hidden;
}

.dashboard-page .rfb-slide.active {
    position: relative;
    opacity: 1;
    visibility: visible;
    transform: scale(1);
    z-index: 2;
}

/* Tema setiap slide */

.dashboard-page .rfb-slide.slide-welcome {
    background:
        radial-gradient(circle at 85% 30%, rgba(0,184,90,.18), transparent 35%),
        linear-gradient(115deg, #f8fafc 0%, #e9eef2 58%, #dce7e8 100%);
    color: #172b4d;
}

.dashboard-page .rfb-slide.slide-avengers {
    background:
        radial-gradient(circle at 75% 50%, rgba(197,35,42,.35), transparent 35%),
        linear-gradient(120deg, #090b10, #171c24 55%, #07090d);
    color: #fff;
}

.dashboard-page .rfb-slide.slide-gold {
    background:
        radial-gradient(circle at 78% 45%, rgba(218,163,48,.25), transparent 36%),
        linear-gradient(115deg, #090a0d, #211a0d 55%, #050506);
    color: #fff;
}

.dashboard-page .rfb-slide.slide-oil {
    background:
        radial-gradient(circle at 80% 45%, rgba(180,190,200,.16), transparent 35%),
        linear-gradient(115deg, #111315, #34383d 55%, #090a0c);
    color: #fff;
}

.dashboard-page .rfb-slide.slide-nikkei {
    background:
        radial-gradient(circle at 80% 40%, rgba(0,137,255,.28), transparent 36%),
        linear-gradient(115deg, #07172e, #10345e 58%, #061326);
    color: #fff;
}

.dashboard-page .rfb-slide.slide-aud {
    background:
        radial-gradient(circle at 80% 45%, rgba(0,184,130,.26), transparent 38%),
        linear-gradient(115deg, #071d1a, #123c36 58%, #06120f);
    color: #fff;
}

/* Ornamen background */

.dashboard-page .rfb-slide::before {
    content: "";
    position: absolute;
    inset: 0;
    opacity: .20;
    background-image:
        linear-gradient(rgba(255,255,255,.12) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,.12) 1px, transparent 1px);
    background-size: 48px 48px;
    mask-image: linear-gradient(90deg, transparent, #000 60%);
    pointer-events: none;
}

.dashboard-page .rfb-slide::after {
    content: "";
    position: absolute;
    width: 520px;
    height: 520px;
    border: 1px solid rgba(255,255,255,.12);
    border-radius: 50%;
    right: 12%;
    top: 50%;
    transform: translateY(-50%);
    box-shadow:
        0 0 0 35px rgba(255,255,255,.025),
        0 0 0 75px rgba(255,255,255,.02);
    pointer-events: none;
}

/* Grafik dekoratif */

.dashboard-page .rfb-chart-decoration {
    position: absolute;
    right: 0;
    top: 0;
    width: 62%;
    height: 100%;
    opacity: .35;
    pointer-events: none;
}

.dashboard-page .rfb-chart-decoration svg {
    width: 100%;
    height: 100%;
}

.dashboard-page .rfb-chart-decoration .up {
    fill: #00c878;
    stroke: #00c878;
}

.dashboard-page .rfb-chart-decoration .down {
    fill: #e33442;
    stroke: #e33442;
}

.dashboard-page .rfb-chart-decoration .trend {
    fill: none;
    stroke: #00c878;
    stroke-width: 3;
    opacity: .7;
}

/* Konten kiri */

.dashboard-page .rfb-slide-content {
    position: relative;
    z-index: 4;
    width: 57%;
    max-width: 760px;
}

.dashboard-page .rfb-brand-pair {
    display: flex;
    align-items: center;
    gap: 17px;
    margin-bottom: 35px;
}

.dashboard-page .rfb-brand-pair img {
    width: 65px;
    height: 65px;
    object-fit: contain;
}

.dashboard-page .rfb-brand-pair .rfb-avengers-logo {
    width: 155px;
    height: 65px;
    object-fit: contain;
}

.dashboard-page .rfb-brand-divider {
    width: 1px;
    height: 42px;
    background: currentColor;
    opacity: .25;
}

.dashboard-page .rfb-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2px;
    margin-bottom: 17px;
    text-transform: uppercase;
}

.dashboard-page .rfb-eyebrow span {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #00b85a;
    box-shadow: 0 0 12px #00b85a;
}

.dashboard-page .rfb-slide h1 {
    font-size: clamp(32px, 3.7vw, 54px);
    font-weight: 850;
    line-height: 1.12;
    letter-spacing: -1.6px;
    margin: 0 0 22px;
    color: inherit;
}

.dashboard-page .rfb-slide h1 .highlight {
    color: #00b85a;
}

.dashboard-page .slide-gold h1 .highlight {
    color: #e8bd61;
}

.dashboard-page .slide-oil h1 .highlight {
    color: #c6cbd0;
}

.dashboard-page .slide-nikkei h1 .highlight {
    color: #55b8ff;
}

.dashboard-page .slide-aud h1 .highlight {
    color: #4bd7a8;
}

.dashboard-page .slide-avengers h1 .highlight {
    color: #ef414b;
}

.dashboard-page .rfb-slide-description {
    max-width: 660px;
    font-size: 14px;
    line-height: 1.8;
    margin: 0;
    opacity: .86;
}

.dashboard-page .rfb-slide-description + .rfb-slide-description {
    margin-top: 12px;
}

/* Semarang highlight */

.dashboard-page .rfb-location-highlight {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    margin-top: 17px;
    padding: 10px 15px;
    border-radius: 10px;
    color: #087b42;
    background: rgba(0,184,90,.10);
    border: 1px solid rgba(0,184,90,.22);
    font-size: 12px;
    font-weight: 800;
}

/* Tombol registrasi */

.dashboard-page .rfb-hero-actions {
    display: grid;
    grid-template-columns: repeat(2, minmax(180px, 1fr));
    gap: 12px;
    margin-top: 27px;
    max-width: 530px;
}

.dashboard-page .rfb-hero-btn {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    min-height: 56px;
    padding: 12px 17px;
    border-radius: 12px;
    text-decoration: none !important;
    font-size: 13px;
    font-weight: 800;
    color: #fff !important;
    background: #00a84f;
    border: 1px solid rgba(255,255,255,.2);
    box-shadow: 0 8px 22px rgba(0,100,50,.22);
    transition: .3s ease;
}

.dashboard-page .rfb-hero-btn:hover {
    transform: translateY(-4px);
    background: #008e44;
    box-shadow: 0 14px 28px rgba(0,100,50,.3);
}

.dashboard-page .rfb-hero-btn.secondary {
    background: #172b4d;
}

.dashboard-page .rfb-hero-btn.secondary:hover {
    background: #25436f;
}

.dashboard-page .rfb-hero-btn span {
    display: flex;
    flex-direction: column;
    gap: 3px;
}

.dashboard-page .rfb-hero-btn small {
    font-size: 9px;
    font-weight: 500;
    opacity: .85;
}

/* Visual kanan */

.dashboard-page .rfb-slide-visual {
    position: relative;
    z-index: 3;
    width: 42%;
    min-height: 390px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.dashboard-page .rfb-product-image {
    position: relative;
    z-index: 3;
    width: min(100%, 440px);
    max-height: 430px;
    object-fit: contain;
    filter: drop-shadow(0 25px 35px rgba(0,0,0,.4));
    animation: rfbProductFloat 5s ease-in-out infinite;
}

.dashboard-page .rfb-visual-glow {
    position: absolute;
    width: 330px;
    height: 330px;
    border-radius: 50%;
    background: rgba(255,255,255,.08);
    filter: blur(45px);
}

.dashboard-page .rfb-visual-tag {
    position: absolute;
    z-index: 5;
    right: 0;
    bottom: 38px;
    padding: 15px 20px;
    background: rgba(10,15,20,.72);
    border: 1px solid rgba(255,255,255,.2);
    backdrop-filter: blur(12px);
    border-radius: 14px;
    color: white;
    box-shadow: 0 12px 30px rgba(0,0,0,.2);
}

.dashboard-page .rfb-visual-tag small {
    display: block;
    font-size: 9px;
    letter-spacing: 2px;
    opacity: .7;
}

.dashboard-page .rfb-visual-tag strong {
    display: block;
    font-size: 20px;
    margin-top: 4px;
}

/* AUD visual khusus */

.dashboard-page .rfb-aud-visual {
    position: relative;
    z-index: 3;
    text-align: center;
    color: #d8fff0;
}

.dashboard-page .rfb-aud-symbol {
    font-size: clamp(90px, 12vw, 160px);
    font-weight: 900;
    line-height: 1;
    text-shadow: 0 15px 45px rgba(0,0,0,.3);
}

.dashboard-page .rfb-aud-subtitle {
    font-size: 14px;
    letter-spacing: 7px;
    font-weight: 800;
}

/* Navigasi slider */

.dashboard-page .rfb-slider-controls {
    position: absolute;
    z-index: 10;
    left: 65px;
    bottom: 30px;
    display: flex;
    align-items: center;
    gap: 13px;
}

.dashboard-page .rfb-slider-arrow {
    width: 39px;
    height: 39px;
    border: 1px solid rgba(255,255,255,.3);
    border-radius: 50%;
    background: rgba(0,0,0,.22);
    color: #fff;
    cursor: pointer;
    transition: .25s;
}

.dashboard-page .rfb-slider-arrow:hover {
    background: #00a84f;
}

.dashboard-page .rfb-slider-dots {
    display: flex;
    align-items: center;
    gap: 8px;
}

.dashboard-page .rfb-slider-dot {
    width: 9px;
    height: 9px;
    padding: 0;
    border: none;
    border-radius: 20px;
    background: rgba(255,255,255,.45);
    cursor: pointer;
    transition: .3s;
}

.dashboard-page .rfb-slider-dot.active {
    width: 28px;
    background: #00b85a;
}

/* ==========================================================
   AVENGERS TEAM INTRO
========================================================== */

.dashboard-page .avengers-intro {
    margin: 55px 0 65px;
}

.dashboard-page .avengers-intro-card {
    display: grid;
    grid-template-columns: .95fr 1.05fr;
    background: #fff;
    border-radius: 22px;
    overflow: hidden;
    border: 1px solid #e8ecea;
    box-shadow: 0 18px 50px rgba(20,35,28,.08);
}

.dashboard-page .avengers-intro-image {
    position: relative;
    min-height: 370px;
    background: linear-gradient(140deg,#101820,#29323d);
    overflow: hidden;
}

.dashboard-page .avengers-intro-image img {
    width: 100%;
    height: 100%;
    min-height: 370px;
    object-fit: cover;
    object-position: center;
    display: block;
}

.dashboard-page .avengers-intro-image::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(0deg,rgba(0,0,0,.35),transparent 60%);
    pointer-events: none;
}

.dashboard-page .avengers-intro-content {
    padding: 48px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.dashboard-page .avengers-intro-label {
    color: #00a84f;
    font-size: 11px;
    font-weight: 850;
    letter-spacing: 2px;
    margin-bottom: 14px;
}

.dashboard-page .avengers-intro-content h2 {
    color: #172b4d;
    font-size: clamp(28px,3vw,39px);
    line-height: 1.15;
    margin: 0 0 18px;
}

.dashboard-page .avengers-intro-content h2 span {
    color: #c62828;
}

.dashboard-page .avengers-intro-content p {
    color: #606b75;
    font-size: 14px;
    line-height: 1.9;
    margin: 0 0 13px;
}

.dashboard-page .avengers-values {
    display: flex;
    flex-wrap: wrap;
    gap: 9px;
    margin: 10px 0 23px;
}

.dashboard-page .avengers-values span {
    padding: 8px 12px;
    background: #f0f7f3;
    color: #087b42;
    border-radius: 30px;
    font-size: 11px;
    font-weight: 750;
}

.dashboard-page .avengers-profile-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    width: fit-content;
    min-height: 48px;
    padding: 0 22px;
    border-radius: 10px;
    background: #00a84f;
    color: white !important;
    font-weight: 800;
    font-size: 13px;
    text-decoration: none !important;
    transition: .3s;
}

.dashboard-page .avengers-profile-btn:hover {
    background: #008d43;
    transform: translateY(-3px);
}

/* ==========================================================
   WELCOME POPUP
========================================================== */

.rfb-welcome-overlay {
    position: fixed;
    inset: 0;
    z-index: 99999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    background: rgba(5,12,20,.72);
    backdrop-filter: blur(7px);
    opacity: 0;
    visibility: hidden;
    transition: .35s;
}

.rfb-welcome-overlay.show {
    opacity: 1;
    visibility: visible;
}

.rfb-welcome-card {
    width: 100%;
    max-width: 460px;
    padding: 35px;
    text-align: center;
    background: #fff;
    border-radius: 22px;
    position: relative;
    box-shadow: 0 25px 80px rgba(0,0,0,.3);
    transform: translateY(20px) scale(.97);
    transition: .35s;
}

.rfb-welcome-overlay.show .rfb-welcome-card {
    transform: translateY(0) scale(1);
}

.rfb-welcome-logos {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 17px;
    margin-bottom: 23px;
}

.rfb-welcome-logos img {
    width: 76px;
    height: 76px;
    object-fit: contain;
}

.rfb-welcome-logos img:last-child {
    width: 150px;
}

.rfb-welcome-card h2 {
    color: #172b4d;
    font-size: 27px;
    line-height: 1.2;
    margin: 0 0 12px;
}

.rfb-welcome-card p {
    color: #647080;
    font-size: 14px;
    line-height: 1.7;
    margin-bottom: 23px;
}

.rfb-welcome-close {
    position: absolute;
    right: 17px;
    top: 15px;
    border: none;
    background: transparent;
    font-size: 23px;
    color: #68717b;
    cursor: pointer;
}

.rfb-welcome-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 46px;
    padding: 0 25px;
    border-radius: 10px;
    background: #00a84f;
    color: #fff !important;
    text-decoration: none !important;
    font-size: 13px;
    font-weight: 800;
    border: none;
    cursor: pointer;
}

.rfb-welcome-skip {
    display: block;
    margin-top: 17px;
    color: #7b8490;
    font-size: 12px;
    background: transparent;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Animasi */

@keyframes rfbProductFloat {
    0%,100% { transform: translateY(0); }
    50% { transform: translateY(-12px); }
}

/* ==========================================================
   RESPONSIVE
========================================================== */

@media(max-width: 1000px) {
    .dashboard-page .rfb-slide {
        padding: 40px 35px 100px;
    }

    .dashboard-page .rfb-slide-content {
        width: 58%;
    }

    .dashboard-page .rfb-slide-visual {
        width: 40%;
    }

    .dashboard-page .rfb-product-image {
        max-height: 330px;
    }

    .dashboard-page .rfb-brand-pair img {
        width: 52px;
        height: 52px;
    }

    .dashboard-page .rfb-brand-pair .rfb-avengers-logo {
        width: 125px;
    }
}

@media(max-width: 700px) {
    .dashboard-page .dashboard-hero,
    .dashboard-page .rfb-slider {
        min-height: 850px;
    }

    .dashboard-page .rfb-slide {
        min-height: 850px;
        flex-direction: column;
        justify-content: flex-start;
        align-items: stretch;
        padding: 30px 23px 100px;
        gap: 5px;
    }

    .dashboard-page .rfb-slide-content {
        width: 100%;
    }

    .dashboard-page .rfb-brand-pair {
        margin-bottom: 23px;
    }

    .dashboard-page .rfb-brand-pair img {
        width: 45px;
        height: 45px;
    }

    .dashboard-page .rfb-brand-pair .rfb-avengers-logo {
        width: 110px;
        height: 48px;
    }

    .dashboard-page .rfb-slide h1 {
        font-size: 33px;
        letter-spacing: -.8px;
    }

    .dashboard-page .rfb-slide-description {
        font-size: 12px;
    }

    .dashboard-page .rfb-hero-actions {
        grid-template-columns: repeat(2,minmax(0,1fr));
        gap: 8px;
        margin-top: 18px;
    }

    .dashboard-page .rfb-hero-btn {
        min-height: 53px;
        padding: 10px;
        font-size: 10px;
    }

    .dashboard-page .rfb-hero-btn small {
        font-size: 8px;
    }

    .dashboard-page .rfb-slide-visual {
        width: 100%;
        min-height: 230px;
        max-height: 260px;
    }

    .dashboard-page .rfb-product-image {
        max-height: 245px;
        max-width: 280px;
    }

    .dashboard-page .rfb-visual-tag {
        right: 0;
        bottom: 5px;
        padding: 10px 13px;
    }

    .dashboard-page .rfb-slider-controls {
        left: 23px;
        bottom: 25px;
    }

    .dashboard-page .avengers-intro-card {
        grid-template-columns: 1fr;
    }

    .dashboard-page .avengers-intro-image,
    .dashboard-page .avengers-intro-image img {
        min-height: 260px;
        max-height: 300px;
    }

    .dashboard-page .avengers-intro-content {
        padding: 27px 23px;
    }

    .rfb-welcome-card {
        padding: 30px 23px;
    }

    .rfb-welcome-card h2 {
        font-size: 23px;
    }
}

@media(prefers-reduced-motion: reduce) {
    .dashboard-page .rfb-product-image {
        animation: none;
    }

    .dashboard-page .rfb-slide {
        transition: none;
    }
}


/* =====================================================
   FINAL HERO FIX - COMPACT & RESPONSIVE
===================================================== */

.dashboard-page .dashboard-hero {
    width: 100%;
    height: 550px;
    min-height: 550px;
    margin-bottom: 32px;
    border-radius: 18px;
    overflow: hidden;
    position: relative;
}

.dashboard-page .rfb-slider {
    width: 100%;
    height: 550px;
    min-height: 550px;
    position: relative;
    overflow: hidden;
}

.dashboard-page .rfb-slide {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 550px;
    min-height: 550px;
    padding: 30px 48px 75px;
    box-sizing: border-box;
    gap: 15px;
}

/* Slide aktif */
.dashboard-page .rfb-slide.active {
    position: absolute;
    inset: 0;
    z-index: 2;
}

/* Konten kiri */
.dashboard-page .rfb-slide-content {
    width: 56%;
    max-width: 690px;
    z-index: 5;
}

/* Logo */
.dashboard-page .rfb-brand-pair {
    margin-bottom: 17px;
    gap: 12px;
}

.dashboard-page .rfb-brand-pair img {
    width: 49px;
    height: 49px;
}

.dashboard-page .rfb-brand-pair .rfb-avengers-logo {
    width: 120px;
    height: 49px;
}

/* Judul */
.dashboard-page .rfb-slide h1 {
    font-size: clamp(29px, 3vw, 42px);
    line-height: 1.08;
    margin-bottom: 14px;
}

/* Deskripsi */
.dashboard-page .rfb-slide-description {
    font-size: 12px;
    line-height: 1.65;
    max-width: 620px;
}

.dashboard-page .rfb-slide-description + .rfb-slide-description {
    margin-top: 7px;
}

/* Badge lokasi */
.dashboard-page .rfb-location-highlight {
    margin-top: 10px;
    padding: 8px 12px;
    font-size: 10px;
}

/* Visual kanan */
.dashboard-page .rfb-slide-visual {
    width: 42%;
    min-height: 0;
    height: 100%;
    z-index: 4;
}

.dashboard-page .rfb-product-image {
    max-height: 340px;
    max-width: 100%;
}

/* Navigasi harus selalu bisa diklik */
.dashboard-page .rfb-slider-controls {
    z-index: 50;
    bottom: 17px;
    left: 48px;
    pointer-events: auto;
}

.dashboard-page .rfb-slider-arrow,
.dashboard-page .rfb-slider-dot {
    position: relative;
    z-index: 51;
    pointer-events: auto;
    cursor: pointer;
}

/* Dekorasi tidak boleh menghalangi klik */
.dashboard-page .rfb-chart-decoration,
.dashboard-page .rfb-slide::before,
.dashboard-page .rfb-slide::after {
    pointer-events: none;
}

/* Tombol akun */
.dashboard-page .rfb-hero-actions {
    max-width: 540px;
    gap: 10px;
    margin-top: 15px;
}

.dashboard-page .rfb-hero-btn {
    min-height: 53px;
    padding: 11px 15px;
    font-size: 12px;
    border-radius: 10px;
    color: #172b4d !important;
    background: #ffffff;
    border: 2px solid #00a84f;
    box-shadow: 0 5px 15px rgba(0,0,0,.12);
}

.dashboard-page .rfb-hero-btn:nth-child(odd) {
    border-color: #c62828;
}

.dashboard-page .rfb-hero-btn:nth-child(even) {
    border-color: #00a84f;
}

.dashboard-page .rfb-hero-btn:hover {
    background: #f1fff6;
    color: #087b42 !important;
    transform: translateY(-3px);
}

.dashboard-page .rfb-hero-btn i {
    color: #c62828;
    font-size: 17px;
}

.dashboard-page .rfb-hero-btn small {
    color: #68717b;
    font-size: 10px;
}

/* Welcome: background lebih berisi */
.dashboard-page .rfb-slide.slide-welcome {
    background:
        linear-gradient(
            90deg,
            rgba(248,250,252,.97) 0%,
            rgba(248,250,252,.93) 47%,
            rgba(230,238,239,.65) 100%
        ),
        linear-gradient(120deg,#e9eef2,#dce7e8);
}

/* Biar grafik candlestick terlihat ramai */
.dashboard-page .slide-welcome .rfb-chart-decoration {
    width: 68%;
    opacity: .65;
    mix-blend-mode: multiply;
}

/* Responsive tablet */
@media(max-width: 1000px) {

    .dashboard-page .dashboard-hero,
    .dashboard-page .rfb-slider {
        height: 680px;
        min-height: 680px;
    }

    .dashboard-page .rfb-slide {
        height: 680px;
        min-height: 680px;
        padding: 30px 30px 80px;
    }

    .dashboard-page .rfb-slide-content {
        width: 60%;
    }

    .dashboard-page .rfb-slide-visual {
        width: 38%;
    }
}

/* Responsive HP */
@media(max-width: 700px) {

    .dashboard-page .dashboard-hero,
    .dashboard-page .rfb-slider {
        height: 850px;
        min-height: 850px;
    }

    .dashboard-page .rfb-slide {
        height: 850px;
        min-height: 850px;
        padding: 25px 22px 85px;
        flex-direction: column;
        align-items: stretch;
        justify-content: flex-start;
        overflow-y: auto;
    }

    .dashboard-page .rfb-slide-content {
        width: 100%;
    }

    .dashboard-page .rfb-slide-visual {
        width: 100%;
        height: 200px;
        min-height: 200px;
        flex-shrink: 0;
    }

    .dashboard-page .rfb-brand-pair {
        margin-bottom: 15px;
    }

    .dashboard-page .rfb-slide h1 {
        font-size: 30px;
    }

    .dashboard-page .rfb-hero-actions {
        grid-template-columns: repeat(2,minmax(0,1fr));
        gap: 9px;
    }

    .dashboard-page .rfb-hero-btn {
        min-height: 55px;
        font-size: 11px;
    }

    .dashboard-page .rfb-slider-controls {
        left: 20px;
        bottom: 15px;
    }

    .dashboard-page .rfb-chart-decoration {
        width: 100%;
    }
}


/* SLIDE 7 - AVENGERS CLOSING */

.dashboard-page .rfb-slide-final,
.dashboard-page .slide-avengers-final {
    background:
        radial-gradient(
            circle at 80% 45%,
            rgba(0,184,90,.24),
            transparent 35%
        ),
        radial-gradient(
            circle at 15% 20%,
            rgba(198,40,40,.25),
            transparent 35%
        ),
        linear-gradient(120deg,#07090e,#17232b,#080b10);

    color: #fff;
}

.dashboard-page .slide-avengers-final h1 .highlight {
    color: #00d477;
}

.dashboard-page .rfb-final-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 13px;
    min-height: 50px;
    padding: 0 22px;
    border-radius: 10px;
    background: #00a84f;
    color: white !important;
    text-decoration: none !important;
    font-weight: 800;
    font-size: 13px;
    transition: .3s;
}

.dashboard-page .rfb-final-btn:hover {
    background: #008e44;
    transform: translateY(-3px);
}

.dashboard-page .rfb-final-action {
    margin-top: 22px;
}


/* =====================================================
   AVENGERS FRAME
===================================================== */

.dashboard-page .avengers-intro {
    width: 100%;
    margin: 35px 0 50px;
}

.dashboard-page .avengers-frame {
    width: 100%;
    padding: 30px;
    box-sizing: border-box;

    background:
        linear-gradient(140deg,#f4f7f6,#edf2f0);

    border: 1px solid #e2e9e5;
    border-radius: 22px;

    box-shadow: 0 15px 40px rgba(20,35,28,.06);
}

/* HEADER */

.dashboard-page .avengers-frame-heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.dashboard-page .avengers-frame-heading span {
    color: #008e44;
    font-size: 10px;
    font-weight: 900;
    letter-spacing: 2px;
}

.dashboard-page .avengers-frame-heading h2 {
    margin: 7px 0;
    color: #172b4d;
    font-size: clamp(25px,3vw,36px);
}

.dashboard-page .avengers-frame-heading h2 strong {
    color: #c62828;
}

.dashboard-page .avengers-frame-heading p {
    margin: 0;
    color: #718078;
    font-size: 13px;
}

.dashboard-page .avengers-heading-logo img {
    width: 145px;
    height: 65px;
    object-fit: contain;
}

/* GRID */

.dashboard-page .avengers-content-grid {
    display: grid;
    grid-template-columns: .85fr 1.15fr;
    gap: 20px;
    align-items: stretch;
}

/* CARD FOTO */

.dashboard-page .avengers-photo-card {
    padding: 15px;
    background: #fff;
    border: 1px solid #e5eae7;
    border-radius: 17px;
    box-shadow: 0 8px 25px rgba(0,0,0,.04);
}

.dashboard-page .avengers-photo-wrapper {
    width: 100%;
    aspect-ratio: 1 / 1;
    overflow: hidden;
    border-radius: 12px;
    background: #e8eeeb;
}

.dashboard-page .avengers-photo-wrapper img {
    width: 100%;
    height: 100%;
    display: block;
    object-fit: cover;
    object-position: center;
}

.dashboard-page .avengers-photo-caption {
    padding: 16px 5px 5px;
}

.dashboard-page .avengers-photo-caption span {
    font-size: 9px;
    color: #00a84f;
    font-weight: 900;
    letter-spacing: 1.5px;
}

.dashboard-page .avengers-photo-caption h3 {
    color: #172b4d;
    font-size: 19px;
    margin: 7px 0;
}

.dashboard-page .avengers-photo-caption p {
    color: #77817b;
    font-size: 12px;
    margin: 0;
}

/* CARD DESKRIPSI */

.dashboard-page .avengers-description-card {
    padding: 32px;
    background: #fff;
    border: 1px solid #e5eae7;
    border-radius: 17px;
    box-shadow: 0 8px 25px rgba(0,0,0,.04);
}

.dashboard-page .avengers-label {
    color: #008e44;
    font-size: 10px;
    font-weight: 900;
    letter-spacing: 2px;
}

.dashboard-page .avengers-description-card h3 {
    margin: 12px 0 18px;
    color: #172b4d;
    font-size: clamp(24px,2.5vw,34px);
    line-height: 1.2;
}

.dashboard-page .avengers-description-card h3 span {
    color: #c62828;
}

.dashboard-page .avengers-description-card p {
    color: #66716c;
    font-size: 13px;
    line-height: 1.8;
    margin-bottom: 12px;
}

/* FEATURE */

.dashboard-page .avengers-feature-list {
    display: flex;
    flex-wrap: wrap;
    gap: 9px;
    margin: 20px 0 24px;
}

.dashboard-page .avengers-feature-list span {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 9px 12px;
    background: #eff8f2;
    border: 1px solid #dcefe2;
    color: #087b42;
    border-radius: 8px;
    font-size: 11px;
    font-weight: 750;
}

.dashboard-page .avengers-feature-list i {
    color: #c62828;
}

/* BUTTON */

.dashboard-page .avengers-profile-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    min-height: 49px;
    padding: 0 23px;
    background: #00a84f;
    color: #fff !important;
    border-radius: 9px;
    font-size: 12px;
    font-weight: 800;
    text-decoration: none !important;
    transition: .3s;
}

.dashboard-page .avengers-profile-btn:hover {
    background: #008e44;
    transform: translateY(-3px);
}

/* MOBILE */

@media(max-width: 800px) {

    .dashboard-page .avengers-frame {
        padding: 20px;
    }

    .dashboard-page .avengers-content-grid {
        grid-template-columns: 1fr;
    }

    .dashboard-page .avengers-heading-logo img {
        width: 100px;
    }

    .dashboard-page .avengers-description-card {
        padding: 23px;
    }

}


/* ==========================================================
   PREMIUM POSTER HERO SLIDER
   RIFAN FINANCINDO x AVENGERS TEAM
========================================================== */


/* ==========================================================
   HERO DASHBOARD - COMPACT FULL WIDTH
========================================================== */

.dashboard-page .dashboard-hero {
    width: 100%;
    max-width: none;

    height: 350px;
    min-height: 350px;

    margin: 0 0 45px 0;
    padding: 0;

    border-radius: 0;
    overflow: hidden;

    position: relative;
    background: #101820;

    border: none;
    isolation: isolate;
    box-sizing: border-box;
}

.dashboard-page .rfb-slider {
    position: relative;

    width: 100%;
    height: 395px;
    min-height: 395px;

    overflow: hidden;
}

.dashboard-page .rfb-slide {
    position: absolute;
    inset: 0;

    width: 100%;
    height: 395px;
    min-height: 395px;

    box-sizing: border-box;

    padding: 25px 45px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 25px;

    opacity: 0;
    visibility: hidden;

    transform: scale(1.01);

    transition:
        opacity .8s ease,
        transform 1s ease,
        visibility .8s ease;

    overflow: hidden;
}

.dashboard-page .rfb-slide.active {
    position: relative;

    opacity: 1;
    visibility: visible;

    transform: scale(1);

    z-index: 2;
}


/* GRID DAN CAHAYA BACKGROUND */

.dashboard-page .rfb-slide::before {
    content: "";
    position: absolute;
    inset: 0;
    z-index: -1;
    pointer-events: none;
    background-image:
        linear-gradient(
            rgba(255,255,255,.035) 1px,
            transparent 1px
        ),
        linear-gradient(
            90deg,
            rgba(255,255,255,.035) 1px,
            transparent 1px
        );
    background-size: 42px 42px;
}

.dashboard-page .rfb-slide::after {
    content: "";
    position: absolute;
    width: 650px;
    height: 650px;
    right: -180px;
    top: -260px;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,.08);
    box-shadow:
        0 0 0 45px rgba(255,255,255,.018),
        0 0 0 95px rgba(255,255,255,.015);
    pointer-events: none;
    z-index: -1;
}

/* ==========================================================
   DUA BAGIAN POSTER
========================================================== */

.dashboard-page .rfb-slide-content {
    order: 2;
    position: relative;
    z-index: 5;
    width: 49%;
    max-width: 650px;
    flex-shrink: 0;
}

.dashboard-page .rfb-slide-visual {
    order: 1;
    position: relative;
    z-index: 3;
    width: 47%;
    height: 100%;
    min-height: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

/* LOGO RIFAN + AVENGERS */

.dashboard-page .rfb-brand-pair {
    display: flex;
    align-items: center;
    gap: 13px;
    margin-bottom: 26px;
}

.dashboard-page .rfb-brand-pair img {
    width: 55px;
    height: 55px;
    object-fit: contain;
    filter: drop-shadow(0 4px 8px rgba(0,0,0,.2));
}

.dashboard-page .rfb-brand-pair .rfb-avengers-logo {
    width: 125px;
    height: 48px;
}

.dashboard-page .rfb-brand-divider {
    width: 1px;
    height: 37px;
    background: rgba(255,255,255,.45);
}

/* EYEBROW */

.dashboard-page .rfb-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    margin-bottom: 15px;
    color: #b6c9c4;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 2.5px;
}

.dashboard-page .rfb-eyebrow span {
    width: 27px;
    height: 3px;
    background: #00c875;
    border-radius: 5px;
}

/* HEADLINE */

.dashboard-page .rfb-slide h1 {
    color: #fff;
    font-size: clamp(34px, 3.6vw, 53px);
    line-height: 1.12;
    font-weight: 800;
    letter-spacing: -.8px;
    margin: 0 0 18px;
}

.dashboard-page .rfb-slide h1 .highlight {
    color: #00cf78;
}

.dashboard-page .rfb-slide-description {
    color: rgba(255,255,255,.82);
    font-size: 13px;
    line-height: 1.8;
    max-width: 580px;
}

/* ==========================================================
   GAMBAR PRODUK
========================================================== */

.dashboard-page .rfb-product-image {
    position: relative;
    z-index: 4;
    width: 100%;
    height: 100%;
    max-width: 520px;
    max-height: 420px;
    object-fit: contain;
    filter: drop-shadow(0 22px 28px rgba(0,0,0,.35));
    animation: productFloat 6s ease-in-out infinite;
}

@keyframes productFloat {
    0%,100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-9px);
    }
}

/* CAHAYA DI BELAKANG PRODUK */

.dashboard-page .rfb-visual-glow {
    position: absolute;
    width: 75%;
    aspect-ratio: 1;
    border-radius: 50%;
    filter: blur(75px);
    opacity: .35;
    z-index: 1;
}

/* CHART BACKGROUND */

.dashboard-page .rfb-chart-decoration {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    opacity: .5;
    z-index: 1;
    pointer-events: none;
}

.dashboard-page .rfb-chart-decoration svg {
    width: 100%;
    height: 100%;
}

/* ==========================================================
   SLIDE 1 - WELCOME
========================================================== */

.dashboard-page .slide-welcome {
    background:
        radial-gradient(
            ellipse at 12% 90%,
            rgba(0,184,90,.36),
            transparent 42%
        ),
        radial-gradient(
            ellipse at 85% 10%,
            rgba(197,40,40,.30),
            transparent 42%
        ),
        linear-gradient(
            120deg,
            #071b24 0%,
            #102f3a 48%,
            #071a25 100%
        );
}

.dashboard-page .slide-welcome .rfb-visual-glow {
    background: #00c875;
}

.dashboard-page .slide-welcome h1 .highlight {
    color: #51d99a;
}

/* ==========================================================
   SLIDE 2 - AVENGERS KOSONGIN DULU
========================================================== */

.dashboard-page .slide-avengers {
    background:
        radial-gradient(
            circle at 20% 85%,
            rgba(198,40,40,.4),
            transparent 38%
        ),
        radial-gradient(
            circle at 80% 20%,
            rgba(0,184,90,.28),
            transparent 38%
        ),
        linear-gradient(125deg,#08090d,#17232a,#08090d);
}

.dashboard-page .slide-avengers .rfb-visual-glow {
    background: #c62828;
}

.dashboard-page .slide-avengers h1 .highlight {
    color: #00d477;
}


/* =====================================================
   SLIDE 3 - GOLD TRADING BANNER
===================================================== */


/* SLIDE GOLD - FULL WIDTH BANNER */
.dashboard-page .rfb-slide.slide-gold {
    position: absolute;
    inset: 0;

    width: 100%;
    height: 100%;

    max-width: none;
    margin: 0;
    padding: 0;

    overflow: hidden;
    background: #07152b !important;
}

/* Background image */
.dashboard-page .slide-gold .gold-bg-image {
    position: absolute;
    inset: 0;

    width: 100% !important;
    height: 100% !important;

    object-fit: cover !important;
    object-position: center center;

    z-index: 0;
}


/* Overlay */
.dashboard-page .slide-gold .gold-bg-overlay {
    position: absolute;
    inset: 0;

    z-index: 1;

    background: linear-gradient(
        90deg,
        rgba(4,12,27,0) 25%,
        rgba(4,12,27,.15) 42%,
        rgba(4,12,27,.65) 68%,
        rgba(4,12,27,.88) 100%
    );
}

/* Content */
.dashboard-page .slide-gold .gold-content {
    position: relative;
    z-index: 2;

    width: 48%;
    max-width: 650px;

    margin-left: auto;
    margin-right: 5%;

    display: flex;
    flex-direction: column;
    align-items: flex-start;

    text-align: left;
}

/* Eyebrow */
.dashboard-page .slide-gold .gold-eyebrow {
    color: #e8bd61;

    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2px;

    margin-bottom: 20px;
}

.dashboard-page .slide-gold .gold-eyebrow span {
    background: #e8bd61;
}

/* Heading */
.dashboard-page .slide-gold .gold-title {
    color: #ffffff;

    font-size: clamp(35px, 4vw, 56px);
    font-weight: 850;

    line-height: 1.15;
    letter-spacing: -1px;

    margin-bottom: 22px;
}

.dashboard-page .slide-gold .gold-title .highlight {
    display: block;

    color: #e8bd61;

    font-size: clamp(48px, 5vw, 72px);
    font-weight: 900;
}

/* Description */
.dashboard-page .slide-gold .gold-description {
    max-width: 520px;

    color: rgba(255,255,255,.82);

    font-size: 15px;
    line-height: 1.8;

    margin-bottom: 22px;
}

/* Tagline */
.dashboard-page .slide-gold .gold-tagline {
    display: flex;
    align-items: center;
    gap: 11px;

    max-width: 500px;

    padding: 13px 17px;

    border-left: 3px solid #e8bd61;

    background: rgba(232,189,97,.12);

    color: #ffffff;

    font-size: 14px;
    font-weight: 650;
    line-height: 1.6;

    margin-bottom: 22px;
}

.dashboard-page .slide-gold .gold-tagline i {
    color: #e8bd61;
    font-size: 20px;
    flex-shrink: 0;
}

/* Gold instrument label */
.dashboard-page .slide-gold .gold-highlight {
    color: #e8bd61;

    background: rgba(218,163,48,.14);
    border: 1px solid rgba(218,163,48,.35);

    font-weight: 800;
}

/* Mobile */
@media (max-width: 700px) {

    .dashboard-page .rfb-slide.slide-gold {
        align-items: flex-end;
    }

    .dashboard-page .slide-gold .gold-bg-image {
        object-position: 35% center;
    }

    .dashboard-page .slide-gold .gold-bg-overlay {
        background: linear-gradient(
            180deg,
            rgba(4,12,27,.05) 0%,
            rgba(4,12,27,.45) 35%,
            rgba(4,12,27,.96) 100%
        );
    }

    .dashboard-page .slide-gold .gold-content {
        width: 100%;
        max-width: 100%;

        margin: 0;
        padding: 30px 25px 75px;
    }

    .dashboard-page .slide-gold .gold-title {
        font-size: 32px;
    }

    .dashboard-page .slide-gold .gold-title .highlight {
        font-size: 46px;
    }

    .dashboard-page .slide-gold .gold-description {
        font-size: 12px;
    }

    .dashboard-page .slide-gold .gold-tagline {
        font-size: 12px;
    }
}


/* =====================================================
   SLIDE 4 - OIL TRADING BANNER
===================================================== */

.dashboard-page .rfb-slide.slide-oil {
    position: absolute;
    inset: 0;

    width: 100%;
    height: 100%;

    max-width: none;
    margin: 0;
    padding: 0;

    overflow: hidden;
    background: #f4f6f8 !important;
}

/* Background Image */
.dashboard-page .slide-oil .oil-bg-image {
    position: absolute;

    top: 0;
    left: 0;

    width: 100% !important;
    height: 100% !important;

    max-width: none !important;
    max-height: none !important;

    object-fit: cover !important;
    object-position: center center;

    opacity: 1;

    z-index: 0;
    display: block;
}

/* Responsive Mobile */
@media (max-width: 700px) {

    .dashboard-page .slide-oil .oil-bg-image {
        object-position: center center;
    }

}


/* =====================================================
   SLIDE 5 - NIKKEI TRADING BANNER
===================================================== */

.dashboard-page .rfb-slide.slide-nikkei {
    position: absolute;
    inset: 0;

    width: 100%;
    height: 100%;

    max-width: none;
    margin: 0;
    padding: 0;

    overflow: hidden;
    background: #0879ce !important;
}

/* Background Image */
.dashboard-page .slide-nikkei .nikkei-bg-image {
    position: absolute;

    top: 0;
    left: 0;

    width: 100% !important;
    height: 100% !important;

    max-width: none !important;
    max-height: none !important;

    object-fit: cover !important;
    object-position: center center;

    opacity: 1;

    z-index: 0;
    display: block;
}

/* Responsive Mobile */
@media (max-width: 700px) {

    .dashboard-page .slide-nikkei .nikkei-bg-image {
        object-position: center center;
    }

}

/* ==========================================================
   SLIDE 6 - AUD / AUSSIE
========================================================== */

.dashboard-page .slide-aud {
    background:
        radial-gradient(
            ellipse at 10% 80%,
            rgba(0,160,110,.42),
            transparent 42%
        ),
        radial-gradient(
            ellipse at 90% 15%,
            rgba(255,205,80,.20),
            transparent 38%
        ),
        linear-gradient(
            120deg,
            #041b1c,
            #07564b 50%,
            #061c20
        );
}

.dashboard-page .slide-aud .rfb-visual-glow {
    background: #00bd8a;
}

.dashboard-page .slide-aud h1 .highlight {
    color: #55e0b4;
}

.dashboard-page .slide-aud .rfb-eyebrow span {
    background: #55e0b4;
}

/* ==========================================================
   SLIDE 7 - AVENGERS CLOSING
========================================================== */

.dashboard-page .slide-avengers-final {
    background:
        radial-gradient(
            ellipse at 15% 85%,
            rgba(198,40,40,.36),
            transparent 42%
        ),
        radial-gradient(
            ellipse at 90% 10%,
            rgba(0,184,90,.3),
            transparent 42%
        ),
        linear-gradient(120deg,#07090e,#17232b,#080b10);
}

/* ==========================================================
   NAVIGASI SLIDER - PANAH DI SAMPING TENGAH
========================================================== */

.dashboard-page .rfb-slider-controls {
    position: absolute;
    inset: 0;
    z-index: 80;
    display: block;
    pointer-events: none;
}

/* Panah kiri dan kanan */
.dashboard-page #rfbPrev,
.dashboard-page #rfbNext,
.dashboard-page .rfb-slider-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 54px;
    height: 54px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,.3);
    background: rgba(0,0,0,.38);
    color: #fff;
    font-size: 22px;
    cursor: pointer;
    z-index: 85;
    pointer-events: auto;
    backdrop-filter: blur(10px);
    transition: .3s;
}

.dashboard-page #rfbPrev {
    left: 22px;
}

.dashboard-page #rfbNext {
    right: 22px;
}

.dashboard-page #rfbPrev:hover,
.dashboard-page #rfbNext:hover,
.dashboard-page .rfb-slider-arrow:hover {
    background: #00a84f;
    border-color: #00a84f;
    transform: translateY(-50%) scale(1.1);
}

/* Titik navigasi tetap di DALAM banner */
.dashboard-page .rfb-slider-dot {
    position: relative;
    z-index: 86;
    width: 8px;
    height: 8px;
    border-radius: 20px;
    border: none;
    background: rgba(255,255,255,.45);
    cursor: pointer;
    pointer-events: auto;
}

.dashboard-page .rfb-slider-dot.active {
    width: 26px;
    background: #00d477;
}

.dashboard-page .rfb-slider-controls .rfb-slider-dots {
    position: absolute;
    left: 50%;
    bottom: 19px;
    transform: translateX(-50%);
    display: flex;
    align-items: center;
    gap: 9px;
    pointer-events: auto;
}

/* RESPONSIVE */

@media(max-width:900px) {

    .dashboard-page .dashboard-hero,
    .dashboard-page .rfb-slider {
        height: 620px;
        min-height: 620px;
    }

    .dashboard-page .rfb-slide {
        padding: 35px 7%;
        gap: 15px;
    }

    .dashboard-page .rfb-slide-content {
        width: 52%;
    }

    .dashboard-page .rfb-slide-visual {
        width: 43%;
    }

    .dashboard-page .rfb-slide h1 {
        font-size: 34px;
    }

}

@media(max-width:600px) {

    .dashboard-page .dashboard-hero,
    .dashboard-page .rfb-slider {
        height: 760px;
        min-height: 760px;
    }

    .dashboard-page .rfb-slide {
        flex-direction: column;
        justify-content: center;
        padding: 30px 48px 65px;
        gap: 8px;
    }

    .dashboard-page .rfb-slide-content {
        order: 1;
        width: 100%;
        max-width: none;
    }

    .dashboard-page .rfb-slide-visual {
        order: 2;
        width: 100%;
        height: 220px;
        flex: 0 0 220px;
    }

    .dashboard-page .rfb-product-image {
        max-height: 220px;
    }

    .dashboard-page .rfb-slide h1 {
        font-size: 30px;
    }

    .dashboard-page .rfb-slide-description {
        font-size: 12px;
    }

    .dashboard-page #rfbPrev {
        left: 7px;
    }

    .dashboard-page #rfbNext {
        right: 7px;
    }

    .dashboard-page #rfbPrev,
    .dashboard-page #rfbNext {
        width: 36px;
        height: 36px;
        font-size: 16px;
    }

}




/* ==========================================================
   FINAL HERO OVERRIDE — SINGLE SOURCE OF TRUTH
   Menimpa aturan hero lama yang saling bertabrakan.
   Markup, route, aset, dan fungsi slider tetap dipertahankan.
========================================================== */

.dashboard-page .dashboard-hero {
    width: 100%;
    margin: 0 0 28px;
    padding: 0;
    min-height: 0;
    height: auto;
    overflow: hidden;
    border: 0;
    border-radius: 0;
    box-shadow: none;
    background: #08131a;
    isolation: isolate;
}

.dashboard-page .rfb-slider {
    position: relative;
    width: 100%;
    height: clamp(560px, 43vw, 640px);
    min-height: 560px;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border-radius: 0;
    box-sizing: border-box;
    isolation: isolate;
    background: #08131a;
}

.dashboard-page .rfb-slide {
    position: absolute;
    inset: 0;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    gap: clamp(24px, 4vw, 64px);
    width: 100%;
    height: 100%;
    min-height: 0;
    padding: 48px clamp(54px, 7.5vw, 126px) 66px;
    box-sizing: border-box;
    overflow: hidden;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transform: translateX(18px);
    transition: opacity .55s ease, transform .65s ease, visibility .55s;
}

.dashboard-page .rfb-slide.active {
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
    transform: translateX(0);
    z-index: 2;
}

/* Komposisi konsisten: visual kiri, teks kanan */
.dashboard-page .rfb-slide-content {
    order: 2;
    position: relative;
    z-index: 5;
    flex: 0 1 52%;
    width: 52%;
    max-width: 680px;
    min-width: 0;
    margin-left: auto;
}

.dashboard-page .rfb-slide-visual {
    order: 1;
    position: relative;
    z-index: 3;
    flex: 0 1 43%;
    width: 43%;
    height: 100%;
    min-height: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0;
}

.dashboard-page .rfb-brand-pair {
    display: flex;
    align-items: center;
    gap: 12px;
    margin: 0 0 22px;
}

.dashboard-page .rfb-brand-pair img {
    width: 48px;
    height: 48px;
    object-fit: contain;
}

.dashboard-page .rfb-brand-pair .rfb-avengers-logo {
    width: 118px;
    height: 44px;
    object-fit: contain;
}

.dashboard-page .rfb-brand-divider {
    height: 34px;
    background: rgba(255,255,255,.28);
}

.dashboard-page .rfb-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin: 0 0 14px;
    color: rgba(255,255,255,.72);
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 2.2px;
    line-height: 1.5;
}

.dashboard-page .rfb-eyebrow span {
    width: 27px;
    height: 3px;
    flex: 0 0 27px;
    border-radius: 3px;
    background: #00c875;
}

.dashboard-page .rfb-slide h1 {
    margin: 0 0 18px;
    color: #fff !important;
    font-size: clamp(34px, 3.15vw, 50px);
    font-weight: 800;
    line-height: 1.12;
    letter-spacing: -.9px;
    overflow-wrap: anywhere;
}

.dashboard-page .rfb-slide h1 .highlight {
    color: #00d181;
}

.dashboard-page .rfb-slide-description {
    max-width: 620px;
    margin: 0;
    color: rgba(245,248,250,.78) !important;
    font-size: 13px;
    line-height: 1.78;
}

.dashboard-page .rfb-slide-description + .rfb-slide-description {
    margin-top: 10px;
}

.dashboard-page .rfb-location-highlight {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    max-width: 100%;
    margin-top: 16px;
    padding: 9px 13px;
    border-radius: 9px;
    font-size: 10px;
    line-height: 1.5;
    font-weight: 800;
    letter-spacing: .15px;
}

.dashboard-page .rfb-hero-actions {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 10px;
    width: 100%;
    max-width: 540px;
    margin-top: 18px;
}

.dashboard-page .rfb-hero-btn {
    min-width: 0;
    min-height: 54px;
    padding: 10px 13px;
    border-radius: 10px;
    font-size: 12px;
}

.dashboard-page .rfb-hero-btn small {
    font-size: 9px;
}

.dashboard-page .rfb-product-image {
    position: relative;
    z-index: 3;
    display: block;
    width: 100%;
    max-width: 470px;
    max-height: 430px;
    height: auto;
    object-fit: contain;
    filter: drop-shadow(0 22px 30px rgba(0,0,0,.38));
    animation: rfbProductFloat 6s ease-in-out infinite;
}

.dashboard-page .rfb-visual-glow {
    position: absolute;
    z-index: 1;
    width: min(78%, 350px);
    aspect-ratio: 1;
    border-radius: 50%;
    opacity: .38;
    filter: blur(68px);
    pointer-events: none;
}

.dashboard-page .rfb-visual-tag {
    right: 0;
    bottom: 42px;
    z-index: 5;
    padding: 12px 17px;
    border-radius: 13px;
    background: rgba(7,13,18,.78);
    border: 1px solid rgba(255,255,255,.18);
    box-shadow: 0 12px 28px rgba(0,0,0,.22);
    backdrop-filter: blur(12px);
}

.dashboard-page .rfb-visual-tag small {
    font-size: 8px;
    letter-spacing: 1.7px;
}

.dashboard-page .rfb-visual-tag strong {
    font-size: 18px;
    line-height: 1.2;
}

/* Chart dekoratif dibuat lembut agar tidak mengganggu teks */
.dashboard-page .rfb-chart-decoration {
    position: absolute;
    inset: 0;
    z-index: 0;
    width: 100%;
    height: 100%;
    opacity: .23;
    pointer-events: none;
}

.dashboard-page .rfb-chart-decoration svg {
    display: block;
    width: 100%;
    height: 100%;
}

.dashboard-page .rfb-slide::before {
    z-index: 0;
    opacity: .55;
    background-size: 48px 48px;
}

.dashboard-page .rfb-slide::after {
    z-index: 0;
    opacity: .55;
}

/* Welcome: latar gelap yang kontras + identitas Rifan di area visual kiri */
.dashboard-page .rfb-slide.slide-welcome {
    background:
        radial-gradient(ellipse at 18% 82%, rgba(0,168,79,.30), transparent 43%),
        radial-gradient(ellipse at 78% 8%, rgba(22,105,75,.25), transparent 42%),
        linear-gradient(115deg, #07151c 0%, #102b31 52%, #07151c 100%) !important;
}

.dashboard-page .rfb-slide.slide-welcome .rfb-slide-visual {
    isolation: isolate;
}

.dashboard-page .rfb-slide.slide-welcome .rfb-slide-visual::before {
    content: "";
    position: absolute;
    inset: 8% 4% 18%;
    z-index: 2;
    background-image: url("{{ asset('images/logo-rifan-2.png') }}");
    background-repeat: no-repeat;
    background-position: center;
    background-size: min(78%, 330px) auto;
    filter: drop-shadow(0 16px 26px rgba(0,0,0,.28));
    opacity: .96;
}

.dashboard-page .rfb-slide.slide-welcome .rfb-slide-visual::after {
    content: "RIFAN FINANCINDO BERJANGKA";
    position: absolute;
    z-index: 3;
    left: 50%;
    bottom: 22%;
    transform: translateX(-50%);
    color: rgba(255,255,255,.72);
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 2.4px;
    white-space: nowrap;
}

.dashboard-page .rfb-slide.slide-welcome .rfb-visual-glow {
    background: #00b96b;
    opacity: .26;
}

.dashboard-page .rfb-slide.slide-welcome h1 {
    color: #fff !important;
}

.dashboard-page .rfb-slide.slide-welcome h1 .highlight {
    color: #56d99b !important;
}

.dashboard-page .rfb-slide.slide-welcome .rfb-location-highlight {
    color: #8be0b4 !important;
    background: rgba(0,184,90,.12) !important;
    border-color: rgba(0,184,90,.28) !important;
}

/* Identitas warna per slide */
.dashboard-page .rfb-slide.slide-avengers {
    background:
        radial-gradient(ellipse at 18% 82%, rgba(174,24,35,.38), transparent 43%),
        radial-gradient(ellipse at 80% 15%, rgba(0,160,90,.20), transparent 40%),
        linear-gradient(115deg,#090d12,#171b22 54%,#080d12) !important;
}
.dashboard-page .rfb-slide.slide-avengers h1 .highlight,
.dashboard-page .rfb-slide.slide-avengers .rfb-eyebrow span { color:#00d181; background-color:#00d181; }

.dashboard-page .rfb-slide.slide-gold {
    background:
        radial-gradient(ellipse at 18% 82%, rgba(190,127,12,.34), transparent 43%),
        linear-gradient(115deg,#0b0906,#2a2112 55%,#0b0906) !important;
}
.dashboard-page .rfb-slide.slide-gold h1 .highlight { color:#edc15c !important; }

.dashboard-page .rfb-slide.slide-oil {
    background:
        radial-gradient(ellipse at 18% 82%, rgba(150,160,170,.25), transparent 43%),
        linear-gradient(115deg,#101419,#303840 55%,#11161b) !important;
}
.dashboard-page .rfb-slide.slide-oil h1 .highlight { color:#d5dce3 !important; }

.dashboard-page .rfb-slide.slide-nikkei {
    background:
        radial-gradient(ellipse at 18% 82%, rgba(0,119,255,.30), transparent 43%),
        linear-gradient(115deg,#06172f,#103d68 55%,#07172d) !important;
}
.dashboard-page .rfb-slide.slide-nikkei h1 .highlight { color:#55baff !important; }

.dashboard-page .rfb-slide.slide-aud {
    background:
        radial-gradient(ellipse at 18% 82%, rgba(0,174,130,.30), transparent 43%),
        linear-gradient(115deg,#061c1b,#075449 55%,#061c20) !important;
}
.dashboard-page .rfb-slide.slide-aud h1 .highlight { color:#59dfb5 !important; }

.dashboard-page .rfb-slide.slide-avengers-final {
    background:
        radial-gradient(ellipse at 18% 82%, rgba(174,24,35,.32), transparent 43%),
        radial-gradient(ellipse at 80% 12%, rgba(0,160,90,.20), transparent 40%),
        linear-gradient(115deg,#090d12,#171b22 54%,#080d12) !important;
}

/* Panah dan dots */
.dashboard-page .rfb-slider-controls {
    position: absolute;
    inset: 0;
    z-index: 80;
    display: block;
    pointer-events: none;
}

.dashboard-page #rfbPrev,
.dashboard-page #rfbNext,
.dashboard-page .rfb-slider-arrow {
    position: absolute;
    top: 50%;
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    transform: translateY(-50%);
    border: 1px solid rgba(255,255,255,.34);
    border-radius: 50%;
    background: rgba(4,12,16,.48);
    color: #fff;
    font-size: 20px;
    z-index: 85;
    pointer-events: auto;
    backdrop-filter: blur(10px);
    transition: background .2s ease, border-color .2s ease, transform .2s ease;
}
.dashboard-page #rfbPrev { left: 20px; }
.dashboard-page #rfbNext { right: 20px; }
.dashboard-page #rfbPrev:hover,
.dashboard-page #rfbNext:hover {
    background: #00a84f;
    border-color: #00a84f;
    transform: translateY(-50%) scale(1.06);
}

.dashboard-page .rfb-slider-controls .rfb-slider-dots {
    position: absolute;
    left: 50%;
    bottom: 20px;
    display: flex;
    align-items: center;
    gap: 9px;
    transform: translateX(-50%);
    pointer-events: auto;
}

.dashboard-page .rfb-slider-dot {
    position: relative;
    width: 8px;
    height: 8px;
    border: 0;
    border-radius: 20px;
    background: rgba(255,255,255,.48);
    cursor: pointer;
}
.dashboard-page .rfb-slider-dot.active {
    width: 25px;
    background: #00d181;
}

/* Tablet */
@media (max-width: 1100px) {
    .dashboard-page .rfb-slider {
        height: 610px;
        min-height: 610px;
    }
    .dashboard-page .rfb-slide {
        padding: 42px 6% 64px;
        gap: 24px;
    }
    .dashboard-page .rfb-slide-content {
        flex-basis: 54%;
        width: 54%;
    }
    .dashboard-page .rfb-slide-visual {
        flex-basis: 40%;
        width: 40%;
    }
    .dashboard-page .rfb-slide h1 {
        font-size: clamp(31px, 3.6vw, 42px);
    }
    .dashboard-page .rfb-slide-description {
        font-size: 12px;
    }
}

/* Mobile: konten tetap terbaca, tidak dipotong */
@media (max-width: 767px) {
    .dashboard-page .dashboard-hero {
        margin-bottom: 22px;
    }
    .dashboard-page .rfb-slider {
        height: auto;
        min-height: 0;
        overflow: hidden;
    }
    .dashboard-page .rfb-slide {
        position: absolute;
        inset: 0;
        min-height: 760px;
        height: auto;
        flex-direction: column;
        justify-content: flex-start;
        align-items: stretch;
        gap: 8px;
        padding: 34px 48px 72px;
        overflow-y: auto;
    }
    .dashboard-page .rfb-slide-content {
        order: 1;
        flex: 0 0 auto;
        width: 100%;
        max-width: none;
        margin: 0;
    }
    .dashboard-page .rfb-slide-visual {
        order: 2;
        flex: 0 0 220px;
        width: 100%;
        height: 220px;
        min-height: 220px;
        margin-top: 8px;
    }
    .dashboard-page .rfb-brand-pair {
        margin-bottom: 15px;
    }
    .dashboard-page .rfb-brand-pair img {
        width: 39px;
        height: 39px;
    }
    .dashboard-page .rfb-brand-pair .rfb-avengers-logo {
        width: 100px;
        height: 38px;
    }
    .dashboard-page .rfb-slide h1 {
        font-size: clamp(27px, 7vw, 36px);
        line-height: 1.13;
        margin-bottom: 13px;
    }
    .dashboard-page .rfb-slide-description {
        font-size: 11px;
        line-height: 1.65;
    }
    .dashboard-page .rfb-location-highlight {
        margin-top: 12px;
        font-size: 9px;
    }
    .dashboard-page .rfb-hero-actions {
        grid-template-columns: repeat(2, minmax(0,1fr));
        gap: 8px;
        margin-top: 14px;
    }
    .dashboard-page .rfb-hero-btn {
        min-height: 48px;
        padding: 8px 10px;
        font-size: 10px;
    }
    .dashboard-page .rfb-hero-btn small {
        font-size: 8px;
    }
    .dashboard-page .rfb-product-image {
        max-height: 210px;
        width: 100%;
    }
    .dashboard-page .rfb-visual-tag {
        right: 0;
        bottom: 8px;
        padding: 9px 12px;
    }
    .dashboard-page .rfb-visual-tag strong {
        font-size: 15px;
    }
    .dashboard-page .rfb-slide.slide-welcome .rfb-slide-visual::before {
        inset: 0 4% 15%;
        background-size: min(62%, 230px) auto;
    }
    .dashboard-page #rfbPrev { left: 7px; }
    .dashboard-page #rfbNext { right: 7px; }
    .dashboard-page #rfbPrev,
    .dashboard-page #rfbNext {
        width: 34px;
        height: 34px;
        font-size: 15px;
    }
    .dashboard-page .rfb-slider-controls .rfb-slider-dots {
        bottom: 18px;
    }
}

/* Ponsel sangat kecil */
@media (max-width: 420px) {
    .dashboard-page .rfb-slide {
        padding-left: 40px;
        padding-right: 40px;
    }
    .dashboard-page .rfb-slide h1 {
        font-size: 26px;
    }
    .dashboard-page .rfb-slide-description {
        font-size: 10.5px;
    }
}


/* =====================================================
   WELCOME HERO - RIFAN FINANCINDO BERJANGKA
   NEW CORPORATE BANNER DESIGN
===================================================== */

/* Background banner */
.dashboard-page .rfb-slide.slide-welcome {
    position: absolute;
    inset: 0;

    background:
        linear-gradient(
            90deg,
            rgba(255,255,255,.97) 0%,
            rgba(255,255,255,.94) 36%,
            rgba(255,255,255,.78) 52%,
            rgba(255,255,255,.10) 76%,
            rgba(255,255,255,0) 100%
        ),
        url("{{ asset('public/images/hero/slide-1/jpeg') }}");

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

    color: #172b4d;
}

/* Hilangkan dekorasi grafik SVG lama pada slide welcome */
.dashboard-page .slide-welcome .rfb-chart-decoration {
    display: none;
}

/* Area konten */

/* Area konten - rata kiri */
.dashboard-page .slide-welcome .welcome-content {
    position: relative;
    z-index: 5;

    width: 72%;
    max-width: 900px;

    margin-left: 0;
    margin-right: auto;

    text-align: left;
    align-items: flex-start;
}


/* Label atas */
.dashboard-page .welcome-eyebrow {
    display: flex;
    align-items: center;
    gap: 10px;

    margin-bottom: 20px;

    color: #008f44;

    font-size: 11px;
    font-weight: 850;
    letter-spacing: 2px;
}

.dashboard-page .welcome-eyebrow span {
    width: 9px;
    height: 9px;

    border-radius: 50%;

    background: #00b85a;

    box-shadow: 0 0 12px rgba(0,184,90,.5);
}

/* Judul utama */
.dashboard-page .welcome-title {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    text-align: left;

    margin: 0 0 19px;
}

/* Baris pertama */
.dashboard-page .welcome-title .title-line-one {
    color: #172b4d;

    font-size: clamp(28px, 3vw, 43px);
    font-weight: 750;
}

/* Baris kedua - paling dominan */
.dashboard-page .welcome-title .title-line-two {
    margin-top: 5px;

    color: #c62828;

    font-size: clamp(38px, 4.2vw, 60px);
    font-weight: 900;
}

/* Baris ketiga */
.dashboard-page .welcome-title .title-line-three {
    display: inline-block;

    margin-top: 12px;
    padding: 8px 15px;

    color: #172b4d;

    font-size: clamp(21px, 2.5vw, 34px);
    font-weight: 850;

    letter-spacing: -.5px;
}

/* Deskripsi */
.dashboard-page .welcome-description {
    max-width: 600px;
    margin: 0;

    text-align: left;

    color: #e41b1b;
    font-size: 14px;
    line-height: 1.8;
    font-weight: 500;
}

/* =====================================================
   FOUR CTA BUTTONS
===================================================== */

.dashboard-page .welcome-actions {
    display: grid;

    grid-template-columns: repeat(4, minmax(0, 1fr));

    gap: 10px;

    width: 100%;
    max-width: 790px;

    margin-top: 25px;
}

/* Tombol umum */
.dashboard-page .welcome-btn {
    display: flex;

    align-items: center;
    justify-content: center;

    gap: 9px;

    min-width: 0;
    min-height: 57px;

    padding: 8px 11px;

    border-radius: 35px;

    background: #ffffff;

    border: 1px solid #dce2e8;

    color: #172b4d !important;

    text-decoration: none !important;

    box-shadow:
        0 5px 15px rgba(23,43,77,.10);

    transition: all .25s ease;
}

/* Ikon tombol */
.dashboard-page .welcome-btn-icon {
    display: flex;

    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    width: 30px;
    height: 30px;

    border-radius: 50%;

    background: #edf4f0;

    color: #008f44;

    font-size: 15px;
}

/* Teks tombol */

.dashboard-page .welcome-btn-text {
    display: flex;
    flex-direction: column;
    flex: 1;
    min-width: 0;
    gap: 3px;
    text-align: left;
}

.dashboard-page .welcome-btn-text strong {
    display: block;
    color: #172b4d;
    font-size: 13px;
    font-weight: 850;
    line-height: 1.3;

    white-space: normal;
    overflow-wrap: break-word;
}


.dashboard-page .welcome-btn-text small {
    display: block;

    color: #737d89;

    font-size: 9px;
    font-weight: 500;

    line-height: 1.2;

    white-space: nowrap;
}

/* Hover */
.dashboard-page .welcome-btn:hover {
    transform: translateY(-3px);

    border-color: #00a84f;

    box-shadow:
        0 10px 22px rgba(23,43,77,.15);

    background: #f5fff8;
}

/* Real account - tombol unggulan */
.dashboard-page .welcome-btn-real {
    background: #00b85a;

    border-color: #00b85a;

    box-shadow:
        0 7px 18px rgba(0,184,90,.24);
}

.dashboard-page .welcome-btn-real .welcome-btn-icon {
    background: rgba(255,255,255,.18);
    color: #ffffff;
}

.dashboard-page .welcome-btn-real .welcome-btn-text strong,
.dashboard-page .welcome-btn-real .welcome-btn-text small {
    color: #ffffff;
}

.dashboard-page .welcome-btn-real:hover {
    background: #009b4c;

    border-color: #009b4c;
}

/* =====================================================
   RESPONSIVE TABLET
===================================================== */

@media (max-width: 1000px) {

    .dashboard-page .slide-welcome {
        background-position: 58% center;
    }

    .dashboard-page .slide-welcome .welcome-content {
        width: 78%;
    }

    .dashboard-page .welcome-actions {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        max-width: 480px;
    }

    .dashboard-page .welcome-btn {
        justify-content: flex-start;
        padding: 9px 13px;
    }
}

/* =====================================================
   RESPONSIVE MOBILE
===================================================== */

@media (max-width: 700px) {

    .dashboard-page .rfb-slide.slide-welcome {
        min-height: 850px;
        height: 850px;

        padding: 35px 22px 90px;

        justify-content: flex-start;

        background:
            linear-gradient(
                180deg,
                rgba(255,255,255,.97) 0%,
                rgba(255,255,255,.95) 53%,
                rgba(255,255,255,.60) 100%
            ),
            url("{{ asset('images/banner-rifan-hero.png') }}");

        background-size: cover;
        background-position: 67% center;
    }

    .dashboard-page .slide-welcome .welcome-content {
        width: 100%;
        max-width: 100%;
    }

    .dashboard-page .welcome-eyebrow {
        font-size: 9px;
        margin-bottom: 17px;
    }

    .dashboard-page .welcome-title {
        letter-spacing: -.8px;
    }

    .dashboard-page .welcome-title .title-line-one {
        font-size: 27px;
    }

    .dashboard-page .welcome-title .title-line-two {
        font-size: 36px;
    }

    .dashboard-page .welcome-title .title-line-three {
        font-size: 20px;
        padding: 7px 10px;
    }

    .dashboard-page .welcome-description {
        font-size: 12px;
        line-height: 1.7;
    }

    .dashboard-page .welcome-actions {
        grid-template-columns: repeat(2, minmax(0, 1fr));

        gap: 9px;

        margin-top: 22px;
    }

    .dashboard-page .welcome-btn {
        min-height: 58px;
        padding: 8px 9px;

        gap: 7px;

        border-radius: 14px;
    }

    .dashboard-page .welcome-btn-icon {
        width: 26px;
        height: 26px;

        font-size: 13px;
    }

    .dashboard-page .welcome-btn-text strong {
        font-size: 10px;
    }

    .dashboard-page .welcome-btn-text small {
        font-size: 8px;
    }
}


/* ==========================================================
   FIX FINAL - WELCOME HERO BACKGROUND
   PT RIFAN FINANCINDO BERJANGKA
========================================================== */

/* DESKTOP */
.dashboard-page .rfb-slide.slide-welcome {
    position: absolute;
    inset: 0;

    background:
        linear-gradient(
            90deg,
            rgba(255,255,255,.97) 0%,
            rgba(255,255,255,.93) 32%,
            rgba(255,255,255,.75) 50%,
            rgba(255,255,255,.12) 75%,
            rgba(255,255,255,0) 100%
        ),
        url("/images/hero/welcome.png") center center / cover no-repeat
        !important;

    color: #172b4d !important;
}

/* TABLET */
@media (max-width: 1000px) {
    .dashboard-page .rfb-slide.slide-welcome {
        background:
            linear-gradient(
                90deg,
                rgba(255,255,255,.97) 0%,
                rgba(255,255,255,.91) 42%,
                rgba(255,255,255,.35) 100%
            ),
            url("/images/hero/welcome.png") 58% center / cover no-repeat
            !important;
    }
}

/* MOBILE */
@media (max-width: 700px) {
    .dashboard-page .rfb-slide.slide-welcome {
        min-height: 850px;
        height: 850px;

        padding: 35px 22px 100px;

        background:
            linear-gradient(
                180deg,
                rgba(255,255,255,.97) 0%,
                rgba(255,255,255,.90) 55%,
                rgba(255,255,255,.45) 100%
            ),
            url("/images/hero/slide-1.jpeg") 67% center / cover no-repeat
            !important;
    }
}


/* ===== FIX BACKGROUND IMAGE SLIDE WELCOME ===== */

.rfb-slider > .rfb-slide.slide-welcome {
    background-image: url("/images/hero/welcome.png") !important;
    background-size: cover !important;
    background-position: center center !important;
    background-repeat: no-repeat !important;
    background-color: #ffffff !important;
}

/* Sembunyikan dekorasi lama */
.rfb-slider > .rfb-slide.slide-welcome .rfb-chart-decoration {
    display: none !important;
}

/* Pastikan konten berada di atas background */
.rfb-slider > .rfb-slide.slide-welcome .welcome-content {
    position: relative;
    z-index: 5;
}

/* Tampilan mobile */
@media (max-width: 700px) {
    .rfb-slider > .rfb-slide.slide-welcome {
        background-position: 65% center !important;
    }
}


/* ==========================================
   WELCOME BANNER - DIRECT IMAGE FIX
========================================== */

.dashboard-page .rfb-slide.slide-welcome {
    position: absolute;
    inset: 0;
    overflow: hidden;
    background: #ffffff !important;
}

/* Gambar background */
.dashboard-page .rfb-slide.slide-welcome .welcome-bg-image {
    position: absolute !important;
    inset: 0 !important;

    display: block !important;

    width: 100% !important;
    height: 100% !important;

    max-width: none !important;
    max-height: none !important;

    object-fit: cover !important;
    object-position: center center !important;

    z-index: 0 !important;
    opacity: 0.75 !important;

    pointer-events: none;
}

/* Konten di atas gambar */
.dashboard-page .rfb-slide.slide-welcome .welcome-content {
    position: relative !important;
    z-index: 5 !important;

    width: 72%;
    max-width: 900px;
}

/* Sembunyikan grafik dekorasi lama */
.dashboard-page .rfb-slide.slide-welcome .rfb-chart-decoration {
    display: none !important;
}

/* Responsive */
@media (max-width: 700px) {
    .dashboard-page .rfb-slide.slide-welcome .welcome-bg-image {
        object-position: 65% center !important;
    }

    .dashboard-page .rfb-slide.slide-welcome .welcome-content {
        width: 100%;
    }
}

.dashboard-page .rfb-slide .welcome-bg-image,
.dashboard-page .rfb-slide .gold-bg-image,
.dashboard-page .rfb-slide .oil-bg-image,
.dashboard-page .rfb-slide .nikkei-bg-image {
    width: 100%;
    height: 100%;

    object-fit: cover;
    object-position: center center;
}



/* =========================================================
   FINAL FIX - FULL WIDTH DASHBOARD
   NAVBAR > TOP NEWS > HERO
========================================================= */

/* WRAPPER DASHBOARD: LEPAS DARI BATAS CONTAINER */
.dashboard-page {
    position: relative !important;

    width: 100vw !important;
    max-width: none !important;

    margin-top: -30px !important;
    margin-left: calc(50% - 50vw) !important;
    margin-right: 0 !important;

    padding: 0 !important;
    box-sizing: border-box;
}

/* TOP NEWS: FULL WIDTH */
.dashboard-page .dashboard-topbar {
    position: relative !important;

    width: 100% !important;
    max-width: none !important;

    margin: 0 !important;
    padding: 0 !important;

    left: auto !important;
    right: auto !important;
    transform: none !important;

    box-sizing: border-box;
}

/* AREA BERITA */
.dashboard-page .ticker-wrap {
    min-width: 0;
    flex: 1 1 auto;
}

/* HERO: LANGSUNG DI BAWAH TOP NEWS */
.dashboard-page .dashboard-hero {
    position: relative !important;
    width: 100% !important;
    max-width: none !important;
    height: auto !important;
    min-height: 0 !important;
    aspect-ratio: 1600 / 616;
    margin: 0 !important;
    padding: 0 !important;
    border-radius: 0 !important;
    overflow: hidden !important;
    box-sizing: border-box;
}

/* SLIDER */
.dashboard-page .rfb-slider {
    position: relative !important;
    width: 100% !important;
    height: 100% !important;
    min-height: 0 !important;
    margin: 0 !important;
    padding: 0 !important;
    overflow: hidden !important;
    box-sizing: border-box;
}

/* SLIDE */
.dashboard-page .rfb-slide {
    width: 100% !important;
    height: 100% !important;
    min-height: 0 !important;
    box-sizing: border-box;
}

/* MOBILE */
@media (max-width: 767px) {

    .dashboard-page {
        margin-top: 0 !important;
    }

    .dashboard-page .dashboard-hero,
    .dashboard-page .rfb-slider,
    .dashboard-page .rfb-slide {
        height: 760px !important;
        min-height: 760px !important;
    }
}



/* =====================================================
   HERO - RAPIHKAN SLIDE 2 (AVENGERS) & SLIDE 6 (AUD)
   Hanya menyentuh .slide-avengers dan .slide-aud.
   Slide lain, navbar, top news, market, berita: tidak diubah.
===================================================== */

/* Dasar: gambar poster memenuhi slide, tanpa padding/dekorasi lama */
.dashboard-page .rfb-slide.slide-avengers,
.dashboard-page .rfb-slide.slide-aud {
    display: block !important;
    padding: 0 !important;
    overflow: hidden !important;
}

.dashboard-page .rfb-slide.slide-avengers { background: #dbe6f0 !important; }
.dashboard-page .rfb-slide.slide-aud      { background: #eef2f4 !important; }

/* Matikan grid & lingkaran dekoratif lama di dua slide ini */
.dashboard-page .rfb-slide.slide-avengers::before,
.dashboard-page .rfb-slide.slide-avengers::after,
.dashboard-page .rfb-slide.slide-aud::before,
.dashboard-page .rfb-slide.slide-aud::after {
    content: none !important;
}

/* Desktop & tablet: gambar full, tanpa bar kosong di kiri/kanan */
.dashboard-page .slide-avengers .avengers-bg-image,
.dashboard-page .slide-aud .aud-bg-image {
    position: absolute !important;
    inset: 0 !important;
    z-index: 1 !important;

    display: block !important;
    width: 100% !important;
    height: 100% !important;
    max-width: none !important;
    max-height: none !important;

    object-fit: cover !important;
    object-position: center 40% !important;

    pointer-events: none;
    user-select: none;
}

/* Layar sangat lebar: jaga teks bawah tetap terlihat */
@media (min-width: 1700px) {
    .dashboard-page .slide-avengers .avengers-bg-image,
    .dashboard-page .slide-aud .aud-bg-image {
        object-position: center 45% !important;
    }
}

/* Mobile: poster ditampilkan utuh (tidak terpotong),
   area kosong diisi versi blur dari gambar yang sama */
@media (max-width: 767px) {

    .dashboard-page .rfb-slide.slide-avengers::before,
    .dashboard-page .rfb-slide.slide-aud::before {
        content: "" !important;
        position: absolute !important;
        inset: -20px !important;
        z-index: 0 !important;

        background-size: cover !important;
        background-position: center !important;
        background-repeat: no-repeat !important;

        filter: blur(18px) brightness(.96);
        opacity: 1 !important;

        -webkit-mask-image: none !important;
        mask-image: none !important;
        pointer-events: none;
    }

    .dashboard-page .rfb-slide.slide-avengers::before {
        background-image: url("{{ asset('images/hero/slide-2.jpeg') }}") !important;
    }

    .dashboard-page .rfb-slide.slide-aud::before {
        background-image: url("{{ asset('images/hero/slide-6.jpeg') }}") !important;
    }

    .dashboard-page .slide-avengers .avengers-bg-image,
    .dashboard-page .slide-aud .aud-bg-image {
        object-fit: contain !important;
        object-position: center center !important;
        filter: drop-shadow(0 10px 24px rgba(10, 25, 40, .18));
    }
}


/* =====================================================
   TOP NEWS MENEMPEL LANGSUNG DI BAWAH NAVBAR
   Navbar fixed: 76px (desktop), 68px (<= 760px).
   Konten dashboard dimulai tepat di bawah navbar,
   tanpa celah dan tanpa bergantung pada margin negatif.
===================================================== */

.main-content:has(> .dashboard-page) {
    padding-top: 0 !important;
}

.main-content > .dashboard-page {
    margin-top: 0 !important;
    padding-top: 76px !important;
}

.main-content > .dashboard-page > .dashboard-topbar {
    margin-top: 0 !important;
}

@media (max-width: 760px) {
    .main-content > .dashboard-page {
        padding-top: 68px !important;
    }
}


/* =====================================================
   LEBAR BAGIAN BAWAH HERO DIKEMBALIKAN
   Top News + hero tetap full width.
   Avengers intro, market data, dan berita kembali
   ke lebar container normal (maks. 1100px, di tengah).
===================================================== */

.dashboard-page > :not(.dashboard-topbar):not(.dashboard-hero) {
    width: min(1100px, calc(100% - 76px)) !important;
    max-width: 1100px !important;
    margin-left: auto !important;
    margin-right: auto !important;
    box-sizing: border-box;
}

@media (max-width: 760px) {
    .dashboard-page > :not(.dashboard-topbar):not(.dashboard-hero) {
        width: calc(100% - 30px) !important;
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

    <div class="rfb-slider" id="rfbSlider">


{{-- ================= SLIDE 1: WELCOME ================= --}}
<article class="rfb-slide slide-welcome active">

    {{-- BACKGROUND IMAGE --}}
<img
    src="{{ asset('images/hero/slide-1.jpeg') }}"
    alt="Rifan Financindo Berjangka"
    class="welcome-bg-image"
>

    <div class="rfb-slide-content welcome-content">

        <div class="welcome-eyebrow">
            <span></span>
            PT RIFAN FINANCINDO BERJANGKA
        </div>

        <h1 class="welcome-title">
            <span class="title-line-one">Salah Satu Perusahaan</span>

            <span class="title-line-two">Pialang Berjangka</span>

            <span class="title-line-three">
                Paling Aktif di Indonesia
            </span>
        </h1>

        <p class="welcome-description">
            Bersama Rifan Financindo Berjangka, jelajahi peluang pasar global melalui 
        </p>
        <p>
            layanan perdagangan berjangka yang profesional, transparan, dan terpercaya.
        </p>

        <div class="rfb-hero-actions welcome-actions">

            <a href="https://regol.rifan-financindo-berjangka.co.id/"
               target="_blank"
               rel="noopener noreferrer"
               class="welcome-btn">

                <span class="welcome-btn-icon">
                    <i class="bi bi-laptop"></i>
                </span>

                <span class="welcome-btn-text">
                    <strong>Demo Registration</strong>
                    <small>Daftar akun demo</small>
                </span>
            </a>

            <a href="https://demo.rifanberjangka.com/login"
               target="_blank"
               rel="noopener noreferrer"
               class="welcome-btn">

                <span class="welcome-btn-icon">
                    <i class="bi bi-person-circle"></i>
                </span>

                <span class="welcome-btn-text">
                    <strong>Demo Account</strong>
                    <small>Masuk akun demo</small>  
                </span>
            </a>

            <a href="https://regol.rifan-financindo-berjangka.co.id/login"
               target="_blank"
               rel="noopener noreferrer"
               class="welcome-btn">

                <span class="welcome-btn-icon">
                    <i class="bi bi-person-plus-fill"></i>
                </span>

                <span class="welcome-btn-text">
                    <strong>Register Online</strong>
                    <small>Daftar akun real</small>
                </span>
            </a>

            <a href="https://etrade.rifanberjangka.com/login"
               target="_blank"
               rel="noopener noreferrer"
               class="welcome-btn welcome-btn-real">

                <span class="welcome-btn-icon">
                    <i class="bi bi-graph-up-arrow"></i>
                </span>

                <span class="welcome-btn-text">
                    <strong>Real Account</strong>
                    <small>Masuk akun real</small>
                </span>
            </a>

        </div>

    </div>

</article>

{{-- SLIDE 2: AVENGERS TEAM --}}
<article class="rfb-slide slide-avengers">
    <img
        src="{{ asset('images/hero/slide-2.jpeg') }}"
        alt="Avengers Team"
        class="avengers-bg-image"
    >
</article>

{{-- SLIDE 3: GOLD --}}
<article class="rfb-slide slide-gold">
    <img
        src="{{ asset('images/hero/slide-3.jpeg') }}"
        class="gold-bg-image"
        alt="Gold Trading"
    >

    {{-- Konten Gold --}}
</article>

{{-- SLIDE 4: OIL --}}
<article class="rfb-slide slide-oil">
    <img
        src="{{ asset('images/hero/slide-4.jpeg') }}"
        class="oil-bg-image"
        alt="Oil Trading"
    >

    {{-- Konten Oil --}}
</article>

{{-- SLIDE 5: NIKKEI --}}
<article class="rfb-slide slide-nikkei">
    <img
        src="{{ asset('images/hero/slide-5.jpeg') }}"
        alt="Nikkei Trading"
        class="nikkei-bg-image"
    >
</article>

{{-- SLIDE 6: AUD --}}
<article class="rfb-slide slide-aud">
    <img
        src="{{ asset('images/hero/slide-6.jpeg') }}"
        alt="AUD Trading"
        class="aud-bg-image"
    >
</article>

        {{-- SLIDER NAVIGATION --}}

        <div class="rfb-slider-controls">

            <button type="button"
                    class="rfb-slider-arrow"
                    id="rfbPrev"
                    aria-label="Slide sebelumnya">
                <i class="bi bi-chevron-left"></i>
            </button>

            <div class="rfb-slider-dots">
                @for($i = 0; $i < 6; $i++)
                    <button type="button"
                            class="rfb-slider-dot {{ $i === 0 ? 'active' : '' }}"
                            data-slide="{{ $i }}"
                            aria-label="Slide {{ $i + 1 }}">
                    </button>
                @endfor
            </div>

            <button type="button"
                    class="rfb-slider-arrow"
                    id="rfbNext"
                    aria-label="Slide berikutnya">
                <i class="bi bi-chevron-right"></i>
            </button>

        </div>

    </div>

</section>


{{-- ======================================================
     WHY AVENGERS TEAM
====================================================== --}}


{{-- =====================================================
     AVENGERS TEAM INTRO - NEW DESIGN
===================================================== --}}

<section class="avengers-intro">

    {{-- FRAME UTAMA --}}
    <div class="avengers-frame">

        <div class="avengers-frame-heading">

            <div>
                <span>GET TO KNOW US</span>

                <h2>
                    Meet the
                    <strong>Avengers Team.</strong>
                </h2>

                <p>
                    Six different personalities, one strong team.
                </p>
            </div>

            <div class="avengers-heading-logo">
                <img
                    src="{{ asset('images/avengersteam-header.png') }}"
                    alt="Avengers Team"
                >
            </div>

        </div>


        {{-- DUA CARD TERPISAH --}}
        <div class="avengers-content-grid">

            {{-- CARD FOTO --}}
            <div class="avengers-photo-card">

                <div class="avengers-photo-wrapper">

                    <img
                        src="{{ asset('images/A1.jpeg') }}"
                        alt="Avengers Team Semarang"
                        loading="lazy"
                    >

                </div>

                <div class="avengers-photo-caption">

                    <span>OUR PEOPLE</span>

                    <h3>One Team, Many Colors.</h3>

                    <p>
                        Enam anggota dengan karakter yang berbeda.
                    </p>

                </div>

            </div>


            {{-- CARD DESKRIPSI --}}
            <div class="avengers-description-card">

                <span class="avengers-label">
                    MORE THAN JUST A TEAM
                </span>

                <h3>
                    Kenapa Harus
                    <span>Avengers Team?</span>
                </h3>

                <p>
                    Avengers Team merupakan salah satu tim
                    di PT Rifan Financindo Berjangka Semarang
                    yang terdiri dari enam anggota tetap.
                </p>

                <p>
                    Kami adalah tim yang fun, santai, dan
                    penuh warna. Setiap anggota memiliki
                    karakter dan kepribadian yang berbeda.
                    Banyak di antara kami merupakan generasi
                    muda yang membawa energi dan kreativitas.
                </p>

                <p>
                    Meski santai dalam kebersamaan, kami
                    tetap serius, bertanggung jawab, dan
                    profesional ketika bekerja. Perbedaan
                    justru membuat kami saling melengkapi
                    dan berkembang bersama.
                </p>

                <div class="avengers-feature-list">

                    <span>
                        <i class="bi bi-emoji-smile-fill"></i>
                        Fun Environment
                    </span>

                    <span>
                        <i class="bi bi-people-fill"></i>
                        Strong Teamwork
                    </span>

                    <span>
                        <i class="bi bi-lightning-fill"></i>
                        Young & Creative
                    </span>

                    <span>
                        <i class="bi bi-award-fill"></i>
                        Professional
                    </span>

                </div>

                <a href="{{ route('team.profile') }}"
                   class="avengers-profile-btn">

                    Avengers Team Profile

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>

        </div>

    </div>

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

    
document.addEventListener('DOMContentLoaded', function () {

  
/* =====================================
   RFB HERO SLIDER
===================================== */

function initRfbHeroSlider() {

    const slider = document.getElementById('rfbSlider');

    if (!slider) return;

    const slides = slider.querySelectorAll('.rfb-slide');
    const dots = slider.querySelectorAll('.rfb-slider-dot');

    const prev = document.getElementById('rfbPrev');
    const next = document.getElementById('rfbNext');

    if (!slides.length) return;

    let current = 0;
    let timer = null;

    const duration = 6000;

    function showSlide(index) {

        current = (index + slides.length) % slides.length;

        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === current);

            slide.setAttribute(
                'aria-hidden',
                i !== current ? 'true' : 'false'
            );
        });

        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === current);

            dot.setAttribute(
                'aria-current',
                i === current ? 'true' : 'false'
            );
        });
    }

    function stopAutoSlide() {
        if (timer !== null) {
            clearInterval(timer);
            timer = null;
        }
    }

    function startAutoSlide() {
        stopAutoSlide();

        timer = setInterval(() => {
            showSlide(current + 1);
        }, duration);
    }

    function moveSlide(index) {
        showSlide(index);
        startAutoSlide();
    }

    if (next) {
        next.addEventListener('click', function () {
            moveSlide(current + 1);
        });
    }

    if (prev) {
        prev.addEventListener('click', function () {
            moveSlide(current - 1);
        });
    }

    dots.forEach((dot, index) => {
        dot.addEventListener('click', function () {
            moveSlide(index);
        });
    });

    slider.addEventListener('mouseenter', stopAutoSlide);
    slider.addEventListener('mouseleave', startAutoSlide);

    showSlide(0);
    startAutoSlide();
}

/* Pastikan slider diinisialisasi */
if (document.readyState === 'loading') {
    document.addEventListener(
        'DOMContentLoaded',
        initRfbHeroSlider
    );
} else {
    initRfbHeroSlider();
}


    /* =====================================
       WELCOME POPUP
    ===================================== */

    const popup = document.getElementById('rfbWelcomePopup');

    const close = document.getElementById('rfbWelcomeClose');

    const skip = document.getElementById('rfbWelcomeSkip');

    if (popup) {

        const popupKey = 'avengers_welcome_shown';

        function closePopup() {

            popup.classList.remove('show');

            sessionStorage.setItem(popupKey, '1');

        }

        if (!sessionStorage.getItem(popupKey)) {

            setTimeout(() => {

                popup.classList.add('show');

            }, 500);

        }

        if (close) {
            close.addEventListener('click', closePopup);
        }

        if (skip) {
            skip.addEventListener('click', closePopup);
        }

        popup.addEventListener('click', function (e) {

            if (e.target === popup) {
                closePopup();
            }

        });

        document.addEventListener('keydown', function (e) {

            if (
                e.key === 'Escape' &&
                popup.classList.contains('show')
            ) {
                closePopup();
            }

        });

    }

});

</script>
@endif


{{-- ======================================================
     WELCOME POPUP AVENGERS TEAM
====================================================== --}}

<div class="rfb-welcome-overlay" id="rfbWelcomePopup">

    <div class="rfb-welcome-card">

        <button type="button"
                class="rfb-welcome-close"
                id="rfbWelcomeClose"
                aria-label="Tutup popup">

            &times;

        </button>

        <div class="rfb-welcome-logos">

            <img
                src="{{ asset('images/logo-rifan-2.png') }}"
                alt="Logo Rifan"
            >

            <img
                src="{{ asset('images/avengersteam-header.png') }}"
                alt="Avengers Team"
            >

        </div>

        <div class="rfb-eyebrow"
             style="justify-content:center;color:#00a84f">

            <span></span>
            WELCOME TO OUR TEAM

        </div>

        <h2>
            Selamat Datang di
            <span style="color:#c62828">
                Avengers Team!
            </span>
        </h2>

        <p>
            Senang bisa menyambut Anda di website
            PT Rifan Financindo Berjangka Semarang.
            Kenali perusahaan kami, jelajahi produk perdagangan,
            dan temukan keseruan bersama Avengers Team.
        </p>

        <a href="{{ route('team.profile') }}"
           class="rfb-welcome-button">

            Kenali Avengers Team

            <i class="bi bi-arrow-right"></i>

        </a>

        <button type="button"
                class="rfb-welcome-skip"
                id="rfbWelcomeSkip">

            Mulai Jelajahi Website

        </button>

    </div>

</div>


{{-- Jaring pengaman: pastikan Top News menempel persis di bawah navbar --}}
<script>
(function () {
    function closeTopNewsGap() {
        var header = document.querySelector('.top-header');
        var bar = document.querySelector('.dashboard-page .dashboard-topbar');
        if (!header || !bar) return;

        bar.style.setProperty('margin-top', '0px', 'important');

        var headerBottom = header.getBoundingClientRect().bottom;
        var barTop = bar.getBoundingClientRect().top + window.pageYOffset;
        var gap = Math.round(barTop - headerBottom);

        if (gap !== 0) {
            bar.style.setProperty('margin-top', (-gap) + 'px', 'important');
        }
    }

    window.addEventListener('DOMContentLoaded', closeTopNewsGap);
    window.addEventListener('load', closeTopNewsGap);
    window.addEventListener('resize', closeTopNewsGap);
    if (document.fonts && document.fonts.ready) {
        document.fonts.ready.then(closeTopNewsGap);
    }
    closeTopNewsGap();
})();
</script>

@endsection