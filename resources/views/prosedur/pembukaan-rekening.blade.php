@extends('layouts.app')

@section('content')

<style>

/* ============================================================
   PEMBUKAAN REKENING
   TEMA : CLEAN CORPORATE — MAROON + DEEP GREEN + WHITE
   ============================================================ */

.rekening-page {
    --maroon: #8b2433;
    --maroon-dark: #711b28;
    --maroon-soft: #f8eef0;
    --maroon-line: rgba(139, 36, 51, .14);

    --green: #3d6b57;
    --green-dark: #315744;
    --green-soft: #eef5f1;

    --text: #292d30;
    --text-soft: #697178;
    --text-light: #858d92;

    --border: #e5e8e7;
    --surface: #f8f9f8;
    --white: #ffffff;

    padding: 35px 45px 70px;

    background:
        radial-gradient(
            circle at 100% 0%,
            rgba(139, 36, 51, .025),
            transparent 28%
        ),
        #f8f9f8;

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

    border-radius: 20px;

    background: #ffffff;

    color: var(--text);

    border: 1px solid #e5e8e7;

    border-left: 4px solid var(--maroon);

    box-shadow:
        0 12px 32px rgba(35, 42, 39, .055);

    text-align: left;

    animation:
        rekeningHeroMasuk .7s ease;
}


/* garis identitas */

.rekening-header::before {
    content: "";

    position: absolute;

    left: 0;
    top: 0;

    width: 100%;
    height: 2px;

    background: var(--maroon);

    opacity: .85;
}


/* dekorasi sangat halus */

.rekening-header::after {
    content: "";

    position: absolute;

    width: 210px;
    height: 210px;

    right: -100px;
    top: -120px;

    border-radius: 50%;

    border: 1px solid rgba(139, 36, 51, .055);

    box-shadow:
        0 0 0 25px rgba(139, 36, 51, .018),
        0 0 0 50px rgba(139, 36, 51, .012);
}


/* isi */

.rekening-header-content {
    position: relative;

    z-index: 2;

    max-width: 780px;
}


/* ============================================================
   LABEL HEADER
   ============================================================ */

.rekening-header-label {
    display: inline-flex;

    align-items: center;

    gap: 8px;

    padding: 7px 12px;

    margin-bottom: 17px;

    border-radius: 30px;

    background: var(--maroon-soft);

    border:
        1px solid rgba(139, 36, 51, .10);

    color: var(--maroon);

    font-size: 10px;

    font-weight: 800;

    letter-spacing: 1.2px;

    text-transform: uppercase;
}


.rekening-header-label::before {
    content: "";

    width: 6px;
    height: 6px;

    border-radius: 50%;

    background: var(--maroon);

    box-shadow:
        0 0 0 4px rgba(139, 36, 51, .075);
}


/* ============================================================
   JUDUL
   ============================================================ */

.rekening-header h1 {
    margin: 0 0 13px;

    color: var(--text);

    font-size: 38px;

    line-height: 1.18;

    font-weight: 800;

    letter-spacing: -1px;
}


.rekening-header h1 span {
    color: var(--maroon);
}


/* ============================================================
   DESKRIPSI
   ============================================================ */

.rekening-header p {
    margin: 0;

    max-width: 720px;

    color: var(--text-soft);

    font-size: 14px;

    line-height: 1.85;
}


/* ============================================================
   STATUS
   ============================================================ */

.rekening-header-status {
    display: inline-flex;

    align-items: center;

    gap: 9px;

    margin-top: 22px;

    padding: 8px 12px;

    background: #fafbfa;

    border:
        1px solid #e6e9e7;

    border-radius: 9px;

    color: var(--text-soft);

    font-size: 11px;
}


.rekening-status-dot {
    width: 7px;
    height: 7px;

    flex-shrink: 0;

    border-radius: 50%;

    background: var(--green);

    box-shadow:
        0 0 0 4px rgba(61, 107, 87, .08);
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

    border-radius: 12px;

    background: var(--maroon-soft);

    border:
        1px solid rgba(139, 36, 51, .09);

    color: var(--maroon);

    font-size: 17px;

    font-weight: 900;
}


.rekening-section-title h2 {
    margin: 0;

    color: var(--text);

    font-size: 23px;

    font-weight: 800;

    letter-spacing: -.4px;
}


.rekening-section-title h2::after {
    content: "";

    display: block;

    width: 30px;
    height: 2px;

    margin-top: 6px;

    background: var(--maroon);

    border-radius: 10px;

    opacity: .75;
}


.rekening-section-title p {
    margin: 6px 0 0 56px;

    color: var(--text-light);

    font-size: 12.5px;
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

    background: var(--white);

    border:
        1px solid var(--border);

    border-radius: 17px;

    box-sizing: border-box;

    overflow: hidden;

    box-shadow:
        0 7px 24px rgba(35, 42, 39, .045);

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


/* garis maroon */

.rekening-card::before {
    content: "";

    position: absolute;

    left: 0;
    top: 0;

    width: 100%;
    height: 3px;

    background: var(--maroon);

    transform:
        scaleX(0);

    transform-origin: left;

    transition:
        transform .35s ease;
}


.rekening-card:hover::before {
    transform:
        scaleX(1);
}


/* dekorasi */

.rekening-card::after {
    content: "";

    position: absolute;

    width: 135px;
    height: 135px;

    right: -80px;
    bottom: -80px;

    border-radius: 50%;

    border:
        1px solid rgba(61, 107, 87, .065);

    transition:
        transform .4s ease;
}


.rekening-card:hover::after {
    transform:
        scale(1.35);
}


/* hover */

.rekening-card:hover {
    transform:
        translateY(-4px);

    border-color:
        rgba(139, 36, 51, .17);

    box-shadow:
        0 14px 32px rgba(35, 42, 39, .075);
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
    width: 62px;
    height: 62px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 15px;

    background:
        #faf7f7;

    border:
        1px solid #eee5e6;

    color:
        var(--maroon);

    font-size: 27px;

    box-shadow:
        none;

    transition:
        transform .35s ease,
        background .35s ease,
        border-color .35s ease;
}


.rekening-card:hover .rekening-icon {
    transform:
        translateY(-2px);

    background:
        var(--maroon-soft);

    border-color:
        rgba(139, 36, 51, .10);

    color:
        var(--maroon);
}


/* ============================================================
   METHOD BADGE
   ============================================================ */

.rekening-label {
    display: inline-flex;

    align-items: center;

    padding: 6px 10px;

    border-radius: 30px;

    background:
        #f7f8f7;

    border:
        1px solid #e7e9e8;

    color:
        #737a7d;

    font-size: 9px;

    font-weight: 800;

    letter-spacing: .9px;

    text-transform: uppercase;
}


/* ============================================================
   TITLE CARD
   ============================================================ */

.rekening-card h2 {
    position: relative;

    z-index: 2;

    margin: 0 0 11px;

    color: var(--text);

    font-size: 25px;

    font-weight: 800;

    letter-spacing: -.5px;
}


/* ============================================================
   DESCRIPTION
   ============================================================ */

.rekening-description {
    position: relative;

    z-index: 2;

    color: var(--text-soft);

    font-size: 13.5px;

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

    color: #535b60;

    font-size: 13px;

    line-height: 1.5;
}


/* ============================================================
   CHECK
   ============================================================ */

.check {
    width: 20px;
    height: 20px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    margin-top: 1px;

    border-radius: 6px;

    background:
        var(--green-soft);

    color:
        var(--green);

    font-size: 10px;

    font-weight: 900;

    transition:
        background .3s ease,
        color .3s ease;
}


.rekening-card:hover .check {
    background:
        var(--green);

    color:
        white;
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

    gap: 9px;

    min-width: 145px;

    padding: 11px 19px;

    background:
        var(--maroon);

    color: white;

    border-radius: 9px;

    text-decoration: none;

    font-size: 12px;

    font-weight: 800;

    letter-spacing: .1px;

    box-shadow:
        0 6px 16px rgba(139, 36, 51, .12);

    transition:
        background .3s ease,
        color .3s ease,
        transform .3s ease,
        box-shadow .3s ease;
}


.rekening-button:hover {
    background:
        var(--maroon-dark);

    color: white;

    transform:
        translateY(-2px);

    box-shadow:
        0 9px 20px rgba(139, 36, 51, .16);
}


.rekening-button .arrow {
    font-size: 16px;

    transition:
        transform .3s ease;
}


.rekening-button:hover .arrow {
    transform:
        translateX(4px);
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

    padding: 16px 19px;

    background:
        #f5f8f6;

    border:
        1px solid #dfe8e3;

    border-radius: 13px;

    color: #68756f;

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

    border-radius: 8px;

    background:
        var(--green);

    color: white;

    font-size: 12px;

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