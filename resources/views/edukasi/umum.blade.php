@extends('layouts.app')

@section('content')

<style>

.edukasi-wrapper {
    padding: 35px 45px 60px;
    background: #f7f9fc;
    min-height: calc(100vh - 70px);
}

.edukasi-header {
    background: linear-gradient(135deg, #fff8e8, #ffffff);
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
    color: #d99a08;
    font-size: 13px;
    font-weight: bold;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.header-text h1 {
    margin: 10px 0 15px;
    color: #40351e;
    font-size: 42px;
    font-family: Georgia, serif;
}

.header-text p {
    color: #746b57;
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
}

.section-title {
    font-family: Georgia, serif;
    color: #40351e;
    margin-bottom: 22px;
}

.materi-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

.materi-card {
    background: white;
    border-radius: 18px;
    padding: 28px;

    box-shadow: 0 6px 20px rgba(0,0,0,0.06);

    transition: 0.25s;
}

.materi-card:hover {
    transform: translateY(-5px);
}

.materi-icon {
    width: 58px;
    height: 58px;

    background: #fff5d9;

    border-radius: 15px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 28px;

    margin-bottom: 20px;
}

.materi-card h3 {
    font-family: Georgia, serif;
    color: #40351e;
}

.materi-card p {
    color: #6b7280;
    font-size: 14px;
    line-height: 1.7;
    min-height: 70px;
}

.btn-pelajari {
    width: 100%;
    border: none;

    padding: 13px;

    background: #d99a08;
    color: white;

    border-radius: 9px;

    font-weight: bold;

    cursor: pointer;
}

.btn-pelajari:hover {
    background: #b77e00;
}

.materi-detail {
    display: none;

    margin-top: 30px;

    background: white;

    border-radius: 18px;

    padding: 35px 40px;

    border-left: 5px solid #d99a08;

    box-shadow: 0 6px 20px rgba(0,0,0,0.06);
}

.materi-detail h2 {
    color: #40351e;
    font-family: Georgia, serif;
}

.materi-detail h3 {
    color: #40351e;
    margin-top: 25px;
}

.materi-detail p,
.materi-detail li {
    color: #596579;
    line-height: 1.8;
}

.tutup-materi {
    margin-top: 20px;

    padding: 10px 18px;

    border: none;

    background: #eef2f7;

    border-radius: 8px;

    cursor: pointer;
}

@media(max-width:1000px) {

    .materi-container {
        grid-template-columns: 1fr;
    }

}

</style>


<div class="edukasi-wrapper">


    <!-- HEADER -->

    <div class="edukasi-header">

        <div class="header-text">

            <div class="header-label">
                PT Rifan Financindo Berjangka
            </div>

            <h1>
                Edukasi Umum
            </h1>

            <p>
                Tambahkan wawasan mengenai investasi,
                pasar keuangan, perdagangan berjangka,
                serta informasi ekonomi secara umum.
            </p>

        </div>

        <div class="header-icon">
            🌐
        </div>

    </div>


    <h2 class="section-title">
        Materi Edukasi Umum
    </h2>


    <div class="materi-container">


        <!-- 1 -->

        <div class="materi-card">

            <div class="materi-icon">
                📈
            </div>

            <h3>
                Dasar-Dasar Investasi
            </h3>

            <p>
                Mengenal konsep investasi dan hal-hal penting
                yang perlu dipahami sebelum berinvestasi.
            </p>

            <button
                class="btn-pelajari"
                onclick="bukaMateri('materi1')"
            >
                Pelajari Materi →
            </button>

        </div>


        <!-- 2 -->

        <div class="materi-card">

            <div class="materi-icon">
                🌎
            </div>

            <h3>
                Pasar Keuangan
            </h3>

            <p>
                Memahami perkembangan pasar keuangan serta
                faktor ekonomi yang memengaruhi pasar.
            </p>

            <button
                class="btn-pelajari"
                onclick="bukaMateri('materi2')"
            >
                Pelajari Materi →
            </button>

        </div>


        <!-- 3 -->

        <div class="materi-card">

            <div class="materi-icon">
                💡
            </div>

            <h3>
                Wawasan Keuangan
            </h3>

            <p>
                Informasi sederhana untuk membantu meningkatkan
                pemahaman mengenai dunia keuangan.
            </p>

            <button
                class="btn-pelajari"
                onclick="bukaMateri('materi3')"
            >
                Pelajari Materi →
            </button>

        </div>

    </div>


    <!-- MATERI 1 -->

    <div id="materi1" class="materi-detail">

        <h2>
            📈 Dasar-Dasar Investasi
        </h2>

        <p>
            Investasi merupakan kegiatan menempatkan dana
            pada suatu aset atau instrumen dengan tujuan
            memperoleh hasil di masa yang akan datang.
        </p>

        <h3>
            Hal yang Perlu Dipahami
        </h3>

        <ul>

            <li>
                Tujuan melakukan investasi.
            </li>

            <li>
                Mengenal berbagai jenis instrumen.
            </li>

            <li>
                Memahami potensi keuntungan.
            </li>

            <li>
                Memahami risiko investasi.
            </li>

        </ul>

        <button
            class="tutup-materi"
            onclick="tutupMateri()"
        >
            Tutup Materi
        </button>

    </div>


    <!-- MATERI 2 -->

    <div id="materi2" class="materi-detail">

        <h2>
            🌎 Pasar Keuangan
        </h2>

        <p>
            Pasar keuangan merupakan bagian penting dalam
            kegiatan ekonomi yang mempertemukan pihak yang
            membutuhkan dana dengan pihak yang memiliki dana.
        </p>

        <h3>
            Faktor yang Mempengaruhi Pasar
        </h3>

        <ul>

            <li>
                Kondisi ekonomi.
            </li>

            <li>
                Perubahan harga.
            </li>

            <li>
                Kebijakan ekonomi.
            </li>

            <li>
                Kondisi pasar global.
            </li>

        </ul>

        <button
            class="tutup-materi"
            onclick="tutupMateri()"
        >
            Tutup Materi
        </button>

    </div>


    <!-- MATERI 3 -->

    <div id="materi3" class="materi-detail">

        <h2>
            💡 Wawasan Keuangan
        </h2>

        <p>
            Wawasan keuangan membantu seseorang memahami
            cara mengelola dan merencanakan keuangan dengan
            lebih baik.
        </p>

        <h3>
            Materi yang Perlu Dipahami
        </h3>

        <ul>

            <li>
                Literasi keuangan.
            </li>

            <li>
                Pengelolaan keuangan.
            </li>

            <li>
                Perencanaan keuangan.
            </li>

            <li>
                Mengenali risiko keuangan.
            </li>

        </ul>

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

    document.querySelectorAll('.materi-detail').forEach(function(materi) {
        materi.style.display = 'none';
    });

    const materi = document.getElementById(id);

    materi.style.display = 'block';

    materi.scrollIntoView({
        behavior: 'smooth'
    });

}


function tutupMateri() {

    document.querySelectorAll('.materi-detail').forEach(function(materi) {
        materi.style.display = 'none';
    });

}

</script>

@endsection