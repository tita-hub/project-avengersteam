@extends('layouts.app')

@section('content')

<style>
    .prosedur-page {
        width: 100%;
        box-sizing: border-box;
        padding: 45px 7%;
        background: #fff;
        font-family: Arial, sans-serif;
        color: #666;
    }

    .prosedur-page h1 {
        color: #111;
        font-size: 32px;
        font-weight: 700;
        margin: 0 0 30px;
    }

    .prosedur-page h2 {
        color: #111;
        font-size: 22px;
        margin-top: 35px;
        margin-bottom: 20px;
    }

    .prosedur-page p {
        font-size: 16px;
        line-height: 1.8;
        margin-bottom: 20px;
    }

    .prosedur-page ul {
        padding-left: 30px;
        margin-bottom: 30px;
    }

    .prosedur-page li {
        font-size: 16px;
        line-height: 1.8;
        margin-bottom: 12px;
    }

    .legalitas {
        margin-top: 60px;
    }

    .legalitas h2,
    .help h2,
    .perhatian h2 {
        color: #3dbb68;
        font-size: 24px;
        font-weight: 700;
    }

    .legalitas a,
    .help a {
        color: #333;
        text-decoration: none;
    }

    .legalitas a:hover,
    .help a:hover {
        color: #3dbb68;
    }

    .help {
        margin-top: 40px;
    }

    .perhatian {
        margin-top: 40px;
        padding: 25px;
        background: #f5f5f5;
        border-radius: 8px;
    }

    .perhatian p {
        color: #777;
    }
</style>


<div class="prosedur-page">

    <h1>Prosedur Penarikan</h1>

    <p>
        Penarikan Dana (Withdrawal) dapat dilakukan sewaktu-waktu oleh nasabah
        apabila nasabah menghendakinya, dengan catatan dana yang ditarik oleh
        nasabah tidak melebihi dari jumlah
        <strong>Effective Margin</strong> yang terdapat pada laporan transaksi
        harian nasabah (<strong>Statement Report</strong>).
    </p>


    <h2>Proses Penarikan Dana (Withdrawal)</h2>

    <ul>

        <li>
            Nasabah mengisi dan menandatangani Lembar Aplikasi Penarikan Dana
            (Withdrawal Form).
        </li>

        <li>
            Lembar Aplikasi Penarikan Dana (Withdrawal Form) yang sudah diisi
            dan ditandatangani oleh Nasabah diberikan ke PT. Rifan Financindo
            Berjangka untuk diproses.
        </li>

        <li>
            Penarikan Dana / Withdrawal Nasabah hanya dapat di transfer ke
            rekening atas nama nasabah bersangkutan yang tertera pada
            Aplikasi Pembukaan Rekening di dalam Buku Perjanjian.
        </li>

    </ul>


    <!-- LINK LEGALITAS -->

    <div class="legalitas">

        <h2>Link Legalitas</h2>

        <ul>

            <li>
                <a href="https://bappebti.go.id/pialang_berjangka/detail/012"
                   target="_blank">
                    BAPPEBTI
                </a>
            </li>

            <li>
                <a href="https://www.jfx.co.id/media?hal=daftar-pelaku&data=Pialang"
                   target="_blank">
                    Jakarta Futures Exchange (JFX)
                </a>
            </li>

            <li>
                <a href="https://www.ptkbi.com/index.php/c_kbi_wppue_01_anggota_mitra#PL"
                   target="_blank">
                    Kliring Berjangka Indonesia (KBI)
                </a>
            </li>

            <li>
                <a href="https://www.rf-berjangkasemarang.com/service-details.html"
                   target="_blank">
                    Aspebtindo
                </a>
            </li>

        </ul>

    </div>


    <!-- HELP -->

    <div class="help">

        <h2>Help</h2>

        <ul>

            <li>
                <a href="https://www.rf-berjangkasemarang.com/contact.html"
                   target="_blank">
                    Contact Us
                </a>
            </li>

            <li>
                <a href="https://www.rf-berjangkasemarang.com/faq.html"
                   target="_blank">
                    FAQs
                </a>
            </li>

        </ul>

    </div>


    <!-- PERHATIAN -->

    <div class="perhatian">

        <h2>Perhatian!</h2>

        <p>
            Managemen PT. Rifan Financindo Berjangka (PT RFB) menghimbau kepada
            seluruh masyarakat untuk lebih berhati-hati terhadap beberapa bentuk
            penipuan yang berkedok investasi mengatasnamakan PT RFB dengan
            menggunakan media elektronik ataupun sosial media.
        </p>

        <p>
            Untuk itu harus dipastikan bahwa transfer dana ke rekening tujuan
            (Segregated Account) guna melaksanakan transaksi Perdagangan
            Berjangka adalah atas nama PT Rifan Financindo Berjangka,
            bukan atas nama individu.
        </p>

    </div>

</div>

@endsection