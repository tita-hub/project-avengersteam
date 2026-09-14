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

        box-shadow: 0 9px 22px rgba(23,107,77,.11);
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

    /* TEKS DIBUAT LEBIH KE ATAS DAN KE KIRI */
    .hero-text {
        max-width: 900px;

        margin-left: 50px !important;
        padding-top: 22px !important;
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

        line-height: 1.2;

        letter-spacing: .3px;
    }

    .hero-label i {
        color: #fff;
        font-size: 10px;
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

        grid-template-columns: repeat(2, minmax(0, 1fr));

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

        box-shadow: 0 14px 30px rgba(23,107,77,.10);
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

    .access-card h3 {
        margin: 0 0 7px;

        color: #202522;

        font-size: 18px;

        font-weight: 800;
    }

    .access-card p {
        margin: 0 0 17px;

        color: #6d756f;

        font-size: 12px;

        line-height: 1.7;
    }

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
    }

    .access-card:nth-child(2) .access-btn {
        background: #8d2634;
    }

    .access-card:nth-child(2) .access-btn:hover {
        background: #731f2b;
    }


    /* =====================================================
       MATERIAL
    ===================================================== */

    .material-grid {
        display: grid;

        grid-template-columns: repeat(3, minmax(0, 1fr));

        gap: 20px;
    }

    .material-card {
        position: relative;

        overflow: hidden;

        min-height: 250px;

        padding: 24px;

        background: #fff;

        border: 1px solid #e4e9e5;

        border-radius: 18px;

        transition:
            transform .3s ease,
            box-shadow .3s ease,
            border-color .3s ease;
    }

    .material-card:hover {
        transform: translateY(-6px);

        border-color: rgba(23,107,77,.25);

        box-shadow: 0 15px 32px rgba(23,107,77,.10);
    }

    .material-number {
        margin-bottom: 19px;

        color: #8d2634;

        font-size: 11px;

        font-weight: 800;

        letter-spacing: 1px;
    }

    .material-icon {
        position: absolute;

        top: 22px;
        right: 24px;

        width: 55px;
        height: 55px;

        display: flex;

        align-items: center;
        justify-content: center;

        border-radius: 16px;

        background: #eaf5ef;

        color: #176b4d;

        font-size: 22px;
    }

    .material-card:nth-child(2) .material-icon {
        background: #faeeee;
        color: #8d2634;
    }

    .material-card:nth-child(3) .material-icon {
        background: #eaf5ef;
        color: #176b4d;
    }

    .material-card h3 {
        margin: 0 0 9px;

        color: #202522;

        font-size: 19px;

        font-weight: 800;
    }

    .material-card p {
        margin: 0 0 20px;

        color: #6d756f;

        font-size: 12px;

        line-height: 1.7;
    }

    .material-btn {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        gap: 7px;

        width: 100%;

        padding: 10px 15px;

        border: 0;

        border-radius: 10px;

        background: #176b4d;

        color: #fff;

        font-size: 11px;

        font-weight: 700;

        cursor: pointer;

        transition: .3s ease;
    }

    .material-btn:hover {
        background: #124f39;

        transform: translateY(-2px);
    }


    /* =====================================================
       DETAIL PANEL
    ===================================================== */

    .detail-panel {
        display: none;

        margin-top: 25px;

        padding: 28px;

        background: #fff;

        border: 1px solid #e4e9e5;

        border-radius: 18px;

        animation: detailIn .35s ease;
    }

    .detail-panel.active {
        display: block;
    }

    @keyframes detailIn {
        from {
            opacity: 0;
            transform: translateY(12px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .detail-panel h3 {
        margin: 0 0 12px;

        color: #176b4d;

        font-size: 22px;

        font-weight: 800;
    }

    .detail-panel p {
        margin-bottom: 12px;

        color: #606963;

        font-size: 13px;

        line-height: 1.8;
    }

    .close-detail {
        display: inline-flex;

        align-items: center;

        gap: 6px;

        margin-top: 10px;

        padding: 8px 13px;

        border: 0;

        border-radius: 9px;

        background: #faeeee;

        color: #8d2634;

        font-size: 11px;

        font-weight: 700;

        cursor: pointer;
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

        .access-grid,
        .material-grid {
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

        .material-card,
        .access-card {
            padding: 20px;
        }
    }
</style>


<div class="edu-page">

    <!-- HERO -->
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


    <!-- AKSES KONSULTAN -->

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


    <!-- MATERI EDUKASI -->

    <section>

        <div class="section-heading">

            <div class="section-marker"></div>

            <h2>
                Materi Edukasi Konsultan
            </h2>

            <p>
                Materi pembelajaran untuk meningkatkan kemampuan profesional konsultan.
            </p>

        </div>


        <div class="material-grid">

            <!-- MATERI 1 -->

            <div class="material-card">

                <div class="material-number">
                    01 / KOMUNIKASI
                </div>

                <div class="material-icon">
                    <i class="bi bi-chat-dots-fill"></i>
                </div>

                <h3>
                    Komunikasi dengan Nasabah
                </h3>

                <p>
                    Mempelajari cara membangun komunikasi yang baik,
                    profesional, dan mudah dipahami ketika berinteraksi
                    dengan nasabah.
                </p>

                <button
                    type="button"
                    class="material-btn"
                    onclick="bukaMateri('materi1')"
                >
                    Baca Selengkapnya
                    <i class="bi bi-arrow-right"></i>
                </button>

            </div>


            <!-- MATERI 2 -->

            <div class="material-card">

                <div class="material-number">
                    02 / ANALISIS
                </div>

                <div class="material-icon">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>

                <h3>
                    Analisis Pasar
                </h3>

                <p>
                    Memahami dasar analisis pasar dan faktor yang dapat
                    memengaruhi pergerakan harga dalam perdagangan.
                </p>

                <button
                    type="button"
                    class="material-btn"
                    onclick="bukaMateri('materi2')"
                >
                    Baca Selengkapnya
                    <i class="bi bi-arrow-right"></i>
                </button>

            </div>


            <!-- MATERI 3 -->

            <div class="material-card">

                <div class="material-number">
                    03 / KEPATUHAN
                </div>

                <div class="material-icon">
                    <i class="bi bi-shield-check"></i>
                </div>

                <h3>
                    Etika & Kepatuhan
                </h3>

                <p>
                    Mengenal pentingnya etika, kepatuhan, dan tanggung jawab
                    dalam menjalankan aktivitas sebagai konsultan.
                </p>

                <button
                    type="button"
                    class="material-btn"
                    onclick="bukaMateri('materi3')"
                >
                    Baca Selengkapnya
                    <i class="bi bi-arrow-right"></i>
                </button>

            </div>

        </div>


        <!-- DETAIL MATERI 1 -->

        <div
            id="materi1"
            class="detail-panel"
        >

            <h3>
                Komunikasi dengan Nasabah
            </h3>

            <p>
                Komunikasi yang baik menjadi bagian penting dalam membangun
                hubungan profesional dengan nasabah. Konsultan perlu
                menyampaikan informasi dengan jelas, sopan, dan sesuai
                dengan ketentuan yang berlaku.
            </p>

            <p>
                Penyampaian informasi harus dilakukan secara transparan
                sehingga nasabah dapat memahami informasi yang diberikan
                sebelum mengambil keputusan.
            </p>

            <button
                type="button"
                class="close-detail"
                onclick="tutupMateri()"
            >
                <i class="bi bi-x-lg"></i>
                Tutup
            </button>

        </div>


        <!-- DETAIL MATERI 2 -->

        <div
            id="materi2"
            class="detail-panel"
        >

            <h3>
                Analisis Pasar
            </h3>

            <p>
                Analisis pasar membantu konsultan memahami kondisi dan
                dinamika pasar. Beberapa informasi yang dapat diperhatikan
                antara lain pergerakan harga, berita ekonomi, serta kondisi
                pasar global.
            </p>

            <p>
                Pemahaman terhadap pasar perlu disertai dengan sikap
                objektif dan tidak memberikan jaminan terhadap hasil
                perdagangan.
            </p>

            <button
                type="button"
                class="close-detail"
                onclick="tutupMateri()"
            >
                <i class="bi bi-x-lg"></i>
                Tutup
            </button>

        </div>


        <!-- DETAIL MATERI 3 -->

        <div
            id="materi3"
            class="detail-panel"
        >

            <h3>
                Etika & Kepatuhan
            </h3>

            <p>
                Konsultan perlu menjalankan aktivitas secara profesional,
                transparan, dan sesuai dengan ketentuan perusahaan serta
                regulasi yang berlaku.
            </p>

            <p>
                Etika dan kepatuhan menjadi dasar penting dalam menjaga
                kepercayaan serta hubungan profesional dengan nasabah.
            </p>

            <button
                type="button"
                class="close-detail"
                onclick="tutupMateri()"
            >
                <i class="bi bi-x-lg"></i>
                Tutup
            </button>

        </div>

    </section>

</div>


<script>

    function bukaMateri(id) {

        document.querySelectorAll('.detail-panel').forEach(function(panel) {
            panel.classList.remove('active');
        });

        const target = document.getElementById(id);

        if (target) {

            target.classList.add('active');

            setTimeout(function() {

                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'nearest'
                });

            }, 50);
        }
    }


    function tutupMateri() {

        document.querySelectorAll('.detail-panel').forEach(function(panel) {
            panel.classList.remove('active');
        });
    }

</script>

@endsection