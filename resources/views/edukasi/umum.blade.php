@extends('layouts.app')

@section('content')

<style>
    /* =========================================================
       EDUKASI UMUM
    ========================================================= */

    .edu-page {
        font-family: Arial, Helvetica, sans-serif;

        --green: #176b4d;
        --green-dark: #124f39;
        --green-light: #23805d;
        --green-soft: #eaf5ef;

        --red: #8d2634;
        --red-dark: #721d29;
        --red-soft: #faeeee;

        --text: #252525;
        --muted: #6f7672;
        --line: #e2e7e4;
        --white: #fff;

        color: var(--text);
        background: transparent;
        padding-bottom: 80px;
    }
    .edu-page *,
    .edu-page *::before,
    .edu-page *::after {
        box-sizing: border-box;
    }

    .edu-page button,
    .edu-page input,
    .edu-page textarea,
    .edu-page select {
        font-family: Arial, Helvetica, sans-serif;
    }

    /* =========================================================
       FONT PROGRAM MAGANG
       Semua teks menggunakan sans-serif.
       Icon Bootstrap tetap memakai font icon bawaannya.
    ========================================================= */

    .magang-hero,
    .magang-hero h2,
    .magang-hero p,
    .magang-section,
    .magang-section h3,
    .magang-section p,
    .magang-section h4,
    .magang-section small,
    .magang-section li,
    .magang-cta,
    .magang-cta h3,
    .magang-cta p,
    .faq-list,
    .faq-question,
    .faq-answer {
        font-family: Arial, Helvetica, sans-serif;
    }


    /* ============================================================
    CONTAINER
    STYLE MENGIKUTI EDUKASI NASABAH
    ============================================================ */

    .edu-container {
        width: 100%;
        max-width: 1440px;
        margin: 0 auto;
    }


    /* ============================================================
    HERO
    STYLE MENGIKUTI EDUKASI NASABAH
    ============================================================ */

    .edu-hero {
        position: relative;
        overflow: hidden;

        width: 100%;
        min-height: 213px;

        padding: 28px 54px;

        border-radius: 25px;

        display: flex;
        align-items: center;

        color: #fff;

        background:
            linear-gradient(
                120deg,
                #124f39 0%,
                #176b4d 60%,
                #23805d 100%
            );

        box-shadow:
            0 9px 22px rgba(23, 107, 77, .11);

        margin-bottom: 31px;
    }


    /* Lingkaran dekorasi kanan */

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


    /* Lingkaran merah */

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


    /* ============================================================
    ISI HERO
    ============================================================ */

    .edu-hero-content {
        position: relative;
        z-index: 2;

        max-width: 900px;
    }


    /* Label kecil */

    .edu-eyebrow {
        display: inline-flex;

        align-items: center;

        padding: 5px 11px;

        margin-bottom: 9px;

        border-radius: 50px;

        background: rgba(255,255,255,.12);

        border: 1px solid rgba(255,255,255,.17);

        color: #fff;

        font-size: 10px;
        font-weight: 700;

        letter-spacing: .4px;
        text-transform: uppercase;
    }


    /* Judul */

    .edu-hero h1 {
        margin: 0 0 7px;

        color: #fff;

        font-family: Arial, Helvetica, sans-serif;

        font-size: 42px;

        line-height: 1.1;

        font-weight: 800;

        letter-spacing: -.7px;
    }


    /* Deskripsi */

    .edu-hero p {
        max-width: 900px;

        margin: 0;

        color: rgba(255,255,255,.84);

        font-size: 15px;

        line-height: 1.6;
    }

    /* =========================================================
       INTRO
    ========================================================= */

    .edu-intro {
        padding: 55px 0 35px;
    }

    .edu-intro-box {
        display: grid;
        grid-template-columns: 1fr auto;
        gap: 30px;
        align-items: center;
        padding: 30px 34px;
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 8px;
    }

    .edu-intro-box h2 {
        margin: 0 0 8px;
        color: var(--green-dark);
        font-size: 25px;
    }

    .edu-intro-box p {
        margin: 0;
        color: var(--muted);
        line-height: 1.75;
    }

    .edu-intro-number {
        width: 68px;
        height: 68px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: var(--green-soft);
        color: var(--green);
        font-size: 24px;
        font-weight: 800;
    }


    /* =========================================================
       HEADING
    ========================================================= */

    .section-heading {
        margin-bottom: 30px;
    }

    .section-heading small,
    .magang-section-title small {
        display: block;
        margin-bottom: 8px;
        color: var(--red);
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1.6px;
        text-transform: uppercase;
    }

    .section-heading h2 {
        margin: 0 0 10px;
        color: var(--green-dark);
        font-size: clamp(30px, 4vw, 42px);
        line-height: 1.15;
    }

    .section-heading p {
        max-width: 700px;
        margin: 0;
        color: var(--muted);
        line-height: 1.75;
    }


    /* =========================================================
       MATERI UTAMA
    ========================================================= */

    .materi-section {
        padding: 20px 0 70px;
    }

    .materi-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .materi-card {
        position: relative;
        min-height: 300px;
        padding: 30px;
        overflow: hidden;
        cursor: pointer;
        background: #fff;
        border: 1px solid var(--line);
        border-radius: 8px;
        transition: .25s ease;
    }

    .materi-card:hover {
        transform: translateY(-6px);
        border-color: rgba(23,107,77,.35);
        box-shadow: 0 18px 40px rgba(25,55,43,.10);
    }

    .materi-number {
        margin-bottom: 45px;
        color: var(--red);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 1.5px;
    }

    .materi-card h3 {
        margin: 0 0 12px;
        color: var(--green-dark);
        font-size: 25px;
    }

    .materi-card p {
        margin: 0;
        color: var(--muted);
        font-size: 14px;
        line-height: 1.7;
    }

    .materi-arrow {
        position: absolute;
        right: 25px;
        bottom: 24px;
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: var(--green-soft);
        color: var(--green);
        transition: .25s ease;
    }

    .materi-card:hover .materi-arrow {
        background: var(--green);
        color: #fff;
        transform: translateX(4px);
    }


    /* =========================================================
       DETAIL MATERI
    ========================================================= */

    .materi-detail {
        display: none;
        padding: 30px 0 80px;
        animation: detailFade .35s ease;
    }

    .materi-detail.active {
        display: block;
    }

    @keyframes detailFade {
        from {
            opacity: 0;
            transform: translateY(15px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .back-materi {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 25px;
        padding: 8px 0;
        border: 0;
        background: transparent;
        color: var(--green);
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
    }

    .back-materi:hover {
        color: var(--red);
    }


    /* =========================================================
       HERO MAGANG
    ========================================================= */

    .magang-hero {
        position: relative;
        overflow: hidden;
        margin-bottom: 65px;
        padding: 55px;
        border-radius: 10px;
        background: var(--green-dark);
        color: #fff;
    }

    .magang-hero::after {
        content: "";
        position: absolute;
        right: -120px;
        bottom: -180px;
        width: 350px;
        height: 350px;
        border: 70px solid rgba(255,255,255,.05);
        border-radius: 50%;
    }

    .magang-hero-content {
        position: relative;
        z-index: 2;
        max-width: 760px;
    }

    .magang-hero small {
        display: block;
        margin-bottom: 15px;
        color: #cce9dc;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    .magang-hero h2 {
        margin: 0 0 18px;
        font-size: clamp(32px, 5vw, 53px);
        line-height: 1.08;
    }

    .magang-hero p {
        max-width: 690px;
        margin: 0;
        color: rgba(255,255,255,.82);
        line-height: 1.8;
    }

    .magang-explore {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        margin-top: 28px;
        padding: 13px 21px;
        border: 0;
        border-radius: 5px;
        background: #fff;
        color: var(--green-dark);
        font-size: 14px;
        font-weight: 800;
        cursor: pointer;
        transition: .2s ease;
    }

    .magang-explore:hover {
        background: var(--red);
        color: #fff;
    }


    /* =========================================================
       SECTION MAGANG
    ========================================================= */

    .magang-section {
        margin-bottom: 75px;
    }

    .magang-section-title {
        max-width: 720px;
        margin-bottom: 28px;
    }

    .magang-section-title h3 {
        margin: 8px 0 10px;
        color: var(--green-dark);
        font-size: 32px;
    }

    .magang-section-title p {
        margin: 0;
        color: var(--muted);
        line-height: 1.75;
    }


    /* =========================================================
       MANFAAT
    ========================================================= */

    .benefit-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }

    .benefit-card {
        padding: 25px;
        border: 1px solid var(--line);
        border-radius: 7px;
        background: #fff;
    }

    .benefit-icon {
        width: 46px;
        height: 46px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 18px;
        border-radius: 5px;
        background: var(--green-soft);
        color: var(--green);
        font-size: 20px;
    }

    .benefit-card h4 {
        margin: 0 0 8px;
        color: var(--green-dark);
        font-size: 17px;
    }

    .benefit-card p {
        margin: 0;
        color: var(--muted);
        font-size: 13px;
        line-height: 1.7;
    }


    /* =========================================================
       JURUSAN + FOTO
    ========================================================= */

    .jurusan-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .jurusan-card {
        overflow: hidden;
        min-height: 420px;
        border: 1px solid var(--line);
        border-radius: 8px;
        background: #fff;
        transition: .25s ease;
    }

    .jurusan-image {
        width: 100%;
        height: 190px;
        overflow: hidden;
        background: #eaf5ef;
    }

    .jurusan-image img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
        transition: transform .4s ease;
    }

    .jurusan-card:hover .jurusan-image img {
        transform: scale(1.05);
    }

    .jurusan-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 38px rgba(25,55,43,.12);
        border-color: rgba(141,38,52,.25);
    }

    .jurusan-content {
        position: relative;
        padding: 28px 30px 30px;
    }

    .jurusan-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        margin-bottom: 14px;
        border-radius: 6px;
        background: var(--red);
        color: #fff;
        font-size: 15px;
        font-weight: 800;
    }

    .jurusan-content h4 {
        margin: 0 0 17px;
        color: var(--green-dark);
        font-size: 22px;
        font-weight: 800;
        line-height: 1.25;
        text-transform: uppercase;
    }

    .jurusan-list {
        margin: 0;
        padding-left: 20px;
        color: var(--text);
        font-size: 15px;
        line-height: 1.8;
    }

    .jurusan-list li {
        padding-left: 3px;
    }

    /* =========================================================
       KARTU JURUSAN - BISA DIKLIK
    ========================================================= */

    .jurusan-card {
        position: relative;
        cursor: pointer;
        text-align: left;
    }

    .jurusan-card:focus-visible {
        outline: 2px solid var(--red);
        outline-offset: 3px;
    }

    .jurusan-card .jurusan-arrow {
        position: absolute;
        right: 22px;
        bottom: 22px;
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: var(--red-soft);
        color: var(--red);
        font-size: 15px;
        transition: .2s ease;
    }

    .jurusan-card:hover .jurusan-arrow {
        background: var(--red);
        color: #fff;
        transform: translateX(3px);
    }

    .jurusan-detail {
        display: none;
        margin-top: 22px;
        padding: 28px 30px;
        border: 1px solid var(--line);
        border-radius: 8px;
        background: #fff;
        animation: jurusanDetailIn .25s ease;
    }

    .jurusan-detail.active {
        display: block;
    }

    .jurusan-detail-head {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 22px;
    }

    .jurusan-detail-head small {
        display: block;
        margin-bottom: 6px;
        color: var(--red);
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .jurusan-detail-head h4 {
        margin: 0;
        color: var(--green-dark);
        font-size: 25px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .jurusan-close {
        flex-shrink: 0;
        border: 1px solid var(--line);
        border-radius: 5px;
        background: #fff;
        color: var(--muted);
        padding: 9px 13px;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        font-family: Arial, Helvetica, sans-serif;
    }

    .jurusan-close:hover {
        border-color: var(--red);
        color: var(--red);
    }

    .jurusan-program-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
    }

    .jurusan-program-item {
        display: flex;
        align-items: center;
        gap: 10px;
        min-height: 54px;
        padding: 13px 15px;
        border: 1px solid var(--line);
        border-radius: 6px;
        background: var(--bg);
        color: var(--text);
        font-size: 14px;
        font-weight: 600;
    }

    .jurusan-program-item i {
        color: var(--red);
        font-size: 15px;
    }

    @keyframes jurusanDetailIn {
        from {
            opacity: 0;
            transform: translateY(-5px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }


    /* =========================================================
       PENGALAMAN MAGANG - FOTO SLIDER
    ========================================================= */

    .experience-slider {
        position: relative;
    }

    .experience-controls {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
        margin-bottom: 15px;
    }

    .experience-control {
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid var(--line);
        border-radius: 50%;
        background: #fff;
        color: var(--green-dark);
        cursor: pointer;
        transition: .2s ease;
    }

    .experience-control:hover {
        border-color: var(--green);
        background: var(--green);
        color: #fff;
    }

    .experience-track {
        display: flex;
        gap: 22px;
        overflow-x: auto;
        padding: 5px 3px 20px;
        scroll-behavior: smooth;
        scroll-snap-type: x mandatory;
        scrollbar-width: none;
    }

    .experience-track::-webkit-scrollbar {
        display: none;
    }

    .experience-card {
        flex: 0 0 calc(50% - 11px);
        min-width: 0;
        overflow: hidden;
        scroll-snap-align: start;
        border: 1px solid var(--line);
        border-radius: 10px;
        background: #fff;
    }

    .experience-card-image {
        width: 100%;
        height: 270px;
        overflow: hidden;
        background: #dfe7e2;
    }

    .experience-card-image img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
        transition: transform .4s ease;
    }

    .experience-card:hover .experience-card-image img {
        transform: scale(1.04);
    }

    .experience-card-content {
        padding: 28px;
    }

    .experience-card-content small {
        display: block;
        margin-bottom: 9px;
        color: var(--red);
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1.4px;
        text-transform: uppercase;
    }

    .experience-card-content h3 {
        margin: 0 0 12px;
        color: var(--green-dark);
        font-size: 24px;
        line-height: 1.25;
    }

    .experience-card-content p {
        margin: 0;
        color: var(--muted);
        font-size: 14px;
        line-height: 1.8;
    }

    .experience-quote {
        margin-top: 18px;
        padding: 14px 16px;
        border-left: 3px solid var(--red);
        border-radius: 0 5px 5px 0;
        background: var(--red-soft);
        color: #63323a;
        font-size: 13px;
        line-height: 1.7;
    }


    /* =========================================================
       FAQ
    ========================================================= */

    .faq-list {
        display: grid;
        gap: 10px;
    }

    .faq-item {
        overflow: hidden;
        border: 1px solid var(--line);
        border-radius: 6px;
        background: #fff;
    }

    .faq-question {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 19px 20px;
        border: 0;
        background: transparent;
        color: var(--green-dark);
        font-weight: 700;
        text-align: left;
        cursor: pointer;
    }

    .faq-question i {
        transition: transform .25s ease;
    }

    .faq-answer {
        display: none;
        padding: 0 20px 20px;
        color: var(--muted);
        font-size: 14px;
        line-height: 1.75;
    }

    .faq-item.open .faq-answer {
        display: block;
    }

    .faq-item.open .faq-question i {
        transform: rotate(180deg);
    }


    /* =========================================================
       CTA
    ========================================================= */

    .magang-cta {
        padding: 50px;
        border-radius: 10px;
        background: var(--red);
        color: #fff;
        text-align: center;
    }

    .magang-cta h3 {
        margin: 0 0 12px;
        font-size: 33px;
    }

    .magang-cta p {
        max-width: 650px;
        margin: auto;
        color: rgba(255,255,255,.83);
        line-height: 1.75;
    }

    .magang-cta-button {
        display: inline-flex;
        margin-top: 24px;
        padding: 13px 22px;
        border: 0;
        border-radius: 5px;
        background: #fff;
        color: var(--red);
        font-size: 14px;
        font-weight: 800;
        cursor: pointer;
    }

    /* =========================================================
    PENDAFTARAN MAGANG
    ========================================================= */

    .magang-cta-content {
        width: 100%;

        margin-top: 45px;
        padding: 50px 40px;

        border-radius: 18px;

        background: var(--red);

        color: #fff;

        text-align: center;
    }


    .magang-cta-label {
        display: block;

        margin-bottom: 12px;

        color: rgba(255, 255, 255, .85);

        font-size: 12px;
        font-weight: 700;

        letter-spacing: 2px;
    }


    .magang-cta-content h2 {
        margin: 0 0 14px;

        color: #fff;

        font-size: 32px;
        font-weight: 700;

        line-height: 1.3;
    }


    .magang-cta-content p {
        max-width: 680px;

        margin: 0 auto;

        color: rgba(255, 255, 255, .85);

        font-size: 15px;
        line-height: 1.75;
    }


    /* =========================================================
    TOMBOL
    ========================================================= */

    .magang-cta-buttons {
        display: flex;

        justify-content: center;
        align-items: center;

        gap: 12px;

        margin-top: 28px;

        flex-wrap: wrap;
    }


    .magang-cta-btn {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        gap: 8px;

        min-width: 130px;

        padding: 11px 20px;

        border-radius: 6px;

        font-size: 14px;
        font-weight: 700;

        text-decoration: none;

        transition:
            transform .2s ease,
            opacity .2s ease;
    }


    .magang-cta-btn:hover {
        transform: translateY(-2px);

        opacity: .9;

        text-decoration: none;
    }


    .magang-cta-btn.whatsapp,
    .magang-cta-btn.email {
        background: #fff;

        color: var(--red);
    }


    /* =========================================================
       KEGIATAN
    ========================================================= */

    .kegiatan-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .kegiatan-card {
        padding: 32px;
        border: 1px solid var(--line);
        border-radius: 8px;
        background: #fff;
    }

    .kegiatan-card .number {
        color: var(--red);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 1.3px;
    }

    .kegiatan-card h3 {
        margin: 10px 0;
        color: var(--green-dark);
        font-size: 24px;
    }

    .kegiatan-card p {
        margin: 0;
        color: var(--muted);
        line-height: 1.8;
    }


    /* ============================================================
    INTRO KEGIATAN SOSIAL
    ============================================================ */

    .kegiatan-intro {
        width: 100%;
        max-width: 850px;
        margin: 0 auto 45px;
        padding: 5px 20px 0;
        text-align: center;
    }

    .kegiatan-intro-label {
        margin-bottom: 13px;

        color: #c62828;

        font-size: 12px;
        font-weight: 700;

        letter-spacing: 2.5px;
    }

    .kegiatan-intro-title {
        margin: 0;

        color: #222;

        font-size: 36px;
        font-weight: 700;

        line-height: 1.3;
    }

    .kegiatan-intro-description {
        max-width: 680px;

        margin: 18px auto 0;

        color: #666;

        font-size: 15px;
        line-height: 1.8;
    }

    /* GARIS */

    .kegiatan-intro-line {
        width: 55px;
        height: 3px;

        margin: 30px auto;

        background: #c62828;
    }


    /* HIGHLIGHT */

    .kegiatan-intro-highlight {
        display: flex;
        flex-direction: column;
        align-items: center;
    }


    /* LABEL KEGIATAN TERBARU */

    .kegiatan-intro-highlight-label {
        margin-bottom: 8px;

        color: #777;

        font-size: 11px;
        font-weight: 700;

        letter-spacing: 1.8px;
    }


    /* NAMA KEGIATAN */

    .kegiatan-intro-highlight h3 {
        margin: 0;

        color: #222;

        font-size: 22px;
        font-weight: 700;
    }


    /* TANGGAL */

    .kegiatan-intro-highlight p {
        margin: 7px 0 0;

        color: #888;

        font-size: 13px;
    }


    /* =========================================================
       TEORI
    ========================================================= */

    .teori-list {
        display: grid;
        gap: 18px;
    }

    .teori-item {
        display: grid;
        grid-template-columns: 75px 1fr;
        gap: 22px;
        padding: 28px;
        border: 1px solid var(--line);
        border-radius: 8px;
        background: #fff;
    }

    .teori-number {
        width: 55px;
        height: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: var(--green-soft);
        color: var(--green);
        font-weight: 800;
    }

    .teori-item h3 {
        margin: 0 0 8px;
        color: var(--green-dark);
    }

    .teori-item p {
        margin: 0;
        color: var(--muted);
        line-height: 1.8;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 900px) {

        .materi-grid,
        .jurusan-grid,
        .benefit-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .jurusan-detail-inner {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 650px) {

        .edu-container {
            width: min(100% - 28px, 1180px);
        }

        .edu-hero {
            padding: 60px 0;
        }

        .edu-intro-box {
            grid-template-columns: 1fr;
        }

        .materi-grid,
        .jurusan-grid,
        .benefit-grid,
        .kegiatan-grid {
            grid-template-columns: 1fr;
        }

        .materi-card {
            min-height: 250px;
        }

        .magang-hero {
            padding: 35px 25px;
        }

        .magang-cta {
            padding: 38px 24px;
        }

        .magang-cta h3 {
            font-size: 27px;
        }

        .teori-item {
            grid-template-columns: 1fr;
        }

        .experience-controls {
            justify-content: flex-start;
        }

        .experience-card {
            flex: 0 0 88%;
        }

        .experience-card-image {
            height: 230px;
        }

        .experience-card-content {
            padding: 23px;
        }

        .experience-card-content h3 {
            font-size: 21px;
        }

        .jurusan-image {
            height: 170px;
        }

        .jurusan-card {
            min-height: 390px;
        }
    }
</style>


<div class="edu-page">

    {{-- =====================================================
         HERO
    ====================================================== --}}
    <section class="edu-hero"
     id="eduHero"
    >

        <div class="edu-container">

            <div class="edu-hero-content">

                <span class="edu-eyebrow">
                    Avengers Team
                </span>

                <h1>
                    Edukasi Umum
                </h1>

                <p>
                    Ruang pembelajaran untuk mengenal dunia kerja,
                    kegiatan profesional, serta pengetahuan umum
                    yang berkaitan dengan dunia perdagangan berjangka.
                </p>

            </div>

        </div>

    </section>


    {{-- =====================================================
         3 MATERI UTAMA
    ====================================================== --}}
    <section
        class="materi-section"
        id="materiUtama"
    >

        <div class="edu-container">

            <div class="materi-grid">

                {{-- MAGANG --}}
                <div
                    class="materi-card"
                    onclick="bukaMateri('magang')"
                >
                    <h3>
                        Program Magang
                    </h3>

                    <p>
                        Mengenal pengalaman magang, jurusan yang relevan,
                        serta gambaran kegiatan pembelajaran di lingkungan
                        profesional.
                    </p>

                    <span class="materi-arrow">
                        <i class="bi bi-arrow-right"></i>
                    </span>

                </div>


                {{-- KEGIATAN --}}
                <div
                    class="materi-card"
                    onclick="bukaMateri('kegiatan')"
                >


                    <h3>
                        Kegiatan Sosial
                    </h3>

                    <p>
                        Mengenal berbagai kegiatan internal dan sosial
                        yang menjadi bagian dari proses pengembangan
                        diri dan kebersamaan.
                    </p>

                    <span class="materi-arrow">
                        <i class="bi bi-arrow-right"></i>
                    </span>

                </div>


                {{-- Kegiatan Literasi --}}
                <div
                    class="materi-card"
                    onclick="bukaMateri('literasi')"
                >

                    <h3>
                        Kegiatan Literasi
                    </h3>

                    <p>
                        Materi dasar mengenai komunikasi profesional
                        dan pengenalan dunia perdagangan.
                    </p>

                    <span class="materi-arrow">
                        <i class="bi bi-arrow-right"></i>
                    </span>

                </div>

            </div>

        </div>

    </section>


    {{-- =====================================================
         DETAIL PROGRAM MAGANG
    ====================================================== --}}
    <section
        class="materi-detail"
        id="detail-magang"
    >

        <div class="edu-container">

            <button
                type="button"
                class="back-materi"
                onclick="tutupMateri()"
            >
                <i class="bi bi-arrow-left"></i>
                Kembali ke Materi
            </button>


            <div class="magang-hero">

                <div class="magang-hero-content">

                    <small>
                        Program Magang
                    </small>

                    <h2>
                        Kenali Dunia Kerja
                        Lewat Pengalaman Magang
                    </h2>

                    <p>
                        Program magang menjadi kesempatan bagi mahasiswa
                        untuk mengenal lingkungan kerja secara langsung,
                        menerapkan pengetahuan yang telah dipelajari,
                        serta mengembangkan pengalaman profesional.
                    </p>

                    <button
                        type="button"
                        class="magang-explore"
                        onclick="scrollKeJurusan()"
                    >
                        Lihat Jurusan yang Relevan
                        <i class="bi bi-arrow-down"></i>
                    </button>

                </div>

            </div>


            {{-- =================================================
                 MANFAAT
            ================================================== --}}
            <div class="magang-section">

                <div class="magang-section-title">

                
                    <h3>
                        Belajar Tidak Hanya dari Ruang Kelas
                    </h3>

                    <p>
                        Pengalaman magang dapat menjadi kesempatan
                        untuk mengenal budaya kerja, membangun
                        keterampilan, dan memahami penerapan ilmu
                        dalam lingkungan profesional.
                    </p>

                </div>


                <div class="benefit-grid">

                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-lightbulb"></i>
                        </div>

                        <h4>
                            Menambah Wawasan
                        </h4>

                        <p>
                            Mengenal bagaimana ilmu yang dipelajari
                            dapat diterapkan dalam lingkungan kerja.
                        </p>
                    </div>


                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-person-workspace"></i>
                        </div>

                        <h4>
                            Mengenal Dunia Kerja
                        </h4>

                        <p>
                            Memahami suasana kerja dan cara berinteraksi
                            secara profesional.
                        </p>
                    </div>


                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-people"></i>
                        </div>

                        <h4>
                            Mengembangkan Komunikasi
                        </h4>

                        <p>
                            Melatih kemampuan berkomunikasi dan
                            bekerja bersama orang lain.
                        </p>
                    </div>


                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-journal-check"></i>
                        </div>

                        <h4>
                            Menerapkan Pengetahuan
                        </h4>

                        <p>
                            Menghubungkan materi perkuliahan dengan
                            pengalaman yang diperoleh selama kegiatan.
                        </p>
                    </div>


                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>

                        <h4>
                            Mengembangkan Diri
                        </h4>

                        <p>
                            Membangun kebiasaan kerja dan tanggung jawab
                            dalam lingkungan profesional.
                        </p>
                    </div>


                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-folder2-open"></i>
                        </div>

                        <h4>
                            Menambah Pengalaman
                        </h4>

                        <p>
                            Memiliki pengalaman yang dapat menjadi bagian
                            dari perjalanan akademik dan profesional.
                        </p>
                    </div>

                </div>

            </div>


            {{-- =================================================
                 JURUSAN / BIDANG MAGANG
            ================================================== --}}
            <div
                class="magang-section"
                id="jurusanMagang"
            >

                <div class="magang-section-title">

                    <h3>
                        Bidang / Jurusan
                    </h3>

                    <p>
                        Program magang terbuka untuk siswa SMK dan mahasiswa
                        dari berbagai latar belakang pendidikan yang sesuai
                        dengan bidang berikut.
                    </p>

                </div>


                <div class="jurusan-grid">

                    <div
                        class="jurusan-card"
                        role="button"
                        tabindex="0"
                        onclick="bukaJurusan('business')"
                        onkeydown="if (event.key === 'Enter' || event.key === ' ') { event.preventDefault(); bukaJurusan('business'); }"
                    >
                        <div class="jurusan-image">
                            <img src="{{ asset('images/business-marketing.jpeg') }}" alt="Business dan Marketing">
                        </div>
                        <div class="jurusan-content">
                            <span class="jurusan-number">01</span>
                            <h4>Business &amp; Marketing</h4>
                            <ul class="jurusan-list">
                                <li>Manajemen</li>
                                <li>Administrasi Bisnis</li>
                                <li>Marketing</li>
                                <li>Bisnis Digital</li>
                            </ul>
                        </div>
                        <span class="jurusan-arrow" aria-hidden="true">
                            <i class="bi bi-arrow-right"></i>
                        </span>
                    </div>

                    <div
                        class="jurusan-card"
                        role="button"
                        tabindex="0"
                        onclick="bukaJurusan('finance')"
                        onkeydown="if (event.key === 'Enter' || event.key === ' ') { event.preventDefault(); bukaJurusan('finance'); }"
                    >
                        <div class="jurusan-image">
                            <img src="{{ asset('images/finance-market-research.jpeg') }}" alt="Finance dan Market Research">
                        </div>
                        <div class="jurusan-content">
                            <span class="jurusan-number">02</span>
                            <h4>Finance &amp; Market Research</h4>
                            <ul class="jurusan-list">
                                <li>Ekonomi</li>
                                <li>Keuangan</li>
                                <li>Perbankan</li>
                                <li>Akuntansi</li>
                            </ul>
                        </div>
                        <span class="jurusan-arrow" aria-hidden="true">
                            <i class="bi bi-arrow-right"></i>
                        </span>
                    </div>

                    <div
                        class="jurusan-card"
                        role="button"
                        tabindex="0"
                        onclick="bukaJurusan('digital')"
                        onkeydown="if (event.key === 'Enter' || event.key === ' ') { event.preventDefault(); bukaJurusan('digital'); }"
                    >
                        <div class="jurusan-image">
                            <img src="{{ asset('images/digital-technology.jpeg') }}" alt="Digital dan Technology">
                        </div>
                        <div class="jurusan-content">
                            <span class="jurusan-number">03</span>
                            <h4>Digital &amp; Technology</h4>
                            <ul class="jurusan-list">
                                <li>Teknik Informatika</li>
                                <li>Sistem Informasi</li>
                                <li>Manajemen Informatika</li>
                                <li>Data Science</li>
                            </ul>
                        </div>
                        <span class="jurusan-arrow" aria-hidden="true">
                            <i class="bi bi-arrow-right"></i>
                        </span>
                    </div>

                    <div
                        class="jurusan-card"
                        role="button"
                        tabindex="0"
                        onclick="bukaJurusan('creative')"
                        onkeydown="if (event.key === 'Enter' || event.key === ' ') { event.preventDefault(); bukaJurusan('creative'); }"
                    >
                        <div class="jurusan-image">
                            <img src="{{ asset('images/creative-communication.jpeg') }}" alt="Creative dan Communication">
                        </div>
                        <div class="jurusan-content">
                            <span class="jurusan-number">04</span>
                            <h4>Creative &amp; Communication</h4>
                            <ul class="jurusan-list">
                                <li>Ilmu Komunikasi</li>
                                <li>DKV</li>
                                <li>Broadcasting</li>
                                <li>Multimedia</li>
                            </ul>
                        </div>
                        <span class="jurusan-arrow" aria-hidden="true">
                            <i class="bi bi-arrow-right"></i>
                        </span>
                    </div>

                </div>

                {{-- DETAIL PROGRAM PER BIDANG --}}
                <div class="jurusan-detail" id="detail-business">
                    <div class="jurusan-detail-head">
                        <div>
                            <small>Program Magang</small>
                            <h4>Business &amp; Marketing</h4>
                        </div>
                        <button type="button" class="jurusan-close" onclick="tutupJurusan('business')">Tutup</button>
                    </div>
                    <div class="jurusan-program-grid">
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Manajemen</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Administrasi Bisnis</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Marketing</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Bisnis Digital</div>
                    </div>
                </div>

                <div class="jurusan-detail" id="detail-finance">
                    <div class="jurusan-detail-head">
                        <div>
                            <small>Program Magang</small>
                            <h4>Finance &amp; Market Research</h4>
                        </div>
                        <button type="button" class="jurusan-close" onclick="tutupJurusan('finance')">Tutup</button>
                    </div>
                    <div class="jurusan-program-grid">
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Ekonomi</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Keuangan</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Perbankan</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Akuntansi</div>
                    </div>
                </div>

                <div class="jurusan-detail" id="detail-digital">
                    <div class="jurusan-detail-head">
                        <div>
                            <small>Program Magang</small>
                            <h4>Digital &amp; Technology</h4>
                        </div>
                        <button type="button" class="jurusan-close" onclick="tutupJurusan('digital')">Tutup</button>
                    </div>
                    <div class="jurusan-program-grid">
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Teknik Informatika</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Sistem Informasi</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Manajemen Informatika</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Data Science</div>
                    </div>
                </div>

                <div class="jurusan-detail" id="detail-creative">
                    <div class="jurusan-detail-head">
                        <div>
                            <small>Program Magang</small>
                            <h4>Creative &amp; Communication</h4>
                        </div>
                        <button type="button" class="jurusan-close" onclick="tutupJurusan('creative')">Tutup</button>
                    </div>
                    <div class="jurusan-program-grid">
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Ilmu Komunikasi</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>DKV</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Broadcasting</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Multimedia</div>
                    </div>
                </div>

            </div>


            {{-- =================================================
                PENGALAMAN MAGANG PESERTA
            ================================================== --}}

            <div class="magang-section">

                <div class="magang-section-title">

                    <h3>
                        Bagaimana Pengalaman Magang di PT Rifan Financindo Berjangka Semarang?
                    </h3>

                    <p>
                        Cerita pengalaman mahasiswa selama mengenal
                        lingkungan kerja dan mengikuti kegiatan magang.
                    </p>

                </div>


                {{-- SUCCESS MESSAGE --}}
                @if(session('review_success'))

                    <div class="review-alert review-alert-success">
                        <i class="bi bi-check-circle-fill"></i>

                        <span>
                            {{ session('review_success') }}
                        </span>
                    </div>

                @endif


                {{-- ERROR MESSAGE --}}
                @if(session('review_error'))

                    <div class="review-alert review-alert-error">
                        <i class="bi bi-exclamation-circle-fill"></i>

                        <span>
                            {{ session('review_error') }}
                        </span>
                    </div>

                @endif


                {{-- VALIDATION ERROR --}}
                @if($errors->any())

                    <div class="review-alert review-alert-error">

                        <i class="bi bi-exclamation-circle-fill"></i>

                        <div>

                            @foreach($errors->all() as $error)

                                <div>
                                    {{ $error }}
                                </div>

                            @endforeach

                        </div>

                    </div>

                @endif


                {{-- =================================================
                    EXPERIENCE SLIDER
                ================================================== --}}

                @if($pengalamanMagang->count() > 0)

                    <div class="experience-slider">

                        <div class="experience-controls">

                            <button
                                type="button"
                                class="experience-control"
                                onclick="geserPengalaman(-1)"
                                aria-label="Pengalaman sebelumnya"
                            >
                                <i class="bi bi-arrow-left"></i>
                            </button>

                            <button
                                type="button"
                                class="experience-control"
                                onclick="geserPengalaman(1)"
                                aria-label="Pengalaman berikutnya"
                            >
                                <i class="bi bi-arrow-right"></i>
                            </button>

                        </div>


                        <div
                            class="experience-track"
                            id="experienceTrack"
                        >

                            @foreach($pengalamanMagang as $pengalaman)

                                <article class="experience-card">

                                    <div class="experience-card-image">

                                        <img
                                            src="{{ asset('storage/' . $pengalaman->photo) }}"
                                            alt="Foto {{ $pengalaman->name }}"
                                        >

                                    </div>


                                    <div class="experience-card-content">

                                        <small>
                                            Pengalaman Peserta Magang
                                        </small>


                                        <h3>
                                            {{ $pengalaman->name }}
                                        </h3>


                                        <p class="experience-institution">

                                            {{ $pengalaman->institution }}

                                        </p>


                                        <p>

                                            {{ \Illuminate\Support\Str::limit(
                                                $pengalaman->review,
                                                180,
                                                '...'
                                            ) }}

                                        </p>


                                        <button
                                            type="button"
                                            class="experience-read-more"
                                            onclick="bukaPengalaman({{ $pengalaman->id }})"
                                        >
                                            Read More...
                                        </button>

                                    </div>

                                </article>

                            @endforeach

                        </div>

                    </div>

                @else

                    {{-- =================================================
                        BELUM ADA PENGALAMAN
                    ================================================== --}}

                    <div class="experience-empty">

                        <div class="experience-empty-icon">

                            <i class="bi bi-chat-quote"></i>

                        </div>

                        <h3>
                            Belum Ada Pengalaman
                        </h3>

                        <p>
                            Belum ada peserta yang membagikan pengalaman
                            magangnya. Jadilah peserta pertama yang berbagi cerita.
                        </p>

                        <button
                            type="button"
                            class="experience-submit-button"
                            onclick="bukaFormPengalaman()"
                        >
                            <i class="bi bi-pencil-square"></i>
                            Bagikan Pengalaman
                        </button>

                    </div>

                @endif

            </div>


            {{-- =================================================
                MODAL FORM PENGALAMAN
            ================================================== --}}

            <div
                class="experience-modal"
                id="experienceFormModal"
                aria-hidden="true"
            >

                <div
                    class="experience-modal-overlay"
                    onclick="tutupFormPengalaman()"
                ></div>


                <div class="experience-modal-box">

                    <button
                        type="button"
                        class="experience-modal-close"
                        onclick="tutupFormPengalaman()"
                        aria-label="Tutup"
                    >
                        <i class="bi bi-x-lg"></i>
                    </button>


                    <div class="experience-modal-header">

                        <small>
                            PENGALAMAN PESERTA
                        </small>

                        <h3>
                            Bagikan Pengalaman Magang
                        </h3>

                        <p>
                            Ceritakan pengalamanmu selama mengikuti
                            program magang.
                        </p>

                    </div>


                    <form
                        action="{{ route('internship-reviews.store') }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="experience-form"
                    >

                        @csrf


                        <div class="experience-form-group">

                            <label for="review_name">
                                Nama
                            </label>

                            <input
                                type="text"
                                id="review_name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Masukkan nama"
                                maxlength="100"
                                required
                            >

                        </div>


                        <div class="experience-form-group">

                            <label for="review_institution">
                                Asal Sekolah / Universitas
                            </label>

                            <input
                                type="text"
                                id="review_institution"
                                name="institution"
                                value="{{ old('institution') }}"
                                placeholder="Contoh: Universitas Diponegoro"
                                maxlength="150"
                                required
                            >

                        </div>


                        <div class="experience-form-group">

                            <label for="review_photo">
                                Foto Profil
                            </label>

                            <input
                                type="file"
                                id="review_photo"
                                name="photo"
                                accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                                required
                            >

                            <small>
                                JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                            </small>

                        </div>


                        <div class="experience-form-group">

                            <label for="review_text">
                                Ulasan
                            </label>

                            <textarea
                                id="review_text"
                                name="review"
                                rows="6"
                                maxlength="3000"
                                placeholder="Ceritakan pengalaman kamu selama mengikuti magang..."
                                required
                            >{{ old('review') }}</textarea>
         
                        </div>


                        <button
                            type="submit"
                            class="experience-form-submit"
                        >
                            <i class="bi bi-send"></i>
                            Kirim Pengalaman
                        </button>

                    </form>

                </div>

            </div>

            {{-- =================================================
                MODAL DETAIL PENGALAMAN
================================================== --}}

<div
    class="experience-modal"
    id="experienceDetailModal"
    aria-hidden="true"
>

    <div
        class="experience-modal-overlay"
        onclick="tutupPengalaman()"
    ></div>


    <div class="experience-modal-box experience-detail-box">

        <button
            type="button"
            class="experience-modal-close"
            onclick="tutupPengalaman()"
            aria-label="Tutup"
        >
            <i class="bi bi-x-lg"></i>
        </button>


        <div class="experience-detail">

            <img
                id="experienceDetailPhoto"
                src=""
                alt=""
            >


            <div class="experience-detail-content">

                <small>
                    PENGALAMAN PESERTA MAGANG
                </small>

                <h3 id="experienceDetailName"></h3>

                <div
                    class="experience-detail-institution"
                    id="experienceDetailInstitution"
                ></div>

                <div
                    class="experience-detail-review"
                    id="experienceDetailReview"
                ></div>

            </div>

        </div>

    </div>

</div>
            {{-- =================================================
                 FAQ
            ================================================== --}}
            <div class="magang-section">

                <div class="magang-section-title">

                    <h3>
                        FAQ Program Magang
                    </h3>

                </div>


                <div class="faq-list">

                    <div class="faq-item">

                        <button
                            type="button"
                            class="faq-question"
                            onclick="toggleFaq(this)"
                        >
                            <span>
                                Apa tujuan dari kegiatan magang?
                            </span>

                            <i class="bi bi-chevron-down"></i>
                        </button>

                        <div class="faq-answer">
                            Kegiatan magang memberikan kesempatan
                            kepada mahasiswa untuk mengenal lingkungan
                            kerja dan mendapatkan pengalaman yang
                            relevan dengan proses pembelajaran.
                        </div>

                    </div>


                    <div class="faq-item">

                        <button
                            type="button"
                            class="faq-question"
                            onclick="toggleFaq(this)"
                        >
                            <span>
                                Apakah semua jurusan dapat mengikuti?
                            </span>

                            <i class="bi bi-chevron-down"></i>
                        </button>

                        <div class="faq-answer">
                            Kesesuaian jurusan dapat disesuaikan dengan
                            kebutuhan kegiatan dan program yang tersedia.
                            Daftar di atas merupakan gambaran jurusan
                            yang relevan untuk konteks edukasi magang.
                        </div>

                    </div>


                    <div class="faq-item">

                        <button
                            type="button"
                            class="faq-question"
                            onclick="toggleFaq(this)"
                        >
                            <span>
                                Apa yang dapat dipelajari mahasiswa?
                            </span>

                            <i class="bi bi-chevron-down"></i>
                        </button>

                        <div class="faq-answer">
                            Mahasiswa dapat mengenal lingkungan
                            profesional, komunikasi kerja, kegiatan
                            administrasi, proses bisnis, serta berbagai
                            pengalaman yang sesuai dengan kegiatan magang.
                        </div>

                    </div>


                    <div class="faq-item">

                        <button
                            type="button"
                            class="faq-question"
                            onclick="toggleFaq(this)"
                        >
                            <span>
                                Apakah pengalaman setiap mahasiswa sama?
                            </span>

                            <i class="bi bi-chevron-down"></i>
                        </button>

                        <div class="faq-answer">
                            Pengalaman setiap mahasiswa dapat berbeda
                            tergantung jurusan, kegiatan, pendampingan,
                            dan aktivitas yang diikuti selama program.
                        </div>

                    </div>

                </div>

            </div>


            {{-- CTA --}}
            <div class="magang-cta-content">

            <span class="magang-cta-label">
                PENDAFTARAN MAGANG
            </span>

            <h2>
                Tertarik Mengikuti Program Magang?
            </h2>

            <p>
                Hubungi kami untuk mendapatkan informasi mengenai
                pendaftaran dan pelaksanaan program magang.
            </p>

            <div class="magang-cta-buttons">

                <a
                    href="https://wa.me/082262226238"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="magang-cta-btn whatsapp"
                >
                    <i class="bi bi-whatsapp"></i>
                    WhatsApp
                </a>

                <a
                    href="mailto:inititaa23@gmail.com"
                    class="magang-cta-btn email"
                >
                    <i class="bi bi-envelope"></i>
                    Email
                </a>

            </div>

        </div>

    </section>


   {{-- ============================================================
     DETAIL KEGIATAN
     VIDEO & FOTO
============================================================ --}}

<style>

/* ============================================================
   WRAPPER
============================================================ */

.kegiatan-wrapper {
    width: 100%;
    max-width: 1150px;

    margin: 0 auto;

    padding: 10px 0 40px;
}


/* ============================================================
   LIST CARD
============================================================ */

.kegiatan-list {
    display: grid;

    grid-template-columns:
        repeat(3, minmax(0, 1fr));

    gap: 22px;

    align-items: start;
}

/* ============================================================
   CARD
============================================================ */

.kegiatan-card {
    width: 100%;

    max-width: none;

    overflow: hidden;

    background: #fff;

    border: 1px solid #e4e9e5;

    border-radius: 21px;

    box-shadow: none;

    transition:
        transform .3s ease,
        box-shadow .3s ease,
        border-color .3s ease;
}

.kegiatan-card:hover {
    transform: translateY(-4px);

    border-color: rgba(23,107,77,.25);

    box-shadow:
        0 12px 28px rgba(23,107,77,.10);
}

/* ============================================================
   GAMBAR CARD
============================================================ */

.kegiatan-image {
    width: 100%;

    height: 180px;

    object-fit: cover;

    display: block;
}

.kegiatan-image img {
    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;

    transition: transform 0.35s ease;
}

.kegiatan-card:hover .kegiatan-image img {
    transform: scale(1.04);
}


/* ============================================================
   BODY CARD
============================================================ */

.kegiatan-body {
    padding: 22px 24px 20px;
}


/* ============================================================
   LABEL
============================================================ */

.kegiatan-type {
    display: inline-flex;

    align-items: center;

    gap: 7px;

    margin-bottom: 10px;

    color: #c62828;

    font-size: 12px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: 0.6px;
}

.kegiatan-type i {
    font-size: 14px;
}


/* ============================================================
   JUDUL CARD
============================================================ */

.kegiatan-title {
    margin: 0 0 10px;

    color: #222;

    font-size: 21px;

    font-weight: 700;

    line-height: 1.35;
}


/* ============================================================
   DESKRIPSI CARD
============================================================ */

.kegiatan-description {
    margin: 0 0 18px;

    color: #666;

    font-size: 14px;

    line-height: 1.7;
}


/* ============================================================
   INFORMASI CARD
============================================================ */

.kegiatan-info {
    display: flex;

    flex-direction: column;

    gap: 8px;

    margin-bottom: 20px;
}

.kegiatan-info-item {
    display: flex;

    align-items: center;

    gap: 9px;

    color: #555;

    font-size: 13px;
}

.kegiatan-info-item i {
    width: 17px;

    color: #c62828;

    font-size: 14px;
}


/* ============================================================
   TOMBOL DETAIL
============================================================ */

.kegiatan-detail {
    width: 100%;

    display: flex;

    align-items: center;

    justify-content: space-between;

    padding: 15px 0 0;

    border: none;

    border-top: 1px solid #eeeeee;

    background: transparent;

    color: #c62828;

    font-size: 13px;

    font-weight: 700;

    cursor: pointer;

    text-align: left;
}

.kegiatan-detail span {
    transition: transform 0.2s ease;
}

.kegiatan-card:hover .kegiatan-detail span {
    transform: translateX(4px);
}

.kegiatan-detail i {
    font-size: 16px;
}


/* ============================================================
   HALAMAN DETAIL
============================================================ */

.kegiatan-detail-page {
    display: none;

    width: 100%;
}

.kegiatan-detail-page.active {
    display: flex;
    flex-direction: column;
    align-items: center;
}


/* ============================================================
   TOMBOL KEMBALI
============================================================ */

.kegiatan-back {
    display: inline-flex;

    align-items: center;

    gap: 8px;

    margin-bottom: 25px;

    padding: 9px 14px;

    border: 1px solid #dddddd;

    border-radius: 5px;

    background: #ffffff;

    color: #555;

    font-size: 13px;

    font-weight: 600;

    cursor: pointer;

    transition: 0.2s ease;
}

.kegiatan-back:hover {
    border-color: #c62828;

    color: #c62828;
}


/* ============================================================
   DETAIL CONTENT
============================================================ */

.kegiatan-detail-content {
    width: 100%;

    max-width: 900px;

    margin: 0 auto;

    background: transparent;

    border: 0;

    border-radius: 0;

    box-shadow: none;

    padding: 0;
}


/* ============================================================
   VIDEO DETAIL
============================================================ */

.kegiatan-detail-video {
    width: 100%;

    margin-bottom: 28px;

    border-radius: 18px;

    overflow: hidden;
}


.kegiatan-detail-video iframe {
    display: block;

    width: 100%;

    aspect-ratio: 16 / 9;

    border: 0;
}

/* ============================================================
   FOTO UTAMA DETAIL
============================================================ */

.kegiatan-detail-photo-main {
    width: 100%;

    height: 420px;

    overflow: hidden;

    background: #f3f3f3;
}

.kegiatan-detail-photo-main img {
    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;
}


/* ============================================================
   DETAIL BODY
============================================================ */

.kegiatan-detail-body {
    width: 100%;

    background: transparent;

    padding: 0;
}

.kegiatan-detail-info {
    align-items: flex-start;
    text-align: left;
}

.kegiatan-detail-description {
    max-width: 760px;
    margin-left: auto;
    margin-right: auto;
    text-align: left;
}

.kegiatan-dokumentasi-title {
    text-align: center;
}

.kegiatan-dokumentasi {
    max-width: 820px;
    margin-left: auto;
    margin-right: auto;
}


/* ============================================================
   TYPE DETAIL
============================================================ */

.kegiatan-detail-type {
    display: flex;

    align-items: center;

    gap: 8px;

    margin-bottom: 9px;

    color: #c62828;

    font-size: 12px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: 0.6px;
}


/* ============================================================
   TITLE DETAIL
============================================================ */

.kegiatan-detail-title {
    margin: 0 0 18px;

    color: #222;

    font-size: 27px;

    font-weight: 700;

    line-height: 1.35;
}


/* ============================================================
   INFO DETAIL
============================================================ */

.kegiatan-detail-info {
    display: flex;

    flex-direction: column;

    gap: 10px;

    margin-bottom: 22px;

    padding-bottom: 20px;

    border-bottom: 1px solid #eeeeee;
}

.kegiatan-detail-info-item {
    display: flex;

    align-items: center;

    gap: 9px;

    color: #555;

    font-size: 14px;
}

.kegiatan-detail-info-item i {
    width: 18px;

    color: #c62828;

    font-size: 15px;
}


/* ============================================================
   PENJELASAN DETAIL
============================================================ */

.kegiatan-detail-description {
    margin: 0 0 25px;

    color: #555;

    font-size: 14px;

    line-height: 1.8;
}


/* ============================================================
   JUDUL DOKUMENTASI
============================================================ */

.kegiatan-dokumentasi-title {
    margin: 0 0 15px;

    padding-top: 22px;

    border-top: 1px solid #eeeeee;

    color: #222;

    font-size: 20px;

    font-weight: 700;
}


/* ============================================================
   GALERI DOKUMENTASI
============================================================ */

.kegiatan-dokumentasi {
    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 12px;
}

.kegiatan-dokumentasi-item {
    width: 100%;

    height: 180px;

    overflow: hidden;

    border-radius: 5px;

    background: #f3f3f3;
}

.kegiatan-dokumentasi-item img {
    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;

    transition: transform 0.3s ease;
}

.kegiatan-dokumentasi-item:hover img {
    transform: scale(1.04);
}


/* ============================================================
   RESPONSIVE
============================================================ */

@media (max-width: 700px) {

    .kegiatan-intro {
        margin-bottom: 35px;
        padding: 5px 15px 0;
    }

    .kegiatan-intro-title {
        font-size: 28px;
    }

    .kegiatan-intro-description {
        font-size: 14px;
    }

    .kegiatan-intro-highlight h3 {
        font-size: 20px;
    }

    .kegiatan-detail-content {
        width: 100%;
    }

    .kegiatan-detail-body {
        padding: 24px 18px 28px;
    }


    .kegiatan-wrapper {
        padding: 5px 0 30px;
    }


    .kegiatan-card {
        max-width: 100%;
    }


    .kegiatan-image {
        height: 210px;
    }


    .kegiatan-body {
        padding: 19px 18px 18px;
    }


    .kegiatan-title {
        font-size: 19px;
    }


    .kegiatan-description {
        font-size: 13px;
    }


    .kegiatan-detail-body {
        padding: 22px 18px 25px;
    }


    .kegiatan-detail-title {
        font-size: 22px;
    }


    .kegiatan-detail-photo-main {
        height: 270px;
    }


    .kegiatan-dokumentasi {
        grid-template-columns:
            repeat(2, 1fr);

        gap: 10px;
    }


    .kegiatan-dokumentasi-item {
        height: 140px;
    }

    .magang-cta-content {
        margin-top: 35px;
        padding: 38px 24px;
    }

    .magang-cta-content h2 {
        font-size: 27px;
    }

    .magang-cta-content p {
        font-size: 14px;
    }

    .magang-cta-buttons {
        flex-direction: column;
    }

    .magang-cta-btn {
        width: 100%;
        max-width: 220px;
    }

}

</style>



{{-- ============================================================
     SECTION DETAIL KEGIATAN
============================================================ --}}

<section
    class="materi-detail"
    id="detail-kegiatan"
>

    <div class="edu-container">


        {{-- ====================================================
             TOMBOL KEMBALI KE MATERI
        ===================================================== --}}

        <button
            type="button"
            class="back-materi"
            onclick="tutupMateri()"
        >

            <i class="bi bi-arrow-left"></i>

            Kembali ke Materi

        </button>

        <div class="kegiatan-wrapper">

            {{-- ==================================================
                 TAMPILAN AWAL
            =================================================== --}}

            <div
                id="kegiatanListPage"
                class="kegiatan-list-page"
            >

                {{-- ============================================================
                    INTRO KEGIATAN SOSIAL
                ============================================================ --}}

                <div
                    class="kegiatan-intro"
                    id="kegiatanIntro"
                >

                    <div class="kegiatan-intro-label">
                        KEGIATAN SOSIAL
                    </div>

                    <h2 class="kegiatan-intro-title">
                        Momen, Kebersamaan, dan Kepedulian
                    </h2>

                    <p class="kegiatan-intro-description">
                        Setiap kegiatan menjadi bagian dari perjalanan
                        Avengers Team dalam membangun kebersamaan,
                        kepedulian, dan kontribusi bersama.
                    </p>

                </div>


                {{-- =================================================
                    CARD VIDEO
                ================================================== --}}

                <div class="kegiatan-list">

                    <div class="kegiatan-card">

                        {{-- SEMUA ISI CARD KAMU TETAP DI SINI --}}

                        <div class="kegiatan-image">

                            <img
                                src="{{ asset('images/kegiatan-video.jpg') }}"
                                alt="Video kegiatan Baby Home Semarang"
                            >

                        </div>

                        <div class="kegiatan-body">

                            <h3 class="kegiatan-title">
                                Baby Home Semarang
                            </h3>

                            <p class="kegiatan-description">
                                Dokumentasi kegiatan Avengers Team
                                bersama Baby Home Semarang di Gayamsari.
                            </p>

                            <div class="kegiatan-info">

                                <div class="kegiatan-info-item">
                                    <i class="bi bi-calendar-event"></i>

                                    <span>
                                        Jumat, 11 September 2026
                                    </span>
                                </div>

                                <div class="kegiatan-info-item">
                                    <i class="bi bi-clock"></i>

                                    <span>
                                        Pukul 14:00 WIB
                                    </span>
                                </div>

                                <div class="kegiatan-info-item">
                                    <i class="bi bi-geo-alt"></i>

                                    <span>
                                        Baby Home Semarang, Gayamsari
                                    </span>
                                </div>

                            </div>

                            <button
                                type="button"
                                class="kegiatan-detail"
                                onclick="bukaDetailKegiatan('video')"
                            >
                                <span>
                                    Lihat Detail
                                </span>

                                <i class="bi bi-arrow-right"></i>
                            </button>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ====================================================
                 DETAIL VIDEO
            ===================================================== --}}

            <div
                id="kegiatanVideoPage"
                class="kegiatan-detail-page"
            >

                <div class="kegiatan-detail-content">


                    {{-- VIDEO --}}

                    <div class="kegiatan-detail-video">

                        <iframe
                            src="https://www.youtube.com/embed/84boVMbwbVI"
                            title="Kegiatan Avengers Team di Baby Home Semarang"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen
                        ></iframe>

                    </div>



                    <div class="kegiatan-detail-body">


                        <div class="kegiatan-detail-type">

                            <i class="bi bi-play-circle-fill"></i>

                            <span>
                                Video
                            </span>

                        </div>


                        <h2 class="kegiatan-detail-title">

                            Baby Home Semarang

                        </h2>


                        <div class="kegiatan-detail-info">


                            <div class="kegiatan-detail-info-item">

                                <i class="bi bi-calendar-event"></i>

                                <span>
                                    Jumat, 11 September 2026
                                </span>

                            </div>


                            <div class="kegiatan-detail-info-item">

                                <i class="bi bi-clock"></i>

                                <span>
                                    Pukul 14:00 WIB
                                </span>

                            </div>


                            <div class="kegiatan-detail-info-item">

                                <i class="bi bi-geo-alt"></i>

                                <span>
                                    Baby Home Semarang di Gayamsari
                                </span>

                            </div>


                        </div>


                        <p class="kegiatan-detail-description">

                            Video ini mendokumentasikan kegiatan
                            Avengers Team bersama Baby Home Semarang.
                            Momen ini menjadi bagian dari kebersamaan
                            dan kepedulian terhadap lingkungan sekitar.

                        </p>

                        {{-- =================================================
                            DOKUMENTASI FOTO
                        ================================================== --}}

                        <h3 class="kegiatan-dokumentasi-title">
                            Galeri
                        </h3>

                        <div class="kegiatan-dokumentasi">

                            @for ($i = 1; $i <= 6; $i++)

                                <div class="kegiatan-dokumentasi-item">

                                    <img
                                        src="{{ asset('images/kegiatan' . $i . '.jpg') }}"
                                        alt="Dokumentasi kegiatan {{ $i }}"
                                    >

                                </div>

                            @endfor

                        </div>


                    </div>

                </div>

            </div>



            {{-- ============================================================
     JAVASCRIPT
============================================================ --}}

<script>

/* ============================================================
   BUKA DETAIL VIDEO / FOTO
============================================================ */

function bukaDetailKegiatan(jenis) {

    const intro =
    document.getElementById('kegiatanIntro');

    const listPage =
        document.getElementById('kegiatanListPage');

    const videoPage =
        document.getElementById('kegiatanVideoPage');

    /* Sembunyikan daftar */

    listPage.style.display = 'none';


    /* Sembunyikan semua detail */

    videoPage.classList.remove('active');

    /* ========================================================
       DETAIL VIDEO
    ======================================================== */

    if (jenis === 'video') {

        videoPage.classList.add('active');

    }


    /* Scroll ke atas section */

    document
        .getElementById('detail-kegiatan')
        .scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });

}


/* ============================================================
   KEMBALI KE LIST KEGIATAN
============================================================ */

function kembaliKeKegiatan() {

    const intro =
    document.getElementById('kegiatanIntro');

    const listPage =
        document.getElementById('kegiatanListPage');

    const videoPage =
        document.getElementById('kegiatanVideoPage');

    /* Tampilkan card */

    listPage.style.display = 'block';

    intro.style.display = 'block';


    /* Sembunyikan detail */

    videoPage.classList.remove('active');

    /* Scroll kembali */

    document
        .getElementById('detail-kegiatan')
        .scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });

}

</script>

    {{-- =====================================================
         DETAIL TEORI
    ====================================================== --}}
    <section
        class="materi-detail"
        id="detail-teori"
    >

        <div class="edu-container">

            <button
                type="button"
                class="back-materi"
                onclick="tutupMateri()"
            >
                <i class="bi bi-arrow-left"></i>
                Kembali ke Materi
            </button>


            <div class="section-heading">

                <small>
                    Pengetahuan
                </small>

                <h2>
                    Teori Umum
                </h2>

                <p>
                    Materi dasar yang membantu memahami komunikasi
                    profesional dan pengenalan perdagangan.
                </p>

            </div>


            <div class="teori-list">

                <div class="teori-item">

                    <div class="teori-number">
                        01
                    </div>

                    <div>

                        <h3>
                            Komunikasi Profesional
                        </h3>

                        <p>
                            Komunikasi profesional merupakan kemampuan
                            menyampaikan informasi dengan jelas, sopan,
                            dan bertanggung jawab dalam lingkungan kerja.
                        </p>

                    </div>

                </div>


                <div class="teori-item">

                    <div class="teori-number">
                        02
                    </div>

                    <div>

                        <h3>
                            Pengenalan Perdagangan
                        </h3>

                        <p>
                            Pengenalan perdagangan memberikan gambaran
                            mengenai aktivitas perdagangan dan bagaimana
                            berbagai pihak berinteraksi dalam kegiatan
                            ekonomi.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>


<script>

    /* =========================================================
       BUKA MATERI
    ========================================================= */

    function bukaMateri(id) {

        const hero =
            document.getElementById('eduHero');

        const utama =
            document.getElementById('materiUtama');

        const semuaDetail =
            document.querySelectorAll('.materi-detail');


        /* Sembunyikan HERO */

        if (hero) {
            hero.style.display = 'none';
        }


        /* Sembunyikan 3 card utama */

        utama.style.display = 'none';


        /* Sembunyikan semua detail */

        semuaDetail.forEach(function(detail) {
            detail.classList.remove('active');
        });


        /* Tampilkan detail yang dipilih */

        const target =
            document.getElementById('detail-' + id);

        if (target) {
            target.classList.add('active');
        }


        /* Scroll ke atas */

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }


    /* =========================================================
       TUTUP MATERI
    ========================================================= */

    function tutupMateri() {

        const hero =
            document.getElementById('eduHero');

        const utama =
            document.getElementById('materiUtama');

        const semuaDetail =
            document.querySelectorAll('.materi-detail');


        /* Tampilkan kembali HERO */

        if (hero) {
            hero.style.display = 'block';
        }


        /* Sembunyikan semua detail */

        semuaDetail.forEach(function(detail) {
            detail.classList.remove('active');
        });


        /* Tampilkan kembali 3 card */

        utama.style.display = 'block';


        /* Kembali ke halaman awal */

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }


    /* =========================================================
       BUKA DETAIL JURUSAN
    ========================================================= */

    function bukaJurusan(id) {

        const semuaDetail =
            document.querySelectorAll('.jurusan-detail');

        semuaDetail.forEach(function(detail) {
            detail.classList.remove('active');
        });

        const target =
            document.getElementById('detail-' + id);

        if (!target) {
            return;
        }

        target.classList.add('active');

        setTimeout(function() {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }, 50);
    }


    /* =========================================================
       TUTUP DETAIL JURUSAN
    ========================================================= */

    function tutupJurusan(id) {

        const target =
            document.getElementById('detail-' + id);

        if (target) {
            target.classList.remove('active');
        }
    }


    /* =========================================================
       SCROLL KE JURUSAN
    ========================================================= */

    function scrollKeJurusan() {

        const target =
            document.getElementById('jurusanMagang');

        if (!target) {
            return;
        }

        target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }



    /* =========================================================
       SLIDER PENGALAMAN MAGANG
    ========================================================= */

    function geserPengalaman(arah) {

        const track =
            document.getElementById('experienceTrack');

        if (!track) {
            return;
        }

        const card =
            track.querySelector('.experience-card');

        if (!card) {
            return;
        }

        const jarak =
            card.offsetWidth + 22;

        track.scrollBy({
            left: jarak * arah,
            behavior: 'smooth'
        });
    }



    /* =========================================================
   FAQ
========================================================= */

function toggleFaq(button) {

    const item =
        button.closest('.faq-item');

    if (!item) {
        return;
    }

    item.classList.toggle('open');
}


/* =========================================================
   DATA PENGALAMAN MAGANG
========================================================= */

const dataPengalamanMagang =
    @json($pengalamanMagang);


/* =========================================================
   BUKA FORM PENGALAMAN
========================================================= */

function bukaFormPengalaman() {

    const modal =
        document.getElementById(
            'experienceFormModal'
        );

    if (!modal) {

        console.error(
            'experienceFormModal tidak ditemukan.'
        );

        return;
    }

    modal.classList.add('active');

    modal.setAttribute(
        'aria-hidden',
        'false'
    );

    document.body.classList.add(
        'experience-modal-open'
    );
}


/* =========================================================
   TUTUP FORM PENGALAMAN
========================================================= */

function tutupFormPengalaman() {

    const modal =
        document.getElementById(
            'experienceFormModal'
        );

    if (!modal) {
        return;
    }

    modal.classList.remove('active');

    modal.setAttribute(
        'aria-hidden',
        'true'
    );

    document.body.classList.remove(
        'experience-modal-open'
    );
}


/* =========================================================
   BUKA DETAIL PENGALAMAN
========================================================= */

function bukaPengalaman(id) {

    const pengalaman =
        dataPengalamanMagang.find(
            function(item) {

                return Number(item.id) === Number(id);

            }
        );

    if (!pengalaman) {

        console.error(
            'Data pengalaman dengan ID ' +
            id +
            ' tidak ditemukan.'
        );

        return;
    }


    const photo =
        document.getElementById(
            'experienceDetailPhoto'
        );

    const name =
        document.getElementById(
            'experienceDetailName'
        );

    const institution =
        document.getElementById(
            'experienceDetailInstitution'
        );

    const review =
        document.getElementById(
            'experienceDetailReview'
        );


    if (photo) {

        photo.src =
            '/storage/' + pengalaman.photo;

        photo.alt =
            'Foto ' + pengalaman.name;
    }


    if (name) {

        name.textContent =
            pengalaman.name;
    }


    if (institution) {

        institution.textContent =
            pengalaman.institution;
    }


    if (review) {

        review.textContent =
            pengalaman.review;
    }


    const modal =
        document.getElementById(
            'experienceDetailModal'
        );

    if (!modal) {

        console.error(
            'experienceDetailModal tidak ditemukan.'
        );

        return;
    }


    modal.classList.add('active');

    modal.setAttribute(
        'aria-hidden',
        'false'
    );

    document.body.classList.add(
        'experience-modal-open'
    );
}


/* =========================================================
   TUTUP DETAIL PENGALAMAN
========================================================= */

function tutupPengalaman() {

    const modal =
        document.getElementById(
            'experienceDetailModal'
        );

    if (!modal) {
        return;
    }

    modal.classList.remove('active');

    modal.setAttribute(
        'aria-hidden',
        'true'
    );

    document.body.classList.remove(
        'experience-modal-open'
    );
}


/* =========================================================
   TUTUP MODAL DENGAN ESCAPE
========================================================= */

document.addEventListener(
    'keydown',
    function(event) {

        if (event.key !== 'Escape') {
            return;
        }

        tutupFormPengalaman();

        tutupPengalaman();
    }
);

</script>

@endsection