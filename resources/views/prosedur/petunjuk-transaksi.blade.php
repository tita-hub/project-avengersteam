@extends('layouts.app')

@section('content')

<style>

/* ============================================================
   HALAMAN PETUNJUK TRANSAKSI
   TEMA : NAVY + ORANGE
   ============================================================ */

.transaction-page {

    --navy: #0b1f3a;
    --navy-dark: #07162b;
    --navy-soft: #132d50;

    --orange: #f28c28;
    --orange-dark: #d96f0b;
    --orange-soft: #fff4e8;

    padding: 35px 45px 70px;

    background:
        radial-gradient(
            circle at top right,
            rgba(242,140,40,.08),
            transparent 30%
        ),
        #f4f6fa;

    min-height: 100vh;

    box-sizing: border-box;
}


/* ============================================================
   KEMBALI
   ============================================================ */

.transaction-back {

    max-width: 1050px;

    margin: 0 auto 18px;
}

.transaction-back a {

    display: inline-flex;

    align-items: center;

    gap: 9px;

    color: var(--navy);

    text-decoration: none;

    font-size: 14px;

    font-weight: 700;

    transition: .3s ease;
}

.transaction-back a:hover {

    color: var(--orange);

    transform: translateX(-5px);
}

.transaction-back-arrow {

    width: 32px;
    height: 32px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 10px;

    background: white;

    border: 1px solid #e5e9ef;

    font-size: 18px;

    box-shadow:
        0 5px 15px rgba(11,31,58,.07);

    transition: .3s ease;
}

.transaction-back a:hover .transaction-back-arrow {

    background: var(--orange);

    color: white;

    border-color: var(--orange);

    transform: translateX(-2px);
}


/* ============================================================
   HERO HEADER
   ============================================================ */

.transaction-header {

    max-width: 1050px;

    margin: 0 auto 30px;

    position: relative;

    overflow: hidden;

    padding: 42px 45px;

    border-radius: 24px;

    background:
        linear-gradient(
            135deg,
            var(--navy-dark) 0%,
            var(--navy) 65%,
            #163861 100%
        );

    color: white;

    box-shadow:
        0 18px 45px rgba(11,31,58,.18);

    animation:
        transactionHero .7s ease;
}


/* dekorasi */

.transaction-header::before {

    content: "";

    position: absolute;

    width: 240px;
    height: 240px;

    right: -80px;
    top: -100px;

    border-radius: 50%;

    background:
        rgba(242,140,40,.16);
}

.transaction-header::after {

    content: "";

    position: absolute;

    width: 150px;
    height: 150px;

    right: 100px;
    bottom: -105px;

    border-radius: 50%;

    background:
        rgba(255,255,255,.04);
}


/* garis orange */

.transaction-header-line {

    position: absolute;

    left: 0;
    top: 0;

    width: 100%;
    height: 5px;

    background:
        linear-gradient(
            90deg,
            var(--orange),
            #ffb45e
        );
}


/* isi */

.transaction-header-content {

    position: relative;

    z-index: 2;

    max-width: 850px;
}


/* label */

.transaction-header-label {

    display: inline-flex;

    align-items: center;

    gap: 8px;

    padding: 7px 13px;

    margin-bottom: 17px;

    border-radius: 30px;

    background:
        rgba(242,140,40,.14);

    border:
        1px solid rgba(242,140,40,.35);

    color: #ffb45e;

    font-size: 11px;

    font-weight: 800;

    letter-spacing: 1.2px;

    text-transform: uppercase;
}

.transaction-header-label::before {

    content: "";

    width: 7px;
    height: 7px;

    border-radius: 50%;

    background:
        var(--orange);

    box-shadow:
        0 0 0 5px rgba(242,140,40,.12);
}


/* judul */

.transaction-header h1 {

    margin: 0 0 12px;

    color: white;

    font-size: 38px;

    line-height: 1.2;

    font-weight: 800;
}

.transaction-header h1 span {

    color:
        var(--orange);
}


/* deskripsi */

.transaction-header p {

    margin: 0;

    max-width: 820px;

    color:
        rgba(255,255,255,.75);

    font-size: 15px;

    line-height: 1.8;
}

.transaction-header strong {

    color:
        #ffb45e;
}


/* status */

.transaction-status {

    display: inline-flex;

    align-items: center;

    gap: 10px;

    margin-top: 23px;

    padding: 10px 15px;

    background:
        rgba(255,255,255,.07);

    border:
        1px solid rgba(255,255,255,.09);

    border-radius: 12px;

    color:
        rgba(255,255,255,.82);

    font-size: 12px;
}

.transaction-status-dot {

    width: 8px;
    height: 8px;

    border-radius: 50%;

    background:
        #42d77d;

    box-shadow:
        0 0 0 5px rgba(66,215,125,.10);
}


/* ============================================================
   DEMO TRADING INFO
   ============================================================ */

.demo-info {

    max-width: 1050px;

    margin: 0 auto 38px;

    position: relative;

    display: flex;

    align-items: flex-start;

    gap: 15px;

    padding: 21px 24px;

    background:
        linear-gradient(
            135deg,
            #fff8ef,
            #fffdf9
        );

    border:
        1px solid #f0d6b7;

    border-radius: 16px;

    box-shadow:
        0 7px 22px rgba(11,31,58,.045);

    animation:
        transactionFadeUp .7s ease;
}

.demo-info::before {

    content: "";

    position: absolute;

    left: 0;
    top: 0;
    bottom: 0;

    width: 5px;

    background:
        var(--orange);

    border-radius:
        5px 0 0 5px;
}


/* icon */

.demo-icon {

    width: 43px;
    height: 43px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 12px;

    background:
        var(--orange);

    color: white;

    font-size: 19px;

    font-weight: 900;

    box-shadow:
        0 7px 18px rgba(242,140,40,.18);
}

.demo-info h3 {

    margin: 0 0 5px;

    color:
        #9a5a0b;

    font-size: 16px;

    font-weight: 800;
}

.demo-info p {

    margin: 0;

    color:
        #6d604d;

    font-size: 13px;

    line-height: 1.8;
}


/* ============================================================
   SECTION TITLE
   ============================================================ */

.transaction-section-title {

    max-width: 1050px;

    margin: 0 auto 22px;
}

.transaction-title-row {

    display: flex;

    align-items: center;

    gap: 13px;
}

.transaction-title-icon {

    width: 43px;
    height: 43px;

    display: flex;

    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 13px;

    background:
        var(--navy);

    color:
        var(--orange);

    font-size: 19px;

    font-weight: 900;

    box-shadow:
        0 8px 20px rgba(11,31,58,.15);
}

.transaction-section-title h2 {

    margin: 0;

    color:
        var(--navy);

    font-size: 25px;

    font-weight: 800;
}

.transaction-section-title p {

    margin: 5px 0 0 56px;

    color:
        #7b8491;

    font-size: 13px;
}


/* ============================================================
   TIMELINE
   ============================================================ */

.transaction-timeline {

    max-width: 1050px;

    margin: 0 auto;

    position: relative;
}


/* garis timeline */

.transaction-timeline::before {

    content: "";

    position: absolute;

    left: 31px;

    top: 32px;

    bottom: 32px;

    width: 3px;

    background:
        linear-gradient(
            to bottom,
            var(--orange),
            #dbe1e8
        );

    border-radius: 10px;
}


/* ============================================================
   STEP
   ============================================================ */

.transaction-step {

    display: flex;

    align-items: flex-start;

    gap: 22px;

    margin-bottom: 22px;

    position: relative;

    animation:
        transactionStep .65s ease both;
}

.transaction-step:nth-child(1) {

    animation-delay:
        .05s;
}

.transaction-step:nth-child(2) {

    animation-delay:
        .13s;
}

.transaction-step:nth-child(3) {

    animation-delay:
        .21s;
}


/* ============================================================
   NOMOR STEP
   ============================================================ */

.transaction-step-number {

    width: 63px;
    height: 63px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    position: relative;

    z-index: 3;

    border-radius: 18px;

    background:
        white;

    border:
        3px solid var(--orange);

    color:
        var(--navy);

    font-size: 15px;

    font-weight: 900;

    box-shadow:
        0 8px 22px rgba(242,140,40,.18);

    transition:
        .3s ease;
}

.transaction-step:hover
.transaction-step-number {

    background:
        var(--orange);

    color:
        white;

    transform:
        rotate(-5deg)
        scale(1.06);
}


/* ============================================================
   CARD
   ============================================================ */

.transaction-card {

    flex: 1;

    position: relative;

    padding: 27px 30px;

    background:
        white;

    border:
        1px solid #e4e8ee;

    border-radius: 18px;

    box-shadow:
        0 7px 22px rgba(11,31,58,.055);

    transition:
        transform .3s ease,
        box-shadow .3s ease,
        border-color .3s ease;
}


/* garis kiri */

.transaction-card::before {

    content: "";

    position: absolute;

    left: 0;

    top: 20px;
    bottom: 20px;

    width: 4px;

    background:
        var(--orange);

    border-radius:
        0 5px 5px 0;

    opacity: 0;

    transition:
        .3s ease;
}

.transaction-card:hover {

    transform:
        translateX(6px);

    border-color:
        rgba(242,140,40,.45);

    box-shadow:
        0 15px 35px rgba(11,31,58,.09);
}

.transaction-card:hover::before {

    opacity: 1;
}


/* judul */

.transaction-card h3 {

    margin: 0 0 10px;

    color:
        var(--navy);

    font-size: 19px;

    font-weight: 800;
}

.transaction-card p {

    margin: 0;

    color:
        #667180;

    font-size: 14px;

    line-height: 1.8;
}

.transaction-card strong {

    color:
        var(--navy);
}


/* ============================================================
   CHECKLIST
   ============================================================ */

.check-list {

    display: flex;

    flex-wrap: wrap;

    gap: 10px;

    margin-top: 18px;
}

.check-item {

    display: flex;

    align-items: center;

    gap: 7px;

    padding: 9px 13px;

    background:
        #f8fafc;

    border:
        1px solid #e7ebf0;

    border-radius: 10px;

    color:
        #53606d;

    font-size: 12px;

    transition:
        .25s ease;
}

.check-item::before {

    content:
        "✓";

    width: 20px;
    height: 20px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 6px;

    background:
        var(--orange-soft);

    color:
        var(--orange-dark);

    font-size: 11px;

    font-weight: 900;
}

.check-item:hover {

    background:
        var(--orange-soft);

    border-color:
        rgba(242,140,40,.25);

    transform:
        translateY(-2px);
}


/* ============================================================
   PLATFORM TRADING
   ============================================================ */

.trading-platform {

    margin-top: 18px;

    padding: 18px;

    background:
        #f8fafc;

    border:
        1px solid #e7ebf0;

    border-radius: 12px;

    position: relative;
}

.trading-platform::before {

    content: "";

    position: absolute;

    left: 0;
    top: 0;
    bottom: 0;

    width: 4px;

    background:
        var(--orange);

    border-radius:
        4px 0 0 4px;
}

.trading-platform small {

    display: block;

    margin-bottom: 6px;

    color:
        #7b8491;

    font-size: 12px;
}

.trading-platform a {

    color:
        var(--orange-dark);

    font-size: 14px;

    font-weight: 800;

    text-decoration: none;

    transition:
        .3s ease;
}

.trading-platform a:hover {

    color:
        var(--orange);

    text-decoration:
        underline;
}


/* ============================================================
   KEAMANAN AKUN
   ============================================================ */

.transaction-security {

    max-width: 1050px;

    margin: 38px auto 0;

    position: relative;

    padding: 24px 27px 24px 30px;

    background:
        linear-gradient(
            135deg,
            #fff9f1,
            #fffdf9
        );

    border:
        1px solid #f3d5b2;

    border-radius: 17px;

    overflow: hidden;

    box-shadow:
        0 7px 22px rgba(11,31,58,.04);
}

.transaction-security::before {

    content: "";

    position: absolute;

    left: 0;
    top: 0;
    bottom: 0;

    width: 5px;

    background:
        var(--orange);
}

.transaction-security-title {

    display: flex;

    align-items: center;

    gap: 10px;

    margin-bottom: 10px;

    color:
        #9a5a0b;

    font-size: 17px;

    font-weight: 800;
}

.transaction-security-icon {

    width: 31px;
    height: 31px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 9px;

    background:
        var(--orange);

    color:
        white;

    font-size: 15px;

    font-weight: 900;
}

.transaction-security p {

    margin: 0;

    color:
        #6d604d;

    font-size: 13px;

    line-height: 1.8;
}

.transaction-security strong {

    color:
        #57462f;
}


/* ============================================================
   LEGALITAS
   ============================================================ */

.transaction-legal-section {

    max-width: 1050px;

    margin: 52px auto 0;
}

.transaction-legal-grid {

    display: grid;

    grid-template-columns:
        repeat(4, 1fr);

    gap: 16px;
}


/* card */

.transaction-legal-card {

    position: relative;

    padding: 23px;

    background:
        white;

    border:
        1px solid #e4e8ee;

    border-radius: 17px;

    text-decoration: none;

    overflow: hidden;

    box-shadow:
        0 7px 22px rgba(11,31,58,.045);

    transition:
        .3s ease;
}


/* garis atas */

.transaction-legal-card::before {

    content: "";

    position: absolute;

    left: 0;
    top: 0;

    width: 100%;
    height: 4px;

    background:
        var(--orange);

    transform:
        scaleX(0);

    transform-origin:
        center;

    transition:
        transform .3s ease;
}

.transaction-legal-card:hover::before {

    transform:
        scaleX(1);
}

.transaction-legal-card:hover {

    transform:
        translateY(-5px);

    border-color:
        rgba(242,140,40,.4);

    box-shadow:
        0 15px 32px rgba(11,31,58,.09);
}


/* icon */

.transaction-legal-icon {

    width: 42px;
    height: 42px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin-bottom: 14px;

    border-radius: 12px;

    background:
        var(--navy);

    color:
        var(--orange);

    font-size: 17px;

    font-weight: 900;

    transition:
        .3s ease;
}

.transaction-legal-card:hover
.transaction-legal-icon {

    background:
        var(--orange);

    color:
        white;

    transform:
        scale(1.05);
}


/* arrow */

.transaction-legal-card::after {

    content:
        "↗";

    position: absolute;

    top: 19px;
    right: 19px;

    width: 30px;
    height: 30px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 9px;

    background:
        var(--orange-soft);

    color:
        var(--orange-dark);

    font-size: 15px;

    font-weight: 900;

    transition:
        .3s ease;
}

.transaction-legal-card:hover::after {

    background:
        var(--orange);

    color:
        white;

    transform:
        translate(2px,-2px);
}

.transaction-legal-card h3 {

    margin: 0 0 6px;

    color:
        var(--navy);

    font-size: 16px;

    line-height: 1.4;

    font-weight: 800;
}

.transaction-legal-card span {

    color:
        var(--orange-dark);

    font-size: 12px;

    font-weight: 700;
}


/* ============================================================
   HELP
   ============================================================ */

.transaction-help-section {

    max-width: 1050px;

    margin: 25px auto 0;

    display: grid;

    grid-template-columns:
        repeat(2, 1fr);

    gap: 16px;
}

.transaction-help-card {

    position: relative;

    padding: 21px 23px;

    background:
        white;

    border:
        1px solid #e4e8ee;

    border-radius: 16px;

    text-decoration: none;

    overflow: hidden;

    box-shadow:
        0 7px 22px rgba(11,31,58,.04);

    transition:
        .3s ease;
}

.transaction-help-card::before {

    content: "";

    position: absolute;

    left: 0;
    top: 0;
    bottom: 0;

    width: 4px;

    background:
        var(--orange);

    transform:
        scaleY(0);

    transform-origin:
        bottom;

    transition:
        .3s ease;
}

.transaction-help-card:hover {

    transform:
        translateY(-4px);

    border-color:
        rgba(242,140,40,.35);

    box-shadow:
        0 13px 28px rgba(11,31,58,.08);
}

.transaction-help-card:hover::before {

    transform:
        scaleY(1);
}

.transaction-help-card h3 {

    margin: 0 0 7px;

    color:
        var(--navy);

    font-size: 16px;

    font-weight: 800;
}

.transaction-help-card span {

    color:
        var(--orange-dark);

    font-size: 13px;

    font-weight: 600;
}


/* ============================================================
   ANIMASI
   ============================================================ */

@keyframes transactionHero {

    from {

        opacity: 0;

        transform:
            translateY(-20px);
    }

    to {

        opacity: 1;

        transform:
            translateY(0);
    }
}


@keyframes transactionStep {

    from {

        opacity: 0;

        transform:
            translateY(25px);
    }

    to {

        opacity: 1;

        transform:
            translateY(0);
    }
}


@keyframes transactionFadeUp {

    from {

        opacity: 0;

        transform:
            translateY(20px);
    }

    to {

        opacity: 1;

        transform:
            translateY(0);
    }
}


/* ============================================================
   RESPONSIVE
   ============================================================ */

@media (max-width: 1000px) {

    .transaction-legal-grid {

        grid-template-columns:
            repeat(2, 1fr);
    }
}


@media (max-width: 900px) {

    .transaction-page {

        padding:
            30px 20px 55px;
    }

    .transaction-header {

        padding:
            35px 30px;
    }

    .transaction-header h1 {

        font-size:
            32px;
    }

    .transaction-help-section {

        grid-template-columns:
            1fr;
    }
}


@media (max-width: 600px) {

    .transaction-page {

        padding:
            22px 15px 45px;
    }

    .transaction-header {

        padding:
            30px 22px;

        border-radius:
            19px;
    }

    .transaction-header h1 {

        font-size:
            27px;
    }

    .transaction-header p {

        font-size:
            13px;
    }

    .transaction-status {

        align-items:
            flex-start;

        line-height:
            1.5;
    }

    .demo-info {

        padding:
            18px;
    }

    .transaction-section-title h2 {

        font-size:
            21px;
    }

    .transaction-section-title p {

        margin-left:
            0;
    }

    .transaction-title-icon {

        width:
            39px;

        height:
            39px;
    }

    .transaction-timeline::before {

        left:
            24px;
    }

    .transaction-step {

        gap:
            14px;
    }

    .transaction-step-number {

        width:
            49px;

        height:
            49px;

        border-radius:
            14px;

        font-size:
            12px;
    }

    .transaction-card {

        padding:
            20px;

        border-radius:
            15px;
    }

    .transaction-card h3 {

        font-size:
            16px;
    }

    .transaction-card p {

        font-size:
            13px;
    }

    .transaction-legal-grid {

        grid-template-columns:
            1fr;
    }

    .check-list {

        gap:
            7px;
    }

    .check-item {

        font-size:
            11px;

        padding:
            8px 10px;
    }

    .transaction-security {

        padding:
            20px;
    }

}


/* ============================================================
   REDUCED MOTION
   ============================================================ */

@media (prefers-reduced-motion: reduce) {

    .transaction-header,
    .transaction-step,
    .demo-info {

        animation:
            none;
    }

    .transaction-card,
    .transaction-step-number,
    .transaction-legal-card,
    .transaction-help-card,
    .transaction-legal-icon {

        transition:
            none;
    }
}

</style>


<div class="transaction-page">


    {{-- =========================================================
         KEMBALI
    ========================================================== --}}

    <div class="transaction-back">

        <a href="{{ url()->previous() }}">

            <span class="transaction-back-arrow">
                ←
            </span>

            Kembali

        </a>

    </div>



    {{-- =========================================================
         HERO
    ========================================================== --}}

    <div class="transaction-header">

        <div class="transaction-header-line"></div>

        <div class="transaction-header-content">

            <div class="transaction-header-label">
                Panduan Transaksi
            </div>

            <h1>
                Petunjuk
                <span>Transaksi</span>
            </h1>

            <p>
                Nasabah dapat menyampaikan amanat transaksi secara online
                melalui platform trading yang disediakan. Untuk kenyamanan
                dan meminimalkan risiko kesalahan, disarankan Nasabah
                melakukan simulasi <strong>demo trading</strong> terlebih
                dahulu sebelum menggunakan akun riil.
            </p>

            <div class="transaction-status">

                <span class="transaction-status-dot"></span>

                Pastikan memahami prosedur sebelum melakukan transaksi.

            </div>

        </div>

    </div>



    {{-- =========================================================
         DEMO TRADING
    ========================================================== --}}

    <div class="demo-info">

        <div class="demo-icon">
            ✓
        </div>

        <div>

            <h3>
                Disarankan Melakukan Demo Trading
            </h3>

            <p>
                Sebelum melakukan transaksi menggunakan akun riil,
                pastikan Anda telah memahami cara kerja platform
                trading melalui simulasi terlebih dahulu.
            </p>

        </div>

    </div>



    {{-- =========================================================
         JUDUL TAHAPAN
    ========================================================== --}}

    <div class="transaction-section-title">

        <div class="transaction-title-row">

            <div class="transaction-title-icon">
                ✓
            </div>

            <h2>
                Tahapan Transaksi Online
            </h2>

        </div>

        <p>
            Ikuti langkah berikut untuk mengakses platform trading.
        </p>

    </div>



    {{-- =========================================================
         TIMELINE
    ========================================================== --}}

    <div class="transaction-timeline">


        {{-- =====================================================
             STEP 01
        ====================================================== --}}

        <div class="transaction-step">

            <div class="transaction-step-number">
                01
            </div>

            <div class="transaction-card">

                <h3>
                    Mendapatkan Akses Trading
                </h3>

                <p>
                    Nasabah yang melakukan transaksi secara online
                    akan memperoleh <strong>User ID</strong> dan
                    <strong>Password</strong> resmi dari
                    PT. Rifan Financindo Berjangka.
                </p>

                <p style="margin-top: 10px;">
                    Kredensial tersebut bersifat rahasia dan digunakan
                    untuk melakukan login ke platform trading.
                </p>

                <div class="check-list">

                    <div class="check-item">
                        User ID resmi
                    </div>

                    <div class="check-item">
                        Password resmi
                    </div>

                    <div class="check-item">
                        Jaga kerahasiaan akun
                    </div>

                </div>

            </div>

        </div>



        {{-- =====================================================
             STEP 02
        ====================================================== --}}

        <div class="transaction-step">

            <div class="transaction-step-number">
                02
            </div>

            <div class="transaction-card">

                <h3>
                    Persiapan Sebelum Transaksi
                </h3>

                <p>
                    Pastikan seluruh kebutuhan berikut telah tersedia
                    sebelum mengakses platform online trading.
                </p>

                <div class="check-list">

                    <div class="check-item">
                        Koneksi internet stabil
                    </div>

                    <div class="check-item">
                        Laptop / PC / Smartphone
                    </div>

                    <div class="check-item">
                        User ID dan Password
                    </div>

                </div>


                <div class="trading-platform">

                    <small>
                        Platform Online Trading
                    </small>

                    <a
                        href="http://etrade.rifanberjangka.com/login.php"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        Buka Platform Trading →
                    </a>

                </div>

            </div>

        </div>



        {{-- =====================================================
             STEP 03
        ====================================================== --}}

        <div class="transaction-step">

            <div class="transaction-step-number">
                03
            </div>

            <div class="transaction-card">

                <h3>
                    Login ke Platform
                </h3>

                <p>
                    Masukkan <strong>User ID</strong> dan
                    <strong>Password</strong> yang telah diberikan
                    oleh PT. Rifan Financindo Berjangka.
                </p>

                <div class="check-list">

                    <div class="check-item">
                        Masukkan User ID
                    </div>

                    <div class="check-item">
                        Masukkan Password
                    </div>

                    <div class="check-item">
                        Periksa data
                    </div>

                </div>

                <p style="margin-top: 15px;">
                    Pastikan data yang dimasukkan sudah benar
                    sebelum menekan tombol login.
                </p>

            </div>

        </div>


    </div>



    {{-- =========================================================
         KEAMANAN AKUN
    ========================================================== --}}

    <div class="transaction-security">

        <div class="transaction-security-title">

            <span class="transaction-security-icon">
                !
            </span>

            Jaga Kerahasiaan Akun

        </div>

        <p>
            User ID dan Password merupakan informasi pribadi.
            Jangan membagikan kredensial akun kepada pihak lain
            dan pastikan Anda selalu menggunakan platform trading
            resmi yang diberikan oleh
            <strong>PT. Rifan Financindo Berjangka</strong>.
        </p>

    </div>



    {{-- =========================================================
         LEGALITAS
    ========================================================== --}}

    <div class="transaction-legal-section">

        <div class="transaction-section-title">

            <div class="transaction-title-row">

                <div class="transaction-title-icon">
                    ✓
                </div>

                <h2>
                    Link Legalitas
                </h2>

            </div>

            <p>
                Informasi resmi mengenai perusahaan dan lembaga terkait.
            </p>

        </div>


        <div class="transaction-legal-grid">


            {{-- BAPPEBTI --}}

            <a
                href="https://bappebti.go.id/pialang_berjangka/detail/012"
                target="_blank"
                rel="noopener noreferrer"
                class="transaction-legal-card"
            >

                <div class="transaction-legal-icon">
                    B
                </div>

                <h3>
                    BAPPEBTI
                </h3>

                <span>
                    Lihat informasi
                </span>

            </a>



            {{-- JFX --}}

            <a
                href="https://jfx.co.id/MarketMaker/market_maker"
                target="_blank"
                rel="noopener noreferrer"
                class="transaction-legal-card"
            >

                <div class="transaction-legal-icon">
                    J
                </div>

                <h3>
                    JFX
                </h3>

                <span>
                    Lihat informasi
                </span>

            </a>



            {{-- KBI --}}

            <a
                href="https://www.ptkbi.com/our-partner/perdagangan-berjangka-komoditi"
                target="_blank"
                rel="noopener noreferrer"
                class="transaction-legal-card"
            >

                <div class="transaction-legal-icon">
                    K
                </div>

                <h3>
                    KBI
                </h3>

                <span>
                    Lihat informasi
                </span>

            </a>



            {{-- ASPEBTINDO --}}

            <a
                href="https://www.rf-berjangkasemarang.com/service-details.html"
                target="_blank"
                rel="noopener noreferrer"
                class="transaction-legal-card"
            >

                <div class="transaction-legal-icon">
                    A
                </div>

                <h3>
                    Aspebtindo
                </h3>

                <span>
                    Lihat informasi
                </span>

            </a>


        </div>

    </div>

@endsection