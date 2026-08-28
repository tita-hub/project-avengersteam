@extends('layouts.app')

@section('content')

<style>

    /* ============================================================
       HALAMAN PROSEDUR PENARIKAN
       ============================================================ */

    .withdrawal-page {
        padding: 40px 45px 70px;
        background: #f5f7fb;
        min-height: 100vh;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }


    /* ============================================================
       TOMBOL KEMBALI
       ============================================================ */

    .withdrawal-back {
        max-width: 1000px;
        margin: 0 auto 20px;
    }

    .withdrawal-back a {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        color: #159447;
        text-decoration: none;

        font-size: 14px;
        font-weight: 600;

        transition: 0.3s ease;
    }

    .withdrawal-back a:hover {
        color: #0d7536;
        transform: translateX(-4px);
    }

    .back-arrow {
        font-size: 20px;
    }


    /* ============================================================
       HEADER
       ============================================================ */

    .withdrawal-header {
        max-width: 1000px;
        margin: 0 auto 35px;

        background: white;

        padding: 35px 40px;

        border-radius: 18px;

        border: 1px solid #e7ebee;

        box-shadow:
            0 8px 25px rgba(0, 0, 0, 0.05);

        position: relative;
        overflow: hidden;

        animation: fadeDown 0.7s ease;
    }

    .withdrawal-header::before {
        content: "";

        position: absolute;

        top: 0;
        left: 0;

        width: 100%;
        height: 4px;

        background: #25a84a;
    }

    .header-label {
        display: inline-block;

        margin-bottom: 10px;

        color: #159447;

        font-size: 12px;

        font-weight: 700;

        letter-spacing: 1px;

        text-transform: uppercase;
    }

    .withdrawal-header h1 {
        margin: 0 0 12px;

        color: #172033;

        font-size: 36px;

        line-height: 1.3;
    }

    .withdrawal-header p {
        margin: 0;

        color: #707782;

        font-size: 15px;

        line-height: 1.8;

        max-width: 850px;
    }


    /* ============================================================
       INFO EFFECTIVE MARGIN
       ============================================================ */

    .margin-info {
        max-width: 1000px;

        margin: 0 auto 40px;

        padding: 22px 25px;

        background: #eefaf1;

        border: 1px solid #ccebd5;

        border-radius: 14px;

        display: flex;

        align-items: flex-start;

        gap: 15px;

        animation: fadeUp 0.7s ease;
    }

    .margin-icon {
        width: 42px;
        height: 42px;

        flex-shrink: 0;

        display: flex;

        align-items: center;
        justify-content: center;

        background: #25a84a;

        color: white;

        border-radius: 10px;

        font-size: 20px;
    }

    .margin-info h3 {
        margin: 0 0 5px;

        color: #176c35;

        font-size: 16px;
    }

    .margin-info p {
        margin: 0;

        color: #587060;

        font-size: 13px;

        line-height: 1.7;
    }


    /* ============================================================
       JUDUL SECTION
       ============================================================ */

    .section-heading {
        max-width: 1000px;

        margin: 0 auto 20px;
    }

    .section-heading h2 {
        margin: 0;

        color: #172033;

        font-size: 25px;
    }

    .section-heading p {
        margin: 6px 0 0;

        color: #7a818b;

        font-size: 14px;
    }


    /* ============================================================
       TIMELINE
       ============================================================ */

    .withdrawal-timeline {
        max-width: 1000px;

        margin: 0 auto;

        position: relative;
    }

    .withdrawal-timeline::before {
        content: "";

        position: absolute;

        left: 30px;

        top: 30px;

        bottom: 30px;

        width: 2px;

        background: #d8ebdd;
    }


    /* ============================================================
       STEP
       ============================================================ */

    .withdrawal-step {
        display: flex;

        align-items: flex-start;

        gap: 20px;

        margin-bottom: 20px;

        position: relative;

        animation: fadeUp 0.6s ease both;
    }

    .withdrawal-step:nth-child(2) {
        animation-delay: 0.15s;
    }

    .withdrawal-step:nth-child(3) {
        animation-delay: 0.3s;
    }


    /* ============================================================
       NOMOR
       ============================================================ */

    .step-number {
        width: 60px;
        height: 60px;

        flex-shrink: 0;

        display: flex;

        align-items: center;
        justify-content: center;

        background: white;

        border: 2px solid #25a84a;

        border-radius: 50%;

        color: #159447;

        font-size: 16px;

        font-weight: 700;

        z-index: 2;

        box-shadow:
            0 5px 15px rgba(37, 168, 74, 0.10);
    }


    /* ============================================================
       CARD STEP
       ============================================================ */

    .withdrawal-card {
        flex: 1;

        background: white;

        border: 1px solid #e7ebee;

        border-radius: 15px;

        padding: 25px 28px;

        box-shadow:
            0 6px 20px rgba(0, 0, 0, 0.035);

        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease,
            border-color 0.3s ease;
    }

    .withdrawal-card:hover {
        transform: translateX(5px);

        border-color: #bfe4c9;

        box-shadow:
            0 12px 28px rgba(37, 168, 74, 0.08);
    }

    .withdrawal-card h3 {
        margin: 0 0 9px;

        color: #172033;

        font-size: 19px;
    }

    .withdrawal-card p {
        margin: 0;

        color: #69717c;

        font-size: 14px;

        line-height: 1.8;
    }


    /* ============================================================
       CHECKLIST
       ============================================================ */

    .step-note {
        margin-top: 16px;

        display: flex;

        flex-wrap: wrap;

        gap: 10px;
    }

    .note-item {
        padding: 9px 13px;

        background: #f7faf8;

        border: 1px solid #e2eee6;

        border-radius: 8px;

        color: #53605a;

        font-size: 13px;
    }

    .note-item::before {
        content: "✓";

        margin-right: 7px;

        color: #25a84a;

        font-weight: bold;
    }


    /* ============================================================
       LEGALITAS
       ============================================================ */

    .legal-section {
        max-width: 1000px;

        margin: 50px auto 0;
    }

    .legal-grid {
        display: grid;

        grid-template-columns: repeat(4, 1fr);

        gap: 15px;
    }

    .legal-card {
        display: block;

        padding: 20px;

        background: white;

        border: 1px solid #e7ebee;

        border-radius: 14px;

        text-decoration: none;

        transition: 0.3s ease;
    }

    .legal-card:hover {
        transform: translateY(-4px);

        border-color: #25a84a;

        box-shadow:
            0 10px 25px rgba(37, 168, 74, 0.08);
    }

    .legal-card h3 {
        margin: 0 0 7px;

        color: #172033;

        font-size: 16px;
    }

    .legal-card span {
        color: #159447;

        font-size: 13px;

        font-weight: 600;
    }


    /* ============================================================
       HELP
       ============================================================ */

    .help-section {
        max-width: 1000px;

        margin: 25px auto 0;

        display: grid;

        grid-template-columns: repeat(2, 1fr);

        gap: 16px;
    }

    .help-card {
        padding: 20px;

        background: white;

        border: 1px solid #e7ebee;

        border-radius: 14px;

        text-decoration: none;

        transition: 0.3s ease;
    }

    .help-card:hover {
        transform: translateY(-4px);

        border-color: #25a84a;
    }

    .help-card h3 {
        margin: 0 0 7px;

        color: #172033;

        font-size: 16px;
    }

    .help-card span {
        color: #159447;

        font-size: 13px;
    }


    /* ============================================================
       PERHATIAN
       ============================================================ */

    .warning {
        max-width: 1000px;

        margin: 35px auto 0;

        padding: 24px 27px;

        background: #fffaf0;

        border: 1px solid #f1dfad;

        border-left: 5px solid #e3a008;

        border-radius: 14px;

        box-sizing: border-box;
    }

    .warning h3 {
        margin: 0 0 10px;

        color: #966900;

        font-size: 17px;
    }

    .warning p {
        margin: 0 0 10px;

        color: #675c42;

        font-size: 14px;

        line-height: 1.8;
    }

    .warning p:last-child {
        margin-bottom: 0;
    }


    /* ============================================================
       FOOTER
       ============================================================ */

    .footer-links {
        max-width: 1000px;

        margin: 35px auto 0;

        padding-top: 25px;

        border-top: 1px solid #e5e7eb;
    }

    .footer-links a {
        color: #159447;

        text-decoration: none;

        font-size: 13px;

        transition: 0.3s ease;
    }

    .footer-links a:hover {
        color: #0d7536;
    }


    /* ============================================================
       ANIMASI
       ============================================================ */

    @keyframes fadeDown {

        from {
            opacity: 0;
            transform: translateY(-15px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }

    }

    @keyframes fadeUp {

        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }

    }


    /* ============================================================
       RESPONSIVE
       ============================================================ */

    @media (max-width: 850px) {

        .withdrawal-page {
            padding: 30px 20px 50px;
        }

        .withdrawal-header {
            padding: 30px 25px;
        }

        .withdrawal-header h1 {
            font-size: 30px;
        }

        .legal-grid {
            grid-template-columns: repeat(2, 1fr);
        }

    }


    @media (max-width: 550px) {

        .withdrawal-timeline::before {
            left: 25px;
        }

        .withdrawal-step {
            gap: 14px;
        }

        .step-number {
            width: 50px;
            height: 50px;

            font-size: 13px;
        }

        .withdrawal-card {
            padding: 20px;
        }

        .withdrawal-card h3 {
            font-size: 17px;
        }

        .legal-grid {
            grid-template-columns: 1fr;
        }

        .help-section {
            grid-template-columns: 1fr;
        }

        .margin-info {
            padding: 18px;
        }

    }

</style>


<div class="withdrawal-page">


    {{-- =========================================================
         KEMBALI
    ========================================================== --}}

    <div class="withdrawal-back">

        <a href="{{ url()->previous() }}">

            <span class="back-arrow">
                ←
            </span>

            Kembali

        </a>

    </div>



    {{-- =========================================================
         HEADER
    ========================================================== --}}

    <div class="withdrawal-header">

        <div class="header-label">
            PROSEDUR TRANSAKSI
        </div>

        <h1>
            Prosedur Penarikan Dana
        </h1>

        <p>
            Penarikan dana atau <strong>Withdrawal</strong> dapat dilakukan
            sewaktu-waktu oleh nasabah sesuai dengan ketentuan yang berlaku.
            Pastikan proses penarikan dilakukan melalui prosedur resmi.
        </p>

    </div>



    {{-- =========================================================
         EFFECTIVE MARGIN
    ========================================================== --}}

    <div class="margin-info">

        <div class="margin-icon">
            ✓
        </div>

        <div>

            <h3>
                Perhatikan Effective Margin
            </h3>

            <p>
                Dana yang ditarik oleh nasabah tidak boleh melebihi jumlah
                <strong>Effective Margin</strong> yang terdapat pada
                laporan transaksi harian nasabah
                (<strong>Statement Report</strong>).
            </p>

        </div>

    </div>



    {{-- =========================================================
         JUDUL PROSES
    ========================================================== --}}

    <div class="section-heading">

        <h2>
            Proses Penarikan Dana
        </h2>

        <p>
            Ikuti tiga tahapan berikut untuk melakukan Withdrawal.
        </p>

    </div>



    {{-- =========================================================
         TIMELINE
    ========================================================== --}}

    <div class="withdrawal-timeline">


        {{-- STEP 01 --}}

        <div class="withdrawal-step">

            <div class="step-number">
                01
            </div>

            <div class="withdrawal-card">

                <h3>
                    Isi Withdrawal Form
                </h3>

                <p>
                    Nasabah mengisi dan menandatangani
                    <strong>Lembar Aplikasi Penarikan Dana
                    (Withdrawal Form)</strong>.
                </p>

                <div class="step-note">

                    <div class="note-item">
                        Isi formulir
                    </div>

                    <div class="note-item">
                        Pastikan data benar
                    </div>

                    <div class="note-item">
                        Tanda tangan
                    </div>

                </div>

            </div>

        </div>



        {{-- STEP 02 --}}

        <div class="withdrawal-step">

            <div class="step-number">
                02
            </div>

            <div class="withdrawal-card">

                <h3>
                    Pengajuan ke PT Rifan Financindo Berjangka
                </h3>

                <p>
                    Withdrawal Form yang telah diisi dan ditandatangani
                    diberikan kepada PT Rifan Financindo Berjangka
                    untuk diproses sesuai dengan ketentuan yang berlaku.
                </p>

            </div>

        </div>



        {{-- STEP 03 --}}

        <div class="withdrawal-step">

            <div class="step-number">
                03
            </div>

            <div class="withdrawal-card">

                <h3>
                    Dana Ditransfer ke Rekening Nasabah
                </h3>

                <p>
                    Penarikan dana hanya dapat ditransfer ke rekening
                    atas nama nasabah yang bersangkutan dan harus sesuai
                    dengan rekening yang tercantum pada
                    <strong>Aplikasi Pembukaan Rekening</strong>
                    di dalam Buku Perjanjian.
                </p>

                <div class="step-note">

                    <div class="note-item">
                        Rekening atas nama nasabah
                    </div>

                    <div class="note-item">
                        Sesuai data rekening
                    </div>

                </div>

            </div>

        </div>


    </div>



    {{-- =========================================================
         LEGALITAS
    ========================================================== --}}

    <div class="legal-section">

        <div class="section-heading">

            <h2>
                Link Legalitas
            </h2>

            <p>
                Informasi resmi mengenai lembaga dan legalitas terkait.
            </p>

        </div>


        <div class="legal-grid">


            <a
                href="https://bappebti.go.id/pialang_berjangka/detail/012"
                target="_blank"
                rel="noopener noreferrer"
                class="legal-card"
            >

                <h3>
                    BAPPEBTI
                </h3>

                <span>
                    Lihat informasi →
                </span>

            </a>


            <a
                href="https://www.jfx.co.id/media?hal=daftar-pelaku&data=Pialang"
                target="_blank"
                rel="noopener noreferrer"
                class="legal-card"
            >

                <h3>
                    Jakarta Futures Exchange
                </h3>

                <span>
                    Lihat informasi →
                </span>

            </a>


            <a
                href="https://www.ptkbi.com/index.php/c_kbi_wppue_01_anggota_mitra#PL"
                target="_blank"
                rel="noopener noreferrer"
                class="legal-card"
            >

                <h3>
                    KBI
                </h3>

                <span>
                    Lihat informasi →
                </span>

            </a>


            <a
                href="https://www.rf-berjangkasemarang.com/service-details.html"
                target="_blank"
                rel="noopener noreferrer"
                class="legal-card"
            >

                <h3>
                    Aspebtindo
                </h3>

                <span>
                    Lihat informasi →
                </span>

            </a>


        </div>

    </div>



    {{-- =========================================================
         HELP
    ========================================================== --}}

    <div class="help-section">


        <a
            href="https://www.rf-berjangkasemarang.com/contact.html"
            target="_blank"
            rel="noopener noreferrer"
            class="help-card"
        >

            <h3>
                Contact Us
            </h3>

            <span>
                Hubungi kami jika membutuhkan bantuan →
            </span>

        </a>


        <a
            href="https://www.rf-berjangkasemarang.com/faq.html"
            target="_blank"
            rel="noopener noreferrer"
            class="help-card"
        >

            <h3>
                FAQs
            </h3>

            <span>
                Lihat pertanyaan yang sering ditanyakan →
            </span>

        </a>


    </div>



    {{-- =========================================================
         PERHATIAN
    ========================================================== --}}

    <div class="warning">

        <h3>
            ⚠ Perhatian!
        </h3>

        <p>
            Managemen PT. Rifan Financindo Berjangka (PT RFB) menghimbau
            kepada seluruh masyarakat untuk lebih berhati-hati terhadap
            beberapa bentuk penipuan yang berkedok investasi mengatasnamakan
            PT RFB dengan menggunakan media elektronik ataupun sosial media.
        </p>

        <p>
            Untuk itu harus dipastikan bahwa transfer dana ke rekening tujuan
            (<strong>Segregated Account</strong>) guna melaksanakan transaksi
            Perdagangan Berjangka adalah atas nama
            <strong>PT Rifan Financindo Berjangka</strong>,
            bukan atas nama individu.
        </p>

    </div>



    {{-- =========================================================
         FOOTER
    ========================================================== --}}

    <div class="footer-links">

        <a
            href="https://www.rf-berjangkasemarang.com/index.html"
            target="_blank"
            rel="noopener noreferrer"
        >
            Wallet
        </a>

        &nbsp;&nbsp;|&nbsp;&nbsp;

        <a
            href="https://www.rf-berjangkasemarang.com/privacy-policy.html"
            target="_blank"
            rel="noopener noreferrer"
        >
            Privacy Policy
        </a>

        &nbsp;&nbsp;|&nbsp;&nbsp;

        <a
            href="https://www.rf-berjangkasemarang.com/terms.html"
            target="_blank"
            rel="noopener noreferrer"
        >
            Terms & Conditions
        </a>

    </div>


</div>

@endsection