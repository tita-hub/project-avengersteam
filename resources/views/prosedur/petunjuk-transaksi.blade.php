@extends('layouts.app')

@section('content')

<style>

    /* ============================================================
       HALAMAN PETUNJUK TRANSAKSI
       ============================================================ */

    .transaksi-page {
        padding: 40px 45px 70px;
        background: #f5f7fb;
        min-height: 100vh;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
        color: #555;
    }


    /* ============================================================
       TOMBOL KEMBALI
       ============================================================ */

    .transaksi-back {
        max-width: 1000px;
        margin: 0 auto 20px;
    }

    .transaksi-back a {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        color: #159447;
        text-decoration: none;

        font-size: 14px;
        font-weight: 600;

        transition: 0.3s ease;
    }

    .transaksi-back a:hover {
        color: #0d7536;
        transform: translateX(-4px);
    }

    .back-arrow {
        font-size: 20px;
    }


    /* ============================================================
       HEADER
       ============================================================ */

    .transaksi-header {
        max-width: 1000px;
        margin: 0 auto 30px;

        padding: 38px 40px;

        background: white;

        border-radius: 18px;

        border: 1px solid #e7ebee;

        box-shadow:
            0 8px 25px rgba(0, 0, 0, 0.05);

        position: relative;
        overflow: hidden;

        animation: fadeDown 0.7s ease;
    }

    .transaksi-header::before {
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

    .transaksi-header h1 {
        margin: 0 0 12px;

        color: #172033;

        font-size: 36px;

        line-height: 1.3;
    }

    .transaksi-header p {
        margin: 0;

        max-width: 850px;

        color: #707782;

        font-size: 15px;

        line-height: 1.8;
    }


    /* ============================================================
       DEMO TRADING INFO
       ============================================================ */

    .demo-info {
        max-width: 1000px;

        margin: 0 auto 35px;

        padding: 22px 25px;

        background: #eefaf1;

        border: 1px solid #ccebd5;

        border-radius: 14px;

        display: flex;

        align-items: flex-start;

        gap: 15px;

        animation: fadeUp 0.7s ease;
    }

    .demo-icon {
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

    .demo-info h3 {
        margin: 0 0 6px;

        color: #176c35;

        font-size: 16px;
    }

    .demo-info p {
        margin: 0;

        color: #587060;

        font-size: 14px;

        line-height: 1.7;
    }


    /* ============================================================
       JUDUL TAHAPAN
       ============================================================ */

    .section-title {
        max-width: 1000px;

        margin: 0 auto 20px;
    }

    .section-title h2 {
        margin: 0;

        color: #172033;

        font-size: 25px;
    }

    .section-title p {
        margin: 6px 0 0;

        color: #7a818b;

        font-size: 14px;
    }


    /* ============================================================
       TIMELINE
       ============================================================ */

    .transaction-timeline {
        max-width: 1000px;

        margin: 0 auto;

        position: relative;
    }

    .transaction-timeline::before {
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

    .transaction-step {
        display: flex;

        align-items: flex-start;

        gap: 20px;

        margin-bottom: 20px;

        position: relative;

        animation: fadeUp 0.6s ease both;
    }

    .transaction-step:nth-child(2) {
        animation-delay: 0.15s;
    }

    .transaction-step:nth-child(3) {
        animation-delay: 0.30s;
    }


    /* ============================================================
       NOMOR STEP
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
       CARD
       ============================================================ */

    .transaction-card {
        flex: 1;

        background: white;

        border: 1px solid #e7ebee;

        border-radius: 15px;

        padding: 27px 30px;

        box-shadow:
            0 6px 20px rgba(0, 0, 0, 0.035);

        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease,
            border-color 0.3s ease;
    }

    .transaction-card:hover {
        transform: translateX(5px);

        border-color: #bfe4c9;

        box-shadow:
            0 12px 28px rgba(37, 168, 74, 0.08);
    }

    .transaction-card h3 {
        margin: 0 0 10px;

        color: #172033;

        font-size: 20px;
    }

    .transaction-card p {
        margin: 0;

        color: #69717c;

        font-size: 14px;

        line-height: 1.8;
    }


    /* ============================================================
       CHECKLIST
       ============================================================ */

    .check-list {
        margin-top: 17px;

        display: flex;

        flex-wrap: wrap;

        gap: 10px;
    }

    .check-item {
        padding: 9px 13px;

        background: #f7faf8;

        border: 1px solid #e2eee6;

        border-radius: 8px;

        color: #53605a;

        font-size: 13px;
    }

    .check-item::before {
        content: "✓";

        margin-right: 7px;

        color: #25a84a;

        font-weight: bold;
    }


    /* ============================================================
       PLATFORM TRADING
       ============================================================ */

    .trading-platform {
        margin-top: 18px;

        padding: 18px;

        background: #f7faf8;

        border: 1px solid #dcece1;

        border-radius: 12px;
    }

    .trading-platform small {
        display: block;

        margin-bottom: 6px;

        color: #7a818b;

        font-size: 12px;
    }

    .trading-platform a {
        color: #159447;

        font-size: 14px;

        font-weight: 700;

        text-decoration: none;

        word-break: break-all;
    }

    .trading-platform a:hover {
        text-decoration: underline;
    }


    /* ============================================================
       KEAMANAN AKUN
       ============================================================ */

    .security-box {
        max-width: 1000px;

        margin: 35px auto 0;

        padding: 23px 27px;

        background: #fffaf0;

        border: 1px solid #f1dfad;

        border-left: 5px solid #e3a008;

        border-radius: 14px;

        box-sizing: border-box;
    }

    .security-box h3 {
        margin: 0 0 9px;

        color: #966900;

        font-size: 17px;
    }

    .security-box p {
        margin: 0;

        color: #675c42;

        font-size: 14px;

        line-height: 1.8;
    }


    /* ============================================================
       LEGALITAS
       ============================================================ */

    .legal-section {
        max-width: 1000px;

        margin: 45px auto 0;
    }

    .legal-grid {
        display: grid;

        grid-template-columns: repeat(3, 1fr);

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

        margin: 20px auto 0;

        display: grid;

        grid-template-columns: repeat(2, 1fr);

        gap: 15px;
    }

    .help-card {
        display: block;

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

    @media (max-width: 750px) {

        .transaksi-page {
            padding: 30px 20px 50px;
        }

        .transaksi-header {
            padding: 30px 25px;
        }

        .transaksi-header h1 {
            font-size: 30px;
        }

        .legal-grid {
            grid-template-columns: 1fr;
        }

    }


    @media (max-width: 550px) {

        .transaction-timeline::before {
            left: 25px;
        }

        .transaction-step {
            gap: 14px;
        }

        .step-number {
            width: 50px;
            height: 50px;

            font-size: 13px;
        }

        .transaction-card {
            padding: 20px;
        }

        .transaction-card h3 {
            font-size: 17px;
        }

        .help-section {
            grid-template-columns: 1fr;
        }

        .demo-info {
            padding: 18px;
        }

    }

</style>


<div class="transaksi-page">


    {{-- =========================================================
         KEMBALI
    ========================================================== --}}

    <div class="transaksi-back">

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

    <div class="transaksi-header">

        <div class="header-label">
            PANDUAN TRANSAKSI
        </div>

        <h1>
            Petunjuk Transaksi
        </h1>

        <p>
            Nasabah dapat menyampaikan amanat transaksi secara online
            melalui platform trading yang disediakan. Untuk kenyamanan
            dan meminimalkan risiko kesalahan, disarankan Nasabah
            melakukan simulasi <strong>demo trading</strong> terlebih
            dahulu sebelum menggunakan akun riil.
        </p>

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

    <div class="section-title">

        <h2>
            Tahapan Transaksi Online
        </h2>

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

            <div class="step-number">
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

            <div class="step-number">
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

            <div class="step-number">
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

    <div class="security-box">

        <h3>
            ⚠ Jaga Kerahasiaan Akun
        </h3>

        <p>
            User ID dan Password merupakan informasi pribadi.
            Jangan membagikan kredensial akun kepada pihak lain
            dan pastikan Anda selalu menggunakan platform trading
            resmi yang diberikan oleh PT. Rifan Financindo Berjangka.
        </p>

    </div>



    {{-- =========================================================
         LEGALITAS
    ========================================================== --}}

    <div class="legal-section">

        <div class="section-title">

            <h2>
                Link Legalitas
            </h2>

            <p>
                Informasi resmi mengenai perusahaan dan lembaga terkait.
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


</div>

@endsection