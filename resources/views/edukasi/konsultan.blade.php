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

    /* HERO */
    .edu-hero {
        position: relative;
        overflow: hidden;
        background: linear-gradient(120deg, #124f39 0%, #176b4d 60%, #23805d 100%);
        border-radius: 24px;
        padding: 38px 42px;
        color: white;
        margin-bottom: 28px;
        box-shadow: 0 12px 30px rgba(23, 107, 77, .15);
    }

    .edu-hero::before {
        content: "";
        position: absolute;
        width: 230px;
        height: 230px;
        border: 45px solid rgba(255,255,255,.06);
        border-radius: 50%;
        right: -65px;
        top: -90px;
    }

    .edu-hero::after {
        content: "";
        position: absolute;
        width: 140px;
        height: 140px;
        border: 28px solid rgba(181,43,47,.20);
        border-radius: 50%;
        right: 120px;
        bottom: -90px;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 30px;
    }

    .hero-text {
        max-width: 720px;
    }

    .hero-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 7px 13px;
        border-radius: 50px;
        background: rgba(255,255,255,.12);
        border: 1px solid rgba(255,255,255,.15);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .5px;
        margin-bottom: 14px;
    }

    .hero-label i {
        color: #d9f3e5;
    }

    .hero-title {
        font-size: clamp(28px, 4vw, 43px);
        line-height: 1.1;
        font-weight: 800;
        margin: 0 0 12px;
        letter-spacing: -.8px;
    }

    .hero-description {
        margin: 0;
        color: rgba(255,255,255,.82);
        font-size: 14px;
        line-height: 1.75;
        max-width: 650px;
    }

    .hero-icon {
        flex: 0 0 115px;
        width: 115px;
        height: 115px;
        border-radius: 28px;
        background: rgba(255,255,255,.11);
        border: 1px solid rgba(255,255,255,.18);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 48px;
        backdrop-filter: blur(8px);
        transform: rotate(3deg);
        animation: floating 4s ease-in-out infinite;
    }

    @keyframes floating {
        0%,100% { transform: translateY(0) rotate(3deg); }
        50% { transform: translateY(-7px) rotate(3deg); }
    }

    /* SECTION */
    .edu-section {
        margin-bottom: 30px;
    }

    .section-heading {
        display: flex;
        justify-content: space-between;
        align-items: end;
        gap: 20px;
        margin-bottom: 16px;
    }

    .section-title {
        margin: 0;
        font-size: 21px;
        font-weight: 800;
        letter-spacing: -.3px;
    }

    .section-subtitle {
        margin: 4px 0 0;
        color: var(--muted);
        font-size: 13px;
    }

    .section-marker {
        width: 42px;
        height: 4px;
        border-radius: 20px;
        background: linear-gradient(90deg, var(--red), var(--green));
        margin-bottom: 10px;
    }

    /* ACCESS */
    .access-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
    }

    .access-card {
        position: relative;
        display: flex;
        align-items: center;
        gap: 17px;
        padding: 20px;
        background: white;
        border: 1px solid var(--line);
        border-radius: 18px;
        text-decoration: none;
        color: var(--text);
        transition: .3s ease;
        overflow: hidden;
    }

    .access-card::before {
        content: "";
        position: absolute;
        width: 5px;
        height: 100%;
        left: 0;
        top: 0;
        background: var(--green);
    }

    .access-card:nth-child(2)::before {
        background: var(--red);
    }

    .access-card:hover {
        transform: translateY(-4px);
        border-color: #cbd9d0;
        box-shadow: 0 12px 25px rgba(30,50,40,.08);
        color: var(--text);
    }

    .access-icon {
        width: 50px;
        height: 50px;
        min-width: 50px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--green-soft);
        color: var(--green);
        font-size: 22px;
    }

    .access-card:nth-child(2) .access-icon {
        background: var(--red-soft);
        color: var(--red);
    }

    .access-info {
        flex: 1;
    }

    .access-info small {
        display: block;
        color: var(--muted);
        font-size: 11px;
        margin-bottom: 3px;
        font-weight: 600;
    }

    .access-info strong {
        display: block;
        font-size: 15px;
        margin-bottom: 3px;
    }

    .access-info span {
        color: var(--muted);
        font-size: 12px;
    }

    .access-arrow {
        color: #a2aaa5;
        font-size: 18px;
        transition: .3s;
    }

    .access-card:hover .access-arrow {
        color: var(--green);
        transform: translateX(4px);
    }

    /* MATERIAL */
    .material-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 17px;
    }

    .material-card {
        background: white;
        border: 1px solid var(--line);
        border-radius: 18px;
        overflow: hidden;
        transition: .3s ease;
    }

    .material-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 13px 28px rgba(30,50,40,.08);
        border-color: #ccd9d1;
    }

    .material-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 17px 18px 10px;
    }

    .material-number {
        font-size: 11px;
        font-weight: 800;
        color: var(--red);
        letter-spacing: 1px;
    }

    .material-icon {
        width: 43px;
        height: 43px;
        border-radius: 13px;
        background: var(--green-soft);
        color: var(--green);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
    }

    .material-body {
        padding: 4px 18px 18px;
    }

    .material-body h3 {
        font-size: 16px;
        margin: 0 0 7px;
        font-weight: 750;
    }

    .material-body p {
        color: var(--muted);
        font-size: 12.5px;
        line-height: 1.65;
        margin: 0 0 15px;
    }

    .material-button {
        width: 100%;
        border: 0;
        border-radius: 10px;
        padding: 10px 13px;
        background: var(--green);
        color: white;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: .25s;
    }

    .material-button:hover {
        background: var(--green-dark);
    }

    /* DETAIL */
    .detail-panel {
        display: none;
        margin-top: 18px;
        padding: 23px;
        background: white;
        border: 1px solid var(--line);
        border-radius: 18px;
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
        gap: 15px;
        align-items: center;
        margin-bottom: 12px;
    }

    .detail-head h3 {
        margin: 0;
        font-size: 17px;
    }

    .close-detail {
        border: 0;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #f2f4f2;
        cursor: pointer;
        color: #666;
    }

    .detail-panel p {
        color: var(--muted);
        font-size: 13px;
        line-height: 1.75;
        margin: 0;
    }

    /* RESPONSIVE */
    @media(max-width: 900px) {
        .edu-page {
            padding: 22px 20px 40px;
        }

        .hero-icon {
            width: 90px;
            height: 90px;
            flex-basis: 90px;
            font-size: 38px;
        }

        .material-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
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

        .hero-content {
            align-items: flex-start;
        }

        .hero-icon {
            display: none;
        }

        .hero-title {
            font-size: 29px;
        }

        .access-grid,
        .material-grid {
            grid-template-columns: 1fr;
        }

        .section-heading {
            display: block;
        }
    }
</style>

<div class="edu-page">

```
<section class="edu-hero">
    <div class="hero-content">
        <div class="hero-text">
            <div class="hero-label">
                <i class="bi bi-mortarboard-fill"></i>
                PUSAT PEMBELAJARAN
            </div>

            <h1 class="hero-title">Edukasi Konsultan</h1>

            <p class="hero-description">
                Ruang pembelajaran untuk membantu konsultan meningkatkan
                kemampuan komunikasi, analisis pasar, serta memahami
                etika dan kepatuhan dalam menjalankan aktivitas profesional.
            </p>
        </div>

        <div class="hero-icon">
            <i class="bi bi-person-workspace"></i>
        </div>
    </div>
</section>

<section class="edu-section">
    <div class="section-heading">
        <div>
            <div class="section-marker"></div>
            <h2 class="section-title">Akses Konsultan</h2>
            <p class="section-subtitle">
                Akses cepat ke sistem pendukung aktivitas konsultan.
            </p>
        </div>
    </div>

    <div class="access-grid">

        <a href="https://www.rf-berjangkasemarang.com/login"
           target="_blank"
           class="access-card">

            <div class="access-icon">
                <i class="bi bi-calendar-check"></i>
            </div>

            <div class="access-info">
                <small>SISTEM KONSULTAN</small>
                <strong>Input Appointment</strong>
                <span>Request mobil untuk kebutuhan appointment.</span>
            </div>

            <i class="bi bi-arrow-up-right access-arrow"></i>
        </a>

        <a href="https://performance-rfbsmg.com/"
           target="_blank"
           class="access-card">

            <div class="access-icon">
                <i class="bi bi-graph-up-arrow"></i>
            </div>

            <div class="access-info">
                <small>PERFORMANCE SYSTEM</small>
                <strong>Input Report Kinerja Harian</strong>
                <span>Catat dan pantau aktivitas kinerja harian.</span>
            </div>

            <i class="bi bi-arrow-up-right access-arrow"></i>
        </a>

    </div>
</section>

<section class="edu-section">

    <div class="section-heading">
        <div>
            <div class="section-marker"></div>
            <h2 class="section-title">Materi Edukasi</h2>
            <p class="section-subtitle">
                Pelajari materi yang mendukung profesionalisme konsultan.
            </p>
        </div>
    </div>

    <div class="material-grid">

        <article class="material-card">
            <div class="material-top">
                <span class="material-number">01 / MATERI</span>
                <div class="material-icon">
                    <i class="bi bi-chat-dots"></i>
                </div>
            </div>

            <div class="material-body">
                <h3>Komunikasi dengan Nasabah</h3>
                <p>
                    Pelajari cara membangun komunikasi yang jelas,
                    profesional, dan berorientasi pada kebutuhan nasabah.
                </p>

                <button class="material-button"
                        onclick="bukaMateri('materi1')">
                    Baca Materi
                    <i class="bi bi-arrow-right ms-1"></i>
                </button>
            </div>
        </article>

        <article class="material-card">
            <div class="material-top">
                <span class="material-number">02 / MATERI</span>
                <div class="material-icon">
                    <i class="bi bi-bar-chart-line"></i>
                </div>
            </div>

            <div class="material-body">
                <h3>Analisis Pasar</h3>
                <p>
                    Kenali dasar analisis pasar dan cara membaca kondisi
                    pasar sebagai bagian dari proses pengambilan keputusan.
                </p>

                <button class="material-button"
                        onclick="bukaMateri('materi2')">
                    Baca Materi
                    <i class="bi bi-arrow-right ms-1"></i>
                </button>
            </div>
        </article>

        <article class="material-card">
            <div class="material-top">
                <span class="material-number">03 / MATERI</span>
                <div class="material-icon">
                    <i class="bi bi-shield-check"></i>
                </div>
            </div>

            <div class="material-body">
                <h3>Etika & Kepatuhan</h3>
                <p>
                    Pahami pentingnya etika kerja, kepatuhan terhadap
                    ketentuan, dan menjaga profesionalisme dalam bekerja.
                </p>

                <button class="material-button"
                        onclick="bukaMateri('materi3')">
                    Baca Materi
                    <i class="bi bi-arrow-right ms-1"></i>
                </button>
            </div>
        </article>

    </div>

    <div id="materi1" class="detail-panel">
        <div class="detail-head">
            <h3><i class="bi bi-chat-dots text-success me-2"></i>Komunikasi dengan Nasabah</h3>
            <button class="close-detail" onclick="tutupMateri()">×</button>
        </div>
        <p>
            Komunikasi yang baik dimulai dengan mendengarkan kebutuhan
            nasabah, menyampaikan informasi secara jelas, menggunakan
            bahasa yang mudah dipahami, serta menjaga sikap profesional
            dalam setiap interaksi.
        </p>
    </div>

    <div id="materi2" class="detail-panel">
        <div class="detail-head">
            <h3><i class="bi bi-bar-chart-line text-success me-2"></i>Analisis Pasar</h3>
            <button class="close-detail" onclick="tutupMateri()">×</button>
        </div>
        <p>
            Analisis pasar membantu konsultan memahami pergerakan harga,
            kondisi ekonomi, sentimen pasar, serta berbagai faktor yang
            dapat memengaruhi aktivitas perdagangan.
        </p>
    </div>

    <div id="materi3" class="detail-panel">
        <div class="detail-head">
            <h3><i class="bi bi-shield-check text-success me-2"></i>Etika & Kepatuhan</h3>
            <button class="close-detail" onclick="tutupMateri()">×</button>
        </div>
        <p>
            Etika dan kepatuhan merupakan bagian penting dalam aktivitas
            konsultan. Setiap informasi harus disampaikan secara
            bertanggung jawab dan sesuai dengan ketentuan yang berlaku.
        </p>
    </div>

</section>
```

</div>

<script>
    function bukaMateri(id) {
        document.querySelectorAll('.detail-panel').forEach(panel => {
            panel.classList.remove('active');
        });

        const target = document.getElementById(id);

        if (target) {
            target.classList.add('active');
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });
        }
    }

    function tutupMateri() {
        document.querySelectorAll('.detail-panel').forEach(panel => {
            panel.classList.remove('active');
        });
    }
</script>

@endsection
 
\\