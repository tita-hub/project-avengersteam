@extends('layouts.app')

@section('content')

<div class="transaction-page">


    {{-- =========================================================
         KEMBALI
    ========================================================== --}}

    <div class="transaction-back">

        <a href="{{ url()->previous() }}">

            <span class="transaction-back-arrow">
                ←
            </span>

            Kembali

        </a>

    </div>



    {{-- =========================================================
         HERO
    ========================================================== --}}

    <div class="transaction-header">

        <div class="transaction-header-line"></div>

        <div class="transaction-header-decoration"></div>

        <div class="transaction-header-content">

            <div class="transaction-header-label">
                Panduan Transaksi
            </div>

            <h1>
                Petunjuk
                <span>Transaksi</span>
            </h1>

            <p>
                Nasabah dapat menyampaikan amanat transaksi secara online
                melalui platform trading yang disediakan. Untuk kenyamanan
                dan meminimalkan risiko kesalahan, disarankan Nasabah
                melakukan simulasi <strong>demo trading</strong> terlebih
                dahulu sebelum menggunakan akun riil.
            </p>

            <div class="transaction-status">

                <span class="transaction-status-dot"></span>

                Pastikan memahami prosedur sebelum melakukan transaksi.

            </div>

        </div>

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

    <div class="transaction-section-title">

        <div class="transaction-title-row">

            <div class="transaction-title-icon">
                ✓
            </div>

            <h2>
                Tahapan Transaksi Online
            </h2>

        </div>

        <p>
            Ikuti langkah berikut untuk mengakses platform trading.
        </p>

    </div>



    {{-- =========================================================
         TIMELINE
    ========================================================== --}}

    <div class="transaction-timeline">


        {{-- STEP 01 --}}

        <div class="transaction-step">

            <div class="transaction-step-number">
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



        {{-- STEP 02 --}}

        <div class="transaction-step">

            <div class="transaction-step-number">
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
                        href="https://demo.rifanberjangka.com/login"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        Buka Platform Trading
                        <span>→</span>
                    </a>

                </div>

            </div>

        </div>



        {{-- STEP 03 --}}

        <div class="transaction-step">

            <div class="transaction-step-number">
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
         KEAMANAN
    ========================================================== --}}

    <div class="transaction-security">

        <div class="transaction-security-title">

            <span class="transaction-security-icon">
                !
            </span>

            Jaga Kerahasiaan Akun

        </div>

        <p>
            User ID dan Password merupakan informasi pribadi.
            Jangan membagikan kredensial akun kepada pihak lain
            dan pastikan Anda selalu menggunakan platform trading
            resmi yang diberikan oleh
            <strong>PT. Rifan Financindo Berjangka</strong>.
        </p>

    </div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | SCROLL REVEAL
    |--------------------------------------------------------------------------
    */

    const revealItems = document.querySelectorAll(
        '.transaction-step, .transaction-security, .transaction-legal-card'
    );

    const observer = new IntersectionObserver(
        function(entries, obs) {

            entries.forEach(function(entry) {

                if (entry.isIntersecting) {

                    entry.target.classList.add('show');

                    obs.unobserve(entry.target);
                }

            });

        },
        {
            threshold: 0.15,
            rootMargin: '0px 0px -60px 0px'
        }
    );


    revealItems.forEach(function(item) {

        observer.observe(item);

    });


    /*
    |--------------------------------------------------------------------------
    | TIMELINE PROGRESS
    |--------------------------------------------------------------------------
    */

    const timeline =
        document.querySelector('.transaction-timeline');


    if (timeline) {

        const timelineObserver =
            new IntersectionObserver(
                function(entries, obs) {

                    entries.forEach(function(entry) {

                        if (entry.isIntersecting) {

                            timeline.classList.add(
                                'timeline-active'
                            );

                            obs.unobserve(entry.target);
                        }

                    });

                },
                {
                    threshold: 0.2
                }
            );


        timelineObserver.observe(timeline);

    }


    /*
    |--------------------------------------------------------------------------
    | CARD TILT HALUS
    |--------------------------------------------------------------------------
    */

    const cards =
        document.querySelectorAll(
            '.transaction-card'
        );


    cards.forEach(function(card) {

        card.addEventListener(
            'mousemove',
            function(e) {

                if (window.innerWidth <= 700) {
                    return;
                }

                const rect =
                    card.getBoundingClientRect();

                const x =
                    e.clientX - rect.left;

                const y =
                    e.clientY - rect.top;

                const centerX =
                    rect.width / 2;

                const centerY =
                    rect.height / 2;

                const rotateX =
                    ((y - centerY) / centerY) * -1.2;

                const rotateY =
                    ((x - centerX) / centerX) * 1.2;


                card.style.transform =
                    `
                    translateX(6px)
                    translateY(-3px)
                    perspective(900px)
                    rotateX(${rotateX}deg)
                    rotateY(${rotateY}deg)
                    `;
            }
        );


        card.addEventListener(
            'mouseleave',
            function() {

                card.style.transform = '';

            }
        );

    });


    /*
    |--------------------------------------------------------------------------
    | SMOOTH BACK BUTTON
    |--------------------------------------------------------------------------
    */

    const backButton =
        document.querySelector(
            '.transaction-back a'
        );


    if (backButton) {

        backButton.addEventListener(
            'mouseenter',
            function() {

                const arrow =
                    this.querySelector(
                        '.transaction-back-arrow'
                    );

                if (arrow) {

                    arrow.style.transform =
                        'translateX(-3px) scale(1.05)';
                }

            }
        );


        backButton.addEventListener(
            'mouseleave',
            function() {

                const arrow =
                    this.querySelector(
                        '.transaction-back-arrow'
                    );

                if (arrow) {

                    arrow.style.transform = '';
                }

            }
        );

    }

});

</script>

@endsection