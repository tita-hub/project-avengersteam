@extends('layouts.app')

@section('content')

<div class="withdrawal-page">

<div class="withdrawal-container">


    {{-- ========================================================
         BACK
    ========================================================= --}}

    <div class="withdrawal-back">

        <a href="{{ url()->previous() }}">

            <span class="withdrawal-back-icon">
                ←
            </span>

            Kembali

        </a>

    </div>



    {{-- ========================================================
         HERO
    ========================================================= --}}

    <section class="withdrawal-hero">

        <div class="hero-orbit"></div>
        <div class="hero-dot"></div>

        <div class="withdrawal-hero-content">

            <div class="withdrawal-label">

                <span class="withdrawal-label-dot"></span>

                Prosedur Transaksi

            </div>


            <h1>

                Prosedur

                <span>
                    Penarikan Dana
                </span>

            </h1>


            <p class="withdrawal-hero-description">

                Penarikan dana dapat dilakukan kapan saja melalui
                <strong>platform trading</strong>
                selama dana tersedia dan tidak melampaui
                <strong>Effective Margin</strong>
                pada <strong>Statement Report</strong>.

            </p>


            <div class="withdrawal-status">

                <span class="status-icon">
                    ✓
                </span>

                Ikuti setiap tahapan sesuai prosedur yang telah ditentukan.

            </div>

        </div>

    </section>



    {{-- ========================================================
         IMPORTANT INFO
    ========================================================= --}}

    <section class="withdrawal-info">

        <div class="info-icon">
            !
        </div>

        <div>

            <h3>
                Perhatikan Effective Margin
            </h3>

            <p>

                Penarikan dana hanya dapat dilakukan selama
                dana tersedia dan tidak melampaui
                <strong>Effective Margin</strong>
                yang terdapat pada
                <strong>Statement Report</strong>.

            </p>

        </div>

        <div class="info-badge">
            PENTING
        </div>

    </section>



    {{-- ========================================================
         SECTION TITLE
    ========================================================= --}}

    <section class="withdrawal-section-heading">

        <div class="heading-row">

            <div class="heading-icon">
                ↓
            </div>

            <div>

                <h2>
                    Prosedur Penarikan Dana
                </h2>

            </div>

        </div>

        <p>
            Ikuti enam tahapan berikut untuk melakukan
            penarikan dana (Withdrawal).
        </p>

    </section>



    {{-- ========================================================
         PROCESS
    ========================================================= --}}

    <section class="withdrawal-process">


        {{-- ====================================================
             STEP 01
        ===================================================== --}}

        <div class="withdrawal-step">

            <div class="step-number">
                01
            </div>


            <div class="withdrawal-card">

                <div class="card-top">

                    <h3>
                        Ajukan Withdrawal
                    </h3>

                    <span class="step-tag">
                        Tahap 01
                    </span>

                </div>


                <p>

                    Masuk ke akun riil Anda pada
                    <strong>
                        platform trading
                    </strong>
                    lalu pilih menu
                    <strong>
                        Withdrawal
                    </strong>.

                </p>

            </div>

        </div>



        {{-- ====================================================
             STEP 02
        ===================================================== --}}

        <div class="withdrawal-step">

            <div class="step-number">
                02
            </div>


            <div class="withdrawal-card">

                <div class="card-top">

                    <h3>
                        Isi Formulir Online
                    </h3>

                    <span class="step-tag">
                        Tahap 02
                    </span>

                </div>


                <p>

                    Lengkapi formulir permohonan penarikan dana
                    dengan data yang benar, termasuk jumlah
                    penarikan dan rekening bank tujuan.

                </p>

            </div>

        </div>



        {{-- ====================================================
             STEP 03
        ===================================================== --}}

        <div class="withdrawal-step">

            <div class="step-number">
                03
            </div>


            <div class="withdrawal-card">

                <div class="card-top">

                    <h3>
                        Verifikasi Rekening
                    </h3>

                    <span class="step-tag">
                        Tahap 03
                    </span>

                </div>


                <p>

                    Penarikan hanya dapat dilakukan ke rekening
                    bank atas nama
                    <strong>
                        Nasabah
                    </strong>
                    yang sudah terdaftar pada dokumen
                    pembukaan rekening.

                </p>

            </div>

        </div>



        {{-- ====================================================
             STEP 04
        ===================================================== --}}

        <div class="withdrawal-step">

            <div class="step-number">
                04
            </div>


            <div class="withdrawal-card">

                <div class="card-top">

                    <h3>
                        Proses Validasi
                    </h3>

                    <span class="step-tag">
                        Tahap 04
                    </span>

                </div>


                <p>

                    Tim operasional akan memeriksa ketersediaan
                    dana, kecocokan data, serta status transaksi
                    Anda sebelum memproses permohonan.

                </p>

            </div>

        </div>



        {{-- ====================================================
             STEP 05
        ===================================================== --}}

        <div class="withdrawal-step">

            <div class="step-number">
                05
            </div>


            <div class="withdrawal-card">

                <div class="card-top">

                    <h3>
                        Penyelesaian Transfer
                    </h3>

                    <span class="step-tag">
                        Tahap 05
                    </span>

                </div>


                <p>

                    Proses penarikan dana membutuhkan waktu
                    maksimal
                    <strong>
                        T+3 hari kerja
                    </strong>,
                    dengan komitmen penyelesaian lebih cepat
                    yaitu
                    <strong>
                        T+1 hari kerja
                    </strong>
                    apabila memungkinkan.

                </p>

            </div>

        </div>



        {{-- ====================================================
             STEP 06
        ===================================================== --}}

        <div class="withdrawal-step">

            <div class="step-number">
                06
            </div>


            <div class="withdrawal-card">

                <div class="card-top">

                    <h3>
                        Notifikasi Berhasil
                    </h3>

                    <span class="step-tag">
                        Tahap 06
                    </span>

                </div>


                <p>

                    Anda akan menerima notifikasi setelah dana
                    berhasil ditransfer ke rekening Anda.

                </p>

            </div>

        </div>


    </section>



    {{-- ========================================================
         WARNING
    ========================================================= --}}

    <section class="withdrawal-warning">

        <div class="warning-title">

            <span class="warning-icon">
                !
            </span>

            Perhatian!

        </div>


        <p>

            Pastikan seluruh data yang Anda masukkan
            pada proses penarikan dana telah sesuai
            dengan data rekening yang terdaftar.

        </p>


        <p>

            Pastikan proses penarikan dana dilakukan melalui
            <strong>
                platform dan prosedur resmi
            </strong>
            untuk menjaga keamanan transaksi Anda.

        </p>

    </section>


</div>

</div>

@endsection