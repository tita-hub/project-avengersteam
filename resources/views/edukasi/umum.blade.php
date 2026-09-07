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
        --bg: #f7f9f7;

        padding: 28px 32px 50px;
        background: var(--bg);
        min-height: calc(100vh - 70px);
        color: var(--text);
    }

    /* =========================
       HERO
    ========================= */

    .edu-hero {
        position: relative;
        overflow: hidden;
        background: linear-gradient(
            120deg,
            #124f39 0%,
            #176b4d 60%,
            #23805d 100%
        );
        border-radius: 24px;
        padding: 38px 42px;
        color: white;
        margin-bottom: 27px;
        box-shadow: 0 12px 30px rgba(23,107,77,.15);
    }

    .edu-hero::before {
        content: "";
        position: absolute;
        width: 240px;
        height: 240px;
        border: 45px solid rgba(255,255,255,.06);
        border-radius: 50%;
        right: -65px;
        top: -100px;
    }

    .edu-hero::after {
        content: "";
        position: absolute;
        width: 130px;
        height: 130px;
        border: 25px solid rgba(181,43,47,.18);
        border-radius: 50%;
        right: 150px;
        bottom: -85px;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 25px;
    }

    .hero-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 7px 13px;
        border-radius: 50px;
        background: rgba(255,255,255,.12);
        border: 1px solid rgba(255,255,255,.12);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .4px;
        margin-bottom: 14px;
    }

    .hero-title {
        margin: 0 0 12px;
        font-size: clamp(29px,4vw,43px);
        line-height: 1.1;
        font-weight: 800;
        letter-spacing: -.8px;
    }

    .hero-description {
        max-width: 700px;
        margin: 0;
        color: rgba(255,255,255,.82);
        font-size: 14px;
        line-height: 1.75;
    }

    .hero-icon {
        width: 110px;
        height: 110px;
        min-width: 110px;
        border-radius: 28px;
        background: rgba(255,255,255,.11);
        border: 1px solid rgba(255,255,255,.18);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 45px;
        animation: floating 4s ease-in-out infinite;
    }

    @keyframes floating {
        0%,100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-7px);
        }
    }

    /* =========================
       INTRO
    ========================= */

    .intro-strip {
        display: flex;
        align-items: center;
        gap: 16px;
        background: white;
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

    /* =========================
       SECTION
    ========================= */

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

    /* =========================
       CARDS
    ========================= */

    .general-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0,1fr));
        gap: 17px;
    }

    .general-card {
        position: relative;
        background: white;
        border: 1px solid var(--line);
        border-radius: 18px;
        overflow: hidden;
        transition: .3s ease;
    }

    .general-card:hover {
        transform: translateY(-5px);
        border-color: #cbd9d0;
        box-shadow: 0 13px 28px rgba(30,50,40,.08);
    }

    .general-card::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 4px;
        height: 100%;
        background: var(--green);
    }

    .general-card:nth-child(2)::before {
        background: var(--red);
    }

    .card-visual {
        height: 115px;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--green-soft);
        overflow: hidden;
    }

    .general-card:nth-child(2) .card-visual {
        background: var(--red-soft);
    }

    .card-visual::before {
        content: "";
        position: absolute;
        width: 125px;
        height: 125px;
        border: 25px solid rgba(23,107,77,.06);
        border-radius: 50%;
        right: -35px;
        top: -55px;
    }

    .general-card:nth-child(2) .card-visual::before {
        border-color: rgba(181,43,47,.06);
    }

    .visual-icon {
        position: relative;
        z-index: 2;
        width: 58px;
        height: 58px;
        border-radius: 17px;
        background: white;
        color: var(--green);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 27px;
        box-shadow: 0 7px 18px rgba(20,60,40,.08);
    }

    .general-card:nth-child(2) .visual-icon {
        color: var(--red);
    }

    .card-body {
        padding: 17px 18px 19px;
    }

    .card-number {
        display: block;
        color: var(--red);
        font-size: 10px;
        font-weight: 800;
        letter-spacing: 1px;
        margin-bottom: 5px;
    }

    .card-body h3 {
        margin: 0 0 7px;
        font-size: 17px;
        font-weight: 750;
    }

    .card-body p {
        margin: 0;
        color: var(--muted);
        font-size: 12.5px;
        line-height: 1.65;
    }

    .card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
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
        width: 31px;
        height: 31px;
        border: 0;
        border-radius: 9px;
        background: var(--green);
        color: white;
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

    /* =========================
       DETAIL
    ========================= */

    .detail-panel {
        display: none;
        margin-top: 18px;
        background: white;
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

    /* =========================
       RESPONSIVE
    ========================= */

    @media(max-width: 950px) {

        .edu-page {
            padding: 22px 20px 40px;
        }

        .general-grid {
            grid-template-columns: repeat(2,minmax(0,1fr));
        }
    }

    @media(max-width: 650px) {

        .edu-page {
            padding: 16px 14px 35px;
        }

        .edu-hero {
            padding: 27px 23px;
            border-radius: 20px;
        }

        .hero-icon {
            display: none;
        }

        .hero-title {
            font-size: 29px;
        }

        .general-grid {
            grid-template-columns: 1fr;
        }

        .intro-strip {
            align-items: flex-start;
        }
    }
</style>

<div class="edu-page">

```
{{-- =========================
     HERO
========================= --}}

<section class="edu-hero">

    <div class="hero-content">

        <div>

            <div class="hero-label">
                <i class="bi bi-globe2"></i>
                INFORMASI & KEGIATAN UMUM
            </div>

            <h1 class="hero-title">
                Edukasi Umum
            </h1>

            <p class="hero-description">
                Mengenal berbagai kegiatan, program, dan wawasan umum
                yang menjadi bagian dari aktivitas perusahaan,
                mulai dari program magang hingga kegiatan sosial.
            </p>

        </div>

        <div class="hero-icon">
            <i class="bi bi-people-fill"></i>
        </div>

    </div>

</section>


{{-- =========================
     INTRO
========================= --}}

<div class="intro-strip">

    <div class="intro-icon">
        <i class="bi bi-stars"></i>
    </div>

    <div>

        <strong>
            Belajar tidak hanya tentang teori
        </strong>

        <span>
            Kenali kegiatan perusahaan, kontribusi sosial,
            serta wawasan umum yang dapat memberikan pengalaman
            dan pengetahuan lebih luas.
        </span>

    </div>

</div>


{{-- =========================
     MATERI UMUM
========================= --}}

<section>

    <div class="section-marker"></div>

    <h2 class="section-title">
        Informasi & Kegiatan
    </h2>

    <p class="section-subtitle">
        Jelajahi berbagai program dan pengetahuan umum yang tersedia.
    </p>


    <div class="general-grid">

        {{-- =====================
             MAGANG
        ====================== --}}

        <article class="general-card">

            <div class="card-visual">

                <div class="visual-icon">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>

            </div>

            <div class="card-body">

                <span class="card-number">
                    01 / PROGRAM
                </span>

                <h3>
                    Magang
                </h3>

                <p>
                    Mengenal program magang sebagai kesempatan untuk
                    mendapatkan pengalaman kerja, mengembangkan
                    kemampuan, dan mengenal lingkungan profesional
                    secara langsung.
                </p>

                <div class="card-footer">

                    <span>
                        Program pembelajaran
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


        {{-- =====================
             PANTI ASUHAN
        ====================== --}}

        <article class="general-card">

            <div class="card-visual">

                <div class="visual-icon">
                    <i class="bi bi-heart-fill"></i>
                </div>

            </div>

            <div class="card-body">

                <span class="card-number">
                    02 / SOSIAL
                </span>

                <h3>
                    Kegiatan
                </h3>

                <p>
                    Mengenal kegiatan sosial dan kepedulian perusahaan
                    melalui berbagai aktivitas bersama panti asuhan
                    sebagai bentuk kontribusi kepada masyarakat.
                </p>

                <div class="card-footer">

                    <span>
                        Kegiatan sosial
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


        {{-- =====================
             TEORI UMUM
        ====================== --}}

        <article class="general-card">

            <div class="card-visual">

                <div class="visual-icon">
                    <i class="bi bi-book-half"></i>
                </div>

            </div>

            <div class="card-body">

                <span class="card-number">
                    03 / WAWASAN
                </span>

                <h3>
                    Teori Umum
                </h3>

                <p>
                    Berbagai pengetahuan umum mengenai dunia kerja,
                    perusahaan, keuangan, investasi, dan hal-hal
                    dasar yang dapat menambah wawasan.
                </p>

                <div class="card-footer">

                    <span>
                        Tambah wawasan
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

    </div>


    {{-- =========================
         DETAIL MAGANG
    ========================= --}}

    <div id="materi1" class="detail-panel">

        <div class="detail-head">

            <h3>
                <i class="bi bi-mortarboard-fill text-success me-2"></i>
                Program Magang
            </h3>

            <button
                class="close-detail"
                onclick="tutupMateri()"
            >
                ×
            </button>

        </div>

        <p>
            Program magang memberikan kesempatan kepada peserta
            untuk mengenal lingkungan kerja secara langsung,
            memahami budaya kerja, mengembangkan keterampilan,
            serta mendapatkan pengalaman yang dapat menjadi bekal
            untuk memasuki dunia profesional.
        </p>

    </div>


    {{-- =========================
         DETAIL PANTI ASUHAN
    ========================= --}}

    <div id="materi2" class="detail-panel">

        <div class="detail-head">

            <h3>
                <i class="bi bi-heart-fill text-danger me-2"></i>
                Kegiatan Panti Asuhan
            </h3>

            <button
                class="close-detail"
                onclick="tutupMateri()"
            >
                ×
            </button>

        </div>

        <p>
            Kegiatan bersama panti asuhan merupakan salah satu bentuk
            kepedulian sosial perusahaan kepada masyarakat. Kegiatan
            dapat berupa kunjungan, berbagi bantuan, maupun aktivitas
            bersama yang bertujuan memberikan manfaat dan membangun
            kepedulian terhadap sesama.
        </p>

    </div>


    {{-- =========================
         DETAIL TEORI UMUM
    ========================= --}}

    <div id="materi3" class="detail-panel">

        <div class="detail-head">

            <h3>
                <i class="bi bi-book-half text-success me-2"></i>
                Teori Umum
            </h3>

            <button
                class="close-detail"
                onclick="tutupMateri()"
            >
                ×
            </button>

        </div>

        <p>
            Teori umum berisi berbagai pengetahuan dasar yang dapat
            membantu memahami dunia kerja dan lingkungan perusahaan.
            Materi dapat mencakup pengenalan perusahaan, dunia
            keuangan, investasi, perdagangan, komunikasi profesional,
            serta wawasan lain yang relevan.
        </p>

    </div>

</section>
```

</div>

<script>

    function bukaMateri(id) {

        document
            .querySelectorAll('.detail-panel')
            .forEach(panel => {
                panel.classList.remove('active');
            });

        const target = document.getElementById(id);

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
