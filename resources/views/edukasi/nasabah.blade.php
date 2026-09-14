@extends('layouts.app')

@section('content')

<style>
    .edu-page {
        --green: #176b4d;
        --green-dark: #0f513a;
        --green-soft: #eaf5ef;
        --red: #b52b2f;
        --red-soft: #faeeee;
        --text: #202522;
        --muted: #6d756f;
        --line: #e4e9e5;
        --white: #ffffff;
        --bg: #f7f9f7;

        padding: 28px 32px 50px;
        background: var(--bg);
        min-height: calc(100vh - 70px);
        color: var(--text);
    }


    /* =====================================================
       HERO EDUKASI NASABAH
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
            0 9px 22px rgba(23, 107, 77, .11);

        box-sizing: border-box;
    }


    /* =====================================================
       LINGKARAN DEKORASI HERO
    ===================================================== */

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

        border: 20px solid rgba(181,43,47,.12);

        border-radius: 50%;

        right: 150px;
        bottom: -65px;

        pointer-events: none;
    }


    /* =====================================================
       POSISI ISI HERO
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

        box-sizing: border-box;
    }


    .hero-text {
        width: 100%;

        max-width: 900px;

        text-align: left;

        margin-left: 42px !important;

        padding-top: 20px !important;

        box-sizing: border-box;
    }


    /* =====================================================
       LABEL
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

        letter-spacing: .3px;

        line-height: 1.2;
    }


    .hero-label i {
        color: #fff;

        font-size: 9px;
    }


    /* =====================================================
       JUDUL
    ===================================================== */

    .hero-title {
        margin: 0 0 5px;

        padding: 0;

        color: #fff !important;

        font-size: 36px;

        line-height: 1.05;

        font-weight: 800;

        letter-spacing: -.7px;
    }


    /* =====================================================
       DESKRIPSI
    ===================================================== */

    .hero-description {
        max-width: 900px;

        margin: 0;

        padding: 0;

        color: rgba(255,255,255,.84) !important;

        font-size: 12px;

        line-height: 1.45;

        text-align: left;
    }


    /* =====================================================
       ICON HERO
    ===================================================== */

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
            repeat(3, minmax(0, 1fr));

        gap: 17px;
    }


    .education-card {
        position: relative;

        background: #fff;

        border: 1px solid var(--line);

        border-radius: 18px;

        overflow: hidden;

        transition: .3s ease;
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


    .education-card:nth-child(2)::before,
    .education-card:nth-child(5)::before {
        background: var(--red);
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


    .education-card:nth-child(2) .card-icon,
    .education-card:nth-child(5) .card-icon {
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

        margin-top: 18px;

        background: #fff;

        border: 1px solid var(--line);

        border-radius: 18px;

        padding: 22px;

        animation: detailIn .3s ease;
    }


    .detail-panel.active {
        display: block;
    }


    @keyframes detailIn {

        from {
            opacity: 0;
            transform: translateY(8px);
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

        margin-bottom: 10px;
    }


    .detail-head h3 {
        margin: 0;

        font-size: 17px;

        font-weight: 750;
    }


    .close-detail {
        width: 32px;
        height: 32px;

        border: 0;

        border-radius: 50%;

        background: #f1f3f1;

        color: #666;

        cursor: pointer;
    }


    .detail-panel p {
        margin: 0;

        color: var(--muted);

        font-size: 13px;

        line-height: 1.75;
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

            padding: 0 !important;
        }


        .hero-text {
            margin-left: 32px !important;

            padding-top: 20px !important;
        }


        .hero-title {
            font-size: 32px;
        }


        .hero-description {
            max-width: 760px;
        }


        .education-grid {
            grid-template-columns:
                repeat(2, minmax(0, 1fr));
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

            padding: 0 !important;

            border-radius: 18px;
        }


        .hero-content {
            height: auto;

            min-height: 165px;

            align-items: flex-start;
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

            line-height: 1.5;
        }


        .education-grid {
            grid-template-columns: 1fr;
        }


        .intro-strip {
            align-items: flex-start;
        }

    }
</style>


<div class="edu-page">


    <!-- =================================================
         HERO EDUKASI NASABAH
    ================================================= -->

    <section class="edu-hero">

        <div class="hero-content">

            <div class="hero-text">

                <div class="hero-label">
                    <i class="bi bi-person-check-fill"></i>
                    PUSAT INFORMASI NASABAH
                </div>


                <h1 class="hero-title">
                    Edukasi Nasabah
                </h1>


                <p class="hero-description">
                    Kenali fasilitas dan layanan, pahami apa itu trading,
                    serta pelajari dasar perdagangan berjangka sebelum
                    memulai aktivitas perdagangan.
                </p>

            </div>


            <div class="hero-icon">
                <i class="bi bi-person-vcard"></i>
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
                Kenali sebelum melakukan transaksi
            </strong>

            <span>
                Edukasi membantu nasabah memahami fasilitas,
                mekanisme trading, produk, serta risiko dalam
                perdagangan berjangka secara lebih menyeluruh.
            </span>

        </div>

    </div>


    <!-- =================================================
         MATERI EDUKASI NASABAH
    ================================================= -->

    <section class="edu-section">

        <div class="section-marker"></div>

        <h2 class="section-title">
            Materi Edukasi Nasabah
        </h2>

        <p class="section-subtitle">
            Informasi dasar untuk mengenal dunia perdagangan berjangka.
        </p>


        <div class="education-grid">


            <!-- CARD 1 -->

            <article class="education-card">

                <div class="card-top">

                    <span class="card-number">
                        01 / LAYANAN
                    </span>

                    <div class="card-icon">
                        <i class="bi bi-grid-1x2-fill"></i>
                    </div>

                </div>


                <div class="card-body">

                    <h3>
                        Fasilitas & Layanan
                    </h3>

                    <p>
                        Kenali berbagai fasilitas dan layanan yang
                        tersedia untuk mendukung kebutuhan nasabah
                        dalam melakukan aktivitas perdagangan.
                    </p>


                    <div class="card-footer">

                        <span>
                            Kenali layanan
                        </span>

                        <button
                            class="detail-button"
                            onclick="bukaMateri('materi1')"
                        >
                            <i class="bi bi-arrow-right"></i>
                        </button>

                    </div>

                </div>

            </article>


            <!-- CARD 2 -->

            <article class="education-card">

                <div class="card-top">

                    <span class="card-number">
                        02 / TRADING
                    </span>

                    <div class="card-icon">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>

                </div>


                <div class="card-body">

                    <h3>
                        Apa Itu Trading?
                    </h3>

                    <p>
                        Pahami pengertian trading, bagaimana transaksi
                        dilakukan, serta bagaimana perubahan harga
                        dapat memengaruhi hasil perdagangan.
                    </p>


                    <div class="card-footer">

                        <span>
                            Kenali trading
                        </span>

                        <button
                            class="detail-button"
                            onclick="bukaMateri('materi2')"
                        >
                            <i class="bi bi-arrow-right"></i>
                        </button>

                    </div>

                </div>

            </article>


            <!-- CARD 3 -->

            <article class="education-card">

                <div class="card-top">

                    <span class="card-number">
                        03 / PENGENALAN
                    </span>

                    <div class="card-icon">
                        <i class="bi bi-book-half"></i>
                    </div>

                </div>


                <div class="card-body">

                    <h3>
                        Pengenalan Perdagangan Berjangka
                    </h3>

                    <p>
                        Mengenal konsep dasar perdagangan berjangka,
                        karakteristiknya, serta pihak-pihak yang
                        terlibat dalam aktivitas perdagangan.
                    </p>


                    <div class="card-footer">

                        <span>
                            Pelajari dasarnya
                        </span>

                        <button
                            class="detail-button"
                            onclick="bukaMateri('materi3')"
                        >
                            <i class="bi bi-arrow-right"></i>
                        </button>

                    </div>

                </div>

            </article>


            <!-- CARD 4 -->

            <article class="education-card">

                <div class="card-top">

                    <span class="card-number">
                        04 / MEKANISME
                    </span>

                    <div class="card-icon">
                        <i class="bi bi-arrow-left-right"></i>
                    </div>

                </div>


                <div class="card-body">

                    <h3>
                        Cara Kerja Trading
                    </h3>

                    <p>
                        Pelajari gambaran umum proses trading mulai
                        dari membaca harga, menentukan posisi,
                        hingga menutup transaksi.
                    </p>


                    <div class="card-footer">

                        <span>
                            Pahami mekanismenya
                        </span>

                        <button
                            class="detail-button"
                            onclick="bukaMateri('materi4')"
                        >
                            <i class="bi bi-arrow-right"></i>
                        </button>

                    </div>

                </div>

            </article>


            <!-- CARD 5 -->

            <article class="education-card">

                <div class="card-top">

                    <span class="card-number">
                        05 / PRODUK
                    </span>

                    <div class="card-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>

                </div>


                <div class="card-body">

                    <h3>
                        Mengenal Produk
                    </h3>

                    <p>
                        Kenali jenis produk perdagangan yang tersedia
                        serta karakteristik masing-masing instrumen
                        sebelum melakukan transaksi.
                    </p>


                    <div class="card-footer">

                        <span>
                            Kenali produknya
                        </span>

                        <button
                            class="detail-button"
                            onclick="bukaMateri('materi5')"
                        >
                            <i class="bi bi-arrow-right"></i>
                        </button>

                    </div>

                </div>

            </article>


            <!-- CARD 6 -->

            <article class="education-card">

                <div class="card-top">

                    <span class="card-number">
                        06 / RISIKO
                    </span>

                    <div class="card-icon">
                        <i class="bi bi-shield-exclamation"></i>
                    </div>

                </div>


                <div class="card-body">

                    <h3>
                        Risiko & Hal yang Perlu Diperhatikan
                    </h3>

                    <p>
                        Pahami risiko perdagangan dan hal-hal penting
                        yang perlu diperhatikan sebelum mengambil
                        keputusan dalam aktivitas trading.
                    </p>


                    <div class="card-footer">

                        <span>
                            Pahami risikonya
                        </span>

                        <button
                            class="detail-button"
                            onclick="bukaMateri('materi6')"
                        >
                            <i class="bi bi-arrow-right"></i>
                        </button>

                    </div>

                </div>

            </article>

        </div>


        <!-- =================================================
             DETAIL 1
        ================================================= -->

        <div id="materi1" class="detail-panel">

            <div class="detail-head">

                <h3>
                    <i class="bi bi-grid-1x2-fill text-success me-2"></i>
                    Fasilitas & Layanan
                </h3>

                <button
                    class="close-detail"
                    onclick="tutupMateri()"
                >
                    ×
                </button>

            </div>


            <p>
                Fasilitas dan layanan disediakan untuk membantu nasabah
                dalam memperoleh informasi, melakukan aktivitas perdagangan,
                serta mendapatkan dukungan selama menggunakan layanan
                perusahaan.
            </p>

        </div>


        <!-- =================================================
             DETAIL 2
        ================================================= -->

        <div id="materi2" class="detail-panel">

            <div class="detail-head">

                <h3>
                    <i class="bi bi-graph-up-arrow text-success me-2"></i>
                    Apa Itu Trading?
                </h3>

                <button
                    class="close-detail"
                    onclick="tutupMateri()"
                >
                    ×
                </button>

            </div>


            <p>
                Trading adalah aktivitas melakukan transaksi untuk
                memperoleh peluang dari perubahan harga suatu instrumen.
                Dalam perdagangan berjangka, transaksi dilakukan
                berdasarkan kontrak yang memiliki karakteristik dan
                ketentuan tertentu.
            </p>

        </div>


        <!-- =================================================
             DETAIL 3
        ================================================= -->

        <div id="materi3" class="detail-panel">

            <div class="detail-head">

                <h3>
                    <i class="bi bi-book-half text-success me-2"></i>
                    Pengenalan Perdagangan Berjangka
                </h3>

                <button
                    class="close-detail"
                    onclick="tutupMateri()"
                >
                    ×
                </button>

            </div>


            <p>
                Perdagangan berjangka merupakan kegiatan jual beli
                kontrak berjangka atas komoditas atau instrumen tertentu
                melalui mekanisme perdagangan yang telah diatur.
                Nasabah perlu memahami karakteristik kontrak dan
                ketentuan transaksi sebelum berpartisipasi.
            </p>

        </div>


        <!-- =================================================
             DETAIL 4
        ================================================= -->

        <div id="materi4" class="detail-panel">

            <div class="detail-head">

                <h3>
                    <i class="bi bi-arrow-left-right text-success me-2"></i>
                    Cara Kerja Trading
                </h3>

                <button
                    class="close-detail"
                    onclick="tutupMateri()"
                >
                    ×
                </button>

            </div>


            <p>
                Secara umum, aktivitas trading melibatkan pengamatan
                kondisi pasar, penentuan transaksi, pembukaan posisi,
                pemantauan pergerakan harga, hingga penutupan posisi.
                Setiap keputusan perlu mempertimbangkan kondisi pasar
                dan risiko yang mungkin terjadi.
            </p>

        </div>


        <!-- =================================================
             DETAIL 5
        ================================================= -->

        <div id="materi5" class="detail-panel">

            <div class="detail-head">

                <h3>
                    <i class="bi bi-box-seam text-success me-2"></i>
                    Mengenal Produk
                </h3>

                <button
                    class="close-detail"
                    onclick="tutupMateri()"
                >
                    ×
                </button>

            </div>


            <p>
                Produk perdagangan memiliki karakteristik yang berbeda,
                mulai dari aset yang menjadi dasar kontrak, ukuran kontrak,
                hingga mekanisme perdagangannya. Pastikan memahami
                karakteristik produk sebelum melakukan transaksi.
            </p>

        </div>


        <!-- =================================================
             DETAIL 6
        ================================================= -->

        <div id="materi6" class="detail-panel">

            <div class="detail-head">

                <h3>
                    <i class="bi bi-shield-exclamation text-success me-2"></i>
                    Risiko & Hal yang Perlu Diperhatikan
                </h3>

                <button
                    class="close-detail"
                    onclick="tutupMateri()"
                >
                    ×
                </button>

            </div>


            <p>
                Perdagangan berjangka memiliki risiko yang perlu dipahami
                sebelum melakukan transaksi. Nasabah perlu memperhatikan
                kondisi pasar, memahami ketentuan produk, menggunakan dana
                secara bijak, dan tidak mengambil keputusan berdasarkan
                informasi yang belum dipahami dengan baik.
            </p>

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

            target.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });

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