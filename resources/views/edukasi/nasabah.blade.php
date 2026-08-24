@extends('layouts.app')

@section('content')

<style>

/* =========================
   WRAPPER
========================= */

.edukasi-wrapper {
    padding: 35px 45px 60px;
    background: #f7f9fc;
    min-height: calc(100vh - 70px);
}


/* =========================
   HEADER
========================= */

.edukasi-header {
    background: linear-gradient(135deg, #eaf2ff, #ffffff);
    border-radius: 22px;
    padding: 40px 45px;
    margin-bottom: 35px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    box-shadow: 0 8px 25px rgba(0,0,0,0.06);
}

.header-text {
    max-width: 700px;
}

.header-label {
    color: #3b73d1;
    font-size: 13px;
    font-weight: bold;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-bottom: 8px;
}

.header-text h1 {
    margin: 0 0 15px;
    color: #172b4d;
    font-size: 42px;
    font-family: Georgia, serif;
}

.header-text p {
    margin: 0;
    color: #697586;
    font-size: 16px;
    line-height: 1.7;
}

.header-icon {
    width: 140px;
    height: 140px;

    background: white;
    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 65px;

    box-shadow: 0 10px 30px rgba(59,115,209,0.12);
}


/* =========================
   TITLE
========================= */

.section-title {
    font-family: Georgia, serif;
    font-size: 28px;
    color: #172b4d;
    margin-bottom: 22px;
}


/* =========================
   CARD
========================= */

.materi-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

.materi-card {
    background: white;
    border-radius: 18px;
    padding: 28px;

    border: 1px solid #edf0f5;

    box-shadow: 0 6px 20px rgba(0,0,0,0.06);

    transition: 0.25s;
}

.materi-card:hover {
    transform: translateY(-5px);

    box-shadow: 0 12px 28px rgba(0,0,0,0.10);
}

.materi-icon {
    width: 58px;
    height: 58px;

    background: #eaf2ff;

    border-radius: 15px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 28px;

    margin-bottom: 20px;
}

.materi-card h3 {
    font-family: Georgia, serif;
    color: #172b4d;
    font-size: 20px;

    margin: 0 0 12px;
}

.materi-card p {
    color: #6b7280;
    font-size: 14px;
    line-height: 1.7;

    min-height: 70px;
}


/* =========================
   BUTTON
========================= */

.btn-pelajari {
    width: 100%;

    border: none;

    padding: 13px 20px;

    background: #3b73d1;
    color: white;

    border-radius: 9px;

    font-size: 13px;
    font-weight: bold;

    cursor: pointer;

    transition: 0.25s;
}

.btn-pelajari:hover {
    background: #285eaf;
}


/* =========================
   MATERI DETAIL
========================= */

.materi-detail {
    display: none;

    margin-top: 30px;

    background: white;

    border-radius: 18px;

    padding: 35px 40px;

    box-shadow: 0 6px 20px rgba(0,0,0,0.06);

    border-left: 5px solid #3b73d1;
}

.materi-detail h2 {
    font-family: Georgia, serif;

    color: #172b4d;

    margin-top: 0;
}

.materi-detail h3 {
    color: #172b4d;

    margin-top: 25px;
}

.materi-detail p,
.materi-detail li {
    color: #596579;

    font-size: 15px;

    line-height: 1.8;
}

.tutup-materi {
    margin-top: 20px;

    padding: 10px 18px;

    border: none;

    background: #eef2f7;

    color: #4b5563;

    border-radius: 8px;

    cursor: pointer;
}


/* =========================
   RESPONSIVE
========================= */

@media(max-width: 1000px) {

    .materi-container {
        grid-template-columns: 1fr;
    }

    .edukasi-header {
        padding: 30px;
    }

    .header-icon {
        width: 100px;
        height: 100px;
        font-size: 45px;
    }

}

</style>


<div class="edukasi-wrapper">


    <!-- =========================
         HEADER
    ========================= -->

    <div class="edukasi-header">

        <div class="header-text">

            <div class="header-label">
                PT Rifan Financindo Berjangka
            </div>

            <h1>
                Edukasi Nasabah
            </h1>

            <p>
                Tingkatkan pemahaman Anda mengenai perdagangan
                berjangka, transaksi, serta pentingnya memahami
                risiko sebelum melakukan aktivitas perdagangan.
            </p>

        </div>

        <div class="header-icon">
            🎓
        </div>

    </div>


    <!-- =========================
         JUDUL
    ========================= -->

    <h2 class="section-title">
        Materi Edukasi Nasabah
    </h2>


    <!-- =========================
         CARD
    ========================= -->

    <div class="materi-container">


        <!-- MATERI 1 -->

        <div class="materi-card">

            <div class="materi-icon">
                📚
            </div>

            <h3>
                Dasar Perdagangan Berjangka
            </h3>

            <p>
                Pelajari dasar-dasar perdagangan berjangka
                dan pahami bagaimana proses perdagangan
                berlangsung.
            </p>

            <button
                type="button"
                class="btn-pelajari"
                onclick="bukaMateri('materi1')"
            >
                Pelajari Materi →
            </button>

        </div>


        <!-- MATERI 2 -->

        <div class="materi-card">

            <div class="materi-icon">
                💹
            </div>

            <h3>
                Transaksi yang Aman
            </h3>

            <p>
                Pahami hal-hal penting yang harus diperhatikan
                sebelum melakukan transaksi.
            </p>

            <button
                type="button"
                class="btn-pelajari"
                onclick="bukaMateri('materi2')"
            >
                Pelajari Materi →
            </button>

        </div>


        <!-- MATERI 3 -->

        <div class="materi-card">

            <div class="materi-icon">
                🛡️
            </div>

            <h3>
                Manajemen Risiko
            </h3>

            <p>
                Pelajari bagaimana mengenali dan mengelola
                risiko dalam aktivitas perdagangan.
            </p>

            <button
                type="button"
                class="btn-pelajari"
                onclick="bukaMateri('materi3')"
            >
                Pelajari Materi →
            </button>

        </div>

    </div>


    <!-- =========================
         MATERI 1
    ========================= -->

    <div id="materi1" class="materi-detail">

        <h2>
            📚 Dasar Perdagangan Berjangka
        </h2>

        <p>
            Perdagangan berjangka merupakan kegiatan perdagangan
            yang menggunakan kontrak berjangka dengan mekanisme
            dan ketentuan tertentu.
        </p>

        <h3>
            Hal yang Perlu Dipahami
        </h3>

        <ul>

            <li>
                Pengertian perdagangan berjangka.
            </li>

            <li>
                Mengenal produk yang diperdagangkan.
            </li>

            <li>
                Memahami mekanisme transaksi.
            </li>

            <li>
                Memahami potensi keuntungan dan risiko.
            </li>

        </ul>

        <h3>
            Mengapa Edukasi Penting?
        </h3>

        <p>
            Sebelum melakukan transaksi, nasabah perlu memahami
            informasi mengenai produk, mekanisme perdagangan,
            biaya dan risiko yang mungkin terjadi.
        </p>

        <button
            class="tutup-materi"
            onclick="tutupMateri()"
        >
            Tutup Materi
        </button>

    </div>


    <!-- =========================
         MATERI 2
    ========================= -->

    <div id="materi2" class="materi-detail">

        <h2>
            💹 Transaksi yang Aman
        </h2>

        <p>
            Sebelum melakukan transaksi, nasabah perlu
            memahami prosedur dan informasi yang berkaitan
            dengan transaksi.
        </p>

        <h3>
            Hal yang Perlu Diperhatikan
        </h3>

        <ul>

            <li>
                Memahami prosedur transaksi.
            </li>

            <li>
                Memastikan informasi transaksi.
            </li>

            <li>
                Menjaga keamanan akun.
            </li>

            <li>
                Memahami biaya transaksi.
            </li>

        </ul>

        <h3>
            Keamanan Transaksi
        </h3>

        <p>
            Selalu pastikan informasi yang diterima berasal
            dari sumber resmi dan pahami transaksi sebelum
            memberikan persetujuan.
        </p>

        <button
            class="tutup-materi"
            onclick="tutupMateri()"
        >
            Tutup Materi
        </button>

    </div>


    <!-- =========================
         MATERI 3
    ========================= -->

    <div id="materi3" class="materi-detail">

        <h2>
            🛡️ Manajemen Risiko
        </h2>

        <p>
            Setiap aktivitas perdagangan memiliki risiko.
            Karena itu, pemahaman mengenai risiko merupakan
            bagian penting dalam mengambil keputusan.
        </p>

        <h3>
            Mengenali Risiko
        </h3>

        <ul>

            <li>
                Memahami potensi perubahan harga.
            </li>

            <li>
                Memahami risiko kerugian.
            </li>

            <li>
                Menggunakan modal secara bijaksana.
            </li>

            <li>
                Tidak mengambil keputusan secara terburu-buru.
            </li>

        </ul>

        <h3>
            Kesimpulan
        </h3>

        <p>
            Pemahaman terhadap risiko membantu nasabah
            membuat keputusan berdasarkan informasi yang
            telah dipahami.
        </p>

        <button
            class="tutup-materi"
            onclick="tutupMateri()"
        >
            Tutup Materi
        </button>

    </div>

</div>


<script>

function bukaMateri(id) {

    // Sembunyikan semua materi
    document.querySelectorAll('.materi-detail').forEach(function(materi) {

        materi.style.display = 'none';

    });


    // Tampilkan materi yang dipilih
    const materi = document.getElementById(id);

    materi.style.display = 'block';


    // Scroll otomatis ke materi
    materi.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
    });

}


function tutupMateri() {

    document.querySelectorAll('.materi-detail').forEach(function(materi) {

        materi.style.display = 'none';

    });

}

</script>

@endsection