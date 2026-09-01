@extends('layouts.app')

@section('content')

<style>

/* ============================================================
   HALAMAN PROSEDUR REGULER
   TEMA : NAVY + ORANGE
   ============================================================ */

.regular-page {
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

.regular-back {
    max-width: 1050px;
    margin: 0 auto 18px;
}

.regular-back a {
    display: inline-flex;
    align-items: center;
    gap: 9px;

    color: var(--navy);
    text-decoration: none;

    font-size: 14px;
    font-weight: 700;

    transition: .3s ease;
}

.regular-back a:hover {
    color: var(--orange);
    transform: translateX(-5px);
}

.regular-back .arrow {
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

.regular-back a:hover .arrow {
    background: var(--orange);
    color: white;
    border-color: var(--orange);
}


/* ============================================================
   HERO HEADER
   ============================================================ */

.regular-hero {
    max-width: 1050px;

    margin: 0 auto 42px;

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

    animation: heroMasuk .7s ease;
}


/* dekorasi */

.regular-hero::before {
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

.regular-hero::after {
    content: "";

    position: absolute;

    width: 150px;
    height: 150px;

    right: 90px;
    bottom: -100px;

    border-radius: 50%;

    background:
        rgba(255,255,255,.04);
}


/* garis orange */

.hero-line {
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


/* isi hero */

.hero-content {
    position: relative;

    z-index: 2;

    max-width: 780px;
}


/* label */

.hero-label {
    display: inline-flex;

    align-items: center;

    gap: 8px;

    padding: 7px 13px;

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

    margin-bottom: 17px;
}

.hero-label::before {
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

.regular-hero h1 {
    margin: 0 0 12px;

    color: white;

    font-size: 38px;

    line-height: 1.2;

    font-weight: 800;
}

.regular-hero h1 span {
    color: var(--orange);
}


/* deskripsi */

.regular-hero p {
    margin: 0;

    max-width: 720px;

    color: rgba(255,255,255,.75);

    font-size: 15px;

    line-height: 1.8;
}


/* status */

.hero-status {
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

    color: rgba(255,255,255,.82);

    font-size: 12px;
}

.status-icon {
    width: 8px;
    height: 8px;

    border-radius: 50%;

    background:
        #42d77d;

    box-shadow:
        0 0 0 5px rgba(66,215,125,.10);
}


/* ============================================================
   SECTION TITLE
   ============================================================ */

.regular-section-title {
    max-width: 1050px;

    margin: 0 auto 22px;
}

.title-row {
    display: flex;

    align-items: center;

    gap: 13px;
}

.title-icon {
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

.regular-section-title h2 {
    margin: 0;

    color:
        var(--navy);

    font-size: 25px;

    font-weight: 800;
}

.regular-section-title p {
    margin: 5px 0 0 56px;

    color:
        #7b8491;

    font-size: 13px;
}


/* ============================================================
   TIMELINE
   ============================================================ */

.regular-timeline {
    max-width: 1050px;

    margin: 0 auto;

    position: relative;
}


/* garis timeline */

.regular-timeline::before {
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

.regular-step {
    display: flex;

    align-items: flex-start;

    gap: 22px;

    margin-bottom: 22px;

    position: relative;

    animation:
        stepMasuk .65s ease both;
}

.regular-step:nth-child(1) {
    animation-delay: .05s;
}

.regular-step:nth-child(2) {
    animation-delay: .13s;
}

.regular-step:nth-child(3) {
    animation-delay: .21s;
}

.regular-step:nth-child(4) {
    animation-delay: .29s;
}

.regular-step:nth-child(5) {
    animation-delay: .37s;
}

.regular-step:nth-child(6) {
    animation-delay: .45s;
}


/* ============================================================
   NOMOR STEP
   ============================================================ */

.regular-step-number {
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

    transition: .3s ease;
}

.regular-step:hover
.regular-step-number {
    background:
        var(--orange);

    color:
        white;

    transform:
        rotate(-5deg)
        scale(1.06);
}


/* ============================================================
   CARD STEP
   ============================================================ */

.regular-step-card {
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

.regular-step-card::before {
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

    transition: .3s ease;
}

.regular-step-card:hover {
    transform:
        translateX(6px);

    border-color:
        rgba(242,140,40,.45);

    box-shadow:
        0 15px 35px rgba(11,31,58,.09);
}

.regular-step-card:hover::before {
    opacity: 1;
}


/* judul */

.regular-step-card h3 {
    margin: 0 0 10px;

    color:
        var(--navy);

    font-size: 19px;

    font-weight: 800;
}

.regular-step-card p {
    margin: 0;

    color:
        #667180;

    font-size: 14px;

    line-height: 1.8;
}

.regular-step-card strong {
    color:
        var(--navy);
}


/* ============================================================
   DOKUMEN
   ============================================================ */

.regular-document-list {
    display: grid;

    grid-template-columns:
        repeat(2, 1fr);

    gap: 10px;

    margin-top: 18px;
}

.regular-document-item {
    display: flex;

    align-items: center;

    gap: 10px;

    padding: 12px 14px;

    background:
        #f8fafc;

    border:
        1px solid #e7ebf0;

    border-radius: 11px;

    color:
        #4d5867;

    font-size: 13px;

    transition: .25s ease;
}

.regular-document-item::before {
    content: "✓";

    width: 22px;
    height: 22px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 7px;

    background:
        var(--orange-soft);

    color:
        var(--orange-dark);

    font-weight: 900;
}

.regular-document-item:hover {
    background:
        var(--orange-soft);

    border-color:
        rgba(242,140,40,.25);

    transform:
        translateY(-2px);
}


/* ============================================================
   BANK SECTION
   ============================================================ */

.regular-bank-section {
    max-width: 1050px;

    margin: 52px auto 0;
}

.regular-bank-grid {
    display: grid;

    grid-template-columns:
        repeat(2, 1fr);

    gap: 17px;
}


/* bank card */

.regular-bank-card {
    position: relative;

    padding: 23px;

    background:
        white;

    border:
        1px solid #e4e8ee;

    border-radius: 17px;

    overflow: hidden;

    box-shadow:
        0 7px 22px rgba(11,31,58,.045);

    transition: .3s ease;
}

.regular-bank-card::before {
    content: "";

    position: absolute;

    top: 0;
    left: 0;

    width: 100%;
    height: 4px;

    background:
        var(--orange);
}

.regular-bank-card:hover {
    transform:
        translateY(-5px);

    border-color:
        rgba(242,140,40,.35);

    box-shadow:
        0 16px 32px rgba(11,31,58,.09);
}


/* icon bank */

.bank-icon {
    width: 43px;
    height: 43px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin-bottom: 13px;

    border-radius: 12px;

    background:
        var(--navy);

    color:
        var(--orange);

    font-size: 18px;

    font-weight: 900;
}

.bank-name {
    color:
        var(--navy);

    font-size: 17px;

    font-weight: 800;

    margin-bottom: 4px;
}

.bank-branch {
    color:
        #8a929d;

    font-size: 12px;

    margin-bottom: 15px;
}


/* rekening */

.account-row {
    display: flex;

    align-items: center;
    justify-content: space-between;

    gap: 15px;

    padding: 9px 0;

    border-top:
        1px solid #edf0f3;
}

.currency {
    color:
        #858e9a;

    font-size: 12px;

    font-weight: 700;
}

.account-number {
    color:
        var(--navy);

    font-size: 13px;

    font-weight: 800;

    text-align: right;
}


/* ============================================================
   LEGALITAS
   ============================================================ */

.regular-legal-section {
    max-width: 1050px;

    margin: 52px auto 0;
}

.regular-legal-grid {
    display: grid;

    grid-template-columns:
        repeat(4, 1fr);

    gap: 16px;
}

.regular-legal-card {
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

    transition: .3s ease;
}


/* garis atas */

.regular-legal-card::before {
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

.regular-legal-card:hover::before {
    transform:
        scaleX(1);
}


/* arrow */

.regular-legal-card::after {
    content: "↗";

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

    transition: .3s ease;
}

.regular-legal-card:hover {
    transform:
        translateY(-5px);

    border-color:
        rgba(242,140,40,.4);

    box-shadow:
        0 15px 32px rgba(11,31,58,.09);
}

.regular-legal-card:hover::after {
    background:
        var(--orange);

    color:
        white;

    transform:
        translate(2px,-2px);
}


/* icon legal */

.legal-icon {
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

    font-size: 16px;

    font-weight: 900;

    transition: .3s ease;
}

.regular-legal-card:hover
.legal-icon {
    background:
        var(--orange);

    color:
        white;

    transform:
        scale(1.05);
}


.regular-legal-card h3 {
    margin: 0 0 6px;

    color:
        var(--navy);

    font-size: 17px;

    font-weight: 800;
}

.regular-legal-card span {
    color:
        var(--orange-dark);

    font-size: 12px;

    font-weight: 700;
}


/* ============================================================
   WARNING
   ============================================================ */

.regular-warning {
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

.regular-warning::before {
    content: "";

    position: absolute;

    left: 0;
    top: 0;
    bottom: 0;

    width: 5px;

    background:
        var(--orange);
}

.warning-title {
    display: flex;

    align-items: center;

    gap: 10px;

    margin-bottom: 10px;

    color:
        #9a5a0b;

    font-size: 17px;

    font-weight: 800;
}

.warning-icon {
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

.regular-warning p {
    margin: 0 0 10px;

    color:
        #6d604d;

    font-size: 13px;

    line-height: 1.8;
}

.regular-warning p:last-child {
    margin-bottom: 0;
}

.regular-warning strong {
    color:
        #57462f;
}


/* ============================================================
   ANIMASI
   ============================================================ */

@keyframes heroMasuk {

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

@keyframes stepMasuk {

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


/* ============================================================
   RESPONSIVE
   ============================================================ */

@media (max-width: 1000px) {

    .regular-legal-grid {
        grid-template-columns:
            repeat(2, 1fr);
    }

}


@media (max-width: 900px) {

    .regular-page {
        padding:
            30px 20px 55px;
    }

    .regular-hero {
        padding:
            35px 30px;
    }

    .regular-hero h1 {
        font-size:
            32px;
    }

    .regular-document-list {
        grid-template-columns:
            1fr;
    }

    .regular-bank-grid {
        grid-template-columns:
            1fr;
    }

}


@media (max-width: 600px) {

    .regular-page {
        padding:
            22px 15px 45px;
    }

    .regular-hero {
        padding:
            30px 22px;

        border-radius:
            19px;
    }

    .regular-hero h1 {
        font-size:
            27px;
    }

    .regular-hero p {
        font-size:
            13px;
    }

    .hero-status {
        align-items:
            flex-start;

        line-height:
            1.5;
    }

    .regular-section-title h2 {
        font-size:
            21px;
    }

    .regular-section-title p {
        margin-left:
            0;
    }

    .title-icon {
        width:
            39px;

        height:
            39px;
    }

    .regular-timeline::before {
        left:
            24px;
    }

    .regular-step {
        gap:
            14px;
    }

    .regular-step-number {
        width:
            49px;

        height:
            49px;

        border-radius:
            14px;

        font-size:
            12px;
    }

    .regular-step-card {
        padding:
            20px;

        border-radius:
            15px;
    }

    .regular-step-card h3 {
        font-size:
            16px;
    }

    .regular-step-card p {
        font-size:
            13px;
    }

    .regular-legal-grid {
        grid-template-columns:
            1fr;
    }

    .account-row {
        align-items:
            flex-start;

        flex-direction:
            column;

        gap:
            3px;
    }

    .account-number {
        text-align:
            left;
    }

}


/* ============================================================
   REDUCED MOTION
   ============================================================ */

@media (prefers-reduced-motion: reduce) {

    .regular-hero,
    .regular-step {
        animation:
            none;
    }

    .regular-step-card,
    .regular-step-number,
    .regular-bank-card,
    .regular-legal-card,
    .legal-icon {
        transition:
            none;
    }

}

</style>


<div class="regular-page">


    {{-- =========================================================
         KEMBALI
    ========================================================== --}}

    <div class="regular-back">

        <a href="{{ url()->previous() }}">

            <span class="arrow">
                ←
            </span>

            Kembali

        </a>

    </div>



    {{-- =========================================================
         HERO
    ========================================================== --}}

    <div class="regular-hero">

        <div class="hero-line"></div>

        <div class="hero-content">

            <div class="hero-label">
                Prosedur Pembukaan Rekening
            </div>

            <h1>
                Prosedur Pembuatan
                <span>Akun Reguler</span>
            </h1>

            <p>
                Panduan tahapan pembukaan rekening secara reguler
                bersama PT. Rifan Financindo Berjangka.
                Ikuti setiap proses dengan teliti agar pembukaan akun
                berjalan dengan lancar.
            </p>

            <div class="hero-status">

                <span class="status-icon"></span>

                Ikuti setiap tahapan sesuai urutan yang telah ditentukan.

            </div>

        </div>

    </div>



    {{-- =========================================================
         JUDUL PROSEDUR
    ========================================================== --}}

    <div class="regular-section-title">

        <div class="title-row">

            <div class="title-icon">
                ✓
            </div>

            <h2>
                Prosedur Pembuatan Akun
            </h2>

        </div>

        <p>
            Berikut adalah tahapan yang perlu dilakukan oleh calon nasabah.
        </p>

    </div>



    {{-- =========================================================
         TIMELINE
    ========================================================== --}}

    <div class="regular-timeline">


        {{-- STEP 01 --}}

        <div class="regular-step">

            <div class="regular-step-number">
                01
            </div>

            <div class="regular-step-card">

                <h3>
                    Konsultasi dengan Wakil Pialang
                </h3>

                <p>
                    Calon Nasabah disarankan untuk bertemu dengan
                    Wakil Pialang Berjangka PT. Rifan Financindo
                    Berjangka untuk dijelaskan mengenai manfaat dan
                    risiko potensial dari kegiatan perdagangan
                    berjangka termasuk prosedur untuk membuka rekening.
                </p>

            </div>

        </div>



        {{-- STEP 02 --}}

        <div class="regular-step">

            <div class="regular-step-number">
                02
            </div>

            <div class="regular-step-card">

                <h3>
                    Simulasi Transaksi
                </h3>

                <p>
                    Melakukan simulasi transaksi pada
                    <strong>Demo Account</strong>.
                </p>

            </div>

        </div>



        {{-- STEP 03 --}}

        <div class="regular-step">

            <div class="regular-step-number">
                03
            </div>

            <div class="regular-step-card">

                <h3>
                    Membaca dan Memahami Buku Perjanjian
                </h3>

                <p>
                    Membaca dan memahami dengan seksama isi
                    Buku Perjanjian yang terdiri dari:
                </p>

                <div class="regular-document-list">

                    <div class="regular-document-item">
                        Aplikasi Pembukaan Rekening
                    </div>

                    <div class="regular-document-item">
                        Dokumen Pemberitahuan Adanya Risiko
                    </div>

                    <div class="regular-document-item">
                        Perjanjian Pemberian Amanat
                    </div>

                    <div class="regular-document-item">
                        Mekanisme Transaksi di Perdagangan Berjangka
                    </div>

                </div>

            </div>

        </div>



        {{-- STEP 04 --}}

        <div class="regular-step">

            <div class="regular-step-number">
                04
            </div>

            <div class="regular-step-card">

                <h3>
                    Pengisian dan Penandatanganan Dokumen
                </h3>

                <p>
                    Isi Aplikasi Pembukaan Rekening dalam Buku
                    Perjanjian, menandatangani, membubuhkan tulisan
                    tanggal dan memberi paraf di setiap bagian yang
                    diperlukan dari setiap halaman Perjanjian dan
                    Kelengkapan Dokumen / Administrasi lainnya.
                </p>

            </div>

        </div>



        {{-- STEP 05 --}}

        <div class="regular-step">

            <div class="regular-step-number">
                05
            </div>

            <div class="regular-step-card">

                <h3>
                    Transfer Dana
                </h3>

                <p>
                    Mentransfer dana ke Rekening Terpisah
                    (<strong>Segregated Account</strong>)
                    PT. Rifan Financindo Berjangka.
                </p>

            </div>

        </div>



        {{-- STEP 06 --}}

        <div class="regular-step">

            <div class="regular-step-number">
                06
            </div>

            <div class="regular-step-card">

                <h3>
                    Mengirimkan Slip Transfer
                </h3>

                <p>
                    Mengirimkan slip transfer bank melalui
                    fax / e-mail ke PT Rifan Financindo Berjangka.
                </p>

            </div>

        </div>


    </div>



    {{-- =========================================================
         REKENING BANK
    ========================================================== --}}

    <div class="regular-bank-section">

        <div class="regular-section-title">

            <div class="title-row">

                <div class="title-icon">
                    $
                </div>

                <h2>
                    Rekening Terpisah
                </h2>

            </div>

            <p>
                Rekening tujuan untuk melakukan transfer dana.
            </p>

        </div>


        <div class="regular-bank-grid">


            {{-- BCA --}}

            <div class="regular-bank-card">

                <div class="bank-icon">
                    B
                </div>

                <div class="bank-name">
                    Bank BCA
                </div>

                <div class="bank-branch">
                    Cabang Sudirman, Jakarta
                </div>

                <div class="account-row">

                    <span class="currency">
                        IDR
                    </span>

                    <span class="account-number">
                        035 – 311 – 8975
                    </span>

                </div>

                <div class="account-row">

                    <span class="currency">
                        USD
                    </span>

                    <span class="account-number">
                        035 – 311 – 7600
                    </span>

                </div>

            </div>



            {{-- CIMB --}}

            <div class="regular-bank-card">

                <div class="bank-icon">
                    C
                </div>

                <div class="bank-name">
                    Bank CIMB Niaga
                </div>

                <div class="bank-branch">
                    Cabang Gajahmada, Jakarta
                </div>

                <div class="account-row">

                    <span class="currency">
                        IDR
                    </span>

                    <span class="account-number">
                        800 – 12 – 97271 – 00
                    </span>

                </div>

                <div class="account-row">

                    <span class="currency">
                        USD
                    </span>

                    <span class="account-number">
                        800 – 01 – 20945 – 40
                    </span>

                </div>

            </div>



            {{-- BNI --}}

            <div class="regular-bank-card">

                <div class="bank-icon">
                    N
                </div>

                <div class="bank-name">
                    BNI Bank
                </div>

                <div class="bank-branch">
                    Gambir Branch, Jakarta
                </div>

                <div class="account-row">

                    <span class="currency">
                        IDR
                    </span>

                    <span class="account-number">
                        017 – 5008 – 590
                    </span>

                </div>

                <div class="account-row">

                    <span class="currency">
                        USD
                    </span>

                    <span class="account-number">
                        017 – 5020 – 200
                    </span>

                </div>

            </div>



            {{-- MANDIRI --}}

            <div class="regular-bank-card">

                <div class="bank-icon">
                    M
                </div>

                <div class="bank-name">
                    Bank Mandiri
                </div>

                <div class="bank-branch">
                    Cabang Imam Bonjol, Jakarta
                </div>

                <div class="account-row">

                    <span class="currency">
                        IDR
                    </span>

                    <span class="account-number">
                        122 - 000 - 664 - 2881
                    </span>

                </div>

                <div class="account-row">

                    <span class="currency">
                        USD
                    </span>

                    <span class="account-number">
                        122 - 000 - 664 - 2873
                    </span>

                </div>

            </div>



            {{-- ARTHA GRAHA --}}

            <div class="regular-bank-card">

                <div class="bank-icon">
                    A
                </div>

                <div class="bank-name">
                    Bank Artha Graha
                </div>

                <div class="bank-branch">
                    Cabang KPO Sudirman, Jakarta
                </div>

                <div class="account-row">

                    <span class="currency">
                        IDR
                    </span>

                    <span class="account-number">
                        107 - 996 - 3271
                    </span>

                </div>

            </div>


        </div>

    </div>



    {{-- =========================================================
         LEGALITAS
    ========================================================== --}}

    <div class="regular-legal-section">

        <div class="regular-section-title">

            <div class="title-row">

                <div class="title-icon">
                    ✓
                </div>

                <h2>
                    Link Legalitas
                </h2>

            </div>

            <p>
                Informasi legalitas dan lembaga terkait.
            </p>

        </div>


        <div class="regular-legal-grid">


            {{-- BAPPEBTI --}}

            <a
                href="https://bappebti.go.id/pialang_berjangka/detail/012"
                target="_blank"
                rel="noopener noreferrer"
                class="regular-legal-card"
            >

                <div class="legal-icon">
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
                class="regular-legal-card"
            >

                <div class="legal-icon">
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
                class="regular-legal-card"
            >

                <div class="legal-icon">
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
                href="https://www.aspebtindo.org/"
                target="_blank"
                rel="noopener noreferrer"
                class="regular-legal-card"
            >

                <div class="legal-icon">
                    A
                </div>

                <h3>
                    ASPEBTINDO
                </h3>

                <span>
                    Lihat informasi
                </span>

            </a>


        </div>

    </div>



    {{-- =========================================================
         PERINGATAN
    ========================================================== --}}

    <div class="regular-warning">

        <div class="warning-title">

            <span class="warning-icon">
                !
            </span>

            Perhatian!

        </div>

        <p>
            Managemen PT. Rifan Financindo Berjangka (PT RFB)
            menghimbau kepada seluruh masyarakat untuk lebih berhati-hati
            terhadap beberapa bentuk penipuan yang berkedok investasi
            mengatasnamakan PT RFB dengan menggunakan media elektronik
            ataupun sosial media.
        </p>

        <p>
            Untuk itu harus dipastikan bahwa transfer dana ke rekening
            tujuan (<strong>Segregated Account</strong>) guna melaksanakan
            transaksi Perdagangan Berjangka adalah atas nama
            <strong>PT Rifan Financindo Berjangka</strong>,
            bukan atas nama individu.
        </p>

    </div>


</div>

@endsection