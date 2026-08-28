@extends('layouts.app')

@section('content')

<style>

    /* ============================================================
       PEMBUKAAN REKENING
       ============================================================ */

    .rekening-page {
        padding: 50px 40px 70px;
        background: #f5f7fb;
        min-height: 100vh;
        box-sizing: border-box;
    }


    /* ============================================================
       HEADER
       ============================================================ */

    .rekening-header {
        text-align: center;
        margin-bottom: 45px;
        animation: fadeDown 0.7s ease;
    }

    .rekening-header h1 {
        margin: 0;
        color: #172033;
        font-size: 42px;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .rekening-header p {
        margin: 12px 0 18px;
        color: #737b87;
        font-size: 17px;
    }

    .header-line {
        width: 55px;
        height: 4px;
        background: #27a84a;
        margin: auto;
        border-radius: 10px;
    }


    /* ============================================================
       CARD CONTAINER
       ============================================================ */

    .rekening-container {
        display: flex;
        justify-content: center;
        align-items: stretch;
        gap: 30px;
        flex-wrap: wrap;
        max-width: 1000px;
        margin: auto;
    }


    /* ============================================================
       CARD
       ============================================================ */

    .rekening-card {
        position: relative;

        width: 390px;

        background: #ffffff;

        border-radius: 18px;

        padding: 35px;

        text-align: center;

        box-sizing: border-box;

        border: 1px solid #edf0f2;

        box-shadow:
            0 8px 25px rgba(0, 0, 0, 0.05);

        overflow: hidden;

        opacity: 0;

        animation: cardMuncul 0.8s ease forwards;

        transition:
            transform 0.35s ease,
            box-shadow 0.35s ease,
            border-color 0.35s ease;
    }

    .rekening-card:nth-child(2) {
        animation-delay: 0.15s;
    }


    /* garis hijau bagian atas */

    .rekening-card::before {
        content: "";

        position: absolute;

        top: 0;
        left: 0;

        width: 100%;
        height: 4px;

        background: #27a84a;

        transform: scaleX(0);

        transform-origin: center;

        transition: transform 0.35s ease;
    }

    .rekening-card:hover::before {
        transform: scaleX(1);
    }


    /* hover card */

    .rekening-card:hover {
        transform: translateY(-8px);

        border-color: #cdebd5;

        box-shadow:
            0 18px 40px rgba(39, 168, 74, 0.12);
    }


    /* ============================================================
       ICON
       ============================================================ */

    .rekening-icon {
        width: 88px;
        height: 88px;

        margin: 0 auto 22px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #eaf7ee;

        border-radius: 16px;

        font-size: 40px;

        transition:
            transform 0.35s ease,
            background 0.35s ease;
    }

    .rekening-card:hover .rekening-icon {
        transform: translateY(-3px) scale(1.05);

        background: #dff3e6;
    }


    /* ============================================================
       LABEL
       ============================================================ */

    .rekening-label {
        display: inline-block;

        margin-bottom: 8px;

        color: #27a84a;

        font-size: 12px;

        font-weight: 700;

        letter-spacing: 1px;

        text-transform: uppercase;
    }


    /* ============================================================
       TITLE
       ============================================================ */

    .rekening-card h2 {
        margin: 0 0 15px;

        color: #172033;

        font-size: 29px;

        font-weight: 700;
    }


    /* ============================================================
       DESCRIPTION
       ============================================================ */

    .rekening-description {
        color: #747b86;

        font-size: 15px;

        line-height: 1.75;

        min-height: 105px;

        margin: 0;
    }


    /* ============================================================
       FEATURE LIST
       ============================================================ */

    .rekening-features {
        list-style: none;

        padding: 0;

        margin: 22px 0 0;

        text-align: left;
    }

    .rekening-features li {
        display: flex;

        align-items: center;

        gap: 10px;

        margin-bottom: 11px;

        color: #4b5563;

        font-size: 14px;
    }

    .check {
        width: 19px;
        height: 19px;

        display: flex;
        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        background: #27a84a;

        color: white;

        border-radius: 50%;

        font-size: 11px;

        font-weight: bold;
    }


    /* ============================================================
       BUTTON
       ============================================================ */

    .rekening-button-wrapper {
        margin-top: 25px;
    }

    .rekening-button {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 10px;

        min-width: 160px;

        padding: 13px 24px;

        background: #e0f5e6;

        color: #168a3e;

        border-radius: 9px;

        text-decoration: none;

        font-size: 14px;

        font-weight: 700;

        transition:
            background 0.3s ease,
            color 0.3s ease,
            transform 0.3s ease,
            box-shadow 0.3s ease;
    }

    .rekening-button:hover {
        background: #168f42;

        color: #ffffff;

        transform: translateY(-2px);

        box-shadow:
            0 7px 18px rgba(22, 143, 66, 0.20);
    }

    .arrow {
        font-size: 17px;

        transition: transform 0.3s ease;
    }

    .rekening-button:hover .arrow {
        transform: translateX(5px);
    }


    /* ============================================================
       ANIMATION
       ============================================================ */

    @keyframes cardMuncul {

        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }

    }


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


    /* ============================================================
       RESPONSIVE
       ============================================================ */

    @media (max-width: 800px) {

        .rekening-page {
            padding: 35px 20px 50px;
        }

        .rekening-header h1 {
            font-size: 35px;
        }

        .rekening-container {
            flex-direction: column;
            align-items: center;
        }

        .rekening-card {
            width: 100%;
            max-width: 430px;
        }

    }


    @media (max-width: 500px) {

        .rekening-header h1 {
            font-size: 30px;
        }

        .rekening-header p {
            font-size: 15px;
        }

        .rekening-card {
            padding: 30px 25px;
        }

    }

</style>


<div class="rekening-page">


    {{-- =========================================================
         HEADER
    ========================================================== --}}

    <div class="rekening-header">

        <h1>
            Pembukaan Rekening
        </h1>

        <p>
            Pilih metode pembukaan rekening yang sesuai dengan kebutuhan Anda.
        </p>

        <div class="header-line"></div>

    </div>



    {{-- =========================================================
         CARD CONTAINER
    ========================================================== --}}

    <div class="rekening-container">


        {{-- =====================================================
             REGULAR
        ====================================================== --}}

        <div class="rekening-card">

            <div class="rekening-icon">
                👤
            </div>

            <div class="rekening-label">
                Metode 01
            </div>

            <h2>
                Regular
            </h2>

            <p class="rekening-description">

                Pembukaan rekening secara regular
                dengan bertemu langsung dengan
                Wakil Pialang Berjangka
                PT. Rifan Financindo Berjangka.

            </p>


            <ul class="rekening-features">

                <li>
                    <span class="check">✓</span>
                    Konsultasi langsung dengan wakil pialang
                </li>

                <li>
                    <span class="check">✓</span>
                    Bantuan pengisian dokumen
                </li>

                <li>
                    <span class="check">✓</span>
                    Verifikasi dokumen di tempat
                </li>

                <li>
                    <span class="check">✓</span>
                    Pendampingan selama proses
                </li>

            </ul>


            <div class="rekening-button-wrapper">

                <a
                    href="{{ route('prosedur.regular') }}"
                    class="rekening-button"
                >

                    View Details

                    <span class="arrow">
                        →
                    </span>

                </a>

            </div>

        </div>



        {{-- =====================================================
             ONLINE
        ====================================================== --}}

        <div class="rekening-card">

            <div class="rekening-icon">
                🖥️
            </div>

            <div class="rekening-label">
                Metode 02
            </div>

            <h2>
                Online
            </h2>

            <p class="rekening-description">

                Pembukaan rekening secara online
                dengan mengisi form pembukaan
                rekening secara praktis dan mudah.

            </p>


            <ul class="rekening-features">

                <li>
                    <span class="check">✓</span>
                    Dapat dilakukan kapan saja
                </li>

                <li>
                    <span class="check">✓</span>
                    Pengisian formulir secara online
                </li>

                <li>
                    <span class="check">✓</span>
                    Upload dokumen secara digital
                </li>

                <li>
                    <span class="check">✓</span>
                    Proses praktis dan efisien
                </li>

            </ul>


            <div class="rekening-button-wrapper">

                <a
                    href="{{ route('prosedur.online') }}"
                    class="rekening-button"
                >

                    View Details

                    <span class="arrow">
                        →
                    </span>

                </a>

            </div>

        </div>


    </div>

</div>

@endsection