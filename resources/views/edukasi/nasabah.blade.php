@extends('layouts.app')

@section('content')

@php

    /*
    |--------------------------------------------------------------------------
    | 6 MATERI EDUKASI
    |--------------------------------------------------------------------------
    */

    $materiEdukasi = [

        [
            'id' => 1,
            'nomor' => '01',
            'kategori' => 'LAYANAN',
            'icon' => 'bi-grid-fill',
            'judul' => 'Apa Itu Trading?',
            'ringkasan' => 'Mengenal pengertian trading dan dasar aktivitas perdagangan sebelum mulai bertransaksi.',
            'isi' => '
                <p>
                    Trading merupakan aktivitas melakukan transaksi pada suatu produk
                    atau instrumen perdagangan dengan memanfaatkan perubahan harga
                    yang terjadi di pasar.
                </p>

                <p>
                    Dalam perdagangan berjangka, nasabah perlu memahami bagaimana
                    mekanisme transaksi berlangsung serta karakteristik produk
                    yang diperdagangkan.
                </p>

                <h4>Apa yang perlu dipahami?</h4>

                <ul>
                    <li>Harga dapat bergerak naik maupun turun.</li>
                    <li>Setiap transaksi memiliki potensi keuntungan dan risiko.</li>
                    <li>Pergerakan pasar dapat berubah dalam waktu yang cepat.</li>
                    <li>Nasabah perlu memahami produk sebelum melakukan transaksi.</li>
                </ul>

                <p>
                    Pemahaman dasar mengenai trading menjadi langkah penting sebelum
                    seseorang memutuskan untuk melakukan aktivitas perdagangan.
                </p>
            ',
        ],

        [
            'id' => 2,
            'nomor' => '02',
            'kategori' => 'TRADING',
            'icon' => 'bi-graph-up-arrow',
            'judul' => 'Perdagangan Berjangka',
            'ringkasan' => 'Memahami dasar perdagangan berjangka dan bagaimana mekanisme transaksi dilakukan.',
            'isi' => '
                <p>
                    Perdagangan Berjangka merupakan kegiatan jual beli komoditi
                    berdasarkan kontrak berjangka, kontrak derivatif syariah,
                    dan/atau kontrak derivatif lainnya yang diperdagangkan melalui
                    Bursa Berjangka.
                </p>

                <p>
                    Perdagangan berjangka memiliki mekanisme dan ketentuan tertentu
                    yang perlu dipahami oleh calon maupun nasabah.
                </p>

                <h4>Hal yang perlu diketahui</h4>

                <ul>
                    <li>Transaksi dilakukan berdasarkan kontrak yang memiliki spesifikasi tertentu.</li>
                    <li>Harga dapat bergerak mengikuti kondisi pasar.</li>
                    <li>Setiap produk mempunyai karakteristik masing-masing.</li>
                    <li>Transaksi memiliki potensi keuntungan dan risiko kerugian.</li>
                    <li>Nasabah perlu memahami ketentuan sebelum melakukan transaksi.</li>
                </ul>

                <p>
                    Dengan memahami perdagangan berjangka, nasabah dapat mengetahui
                    bagaimana transaksi dilakukan serta memahami konsekuensi dari
                    transaksi yang dipilih.
                </p>
            ',
        ],

        [
            'id' => 3,
            'nomor' => '03',
            'kategori' => 'PENGENALAN',
            'icon' => 'bi-book',
            'judul' => 'Mengenal Produk',
            'ringkasan' => 'Kenali karakteristik produk perdagangan agar dapat memahami transaksi dan risiko yang menyertainya.',
            'isi' => '
                <p>
                    Setiap produk perdagangan mempunyai karakteristik dan pergerakan
                    harga yang berbeda. Oleh karena itu, calon nasabah perlu
                    mempelajari produk sebelum melakukan transaksi.
                </p>

                <h4>Hal yang perlu diperhatikan</h4>

                <ul>
                    <li>Pelajari karakteristik produk yang akan diperdagangkan.</li>
                    <li>Pahami spesifikasi kontrak.</li>
                    <li>Ketahui faktor yang dapat memengaruhi pergerakan harga.</li>
                    <li>Pahami ketentuan margin dan ukuran transaksi.</li>
                    <li>Ketahui biaya atau komisi yang berlaku.</li>
                    <li>Pahami risiko dari produk tersebut.</li>
                </ul>

                <p>
                    Pemilihan produk sebaiknya dilakukan berdasarkan pemahaman
                    terhadap karakteristik dan risiko, bukan hanya berdasarkan
                    potensi keuntungan.
                </p>
            ',
        ],


        /*
        |--------------------------------------------------------------------------
        | MATERI 04 - MEKANISME TRANSAKSI
        |--------------------------------------------------------------------------
        */

        [
            'id' => 4,
            'nomor' => '04',
            'kategori' => 'MEKANISME',
            'icon' => 'bi-arrow-left-right',
            'judul' => 'Mekanisme Transaksi',
            'ringkasan' => 'Pelajari perbedaan mekanisme transaksi tradisional dan perdagangan berjangka.',
            'isi' => '

                <p>
                    Mekanisme transaksi dalam perdagangan dapat dilakukan melalui
                    mekanisme transaksi tradisional maupun transaksi perdagangan
                    berjangka. Keduanya memiliki karakteristik yang berbeda dalam
                    proses transaksi dan pergerakan harga.
                </p>

                <div class="materi-image">

                    <img
                        src="' . asset('images/mekanisme-transaksi.png') . '"
                        alt="Two Ways Market - Mekanisme Transaksi"
                    >

                </div>

                <h4>Transaksi Tradisional</h4>

                <p>
                    Pada transaksi tradisional, proses jual beli dilakukan dengan
                    membeli barang terlebih dahulu dan kemudian menjualnya kembali.
                    Keuntungan atau kerugian dipengaruhi oleh perubahan harga barang
                    yang diperjualbelikan.
                </p>

                <h4>Transaksi Perdagangan Berjangka</h4>

                <p>
                    Dalam perdagangan berjangka, transaksi dapat dilakukan dengan
                    mengambil posisi beli maupun jual berdasarkan perkiraan arah
                    pergerakan harga. Nasabah dapat memperoleh peluang keuntungan
                    ketika harga bergerak sesuai dengan posisi yang diambil, namun
                    tetap terdapat risiko kerugian apabila harga bergerak berlawanan.
                </p>

                <p>
                    Oleh karena itu, pemahaman mengenai mekanisme transaksi dan
                    pergerakan harga menjadi bagian penting sebelum melakukan
                    perdagangan berjangka.
                </p>

            ',
        ],


        /*
        |--------------------------------------------------------------------------
        | MATERI 05 - CARA KERJA TRADING
        |--------------------------------------------------------------------------
        */

        [
            'id' => 5,
            'nomor' => '05',
            'kategori' => 'RISIKO',
            'icon' => 'bi-shield-exclamation',
            'judul' => 'Cara Kerja Trading',
            'ringkasan' => 'Memahami perbandingan transaksi fisik dan kontrak gulir harian dalam perdagangan berjangka.',
            'isi' => '

                <p>
                    Cara kerja transaksi dapat dipahami dengan membandingkan
                    transaksi fisik dengan transaksi perdagangan berjangka
                    menggunakan kontrak gulir harian.
                </p>

                <div class="materi-image">

                    <img
                        src="' . asset('images/cara-kerja-trading.png') . '"
                        alt="Perbandingan Transaksi Fisik dan Kontrak Gulir Harian"
                    >

                </div>

                <h4>Transaksi Fisik</h4>

                <p>
                    Pada transaksi fisik, keuntungan dapat diperoleh dari perubahan
                    harga barang yang diperjualbelikan. Nasabah membeli pada harga
                    tertentu dan kemudian menjual kembali ketika harga mengalami
                    perubahan sesuai dengan kondisi pasar.
                </p>

                <p>
                    Sebagai contoh, apabila pembelian dilakukan pada harga
                    <strong>3.200</strong> dan posisi kemudian ditutup pada harga
                    <strong>3.250</strong>, maka terdapat kenaikan harga sebesar
                    <strong>1,5%</strong>.
                </p>

                <h4>Transaksi Online RF BJ (GJ)</h4>

                <p>
                    Pada transaksi perdagangan berjangka, nasabah dapat mengambil
                    posisi berdasarkan pergerakan harga dengan menggunakan kontrak
                    yang memiliki spesifikasi tertentu.
                </p>

                <p>
                    Transaksi dapat dilakukan dengan mengambil posisi beli maupun
                    jual. Perubahan harga akan memengaruhi nilai transaksi sesuai
                    dengan ukuran kontrak yang digunakan.
                </p>

                <h4>Contoh Perhitungan</h4>

                <p>
                    Berdasarkan ilustrasi pada gambar, transaksi menggunakan
                    <strong>Contract Size 1 LOT = 100 OZ</strong>.
                </p>

                <p>
                    Apabila harga bergerak dari <strong>3.200</strong> menjadi
                    <strong>3.250</strong>, maka terdapat perubahan harga sebesar
                    <strong>50</strong>.
                </p>

                <p>
                    Dengan ukuran kontrak yang digunakan, perubahan harga tersebut
                    akan menghasilkan perubahan nilai transaksi sesuai dengan
                    contract size.
                </p>

                <p>
                    Oleh karena itu, nasabah perlu memahami ukuran kontrak,
                    pergerakan harga, serta potensi keuntungan dan risiko sebelum
                    melakukan transaksi.
                </p>

            ',
        ],


        /*
        |--------------------------------------------------------------------------
        | MATERI 06 - MANAGEMENT RISIKO
        |--------------------------------------------------------------------------
        */

        [
            'id' => 6,
            'nomor' => '06',
            'kategori' => 'RISIKO',
            'icon' => 'bi-shield-exclamation',
            'judul' => 'Management Risiko',
            'ringkasan' => 'Memahami pengelolaan risiko sebelum dan setelah melakukan transaksi.',
            'isi' => '

                <h4>Segitiga Keberhasilan Transaksi</h4>

                <p>
                    Keberhasilan transaksi dipengaruhi oleh beberapa aspek yang
                    saling berkaitan, yaitu psikologi, analisis, manajemen kapital,
                    strategi trading, serta timing entry dan timing exit.
                </p>

                <ul>
                    <li>
                        <strong>Psikologi</strong> — mengelola harapan dan
                        menyesuaikannya dengan analisa objektif berdasarkan kenyataan.
                    </li>

                    <li>
                        <strong>Analisis</strong> — menggunakan analisis fundamental
                        dan teknikal sebagai dasar dalam menentukan keputusan transaksi.
                    </li>

                    <li>
                        <strong>Manajemen Kapital</strong> — mengatur modal dengan
                        mempertimbangkan tujuan transaksi serta kemampuan dalam
                        mengelola risiko.
                    </li>

                    <li>
                        <strong>Strategi Trading</strong> — menentukan strategi yang
                        sesuai dengan hasil analisis dan kondisi pasar.
                    </li>

                    <li>
                        <strong>Timing Entry & Timing Exit</strong> — menentukan
                        waktu yang tepat untuk masuk dan keluar dari transaksi.
                    </li>
                </ul>


                <h4>Transaksi Emas | Manajemen Risiko</h4>

                <p>
                    Manajemen risiko dalam transaksi emas dapat dibagi menjadi
                    dua tahap, yaitu sebelum transaksi dan setelah transaksi.
                </p>


                <h4>Sebelum Transaksi</h4>

                <p>
                    Sebelum melakukan transaksi, perencanaan trading dapat
                    memperhatikan beberapa hal berikut:
                </p>

                <ul>
                    <li>
                        <strong>Modal Proporsional</strong> — menyesuaikan modal
                        dengan kemampuan dan rencana transaksi.
                    </li>

                    <li>
                        <strong>Target Pencapaian</strong> — menentukan target
                        transaksi yang ingin dicapai.
                    </li>

                    <li>
                        <strong>Peluang Market</strong> — melihat peluang yang
                        tersedia berdasarkan kondisi pasar.
                    </li>

                    <li>
                        <strong>Metode Transaksi</strong> — menentukan metode
                        yang akan digunakan dalam melakukan transaksi.
                    </li>

                    <li>
                        <strong>Planning Trading</strong> — menyusun perencanaan
                        transaksi sebelum mengambil posisi.
                    </li>
                </ul>


                <h4>Setelah Transaksi</h4>

                <p>
                    Setelah transaksi dilakukan, pengelolaan posisi dapat
                    disesuaikan dengan perkembangan kondisi pasar. Beberapa
                    tindakan yang dapat dipertimbangkan antara lain:
                </p>

                <ul>
                    <li>
                        <strong>Average (Rata-rata)</strong> — melakukan
                        penyesuaian posisi berdasarkan strategi dan kondisi
                        transaksi.
                    </li>

                    <li>
                        <strong>Locking (Posisi Kunci)</strong> — melakukan
                        pengelolaan posisi dengan mengunci posisi tertentu
                        sesuai kondisi pasar.
                    </li>

                    <li>
                        <strong>Switching (Balik Arah)</strong> — mengubah
                        arah posisi apabila analisis menunjukkan perubahan
                        kondisi pasar.
                    </li>

                    <li>
                        <strong>Hold (Menunggu/Tahan)</strong> — mempertahankan
                        posisi sambil menunggu perkembangan kondisi pasar.
                    </li>
                </ul>


                <p>
                    Dengan memahami aspek psikologi, analisis, manajemen kapital,
                    strategi trading, serta pengelolaan posisi, nasabah dapat
                    melakukan transaksi dengan perencanaan dan pengelolaan risiko
                    yang lebih baik.
                </p>

            ',
        ],

    ];

@endphp


<style>

/* ============================================================
   EDUKASI NASABAH
   FONT SANS-SERIF
   ============================================================ */

.edu-page,
.edu-page *,
.edu-page button,
.edu-page input,
.edu-page textarea,
.edu-page select {
    font-family: Arial, Helvetica, sans-serif !important;
}


/* ============================================================
   HALAMAN
   ============================================================ */

.edu-page {
    font-family: Arial, Helvetica, sans-serif;

    --green: #176b4d;
    --green-dark: #124f39;
    --green-light: #23805d;
    --green-soft: #eaf5ef;

    --red: #8d2634;
    --red-dark: #721d29;
    --red-soft: #faeeee;

    --text: #252525;
    --muted: #6f7672;
    --line: #e2e7e4;
    --white: #fff;

    color: var(--text);
    background: transparent;

    padding-bottom: 80px;
}


/* ============================================================
   CONTAINER
   ============================================================ */

.edu-container {
    width: 100%;
    max-width: 1440px;

    margin: 0 auto;
}


/* ============================================================
   HERO
   ============================================================ */

.edu-hero {
    position: relative;

    min-height: 213px;

    padding: 28px 54px;

    border-radius: 25px;

    overflow: hidden;

    display: flex;
    align-items: center;

    background:
        linear-gradient(
            135deg,
            #105b43 0%,
            #146d50 55%,
            #298963 100%
        );

    color: #ffffff;
}

.edu-hero::before {
    content: "";

    position: absolute;

    width: 220px;
    height: 220px;

    border-radius: 50%;

    right: -20px;
    top: -90px;

    border: 42px solid rgba(255,255,255,0.045);
}

.edu-hero::after {
    content: "";

    position: absolute;

    width: 170px;
    height: 170px;

    border-radius: 50%;

    right: 180px;
    bottom: -105px;

    border: 35px solid rgba(0,0,0,0.035);
}

.edu-hero-content {
    position: relative;

    z-index: 2;

    max-width: 1000px;
}

.edu-hero-label {
    display: inline-flex;

    align-items: center;

    gap: 6px;

    padding: 5px 12px;

    border-radius: 20px;

    border: 1px solid rgba(255,255,255,0.22);

    background: rgba(255,255,255,0.09);

    font-size: 12px;

    font-weight: 700;

    margin-bottom: 10px;
}

.edu-hero h1 {
    margin: 0 0 8px;

    font-size: 42px;

    line-height: 1.1;

    font-weight: 700;

    color: #ffffff;
}

.edu-hero p {
    margin: 0;

    font-size: 15px;

    line-height: 1.6;

    color: rgba(255,255,255,0.94);
}


/* ============================================================
   INTRO BOX
   ============================================================ */

.edu-intro {
    margin-top: 31px;

    min-height: 106px;

    padding: 20px 26px;

    display: flex;

    align-items: center;

    gap: 20px;

    background: #ffffff;

    border: 1px solid var(--line);

    border-radius: 23px;
}

.edu-intro-icon {
    width: 62px;
    height: 62px;

    min-width: 62px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 17px;

    background: var(--red-soft);

    color: var(--red);

    font-size: 25px;
}

.edu-intro-content {
    min-width: 0;
}

.edu-intro-title {
    margin: 0 0 4px;

    font-size: 17px;

    font-weight: 700;

    color: var(--text);
}

.edu-intro-text {
    margin: 0;

    font-size: 14px;

    line-height: 1.65;

    color: var(--muted);
}


/* ============================================================
   SECTION HEADING
   ============================================================ */

.edu-section {
    margin-top: 35px;
}

.edu-section-top-line {
    width: 55px;
    height: 5px;

    border-radius: 10px;

    background:
        linear-gradient(
            90deg,
            var(--red) 0%,
            var(--red) 45%,
            var(--green) 45%,
            var(--green) 100%
        );

    margin-bottom: 13px;
}

.edu-section-title {
    margin: 0;

    text-align: center;

    font-size: 27px;

    line-height: 1.25;

    font-weight: 700;

    color: var(--text);
}

.edu-section-subtitle {
    margin: 8px 0 21px;

    font-size: 14px;

    line-height: 1.6;

    color: var(--muted);
}


/* ============================================================
   GRID
   ============================================================ */

.edu-grid {
    display: grid;

    grid-template-columns:
        repeat(3, minmax(0, 1fr));

    gap: 22px;
}


/* ============================================================
   CARD
   ============================================================ */

.edu-card {
    position: relative;

    min-height: 275px;

    padding: 27px 24px 22px;

    background: #ffffff;

    border: 1px solid var(--line);

    border-radius: 21px;

    overflow: hidden;

    cursor: pointer;

    display: flex;

    flex-direction: column;

    transition:
        transform .22s ease,
        box-shadow .22s ease;
}

.edu-card::before {
    content: "";

    position: absolute;

    top: 0;
    left: 0;
    bottom: 0;

    width: 5px;

    background: var(--green);
}

.edu-card:nth-child(2)::before,
.edu-card:nth-child(5)::before {
    background: var(--red);
}

.edu-card:hover {
    transform: translateY(-4px);

    box-shadow:
        0 14px 35px rgba(27,55,42,0.10);
}


/* ============================================================
   CARD HEADER
   ============================================================ */

.edu-card-header {
    display: flex;

    align-items: center;

    justify-content: space-between;

    margin-bottom: 25px;
}

.edu-card-category {
    font-size: 12px;

    font-weight: 800;

    letter-spacing: 1.3px;

    color: var(--red);
}

.edu-card-icon {
    width: 57px;
    height: 57px;

    border-radius: 16px;

    display: flex;

    align-items: center;
    justify-content: center;

    background: var(--green-soft);

    color: var(--green);

    font-size: 23px;
}

.edu-card:nth-child(2) .edu-card-icon,
.edu-card:nth-child(5) .edu-card-icon {
    background: var(--red-soft);

    color: var(--red);
}


/* ============================================================
   CARD CONTENT
   ============================================================ */

.edu-card h3 {
    margin: 0 0 11px;

    font-size: 20px;

    line-height: 1.35;

    font-weight: 700;

    color: var(--text);
}

.edu-card-description {
    margin: 0;

    font-size: 14px;

    line-height: 1.7;

    color: var(--muted);
}


/* ============================================================
   CARD FOOTER
   ============================================================ */

.edu-card-footer {
    margin-top: auto;

    padding-top: 22px;

    display: flex;

    align-items: center;

    justify-content: space-between;
}

.edu-card-footer-label {
    font-size: 12px;

    color: #919a95;
}

.edu-card-button {
    border: 0;

    background: transparent;

    color: var(--green);

    font-size: 13px;

    font-weight: 700;

    cursor: pointer;

    padding: 0;
}

.edu-card-button i {
    margin-left: 4px;

    transition: transform .2s ease;
}

.edu-card:hover .edu-card-button i {
    transform: translateX(4px);
}


/* ============================================================
   MODAL
   ============================================================ */

.edu-modal {
    position: fixed;

    inset: 0;

    z-index: 99999;

    display: none;

    align-items: center;
    justify-content: center;

    padding: 20px;

    background: rgba(15,25,20,0.68);

    backdrop-filter: blur(5px);
}

.edu-modal.active {
    display: flex;
}

.edu-modal-box {
    width: min(950px, 100%);

    height: min(650px, 90vh);

    overflow: hidden;

    border-radius: 20px;

    background: #ffffff;

    display: grid;

    grid-template-columns: 36% 64%;

    box-shadow: 0 30px 80px rgba(0,0,0,0.25);

    animation: eduModalIn .22s ease;
}

@keyframes eduModalIn {

    from {
        opacity: 0;
        transform: translateY(15px) scale(.98);
    }

    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

}


/* ============================================================
   MODAL LEFT
   ============================================================ */

.edu-modal-left {
    position: relative;

    padding: 40px 35px;

    display: flex;

    align-items: center;

    background:
        linear-gradient(
            145deg,
            #105b43,
            #218260
        );

    color: #ffffff;

    overflow: hidden;
}

.edu-modal-left::after {
    content: "";

    position: absolute;

    width: 250px;
    height: 250px;

    border: 45px solid rgba(255,255,255,.05);

    border-radius: 50%;

    right: -100px;
    bottom: -100px;
}

.edu-modal-left-content {
    position: relative;

    z-index: 2;
}

.edu-modal-number {
    font-size: 12px;

    font-weight: 700;

    letter-spacing: 2px;

    opacity: .7;

    margin-bottom: 25px;
}

.edu-modal-icon {
    width: 64px;
    height: 64px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 16px;

    background: rgba(255,255,255,.13);

    font-size: 27px;

    margin-bottom: 22px;
}

.edu-modal-left h3 {
    margin: 0;

    font-size: 27px;

    line-height: 1.3;

    font-weight: 700;

    color: #ffffff;
}

.edu-modal-left p {
    margin: 14px 0 0;

    font-size: 13px;

    line-height: 1.7;

    color: rgba(255,255,255,.84);
}


/* ============================================================
   MODAL RIGHT
   ============================================================ */

.edu-modal-right {
    position: relative;

    overflow-y: auto;

    padding: 40px 42px;
}

.edu-modal-close {
    position: absolute;

    top: 17px;
    right: 17px;

    width: 38px;
    height: 38px;

    border-radius: 50%;

    border: 1px solid var(--line);

    background: #ffffff;

    color: #68716c;

    cursor: pointer;

    display: flex;

    align-items: center;
    justify-content: center;
}

.edu-modal-close:hover {
    background: var(--red-soft);

    color: var(--red);
}

.edu-modal-category {
    margin-bottom: 8px;

    font-size: 11px;

    font-weight: 800;

    letter-spacing: 1.5px;

    color: var(--red);
}

.edu-modal-right h2 {
    margin: 0;

    padding-right: 40px;

    font-size: 28px;

    line-height: 1.3;

    font-weight: 700;

    color: var(--text);
}

.edu-modal-line {
    width: 55px;
    height: 4px;

    margin: 17px 0 23px;

    border-radius: 10px;

    background: var(--green);
}

.edu-modal-content {
    font-size: 14px;

    line-height: 1.8;

    color: #515a55;
}

.edu-modal-content p {
    margin: 0 0 16px;
}

.edu-modal-content h4 {
    margin: 24px 0 10px;

    font-size: 15px;

    font-weight: 700;

    color: var(--text);
}

.edu-modal-content ul,
.edu-modal-content ol {
    margin: 10px 0 18px;

    padding-left: 22px;
}

.edu-modal-content li {
    margin-bottom: 8px;
}

.edu-modal-content strong {
    color: var(--text);
}


/* ============================================================
   GAMBAR MATERI
   Dipakai untuk Materi 04 dan Materi 05
   ============================================================ */

.materi-image {
    width: 100%;

    margin: 20px 0 25px;

    display: flex;

    justify-content: center;

    overflow: hidden;

    border-radius: 12px;

    background: #f8f9f8;
}

.materi-image img {
    display: block;

    width: 100%;

    max-width: 100%;

    height: auto;

    object-fit: contain;

    border-radius: 10px;
}


/* ============================================================
   MODAL NOTE
   ============================================================ */

.edu-modal-note {
    margin-top: 25px;

    padding: 15px 17px;

    border-left: 4px solid var(--green);

    border-radius: 8px;

    background: var(--green-soft);

    color: var(--green-dark);

    font-size: 12px;

    line-height: 1.7;
}


/* ============================================================
   BODY SAAT MODAL
   ============================================================ */

body.edu-modal-open {
    overflow: hidden;
}


/* ============================================================
   TABLET
   ============================================================ */

@media (max-width: 1000px) {

    .edu-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .edu-modal-box {
        grid-template-columns: 1fr;

        height: 90vh;
    }

    .edu-modal-left {
        min-height: 190px;

        padding: 25px 30px;
    }

    .edu-modal-left p {
        display: none;
    }

}


/* ============================================================
   MOBILE
   ============================================================ */

@media (max-width: 650px) {

    .edu-page {
        padding: 25px 14px 50px;
    }

    .edu-hero {
        min-height: 190px;

        padding: 28px 25px;

        border-radius: 20px;
    }

    .edu-hero h1 {
        font-size: 30px;
    }

    .edu-hero p {
        font-size: 13px;
    }

    .edu-intro {
        padding: 18px;

        gap: 14px;
    }

    .edu-intro-icon {
        width: 48px;
        height: 48px;

        min-width: 48px;

        font-size: 20px;
    }

    .edu-intro-title {
        font-size: 15px;
    }

    .edu-intro-text {
        font-size: 13px;
    }

    .edu-section-title {
        font-size: 24px;
    }

    .edu-grid {
        grid-template-columns: 1fr;

        gap: 16px;
    }

    .edu-card {
        min-height: 255px;
    }

    .edu-modal {
        padding: 10px;
    }

    .edu-modal-box {
        height: 94vh;

        border-radius: 17px;
    }

    .edu-modal-left {
        min-height: 150px;

        padding: 22px;
    }

    .edu-modal-number {
        margin-bottom: 10px;
    }

    .edu-modal-icon {
        width: 45px;
        height: 45px;

        font-size: 19px;

        margin-bottom: 10px;
    }

    .edu-modal-left h3 {
        font-size: 21px;
    }

    .edu-modal-right {
        padding: 25px 20px;
    }

    .edu-modal-right h2 {
        font-size: 23px;
    }

    .edu-modal-content {
        font-size: 13px;
    }

    .materi-image {
        margin: 15px 0 20px;
    }

}

</style>


<div class="edu-page">

    <div class="edu-container">

        {{-- ========================================================
             HERO
             ======================================================== --}}

        <section class="edu-hero">

            <div class="edu-hero-content">

                <div class="edu-hero-label">
                    <i class="bi bi-person-check-fill"></i>
                    PUSAT INFORMASI NASABAH
                </div>

                <h1>
                    Edukasi Nasabah
                </h1>

                <p>
                    Kenali fasilitas dan layanan, pahami apa itu trading,
                    serta pelajari dasar perdagangan berjangka sebelum
                    memulai aktivitas perdagangan.
                </p>

            </div>

        </section>


        {{-- ========================================================
             INTRO
             ======================================================== --}}

        <section class="edu-intro">

            <div class="edu-intro-icon">
                <i class="bi bi-lightbulb"></i>
            </div>

            <div class="edu-intro-content">

                <h3 class="edu-intro-title">
                    Kenali sebelum melakukan transaksi
                </h3>

                <p class="edu-intro-text">
                    Edukasi membantu nasabah memahami fasilitas, mekanisme trading,
                    produk, serta risiko dalam perdagangan berjangka secara lebih menyeluruh.
                </p>

            </div>

        </section>


        {{-- ========================================================
             MATERI
             ======================================================== --}}

        <section class="edu-section">

            <div class="edu-section-top-line"></div>

            <h2 class="edu-section-title">
                Materi Edukasi Nasabah
            </h2>

            <p class="edu-section-subtitle">
                Informasi dasar untuk mengenal dunia perdagangan berjangka.
            </p>


            {{-- ====================================================
                 6 CARD
                 ==================================================== --}}

            <div class="edu-grid">

                @foreach ($materiEdukasi as $materi)

                    <article
                        class="edu-card"
                        onclick="bukaMateri({{ $materi['id'] }})"
                    >

                        <div class="edu-card-header">

                            <div class="edu-card-category">
                                {{ $materi['nomor'] }}
                                / {{ $materi['kategori'] }}
                            </div>

                            <div class="edu-card-icon">
                                <i class="bi {{ $materi['icon'] }}"></i>
                            </div>

                        </div>


                        <h3>
                            {{ $materi['judul'] }}
                        </h3>

                        <p class="edu-card-description">
                            {{ $materi['ringkasan'] }}
                        </p>


                        <div class="edu-card-footer">

                            <span class="edu-card-footer-label">
                                Materi edukasi
                            </span>

                            <button
                                type="button"
                                class="edu-card-button"
                                onclick="event.stopPropagation(); bukaMateri({{ $materi['id'] }})"
                            >
                                Baca materi
                                <i class="bi bi-arrow-right"></i>
                            </button>

                        </div>

                    </article>

                @endforeach

            </div>

        </section>

    </div>


    {{-- ============================================================
         MODAL
         ============================================================ --}}

    @foreach ($materiEdukasi as $materi)

        <div
            class="edu-modal"
            id="eduModal{{ $materi['id'] }}"
            onclick="tutupJikaOverlay(event, {{ $materi['id'] }})"
        >

            <div
                class="edu-modal-box"
                onclick="event.stopPropagation()"
            >

                {{-- =================================================
                     LEFT MODAL
                     ================================================= --}}

                <div class="edu-modal-left">

                    <div class="edu-modal-left-content">

                        <div class="edu-modal-number">
                            MATERI {{ $materi['nomor'] }}
                        </div>

                        <div class="edu-modal-icon">
                            <i class="bi {{ $materi['icon'] }}"></i>
                        </div>

                        <h3>
                            {{ $materi['judul'] }}
                        </h3>

                        <p>
                            {{ $materi['ringkasan'] }}
                        </p>

                    </div>

                </div>


                {{-- =================================================
                     RIGHT MODAL
                     ================================================= --}}

                <div class="edu-modal-right">

                    <button
                        type="button"
                        class="edu-modal-close"
                        onclick="tutupMateri({{ $materi['id'] }})"
                        aria-label="Tutup"
                    >
                        <i class="bi bi-x-lg"></i>
                    </button>


                    <div class="edu-modal-category">
                        {{ $materi['kategori'] }}
                    </div>

                    <h2>
                        {{ $materi['judul'] }}
                    </h2>

                    <div class="edu-modal-line"></div>


                    <div class="edu-modal-content">
                        {!! $materi['isi'] !!}
                    </div>


                    <div class="edu-modal-note">

                        <i class="bi bi-info-circle"></i>

                        Pastikan Anda memahami informasi,
                        mekanisme, serta risiko sebelum melakukan transaksi.

                    </div>

                </div>

            </div>

        </div>

    @endforeach

</div>


<script>

/* ============================================================
   BUKA MODAL
   ============================================================ */

function bukaMateri(id) {

    const modal = document.getElementById('eduModal' + id);

    if (!modal) {
        return;
    }

    modal.classList.add('active');

    document.body.classList.add('edu-modal-open');
}


/* ============================================================
   TUTUP MODAL
   ============================================================ */

function tutupMateri(id) {

    const modal = document.getElementById('eduModal' + id);

    if (!modal) {
        return;
    }

    modal.classList.remove('active');

    document.body.classList.remove('edu-modal-open');
}


/* ============================================================
   KLIK AREA LUAR MODAL
   ============================================================ */

function tutupJikaOverlay(event, id) {

    if (event.target === event.currentTarget) {

        tutupMateri(id);

    }

}


/* ============================================================
   TOMBOL ESC
   ============================================================ */

document.addEventListener('keydown', function(event) {

    if (event.key !== 'Escape') {
        return;
    }

    const modalAktif = document.querySelector('.edu-modal.active');

    if (!modalAktif) {
        return;
    }

    modalAktif.classList.remove('active');

    document.body.classList.remove('edu-modal-open');

});

</script>

@endsection