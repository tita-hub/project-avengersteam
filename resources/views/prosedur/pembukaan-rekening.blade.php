```blade
@extends('layouts.app')

@section('content')

<div class="online-page">

    {{-- =====================================================
         KEMBALI
    ====================================================== --}}

    <div class="online-back">
        <a href="{{ url()->previous() }}">
            <span class="online-arrow">←</span>
            Kembali
        </a>
    </div>


    {{-- =====================================================
         HERO
    ====================================================== --}}

    <div class="online-hero">

        <div class="online-hero-line"></div>

        <div class="online-hero-content">

            <div class="online-label">
                Prosedur Pembukaan Rekening
            </div>

            <h1>
                Prosedur Registrasi
                <span>Online</span>
            </h1>

            <p class="online-hero-description">
                Panduan tahapan registrasi dan pembukaan rekening secara
                online bersama PT. Rifan Financindo Berjangka. Ikuti setiap
                proses dengan teliti agar proses registrasi dapat berjalan
                dengan lancar.
            </p>

            <div class="online-status">
                <span class="online-status-icon"></span>
                Ikuti setiap tahapan sesuai urutan yang telah ditentukan.
            </div>

        </div>

    </div>


    {{-- =====================================================
         PROSEDUR
    ====================================================== --}}

    <div class="online-section-title">

        <div class="online-title-row">

            <div class="online-title-icon">
                ✓
            </div>

            <h2>
                Prosedur Registrasi Online
            </h2>

        </div>

        <p>
            Berikut adalah tahapan registrasi dan pembukaan rekening
            secara online.
        </p>

    </div>


    {{-- =====================================================
         TIMELINE
    ====================================================== --}}

    <div class="online-timeline">


        {{-- STEP 01 --}}

        <div class="online-step">

            <div class="online-step-number">01</div>

            <div class="online-step-card">

                <h3>Membuka Website Perusahaan</h3>

                <p>
                    Calon Nasabah mengunjungi website resmi
                    PT Rifan Financindo Berjangka untuk memulai
                    proses registrasi online.
                </p>

            </div>

        </div>


        {{-- STEP 02 --}}

        <div class="online-step">

            <div class="online-step-number">02</div>

            <div class="online-step-card">

                <h3>Registrasi Akun Demo</h3>

                <p>
                    Calon Nasabah melakukan registrasi akun demo
                    sebagai bagian dari proses pengenalan sistem
                    dan simulasi transaksi perdagangan berjangka.
                </p>

                <div class="online-document-list">

                    <div class="online-document-item">
                        Memasukkan data diri
                    </div>

                    <div class="online-document-item">
                        Mendapatkan akses akun demo
                    </div>

                    <div class="online-document-item">
                        Melakukan simulasi transaksi
                    </div>

                </div>

            </div>

        </div>


        {{-- STEP 03 --}}

        <div class="online-step">

            <div class="online-step-number">03</div>

            <div class="online-step-card">

                <h3>Pengisian Dokumen Perjanjian</h3>

                <p>
                    Calon Nasabah melengkapi dokumen yang diperlukan
                    dalam proses pembukaan rekening.
                </p>

                <div class="online-document-list">

                    <div class="online-document-item">
                        Aplikasi Perjanjian
                    </div>

                    <div class="online-document-item">
                        Dokumen Pemberitahuan Adanya Risiko
                    </div>

                    <div class="online-document-item">
                        Perjanjian Pemberian Amanat (PPA)
                    </div>

                    <div class="online-document-item">
                        Mekanisme Transaksi (Trading Rules)
                    </div>

                    <div class="online-document-item">
                        Dokumen pendukung (KTP dan lainnya)
                    </div>

                </div>

            </div>

        </div>


        {{-- STEP 04 --}}

        <div class="online-step">

            <div class="online-step-number">04</div>

            <div class="online-step-card">

                <h3>Verifikasi oleh Wakil Pialang Berjangka</h3>

                <p>
                    Data yang telah diberikan akan melalui proses
                    verifikasi oleh Wakil Pialang Berjangka untuk
                    memastikan kesesuaian data pribadi dan bukti
                    penyetoran dana margin.
                </p>

            </div>

        </div>


        {{-- STEP 05 --}}

        <div class="online-step">

            <div class="online-step-number">05</div>

            <div class="online-step-card">

                <h3>Setoran Dana Margin ke Rekening Segregasi</h3>

                <p>
                    Setelah proses verifikasi, Nasabah melakukan
                    setoran dana margin ke rekening segregasi yang
                    telah ditentukan oleh PT Rifan Financindo Berjangka.
                </p>

                <p>
                    Informasi rekening bank tujuan tersedia pada bagian
                    <strong>Rekening Terpisah</strong> di bawah halaman ini.
                </p>

            </div>

        </div>


        {{-- STEP 06 --}}

        <div class="online-step">

            <div class="online-step-number">06</div>

            <div class="online-step-card">

                <h3>Pemrosesan Pendaftaran</h3>

                <p>
                    PT Rifan Financindo Berjangka memproses seluruh
                    data dan dokumen yang telah diberikan oleh calon
                    Nasabah.
                </p>

            </div>

        </div>


        {{-- STEP 07 --}}

        <div class="online-step">

            <div class="online-step-number">07</div>

            <div class="online-step-card">

                <h3>Aktivasi Akun</h3>

                <p>
                    Setelah seluruh proses verifikasi selesai, akun
                    akan diaktifkan dan data login akan dikirimkan
                    kepada Nasabah.
                </p>

            </div>

        </div>


        {{-- STEP 08 --}}

        <div class="online-step">

            <div class="online-step-number">08</div>

            <div class="online-step-card">

                <h3>Siap Melakukan Transaksi</h3>

                <p>
                    Setelah akun aktif, Nasabah dapat melakukan
                    transaksi di pasar berjangka komoditi sesuai
                    dengan ketentuan yang berlaku.
                </p>

            </div>

        </div>


    </div>


   {{-- =====================================================
     REKENING TERPISAH
====================================================== --}}

<div class="online-bank-section">

    <div class="online-section-title">

        <div class="online-title-row">

            <div class="online-title-icon">
                $
            </div>

            <h2>
                Rekening Terpisah
            </h2>

        </div>

        <p>
            Rekening tujuan untuk melakukan transfer dana.
        </p>

    </div>


    <div class="online-bank-grid">


        {{-- =================================================
             BCA
        ================================================== --}}

        <div class="online-bank-card">

            <div class="online-bank-icon">

                <img
                    src="{{ asset('images/bank/bca.png') }}"
                    alt="Bank BCA"
                >

            </div>

            <div class="online-bank-name">
                Bank BCA
            </div>

            <div class="online-bank-branch">
                Cabang Sudirman, Jakarta
            </div>

            <div class="online-bank-account">

                <div>
                    <span>IDR</span>
                    <strong>035 - 311 - 8975</strong>
                </div>

                <div>
                    <span>USD</span>
                    <strong>035 - 311 - 7600</strong>
                </div>

            </div>

        </div>


        {{-- =================================================
             CIMB NIAGA
        ================================================== --}}

        <div class="online-bank-card">

            <div class="online-bank-icon">

                <img
                    src="{{ asset('images/bank/cimb-niaga.png') }}"
                    alt="Bank CIMB Niaga"
                >

            </div>

            <div class="online-bank-name">
                Bank CIMB Niaga
            </div>

            <div class="online-bank-branch">
                Cabang Gajahmada, Jakarta
            </div>

            <div class="online-bank-account">

                <div>
                    <span>IDR</span>
                    <strong>800 - 12 - 97271 - 00</strong>
                </div>

                <div>
                    <span>USD</span>
                    <strong>800 - 01 - 20945 - 40</strong>
                </div>

            </div>

        </div>


        {{-- =================================================
             BNI
        ================================================== --}}

        <div class="online-bank-card">

            <div class="online-bank-icon">

                <img
                    src="{{ asset('images/bank/bni.png') }}"
                    alt="Bank BNI"
                >

            </div>

            <div class="online-bank-name">
                BNI Bank
            </div>

            <div class="online-bank-branch">
                Gambir Branch, Jakarta
            </div>

            <div class="online-bank-account">

                <div>
                    <span>IDR</span>
                    <strong>017 - 5008 - 590</strong>
                </div>

                <div>
                    <span>USD</span>
                    <strong>017 - 5020 - 200</strong>
                </div>

            </div>

        </div>


        {{-- =================================================
             MANDIRI
        ================================================== --}}

        <div class="online-bank-card">

            <div class="online-bank-icon">

                <img
                    src="{{ asset('images/bank/mandiri.png') }}"
                    alt="Bank Mandiri"
                >

            </div>

            <div class="online-bank-name">
                Bank Mandiri
            </div>

            <div class="online-bank-branch">
                Cabang Imam Bonjol, Jakarta
            </div>

            <div class="online-bank-account">

                <div>
                    <span>IDR</span>
                    <strong>122 - 000 - 664 - 2881</strong>
                </div>

                <div>
                    <span>USD</span>
                    <strong>122 - 000 - 664 - 2873</strong>
                </div>

            </div>

        </div>


        {{-- =================================================
             ARTHA GRAHA
        ================================================== --}}

        <div class="online-bank-card">

            <div class="online-bank-icon">

                <img
                    src="{{ asset('images/bank/artha-graha.png') }}"
                    alt="Bank Artha Graha"
                >

            </div>

            <div class="online-bank-name">
                Bank Artha Graha
            </div>

            <div class="online-bank-branch">
                Cabang KPO Sudirman, Jakarta
            </div>

            <div class="online-bank-account">

                <div>
                    <span>IDR</span>
                    <strong>107 - 996 - 3271</strong>
                </div>

            </div>

        </div>


        {{-- =================================================
             BRI
        ================================================== --}}

        <div class="online-bank-card">

            <div class="online-bank-icon">

                <img
                    src="{{ asset('images/bank/bri.png') }}"
                    alt="Bank BRI"
                >

            </div>

            <div class="online-bank-name">
                Bank BRI
            </div>

            <div class="online-bank-branch">
                Ciputat Tangerang
            </div>

            <div class="online-bank-account">

                <div>
                    <span>IDR</span>
                    <strong>038201001512303</strong>
                </div>

            </div>

        </div>


    </div>

</div>

    {{-- =====================================================
         WARNING
    ====================================================== --}}

    <div class="online-warning">

        <div class="online-warning-title">

            <span class="online-warning-icon">
                !
            </span>

            Perhatian!

        </div>

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


{{-- ============================================================
     JAVASCRIPT ANIMASI SCROLL
============================================================ --}}

<script>
document.addEventListener('DOMContentLoaded', function () {

    const revealElements = document.querySelectorAll(
        '.online-section-title,' +
        '.online-step,' +
        '.online-bank-section,' +
        '.online-warning'
    );

    const revealObserver = new IntersectionObserver(
        function (entries, observer) {

            entries.forEach(function (entry) {

                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                    observer.unobserve(entry.target);
                }

            });

        },
        {
            threshold: 0.12,
            rootMargin: '0px 0px -60px 0px'
        }
    );

    revealElements.forEach(function (element) {
        revealObserver.observe(element);
    });

});
</script>

@endsection