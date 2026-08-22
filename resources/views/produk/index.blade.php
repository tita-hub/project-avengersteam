@extends('layouts.app')

@section('content')

<style>

    /* =========================================
       HALAMAN PRODUK
    ========================================= */

    .produk-page {
        min-height: 100%;
        padding: 25px 35px 45px;
        background: #f8f9fc;
        box-sizing: border-box;
    }


    /* =========================================
       HEADER
    ========================================= */

    .produk-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .produk-header h1 {
        margin: 0;

        font-size: 34px;
        font-weight: 800;

        color: #111827;
    }

    .produk-header p {
        margin: 7px 0 0;

        font-size: 13px;
        line-height: 1.6;

        color: #6b7280;
    }


    /* =========================================
       CONTAINER CARD
    ========================================= */

    .produk-container {
        width: 100%;
        max-width: 1100px;

        margin: 0 auto;

        display: grid;

        grid-template-columns: repeat(3, 1fr);

        gap: 18px;
    }


    /* =========================================
       CARD PRODUK
    ========================================= */

    .produk-card {
        background: white;

        border: 1px solid #eeeeee;

        border-radius: 10px;

        padding: 22px 25px 20px;

        text-align: center;

        box-shadow:
            0 5px 18px rgba(0, 0, 0, 0.06);

        transition:
            transform 0.25s ease,
            box-shadow 0.25s ease;
    }

    .produk-card:hover {
        transform: translateY(-5px);

        box-shadow:
            0 12px 28px rgba(0, 0, 0, 0.10);
    }


    /* =========================================
       GAMBAR PRODUK
    ========================================= */

    .produk-image {
        width: 115px;
        height: 115px;

        margin: 0 auto 12px;

        border-radius: 50%;

        background: #fafafa;

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .produk-image img {
        width: 90px;
        height: 90px;

        object-fit: contain;
    }


    /* =========================================
       KATEGORI
    ========================================= */

    .produk-category {
        margin-bottom: 5px;

        font-size: 10px;
        font-weight: 700;
    }

    .gold {
        color: #c79a20;
    }

    .green {
        color: #36834d;
    }

    .blue {
        color: #2764b8;
    }


    /* =========================================
       NAMA PRODUK
    ========================================= */

    .produk-card h2 {
        margin: 0;

        font-size: 21px;
        font-weight: 800;

        color: #111;
    }

    .produk-star {
        font-size: 18px;
        margin-left: 3px;
    }


    /* =========================================
       GARIS
    ========================================= */

    .produk-line {
        width: 35px;
        height: 2px;

        margin: 7px auto 10px;

        border-radius: 10px;
    }

    .gold-line {
        background: #c79a20;
    }

    .green-line {
        background: #36834d;
    }

    .blue-line {
        background: #2764b8;
    }


    /* =========================================
       DESKRIPSI
    ========================================= */

    .produk-description {
        min-height: 42px;

        max-width: 230px;

        margin: 0 auto 17px;

        font-size: 11px;
        line-height: 1.5;

        color: #6b7280;
    }


    /* =========================================
       BUTTON DETAIL
    ========================================= */

    .produk-button {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        gap: 25px;

        min-width: 120px;

        padding: 8px 13px;

        border-radius: 5px;

        background: white;

        font-family: inherit;

        font-size: 11px;
        font-weight: 700;

        cursor: pointer;

        transition:
            background 0.2s ease,
            color 0.2s ease;
    }

    .produk-button span {
        font-size: 18px;
        line-height: 1;
    }


    /* GOLD */

    .gold-button {
        color: #c79a20;

        border: 1px solid #c79a20;
    }

    .gold-button:hover {
        background: #c79a20;
        color: white;
    }


    /* GREEN */

    .green-button {
        color: #36834d;

        border: 1px solid #36834d;
    }

    .green-button:hover {
        background: #36834d;
        color: white;
    }


    /* BLUE */

    .blue-button {
        color: #2764b8;

        border: 1px solid #2764b8;
    }

    .blue-button:hover {
        background: #2764b8;
        color: white;
    }



    /* =========================================
       MODAL / POPUP
    ========================================= */

    .product-modal {
        display: none;

        position: fixed;

        inset: 0;

        z-index: 99999;

        background: rgba(0, 0, 0, 0.35);

        align-items: center;
        justify-content: center;

        padding: 20px;

        box-sizing: border-box;
    }


    .product-modal.show {
        display: flex;
    }


    /* =========================================
       KOTAK MODAL
    ========================================= */

    .product-modal-box {
        position: relative;

        width: 100%;
        max-width: 1050px;

        max-height: 90vh;

        overflow-y: auto;

        background: white;

        border-radius: 12px;

        box-shadow:
            0 20px 60px rgba(0, 0, 0, 0.20);

        padding: 25px;

        box-sizing: border-box;

        animation: modalMasuk 0.25s ease;
    }


    @keyframes modalMasuk {

        from {
            opacity: 0;
            transform: translateY(15px) scale(0.98);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

    }


    /* =========================================
       TOMBOL X
    ========================================= */

    .product-modal-close {
        position: absolute;

        top: 10px;
        right: 17px;

        border: none;

        background: transparent;

        color: #111;

        font-size: 30px;

        font-weight: 300;

        line-height: 1;

        cursor: pointer;

        transition: transform 0.2s ease;
    }

    .product-modal-close:hover {
        transform: scale(1.15);
    }


    /* =========================================
       ISI MODAL
    ========================================= */

    .product-modal-content {
        display: grid;

        grid-template-columns: 260px 1px 1fr;

        gap: 25px;

        align-items: stretch;
    }


    /* =========================================
       BAGIAN KIRI
    ========================================= */

    .product-detail-left {
        padding-top: 5px;
    }


    .product-detail-image {
        width: 240px;
        height: 240px;

        margin-bottom: 18px;

        border-radius: 12px;

        background: #f8f8f8;

        display: flex;
        align-items: center;
        justify-content: center;

        overflow: hidden;
    }


    .product-detail-image img {
        width: 90%;
        height: 90%;

        object-fit: contain;
    }


    .product-detail-badge {
        display: inline-block;

        padding: 6px 10px;

        margin-bottom: 8px;

        border-radius: 8px;

        background: #fff5dc;

        color: #b98200;

        font-size: 11px;
        font-weight: 700;
    }


    .product-detail-left h2 {
        margin: 0;

        font-size: 30px;

        font-weight: 800;

        color: #111;
    }


    .product-detail-category {
        margin-top: 8px;
        margin-bottom: 15px;

        font-size: 14px;

        font-weight: 700;
    }


    .product-detail-description {
        margin: 0;

        font-size: 13px;

        line-height: 1.8;

        color: #333;
    }


    /* =========================================
       GARIS PEMISAH
    ========================================= */

    .product-detail-divider {
        width: 1px;

        background: #eeeeee;
    }


    /* =========================================
       BAGIAN KANAN
    ========================================= */

    .product-detail-right h3 {
        margin: 0 0 12px;

        font-size: 20px;

        font-weight: 800;

        color: #111;
    }


    /* =========================================
       TABEL INFORMASI
    ========================================= */

    .product-info-table {
        width: 100%;
    }


    .product-info-row {
        display: grid;

        grid-template-columns: 175px 1fr;

        gap: 15px;

        padding: 9px 0;

        border-bottom: 1px solid #eeeeee;

        font-size: 13px;

        line-height: 1.5;
    }


    .product-info-row span {
        color: #333;
    }


    .product-info-row strong {
        color: #333;

        font-weight: 600;
    }


    /* =========================================
       CATATAN RISIKO
    ========================================= */

    .product-risk {
        margin-top: 15px;

        padding: 13px;

        border-radius: 9px;

        background: #fff8eb;

        border: 1px solid #f2dfb7;

        color: #76551c;
    }


    .product-risk strong {
        font-size: 12px;
    }


    .product-risk p {
        margin: 7px 0 0;

        font-size: 11px;

        line-height: 1.6;

        color: #333;
    }


    /* =========================================
       FOOTER MODAL
    ========================================= */

    .product-modal-footer {
        display: flex;

        justify-content: flex-end;

        margin-top: 18px;
    }


    .modal-tutup-btn {
        min-width: 105px;

        padding: 9px 20px;

        border: 1px solid #999;

        border-radius: 6px;

        background: white;

        color: #222;

        font-family: inherit;

        font-size: 13px;

        font-weight: 700;

        cursor: pointer;

        transition: all 0.2s ease;
    }


    .modal-tutup-btn:hover {
        background: #f3f3f3;
    }


    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width: 850px) {

        .produk-container {
            grid-template-columns: 1fr;
            max-width: 500px;
        }

        .product-modal-content {
            grid-template-columns: 1fr;
        }

        .product-detail-divider {
            display: none;
        }

        .product-detail-image {
            width: 100%;
            max-width: 240px;

            margin-left: auto;
            margin-right: auto;
        }

    }


    @media (max-width: 500px) {

        .produk-page {
            padding: 20px 15px;
        }

        .product-modal {
            padding: 10px;
        }

        .product-modal-box {
            padding: 18px;
        }

        .product-info-row {
            grid-template-columns: 120px 1fr;
            font-size: 11px;
        }

    }

</style>


<!-- =========================================
     HALAMAN PRODUK
========================================= -->

<div class="produk-page">


    <!-- HEADER -->

    <div class="produk-header">

        <h1>Produk</h1>

        <p>
            RFB Semarang menyediakan berbagai produk investasi
            <br>
            melalui Bursa Berjangka Jakarta (BBJ).
        </p>

    </div>


    <!-- =====================================
         CARD PRODUK
    ====================================== -->

    <div class="produk-container">


        <!-- ==========================
             EMAS
        =========================== -->

        <div class="produk-card">

            <div class="produk-image">

                <img
                    src="{{ asset('images/produk/emas.png') }}"
                    alt="Emas Gold"
                >

            </div>


            <div class="produk-category gold">
                KOMODITAS
            </div>


            <h2>
                Emas (Gold)

                <span class="produk-star gold">
                    ★
                </span>
            </h2>


            <div class="produk-line gold-line"></div>


            <p class="produk-description">
                Investasi pada logam mulia yang menjadi
                pilihan utama untuk lindung nilai.
            </p>


            <button
                type="button"
                class="produk-button gold-button"
                onclick="openProductModal('emas')"
            >
                Lihat Detail
                <span>›</span>
            </button>

        </div>



        <!-- ==========================
             NIKKEI
        =========================== -->

        <div class="produk-card">

            <div class="produk-image">

                <img
                    src="{{ asset('images/produk/nikkei.png') }}"
                    alt="Nikkei 225"
                >

            </div>


            <div class="produk-category green">
                INDEKS SAHAM
            </div>


            <h2>
                Nikkei 225

                <span class="produk-star green">
                    ★
                </span>
            </h2>


            <div class="produk-line green-line"></div>


            <p class="produk-description">
                Indeks saham utama Jepang yang mencerminkan
                pergerakan pasar saham Jepang.
            </p>


            <button
                type="button"
                class="produk-button green-button"
                onclick="openProductModal('nikkei')"
            >
                Lihat Detail
                <span>›</span>
            </button>

        </div>



        <!-- ==========================
             FOREX
        =========================== -->

        <div class="produk-card">

            <div class="produk-image">

                <img
                    src="{{ asset('images/produk/forex.png') }}"
                    alt="AUD USD"
                >

            </div>


            <div class="produk-category blue">
                FOREX
            </div>


            <h2>
                AUD/USD

                <span class="produk-star blue">
                    ★
                </span>
            </h2>


            <div class="produk-line blue-line"></div>


            <p class="produk-description">
                Pasangan mata uang populer dengan
                likuiditas tinggi.
            </p>


            <button
                type="button"
                class="produk-button blue-button"
                onclick="openProductModal('forex')"
            >
                Lihat Detail
                <span>›</span>
            </button>

        </div>


    </div>

</div>



<!-- =========================================
     POPUP DETAIL PRODUK
========================================= -->

<div
    id="productModal"
    class="product-modal"
>


    <div class="product-modal-box">


        <!-- TOMBOL X -->

        <button
            type="button"
            class="product-modal-close"
            onclick="closeProductModal()"
        >
            ×
        </button>


        <div class="product-modal-content">


            <!-- =================================
                 KIRI
            ================================== -->

            <div class="product-detail-left">


                <div class="product-detail-image">

                    <img
                        id="modalProductImage"
                        src=""
                        alt="Produk"
                    >

                </div>


                <div class="product-detail-badge">

                    ★ PRODUK UNGGULAN

                </div>


                <h2 id="modalProductName">
                    Emas (Gold)
                </h2>


                <div
                    id="modalProductCategory"
                    class="product-detail-category"
                >
                    Komoditas
                </div>


                <p
                    id="modalProductDescription"
                    class="product-detail-description"
                >
                    -
                </p>

            </div>


            <!-- GARIS -->

            <div class="product-detail-divider"></div>


            <!-- =================================
                 KANAN
            ================================== -->

            <div class="product-detail-right">


                <h3>
                    Informasi Produk
                </h3>


                <div class="product-info-table">


                    <div class="product-info-row">
                        <span>Kode Produk</span>
                        <strong id="modalKode">-</strong>
                    </div>


                    <div class="product-info-row">
                        <span>Kategori</span>
                        <strong id="modalJenis">-</strong>
                    </div>


                    <div class="product-info-row">
                        <span>Aset Dasar</span>
                        <strong id="modalAset">-</strong>
                    </div>


                    <div class="product-info-row">
                        <span>Ukuran Kontrak</span>
                        <strong id="modalKontrak">-</strong>
                    </div>


                    <div class="product-info-row">
                        <span>Satuan Harga</span>
                        <strong id="modalHarga">-</strong>
                    </div>


                    <div class="product-info-row">
                        <span>Nilai Tick</span>
                        <strong id="modalTick">-</strong>
                    </div>


                    <div class="product-info-row">
                        <span>Jam Perdagangan</span>
                        <strong id="modalJam">-</strong>
                    </div>


                    <div class="product-info-row">
                        <span>Bursa</span>

                        <strong>
                            Bursa Berjangka Jakarta (BBJ)
                        </strong>
                    </div>


                    <div class="product-info-row">
                        <span>Clearing House</span>

                        <strong>
                            Kliring Berjangka Indonesia (KBI)
                        </strong>
                    </div>


                    <div class="product-info-row">
                        <span>Pengawas</span>

                        <strong>
                            BAPPEBTI
                        </strong>
                    </div>


                </div>


                <!-- CATATAN RISIKO -->

                <div class="product-risk">

                    <strong>
                        ⚠ &nbsp; CATATAN RISIKO
                    </strong>


                    <p>
                        Perdagangan berjangka memiliki risiko
                        dan dapat menyebabkan kerugian.
                        Pastikan memahami karakteristik dan
                        risiko produk sebelum melakukan transaksi.
                    </p>

                </div>


                <!-- =================================
                     HANYA TOMBOL TUTUP
                ================================== -->

                <div class="product-modal-footer">

                    <button
                        type="button"
                        class="modal-tutup-btn"
                        onclick="closeProductModal()"
                    >
                        Tutup
                    </button>

                </div>


            </div>

        </div>

    </div>

</div>



<!-- =========================================
     JAVASCRIPT
========================================= -->

<script>

    /*
    |--------------------------------------------------------------------------
    | DATA PRODUK
    |--------------------------------------------------------------------------
    */

    const productData = {


        // ==========================
        // EMAS
        // ==========================

        emas: {

            image: "{{ asset('images/produk/emas.png') }}",

            name: "Emas (Gold)",

            category: "Komoditas",

            categoryClass: "gold",

            description:
                "Produk perdagangan berjangka dengan emas sebagai aset dasar yang dapat diperdagangkan melalui Bursa Berjangka Jakarta (BBJ).",

            kode: "GOL",

            jenis: "Komoditas",

            aset: "Emas",

            kontrak: "1 Kilogram",

            harga: "USD per Troy Ounce",

            tick: "0,01 USD",

            jam:
                "Senin - Jumat<br>08:30 - 16:30 WIB"

        },


        // ==========================
        // NIKKEI
        // ==========================

        nikkei: {

            image: "{{ asset('images/produk/nikkei.png') }}",

            name: "Nikkei 225",

            category: "Indeks Saham",

            categoryClass: "green",

            description:
                "Indeks saham utama Jepang yang mencerminkan pergerakan pasar saham di Bursa Efek Tokyo, terdiri dari 225 perusahaan terpilih dari berbagai sektor industri.",

            kode: "N225",

            jenis: "Indeks Saham",

            aset: "Nikkei 225 Index",

            kontrak: "JPY 500 x Indeks",

            harga: "JPY",

            tick: "5 JPY",

            jam:
                "Senin - Jumat<br>08:00 - 15:15 WIB"

        },


        // ==========================
        // FOREX
        // ==========================

        forex: {

            image: "{{ asset('images/produk/forex.png') }}",

            name: "AUD/USD",

            category: "Forex",

            categoryClass: "blue",

            description:
                "AUD/USD adalah pasangan mata uang yang terdiri dari Australian Dollar (AUD) sebagai mata uang dasar dan US Dollar (USD) sebagai mata uang kuotasi. Produk ini memiliki likuiditas tinggi dan banyak diperdagangkan di pasar global.",

            kode: "AUDUSD",

            jenis: "Forex",

            aset: "Australian Dollar / US Dollar",

            kontrak: "100.000 AUD",

            harga: "USD",

            tick: "0,0001",

            jam:
                "Senin - Jumat<br>00:00 - 23:55 WIB"

        }

    };



    /*
    |--------------------------------------------------------------------------
    | BUKA MODAL
    |--------------------------------------------------------------------------
    */

    function openProductModal(product) {

        const data = productData[product];


        if (!data) {
            return;
        }


        document.getElementById('modalProductImage').src =
            data.image;


        document.getElementById('modalProductName').textContent =
            data.name;


        const category =
            document.getElementById('modalProductCategory');

        category.textContent =
            data.category;


        category.className =
            'product-detail-category ' +
            data.categoryClass;


        document.getElementById('modalProductDescription').textContent =
            data.description;


        document.getElementById('modalKode').textContent =
            data.kode;


        document.getElementById('modalJenis').textContent =
            data.jenis;


        document.getElementById('modalAset').textContent =
            data.aset;


        document.getElementById('modalKontrak').textContent =
            data.kontrak;


        document.getElementById('modalHarga').textContent =
            data.harga;


        document.getElementById('modalTick').textContent =
            data.tick;


        document.getElementById('modalJam').innerHTML =
            data.jam;


        /*
        |--------------------------------------------------------------------------
        | TAMPILKAN MODAL
        |--------------------------------------------------------------------------
        */

        document
            .getElementById('productModal')
            .classList
            .add('show');


        /*
        |--------------------------------------------------------------------------
        | KUNCI SCROLL HALAMAN BELAKANG
        |--------------------------------------------------------------------------
        */

        document.body.style.overflow = 'hidden';

    }



    /*
    |--------------------------------------------------------------------------
    | TUTUP MODAL
    |--------------------------------------------------------------------------
    */

    function closeProductModal() {

        document
            .getElementById('productModal')
            .classList
            .remove('show');


        document.body.style.overflow = '';

    }



    /*
    |--------------------------------------------------------------------------
    | KLIK AREA LUAR MODAL
    |--------------------------------------------------------------------------
    */

    document
        .getElementById('productModal')
        .addEventListener('click', function (event) {

            if (event.target === this) {

                closeProductModal();

            }

        });



    /*
    |--------------------------------------------------------------------------
    | TOMBOL ESC
    |--------------------------------------------------------------------------
    */

    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {

            closeProductModal();

        }

    });

</script>

@endsection