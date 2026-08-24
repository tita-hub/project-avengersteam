@extends('layouts.app')

@section('content')

<div style="
    padding: 50px;
    background: #f5f7fb;
    min-height: 100vh;
">

    <div style="
        max-width: 1000px;
        margin: auto;
        background: white;
        padding: 45px;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.06);
    ">

        <h1 style="
            font-size: 32px;
            margin-bottom: 35px;
            color: #111;
        ">
            Prosedur Pembuatan Akun Online
        </h1>


        <!-- 1. REGISTRASI DEMO ACCOUNT -->
        <h3 style="margin-top: 25px;">
            Registrasi Demo Account
        </h3>

        <ul style="line-height: 1.8;">

            <li>
                Memasukkan Data
            </li>

            <li>
                Mendapatkan akun Demo
            </li>

            <li>
                Melakukan Simulasi Transaksi
            </li>

        </ul>


        <!-- 2. DOKUMEN PERJANJIAN -->
        <h3 style="margin-top: 30px;">
            Masukan Dokumen Perjanjian, antara lain:
        </h3>

        <ul style="line-height: 1.8;">

            <li>
                Aplikasi Perjanjian
            </li>

            <li>
                Dokumen Pemberitahuan Adanya Risiko
            </li>

            <li>
                Perjanjian Pemberian Amanat (PPA)
            </li>

            <li>
                Mekanisme Transaksi (Trading Rules)
            </li>

            <li>
                Masukan data pendukung (KTP dan Lainnya)
            </li>

        </ul>


        <!-- 3. VERIFIKASI DATA -->
        <h3 style="margin-top: 30px;">
            Wakil Pialang Berjangka yang ditunjuk melakukan
            verifikasi data Calon Nasabah, yaitu:
        </h3>

        <ul style="line-height: 1.8;">

            <li>
                Data pribadi Calon Nasabah
            </li>

            <li>
                Penyetoran dana Margin Calon Nasabah ke rekening
                terpisah (segregated account) PT Rifan Financindo Berjangka.
            </li>

        </ul>


        <!-- REKENING BANK -->
        <div style="
            margin-top: 20px;
            padding: 25px;
            background: #f8f9fb;
            border-radius: 12px;
            border-left: 4px solid #38b963;
        ">

            <p>
                <strong>
                    Bank BCA - Cabang Sudirman, Jakarta
                </strong>
            </p>

            <p>
                IDR : 035 – 311 – 8975
                <br>
                USD : 035 – 311 – 7600
            </p>


            <p>
                <strong>
                    Bank CIMB Niaga - Cabang Gajahmada, Jakarta
                </strong>
            </p>

            <p>
                IDR : 800 – 12 – 97271 – 00
                <br>
                USD : 800 – 01 – 20945 – 40
            </p>


            <p>
                <strong>
                    BNI Bank - Gambir branch, Jakarta
                </strong>
            </p>

            <p>
                IDR : 017 – 5008 – 590
                <br>
                USD : 017 – 5020 – 200
            </p>


            <p>
                <strong>
                    Bank Mandiri - Cabang Imam Bonjol, Jakarta
                </strong>
            </p>

            <p>
                IDR : 122 - 000 - 664 - 2881
                <br>
                USD : 122 - 000 - 664 – 2873
            </p>


            <p>
                <strong>
                    Artha Graha Bank, KPO Sudirman Branch, Jakarta
                </strong>
            </p>

            <p>
                IDR Account Number : 107-996-63271
            </p>

        </div>


        <!-- 4 -->
        <ul style="line-height: 1.8; margin-top: 30px;">

            <li>
                PT Rifan Financindo Berjangka memproses pendaftaran tersebut.
            </li>

            <li>
                PT Rifan Financindo Berjangka melakukan aktivasi akun
                kepada Calon Nasabah.
            </li>

            <li>
                Calon Nasabah tersebut kini menjadi Nasabah dan dapat
                melakukan transaksi.
            </li>

        </ul>


        <!-- LINK LEGALITAS -->
        <h3 style="margin-top: 40px;">
            Link Legalitas
        </h3>

        <ul style="line-height: 2;">

            <li>
                <a
                    href="https://bappebti.go.id/pialang_berjangka/detail/012"
                    target="_blank"
                >
                    BAPPEBTI
                </a>
            </li>

            <li>
                <a
                    href="https://www.jfx.co.id/media?hal=daftar-pelaku&data=Pialang"
                    target="_blank"
                >
                    JFX
                </a>
            </li>

            <li>
                <a
                    href="https://www.ptkbi.com/index.php/c_kbi_wppue_01_anggota_mitra#PL"
                    target="_blank"
                >
                    KBI
                </a>
            </li>

            <li>
                <a
                    href="https://www.rf-berjangkasemarang.com/service-details.html"
                    target="_blank"
                >
                    ASPEBTINDO
                </a>
            </li>

        </ul>


        <!-- HELP -->
        <h3 style="margin-top: 40px;">
            Help
        </h3>

        <ul style="line-height: 2;">

            <li>
                <a
                    href="https://www.rf-berjangkasemarang.com/contact.html"
                    target="_blank"
                >
                    Contact Us
                </a>
            </li>

            <li>
                <a
                    href="https://www.rf-berjangkasemarang.com/faq.html"
                    target="_blank"
                >
                    FAQs
                </a>
            </li>

        </ul>


        <!-- PERHATIAN -->
        <div style="
            margin-top: 40px;
            padding: 25px;
            background: #fff8e6;
            border-radius: 12px;
            border-left: 4px solid #f0ad00;
        ">

            <h3 style="margin-top: 0;">
                ⚠ Perhatian!
            </h3>

            <p style="line-height: 1.8;">
                Managemen PT. Rifan Financindo Berjangka (PT RFB)
                menghimbau kepada seluruh masyarakat untuk lebih berhati-hati
                terhadap beberapa bentuk penipuan yang berkedok investasi
                mengatasnamakan PT RFB dengan menggunakan media elektronik
                ataupun sosial media.
            </p>

            <p style="line-height: 1.8;">
                Untuk itu harus dipastikan bahwa transfer dana ke rekening
                tujuan (Segregated Account) guna melaksanakan transaksi
                Perdagangan Berjangka adalah atas nama PT Rifan Financindo
                Berjangka, bukan atas nama individu.
            </p>

        </div>


        <!-- FOOTER LINK -->
        <div style="
            margin-top: 40px;
            padding-top: 25px;
            border-top: 1px solid #eee;
        ">

            <a
                href="https://www.rf-berjangkasemarang.com/index.html"
                target="_blank"
            >
                Wallet
            </a>

            <div style="margin-top: 15px;">

                <a
                    href="https://www.rf-berjangkasemarang.com/privacy-policy.html"
                    target="_blank"
                >
                    Privacy Policy
                </a>

                <span style="margin: 0 10px;">|</span>

                <a
                    href="https://www.rf-berjangkasemarang.com/terms.html"
                    target="_blank"
                >
                    Terms & Conditions
                </a>

            </div>

        </div>

    </div>

</div>

@endsection