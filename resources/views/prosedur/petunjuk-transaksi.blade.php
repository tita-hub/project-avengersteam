@extends('layouts.app')

@section('content')

<style>

/* ============================================================
   HALAMAN PETUNJUK TRANSAKSI
   TEMA : CORPORATE MAROON + GREEN
   ============================================================ */

.transaction-page {

    --red: #8b2532;
    --red-dark: #6f1d29;
    --red-soft: #f8eef0;
    --red-border: #ead4d8;

    --green: #2f6b57;
    --green-dark: #255443;
    --green-soft: #edf5f1;

    --text: #27313b;
    --text-soft: #68727d;
    --muted: #8a929c;

    --border: #e4e7eb;
    --surface: #ffffff;
    --surface-soft: #f7f8fa;

    padding: 35px 45px 70px;

    background:
        linear-gradient(
            180deg,
            #fbfbfc 0%,
            #f6f7f9 100%
        );

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

    color: var(--text);

    text-decoration: none;

    font-size: 14px;

    font-weight: 700;

    transition:
        color .25s ease,
        transform .25s ease;
}

.transaction-back a:hover {

    color: var(--red);

    transform: translateX(-4px);
}

.transaction-back-arrow {

    width: 32px;
    height: 32px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 9px;

    background: var(--surface);

    border: 1px solid var(--border);

    color: var(--red);

    font-size: 17px;

    box-shadow:
        0 5px 15px rgba(39,49,59,.05);

    transition:
        .25s ease;
}

.transaction-back a:hover
.transaction-back-arrow {

    background: var(--red);

    color: white;

    border-color: var(--red);

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

    border-radius: 22px;

    background: var(--surface);

    color: var(--text);

    border:
        1px solid var(--border);

    box-shadow:
        0 14px 38px rgba(39,49,59,.07);

    animation:
        transactionHero .7s ease;
}


/* garis identitas */

.transaction-header-line {

    position: absolute;

    left: 0;
    top: 0;

    width: 100%;
    height: 4px;

    background:
        linear-gradient(
            90deg,
            var(--red) 0%,
            var(--red) 72%,
            var(--green) 72%,
            var(--green) 100%
        );
}


/* dekorasi halus */

.transaction-header::before {

    content: "";

    position: absolute;

    width: 230px;
    height: 230px;

    right: -120px;
    top: -125px;

    border-radius: 50%;

    border:
        45px solid rgba(139,37,50,.035);

    pointer-events: none;
}

.transaction-header::after {

    content: "";

    position: absolute;

    width: 110px;
    height: 110px;

    right: 65px;
    bottom: -80px;

    border-radius: 50%;

    border:
        22px solid rgba(47,107,87,.045);

    pointer-events: none;
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

    border-radius: 8px;

    background:
        var(--red-soft);

    border:
        1px solid var(--red-border);

    color:
        var(--red);

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
        var(--red);
}


/* judul */

.transaction-header h1 {

    margin: 0 0 12px;

    color:
        var(--text);

    font-size: 38px;

    line-height: 1.2;

    font-weight: 800;

    letter-spacing: -.7px;
}

.transaction-header h1 span {

    color:
        var(--red);
}


/* deskripsi */

.transaction-header p {

    margin: 0;

    max-width: 820px;

    color:
        var(--text-soft);

    font-size: 15px;

    line-height: 1.8;
}

.transaction-header strong {

    color:
        var(--red-dark);
}


/* status */

.transaction-status {

    display: inline-flex;

    align-items: center;

    gap: 10px;

    margin-top: 23px;

    padding: 10px 15px;

    background:
        var(--green-soft);

    border:
        1px solid #d7e7df;

    border-radius: 10px;

    color:
        var(--green-dark);

    font-size: 12px;

    font-weight: 600;
}

.transaction-status-dot {

    width: 8px;
    height: 8px;

    flex-shrink: 0;

    border-radius: 50%;

    background:
        var(--green);

    box-shadow:
        0 0 0 4px rgba(47,107,87,.10);
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
        var(--green-soft);

    border:
        1px solid #d8e7df;

    border-radius: 15px;

    box-shadow:
        0 7px 22px rgba(39,49,59,.035);

    animation:
        transactionFadeUp .7s ease;
}

.demo-info::before {

    content: "";

    position: absolute;

    left: 0;
    top: 0;
    bottom: 0;

    width: 4px;

    background:
        var(--green);

    border-radius:
        4px 0 0 4px;
}


/* icon */

.demo-icon {

    width: 43px;
    height: 43px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 11px;

    background:
        var(--green);

    color: white;

    font-size: 18px;

    font-weight: 900;

    box-shadow:
        0 6px 17px rgba(47,107,87,.15);
}

.demo-info h3 {

    margin: 0 0 5px;

    color:
        var(--green-dark);

    font-size: 16px;

    font-weight: 800;
}

.demo-info p {

    margin: 0;

    color:
        #617269;

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

    border-radius: 11px;

    background:
        var(--red-soft);

    color:
        var(--red);

    border:
        1px solid var(--red-border);

    font-size: 18px;

    font-weight: 900;
}

.transaction-section-title h2 {

    margin: 0;

    color:
        var(--text);

    font-size: 25px;

    font-weight: 800;

    letter-spacing: -.25px;
}

.transaction-section-title p {

    margin: 5px 0 0 56px;

    color:
        var(--text-soft);

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

    left: 30px;

    top: 31px;

    bottom: 31px;

    width: 2px;

    background:
        #dfe3e7;

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

    border-radius: 16px;

    background:
        var(--surface);

    border:
        2px solid var(--red-border);

    color:
        var(--red);

    font-size: 14px;

    font-weight: 900;

    box-shadow:
        0 7px 18px rgba(39,49,59,.07);

    transition:
        .3s ease;
}

.transaction-step:hover
.transaction-step-number {

    background:
        var(--red);

    border-color:
        var(--red);

    color:
        white;

    transform:
        translateY(-2px);
}


/* ============================================================
   CARD
   ============================================================ */

.transaction-card {

    flex: 1;

    position: relative;

    padding: 27px 30px;

    background:
        var(--surface);

    border:
        1px solid var(--border);

    border-radius: 16px;

    box-shadow:
        0 7px 22px rgba(39,49,59,.045);

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

    top: 18px;
    bottom: 18px;

    width: 3px;

    background:
        var(--red);

    border-radius:
        0 4px 4px 0;

    opacity: 0;

    transition:
        .3s ease;
}

.transaction-card:hover {

    transform:
        translateX(4px);

    border-color:
        var(--red-border);

    box-shadow:
        0 13px 30px rgba(39,49,59,.075);
}

.transaction-card:hover::before {

    opacity: 1;
}


/* judul */

.transaction-card h3 {

    margin: 0 0 10px;

    color:
        var(--text);

    font-size: 19px;

    font-weight: 800;
}

.transaction-card p {

    margin: 0;

    color:
        var(--text-soft);

    font-size: 14px;

    line-height: 1.8;
}

.transaction-card strong {

    color:
        var(--red-dark);
}


/* ============================================================
   CHECKLIST
   ============================================================ */

.check-list {

    display: flex;

    flex-wrap: wrap;

    gap: 9px;

    margin-top: 18px;
}

.check-item {

    display: flex;

    align-items: center;

    gap: 7px;

    padding: 8px 12px;

    background:
        #fafbfc;

    border:
        1px solid #e5e8ec;

    border-radius: 9px;

    color:
        #59636e;

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

    flex-shrink: 0;

    border-radius: 6px;

    background:
        var(--green-soft);

    color:
        var(--green);

    font-size: 11px;

    font-weight: 900;
}

.check-item:hover {

    background:
        var(--green-soft);

    border-color:
        #d2e3da;

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
        #fafbfc;

    border:
        1px solid #e5e8ec;

    border-radius: 11px;

    position: relative;
}

.trading-platform::before {

    content: "";

    position: absolute;

    left: 0;
    top: 0;
    bottom: 0;

    width: 3px;

    background:
        var(--red);

    border-radius:
        3px 0 0 3px;
}

.trading-platform small {

    display: block;

    margin-bottom: 6px;

    color:
        var(--muted);

    font-size: 12px;
}

.trading-platform a {

    color:
        var(--red);

    font-size: 14px;

    font-weight: 800;

    text-decoration: none;

    transition:
        .25s ease;
}

.trading-platform a:hover {

    color:
        var(--red-dark);

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
        #fffafa;

    border:
        1px solid var(--red-border);

    border-radius: 15px;

    overflow: hidden;

    box-shadow:
        0 7px 22px rgba(39,49,59,.035);
}

.transaction-security::before {

    content: "";

    position: absolute;

    left: 0;
    top: 0;
    bottom: 0;

    width: 4px;

    background:
        var(--red);
}

.transaction-security-title {

    display: flex;

    align-items: center;

    gap: 10px;

    margin-bottom: 10px;

    color:
        var(--red-dark);

    font-size: 17px;

    font-weight: 800;
}

.transaction-security-icon {

    width: 31px;
    height: 31px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 8px;

    background:
        var(--red-soft);

    border:
        1px solid var(--red-border);

    color:
        var(--red);

    font-size: 14px;

    font-weight: 900;
}

.transaction-security p {

    margin: 0;

    color:
        #69727c;

    font-size: 13px;

    line-height: 1.8;
}

.transaction-security strong {

    color:
        var(--red-dark);
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
        var(--surface);

    border:
        1px solid var(--border);

    border-radius: 15px;

    text-decoration: none;

    overflow: hidden;

    box-shadow:
        0 7px 22px rgba(39,49,59,.04);

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
    height: 3px;

    background:
        var(--red);

    transform:
        scaleX(0);

    transform-origin:
        left;

    transition:
        transform .3s ease;
}

.transaction-legal-card:hover::before {

    transform:
        scaleX(1);
}

.transaction-legal-card:hover {

    transform:
        translateY(-4px);

    border-color:
        var(--red-border);

    box-shadow:
        0 13px 30px rgba(39,49,59,.075);
}


/* icon */

.transaction-legal-icon {

    width: 42px;
    height: 42px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin-bottom: 14px;

    border-radius: 10px;

    background:
        var(--red-soft);

    border:
        1px solid var(--red-border);

    color:
        var(--red);

    font-size: 16px;

    font-weight: 900;

    transition:
        .3s ease;
}

.transaction-legal-card:hover
.transaction-legal-icon {

    background:
        var(--red);

    border-color:
        var(--red);

    color:
        white;

    transform:
        scale(1.04);
}


/* arrow */

.transaction-legal-card::after {

    content:
        "↗";

    position: absolute;

    top: 19px;
    right: 19px;

    width: 29px;
    height: 29px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 8px;

    background:
        #f7f8fa;

    border:
        1px solid var(--border);

    color:
        var(--red);

    font-size: 14px;

    font-weight: 900;

    transition:
        .3s ease;
}

.transaction-legal-card:hover::after {

    background:
        var(--red);

    border-color:
        var(--red);

    color:
        white;

    transform:
        translate(2px,-2px);
}

.transaction-legal-card h3 {

    margin: 0 0 6px;

    color:
        var(--text);

    font-size: 16px;

    line-height: 1.4;

    font-weight: 800;
}

.transaction-legal-card span {

    color:
        var(--red);

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
        var(--surface);

    border:
        1px solid var(--border);

    border-radius: 15px;

    text-decoration: none;

    overflow: hidden;

    box-shadow:
        0 7px 22px rgba(39,49,59,.035);

    transition:
        .3s ease;
}

.transaction-help-card::before {

    content: "";

    position: absolute;

    left: 0;
    top: 0;
    bottom: 0;

    width: 3px;

    background:
        var(--red);

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
        var(--red-border);

    box-shadow:
        0 13px 28px rgba(39,49,59,.07);
}

.transaction-help-card:hover::before {

    transform:
        scaleY(1);
}

.transaction-help-card h3 {

    margin: 0 0 7px;

    color:
        var(--text);

    font-size: 16px;

    font-weight: 800;
}

.transaction-help-card span {

    color:
        var(--red);

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
            translateY(-14px);
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
            translateY(18px);
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
            translateY(16px);
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
            18px;
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
            13px;

        font-size:
            12px;
    }

    .transaction-card {

        padding:
            20px;

        border-radius:
            14px;
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