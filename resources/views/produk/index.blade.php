@extends('layouts.app')

@section('content')

<style>

/* =====================================================
   HALAMAN PRODUK
===================================================== */

.produk-page {
    padding: 35px 45px 60px;
    min-height: 100vh;
    box-sizing: border-box;
    background: #f7f8fc;
}


/* =====================================================
   HEADER
===================================================== */

.produk-header {
    text-align: center;
    margin-bottom: 40px;
}

.produk-header h1 {
    margin: 0;
    font-size: 42px;
    font-weight: 700;
    color: #111827;
}

.produk-header p {
    margin-top: 12px;
    font-size: 16px;
    line-height: 1.7;
    color: #6b7280;
}


/* =====================================================
   GRID PRODUK
===================================================== */

.produk-grid {
    max-width: 1220px;
    margin: 0 auto;

    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}


/* =====================================================
   CARD PRODUK
===================================================== */

.produk-card {
    background: #ffffff;

    border: 1px solid #e9e9e9;
    border-radius: 14px;

    padding: 28px 25px 24px;

    text-align: center;

    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);

    transition:
        transform 0.25s ease,
        box-shadow 0.25s ease;
}

.produk-card:hover {
    transform: translateY(-5px);

    box-shadow:
        0 12px 30px rgba(0, 0, 0, 0.10);
}


/* =====================================================
   GAMBAR PRODUK
===================================================== */

.produk-image {
    width: 125px;
    height: 125px;

    margin: 0 auto 22px;

    border-radius: 50%;

    overflow: hidden;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #f5f6f8;
}

.produk-image img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    border-radius: 50%;

    display: block;
}


/* =====================================================
   KATEGORI
===================================================== */

.produk-category {
    font-size: 13px;
    font-weight: 700;

    letter-spacing: 0.3px;

    margin-bottom: 7px;
}

.gold-category {
    color: #c99618;
}

.nikkei-category {
    color: #37864d;
}

.forex-category {
    color: #2466c7;
}


/* =====================================================
   JUDUL PRODUK
===================================================== */

.produk-title {
    margin: 0;

    font-size: 26px;
    font-weight: 700;

    color: #111111;
}

.produk-star {
    font-size: 22px;
}

.gold-star {
    color: #c99618;
}

.nikkei-star {
    color: #37864d;
}

.forex-star {
    color: #2466c7;
}


/* =====================================================
   GARIS BAWAH JUDUL
===================================================== */

.produk-line {
    width: 45px;
    height: 3px;

    margin: 12px auto 14px;

    border-radius: 5px;
}

.gold-line {
    background: #c99618;
}

.nikkei-line {
    background: #37864d;
}

.forex-line {
    background: #2466c7;
}


/* =====================================================
   DESKRIPSI
===================================================== */

.produk-description {
    min-height: 55px;

    margin: 0 auto 25px;

    max-width: 300px;

    font-size: 14px;
    line-height: 1.7;

    color: #666666;
}


/* =====================================================
   TOMBOL LIHAT DETAIL
===================================================== */

.btn-detail {
    width: 155px;

    padding: 12px 18px;

    background: #ffffff;

    border-radius: 6px;

    font-size: 14px;
    font-weight: 600;

    cursor: pointer;

    display: inline-flex;
    align-items: center;
    justify-content: space-between;

    transition: all 0.2s ease;
}

.btn-detail span {
    font-size: 19px;
    line-height: 1;
}

.btn-gold {
    color: #c99618;
    border: 1px solid #c99618;
}

.btn-gold:hover {
    background: #c99618;
    color: white;
}

.btn-nikkei {
    color: #37864d;
    border: 1px solid #37864d;
}

.btn-nikkei:hover {
    background: #37864d;
    color: white;
}

.btn-forex {
    color: #2466c7;
    border: 1px solid #2466c7;
}

.btn-forex:hover {
    background: #2466c7;
    color: white;
}


/* =====================================================
   POPUP
===================================================== */

.produk-modal {
    position: fixed;

    inset: 0;

    background: rgba(0, 0, 0, 0.45);

    display: none;

    align-items: center;
    justify-content: center;

    padding: 25px;

    z-index: 9999;

    opacity: 0;

    transition: opacity 0.25s ease;
}

.produk-modal.show {
    display: flex;
    opacity: 1;
}


/* =====================================================
   BOX POPUP
===================================================== */

.produk-modal-box {
    width: min(950px, 95vw);
    max-height: 90vh;

    overflow-y: auto;

    background: white;

    border-radius: 18px;

    box-shadow:
        0 20px 60px rgba(0, 0, 0, 0.20);

    position: relative;

    padding: 30px;

    box-sizing: border-box;
}


/* =====================================================
   HEADER POPUP
===================================================== */

.modal-header {
    display: flex;

    align-items: center;
    justify-content: space-between;

    padding-bottom: 18px;

    border-bottom: 1px solid #eeeeee;

    margin-bottom: 25px;
}

.modal-header h2 {
    margin: 0;

    font-size: 22px;

    color: #111827;
}

.modal-close {
    width: 38px;
    height: 38px;

    border: none;

    background: transparent;

    font-size: 30px;
    line-height: 1;

    cursor: pointer;

    color: #222;

    border-radius: 50%;

    transition: 0.2s;
}

.modal-close:hover {
    background: #f1f1f1;
}


/* =====================================================
   ISI POPUP
===================================================== */

.modal-content {
    display: grid;

    grid-template-columns: 280px 1fr;

    gap: 30px;
}


/* =====================================================
   BAGIAN KIRI POPUP
===================================================== */

.modal-left {
    border-right: 1px solid #eeeeee;

    padding-right: 25px;
}

.modal-product-image {
    width: 200px;
    height: 200px;

    margin: 0 auto 22px;

    border-radius: 50%;

    overflow: hidden;

    background: #f5f6f8;
}

.modal-product-image img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    border-radius: 50%;

    display: block;
}

.modal-product-title {
    margin: 0;

    font-size: 29px;
    font-weight: 700;

    color: #111;
}

.modal-product-category {
    margin-top: 8px;

    font-size: 15px;
    font-weight: 700;
}

.modal-product-description {
    margin-top: 20px;

    font-size: 14px;

    line-height: 1.8;

    color: #444;
}


/* =====================================================
   BAGIAN KANAN POPUP
===================================================== */

.modal-right h3 {
    margin: 0 0 14px;

    font-size: 19px;

    color: #111;
}

.info-table {
    width: 100%;

    border-collapse: collapse;
}

.info-table tr {
    border-bottom: 1px solid #eeeeee;
}

.info-table td {
    padding: 11px 8px;

    font-size: 14px;

    vertical-align: top;
}

.info-table td:first-child {
    width: 42%;

    font-weight: 600;

    color: #333;
}

.info-table td:last-child {
    color: #555;
}


/* =====================================================
   CATATAN RISIKO
===================================================== */

.risk-box {
    margin-top: 20px;

    padding: 15px 17px;

    border-radius: 10px;

    background: #fff8e8;

    border: 1px solid #f1dfb5;
}

.risk-title {
    margin-bottom: 8px;

    font-size: 14px;

    font-weight: 700;

    color: #9b6c0a;
}

.risk-text {
    margin: 0;

    font-size: 13px;

    line-height: 1.6;

    color: #555;
}


/* =====================================================
   FOOTER POPUP
===================================================== */

.modal-footer {
    display: flex;

    justify-content: flex-end;

    margin-top: 25px;
}

.btn-tutup {
    min-width: 110px;

    padding: 11px 22px;

    background: white;

    border: 1px solid #999;

    border-radius: 7px;

    font-size: 14px;

    font-weight: 600;

    cursor: pointer;

    transition: 0.2s;
}

.btn-tutup:hover {
    background: #eeeeee;
}


/* =====================================================
   RESPONSIVE
===================================================== */

@media (max-width: 900px) {

    .produk-grid {
        grid-template-columns: 1fr;
    }

    .produk-page {
        padding: 30px 20px;
    }

    .modal-content {
        grid-template-columns: 1fr;
    }

    .modal-left {
        border-right: none;

        border-bottom: 1px solid #eeeeee;

        padding-right: 0;

        padding-bottom: 25px;
    }

    .modal-product-image {
        width: 180px;
        height: 180px;
    }

}

</style>


<!-- =====================================================
     HALAMAN PRODUK
===================================================== -->

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



    <!-- =================================================
         GRID PRODUK
    ================================================== -->

    <div class="produk-grid">


        <!-- =================================================
             PRODUK EMAS
        ================================================== -->

        <div class="produk-card">

            <div class="produk-image">

                <img
                    src="{{ asset('images/produk/emas.png') }}"
                    alt="Emas Gold"
                >

            </div>


            <div class="produk-category gold-category">
                KOMODITAS
            </div>


            <h2 class="produk-title">

                Emas (Gold)

                <span class="produk-star gold-star">
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
                class="btn-detail btn-gold"
                onclick="bukaProduk('emas')"
            >

                <span style="font-size:14px;">
                    Lihat Detail
                </span>

                <span>
                    ›
                </span>

            </button>

        </div>



        <!-- =================================================
             PRODUK NIKKEI
        ================================================== -->

        <div class="produk-card">

            <div class="produk-image">

                <img
                    src="{{ asset('images/produk/nikkei.png') }}"
                    alt="Nikkei 225"
                >

            </div>


            <div class="produk-category nikkei-category">
                INDEKS SAHAM
            </div>


            <h2 class="produk-title">

                Nikkei 225

                <span class="produk-star nikkei-star">
                    ★
                </span>

            </h2>


            <div class="produk-line nikkei-line"></div>


            <p class="produk-description">

                Indeks saham utama Jepang yang mencerminkan
                pergerakan pasar saham Jepang.

            </p>


            <button
                type="button"
                class="btn-detail btn-nikkei"
                onclick="bukaProduk('nikkei')"
            >

                <span style="font-size:14px;">
                    Lihat Detail
                </span>

                <span>
                    ›
                </span>

            </button>

        </div>



        <!-- =================================================
             PRODUK FOREX
        ================================================== -->

        <div class="produk-card">

            <div class="produk-image">

                <img
                    src="{{ asset('images/produk/forex.png') }}"
                    alt="AUD USD"
                >

            </div>


            <div class="produk-category forex-category">
                FOREX
            </div>


            <h2 class="produk-title">

                AUD/USD

                <span class="produk-star forex-star">
                    ★
                </span>

            </h2>


            <div class="produk-line forex-line"></div>


            <p class="produk-description">

                Pasangan mata uang populer dengan
                likuiditas tinggi.

            </p>


            <button
                type="button"
                class="btn-detail btn-forex"
                onclick="bukaProduk('forex')"
            >

                <span style="font-size:14px;">
                    Lihat Detail
                </span>

                <span>
                    ›
                </span>

            </button>

        </div>

    </div>

</div>



<!-- =====================================================
     POPUP DETAIL PRODUK
===================================================== -->

<div
    id="produkModal"
    class="produk-modal"
    onclick="klikBackground(event)"
>


    <div class="produk-modal-box">


        <!-- HEADER POPUP -->

        <div class="modal-header">

            <h2>
                Detail Produk
            </h2>


            <button
                type="button"
                class="modal-close"
                onclick="tutupProduk()"
            >
                ×
            </button>

        </div>



        <!-- ISI POPUP -->

        <div class="modal-content">


            <!-- BAGIAN KIRI -->

            <div class="modal-left">


                <div class="modal-product-image">

                    <img
                        id="modalImage"
                        src=""
                        alt="Produk"
                    >

                </div>


                <h2
                    id="modalTitle"
                    class="modal-product-title"
                >
                </h2>


                <div
                    id="modalCategory"
                    class="modal-product-category"
                >
                </div>


                <p
                    id="modalDescription"
                    class="modal-product-description"
                >
                </p>

            </div>



            <!-- BAGIAN KANAN -->

            <div class="modal-right">

                <h3>
                    Informasi Produk
                </h3>


                <table class="info-table">

                    <tbody id="modalInfo">
                    </tbody>

                </table>


                <div class="risk-box">

                    <div class="risk-title">
                        ⚠ CATATAN RISIKO
                    </div>

                    <p class="risk-text">

                        Perdagangan berjangka memiliki risiko
                        dan dapat menyebabkan kerugian.
                        Pastikan memahami karakteristik dan
                        risiko produk sebelum melakukan transaksi.

                    </p>

                </div>

            </div>

        </div>



        <!-- FOOTER -->

        <div class="modal-footer">

            <button
                type="button"
                class="btn-tutup"
                onclick="tutupProduk()"
            >
                Tutup
            </button>

        </div>

    </div>

</div>



<script>

/* =====================================================
   DATA PRODUK
===================================================== */

const dataProduk = {

    emas: {

        title: 'Emas (Gold)',

        category: 'Komoditas',

        categoryColor: '#c99618',

        image: "{{ asset('images/produk/emas.png') }}",

        description:
            'Produk perdagangan berjangka dengan emas sebagai aset dasar yang dapat diperdagangkan melalui Bursa Berjangka Jakarta (BBJ).',

        info: [

            ['Kode Produk', 'GOL'],

            ['Jenis', 'Komoditas'],

            ['Aset Dasar', 'Emas'],

            ['Ukuran Kontrak', '1 Kilogram'],

            ['Satuan Harga', 'USD per Troy Ounce'],

            ['Nilai Tick', '0,01 USD'],

            [
                'Jam Perdagangan',
                'Senin - Jumat<br>08:30 - 16:30 WIB'
            ],

            [
                'Bursa',
                'Bursa Berjangka Jakarta (BBJ)'
            ],

            [
                'Clearing House',
                'Kliring Berjangka Indonesia (KBI)'
            ],

            [
                'Pengawas',
                'BAPPEBTI'
            ]

        ]

    },


    nikkei: {

        title: 'Nikkei 225',

        category: 'Indeks Saham',

        categoryColor: '#37864d',

        image: "{{ asset('images/produk/nikkei.png') }}",

        description:
            'Indeks saham utama Jepang yang mencerminkan pergerakan pasar saham di Bursa Efek Tokyo, terdiri dari 225 perusahaan terpilih dari berbagai sektor industri.',

        info: [

            ['Kode Produk', 'N225'],

            ['Kategori', 'Indeks Saham'],

            ['Aset Dasar', 'Nikkei 225 Index'],

            ['Ukuran Kontrak', 'JPY 500 × Indeks'],

            ['Satuan Harga', 'JPY'],

            ['Nilai Tick', '5 JPY'],

            [
                'Jam Perdagangan',
                'Senin - Jumat<br>08:00 - 15:15 WIB'
            ],

            [
                'Bursa',
                'Bursa Berjangka Jakarta (BBJ)'
            ],

            [
                'Clearing House',
                'Kliring Berjangka Indonesia (KBI)'
            ],

            [
                'Pengawas',
                'BAPPEBTI'
            ]

        ]

    },


    forex: {

        title: 'AUD/USD',

        category: 'Forex',

        categoryColor: '#2466c7',

        image: "{{ asset('images/produk/forex.png') }}",

        description:
            'AUD/USD adalah pasangan mata uang yang terdiri dari Australian Dollar (AUD) sebagai mata uang dasar dan US Dollar (USD) sebagai mata uang kuotasi. Produk ini memiliki likuiditas tinggi dan banyak diperdagangkan di pasar global.',

        info: [

            ['Kode Produk', 'AUDUSD'],

            ['Kategori', 'Forex'],

            [
                'Aset Dasar',
                'Australian Dollar / US Dollar'
            ],

            ['Ukuran Kontrak', '100.000 AUD'],

            ['Satuan Harga', 'USD'],

            ['Nilai Tick', '0,0001'],

            [
                'Nilai Tick Value',
                '10 USD per 1 Tick<br>(untuk 1 Lot)'
            ],

            [
                'Jam Perdagangan',
                'Senin - Jumat<br>00:00 - 23:55 WIB'
            ],

            [
                'Bursa',
                'Bursa Berjangka Jakarta (BBJ)'
            ],

            [
                'Clearing House',
                'Kliring Berjangka Indonesia (KBI)'
            ],

            [
                'Pengawas',
                'BAPPEBTI'
            ]

        ]

    }

};


/* =====================================================
   BUKA POPUP
===================================================== */

function bukaProduk(namaProduk) {

    const produk = dataProduk[namaProduk];

    if (!produk) {
        return;
    }


    document.getElementById('modalImage').src =
        produk.image;


    document.getElementById('modalTitle').innerHTML =
        produk.title;


    document.getElementById('modalCategory').innerHTML =
        produk.category;


    document.getElementById('modalCategory').style.color =
        produk.categoryColor;


    document.getElementById('modalDescription').innerHTML =
        produk.description;


    let isiInfo = '';


    produk.info.forEach(function(item) {

        isiInfo += `
            <tr>
                <td>${item[0]}</td>
                <td>${item[1]}</td>
            </tr>
        `;

    });


    document.getElementById('modalInfo').innerHTML =
        isiInfo;


    const modal =
        document.getElementById('produkModal');


    modal.style.display = 'flex';


    setTimeout(function() {

        modal.classList.add('show');

    }, 10);


    document.body.style.overflow = 'hidden';

}


/* =====================================================
   TUTUP POPUP
===================================================== */

function tutupProduk() {

    const modal =
        document.getElementById('produkModal');


    modal.classList.remove('show');


    setTimeout(function() {

        modal.style.display = 'none';

    }, 250);


    document.body.style.overflow = '';

}


/* =====================================================
   KLIK DI LUAR POPUP
===================================================== */

function klikBackground(event) {

    if (
        event.target ===
        document.getElementById('produkModal')
    ) {

        tutupProduk();

    }

}


/* =====================================================
   TOMBOL ESC
===================================================== */

document.addEventListener('keydown', function(event) {

    if (event.key === 'Escape') {

        tutupProduk();

    }

});

</script>

@endsection