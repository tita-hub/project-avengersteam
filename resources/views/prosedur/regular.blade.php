@extends('layouts.app')

@section('content')

<style>

    /* ============================================================
       HALAMAN PROSEDUR REGULAR
       ============================================================ */

    .regular-page {
        padding: 40px 45px 70px;
        background: #f5f7fb;
        min-height: 100vh;
        box-sizing: border-box;
    }


    /* ============================================================
       TOMBOL KEMBALI
       ============================================================ */

    .back-wrapper {
        max-width: 1000px;
        margin: 0 auto 20px;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        color: #159447;
        text-decoration: none;

        font-size: 14px;
        font-weight: 600;

        transition: 0.3s ease;
    }

    .back-button:hover {
        color: #0d7536;
        transform: translateX(-4px);
    }

    .back-arrow {
        font-size: 20px;
    }


    /* ============================================================
       HEADER
       ============================================================ */

    .regular-header {
        max-width: 1000px;
        margin: 0 auto 35px;

        padding: 35px 40px;

        background: white;

        border-radius: 18px;

        border: 1px solid #e7ebee;

        box-shadow:
            0 8px 25px rgba(0, 0, 0, 0.05);

        position: relative;
        overflow: hidden;

        animation: fadeDown 0.7s ease;
    }

    .regular-header::before {
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

    .regular-header h1 {
        margin: 0 0 10px;

        color: #172033;

        font-size: 36px;

        line-height: 1.3;
    }

    .regular-header p {
        margin: 0;

        color: #727985;

        font-size: 16px;

        line-height: 1.7;
    }

    .header-status {
        display: flex;

        align-items: center;

        gap: 9px;

        margin-top: 20px;

        color: #667085;

        font-size: 13px;
    }

    .status-dot {
        width: 8px;
        height: 8px;

        background: #25a84a;

        border-radius: 50%;
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

    .timeline {
        max-width: 1000px;

        margin: 0 auto;

        position: relative;
    }

    .timeline::before {
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

    .step {
        display: flex;

        align-items: flex-start;

        gap: 20px;

        margin-bottom: 20px;

        position: relative;

        animation: stepMuncul 0.6s ease both;
    }

    .step:nth-child(2) {
        animation-delay: 0.1s;
    }

    .step:nth-child(3) {
        animation-delay: 0.2s;
    }

    .step:nth-child(4) {
        animation-delay: 0.3s;
    }

    .step:nth-child(5) {
        animation-delay: 0.4s;
    }

    .step:nth-child(6) {
        animation-delay: 0.5s;
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
       ISI STEP
       ============================================================ */

    .step-card {
        flex: 1;

        background: white;

        border: 1px solid #e7ebee;

        border-radius: 15px;

        padding: 24px 27px;

        box-shadow:
            0 6px 20px rgba(0, 0, 0, 0.035);

        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease,
            border-color 0.3s ease;
    }

    .step-card:hover {
        transform: translateX(5px);

        border-color: #bfe4c9;

        box-shadow:
            0 12px 28px rgba(37, 168, 74, 0.08);
    }

    .step-card h3 {
        margin: 0 0 9px;

        color: #172033;

        font-size: 19px;
    }

    .step-card p {
        margin: 0;

        color: #69717c;

        font-size: 14px;

        line-height: 1.75;
    }


    /* ============================================================
       DOKUMEN
       ============================================================ */

    .document-list {
        display: grid;

        grid-template-columns: repeat(2, 1fr);

        gap: 10px;

        margin-top: 17px;
    }

    .document-item {
        padding: 11px 13px;

        background: #f7faf8;

        border: 1px solid #e5f0e8;

        border-radius: 9px;

        color: #4b5563;

        font-size: 13px;
    }

    .document-item::before {
        content: "✓";

        margin-right: 8px;

        color: #25a84a;

        font-weight: 700;
    }


    /* ============================================================
       BANK SECTION
       ============================================================ */

    .bank-section {
        max-width: 1000px;

        margin: 45px auto 0;
    }

    .bank-grid {
        display: grid;

        grid-template-columns: repeat(2, 1fr);

        gap: 16px;
    }

    .bank-card {
        background: white;

        border: 1px solid #e7ebee;

        border-radius: 14px;

        padding: 20px;

        transition: 0.3s ease;
    }

    .bank-card:hover {
        transform: translateY(-4px);

        border-color: #bfe4c9;

        box-shadow:
            0 10px 25px rgba(0, 0, 0, 0.06);
    }

    .bank-name {
        color: #172033;

        font-size: 16px;

        font-weight: 700;

        margin-bottom: 5px;
    }

    .bank-branch {
        color: #858c96;

        font-size: 12px;

        margin-bottom: 14px;
    }

    .account-row {
        display: flex;

        justify-content: space-between;

        align-items: center;

        padding: 8px 0;

        border-top: 1px solid #f0f2f4;
    }

    .currency {
        color: #7a818b;

        font-size: 13px;
    }

    .account-number {
        color: #172033;

        font-size: 13px;

        font-weight: 600;
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

        gap: 16px;
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

        font-size: 17px;
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
       WARNING
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

    @keyframes stepMuncul {

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

    @media (max-width: 800px) {

        .regular-page {
            padding: 30px 20px 50px;
        }

        .regular-header {
            padding: 30px 25px;
        }

        .regular-header h1 {
            font-size: 30px;
        }

        .bank-grid {
            grid-template-columns: 1fr;
        }

        .legal-grid {
            grid-template-columns: 1fr;
        }

        .document-list {
            grid-template-columns: 1fr;
        }

        .help-section {
            grid-template-columns: 1fr;
        }

    }


    @media (max-width: 550px) {

        .timeline::before {
            left: 25px;
        }

        .step {
            gap: 14px;
        }

        .step-number {
            width: 50px;
            height: 50px;

            font-size: 13px;
        }

        .step-card {
            padding: 20px;
        }

        .step-card h3 {
            font-size: 17px;
        }

    }

</style>


<div class="regular-page">


    {{-- =========================================================
         KEMBALI
    ========================================================== --}}

    <div class="back-wrapper">

        <a
            href="{{ url()->previous() }}"
            class="back-button"
        >

            <span class="back-arrow">
                ←
            </span>

            Kembali

        </a>

    </div>



    {{-- =========================================================
         HEADER
    ========================================================== --}}

    <div class="regular-header">

        <div class="header-label">
            PROSEDUR PEMBUKAAN REKENING
        </div>

        <h1>
            Prosedur Pembuatan Akun Reguler
        </h1>

        <p>
            Panduan tahapan pembukaan rekening secara reguler
            bersama PT. Rifan Financindo Berjangka.
        </p>

        <div class="header-status">

            <span class="status-dot"></span>

            Ikuti setiap tahapan sesuai urutan yang telah ditentukan.

        </div>

    </div>



    {{-- =========================================================
         JUDUL PROSEDUR
    ========================================================== --}}

    <div class="section-heading">

        <h2>
            Prosedur Pembuatan Akun
        </h2>

        <p>
            Berikut adalah tahapan yang perlu dilakukan oleh calon nasabah.
        </p>

    </div>



    {{-- =========================================================
         TIMELINE
    ========================================================== --}}

    <div class="timeline">


        {{-- STEP 01 --}}

        <div class="step">

            <div class="step-number">
                01
            </div>

            <div class="step-card">

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

        <div class="step">

            <div class="step-number">
                02
            </div>

            <div class="step-card">

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

        <div class="step">

            <div class="step-number">
                03
            </div>

            <div class="step-card">

                <h3>
                    Membaca dan Memahami Buku Perjanjian
                </h3>

                <p>

                    Membaca dan memahami dengan seksama isi
                    Buku Perjanjian yang terdiri dari:

                </p>


                <div class="document-list">

                    <div class="document-item">
                        Aplikasi Pembukaan Rekening
                    </div>

                    <div class="document-item">
                        Dokumen Pemberitahuan Adanya Risiko
                    </div>

                    <div class="document-item">
                        Perjanjian Pemberian Amanat
                    </div>

                    <div class="document-item">
                        Mekanisme Transaksi di Perdagangan Berjangka
                    </div>

                </div>

            </div>

        </div>



        {{-- STEP 04 --}}

        <div class="step">

            <div class="step-number">
                04
            </div>

            <div class="step-card">

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

        <div class="step">

            <div class="step-number">
                05
            </div>

            <div class="step-card">

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

        <div class="step">

            <div class="step-number">
                06
            </div>

            <div class="step-card">

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

    <div class="bank-section">

        <div class="section-heading">

            <h2>
                Rekening Terpisah
            </h2>

            <p>
                Rekening tujuan untuk melakukan transfer dana.
            </p>

        </div>


        <div class="bank-grid">


            {{-- BCA --}}

            <div class="bank-card">

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

            <div class="bank-card">

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

            <div class="bank-card">

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

            <div class="bank-card">

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

            <div class="bank-card">

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

    <div class="legal-section">

        <div class="section-heading">

            <h2>
                Link Legalitas
            </h2>

            <p>
                Informasi legalitas dan lembaga terkait.
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
                    JFX
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



    {{-- =========================================================
         PERINGATAN
    ========================================================== --}}

    <div class="warning">

        <h3>
            ⚠ Perhatian!
        </h3>

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