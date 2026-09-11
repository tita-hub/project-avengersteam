@extends('layouts.app')

@section('content')

<style>

/* ============================================================
   PRODUK PAGE
   ============================================================ */

.produk-wrapper {
    padding: 45px 45px 70px;
    background: #f7f9fc;
    min-height: calc(100vh - 70px);
}


/* ============================================================
   HEADER
   ============================================================ */

.produk-header {
    text-align: center;
    max-width: 850px;
    margin: 0 auto 45px;
    animation: fadeDown 0.8s ease;
}

.produk-header .label {
    color: #2d6fd2;
    font-size: 14px;
    font-weight: bold;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.produk-header h1 {
    margin: 0 0 15px;
    color: #173b29;
    font-family: Georgia, serif;
    font-size: 42px;
}

.produk-header p {
    margin: 0;
    color: #65746b;
    font-size: 17px;
    line-height: 1.8;
}


/* ============================================================
   PRODUCT CARDS - PREMIUM REDESIGN
   Hanya bagian kartu produk yang diperbarui
   ============================================================ */

.produk-container {
    max-width: 1240px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 26px;
    align-items: stretch;
}


/* ============================================================
   PRODUCT CARD
   ============================================================ */

.produk-card {
    --card-bg: #ffffff;

    background:
        linear-gradient(145deg, rgba(255,255,255,.98), rgba(248,250,252,.96));
    border: 1px solid rgba(226,232,240,.92);
    border-radius: 26px;
    padding: 26px 25px 22px;
    box-shadow:
        0 12px 35px rgba(15,23,42,.07),
        0 2px 8px rgba(15,23,42,.03);

    display: flex;
    flex-direction: column;
    min-height: 620px;
    box-sizing: border-box;
    position: relative;
    overflow: hidden;

    transition:
        transform .45s cubic-bezier(.2,.8,.2,1),
        box-shadow .45s ease,
        border-color .35s ease;

    animation: productCardReveal .8s cubic-bezier(.2,.8,.2,1) both;
    isolation: isolate;
}


/* soft decorative glow */

.produk-card::after {
    content: "";
    position: absolute;
    width: 210px;
    height: 210px;
    right: -95px;
    top: -95px;
    border-radius: 50%;
    background: var(--produk-color);
    opacity: .055;
    filter: blur(2px);
    transition:
        transform .55s ease,
        opacity .45s ease;
    z-index: -1;
}

.produk-card:nth-child(1) {
    animation-delay: .08s;
}

.produk-card:nth-child(2) {
    animation-delay: .18s;
}

.produk-card:nth-child(3) {
    animation-delay: .28s;
}


/* premium accent line */

.produk-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 24px;
    right: 24px;
    width: auto;
    height: 3px;
    border-radius: 0 0 10px 10px;
    background: linear-gradient(
        90deg,
        transparent,
        var(--produk-color),
        transparent
    );
    transform: scaleX(.35);
    transform-origin: center;
    opacity: .75;
    transition:
        transform .45s ease,
        opacity .45s ease;
}

.produk-card:hover {
    transform: translateY(-12px);
    border-color: color-mix(in srgb, var(--produk-color) 28%, #e2e8f0);
    box-shadow:
        0 24px 55px rgba(15,23,42,.12),
        0 8px 22px color-mix(in srgb, var(--produk-color) 12%, transparent);
}

.produk-card:hover::before {
    transform: scaleX(1);
    opacity: 1;
}

.produk-card:hover::after {
    transform: scale(1.45);
    opacity: .09;
}


/* ============================================================
   NUMBER BADGE
   ============================================================ */

.produk-card:nth-child(1)::marker {
    display: none;
}

.produk-card:nth-child(1) .produk-category::before,
.produk-card:nth-child(2) .produk-category::before,
.produk-card:nth-child(3) .produk-category::before {
    content: attr(data-number);
}

.produk-card:nth-child(1) .produk-category::before {
    content: "01";
}

.produk-card:nth-child(2) .produk-category::before {
    content: "02";
}

.produk-card:nth-child(3) .produk-category::before {
    content: "03";
}

.produk-category::before {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 25px;
    height: 25px;
    margin-right: 8px;
    border-radius: 50%;
    background: color-mix(in srgb, var(--produk-color) 10%, white);
    border: 1px solid color-mix(in srgb, var(--produk-color) 24%, white);
    font-size: 10px;
    letter-spacing: .5px;
}


/* ============================================================
   IMAGE AREA
   ============================================================ */

.produk-image-wrapper {
    width: 154px;
    height: 154px;
    margin: 4px auto 22px;
    border-radius: 50%;
    background:
        radial-gradient(circle at 35% 25%, #ffffff 0%, #f8fafc 58%, #eef2f6 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    position: relative;
    border: 7px solid #ffffff;
    box-shadow:
        0 14px 30px rgba(15,23,42,.10),
        0 0 0 1px rgba(226,232,240,.8);

    transition:
        transform .55s cubic-bezier(.2,.8,.2,1),
        box-shadow .45s ease;
}

/* rotating decorative ring */

.produk-image-wrapper::before {
    content: "";
    position: absolute;
    inset: -7px;
    border-radius: 50%;
    border: 1px dashed color-mix(in srgb, var(--produk-color) 38%, transparent);
    opacity: .55;
    transition:
        transform .8s ease,
        opacity .45s ease;
}

.produk-image-wrapper::after {
    content: "";
    position: absolute;
    width: 16px;
    height: 16px;
    right: 8px;
    bottom: 20px;
    border-radius: 50%;
    background: var(--produk-color);
    box-shadow: 0 0 0 6px rgba(255,255,255,.9);
    opacity: .9;
}

.produk-image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
    transition:
        transform .65s cubic-bezier(.2,.8,.2,1),
        filter .45s ease;
}

.produk-card:hover .produk-image-wrapper {
    transform: translateY(-5px) scale(1.035);
    box-shadow:
        0 18px 38px rgba(15,23,42,.14),
        0 0 0 7px color-mix(in srgb, var(--produk-color) 7%, white);
}

.produk-card:hover .produk-image-wrapper::before {
    transform: rotate(180deg);
    opacity: .9;
}

.produk-card:hover .produk-image-wrapper img {
    transform: scale(1.08);
    filter: saturate(1.06);
}


/* ============================================================
   CATEGORY
   ============================================================ */

.produk-category {
    text-align: center;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.8px;
    color: var(--produk-color);
    margin-bottom: 7px;
    min-height: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-transform: uppercase;
}


/* ============================================================
   TITLE
   ============================================================ */

.produk-card h2 {
    font-family: Georgia, serif;
    color: #111827;
    text-align: center;
    font-size: 29px;
    line-height: 1.25;
    margin: 0 0 11px;
    min-height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    letter-spacing: -.3px;
    transition:
        color .3s ease,
        transform .35s ease;
}

.produk-card:hover h2 {
    color: #172033;
    transform: translateY(-2px);
}


/* ============================================================
   DECORATION LINE
   ============================================================ */

.produk-line {
    width: 42px;
    height: 3px;
    border-radius: 20px;
    background: var(--produk-color);
    margin: 0 auto 20px;
    flex-shrink: 0;
    box-shadow: 0 3px 10px color-mix(in srgb, var(--produk-color) 28%, transparent);
    transition:
        width .4s cubic-bezier(.2,.8,.2,1),
        box-shadow .4s ease;
}

.produk-card:hover .produk-line {
    width: 78px;
    box-shadow: 0 5px 16px color-mix(in srgb, var(--produk-color) 38%, transparent);
}


/* ============================================================
   DESCRIPTION
   ============================================================ */

.produk-description {
    color: #64748b;
    text-align: center;
    font-size: 14px;
    line-height: 1.8;
    margin: 0;
    height: 122px;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    flex-shrink: 0;
}


/* ============================================================
   PRODUCT INFO
   ============================================================ */

.produk-info {
    margin-top: 4px;
    padding: 15px 17px;
    border-radius: 15px;
    background:
        linear-gradient(
            135deg,
            color-mix(in srgb, var(--produk-color) 4%, #f8fafc),
            #ffffff
        );
    border: 1px solid rgba(226,232,240,.75);
    border-left: 3px solid var(--produk-color);
    color: #64748b;
    font-size: 13px;
    line-height: 1.7;
    min-height: 100px;
    box-sizing: border-box;
    flex-shrink: 0;
    transition:
        transform .35s ease,
        box-shadow .35s ease,
        background .35s ease;
}

.produk-card:hover .produk-info {
    transform: translateY(-3px);
    box-shadow:
        0 9px 22px rgba(15,23,42,.06);
    background:
        linear-gradient(
            135deg,
            color-mix(in srgb, var(--produk-color) 7%, #f8fafc),
            #ffffff
        );
}

.produk-info strong {
    color: #263238;
    display: inline-block;
    margin-bottom: 2px;
    font-size: 13px;
}


/* ============================================================
   BUTTON
   ============================================================ */

.produk-button {
    margin-top: auto;
    padding-top: 22px;
    flex-shrink: 0;
}

.btn-detail {
    width: 100%;
    height: 50px;
    border-radius: 13px;
    border: 1px solid color-mix(in srgb, var(--produk-color) 70%, #ffffff);
    background: #ffffff;
    color: var(--produk-color);
    font-size: 14px;
    font-weight: 800;
    letter-spacing: .15px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    transition:
        color .35s ease,
        transform .25s ease,
        box-shadow .35s ease,
        border-color .35s ease;
}

.btn-detail::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 0;
    height: 100%;
    background: var(--produk-color);
    transition:
        width .4s cubic-bezier(.2,.8,.2,1);
    z-index: 0;
}

.btn-detail::after {
    content: "";
    position: absolute;
    top: -50%;
    left: -80%;
    width: 45%;
    height: 200%;
    background: rgba(255,255,255,.22);
    transform: rotate(20deg);
    transition: left .65s ease;
    z-index: 1;
}

.btn-detail:hover::before {
    width: 100%;
}

.btn-detail:hover::after {
    left: 125%;
}

.btn-detail:hover {
    color: white;
    border-color: var(--produk-color);
    transform: translateY(-3px);
    box-shadow:
        0 10px 24px color-mix(in srgb, var(--produk-color) 22%, transparent);
}

.btn-detail:active {
    transform: translateY(-1px) scale(.99);
}

.btn-detail span {
    position: relative;
    z-index: 2;
}


/* ============================================================
   SCROLL REVEAL
   ============================================================ */

@keyframes productCardReveal {
    0% {
        opacity: 0;
        transform: translateY(45px) scale(.97);
    }

    65% {
        opacity: 1;
    }

    100% {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}


/* ============================================================
   RESPONSIVE - CARD AREA
   ============================================================ */

@media(max-width: 1050px) {
    .produk-container {
        grid-template-columns: 1fr;
        max-width: 560px;
        gap: 24px;
    }

    .produk-card {
        min-height: auto;
    }
}

@media(max-width: 650px) {
    .produk-container {
        gap: 20px;
    }

    .produk-card {
        border-radius: 22px;
        padding: 23px 20px 20px;
    }

    .produk-image-wrapper {
        width: 138px;
        height: 138px;
        margin-bottom: 19px;
    }

    .produk-card h2 {
        font-size: 26px;
    }

    .produk-description {
        height: auto;
        min-height: 105px;
    }

    .produk-info {
        min-height: 96px;
    }
}

@media(prefers-reduced-motion: reduce) {
    .produk-card,
    .produk-card *,
    .produk-card::before,
    .produk-card::after {
        animation: none !important;
        transition: none !important;
    }
}


/* ============================================================
   MODAL
   ============================================================ */

.produk-modal {

    position: fixed;

    inset: 0;

    background: rgba(10, 20, 35, 0.55);

    backdrop-filter: blur(5px);

    display: none;

    align-items: center;

    justify-content: center;

    padding: 25px;

    z-index: 9999;

    opacity: 0;
}


.produk-modal.active {

    display: flex;

    animation:
        modalBackground 0.3s ease forwards;
}


/* ============================================================
   MODAL BOX
   ============================================================ */

.produk-modal-box {

    width: min(900px, 100%);

    max-height: 90vh;

    overflow-y: auto;

    background: white;

    border-radius: 22px;

    box-shadow:
        0 25px 70px rgba(0,0,0,0.25);

    position: relative;

    transform: scale(0.85);

    opacity: 0;

    animation:
        modalOpen 0.35s ease forwards;
}


/* ============================================================
   MODAL HEADER
   ============================================================ */

.modal-header {

    display: flex;

    align-items: center;

    gap: 25px;

    padding: 30px;

    border-bottom:
        1px solid #edf0f3;
}


.modal-image {

    width: 125px;

    height: 125px;

    border-radius: 50%;

    object-fit: cover;

    box-shadow:
        0 8px 25px rgba(0,0,0,0.10);

    flex-shrink: 0;
}


.modal-title {

    flex: 1;
}


.modal-title small {

    display: block;

    color: var(--produk-color);

    font-weight: bold;

    margin-bottom: 7px;

    text-transform: uppercase;
}


.modal-title h2 {

    font-family: Georgia, serif;

    margin: 0;

    color: #173b29;

    font-size: 32px;
}


/* ============================================================
   CLOSE BUTTON
   ============================================================ */

/*
   HANYA BAGIAN INI YANG DIUBAH

   Tombol X tetap berada di pojok kanan atas
   dan tidak ikut bergerak ketika isi modal
   di-scroll.
*/

.modal-close {

    position: sticky;

    top: 18px;

    margin-left: auto;

    margin-right: 20px;

    margin-bottom: -38px;

    width: 38px;
    height: 38px;

    border: none;

    border-radius: 50%;

    background: #f1f4f7;

    color: #444;

    font-size: 23px;

    cursor: pointer;

    transition:
        background 0.25s ease,
        transform 0.25s ease;

    z-index: 20;

    display: flex;

    align-items: center;

    justify-content: center;
}


.modal-close:hover {

    background: #e4e8ed;

    transform:
        rotate(90deg);
}


/* ============================================================
   MODAL CONTENT
   ============================================================ */

.modal-content {

    padding: 30px;
}


.modal-content h3 {

    color: #173b29;

    font-family: Georgia, serif;

    margin-top: 0;

    margin-bottom: 20px;
}


/* ============================================================
   INFORMATION TABLE
   ============================================================ */

.informasi-produk {

    display: grid;

    grid-template-columns:
        1fr 1.5fr;

    border:
        1px solid #e7ebef;

    border-radius: 14px;

    overflow: hidden;

    margin-bottom: 25px;
}


.info-label,
.info-value {

    padding: 13px 16px;

    border-bottom:
        1px solid #edf0f3;

    font-size: 14px;
}


.info-label {

    background: #f8fafc;

    font-weight: bold;

    color: #53606d;
}


.info-value {

    color: #263238;

    background: white;
}


/* ============================================================
   RISK BOX
   ============================================================ */

.risk-box {

    padding: 18px 20px;

    background: #fff8eb;

    border:
        1px solid #f4dfb3;

    border-radius: 13px;

    color: #765b25;

    font-size: 14px;

    line-height: 1.7;
}


.risk-box strong {

    display: block;

    margin-bottom: 5px;
}


/* ============================================================
   ANIMATION
   ============================================================ */

@keyframes fadeDown {

    from {

        opacity: 0;

        transform:
            translateY(-25px);
    }

    to {

        opacity: 1;

        transform:
            translateY(0);
    }
}


@keyframes cardAppear {

    from {

        opacity: 0;

        transform:
            translateY(35px);
    }

    to {

        opacity: 1;

        transform:
            translateY(0);
    }
}


@keyframes modalBackground {

    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }
}


@keyframes modalOpen {

    from {

        opacity: 0;

        transform:
            scale(0.85)
            translateY(20px);
    }

    to {

        opacity: 1;

        transform:
            scale(1)
            translateY(0);
    }
}


/* ============================================================
   RESPONSIVE
   ============================================================ */

@media(max-width: 1050px) {

    .produk-container {

        grid-template-columns: 1fr;

        max-width: 550px;
    }

}


@media(max-width: 650px) {

    .produk-wrapper {

        padding:
            30px 20px 50px;
    }


    .produk-header h1 {

        font-size: 32px;
    }


    .produk-header p {

        font-size: 15px;
    }


    .produk-card {

        min-height: auto;

        padding: 25px;
    }


    .produk-description {

        height: auto;

        min-height: 100px;
    }


    .produk-info {

        height: auto;

        min-height: 100px;
    }


    .modal-header {

        flex-direction: column;

        text-align: center;

        padding:
            35px 25px 25px;
    }


    .modal-title h2 {

        font-size: 27px;
    }


    .informasi-produk {

        grid-template-columns: 1fr;
    }

}


/* ============================================================
   BODY LOCK SAAT MODAL TERBUKA
   ============================================================ */

body.modal-open {

    overflow: hidden;
}


/* ============================================================
   DETAIL PRODUK - GOLD / NIKKEI / AUD
   ============================================================ */

.produk-detail-modern {
    padding: 0 30px 35px;
}

.produk-detail-hero {
    text-align: center;
    padding: 10px 0 25px;
}

.produk-detail-hero img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 50%;
    display: block;
    margin: 0 auto 22px;
    border: 8px solid #fff;
    box-shadow: 0 12px 30px rgba(0,0,0,0.12);
}

.produk-detail-hero .detail-label {
    display: inline-block;
    padding: 6px 13px;
    border-radius: 999px;
    background: #f7f8fa;
    color: var(--produk-color);
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.produk-detail-hero h2 {
    margin: 0;
    color: #173b29;
    font-family: Georgia, serif;
    font-size: 30px;
    line-height: 1.3;
}

.produk-detail-description {
    margin: 0 0 30px;
    padding: 22px 24px;
    background: linear-gradient(135deg, #f8fafc, #ffffff);
    border: 1px solid #e8edf1;
    border-left: 4px solid var(--produk-color);
    border-radius: 15px;
    color: #596579;
    font-size: 15px;
    line-height: 1.9;
    text-align: justify;
}

.produk-spec-heading {
    display: flex;
    align-items: center;
    gap: 12px;
    margin: 0 0 15px;
}

.produk-spec-heading::before {
    content: "";
    width: 5px;
    height: 28px;
    border-radius: 8px;
    background: var(--produk-color);
    flex-shrink: 0;
}

.produk-spec-heading h3 {
    margin: 0 !important;
    font-size: 24px;
}

.produk-table-title {
    margin: 0 0 12px;
    color: #354152;
    font-size: 14px;
    font-weight: 800;
    line-height: 1.6;
}

.produk-table-wrapper {
    width: 100%;
    overflow-x: auto;
    border: 1px solid #e4e9ee;
    border-radius: 15px;
    box-shadow: 0 8px 22px rgba(15,23,42,0.05);
    margin-bottom: 18px;
    -webkit-overflow-scrolling: touch;
}

.produk-detail-table {
    width: 100%;
    min-width: 720px;
    border-collapse: collapse;
    background: #fff;
    font-size: 13px;
}

.produk-detail-table th,
.produk-detail-table td {
    padding: 12px 14px;
    border-bottom: 1px solid #edf0f3;
    vertical-align: middle;
    line-height: 1.55;
}

.produk-detail-table thead th {
    background: #173b29;
    color: #fff;
    font-weight: 800;
    text-align: center;
    white-space: nowrap;
}

.produk-detail-table thead th:first-child {
    text-align: left;
    width: 34%;
}

.produk-detail-table tbody td:first-child {
    color: #344054;
    font-weight: 700;
    background: #fafbfc;
}

.produk-detail-table tbody td:not(:first-child) {
    color: #596579;
}

.produk-detail-table tbody tr:last-child td {
    border-bottom: none;
}

.produk-detail-table tbody tr:hover td {
    background: #fffdf6;
}

.produk-detail-table .group-row td {
    padding-top: 8px;
    padding-bottom: 8px;
    background: #f5f7f9;
    color: #98a2b3;
    font-weight: 700;
    text-align: center;
}

.produk-detail-note {
    margin-top: 18px;
    padding: 15px 18px;
    border-radius: 12px;
    background: #fffaf0;
    border: 1px solid #f1dfb7;
    color: #765b25;
    font-size: 13px;
    line-height: 1.7;
}

.produk-detail-note strong {
    color: #5f481d;
}

.produk-risk-modern {
    margin-top: 18px;
}

@media(max-width: 650px) {
    .produk-detail-modern {
        padding: 0 20px 28px;
    }

    .produk-detail-hero img {
        width: 125px;
        height: 125px;
    }

    .produk-detail-hero h2 {
        font-size: 25px;
    }

    .produk-detail-description {
        padding: 18px;
        font-size: 14px;
        line-height: 1.8;
    }

    .produk-spec-heading h3 {
        font-size: 21px;
    }

    .produk-detail-table {
        min-width: 680px;
        font-size: 12px;
    }

    .produk-detail-table th,
    .produk-detail-table td {
        padding: 10px 11px;
    }
}

</style>


<div class="produk-wrapper">


    {{-- ========================================================
         HEADER
    ========================================================= --}}

    <div class="produk-header">

        <h1>
            Produk Perdagangan
        </h1>

        <p>
            RFB Semarang menyediakan berbagai produk investasi
            melalui Bursa Berjangka Jakarta (BBJ). Kenali
            karakteristik setiap produk sebelum melakukan transaksi.
        </p>

    </div>



    {{-- ========================================================
         PRODUCT CARDS
    ========================================================= --}}

    <div class="produk-container">


        {{-- ====================================================
             EMAS
        ===================================================== --}}

        <div
            class="produk-card"
            style="--produk-color: #8d2634;"
        >

            <div class="produk-image-wrapper">

                <img
                    src="{{ asset('images/produk/emas.png') }}"
                    alt="Emas Gold"
                >

            </div>


            <div class="produk-category">
                KOMODITAS
            </div>


            <h2>
                Emas (Gold)
            </h2>


            <div class="produk-line"></div>


            <p class="produk-description">

                Produk perdagangan berjangka dengan
                emas sebagai aset dasar yang dapat
                diperdagangkan melalui Bursa Berjangka
                Jakarta (BBJ).

            </p>


            <div class="produk-info">

                <strong>
                    Produk Unggulan
                </strong>

                <br>

                Emas merupakan salah satu komoditas
                yang banyak dikenal dalam perdagangan
                berjangka.

            </div>


            <div class="produk-button">

                <button
                    class="btn-detail"
                    onclick="bukaProduk('modalEmas')"
                >

                    <span>
                        Lihat Detail &nbsp; →
                    </span>

                </button>

            </div>

        </div>



        {{-- ====================================================
             NIKKEI
        ===================================================== --}}

        <div
            class="produk-card"
            style="--produk-color: #8d2634;"
        >

            <div class="produk-image-wrapper">

                <img
                    src="{{ asset('images/produk/nikkei.png') }}"
                    alt="Nikkei 225"
                >

            </div>


            <div class="produk-category">
                INDEKS SAHAM
            </div>


            <h2>
                Nikkei 225
            </h2>


            <div class="produk-line"></div>


            <p class="produk-description">

                Indeks saham utama Jepang yang mencerminkan pergerakan pasar saham Jepang dan menjadi indikator penting dalam melihat kondisi pasar saham.

            </p>


            <div class="produk-info">

                <strong>
                    Indeks Jepang
                </strong>

                <br>

                Nikkei 225 merupakan indeks yang
                merepresentasikan sejumlah perusahaan
                besar di Jepang.

            </div>


            <div class="produk-button">

                <button
                    class="btn-detail"
                    onclick="bukaProduk('modalNikkei')"
                >

                    <span>
                        Lihat Detail &nbsp; →
                    </span>

                </button>

            </div>

        </div>



        {{-- ====================================================
             AUD/USD
        ===================================================== --}}

        <div
            class="produk-card"
            style="--produk-color: #8d2634;"
        >

            <div class="produk-image-wrapper">

                <img
                    src="{{ asset('images/produk/forex.png') }}"
                    alt="AUD USD"
                >

            </div>


            <div class="produk-category">
                FOREX
            </div>


            <h2>
                AUD/USD
            </h2>


            <div class="produk-line"></div>


            <p class="produk-description">

                Pasangan mata uang populer dengan
                aktivitas perdagangan dan likuiditas
                yang tinggi serta banyak digunakan dalam
                perdagangan valuta asing di pasar global.

            </p>


            <div class="produk-info">

                <strong>
                    Pasangan Mata Uang
                </strong>

                <br>

                AUD/USD menunjukkan nilai dolar
                Australia terhadap dolar Amerika Serikat.

            </div>


            <div class="produk-button">

                <button
                    class="btn-detail"
                    onclick="bukaProduk('modalAud')"
                >

                    <span>
                        Lihat Detail &nbsp; →
                    </span>

                </button>

            </div>

        </div>

    </div>

</div>



{{-- ============================================================
     MODAL EMAS
============================================================= --}}

<div
    id="modalEmas"
    class="produk-modal"
    onclick="tutupJikaBackground(event)"
>
    <div
        class="produk-modal-box"
        style="--produk-color: #8d2634;"
    >
        <button
            class="modal-close"
            onclick="tutupProduk()"
        >
            ×
        </button>

        <div class="produk-detail-modern">
            <div class="produk-detail-hero">
                <img
                    src="{{ asset('images/produk/emas.png') }}"
                    alt="Emas Gold"
                >

                <span class="detail-label">Komoditas</span>
                <h2>Produk Derivatif Emas Loco London</h2>
            </div>

            <p class="produk-detail-description">
                Produk Derivatif Emas Loco London merupakan instrumen perdagangan berbasis harga emas internasional yang mengacu pada pasar London, pusat perdagangan emas fisik terbesar di dunia. Sebagai acuan global, harga emas Loco London mencerminkan dinamika pasar internasional sehingga menawarkan transparansi harga dan likuiditas yang sangat tinggi. Instrumen ini memberikan kesempatan bagi investor untuk memanfaatkan pergerakan harga emas global tanpa harus melakukan kepemilikan fisik. Dengan volatilitas yang menarik dan pergerakan harga yang dipengaruhi oleh berbagai faktor makroekonomi dunia, Produk Derivatif Emas Loco London menjadi pilihan populer bagi pelaku pasar yang memburu peluang capital gain maupun yang membutuhkan sarana lindung nilai (hedging) terhadap risiko fluktuasi harga emas. Didukung oleh standar internasional dan kemudahan akses melalui platform trading, produk ini memungkinkan investor berpartisipasi langsung dalam pasar emas global secara efisien, fleksibel, dan terstruktur. Produk Derivatif Emas Loco London menjadi salah satu instrumen unggulan bagi mereka yang ingin memanfaatkan potensi pasar emas dunia dengan tingkat likuiditas yang kuat dan peluang yang luas.
            </p>

            <div class="produk-spec-heading">
                <h3>Spesifikasi Produk</h3>
            </div>

            <div class="produk-table-title">
                Tabel Spesifikasi Kontrak Gulir Harian Emas Loco London (XUL10 &amp; XULF)
            </div>

            <div class="produk-table-wrapper">
                <table class="produk-detail-table">
                    <thead>
                        <tr>
                            <th>Items</th>
                            <th>XUL10</th>
                            <th>XULF</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Kode Kontrak</td><td>XUL10</td><td>XULF</td></tr>
                        <tr><td>Kurs</td><td>Tetap (USD 1 = IDR 10,000)</td><td>Mengambang (USD)</td></tr>
                        <tr><td>Satuan Kontrak</td><td>100 Troy Ons</td><td>100 Troy Ons</td></tr>
                        <tr><td>Jam Perdagangan</td><td>Senin - Jum'at<br>Summer : 06:00 – 03:30 WIB<br>Winter : 06:00 – 04:30 WIB</td><td>Senin - Jum'at<br>Summer : 06:00 – 03:30 WIB<br>Winter : 06:00 – 04:30 WIB</td></tr>
                        <tr class="group-row"><td colspan="3">.</td></tr>
                        <tr><td>Margin untuk Transaksi Harian</td><td>IDR 10,000,000 / lot</td><td>USD 1,000 / lot</td></tr>
                        <tr><td>Margin untuk Transaksi Menginap</td><td>IDR 30,000,000 / lot</td><td>USD 3,000 / lot</td></tr>
                        <tr><td>Komisi</td><td>IDR 150,000 / lot / sisi</td><td>USD 15 / lot / sisi</td></tr>
                        <tr><td>Biaya Menginap untuk Jual / Beli</td><td>IDR 50,000 / lot / malam</td><td>USD 5 / lot / malam</td></tr>
                        <tr><td>PPN*</td><td>11 % dari Komisi dan Biaya Menginap untuk Jual/Beli</td><td>11 % dari Komisi dan Biaya Menginap untuk Jual/Beli</td></tr>
                        <tr><td>Maintenance Margin</td><td>70% dari Kebutuhan Margin</td><td>70% dari Kebutuhan Margin</td></tr>
                        <tr><td>Auto Liquidasi</td><td>30% dari Kebutuhan Margin</td><td>30% dari Kebutuhan Margin</td></tr>
                        <tr class="group-row"><td colspan="3">.</td></tr>
                        <tr><td>Sumber Harga</td><td>Telequote</td><td>Telequote</td></tr>
                        <tr><td>Harga Acuan</td><td>Last Trade</td><td>Last Trade</td></tr>
                        <tr><td>Spread Kuotasi Harga Minimum</td><td>USD 0.40 / troy ons / sisi</td><td>USD 0.40 / troy ons / sisi</td></tr>
                        <tr><td>Spread Kuotasi Harga Maximum</td><td>USD 1.00 / troy ons / sisi</td><td>USD 1.00 / troy ons / sisi</td></tr>
                        <tr><td>Spread Kuotasi Harga Hectic</td><td>Based on market</td><td>Based on market</td></tr>
                        <tr><td>Pergerakan Harga Minimum</td><td>USD 0.01 / troy ons</td><td>USD 0.01 / troy ons</td></tr>
                        <tr><td>Rentang Harga untuk Limit dan Stop Order</td><td>USD 6 - USD 20</td><td>USD 6 - USD 20</td></tr>
                        <tr><td>Rentang Harga Hectic untuk Limit dan Stop Order</td><td>Berdasarkan harga pasar</td><td>Berdasarkan harga pasar</td></tr>
                        <tr><td>Penyelesaian</td><td>Cash Settlement</td><td>Cash Settlement</td></tr>
                        <tr class="group-row"><td colspan="3">.</td></tr>
                    </tbody>
                </table>
            </div>

            <div class="produk-detail-note">
                <strong>* Catatan:</strong><br>
                Perubahan biaya PPN menjadi 11% (Efektif Pertanggal 01 April 2022)
            </div>

            <div class="risk-box produk-risk-modern">
                <strong>⚠️ Catatan Risiko</strong>
                Perdagangan berjangka memiliki risiko dan dapat menyebabkan kerugian. Pastikan memahami karakteristik dan risiko produk sebelum melakukan transaksi.
            </div>
        </div>
    </div>
</div>

{{-- ============================================================
     MODAL NIKKEI
============================================================= --}}

<div
    id="modalNikkei"
    class="produk-modal"
    onclick="tutupJikaBackground(event)"
>
    <div
        class="produk-modal-box"
        style="--produk-color: #8d2634;"
    >
        <button
            class="modal-close"
            onclick="tutupProduk()"
        >
            ×
        </button>

        <div class="produk-detail-modern">
            <div class="produk-detail-hero">
                <img
                    src="{{ asset('images/produk/nikkei.png') }}"
                    alt="Nikkei 225"
                >

                <span class="detail-label">Indeks Saham</span>
                <h2>Produk Derivatif Indeks Nikkei 225 (SGX)</h2>
            </div>

            <p class="produk-detail-description">
                Produk Derivatif Indeks Nikkei 225 (SGX) merupakan instrumen perdagangan berbasis pergerakan Indeks Nikkei 225, salah satu indeks saham paling berpengaruh di dunia yang merefleksikan kinerja 225 perusahaan besar Jepang. Diperdagangkan melalui Singapore Exchange (SGX), kontrak derivatif ini menawarkan akses yang stabil, likuid, dan terstandarisasi bagi investor yang ingin berpartisipasi dalam dinamika pasar saham Jepang. Sebagai barometer utama ekonomi Jepang, pergerakan Nikkei 225 dipengaruhi oleh sentimen global, kebijakan moneter Jepang, perkembangan teknologi, hingga kondisi industri manufaktur. Fluktuasi harga yang dinamis tersebut memberikan peluang strategis bagi pelaku pasar untuk memperoleh capital gain, sekaligus menjadi instrumen lindung nilai (hedging) terhadap risiko portofolio. Melalui Produk Derivatif Indeks Nikkei 225 yang diperdagangkan di SGX, investor dapat memanfaatkan keunggulan transparansi harga, efisiensi eksekusi, dan likuiditas yang kuat. Instrumen ini menjadi pilihan menarik bagi mereka yang ingin memanfaatkan potensi pertumbuhan ekonomi Jepang dan pergerakan pasar Asia secara terstruktur dan fleksibel.
            </p>

            <div class="produk-spec-heading">
                <h3>Spesifikasi Produk</h3>
            </div>

            <div class="produk-table-title">
                Tabel Periodik Spesifikasi Kontrak Gulir Indeks Saham Jepang (JPK50_BBJ &amp; JPK5U_BBJ)
            </div>

            <div class="produk-table-wrapper">
                <table class="produk-detail-table">
                    <thead>
                        <tr>
                            <th>Items</th>
                            <th>JPK50_BBJ</th>
                            <th>JPK5U_BBJ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Kode Kontrak</td><td>JPK50_BBJ</td><td>JPK5U_BBJ</td></tr>
                        <tr><td>Kurs</td><td>Tetap (USD 1 = IDR 10,000)</td><td>Mengambang (USD)</td></tr>
                        <tr><td>Kode Kontrak</td><td>IDR 50,000 / poin</td><td>USD 5 / poin</td></tr>
                        <tr><td>Jam Perdagangan</td><td>Senin - Jum'at<br>Sesi I : 06:30 – 13:55 WIB<br>Sesi II : 14:10 – 03:45 WIB</td><td>Senin - Jum'at<br>Sesi I : 06:30 – 13:55 WIB<br>Sesi II : 14:10 – 03:45 WIB</td></tr>
                        <tr class="group-row"><td colspan="3">.</td></tr>
                        <tr><td>Margin untuk Transaksi Harian</td><td>IDR 10,000,000 / lot</td><td>USD 1,000 / lot</td></tr>
                        <tr><td>Margin untuk Transaksi Menginap</td><td>IDR 20,000,000 / lot</td><td>USD 2,000 / lot</td></tr>
                        <tr><td>Komisi</td><td>IDR 150,000 / lot / sisi</td><td>USD 15 / lot / sisi</td></tr>
                        <tr><td>Biaya Menginap untuk Jual / Beli</td><td>IDR 20,000 / lot / malam</td><td>USD 2 / lot / malam</td></tr>
                        <tr><td>PPN*</td><td>11 % dari Komisi dan Biaya Menginap untuk Jual/Beli</td><td>11 % dari Komisi dan Biaya Menginap untuk Jual/Beli</td></tr>
                        <tr><td>Maintenance Margin</td><td>70% dari Kebutuhan Margin</td><td>70% dari Kebutuhan Margin</td></tr>
                        <tr><td>Auto Liquidasi</td><td>30% dari Kebutuhan Margin</td><td>30% dari Kebutuhan Margin</td></tr>
                        <tr class="group-row"><td colspan="3">.</td></tr>
                        <tr><td>Sumber Harga</td><td>Winquote / Telequote</td><td>Winquote / Telequote</td></tr>
                        <tr><td>Harga Acuan</td><td>Last Trade</td><td>Last Trade</td></tr>
                        <tr><td>Spread Kuotasi Harga Minimum</td><td>10 Poin/sisi</td><td>10 Poin/sisi</td></tr>
                        <tr><td>Spread Kuotasi Harga Hectic</td><td>Based on market</td><td>Based on market</td></tr>
                        <tr><td>Pergerakan Harga Minimum</td><td>5 Poin</td><td>5 Poin</td></tr>
                        <tr><td>Rentang Harga untuk Limit dan Stop Order</td><td>20 – 500 Poin</td><td>20 – 500 Poin</td></tr>
                        <tr><td>Rentang Harga Hectic untuk Limit dan Stop Order</td><td>Berdasarkan harga pasar</td><td>Berdasarkan harga pasar</td></tr>
                        <tr><td>Penyelesaian</td><td>Cash Settlement</td><td>Cash Settlement</td></tr>
                        <tr class="group-row"><td colspan="3">.</td></tr>
                    </tbody>
                </table>
            </div>

            <div class="produk-detail-note">
                <strong>Catatan:</strong><br>
                * Transaksi JPK50_BBJ &amp; JPK5U_BBJ telah diperpanjang sampai 03:45 (pagi)<br>
                ** Efektif Pertanggal 26 Juli 2016<br>
                *** Perubahan biaya PPN menjadi 11% (Efektif Pertanggal 01 April 2022)
            </div>

            <div class="risk-box produk-risk-modern">
                <strong>⚠️ Catatan Risiko</strong>
                Perdagangan indeks memiliki risiko. Pergerakan pasar dapat menyebabkan keuntungan maupun kerugian.
            </div>
        </div>
    </div>
</div>

{{-- ============================================================
     MODAL AUD/USD
============================================================= --}}

<div
    id="modalAud"
    class="produk-modal"
    onclick="tutupJikaBackground(event)"
>
    <div
        class="produk-modal-box"
        style="--produk-color: #8d2634;"
    >
        <button
            class="modal-close"
            onclick="tutupProduk()"
        >
            ×
        </button>

        <div class="produk-detail-modern">
            <div class="produk-detail-hero">
                <img
                    src="{{ asset('images/produk/forex.png') }}"
                    alt="AUD USD"
                >

                <span class="detail-label">Forex</span>
                <h2>Produk Derivatif AUD/USD</h2>
            </div>

            <p class="produk-detail-description">
                Produk Derivatif AUD/USD memberikan akses bagi pelaku pasar untuk memperdagangkan pasangan mata uang antara Dolar Australia dan Dolar Amerika Serikat—salah satu pasangan paling aktif dan likuid di pasar global. AUD/USD dikenal sensitif terhadap pergerakan harga komoditas, kebijakan suku bunga, serta dinamika ekonomi regional Asia–Pasifik, sehingga menciptakan peluang trading yang kaya dan berkelanjutan. Fluktuasi pasangan ini membuka ruang strategis bagi investor untuk memanfaatkan peluang capital gain baik saat AUD menguat maupun melemah terhadap USD. Instrumen derivatif AUD/USD juga dapat menjadi sarana lindung nilai bagi pelaku usaha dan investor yang memiliki eksposur terhadap perubahan nilai tukar antara dua mata uang tersebut. Didukung transparansi harga, eksekusi cepat, dan pasar yang beroperasi hampir 24 jam, Produk Derivatif AUD/USD menghadirkan fleksibilitas bagi trader yang ingin merespons pergerakan global secara real-time. Dengan ekosistem yang likuid dan terstandarisasi, AUD/USD menjadi pilihan yang solid untuk diversifikasi dan penangkapan peluang di pasar valuta asing.
            </p>

            <div class="produk-spec-heading">
                <h3>Spesifikasi Produk</h3>
            </div>

            <div class="produk-table-title">
                FOREX TRADE TABLE<br>
                AU10F_BBJ &amp; AU1010_BBJ
            </div>

            <div class="produk-table-wrapper">
                <table class="produk-detail-table">
                    <thead>
                        <tr>
                            <th>SPECIFICATIONS</th>
                            <th>AU10F_BBJ</th>
                            <th>AU1010_BBJ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="group-row"><td colspan="3">AUSTRALIAN DOLLAR</td></tr>
                        <tr class="group-row"><td colspan="3">AUD/USD</td></tr>
                        <tr><td>Trade Code</td><td>AU10F_BBJ</td><td>AU1010_BBJ</td></tr>
                        <tr><td>Rate</td><td>Floating (USD)</td><td>(USD 1 = IDR 10.000)</td></tr>
                        <tr><td>Contract Size</td><td>AUD 100,000</td><td>AUD 100,000</td></tr>
                        <tr><td>Trading Days</td><td>Senin - Jumat</td><td>Senin - Jumat</td></tr>
                        <tr><td>Trading Hours</td><td>Summer (Daylight Saving Time): 07:00-03:00 WIB<br>Winter: 07:00-04:00 WIB</td><td>Summer (Daylight Saving Time): 07:00-03:00 WIB<br>Winter: 07:00-04:00 WIB</td></tr>
                        <tr class="group-row"><td colspan="3">.</td></tr>
                        <tr><td>Initial Margin for Daytrade</td><td>USD 1,000 / Lot</td><td>IDR 10.000.000 / Lot</td></tr>
                        <tr><td>Initial Margin for Overnight</td><td>USD 2,000 / Lot</td><td>IDR 20.000.000 / Lot</td></tr>
                        <tr class="group-row"><td colspan="3">.</td></tr>
                        <tr><td>Facility Fee</td><td>USD15/Lot/Side</td><td>IDR 150.000/Lot/Side</td></tr>
                        <tr><td>Rollover Fee For Buy/Sell</td><td>USD5/Lot/Night</td><td>IDR 50.000/Lot/Night</td></tr>
                        <tr><td>Value Added Tax (VAT)*</td><td>11% of Commission Fee</td><td>11% of Commission Fee</td></tr>
                        <tr class="group-row"><td colspan="3">.</td></tr>
                        <tr><td>Maintenance Margin</td><td>70% of Initial Margin</td><td>70% of Initial Margin</td></tr>
                        <tr><td>Auto Liquidation</td><td>30% of Initial Margin</td><td>30% of Initial Margin</td></tr>
                        <tr class="group-row"><td colspan="3">.</td></tr>
                        <tr><td>Price Source</td><td>Telequote</td><td>Telequote</td></tr>
                        <tr><td>Price Guidance</td><td>Last Trade</td><td>Last Trade</td></tr>
                        <tr class="group-row"><td colspan="3">.</td></tr>
                        <tr><td>Minimum Price Spread Quote</td><td>4 pips/side</td><td>4 pips/side</td></tr>
                        <tr><td>Hectic Price Spread Quote</td><td>Based on Market</td><td>Based on Market</td></tr>
                        <tr><td>Minimum Price Movement</td><td>0.0001 pip (Tick value : USD 10)</td><td>0.0001 pip (Tick value : USD 10)</td></tr>
                        <tr><td>Range for limit and stop order</td><td>20-2000 Points/pips</td><td>20-2000 Points/pips</td></tr>
                        <tr><td>Hectic Range Price For Limit &amp; Stop Order</td><td>Base On Market</td><td>Base On Market</td></tr>
                        <tr><td>Delivery By</td><td>Cash Settlement</td><td>Cash Settlement</td></tr>
                    </tbody>
                </table>
            </div>

            <div class="produk-detail-note">
                <strong>* Catatan:</strong><br>
                Changes in VAT fees to 11% (Effective as of April 01st, 2022)
            </div>

            <div class="risk-box produk-risk-modern">
                <strong>⚠️ Catatan Risiko</strong>
                Perdagangan valuta asing memiliki risiko tinggi. Nilai mata uang dapat berubah mengikuti kondisi pasar.
            </div>
        </div>
    </div>
</div>

<script>

/* ============================================================
   BUKA MODAL
============================================================= */

function bukaProduk(id) {

    const modal =
        document.getElementById(id);

    if (!modal) {
        return;
    }

    modal.classList.add('active');

    document.body.classList.add('modal-open');
}


/* ============================================================
   TUTUP MODAL
============================================================= */

function tutupProduk() {

    document
        .querySelectorAll('.produk-modal')
        .forEach(function(modal) {

            modal.classList.remove('active');

        });

    document.body.classList.remove('modal-open');
}


/* ============================================================
   TUTUP KETIKA KLIK BACKGROUND
============================================================= */

function tutupJikaBackground(event) {

    if (
        event.target.classList.contains(
            'produk-modal'
        )
    ) {

        tutupProduk();

    }
}


/* ============================================================
   TUTUP DENGAN TOMBOL ESC
============================================================= */

document.addEventListener(
    'keydown',
    function(event) {

        if (event.key === 'Escape') {

            tutupProduk();

        }

    }
);

</script>

@endsection