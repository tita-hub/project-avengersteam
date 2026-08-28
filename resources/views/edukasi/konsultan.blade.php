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
    background: linear-gradient(135deg, #edf9f2, #ffffff);

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
    color: #2d8a57;

    font-size: 13px;
    font-weight: bold;

    letter-spacing: 1px;
    text-transform: uppercase;

    margin-bottom: 8px;
}

.header-text h1 {
    margin: 0 0 15px;

    color: #173b29;

    font-size: 42px;

    font-family: Georgia, serif;
}

.header-text p {
    margin: 0;

    color: #65746b;

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

    color: #173b29;

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

    background: #e8f7ee;

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

    color: #173b29;

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

    background: #2d8a57;

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
    background: #226b43;

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

    border-left: 5px solid #2d8a57;

    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
}

.materi-detail h2 {
    color: #173b29;

    font-family: Georgia, serif;

    margin-top: 0;
}

.materi-detail h3 {
    color: #173b29;

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
                Edukasi Konsultan
            </h1>

            <p>
                Tingkatkan kompetensi dan wawasan konsultan
                dalam memberikan pelayanan yang profesional
                kepada nasabah.
            </p>

        </div>

        <div class="header-icon">
            👨‍💼
        </div>

    </div>


    <!-- ========================================================
         JUDUL
         ======================================================== -->

    <h2 class="section-title">
        Materi Edukasi Konsultan
    </h2>


    <!-- ========================================================
         CARD
         ======================================================== -->

    <div class="materi-container">


        <!-- CARD 1 -->

        <div class="materi-card">

            <div class="materi-icon">
                🤝
            </div>

            <h3>
                Komunikasi dengan
                Nasabah
            </h3>

            <p>
                Pelajari cara membangun komunikasi yang baik,
                jelas dan profesional dengan nasabah.
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
                📊
            </div>

            <h3>
                Analisis Pasar
            </h3>

            <p>
                Pelajari cara memahami informasi dan kondisi
                pasar untuk meningkatkan wawasan.
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
                ⚖️
            </div>

            <h3>
                Etika & Kepatuhan
            </h3>

            <p>
                Memahami pentingnya etika, profesionalisme
                dan kepatuhan dalam menjalankan tugas.
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
            🤝 Komunikasi dengan Nasabah
        </h2>

        <p>
            Komunikasi yang baik merupakan salah satu bagian
            penting dalam memberikan pelayanan kepada nasabah.
        </p>

        <h3>
            Prinsip Komunikasi
        </h3>

        <ul>
            <li>Berkomunikasi secara jelas dan sopan.</li>
            <li>Mendengarkan kebutuhan nasabah.</li>
            <li>Memberikan informasi secara transparan.</li>
            <li>Menghindari informasi yang menyesatkan.</li>
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
            📊 Analisis Pasar
        </h2>

        <p>
            Analisis pasar membantu konsultan memahami
            kondisi dan perkembangan pasar.
        </p>

        <h3>
            Hal yang Perlu Dipelajari
        </h3>

        <ul>
            <li>Membaca informasi pasar.</li>
            <li>Memahami tren pasar.</li>
            <li>Mengikuti perkembangan ekonomi.</li>
            <li>Memahami faktor yang memengaruhi pasar.</li>
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
            ⚖️ Etika & Kepatuhan
        </h2>

        <p>
            Konsultan perlu menjalankan tugas berdasarkan
            etika dan ketentuan yang berlaku.
        </p>

        <h3>
            Prinsip Utama
        </h3>

        <ul>
            <li>Menjaga profesionalisme.</li>
            <li>Memberikan informasi yang benar.</li>
            <li>Mematuhi ketentuan perusahaan.</li>
            <li>Menjaga kepercayaan nasabah.</li>
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