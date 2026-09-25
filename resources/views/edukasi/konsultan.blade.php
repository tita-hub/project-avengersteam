@extends('layouts.app')

@section('content')

<style>
    /* =====================================================
       EDUKASI KONSULTAN
       FONT SANS-SERIF
    ===================================================== */

    .edu-page,
    .edu-page *,
    .edu-page button,
    .edu-page input,
    .edu-page textarea,
    .edu-page select {
        font-family: Arial, Helvetica, sans-serif !important;
    }

    .edu-page {
        --green: #176b4d;
        --green-dark: #124f39;
        --green-light: #23805d;
        --green-soft: #eaf5ef;
        --red: #8d2634;
        --red-soft: #faeeee;
        --text: #202522;
        --muted: #6d756f;
        --line: #e4e9e5;
        --bg: #f7f9f7;

        padding: 28px 32px 50px;

        background: var(--bg);

        min-height: calc(100vh - 70px);

        color: var(--text);
    }


    /* =====================================================
       HERO
    ===================================================== */

    .edu-hero {
        position: relative;

        overflow: hidden;

        width: 100%;

        height: 175px !important;
        min-height: 175px !important;
        max-height: 175px !important;

        padding: 0 !important;

        margin-bottom: 28px;

        border-radius: 20px;

        background: linear-gradient(
            120deg,
            #124f39 0%,
            #176b4d 60%,
            #23805d 100%
        );

        color: #fff;

        box-shadow:
            0 9px 22px rgba(23,107,77,.11);
    }


    /* Lingkaran kanan atas */

    .edu-hero::before {
        content: "";

        position: absolute;

        width: 180px;
        height: 180px;

        border: 34px solid rgba(255,255,255,.055);

        border-radius: 50%;

        right: -50px;
        top: -75px;
    }


    /* Lingkaran kanan bawah */

    .edu-hero::after {
        content: "";

        position: absolute;

        width: 110px;
        height: 110px;

        border: 21px solid rgba(141,38,52,.16);

        border-radius: 50%;

        right: 120px;
        bottom: -72px;
    }


    /* =====================================================
       ISI HERO
    ===================================================== */

    .hero-content {
        position: relative;

        z-index: 2;

        width: 100%;
        height: 100%;

        display: flex;

        align-items: flex-start;
        justify-content: flex-start;

        padding: 0 !important;

        margin: 0 !important;
    }


    .hero-text {
        max-width: 900px;

        margin-left: 50px !important;

        padding-top: 22px !important;
    }


    /* =====================================================
       LABEL HERO
    ===================================================== */

    .hero-label {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        gap: 5px;

        padding: 4px 9px;

        margin-bottom: 6px;

        border-radius: 50px;

        background: rgba(255,255,255,.12);

        border: 1px solid rgba(255,255,255,.17);

        color: #fff;

        font-size: 9px;

        font-weight: 700;

        line-height: 1.2;

        letter-spacing: .3px;
    }


    .hero-label i {
        color: #fff;

        font-size: 10px;
    }


    /* =====================================================
       JUDUL HERO
    ===================================================== */

    .hero-title {
        margin: 0 0 5px;

        padding: 0;

        color: #fff !important;

        font-family: Arial, Helvetica, sans-serif !important;

        font-size: 36px;

        line-height: 1.05;

        font-weight: 800;

        letter-spacing: -.7px;
    }


    /* =====================================================
       DESKRIPSI HERO
    ===================================================== */

    .hero-description {
        max-width: 900px;

        margin: 0;

        padding: 0;

        color: rgba(255,255,255,.84) !important;

        font-size: 12px;

        line-height: 1.45;
    }


    /* Icon hero tidak digunakan */

    .hero-icon {
        display: none !important;
    }


    /* =====================================================
       SECTION HEADING
    ===================================================== */

    .section-heading {
        margin-bottom: 20px;
    }


    .section-marker {
        width: 70px;
        height: 5px;

        margin-bottom: 12px;

        border-radius: 20px;

        background: linear-gradient(
            90deg,
            #8d2634,
            #176b4d
        );
    }


    .section-heading h2 {
        margin: 0 0 5px;

        color: #202522;

        font-family: Arial, Helvetica, sans-serif !important;

        font-size: 27px;

        font-weight: 800;
    }


    .section-heading p {
        margin: 0;

        color: #6d756f;

        font-size: 13px;

        line-height: 1.6;
    }


    /* =====================================================
       AKSES KONSULTAN
    ===================================================== */

    .access-grid {
        display: grid;

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 20px;

        margin-bottom: 38px;
    }


    .access-card {
        position: relative;

        overflow: hidden;

        padding: 24px;

        background: #fff;

        border: 1px solid #e4e9e5;

        border-radius: 18px;

        transition:
            transform .3s ease,
            box-shadow .3s ease,
            border-color .3s ease;
    }


    .access-card:hover {
        transform: translateY(-5px);

        border-color: rgba(23,107,77,.25);

        box-shadow:
            0 14px 30px rgba(23,107,77,.10);
    }


    .access-card::before {
        content: "";

        position: absolute;

        width: 90px;
        height: 90px;

        right: -30px;
        top: -30px;

        border-radius: 50%;

        background: rgba(23,107,77,.05);
    }


    /* =====================================================
       ICON AKSES
    ===================================================== */

    .access-icon {
        width: 48px;
        height: 48px;

        display: flex;

        align-items: center;
        justify-content: center;

        margin-bottom: 17px;

        border-radius: 14px;

        background: #eaf5ef;

        color: #176b4d;

        font-size: 21px;
    }


    .access-card:nth-child(2) .access-icon {
        background: #faeeee;

        color: #8d2634;
    }


    /* =====================================================
       JUDUL CARD
    ===================================================== */

    .access-card h3 {
        margin: 0 0 7px;

        color: #202522;

        font-family: Arial, Helvetica, sans-serif !important;

        font-size: 18px;

        font-weight: 800;
    }


    /* =====================================================
       DESKRIPSI CARD
    ===================================================== */

    .access-card p {
        margin: 0 0 17px;

        color: #6d756f;

        font-size: 12px;

        line-height: 1.7;
    }


    /* =====================================================
       TOMBOL
    ===================================================== */

    .access-btn {
        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding: 9px 15px;

        border-radius: 10px;

        background: #176b4d;

        color: #fff !important;

        text-decoration: none;

        font-size: 11px;

        font-weight: 700;

        transition: .3s ease;
    }


    .access-btn:hover {
        background: #124f39;

        transform: translateX(3px);

        color: #fff !important;
    }


    .access-card:nth-child(2) .access-btn {
        background: #8d2634;
    }


    .access-card:nth-child(2) .access-btn:hover {
        background: #731f2b;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 900px) {

        .edu-page {
            padding: 22px 20px 40px;
        }


        .edu-hero {
            height: 175px !important;
            min-height: 175px !important;
            max-height: 175px !important;
        }


        .hero-text {
            margin-left: 32px !important;

            padding-top: 22px !important;

            padding-right: 25px;
        }


        .access-grid {
            grid-template-columns: 1fr;
        }
    }


    @media (max-width: 600px) {

        .edu-page {
            padding: 18px 15px 35px;
        }


        .edu-hero {
            height: 165px !important;
            min-height: 165px !important;
            max-height: 165px !important;

            border-radius: 16px !important;
        }


        .hero-text {
            margin-left: 22px !important;

            padding-top: 20px !important;

            padding-right: 18px;
        }


        .hero-title {
            font-size: 28px !important;
        }


        .hero-description {
            font-size: 11px !important;
        }


        .section-heading h2 {
            font-size: 23px;
        }


        .access-card {
            padding: 20px;
        }
    }
</style>


<div class="edu-page">


    {{-- =====================================================
         HERO
    ====================================================== --}}

    <section class="edu-hero">

        <div class="hero-content">

            <div class="hero-text">

                <div class="hero-label">

                    <i class="bi bi-mortarboard-fill"></i>

                    PUSAT PEMBELAJARAN

                </div>


                <h1 class="hero-title">

                    Edukasi Konsultan

                </h1>


                <p class="hero-description">

                    Ruang pembelajaran untuk membantu konsultan meningkatkan
                    kemampuan komunikasi, analisis pasar, serta memahami etika
                    dan kepatuhan dalam menjalankan aktivitas profesional.

                </p>

            </div>

        </div>

    </section>



    {{-- =====================================================
         AKSES KONSULTAN
    ====================================================== --}}

    <section>

        <div class="section-heading">

            <div class="section-marker"></div>


            <h2>

                Akses Konsultan

            </h2>


            <p>

                Akses sistem pendukung aktivitas dan pelaporan konsultan.

            </p>

        </div>



        <div class="access-grid">


            {{-- =================================================
                 INPUT APPOINTMENT
            ================================================== --}}

            <div class="access-card">

                <div class="access-icon">

                    <i class="bi bi-calendar-check"></i>

                </div>


                <h3>

                    Input Appointment

                </h3>


                <p>

                    Gunakan sistem appointment untuk melakukan pengajuan
                    kebutuhan mobil kantor dalam aktivitas konsultan.

                </p>


                <a
                    href="https://www.rf-berjangkasemarang.com/login"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="access-btn"
                >

                    Buka Sistem

                    <i class="bi bi-arrow-up-right"></i>

                </a>

            </div>



            {{-- =================================================
                 REPORT KINERJA
            ================================================== --}}

            <div class="access-card">

                <div class="access-icon">

                    <i class="bi bi-clipboard-data"></i>

                </div>


                <h3>

                    Input Report Kinerja Harian

                </h3>


                <p>

                    Gunakan sistem untuk melakukan input dan pemantauan
                    laporan kinerja harian konsultan.

                </p>


                <a
                    href="https://performance-rfbsmg.com/"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="access-btn"
                >

                    Buka Sistem

                    <i class="bi bi-arrow-up-right"></i>

                </a>

            </div>


        </div>

    </section>


</div>

@endsection