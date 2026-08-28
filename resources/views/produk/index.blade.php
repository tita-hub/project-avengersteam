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
   PRODUCT CONTAINER
   ============================================================ */

.produk-container {
    max-width: 1200px;
    margin: 0 auto;

    display: grid;
    grid-template-columns: repeat(3, 1fr);

    gap: 30px;

    align-items: stretch;
}


/* ============================================================
   PRODUCT CARD
   ============================================================ */

.produk-card {

    background: white;

    border-radius: 20px;

    padding: 30px;

    box-shadow:
        0 8px 25px rgba(0,0,0,0.06);

    display: flex;
    flex-direction: column;

    /*
       SEMUA CARD DIBUAT SAMA TINGGINYA
    */
    min-height: 610px;

    box-sizing: border-box;

    position: relative;

    overflow: hidden;

    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease;

    animation: cardAppear 0.8s ease both;
}


/* ============================================================
   ANIMASI CARD
   ============================================================ */

.produk-card:nth-child(1) {
    animation-delay: 0.1s;
}

.produk-card:nth-child(2) {
    animation-delay: 0.2s;
}

.produk-card:nth-child(3) {
    animation-delay: 0.3s;
}


/* ============================================================
   GARIS DEKORASI ATAS
   ============================================================ */

.produk-card::before {

    content: "";

    position: absolute;

    top: 0;
    left: 0;

    width: 100%;
    height: 4px;

    background: var(--produk-color);

    transform: scaleX(0);

    transform-origin: left;

    transition: transform 0.35s ease;
}

.produk-card:hover::before {
    transform: scaleX(1);
}


/* ============================================================
   HOVER CARD
   ============================================================ */

.produk-card:hover {

    transform: translateY(-10px);

    box-shadow:
        0 18px 40px rgba(0,0,0,0.10);
}


/* ============================================================
   IMAGE
   ============================================================ */

.produk-image-wrapper {

    width: 170px;
    height: 170px;

    margin: 0 auto 25px;

    border-radius: 50%;

    background: #f7f8fa;

    display: flex;

    align-items: center;
    justify-content: center;

    overflow: hidden;

    position: relative;

    border: 8px solid white;

    box-shadow:
        0 8px 25px rgba(0,0,0,0.08);

    transition:
        transform 0.4s ease,
        box-shadow 0.4s ease;
}


.produk-card:hover .produk-image-wrapper {

    transform: scale(1.04);

    box-shadow:
        0 12px 30px rgba(0,0,0,0.12);
}


.produk-image-wrapper img {

    width: 100%;
    height: 100%;

    object-fit: cover;

    border-radius: 50%;

    transition:
        transform 0.5s ease;
}


.produk-card:hover
.produk-image-wrapper img {

    transform: scale(1.10);
}


/* ============================================================
   CATEGORY
   ============================================================ */

.produk-category {

    text-align: center;

    font-size: 14px;

    font-weight: bold;

    letter-spacing: 0.5px;

    color: var(--produk-color);

    margin-bottom: 7px;

    height: 20px;

    display: flex;
    align-items: center;
    justify-content: center;
}


/* ============================================================
   TITLE
   ============================================================ */

.produk-card h2 {

    font-family: Georgia, serif;

    color: #111827;

    text-align: center;

    font-size: 29px;

    margin: 0 0 10px;

    /*
       TINGGI JUDUL DIBUAT SAMA
    */
    min-height: 40px;

    display: flex;

    align-items: center;
    justify-content: center;
}


/* ============================================================
   DECORATION LINE
   ============================================================ */

.produk-line {

    width: 55px;

    height: 4px;

    border-radius: 20px;

    background: var(--produk-color);

    margin: 0 auto 20px;

    flex-shrink: 0;

    transition:
        width 0.35s ease;
}


.produk-card:hover .produk-line {
    width: 90px;
}


/* ============================================================
   DESCRIPTION
   ============================================================ */

/*
   BAGIAN INI YANG PALING PENTING.

   Semua deskripsi diberi tinggi yang sama,
   jadi kotak informasi akan sejajar.
*/

.produk-description {

    color: #65746b;

    text-align: center;

    font-size: 15px;

    line-height: 1.8;

    margin: 0;

    /*
       Tinggi dibuat tetap.
       Walaupun teks berbeda jumlah baris,
       posisi bagian bawah tetap sama.
    */
    height: 125px;

    display: flex;

    align-items: flex-start;

    justify-content: center;

    flex-shrink: 0;
}


/* ============================================================
   PRODUCT INFO
   ============================================================ */

.produk-info {

    margin-top: 5px;

    padding: 15px 17px;

    border-radius: 12px;

    background: #f8fafc;

    border-left: 3px solid var(--produk-color);

    color: #596579;

    font-size: 13px;

    line-height: 1.7;

    /*
       SEMUA KOTAK INFORMASI SAMA TINGGI
    */
    height: 105px;

    box-sizing: border-box;

    flex-shrink: 0;

    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;
}


.produk-card:hover .produk-info {

    transform: translateY(-2px);

    box-shadow:
        0 5px 15px rgba(0,0,0,0.04);
}


.produk-info strong {

    color: #263238;

    display: inline-block;

    margin-bottom: 2px;
}


/* ============================================================
   BUTTON AREA
   ============================================================ */

.produk-button {

    margin-top: auto;

    padding-top: 25px;

    flex-shrink: 0;
}


/* ============================================================
   BUTTON
   ============================================================ */

.btn-detail {

    width: 100%;

    height: 52px;

    border-radius: 10px;

    border: 1.5px solid var(--produk-color);

    background: white;

    color: var(--produk-color);

    font-size: 16px;

    font-weight: bold;

    cursor: pointer;

    position: relative;

    overflow: hidden;

    transition:
        color 0.3s ease,
        transform 0.2s ease,
        box-shadow 0.3s ease;
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
        width 0.3s ease;

    z-index: 0;
}


.btn-detail:hover::before {
    width: 100%;
}


.btn-detail:hover {

    color: white;

    transform: translateY(-2px);

    box-shadow:
        0 7px 18px rgba(0,0,0,0.08);
}


.btn-detail span {

    position: relative;

    z-index: 2;
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

.modal-close {

    position: fixed;

    right: 20px;
    top: 18px;

    width: 38px;
    height: 38px;

    border: none;

    border-radius: 50%;

    background: #f1f4f7;

    color: #444;

    font-size: 23px;

    cursor: pointer;

    transition:
        0.25s;
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


    /*
       Pada HP deskripsi tetap diberi
       ruang yang cukup.
    */
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

</style>


<div class="produk-wrapper">


    {{-- ========================================================
         HEADER
    ========================================================= --}}

    <div class="produk-header">

        <div class="label">
            PT Rifan Financindo Berjangka
        </div>

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
            style="--produk-color: #d49b00;"
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
            style="--produk-color: #2d8a57;"
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
            style="--produk-color: #2868c7;"
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
        style="--produk-color: #d49b00;"
    >

        <button
            class="modal-close"
            onclick="tutupProduk()"
        >
            ×
        </button>


        <div class="modal-header">

            <img
                class="modal-image"
                src="{{ asset('images/produk/emas.png') }}"
                alt="Emas Gold"
            >

            <div class="modal-title">

                <small>
                    Komoditas
                </small>

                <h2>
                    Emas (Gold)
                </h2>

            </div>

        </div>


        <div class="modal-content">

            <h3>
                Informasi Produk
            </h3>


            <div class="informasi-produk">

                <div class="info-label">
                    Kode Produk
                </div>

                <div class="info-value">
                    GOL
                </div>


                <div class="info-label">
                    Jenis
                </div>

                <div class="info-value">
                    Komoditas
                </div>


                <div class="info-label">
                    Aset Dasar
                </div>

                <div class="info-value">
                    Emas
                </div>


                <div class="info-label">
                    Ukuran Kontrak
                </div>

                <div class="info-value">
                    1 Kilogram
                </div>


                <div class="info-label">
                    Satuan Harga
                </div>

                <div class="info-value">
                    USD per Troy Ounce
                </div>


                <div class="info-label">
                    Nilai Tick
                </div>

                <div class="info-value">
                    0,01 USD
                </div>


                <div class="info-label">
                    Jam Perdagangan
                </div>

                <div class="info-value">
                    Senin - Jumat
                    <br>
                    08:30 - 16:30 WIB
                </div>


                <div class="info-label">
                    Bursa
                </div>

                <div class="info-value">
                    Bursa Berjangka Jakarta (BBJ)
                </div>


                <div class="info-label">
                    Clearing House
                </div>

                <div class="info-value">
                    Kliring Berjangka Indonesia (KBI)
                </div>


                <div class="info-label">
                    Pengawas
                </div>

                <div class="info-value">
                    BAPPEBTI
                </div>

            </div>


            <div class="risk-box">

                <strong>
                    ⚠️ Catatan Risiko
                </strong>

                Perdagangan berjangka memiliki risiko
                dan dapat menyebabkan kerugian.
                Pastikan memahami karakteristik dan
                risiko produk sebelum melakukan transaksi.

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
        style="--produk-color: #2d8a57;"
    >

        <button
            class="modal-close"
            onclick="tutupProduk()"
        >
            ×
        </button>


        <div class="modal-header">

            <img
                class="modal-image"
                src="{{ asset('images/produk/nikkei.png') }}"
                alt="Nikkei 225"
            >

            <div class="modal-title">

                <small>
                    Indeks Saham
                </small>

                <h2>
                    Nikkei 225
                </h2>

            </div>

        </div>


        <div class="modal-content">

            <h3>
                Informasi Produk
            </h3>


            <div class="informasi-produk">

                <div class="info-label">
                    Kode Produk
                </div>

                <div class="info-value">
                    NK225
                </div>


                <div class="info-label">
                    Jenis
                </div>

                <div class="info-value">
                    Indeks Saham
                </div>


                <div class="info-label">
                    Aset Dasar
                </div>

                <div class="info-value">
                    Nikkei 225
                </div>


                <div class="info-label">
                    Pasar
                </div>

                <div class="info-value">
                    Jepang
                </div>


                <div class="info-label">
                    Karakteristik
                </div>

                <div class="info-value">
                    Indeks yang mencerminkan pergerakan
                    sejumlah saham utama Jepang.
                </div>


                <div class="info-label">
                    Bursa
                </div>

                <div class="info-value">
                    Bursa Berjangka Jakarta (BBJ)
                </div>


                <div class="info-label">
                    Pengawas
                </div>

                <div class="info-value">
                    BAPPEBTI
                </div>

            </div>


            <div class="risk-box">

                <strong>
                    ⚠️ Catatan Risiko
                </strong>

                Perdagangan indeks memiliki risiko.
                Pergerakan pasar dapat menyebabkan
                keuntungan maupun kerugian.

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
        style="--produk-color: #2868c7;"
    >

        <button
            class="modal-close"
            onclick="tutupProduk()"
        >
            ×
        </button>


        <div class="modal-header">

            <img
                class="modal-image"
                src="{{ asset('images/produk/forex.png') }}"
                alt="AUD USD"
            >

            <div class="modal-title">

                <small>
                    Forex
                </small>

                <h2>
                    AUD/USD
                </h2>

            </div>

        </div>


        <div class="modal-content">

            <h3>
                Informasi Produk
            </h3>


            <div class="informasi-produk">

                <div class="info-label">
                    Kode Produk
                </div>

                <div class="info-value">
                    AUD/USD
                </div>


                <div class="info-label">
                    Jenis
                </div>

                <div class="info-value">
                    Forex
                </div>


                <div class="info-label">
                    Mata Uang
                </div>

                <div class="info-value">
                    Dolar Australia /
                    Dolar Amerika Serikat
                </div>


                <div class="info-label">
                    Pasangan
                </div>

                <div class="info-value">
                    AUD/USD
                </div>


                <div class="info-label">
                    Karakteristik
                </div>

                <div class="info-value">
                    Pasangan mata uang dengan
                    aktivitas perdagangan yang tinggi.
                </div>


                <div class="info-label">
                    Bursa
                </div>

                <div class="info-value">
                    Bursa Berjangka Jakarta (BBJ)
                </div>


                <div class="info-label">
                    Pengawas
                </div>

                <div class="info-value">
                    BAPPEBTI
                </div>

            </div>


            <div class="risk-box">

                <strong>
                    ⚠️ Catatan Risiko
                </strong>

                Perdagangan valuta asing memiliki
                risiko tinggi. Nilai mata uang dapat
                berubah mengikuti kondisi pasar.

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