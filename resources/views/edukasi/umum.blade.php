@extends('layouts.app')

@section('content')

<style>

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
        --white: #ffffff;

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

        height: 165px !important;
        min-height: 165px !important;
        max-height: 165px !important;

        padding: 0 !important;

        background: linear-gradient(
            120deg,
            #124f39 0%,
            #176b4d 60%,
            #23805d 100%
        );

        border-radius: 20px;

        color: #fff;

        margin-bottom: 24px;

        box-shadow:
            0 9px 22px rgba(23,107,77,.11);

        box-sizing: border-box;
    }


    .edu-hero::before {
        content: "";

        position: absolute;

        width: 190px;
        height: 190px;

        border: 35px solid rgba(255,255,255,.06);

        border-radius: 50%;

        right: -55px;
        top: -80px;

        pointer-events: none;
    }


    .edu-hero::after {
        content: "";

        position: absolute;

        width: 100px;
        height: 100px;

        border: 20px solid rgba(141,38,52,.14);

        border-radius: 50%;

        right: 150px;
        bottom: -65px;

        pointer-events: none;
    }


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
        width: 100%;

        max-width: 900px;

        margin-left: 42px !important;

        padding-top: 20px !important;
    }


    .hero-label {
        display: inline-flex;

        align-items: center;

        gap: 5px;

        padding: 4px 9px;

        margin-bottom: 6px;

        border-radius: 50px;

        background: rgba(255,255,255,.12);

        border: 1px solid rgba(255,255,255,.17);

        color: #fff;

        font-size: 9px;

        font-weight: 700;

        letter-spacing: .3px;
    }


    .hero-label i {
        color: #fff;
        font-size: 9px;
    }


    .hero-title {
        margin: 0 0 5px;

        font-size: 36px;

        line-height: 1.05;

        font-weight: 800;

        letter-spacing: -.7px;

        color: #fff !important;
    }


    .hero-description {
        max-width: 900px;

        margin: 0;

        color: rgba(255,255,255,.84) !important;

        font-size: 12px;

        line-height: 1.45;
    }


    .hero-icon {
        display: none !important;
    }


    /* =====================================================
       INTRO
    ===================================================== */

    .intro-strip {
        display: flex;

        align-items: center;

        gap: 16px;

        background: #fff;

        border: 1px solid var(--line);

        border-radius: 18px;

        padding: 17px 20px;

        margin-bottom: 29px;

        box-shadow:
            0 5px 16px rgba(30,50,40,.025);
    }


    .intro-icon {
        width: 48px;
        height: 48px;

        min-width: 48px;

        border-radius: 14px;

        background: var(--red-soft);

        color: var(--red);

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 21px;
    }


    .intro-strip strong {
        display: block;

        font-size: 14px;

        margin-bottom: 3px;
    }


    .intro-strip span {
        display: block;

        color: var(--muted);

        font-size: 12.5px;

        line-height: 1.55;
    }


    /* =====================================================
       SECTION
    ===================================================== */

    .edu-section {
        margin-bottom: 30px;
    }


    .section-marker {
        width: 42px;

        height: 4px;

        border-radius: 20px;

        background: linear-gradient(
            90deg,
            var(--red),
            var(--green)
        );

        margin-bottom: 10px;
    }


    .section-title {
        margin: 0;

        font-size: 21px;

        font-weight: 800;

        letter-spacing: -.3px;
    }


    .section-subtitle {
        margin: 4px 0 17px;

        color: var(--muted);

        font-size: 13px;
    }


    /* =====================================================
       EDUCATION CARD
    ===================================================== */

    .education-grid {
        display: grid;

        grid-template-columns:
            repeat(3, minmax(0,1fr));

        gap: 17px;
    }


    .education-card {
        position: relative;

        background: #fff;

        border: 1px solid var(--line);

        border-radius: 18px;

        overflow: hidden;

        transition:
            transform .3s ease,
            box-shadow .3s ease,
            border-color .3s ease;
    }


    .education-card:hover {
        transform: translateY(-5px);

        border-color: #cbd9d0;

        box-shadow:
            0 13px 28px rgba(30,50,40,.08);
    }


    .education-card::before {
        content: "";

        position: absolute;

        left: 0;
        top: 0;

        width: 4px;
        height: 100%;

        background: var(--green);
    }


    .education-card:nth-child(2)::before {
        background: var(--red);
    }


    .education-card:nth-child(3)::before {
        background: var(--green);
    }


    .card-top {
        padding: 17px 18px 8px;

        display: flex;

        justify-content: space-between;

        align-items: center;
    }


    .card-number {
        color: var(--red);

        font-size: 10px;

        font-weight: 800;

        letter-spacing: 1px;
    }


    .card-icon {
        width: 45px;
        height: 45px;

        border-radius: 13px;

        background: var(--green-soft);

        color: var(--green);

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 20px;
    }


    .education-card:nth-child(2) .card-icon {
        background: var(--red-soft);

        color: var(--red);
    }


    .card-body {
        padding: 4px 18px 18px;
    }


    .card-body h3 {
        margin: 0 0 7px;

        font-size: 16px;

        font-weight: 750;

        line-height: 1.35;
    }


    .card-body p {
        margin: 0;

        color: var(--muted);

        font-size: 12.5px;

        line-height: 1.65;
    }


    .card-footer {
        display: flex;

        justify-content: space-between;

        align-items: center;

        margin-top: 15px;

        padding-top: 12px;

        border-top: 1px solid #edf0ed;
    }


    .card-footer span {
        font-size: 10.5px;

        color: var(--muted);

        font-weight: 600;
    }


    .detail-button {
        border: 0;

        width: 31px;
        height: 31px;

        border-radius: 9px;

        background: var(--green);

        color: #fff;

        display: flex;

        align-items: center;

        justify-content: center;

        cursor: pointer;

        transition: .25s;
    }


    .detail-button:hover {
        background: var(--red);

        transform: translateX(3px);
    }


    /* =====================================================
       DETAIL
    ===================================================== */

    .detail-panel {
        display: none;

        margin-top: 20px;

        background: #fff;

        border: 1px solid var(--line);

        border-radius: 20px;

        padding: 25px;

        animation: detailIn .35s ease;

        box-shadow:
            0 8px 25px rgba(30,50,40,.04);
    }


    .detail-panel.active {
        display: block;
    }


    @keyframes detailIn {

        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }

    }


    .detail-head {
        display: flex;

        justify-content: space-between;

        align-items: center;

        gap: 15px;

        padding-bottom: 15px;

        margin-bottom: 20px;

        border-bottom: 1px solid var(--line);
    }


    .detail-head h3 {
        margin: 0;

        font-size: 19px;

        font-weight: 800;

        color: var(--text);
    }


    .detail-head h3 i {
        color: var(--green);
    }


    .close-detail {
        width: 34px;
        height: 34px;

        border: 0;

        border-radius: 50%;

        background: #f1f3f1;

        color: #666;

        cursor: pointer;

        font-size: 18px;

        transition: .2s;
    }


    .close-detail:hover {
        background: var(--red);

        color: #fff;
    }


    /* =====================================================
       INTRO DETAIL
    ===================================================== */

    .detail-intro {
        background: var(--green-soft);

        border-left: 4px solid var(--green);

        border-radius: 12px;

        padding: 15px 17px;

        margin-bottom: 24px;
    }


    .detail-intro strong {
        display: block;

        font-size: 14px;

        margin-bottom: 5px;

        color: var(--green-dark);
    }


    .detail-intro p {
        margin: 0;

        color: #5f6963;

        font-size: 12.5px;

        line-height: 1.7;
    }


    /* =====================================================
       DOKUMEN
    ===================================================== */

    .document-section {
        margin-top: 22px;

        padding-top: 22px;

        border-top: 1px solid var(--line);
    }


    .document-title {
        display: flex;

        align-items: center;

        gap: 9px;

        margin-bottom: 15px;
    }


    .document-title i {
        color: var(--red);

        font-size: 18px;
    }


    .document-title strong {
        font-size: 16px;
    }


    .document-grid {
        display: grid;

        grid-template-columns:
            repeat(2, minmax(0,1fr));

        gap: 11px;
    }


    .document-item {
        display: flex;

        align-items: center;

        gap: 11px;

        padding: 13px 14px;

        border: 1px solid var(--line);

        border-radius: 12px;

        background: #fafcfb;

        transition: .2s ease;
    }


    .document-item:hover {
        border-color: #cbd9d0;

        background: var(--green-soft);
    }


    .document-item-icon {
        width: 34px;
        height: 34px;

        min-width: 34px;

        border-radius: 9px;

        background: var(--red-soft);

        color: var(--red);

        display: flex;

        align-items: center;

        justify-content: center;
    }


    .document-item strong {
        display: block;

        font-size: 12.5px;

        margin-bottom: 2px;
    }


    .document-item span {
        display: block;

        color: var(--muted);

        font-size: 10.5px;

        line-height: 1.4;
    }


    /* =====================================================
       TIMELINE
    ===================================================== */

    .timeline-section {
        margin-top: 24px;

        padding-top: 22px;

        border-top: 1px solid var(--line);
    }


    .timeline-title {
        display: flex;

        align-items: center;

        gap: 9px;

        margin-bottom: 18px;
    }


    .timeline-title i {
        color: var(--green);

        font-size: 18px;
    }


    .timeline-title strong {
        font-size: 16px;
    }


    .timeline {
        display: grid;

        grid-template-columns:
            repeat(5, minmax(0,1fr));

        gap: 10px;
    }


    .timeline-item {
        position: relative;

        padding: 15px 12px;

        border: 1px solid var(--line);

        border-radius: 13px;

        background: #fafcfb;
    }


    .timeline-number {
        width: 27px;
        height: 27px;

        border-radius: 50%;

        background: var(--green);

        color: #fff;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 11px;

        font-weight: 800;

        margin-bottom: 9px;
    }


    .timeline-item:nth-child(even)
    .timeline-number {
        background: var(--red);
    }


    .timeline-item strong {
        display: block;

        font-size: 11.5px;

        margin-bottom: 4px;
    }


    .timeline-item span {
        color: var(--muted);

        font-size: 10.5px;

        line-height: 1.5;
    }


    /* =====================================================
       KEGIATAN & TEORI DETAIL
    ===================================================== */

    .simple-detail-grid {
        display: grid;

        grid-template-columns:
            repeat(2, minmax(0,1fr));

        gap: 18px;
    }


    .simple-detail-box {
        border: 1px solid var(--line);

        border-radius: 15px;

        padding: 18px;

        background: #fff;
    }


    .simple-detail-box-title {
        display: flex;

        align-items: center;

        gap: 10px;

        margin-bottom: 10px;
    }


    .simple-detail-box-title div {
        width: 35px;
        height: 35px;

        border-radius: 10px;

        background: var(--green-soft);

        color: var(--green);

        display: flex;

        align-items: center;

        justify-content: center;
    }


    .simple-detail-box:nth-child(even)
    .simple-detail-box-title div {
        background: var(--red-soft);

        color: var(--red);
    }


    .simple-detail-box-title strong {
        font-size: 14px;
    }


    .simple-detail-box p {
        margin: 0;

        color: var(--muted);

        font-size: 12.5px;

        line-height: 1.7;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media(max-width: 950px) {

        .edu-page {
            padding: 22px 20px 40px;
        }


        .edu-hero {
            height: 165px !important;
            min-height: 165px !important;
            max-height: 165px !important;
        }


        .hero-text {
            margin-left: 32px !important;
            padding-top: 20px !important;
        }


        .hero-title {
            font-size: 32px;
        }


        .education-grid {
            grid-template-columns:
                repeat(2, minmax(0,1fr));
        }


        .timeline {
            grid-template-columns:
                repeat(3, minmax(0,1fr));
        }

    }


    @media(max-width: 650px) {

        .edu-page {
            padding: 16px 14px 35px;
        }


        .edu-hero {
            height: auto !important;

            min-height: 165px !important;

            max-height: none !important;

            border-radius: 18px;
        }


        .hero-content {
            min-height: 165px;

            height: auto;
        }


        .hero-text {
            margin-left: 22px !important;

            margin-right: 18px;

            padding-top: 20px !important;
        }


        .hero-title {
            font-size: 29px;
        }


        .hero-description {
            font-size: 11.5px;
        }


        .education-grid {
            grid-template-columns: 1fr;
        }


        .document-grid {
            grid-template-columns: 1fr;
        }


        .timeline {
            grid-template-columns: 1fr;
        }


        .simple-detail-grid {
            grid-template-columns: 1fr;
        }


        .intro-strip {
            align-items: flex-start;
        }

    }

</style>


<div class="edu-page">


    <!-- =================================================
         HERO
    ================================================= -->

    <section class="edu-hero">

        <div class="hero-content">

            <div class="hero-text">

                <div class="hero-label">

                    <i class="bi bi-mortarboard-fill"></i>

                    PUSAT EDUKASI UMUM

                </div>


                <h1 class="hero-title">
                    Edukasi Umum
                </h1>


                <p class="hero-description">

                    Informasi dan pembelajaran umum untuk mengenal
                    dunia kerja, kegiatan sosial, serta pengetahuan
                    dasar perdagangan berjangka.

                </p>

            </div>


            <div class="hero-icon">

                <i class="bi bi-book-half"></i>

            </div>

        </div>

    </section>



    <!-- =================================================
         INTRO
    ================================================= -->

    <div class="intro-strip">

        <div class="intro-icon">

            <i class="bi bi-lightbulb"></i>

        </div>


        <div>

            <strong>
                Belajar, berkembang, dan mengenal dunia kerja
            </strong>

            <span>

                Edukasi umum memberikan informasi mengenai
                pengalaman kerja, kegiatan sosial, dan pengetahuan
                dasar yang dapat membantu peserta memahami
                lingkungan profesional.

            </span>

        </div>

    </div>



    <!-- =================================================
         MATERI EDUKASI
    ================================================= -->

    <section class="edu-section">

        <div class="section-marker"></div>


        <h2 class="section-title">
            Materi Edukasi Umum
        </h2>


        <p class="section-subtitle">
            Informasi umum untuk menambah wawasan dan pengalaman.
        </p>


        <div class="education-grid">


            <!-- =================================================
                 CARD 1 - MAGANG
            ================================================= -->

            <article class="education-card">

                <div class="card-top">

                    <span class="card-number">
                        01 / MAGANG
                    </span>


                    <div class="card-icon">

                        <i class="bi bi-briefcase-fill"></i>

                    </div>

                </div>


                <div class="card-body">

                    <h3>
                        Program Magang
                    </h3>


                    <p>

                        Kesempatan bagi pelajar dan mahasiswa
                        untuk mengenal lingkungan kerja profesional
                        serta memperoleh pengalaman melalui
                        kegiatan magang.

                    </p>


                    <div class="card-footer">

                        <span>
                            Pelajari program
                        </span>


                        <button
                            class="detail-button"
                            onclick="bukaMateri('materiMagang')"
                        >

                            <i class="bi bi-arrow-right"></i>

                        </button>

                    </div>

                </div>

            </article>



            <!-- =================================================
                 CARD 2 - KEGIATAN
            ================================================= -->

            <article class="education-card">

                <div class="card-top">

                    <span class="card-number">
                        02 / KEGIATAN
                    </span>


                    <div class="card-icon">

                        <i class="bi bi-people-fill"></i>

                    </div>

                </div>


                <div class="card-body">

                    <h3>
                        Kegiatan
                    </h3>


                    <p>

                        Informasi mengenai berbagai kegiatan
                        yang dilakukan sebagai bagian dari
                        pembelajaran, kebersamaan, dan kontribusi
                        sosial.

                    </p>


                    <div class="card-footer">

                        <span>
                            Lihat kegiatan
                        </span>


                        <button
                            class="detail-button"
                            onclick="bukaMateri('materiKegiatan')"
                        >

                            <i class="bi bi-arrow-right"></i>

                        </button>

                    </div>

                </div>

            </article>



            <!-- =================================================
                 CARD 3 - TEORI
            ================================================= -->

            <article class="education-card">

                <div class="card-top">

                    <span class="card-number">
                        03 / PENGETAHUAN
                    </span>


                    <div class="card-icon">

                        <i class="bi bi-journal-text"></i>

                    </div>

                </div>


                <div class="card-body">

                    <h3>
                        Teori Umum
                    </h3>


                    <p>

                        Materi dasar untuk membantu memahami
                        konsep umum mengenai dunia kerja,
                        komunikasi, dan perdagangan berjangka.

                    </p>


                    <div class="card-footer">

                        <span>
                            Pelajari materi
                        </span>


                        <button
                            class="detail-button"
                            onclick="bukaMateri('materiTeori')"
                        >

                            <i class="bi bi-arrow-right"></i>

                        </button>

                    </div>

                </div>

            </article>

        </div>



        <!-- =================================================
             DETAIL PROGRAM MAGANG
        ================================================= -->

        <div
            id="materiMagang"
            class="detail-panel"
        >

            <div class="detail-head">

                <h3>

                    <i class="bi bi-briefcase-fill me-2"></i>

                    Program Magang

                </h3>


                <button
                    class="close-detail"
                    onclick="tutupMateri()"
                >
                    ×
                </button>

            </div>



            <!-- TENTANG PROGRAM -->

            <div class="detail-intro">

                <strong>
                    Tentang Program Magang
                </strong>


                <p>

                    Program Magang merupakan kesempatan bagi
                    pelajar atau mahasiswa untuk memperoleh
                    pengalaman langsung di lingkungan kerja
                    profesional. Peserta dapat mengenal dunia
                    kerja sekaligus mengembangkan kemampuan
                    komunikasi, administrasi, kerja sama tim,
                    dan kedisiplinan.

                </p>

            </div>



            <!-- =================================================
                 DOKUMEN YANG DIPERLUKAN
            ================================================= -->

            <div class="document-section">

                <div class="document-title">

                    <i class="bi bi-file-earmark-text-fill"></i>

                    <strong>
                        Dokumen yang Diperlukan
                    </strong>

                </div>


                <div class="document-grid">


                    <!-- DOKUMEN 1 -->

                    <div class="document-item">

                        <div class="document-item-icon">

                            <i class="bi bi-file-earmark-check"></i>

                        </div>


                        <div>

                            <strong>
                                Surat Pengantar Magang
                            </strong>

                            <span>
                                Surat resmi dari sekolah atau perguruan tinggi.
                            </span>

                        </div>

                    </div>



                    <!-- DOKUMEN 2 -->

                    <div class="document-item">

                        <div class="document-item-icon">

                            <i class="bi bi-file-earmark-richtext"></i>

                        </div>


                        <div>

                            <strong>
                                Proposal Magang
                            </strong>

                            <span>
                                Berisi rencana, tujuan, periode, dan kegiatan magang.
                            </span>

                        </div>

                    </div>



                    <!-- DOKUMEN 3 -->

                    <div class="document-item">

                        <div class="document-item-icon">

                            <i class="bi bi-person-vcard"></i>

                        </div>


                        <div>

                            <strong>
                                CV / Curriculum Vitae
                            </strong>

                            <span>
                                Informasi pendidikan, pengalaman, dan kemampuan peserta.
                            </span>

                        </div>

                    </div>



                    <!-- DOKUMEN 4 -->

                    <div class="document-item">

                        <div class="document-item-icon">

                            <i class="bi bi-person-badge"></i>

                        </div>


                        <div>

                            <strong>
                                Kartu Pelajar / Mahasiswa
                            </strong>

                            <span>
                                Dokumen pendukung status pelajar atau mahasiswa.
                            </span>

                        </div>

                    </div>



                    <!-- DOKUMEN 5 -->

                    <div class="document-item">

                        <div class="document-item-icon">

                            <i class="bi bi-folder-check"></i>

                        </div>


                        <div>

                            <strong>
                                Dokumen Pendukung
                            </strong>

                            <span>
                                Dokumen tambahan sesuai kebutuhan program.
                            </span>

                        </div>

                    </div>



                    <!-- DOKUMEN 6 -->

                    <div class="document-item">

                        <div class="document-item-icon">

                            <i class="bi bi-journal-check"></i>

                        </div>


                        <div>

                            <strong>
                                Ketentuan dari Institusi
                            </strong>

                            <span>
                                Dokumen tambahan sesuai ketentuan sekolah atau kampus.
                            </span>

                        </div>

                    </div>

                </div>

            </div>



            <!-- =================================================
                 ALUR PENGAJUAN
            ================================================= -->

            <div class="timeline-section">

                <div class="timeline-title">

                    <i class="bi bi-diagram-3-fill"></i>

                    <strong>
                        Alur Pengajuan Magang
                    </strong>

                </div>


                <div class="timeline">


                    <div class="timeline-item">

                        <div class="timeline-number">
                            01
                        </div>

                        <strong>
                            Persiapkan Dokumen
                        </strong>

                        <span>
                            Lengkapi seluruh dokumen
                            yang dibutuhkan.
                        </span>

                    </div>



                    <div class="timeline-item">

                        <div class="timeline-number">
                            02
                        </div>

                        <strong>
                            Pengajuan
                        </strong>

                        <span>
                            Ajukan dokumen kepada
                            pihak perusahaan.
                        </span>

                    </div>



                    <div class="timeline-item">

                        <div class="timeline-number">
                            03
                        </div>

                        <strong>
                            Konfirmasi
                        </strong>

                        <span>
                            Menunggu proses pemeriksaan
                            dan konfirmasi.
                        </span>

                    </div>



                    <div class="timeline-item">

                        <div class="timeline-number">
                            04
                        </div>

                        <strong>
                            Pelaksanaan
                        </strong>

                        <span>
                            Mengikuti program sesuai
                            jadwal yang ditentukan.
                        </span>

                    </div>



                    <div class="timeline-item">

                        <div class="timeline-number">
                            05
                        </div>

                        <strong>
                            Laporan
                        </strong>

                        <span>
                            Menyelesaikan laporan
                            dan evaluasi kegiatan.
                        </span>

                    </div>

                </div>

            </div>

        </div>



        <!-- =================================================
             DETAIL KEGIATAN
        ================================================= -->

        <div
            id="materiKegiatan"
            class="detail-panel"
        >

            <div class="detail-head">

                <h3>

                    <i class="bi bi-people-fill me-2"></i>

                    Kegiatan

                </h3>


                <button
                    class="close-detail"
                    onclick="tutupMateri()"
                >
                    ×
                </button>

            </div>


            <div class="detail-intro">

                <strong>
                    Kegiatan Edukasi & Sosial
                </strong>


                <p>

                    Kegiatan menjadi bagian dari proses pembelajaran
                    untuk membangun kebersamaan, pengalaman,
                    kepedulian, serta hubungan yang positif
                    dengan lingkungan sekitar.

                </p>

            </div>


            <div class="simple-detail-grid">


                <div class="simple-detail-box">

                    <div class="simple-detail-box-title">

                        <div>
                            <i class="bi bi-calendar-event"></i>
                        </div>

                        <strong>
                            Kegiatan Internal
                        </strong>

                    </div>


                    <p>

                        Kegiatan internal dapat berupa pembelajaran,
                        diskusi, kegiatan bersama tim, maupun aktivitas
                        lain yang mendukung pengembangan kemampuan
                        dan kebersamaan.

                    </p>

                </div>



                <div class="simple-detail-box">

                    <div class="simple-detail-box-title">

                        <div>
                            <i class="bi bi-heart-fill"></i>
                        </div>

                        <strong>
                            Kegiatan Sosial
                        </strong>

                    </div>


                    <p>

                        Kegiatan sosial menjadi sarana untuk membangun
                        kepedulian dan memberikan kontribusi positif
                        kepada lingkungan sekitar.

                    </p>

                </div>

            </div>

        </div>



        <!-- =================================================
             DETAIL TEORI UMUM
        ================================================= -->

        <div
            id="materiTeori"
            class="detail-panel"
        >

            <div class="detail-head">

                <h3>

                    <i class="bi bi-journal-text me-2"></i>

                    Teori Umum

                </h3>


                <button
                    class="close-detail"
                    onclick="tutupMateri()"
                >
                    ×
                </button>

            </div>


            <div class="detail-intro">

                <strong>
                    Pengetahuan Dasar
                </strong>


                <p>

                    Materi teori umum membantu peserta memperoleh
                    pemahaman dasar mengenai lingkungan kerja,
                    komunikasi profesional, serta pengenalan
                    perdagangan berjangka.

                </p>

            </div>


            <div class="simple-detail-grid">


                <div class="simple-detail-box">

                    <div class="simple-detail-box-title">

                        <div>
                            <i class="bi bi-chat-dots-fill"></i>
                        </div>

                        <strong>
                            Komunikasi Profesional
                        </strong>

                    </div>


                    <p>

                        Memahami pentingnya komunikasi yang baik,
                        sopan, jelas, dan profesional dalam
                        lingkungan kerja.

                    </p>

                </div>



                <div class="simple-detail-box">

                    <div class="simple-detail-box-title">

                        <div>
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>

                        <strong>
                            Pengenalan Perdagangan
                        </strong>

                    </div>


                    <p>

                        Mengenal secara umum konsep perdagangan
                        berjangka, karakteristik pasar, serta
                        pentingnya memahami risiko sebelum
                        melakukan aktivitas perdagangan.

                    </p>

                </div>

            </div>

        </div>

    </section>

</div>



<script>

    function bukaMateri(id) {

        document
            .querySelectorAll('.detail-panel')
            .forEach(panel => {

                panel.classList.remove('active');

            });


        const target =
            document.getElementById(id);


        if (target) {

            target.classList.add('active');


            setTimeout(() => {

                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'nearest'
                });

            }, 50);

        }

    }


    function tutupMateri() {

        document
            .querySelectorAll('.detail-panel')
            .forEach(panel => {

                panel.classList.remove('active');

            });

    }

</script>

@endsection