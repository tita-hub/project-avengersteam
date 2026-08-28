@extends('layouts.app')

@section('content')

<style>

/* ============================================================
   WRAPPER
   ============================================================ */

.edukasi-wrapper {
    padding: 35px 45px 60px;
    background: #f7f9fc;
    min-height: calc(100vh - 70px);
}


/* ============================================================
   HEADER
   ============================================================ */

.edukasi-header {
    background: linear-gradient(135deg, #eaf2ff, #ffffff);

    border-radius: 22px;

    padding: 40px 45px;

    margin-bottom: 35px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
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


/* ============================================================
   ICON HEADER
   ============================================================ */

.header-icon {
    width: 140px;
    height: 140px;

    background: white;

    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 65px;

    flex-shrink: 0;

    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.04);
}


/* ============================================================
   JUDUL SECTION
   ============================================================ */

.section-title {
    font-family: Georgia, serif;

    color: #172b4d;

    font-size: 28px;

    margin: 0 0 22px;
}


/* ============================================================
   CONTAINER CARD
   ============================================================ */

.materi-container {
    display: grid;

    grid-template-columns: repeat(3, 1fr);

    gap: 25px;

    align-items: stretch;
}


/* ============================================================
   CARD MATERI
   ============================================================ */

.materi-card {
    background: white;

    border-radius: 18px;

    padding: 28px;

    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);

    transition: 0.25s;

    display: flex;

    flex-direction: column;

    min-height: 350px;

    box-sizing: border-box;
}

.materi-card:hover {
    transform: translateY(-5px);

    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.09);
}


/* ============================================================
   ICON MATERI
   ============================================================ */

.materi-icon {
    width: 58px;
    height: 58px;

    background: #eaf2ff;

    border-radius: 15px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 28px;

    margin-bottom: 18px;

    flex-shrink: 0;
}


/* ============================================================
   JUDUL CARD
   ============================================================ */

.materi-card h3 {
    font-family: Georgia, serif;

    color: #172b4d;

    font-size: 21px;

    line-height: 1.35;

    margin: 0 0 12px;

    min-height: 58px;
}


/* ============================================================
   DESKRIPSI CARD
   ============================================================ */

.materi-card p {
    color: #6b7280;

    font-size: 14px;

    line-height: 1.7;

    margin: 0;

    min-height: 70px;
}


/* ============================================================
   TOMBOL PELAJARI
   ============================================================ */

.btn-pelajari {
    width: 100%;

    border: none;

    padding: 13px 20px;

    background: #3b73d1;

    color: white;

    border-radius: 9px;

    font-size: 14px;

    font-weight: bold;

    cursor: pointer;

    transition: 0.25s;

    margin-top: auto;

    box-sizing: border-box;
}

.btn-pelajari:hover {
    background: #285eaf;

    transform: translateY(-1px);
}


/* ============================================================
   DETAIL MATERI
   ============================================================ */

.materi-detail {
    display: none;

    margin-top: 30px;

    background: white;

    border-radius: 18px;

    padding: 35px 40px;

    border-left: 5px solid #3b73d1;

    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
}

.materi-detail h2 {
    color: #172b4d;

    font-family: Georgia, serif;

    margin-top: 0;
}

.materi-detail h3 {
    color: #172b4d;

    margin-top: 25px;
}

.materi-detail p,
.materi-detail li {
    color: #596579;

    line-height: 1.8;

    font-size: 15px;
}


/* ============================================================
   TOMBOL TUTUP
   ============================================================ */

.tutup-materi {
    margin-top: 20px;

    padding: 10px 18px;

    border: none;

    background: #eef2f7;

    color: #4b5563;

    border-radius: 8px;

    cursor: pointer;
}

.tutup-materi:hover {
    background: #e2e8f0;
}


/* ============================================================
   RESPONSIVE
   ============================================================ */

@media (max-width: 1000px) {

    .materi-container {
        grid-template-columns: 1fr;
    }

    .materi-card {
        min-height: auto;
    }

}


@media (max-width: 700px) {

    .edukasi-wrapper {
        padding: 25px 20px 40px;
    }

    .edukasi-header {
        flex-direction: column;

        align-items: flex-start;

        gap: 25px;
    }

    .header-text h1 {
        font-size: 34px;
    }

    .header-icon {
        width: 100px;
        height: 100px;

        font-size: 45px;
    }

    .materi-detail {
        padding: 25px;
    }

}

</style>


<div class="edukasi-wrapper">


    <!-- ========================================================
         HEADER
         ======================================================== -->

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


    <!-- ========================================================
         JUDUL
         ======================================================== -->

    <h2 class="section-title">
        Materi Edukasi Nasabah
    </h2>


    <!-- ========================================================
         CARD
         ======================================================== -->

    <div class="materi-container">


        <!-- CARD 1 -->

        <div class="materi-card">

            <div class="materi-icon">
                📚
            </div>

            <h3>
                Dasar Perdagangan
                Berjangka
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


        <!-- CARD 2 -->

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


        <!-- CARD 3 -->

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


    <!-- ========================================================
         DETAIL MATERI 1
         ======================================================== -->

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
            <li>Pengertian perdagangan berjangka.</li>
            <li>Mengenal produk yang diperdagangkan.</li>
            <li>Memahami mekanisme transaksi.</li>
            <li>Memahami potensi keuntungan dan risiko.</li>
        </ul>

        <button
            type="button"
            class="tutup-materi"
            onclick="tutupMateri()"
        >
            Tutup Materi
        </button>

    </div>


    <!-- ========================================================
         DETAIL MATERI 2
         ======================================================== -->

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
            <li>Memahami prosedur transaksi.</li>
            <li>Memastikan informasi transaksi.</li>
            <li>Menjaga keamanan akun.</li>
            <li>Memahami biaya transaksi.</li>
        </ul>

        <button
            type="button"
            class="tutup-materi"
            onclick="tutupMateri()"
        >
            Tutup Materi
        </button>

    </div>


    <!-- ========================================================
         DETAIL MATERI 3
         ======================================================== -->

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
            <li>Memahami potensi perubahan harga.</li>
            <li>Memahami risiko kerugian.</li>
            <li>Menggunakan modal secara bijaksana.</li>
            <li>Tidak mengambil keputusan secara terburu-buru.</li>
        </ul>

        <button
            type="button"
            class="tutup-materi"
            onclick="tutupMateri()"
        >
            Tutup Materi
        </button>

    </div>


</div>


<script>

function bukaMateri(id) {

    document
        .querySelectorAll('.materi-detail')
        .forEach(function(materi) {

            materi.style.display = 'none';

        });

    const materi = document.getElementById(id);

    if (materi) {

        materi.style.display = 'block';

        materi.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });

    }

}


function tutupMateri() {

    document
        .querySelectorAll('.materi-detail')
        .forEach(function(materi) {

            materi.style.display = 'none';

        });

}

</script>

@endsection