@extends('layouts.app')

@section('content')

<style>

/* ============================================================
   PEMBUKAAN REKENING
   TEMA : NAVY + ORANGE
   ============================================================ */

.rekening-page {
    --navy: #0b1f3a;
    --navy-dark: #07162b;
    --navy-soft: #132d50;

    --orange: #f28c28;
    --orange-dark: #d96f0b;
    --orange-soft: #fff4e8;

    padding: 35px 45px 70px;

    background:
        radial-gradient(
            circle at top right,
            rgba(242,140,40,.08),
            transparent 30%
        ),
        #f4f6fa;

    min-height: 100vh;

    box-sizing: border-box;
}


/* ============================================================
   HEADER / HERO
   ============================================================ */

.rekening-header {
    max-width: 1050px;

    margin: 0 auto 45px;

    position: relative;

    overflow: hidden;

    padding: 42px 45px;

    border-radius: 24px;

    background:
        linear-gradient(
            135deg,
            var(--navy-dark) 0%,
            var(--navy) 65%,
            #163861 100%
        );

    color: white;

    box-shadow:
        0 18px 45px rgba(11,31,58,.18);

    text-align: left;

    animation: rekeningHeroMasuk .7s ease;
}


/* garis orange atas */

.rekening-header::before {
    content: "";

    position: absolute;

    left: 0;
    top: 0;

    width: 100%;
    height: 5px;

    background:
        linear-gradient(
            90deg,
            var(--orange),
            #ffb45e
        );
}


/* dekorasi kanan atas */

.rekening-header::after {
    content: "";

    position: absolute;

    width: 250px;
    height: 250px;

    right: -90px;
    top: -120px;

    border-radius: 50%;

    background:
        rgba(242,140,40,.15);
}


/* isi header */

.rekening-header-content {
    position: relative;

    z-index: 2;

    max-width: 780px;
}


/* label */

.rekening-header-label {
    display: inline-flex;

    align-items: center;

    gap: 8px;

    padding: 7px 13px;

    margin-bottom: 17px;

    border-radius: 30px;

    background:
        rgba(242,140,40,.14);

    border:
        1px solid rgba(242,140,40,.35);

    color: #ffb45e;

    font-size: 11px;

    font-weight: 800;

    letter-spacing: 1.2px;

    text-transform: uppercase;
}


.rekening-header-label::before {
    content: "";

    width: 7px;
    height: 7px;

    border-radius: 50%;

    background: var(--orange);

    box-shadow:
        0 0 0 5px rgba(242,140,40,.12);
}


/* judul */

.rekening-header h1 {
    margin: 0 0 12px;

    color: white;

    font-size: 38px;

    line-height: 1.2;

    font-weight: 800;

    letter-spacing: 0;
}


.rekening-header h1 span {
    color: var(--orange);
}


/* deskripsi */

.rekening-header p {
    margin: 0;

    max-width: 720px;

    color:
        rgba(255,255,255,.75);

    font-size: 15px;

    line-height: 1.8;
}


/* status */

.rekening-header-status {
    display: inline-flex;

    align-items: center;

    gap: 10px;

    margin-top: 23px;

    padding: 10px 15px;

    background:
        rgba(255,255,255,.07);

    border:
        1px solid rgba(255,255,255,.09);

    border-radius: 12px;

    color:
        rgba(255,255,255,.82);

    font-size: 12px;
}


.rekening-status-dot {
    width: 8px;
    height: 8px;

    flex-shrink: 0;

    border-radius: 50%;

    background: #42d77d;

    box-shadow:
        0 0 0 5px rgba(66,215,125,.10);
}


/* ============================================================
   SECTION TITLE
   ============================================================ */

.rekening-section-title {
    max-width: 1050px;

    margin: 0 auto 22px;
}


.rekening-title-row {
    display: flex;

    align-items: center;

    gap: 13px;
}


.rekening-title-icon {
    width: 43px;
    height: 43px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 13px;

    background: var(--navy);

    color: var(--orange);

    font-size: 19px;

    font-weight: 900;

    box-shadow:
        0 8px 20px rgba(11,31,58,.15);
}


.rekening-section-title h2 {
    margin: 0;

    color: var(--navy);

    font-size: 25px;

    font-weight: 800;
}


.rekening-section-title p {
    margin: 5px 0 0 56px;

    color: #7b8491;

    font-size: 13px;
}


/* ============================================================
   CARD CONTAINER
   ============================================================ */

.rekening-container {
    max-width: 1050px;

    margin: 0 auto;

    display: grid;

    grid-template-columns:
        repeat(2, minmax(0, 1fr));

    gap: 22px;

    align-items: stretch;
}


/* ============================================================
   CARD
   ============================================================ */

.rekening-card {
    position: relative;

    display: flex;

    flex-direction: column;

    min-width: 0;

    padding: 30px;

    background: white;

    border:
        1px solid #e4e8ee;

    border-radius: 19px;

    box-sizing: border-box;

    overflow: hidden;

    box-shadow:
        0 7px 22px rgba(11,31,58,.055);

    opacity: 0;

    animation:
        rekeningCardMasuk .7s ease forwards;

    transition:
        transform .3s ease,
        box-shadow .3s ease,
        border-color .3s ease;
}


.rekening-card:nth-child(2) {
    animation-delay: .12s;
}


/* garis orange */

.rekening-card::before {
    content: "";

    position: absolute;

    left: 0;
    top: 0;

    width: 100%;
    height: 4px;

    background:
        linear-gradient(
            90deg,
            var(--orange),
            #ffb45e
        );

    transform:
        scaleX(0);

    transform-origin: left;

    transition:
        transform .35s ease;
}


.rekening-card:hover::before {
    transform: scaleX(1);
}


/* efek cahaya */

.rekening-card::after {
    content: "";

    position: absolute;

    width: 150px;
    height: 150px;

    right: -85px;
    bottom: -85px;

    border-radius: 50%;

    background:
        rgba(242,140,40,.045);

    transition:
        transform .4s ease;
}


.rekening-card:hover::after {
    transform:
        scale(1.4);
}


/* hover */

.rekening-card:hover {
    transform:
        translateY(-7px);

    border-color:
        rgba(242,140,40,.4);

    box-shadow:
        0 18px 38px rgba(11,31,58,.10);
}


/* ============================================================
   CARD TOP
   ============================================================ */

.rekening-card-top {
    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 15px;

    margin-bottom: 22px;
}


/* ============================================================
   ICON
   ============================================================ */

.rekening-icon {
    width: 67px;
    height: 67px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 17px;

    background:
        var(--navy);

    color:
        var(--orange);

    font-size: 29px;

    box-shadow:
        0 8px 20px rgba(11,31,58,.12);

    transition:
        transform .35s ease,
        background .35s ease;
}


.rekening-card:hover .rekening-icon {
    transform:
        rotate(-4deg)
        scale(1.06);

    background:
        var(--orange);

    color: white;
}


/* ============================================================
   METHOD BADGE
   ============================================================ */

.rekening-label {
    display: inline-flex;

    align-items: center;

    padding: 7px 11px;

    border-radius: 30px;

    background:
        var(--orange-soft);

    color:
        var(--orange-dark);

    font-size: 10px;

    font-weight: 800;

    letter-spacing: .9px;

    text-transform: uppercase;
}


/* ============================================================
   TITLE
   ============================================================ */

.rekening-card h2 {
    position: relative;

    z-index: 2;

    margin: 0 0 12px;

    color: var(--navy);

    font-size: 27px;

    font-weight: 800;
}


/* ============================================================
   DESCRIPTION
   ============================================================ */

.rekening-description {
    position: relative;

    z-index: 2;

    color: #687383;

    font-size: 14px;

    line-height: 1.8;

    min-height: 100px;

    margin: 0;
}


/* ============================================================
   FEATURE LIST
   ============================================================ */

.rekening-features {
    position: relative;

    z-index: 2;

    list-style: none;

    padding: 0;

    margin: 20px 0 0;

    text-align: left;
}


.rekening-features li {
    display: flex;

    align-items: flex-start;

    gap: 10px;

    margin-bottom: 11px;

    color: #4d5867;

    font-size: 13px;

    line-height: 1.5;
}


/* check */

.check {
    width: 20px;
    height: 20px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    margin-top: 1px;

    border-radius: 7px;

    background:
        var(--orange-soft);

    color:
        var(--orange-dark);

    font-size: 11px;

    font-weight: 900;

    transition:
        background .3s ease,
        color .3s ease;
}


.rekening-card:hover .check {
    background:
        var(--orange);

    color: white;
}


/* ============================================================
   BUTTON
   ============================================================ */

.rekening-button-wrapper {
    position: relative;

    z-index: 2;

    margin-top: auto;

    padding-top: 23px;
}


.rekening-button {
    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 10px;

    min-width: 155px;

    padding: 12px 21px;

    background:
        var(--navy);

    color: white;

    border-radius: 10px;

    text-decoration: none;

    font-size: 13px;

    font-weight: 800;

    box-shadow:
        0 7px 18px rgba(11,31,58,.12);

    transition:
        background .3s ease,
        color .3s ease,
        transform .3s ease,
        box-shadow .3s ease;
}


.rekening-button:hover {
    background:
        var(--orange);

    color: white;

    transform:
        translateY(-2px);

    box-shadow:
        0 9px 20px rgba(242,140,40,.22);
}


.rekening-button .arrow {
    font-size: 17px;

    transition:
        transform .3s ease;
}


.rekening-button:hover .arrow {
    transform:
        translateX(5px);
}


/* ============================================================
   INFO BAWAH
   ============================================================ */

.rekening-info {
    max-width: 1050px;

    margin: 30px auto 0;

    display: flex;

    align-items: center;

    gap: 12px;

    padding: 17px 20px;

    background:
        #fff9f2;

    border:
        1px solid #f3ddc4;

    border-radius: 14px;

    color: #80633f;

    font-size: 12px;

    line-height: 1.6;
}


.rekening-info-icon {
    width: 30px;
    height: 30px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 9px;

    background:
        var(--orange);

    color: white;

    font-weight: 900;
}


/* ============================================================
   ANIMATION
   ============================================================ */

@keyframes rekeningHeroMasuk {

    from {
        opacity: 0;

        transform:
            translateY(-20px);
    }

    to {
        opacity: 1;

        transform:
            translateY(0);
    }

}


@keyframes rekeningCardMasuk {

    from {
        opacity: 0;

        transform:
            translateY(30px);
    }

    to {
        opacity: 1;

        transform:
            translateY(0);
    }

}


/* ============================================================
   RESPONSIVE
   ============================================================ */

@media (max-width: 900px) {

    .rekening-page {
        padding:
            30px 20px 55px;
    }


    .rekening-header {
        padding:
            35px 30px;
    }


    .rekening-header h1 {
        font-size:
            32px;
    }


    .rekening-container {
        grid-template-columns:
            1fr;
    }


    .rekening-card {
        width: 100%;
    }

}


@media (max-width: 600px) {

    .rekening-page {
        padding:
            22px 15px 45px;
    }


    .rekening-header {
        padding:
            30px 22px;

        border-radius:
            19px;
    }


    .rekening-header h1 {
        font-size:
            27px;
    }


    .rekening-header p {
        font-size:
            13px;
    }


    .rekening-header-status {
        align-items:
            flex-start;

        line-height:
            1.5;
    }


    .rekening-section-title h2 {
        font-size:
            21px;
    }


    .rekening-section-title p {
        margin-left:
            0;
    }


    .rekening-title-icon {
        width:
            39px;

        height:
            39px;
    }


    .rekening-card {
        padding:
            24px 20px;
    }


    .rekening-card h2 {
        font-size:
            24px;
    }


    .rekening-description {
        min-height:
            auto;
    }


    .rekening-card-top {
        align-items:
            flex-start;
    }


    .rekening-info {
        align-items:
            flex-start;
    }

}


/* ============================================================
   REDUCED MOTION
   ============================================================ */

@media (prefers-reduced-motion: reduce) {

    .rekening-header,
    .rekening-card {
        animation:
            none;
    }


    .rekening-card,
    .rekening-icon,
    .rekening-button,
    .rekening-button .arrow {
        transition:
            none;
    }

}

</style>


<div class="rekening-page">


    {{-- =========================================================
         HERO HEADER
    ========================================================== --}}

    <div class="rekening-header">

        <div class="rekening-header-content">

            <div class="rekening-header-label">
                Prosedur Pembukaan Rekening
            </div>


            <h1>
                Pembukaan
                <span>Rekening</span>
            </h1>


            <p>
                Pilih metode pembukaan rekening yang sesuai dengan
                kebutuhan Anda. Tersedia pilihan pembukaan rekening
                secara reguler maupun online bersama PT. Rifan
                Financindo Berjangka.
            </p>


            <div class="rekening-header-status">

                <span class="rekening-status-dot"></span>

                Pilih metode yang paling sesuai dengan kebutuhan Anda.

            </div>

        </div>

    </div>



    {{-- =========================================================
         SECTION TITLE
    ========================================================== --}}

    <div class="rekening-section-title">

        <div class="rekening-title-row">

            <div class="rekening-title-icon">
                ✓
            </div>

            <h2>
                Pilih Metode Pembukaan Rekening
            </h2>

        </div>


        <p>
            Tersedia dua metode yang dapat dipilih sesuai kebutuhan Anda.
        </p>

    </div>



    {{-- =========================================================
         CARD CONTAINER
    ========================================================== --}}

    <div class="rekening-container">


        {{-- =====================================================
             REGULAR
        ====================================================== --}}

        <div class="rekening-card">


            <div class="rekening-card-top">

                <div class="rekening-icon">
                    👤
                </div>


                <div class="rekening-label">
                    Metode 01
                </div>

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

                    <span>
                        Konsultasi langsung dengan wakil pialang
                    </span>
                </li>


                <li>
                    <span class="check">✓</span>

                    <span>
                        Bantuan pengisian dokumen
                    </span>
                </li>


                <li>
                    <span class="check">✓</span>

                    <span>
                        Verifikasi dokumen di tempat
                    </span>
                </li>


                <li>
                    <span class="check">✓</span>

                    <span>
                        Pendampingan selama proses
                    </span>
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


            <div class="rekening-card-top">

                <div class="rekening-icon">
                    🖥️
                </div>


                <div class="rekening-label">
                    Metode 02
                </div>

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

                    <span>
                        Dapat dilakukan kapan saja
                    </span>
                </li>


                <li>
                    <span class="check">✓</span>

                    <span>
                        Pengisian formulir secara online
                    </span>
                </li>


                <li>
                    <span class="check">✓</span>

                    <span>
                        Upload dokumen secara digital
                    </span>
                </li>


                <li>
                    <span class="check">✓</span>

                    <span>
                        Proses praktis dan efisien
                    </span>
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



    {{-- =========================================================
         INFO
    ========================================================== --}}

    <div class="rekening-info">

        <div class="rekening-info-icon">
            !
        </div>

        <div>
            Pastikan Anda memahami setiap tahapan pembukaan rekening
            sebelum melanjutkan ke proses berikutnya.
        </div>

    </div>


</div>

@endsection