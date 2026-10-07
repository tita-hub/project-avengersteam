@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/literasi-modal.css') }}">




<div class="edu-page">

    {{-- =====================================================
         HERO
    ====================================================== --}}
    <section class="edu-hero"
     id="eduHero"
    >

        <div class="edu-container">

            <div class="edu-hero-content">

                <span class="edu-eyebrow">
                    Avengers Team
                </span>

                <h1>
                    Edukasi Umum
                </h1>

                <p>
                    Ruang pembelajaran untuk mengenal dunia kerja,
                    kegiatan profesional, serta pengetahuan umum
                    yang berkaitan dengan dunia perdagangan berjangka.
                </p>

            </div>

        </div>

    </section>


    {{-- =====================================================
        3 MATERI UTAMA
    ====================================================== --}}
    <section
        class="materi-section"
        id="materiUtama"
    >

        <div class="edu-container">

            <div class="materi-grid">

                {{-- MAGANG --}}
                <div
                    class="materi-card"
                    onclick="bukaMateri('magang')"
                >
                    <h3>
                        Program Magang
                    </h3>

                    <p>
                        Mengenal pengalaman magang, jurusan yang relevan,
                        serta gambaran kegiatan pembelajaran di lingkungan
                        profesional.
                    </p>

                    <span class="materi-arrow">
                        <i class="bi bi-arrow-right"></i>
                    </span>

                </div>


                {{-- KEGIATAN --}}
                <div
                    class="materi-card"
                    onclick="bukaMateri('kegiatan')"
                >

                    <h3>
                        Kegiatan Sosial
                    </h3>

                    <p>
                        Mengenal berbagai kegiatan internal dan sosial
                        yang menjadi bagian dari proses pengembangan
                        diri dan kebersamaan.
                    </p>

                    <span class="materi-arrow">
                        <i class="bi bi-arrow-right"></i>
                    </span>

                </div>


                {{-- =====================================================
        KEGIATAN LITERASI
    ====================================================== --}}

    <div
        class="materi-card"
        onclick="bukaMateri('literasi')"
    >

        <h3>
            Kegiatan Literasi
        </h3>

        <p>
            Materi dasar mengenai komunikasi profesional
            dan pengenalan dunia perdagangan.
        </p>

        <span class="materi-arrow">
            <i class="bi bi-arrow-right"></i>
        </span>

    </div>


                </div>

            </div>

        </section>



    {{-- =====================================================
        DETAIL KEGIATAN LITERASI
    ====================================================== --}}

    <section
        class="materi-detail"
        id="detail-literasi"
    >

        <div class="edu-container">

            <button
                type="button"
                class="back-materi"
                onclick="tutupMateri()"
            >

                <i class="bi bi-arrow-left"></i>

                Kembali ke Materi

            </button>


            {{-- =================================================
                HEADER
            ================================================== --}}

            <div class="literasi-section">

                <div class="literasi-header">

                    <span class="literasi-label">
                        KEGIATAN LITERASI
                    </span>


                    <h2>
                        Belajar dari Dunia Nyata
                    </h2>


                    <p>
                        Kegiatan edukasi yang dilakukan Avengers Team melalui
                        interaksi langsung dengan sekolah, kampus, dan lingkungan industri.
                    </p>

                </div>


                {{-- =================================================
                    CARD KEGIATAN
                ================================================== --}}

                <div class="literasi-grid">


                    {{-- =================================================
                        SOSIALISASI SEKOLAH / KAMPUS
                    ================================================== --}}

                    <article class="literasi-card">

                        <div class="literasi-card-number">
                            01
                        </div>


                        <div class="literasi-card-content">

                            <div class="literasi-card-icon">

                                <i class="bi bi-mortarboard-fill"></i>

                            </div>


                            <span class="literasi-card-category">

                                SOSIALISASI

                            </span>


                            <h3>

                                Sosialisasi ke Sekolah & Kampus

                            </h3>


                            <p>

                                Kegiatan berbagi wawasan kepada siswa dan mahasiswa
                                mengenai dunia kerja, pengenalan industri, serta
                                pengetahuan dasar perdagangan berjangka.

                            </p>


                            <div class="literasi-card-info">

                                <span>

                                    <i class="bi bi-people-fill"></i>

                                    Edukasi langsung

                                </span>


                                <span>

                                    <i class="bi bi-building"></i>

                                    Sekolah / Kampus

                                </span>

                            </div>


                            <button
                                type="button"
                                class="literasi-card-link"
                                onclick="bukaLiterasiDetail('sosialisasi')"
                            >
                                Lihat kegiatan
                                <i class="bi bi-arrow-right"></i>
                            </button>

                        </div>

                    </article>



                    {{-- =================================================
                        KUNJUNGAN INDUSTRI
                    ================================================== --}}

                    <article class="literasi-card">

                        <div class="literasi-card-number">
                            02
                        </div>


                        <div class="literasi-card-content">

                            <div class="literasi-card-icon">

                                <i class="bi bi-buildings-fill"></i>

                            </div>


                            <span class="literasi-card-category">

                                KUNJUNGAN INDUSTRI

                            </span>


                            <h3>

                                Kunjungan Industri

                            </h3>


                            <p>

                                Kegiatan kunjungan untuk mengenalkan secara langsung
                                lingkungan kerja, aktivitas profesional, serta gambaran
                                dunia industri kepada peserta.

                            </p>


                            <div class="literasi-card-info">

                                <span>

                                    <i class="bi bi-people-fill"></i>

                                    Edukasi langsung

                                </span>


                                <span>

                                    <i class="bi bi-briefcase-fill"></i>

                                    Dunia industri

                                </span>

                            </div>


                            <button
                                type="button"
                                class="literasi-card-link"
                                onclick="bukaLiterasiDetail('industri')"
                            >
                                Lihat kegiatan
                                <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>

                    </article>


                </div>


                {{-- =================================================
                    MODAL DETAIL SOSIALISASI & KUNJUNGAN INDUSTRI
                ================================================== --}}

                <div
                    class="literasi-modal"
                    id="literasiModal"
                    aria-hidden="true"
                >

                    <div
                        class="literasi-modal-overlay"
                        onclick="tutupLiterasiModal()"
                    ></div>

                    <div
                        class="literasi-modal-box"
                        role="dialog"
                        aria-modal="true"
                    >

                        <button
                            type="button"
                            class="literasi-modal-close"
                            onclick="tutupLiterasiModal()"
                            aria-label="Tutup detail kegiatan"
                        >
                            <i class="bi bi-x-lg"></i>
                        </button>

                        <div class="literasi-modal-image-wrap">

                            <img
                                id="literasiModalImage"
                                src=""
                                alt="Dokumentasi kegiatan literasi"
                                onerror="this.style.display='none'; this.parentElement.classList.add('image-fallback');"
                            >

                            <div class="literasi-modal-image-fallback">
                                <i class="bi bi-camera-fill"></i>
                                <span>Dokumentasi kegiatan</span>
                            </div>

                            <div class="literasi-modal-image-overlay"></div>

                            <div class="literasi-modal-image-caption">
                                <span id="literasiModalLabel">KEGIATAN LITERASI</span>
                                <strong id="literasiModalTitleImage">Kegiatan Literasi</strong>
                            </div>

                        </div>

                        <div class="literasi-modal-content">

                            <span
                                class="literasi-modal-label"
                                id="literasiModalLabelText"
                            >
                                KEGIATAN LITERASI
                            </span>

                            <h3 id="literasiModalTitle">Kegiatan Literasi</h3>

                            <p id="literasiModalDescription"></p>

                            <div
                                class="literasi-modal-meta"
                                id="literasiModalMeta"
                            ></div>

                            <div class="literasi-modal-columns">

                                <div class="literasi-modal-section">
                                    <div class="literasi-modal-section-title">
                                        <span class="literasi-modal-section-icon">
                                            <i class="bi bi-stars"></i>
                                        </span>
                                        <div>
                                            <small>GAMBARAN KEGIATAN</small>
                                            <strong id="literasiModalConceptTitle">Kegiatan</strong>
                                        </div>
                                    </div>

                                    <p id="literasiModalConcept"></p>
                                </div>

                                <div class="literasi-modal-section">
                                    <div class="literasi-modal-section-title">
                                        <span class="literasi-modal-section-icon">
                                            <i class="bi bi-bullseye"></i>
                                        </span>
                                        <div>
                                            <small>TUJUAN</small>
                                            <strong>Nilai yang Dibawa</strong>
                                        </div>
                                    </div>

                                    <div
                                        class="literasi-modal-points"
                                        id="literasiModalPoints"
                                    ></div>
                                </div>

                            </div>

                            <div class="literasi-modal-highlight">
                                <div class="literasi-modal-highlight-icon">
                                    <i class="bi bi-lightbulb-fill"></i>
                                </div>
                                <div>
                                    <span>INTI KEGIATAN</span>
                                    <strong id="literasiModalHighlight"></strong>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =====================================================
         DETAIL PROGRAM MAGANG
    ====================================================== --}}
    <section
        class="materi-detail"
        id="detail-magang"
    >

        <div class="edu-container">

            <button
                type="button"
                class="back-materi"
                onclick="tutupMateri()"
            >
                <i class="bi bi-arrow-left"></i>
                Kembali ke Materi
            </button>


            <div class="magang-hero">

                <div class="magang-hero-content">

                    <small>
                        Program Magang
                    </small>

                    <h2>
                        Kenali Dunia Kerja
                        Lewat Pengalaman Magang
                    </h2>

                    <p>
                        Program magang menjadi kesempatan bagi mahasiswa
                        untuk mengenal lingkungan kerja secara langsung,
                        menerapkan pengetahuan yang telah dipelajari,
                        serta mengembangkan pengalaman profesional.
                    </p>

                    <button
                        type="button"
                        class="magang-explore"
                        onclick="scrollKeJurusan()"
                    >
                        Lihat Jurusan yang Relevan
                        <i class="bi bi-arrow-down"></i>
                    </button>

                </div>

            </div>


            {{-- =================================================
                 MANFAAT
            ================================================== --}}
            <div class="magang-section">

                <div class="magang-section-title">

                
                    <h3>
                        Belajar Tidak Hanya dari Ruang Kelas
                    </h3>

                    <p>
                        Pengalaman magang dapat menjadi kesempatan
                        untuk mengenal budaya kerja, membangun
                        keterampilan, dan memahami penerapan ilmu
                        dalam lingkungan profesional.
                    </p>

                </div>


                <div class="benefit-grid">

                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-lightbulb"></i>
                        </div>

                        <h4>
                            Menambah Wawasan
                        </h4>

                        <p>
                            Mengenal bagaimana ilmu yang dipelajari
                            dapat diterapkan dalam lingkungan kerja.
                        </p>
                    </div>


                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-person-workspace"></i>
                        </div>

                        <h4>
                            Mengenal Dunia Kerja
                        </h4>

                        <p>
                            Memahami suasana kerja dan cara berinteraksi
                            secara profesional.
                        </p>
                    </div>


                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-people"></i>
                        </div>

                        <h4>
                            Mengembangkan Komunikasi
                        </h4>

                        <p>
                            Melatih kemampuan berkomunikasi dan
                            bekerja bersama orang lain.
                        </p>
                    </div>


                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-journal-check"></i>
                        </div>

                        <h4>
                            Menerapkan Pengetahuan
                        </h4>

                        <p>
                            Menghubungkan materi perkuliahan dengan
                            pengalaman yang diperoleh selama kegiatan.
                        </p>
                    </div>


                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>

                        <h4>
                            Mengembangkan Diri
                        </h4>

                        <p>
                            Membangun kebiasaan kerja dan tanggung jawab
                            dalam lingkungan profesional.
                        </p>
                    </div>


                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="bi bi-folder2-open"></i>
                        </div>

                        <h4>
                            Menambah Pengalaman
                        </h4>

                        <p>
                            Memiliki pengalaman yang dapat menjadi bagian
                            dari perjalanan akademik dan profesional.
                        </p>
                    </div>

                </div>

            </div>


            {{-- =================================================
                 JURUSAN / BIDANG MAGANG
            ================================================== --}}
            <div
                class="magang-section"
                id="jurusanMagang"
            >

                <div class="magang-section-title">

                    <h3>
                        Bidang / Jurusan
                    </h3>

                    <p>
                        Program magang terbuka untuk siswa SMK dan mahasiswa
                        dari berbagai latar belakang pendidikan yang sesuai
                        dengan bidang berikut.
                    </p>

                </div>


                <div class="jurusan-grid">

                    <div
                        class="jurusan-card"
                        role="button"
                        tabindex="0"
                        onclick="bukaJurusan('business')"
                        onkeydown="if (event.key === 'Enter' || event.key === ' ') { event.preventDefault(); bukaJurusan('business'); }"
                    >
                        <div class="jurusan-image">
                            <img src="{{ asset('images/business-marketing.jpeg') }}" alt="Business dan Marketing">
                        </div>
                        <div class="jurusan-content">
                            <span class="jurusan-number">01</span>
                            <h4>Business &amp; Marketing</h4>
                            <ul class="jurusan-list">
                                <li>Manajemen</li>
                                <li>Administrasi Bisnis</li>
                                <li>Marketing</li>
                                <li>Bisnis Digital</li>
                            </ul>
                        </div>
                        <span class="jurusan-arrow" aria-hidden="true">
                            <i class="bi bi-arrow-right"></i>
                        </span>
                    </div>

                    <div
                        class="jurusan-card"
                        role="button"
                        tabindex="0"
                        onclick="bukaJurusan('finance')"
                        onkeydown="if (event.key === 'Enter' || event.key === ' ') { event.preventDefault(); bukaJurusan('finance'); }"
                    >
                        <div class="jurusan-image">
                            <img src="{{ asset('images/finance-market-research.jpeg') }}" alt="Finance dan Market Research">
                        </div>
                        <div class="jurusan-content">
                            <span class="jurusan-number">02</span>
                            <h4>Finance &amp; Market Research</h4>
                            <ul class="jurusan-list">
                                <li>Ekonomi</li>
                                <li>Keuangan</li>
                                <li>Perbankan</li>
                                <li>Akuntansi</li>
                            </ul>
                        </div>
                        <span class="jurusan-arrow" aria-hidden="true">
                            <i class="bi bi-arrow-right"></i>
                        </span>
                    </div>

                    <div
                        class="jurusan-card"
                        role="button"
                        tabindex="0"
                        onclick="bukaJurusan('digital')"
                        onkeydown="if (event.key === 'Enter' || event.key === ' ') { event.preventDefault(); bukaJurusan('digital'); }"
                    >
                        <div class="jurusan-image">
                            <img src="{{ asset('images/digital-technology.jpeg') }}" alt="Digital dan Technology">
                        </div>
                        <div class="jurusan-content">
                            <span class="jurusan-number">03</span>
                            <h4>Digital &amp; Technology</h4>
                            <ul class="jurusan-list">
                                <li>Teknik Informatika</li>
                                <li>Sistem Informasi</li>
                                <li>Manajemen Informatika</li>
                                <li>Data Science</li>
                            </ul>
                        </div>
                        <span class="jurusan-arrow" aria-hidden="true">
                            <i class="bi bi-arrow-right"></i>
                        </span>
                    </div>

                    <div
                        class="jurusan-card"
                        role="button"
                        tabindex="0"
                        onclick="bukaJurusan('creative')"
                        onkeydown="if (event.key === 'Enter' || event.key === ' ') { event.preventDefault(); bukaJurusan('creative'); }"
                    >
                        <div class="jurusan-image">
                            <img src="{{ asset('images/creative-communication.jpeg') }}" alt="Creative dan Communication">
                        </div>
                        <div class="jurusan-content">
                            <span class="jurusan-number">04</span>
                            <h4>Creative &amp; Communication</h4>
                            <ul class="jurusan-list">
                                <li>Ilmu Komunikasi</li>
                                <li>DKV</li>
                                <li>Broadcasting</li>
                                <li>Multimedia</li>
                            </ul>
                        </div>
                        <span class="jurusan-arrow" aria-hidden="true">
                            <i class="bi bi-arrow-right"></i>
                        </span>
                    </div>

                </div>

                {{-- DETAIL PROGRAM PER BIDANG --}}
                <div class="jurusan-detail" id="detail-business">
                    <div class="jurusan-detail-head">
                        <div>
                            <small>Program Magang</small>
                            <h4>Business &amp; Marketing</h4>
                        </div>
                        <button type="button" class="jurusan-close" onclick="tutupJurusan('business')">Tutup</button>
                    </div>
                    <div class="jurusan-program-grid">
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Manajemen</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Administrasi Bisnis</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Marketing</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Bisnis Digital</div>
                    </div>
                </div>

                <div class="jurusan-detail" id="detail-finance">
                    <div class="jurusan-detail-head">
                        <div>
                            <small>Program Magang</small>
                            <h4>Finance &amp; Market Research</h4>
                        </div>
                        <button type="button" class="jurusan-close" onclick="tutupJurusan('finance')">Tutup</button>
                    </div>
                    <div class="jurusan-program-grid">
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Ekonomi</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Keuangan</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Perbankan</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Akuntansi</div>
                    </div>
                </div>

                <div class="jurusan-detail" id="detail-digital">
                    <div class="jurusan-detail-head">
                        <div>
                            <small>Program Magang</small>
                            <h4>Digital &amp; Technology</h4>
                        </div>
                        <button type="button" class="jurusan-close" onclick="tutupJurusan('digital')">Tutup</button>
                    </div>
                    <div class="jurusan-program-grid">
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Teknik Informatika</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Sistem Informasi</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Manajemen Informatika</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Data Science</div>
                    </div>
                </div>

                <div class="jurusan-detail" id="detail-creative">
                    <div class="jurusan-detail-head">
                        <div>
                            <small>Program Magang</small>
                            <h4>Creative &amp; Communication</h4>
                        </div>
                        <button type="button" class="jurusan-close" onclick="tutupJurusan('creative')">Tutup</button>
                    </div>
                    <div class="jurusan-program-grid">
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Ilmu Komunikasi</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>DKV</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Broadcasting</div>
                        <div class="jurusan-program-item"><i class="bi bi-check-circle-fill"></i>Multimedia</div>
                    </div>
                </div>

            </div>


            {{-- =================================================
                PENGALAMAN MAGANG PESERTA
            ================================================== --}}

            <div class="magang-section">

                <div class="magang-section-title">

                    <h3>
                        Bagaimana Pengalaman Magang di PT Rifan Financindo Berjangka Semarang?
                    </h3>

                    <p>
                        Cerita pengalaman mahasiswa selama mengenal
                        lingkungan kerja dan mengikuti kegiatan magang.
                    </p>

                </div>


                {{-- SUCCESS MESSAGE --}}
                @if(session('review_success'))

                    <div class="review-alert review-alert-success">
                        <i class="bi bi-check-circle-fill"></i>

                        <span>
                            {{ session('review_success') }}
                        </span>
                    </div>

                @endif


                {{-- ERROR MESSAGE --}}
                @if(session('review_error'))

                    <div class="review-alert review-alert-error">
                        <i class="bi bi-exclamation-circle-fill"></i>

                        <span>
                            {{ session('review_error') }}
                        </span>
                    </div>

                @endif


                {{-- VALIDATION ERROR --}}
                @if($errors->any())

                    <div class="review-alert review-alert-error">

                        <i class="bi bi-exclamation-circle-fill"></i>

                        <div>

                            @foreach($errors->all() as $error)

                                <div>
                                    {{ $error }}
                                </div>

                            @endforeach

                        </div>

                    </div>

                @endif


                {{-- =================================================
                    EXPERIENCE SLIDER
                ================================================== --}}

                @if($pengalamanMagang->count() > 0)

                    <div class="experience-slider">

                        <div class="experience-controls">

                            <button
                                type="button"
                                class="experience-control"
                                onclick="geserPengalaman(-1)"
                                aria-label="Pengalaman sebelumnya"
                            >
                                <i class="bi bi-arrow-left"></i>
                            </button>

                            <button
                                type="button"
                                class="experience-control"
                                onclick="geserPengalaman(1)"
                                aria-label="Pengalaman berikutnya"
                            >
                                <i class="bi bi-arrow-right"></i>
                            </button>

                        </div>


                        <div
                            class="experience-track"
                            id="experienceTrack"
                        >

                            @foreach($pengalamanMagang as $pengalaman)

                                <article class="experience-card">

                                    <div class="experience-card-image">

                                        <img
                                            src="{{ asset('storage/' . $pengalaman->photo) }}"
                                            alt="Foto {{ $pengalaman->name }}"
                                        >

                                    </div>


                                    <div class="experience-card-content">

                                        <small>
                                            Pengalaman Peserta Magang
                                        </small>


                                        <h3>
                                            {{ $pengalaman->name }}
                                        </h3>


                                        <p class="experience-institution">

                                            {{ $pengalaman->institution }}

                                        </p>


                                        <p>

                                            {{ \Illuminate\Support\Str::limit(
                                                $pengalaman->review,
                                                180,
                                                '...'
                                            ) }}

                                        </p>


                                        <button
                                            type="button"
                                            class="experience-read-more"
                                            onclick="bukaPengalaman({{ $pengalaman->id }})"
                                        >
                                            Read More...
                                        </button>

                                    </div>

                                </article>

                            @endforeach

                        </div>

                    </div>

                @else

                    {{-- =================================================
                        BELUM ADA PENGALAMAN
                    ================================================== --}}

                    <div class="experience-empty">

                        <div class="experience-empty-icon">

                            <i class="bi bi-chat-quote"></i>

                        </div>

                        <h3>
                            Belum Ada Pengalaman
                        </h3>

                        <p>
                            Belum ada peserta yang membagikan pengalaman
                            magangnya. Jadilah peserta pertama yang berbagi cerita.
                        </p>

                        <button
                            type="button"
                            class="experience-submit-button"
                            onclick="bukaFormPengalaman()"
                        >
                            <i class="bi bi-pencil-square"></i>
                            Bagikan Pengalaman
                        </button>

                    </div>

                @endif

            </div>


            {{-- =================================================
                MODAL FORM PENGALAMAN
            ================================================== --}}

            <div
                class="experience-modal"
                id="experienceFormModal"
                aria-hidden="true"
            >

                <div
                    class="experience-modal-overlay"
                    onclick="tutupFormPengalaman()"
                ></div>


                <div class="experience-modal-box">

                    <button
                        type="button"
                        class="experience-modal-close"
                        onclick="tutupFormPengalaman()"
                        aria-label="Tutup"
                    >
                        <i class="bi bi-x-lg"></i>
                    </button>


                    <div class="experience-modal-header">

                        <small>
                            PENGALAMAN PESERTA
                        </small>

                        <h3>
                            Bagikan Pengalaman Magang
                        </h3>

                        <p>
                            Ceritakan pengalamanmu selama mengikuti
                            program magang.
                        </p>

                    </div>


                    <form
                        action="{{ route('internship-reviews.store') }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="experience-form"
                    >

                        @csrf


                        <div class="experience-form-group">

                            <label for="review_name">
                                Nama
                            </label>

                            <input
                                type="text"
                                id="review_name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Masukkan nama"
                                maxlength="100"
                                required
                            >

                        </div>


                        <div class="experience-form-group">

                            <label for="review_institution">
                                Asal Sekolah / Universitas
                            </label>

                            <input
                                type="text"
                                id="review_institution"
                                name="institution"
                                value="{{ old('institution') }}"
                                placeholder="Contoh: Universitas Diponegoro"
                                maxlength="150"
                                required
                            >

                        </div>


                        <div class="experience-form-group">

                            <label for="review_photo">
                                Foto Profil
                            </label>

                            <input
                                type="file"
                                id="review_photo"
                                name="photo"
                                accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                                required
                            >

                            <small>
                                JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                            </small>

                        </div>


                        <div class="experience-form-group">

                            <label for="review_text">
                                Ulasan
                            </label>

                            <textarea
                                id="review_text"
                                name="review"
                                rows="6"
                                maxlength="3000"
                                placeholder="Ceritakan pengalaman kamu selama mengikuti magang..."
                                required
                            >{{ old('review') }}</textarea>
         
                        </div>


                        <button
                            type="submit"
                            class="experience-form-submit"
                        >
                            <i class="bi bi-send"></i>
                            Kirim Pengalaman
                        </button>

                    </form>

                </div>

            </div>

            {{-- =================================================
                MODAL DETAIL PENGALAMAN
================================================== --}}

<div
    class="experience-modal"
    id="experienceDetailModal"
    aria-hidden="true"
>

    <div
        class="experience-modal-overlay"
        onclick="tutupPengalaman()"
    ></div>


    <div class="experience-modal-box experience-detail-box">

        <button
            type="button"
            class="experience-modal-close"
            onclick="tutupPengalaman()"
            aria-label="Tutup"
        >
            <i class="bi bi-x-lg"></i>
        </button>


        <div class="experience-detail">

            <img
                id="experienceDetailPhoto"
                src=""
                alt=""
            >


            <div class="experience-detail-content">

                <small>
                    PENGALAMAN PESERTA MAGANG
                </small>

                <h3 id="experienceDetailName"></h3>

                <div
                    class="experience-detail-institution"
                    id="experienceDetailInstitution"
                ></div>

                <div
                    class="experience-detail-review"
                    id="experienceDetailReview"
                ></div>

            </div>

        </div>

    </div>

</div>
            {{-- =================================================
                 FAQ
            ================================================== --}}
            <div class="magang-section">

                <div class="magang-section-title">

                    <h3>
                        FAQ Program Magang
                    </h3>

                </div>


                <div class="faq-list">

                    <div class="faq-item">

                        <button
                            type="button"
                            class="faq-question"
                            onclick="toggleFaq(this)"
                        >
                            <span>
                                Apa tujuan dari kegiatan magang?
                            </span>

                            <i class="bi bi-chevron-down"></i>
                        </button>

                        <div class="faq-answer">
                            Kegiatan magang memberikan kesempatan
                            kepada mahasiswa untuk mengenal lingkungan
                            kerja dan mendapatkan pengalaman yang
                            relevan dengan proses pembelajaran.
                        </div>

                    </div>


                    <div class="faq-item">

                        <button
                            type="button"
                            class="faq-question"
                            onclick="toggleFaq(this)"
                        >
                            <span>
                                Apakah semua jurusan dapat mengikuti?
                            </span>

                            <i class="bi bi-chevron-down"></i>
                        </button>

                        <div class="faq-answer">
                            Kesesuaian jurusan dapat disesuaikan dengan
                            kebutuhan kegiatan dan program yang tersedia.
                            Daftar di atas merupakan gambaran jurusan
                            yang relevan untuk konteks edukasi magang.
                        </div>

                    </div>


                    <div class="faq-item">

                        <button
                            type="button"
                            class="faq-question"
                            onclick="toggleFaq(this)"
                        >
                            <span>
                                Apa yang dapat dipelajari mahasiswa?
                            </span>

                            <i class="bi bi-chevron-down"></i>
                        </button>

                        <div class="faq-answer">
                            Mahasiswa dapat mengenal lingkungan
                            profesional, komunikasi kerja, kegiatan
                            administrasi, proses bisnis, serta berbagai
                            pengalaman yang sesuai dengan kegiatan magang.
                        </div>

                    </div>


                    <div class="faq-item">

                        <button
                            type="button"
                            class="faq-question"
                            onclick="toggleFaq(this)"
                        >
                            <span>
                                Apakah pengalaman setiap mahasiswa sama?
                            </span>

                            <i class="bi bi-chevron-down"></i>
                        </button>

                        <div class="faq-answer">
                            Pengalaman setiap mahasiswa dapat berbeda
                            tergantung jurusan, kegiatan, pendampingan,
                            dan aktivitas yang diikuti selama program.
                        </div>

                    </div>

                </div>

            </div>


            {{-- CTA --}}
            <div class="magang-cta-content">

            <span class="magang-cta-label">
                PENDAFTARAN MAGANG
            </span>

            <h2>
                Tertarik Mengikuti Program Magang?
            </h2>

            <p>
                Hubungi kami untuk mendapatkan informasi mengenai
                pendaftaran dan pelaksanaan program magang.
            </p>

            <div class="magang-cta-buttons">

                <a
                    href="https://wa.me/082262226238"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="magang-cta-btn whatsapp"
                >
                    <i class="bi bi-whatsapp"></i>
                    WhatsApp
                </a>

                <a
                    href="mailto:inititaa23@gmail.com"
                    class="magang-cta-btn email"
                >
                    <i class="bi bi-envelope"></i>
                    Email
                </a>

            </div>

        </div>

    </section>


   {{-- ============================================================
     DETAIL KEGIATAN
     VIDEO & FOTO
============================================================ --}}





{{-- ============================================================
     SECTION DETAIL KEGIATAN
============================================================ --}}

<section
    class="materi-detail"
    id="detail-kegiatan"
>

    <div class="edu-container">


        {{-- ====================================================
             TOMBOL KEMBALI KE MATERI
        ===================================================== --}}

        <button
            type="button"
            class="back-materi"
            onclick="tutupMateri()"
        >

            <i class="bi bi-arrow-left"></i>

            Kembali ke Materi

        </button>

        <div class="kegiatan-wrapper">

            {{-- ==================================================
                 TAMPILAN AWAL
            =================================================== --}}

            <div
                id="kegiatanListPage"
                class="kegiatan-list-page"
            >

                {{-- ============================================================
                    INTRO KEGIATAN SOSIAL
                ============================================================ --}}

                <div
                    class="kegiatan-intro"
                    id="kegiatanIntro"
                >

                    <div class="kegiatan-intro-label">
                        KEGIATAN SOSIAL
                    </div>

                    <h2 class="kegiatan-intro-title">
                        Momen, Kebersamaan, dan Kepedulian
                    </h2>

                    <p class="kegiatan-intro-description">
                        Setiap kegiatan menjadi bagian dari perjalanan
                        Avengers Team dalam membangun kebersamaan,
                        kepedulian, dan kontribusi bersama.
                    </p>

                </div>


                {{-- =================================================
                    CARD VIDEO
                ================================================== --}}

                <div class="kegiatan-list">

                    <div class="kegiatan-card">

                        {{-- SEMUA ISI CARD KAMU TETAP DI SINI --}}

                        <div class="kegiatan-image">

                            <img
                                src="{{ asset('images/kegiatan-video.jpg') }}"
                                alt="Video kegiatan Baby Home Semarang"
                            >

                        </div>

                        <div class="kegiatan-body">

                            <h3 class="kegiatan-title">
                                Baby Home Semarang
                            </h3>

                            <p class="kegiatan-description">
                                Dokumentasi kegiatan Avengers Team
                                bersama Baby Home Semarang di Gayamsari.
                            </p>

                            <div class="kegiatan-info">

                                <div class="kegiatan-info-item">
                                    <i class="bi bi-calendar-event"></i>

                                    <span>
                                        Jumat, 11 September 2026
                                    </span>
                                </div>

                                <div class="kegiatan-info-item">
                                    <i class="bi bi-clock"></i>

                                    <span>
                                        Pukul 14:00 WIB
                                    </span>
                                </div>

                                <div class="kegiatan-info-item">
                                    <i class="bi bi-geo-alt"></i>

                                    <span>
                                        Baby Home Semarang, Gayamsari
                                    </span>
                                </div>

                            </div>

                            <button
                                type="button"
                                class="kegiatan-detail"
                                onclick="bukaDetailKegiatan('video')"
                            >
                                <span>
                                    Lihat Detail
                                </span>

                                <i class="bi bi-arrow-right"></i>
                            </button>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ====================================================
                 DETAIL VIDEO
            ===================================================== --}}

            <div
                id="kegiatanVideoPage"
                class="kegiatan-detail-page"
            >

                <div class="kegiatan-detail-content">


                    {{-- VIDEO --}}

                    <div class="kegiatan-detail-video">

                        <iframe
                            src="https://www.youtube.com/embed/84boVMbwbVI"
                            title="Kegiatan Avengers Team di Baby Home Semarang"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen
                        ></iframe>

                    </div>



                    <div class="kegiatan-detail-body">


                        <div class="kegiatan-detail-type">

                            <i class="bi bi-play-circle-fill"></i>

                            <span>
                                Video
                            </span>

                        </div>


                        <h2 class="kegiatan-detail-title">

                            Baby Home Semarang

                        </h2>


                        <div class="kegiatan-detail-info">


                            <div class="kegiatan-detail-info-item">

                                <i class="bi bi-calendar-event"></i>

                                <span>
                                    Jumat, 11 September 2026
                                </span>

                            </div>


                            <div class="kegiatan-detail-info-item">

                                <i class="bi bi-clock"></i>

                                <span>
                                    Pukul 14:00 WIB
                                </span>

                            </div>


                            <div class="kegiatan-detail-info-item">

                                <i class="bi bi-geo-alt"></i>

                                <span>
                                    Baby Home Semarang di Gayamsari
                                </span>

                            </div>


                        </div>


                        <p class="kegiatan-detail-description">

                            Video ini mendokumentasikan kegiatan
                            Avengers Team bersama Baby Home Semarang.
                            Momen ini menjadi bagian dari kebersamaan
                            dan kepedulian terhadap lingkungan sekitar.

                        </p>

                        {{-- =================================================
                            DOKUMENTASI FOTO
                        ================================================== --}}

                        <h3 class="kegiatan-dokumentasi-title">
                            Galeri
                        </h3>

                        <div class="kegiatan-dokumentasi">

                            @for ($i = 1; $i <= 6; $i++)

                                <div class="kegiatan-dokumentasi-item">

                                    <img
                                        src="{{ asset('images/kegiatan' . $i . '.jpg') }}"
                                        alt="Dokumentasi kegiatan {{ $i }}"
                                    >

                                </div>

                            @endfor

                        </div>


                    </div>

                </div>

            </div>



            {{-- ============================================================
     JAVASCRIPT
============================================================ --}}

<script>

/* ============================================================
   BUKA DETAIL VIDEO / FOTO
============================================================ */

function bukaDetailKegiatan(jenis) {

    const intro =
    document.getElementById('kegiatanIntro');

    const listPage =
        document.getElementById('kegiatanListPage');

    const videoPage =
        document.getElementById('kegiatanVideoPage');

    /* Sembunyikan daftar */

    listPage.style.display = 'none';


    /* Sembunyikan semua detail */

    videoPage.classList.remove('active');

    /* ========================================================
       DETAIL VIDEO
    ======================================================== */

    if (jenis === 'video') {

        videoPage.classList.add('active');

    }


    /* Scroll ke atas section */

    document
        .getElementById('detail-kegiatan')
        .scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });

}


/* ============================================================
   KEMBALI KE LIST KEGIATAN
============================================================ */

function kembaliKeKegiatan() {

    const intro =
    document.getElementById('kegiatanIntro');

    const listPage =
        document.getElementById('kegiatanListPage');

    const videoPage =
        document.getElementById('kegiatanVideoPage');

    /* Tampilkan card */

    listPage.style.display = 'block';

    intro.style.display = 'block';


    /* Sembunyikan detail */

    videoPage.classList.remove('active');

    /* Scroll kembali */

    document
        .getElementById('detail-kegiatan')
        .scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });

}

</script>

    {{-- =====================================================
         DETAIL TEORI
    ====================================================== --}}
    <section
        class="materi-detail"
        id="detail-teori"
    >

        <div class="edu-container">

            <button
                type="button"
                class="back-materi"
                onclick="tutupMateri()"
            >
                <i class="bi bi-arrow-left"></i>
                Kembali ke Materi
            </button>


            <div class="section-heading">

                <small>
                    Pengetahuan
                </small>

                <h2>
                    Teori Umum
                </h2>

                <p>
                    Materi dasar yang membantu memahami komunikasi
                    profesional dan pengenalan perdagangan.
                </p>

            </div>


            <div class="teori-list">

                <div class="teori-item">

                    <div class="teori-number">
                        01
                    </div>

                    <div>

                        <h3>
                            Komunikasi Profesional
                        </h3>

                        <p>
                            Komunikasi profesional merupakan kemampuan
                            menyampaikan informasi dengan jelas, sopan,
                            dan bertanggung jawab dalam lingkungan kerja.
                        </p>

                    </div>

                </div>


                <div class="teori-item">

                    <div class="teori-number">
                        02
                    </div>

                    <div>

                        <h3>
                            Pengenalan Perdagangan
                        </h3>

                        <p>
                            Pengenalan perdagangan memberikan gambaran
                            mengenai aktivitas perdagangan dan bagaimana
                            berbagai pihak berinteraksi dalam kegiatan
                            ekonomi.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>


<script>

    /* =========================================================
       BUKA MATERI
    ========================================================= */

    function bukaMateri(id) {

        const hero =
            document.getElementById('eduHero');

        const utama =
            document.getElementById('materiUtama');

        const semuaDetail =
            document.querySelectorAll('.materi-detail');


        /* Sembunyikan HERO */

        if (hero) {
            hero.style.display = 'none';
        }


        /* Sembunyikan 3 card utama */

        utama.style.display = 'none';


        /* Sembunyikan semua detail */

        semuaDetail.forEach(function(detail) {
            detail.classList.remove('active');
        });


        /* Tampilkan detail yang dipilih */

        const target =
            document.getElementById('detail-' + id);

        if (target) {
            target.classList.add('active');
        }


        /* Scroll ke atas */

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }


    /* =========================================================
       TUTUP MATERI
    ========================================================= */

    function tutupMateri() {

        const hero =
            document.getElementById('eduHero');

        const utama =
            document.getElementById('materiUtama');

        const semuaDetail =
            document.querySelectorAll('.materi-detail');


        /* Tampilkan kembali HERO */

        if (hero) {
            hero.style.display = 'block';
        }


        /* Sembunyikan semua detail */

        semuaDetail.forEach(function(detail) {
            detail.classList.remove('active');
        });


        /* Tampilkan kembali 3 card */

        utama.style.display = 'block';


        /* Kembali ke halaman awal */

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }


    /* =========================================================
       BUKA DETAIL JURUSAN
    ========================================================= */

    function bukaJurusan(id) {

        const semuaDetail =
            document.querySelectorAll('.jurusan-detail');

        semuaDetail.forEach(function(detail) {
            detail.classList.remove('active');
        });

        const target =
            document.getElementById('detail-' + id);

        if (!target) {
            return;
        }

        target.classList.add('active');

        setTimeout(function() {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }, 50);
    }


    /* =========================================================
       TUTUP DETAIL JURUSAN
    ========================================================= */

    function tutupJurusan(id) {

        const target =
            document.getElementById('detail-' + id);

        if (target) {
            target.classList.remove('active');
        }
    }


    /* =========================================================
       SCROLL KE JURUSAN
    ========================================================= */

    function scrollKeJurusan() {

        const target =
            document.getElementById('jurusanMagang');

        if (!target) {
            return;
        }

        target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }



    /* =========================================================
       SLIDER PENGALAMAN MAGANG
    ========================================================= */

    function geserPengalaman(arah) {

        const track =
            document.getElementById('experienceTrack');

        if (!track) {
            return;
        }

        const card =
            track.querySelector('.experience-card');

        if (!card) {
            return;
        }

        const jarak =
            card.offsetWidth + 22;

        track.scrollBy({
            left: jarak * arah,
            behavior: 'smooth'
        });
    }



    /* =========================================================
   FAQ
========================================================= */

function toggleFaq(button) {

    const item =
        button.closest('.faq-item');

    if (!item) {
        return;
    }

    item.classList.toggle('open');
}


/* =========================================================
   DATA PENGALAMAN MAGANG
========================================================= */

const dataPengalamanMagang =
    @json($pengalamanMagang);


/* =========================================================
   BUKA FORM PENGALAMAN
========================================================= */

function bukaFormPengalaman() {

    const modal =
        document.getElementById(
            'experienceFormModal'
        );

    if (!modal) {

        console.error(
            'experienceFormModal tidak ditemukan.'
        );

        return;
    }

    modal.classList.add('active');

    modal.setAttribute(
        'aria-hidden',
        'false'
    );

    document.body.classList.add(
        'experience-modal-open'
    );
}


/* =========================================================
   TUTUP FORM PENGALAMAN
========================================================= */

function tutupFormPengalaman() {

    const modal =
        document.getElementById(
            'experienceFormModal'
        );

    if (!modal) {
        return;
    }

    modal.classList.remove('active');

    modal.setAttribute(
        'aria-hidden',
        'true'
    );

    document.body.classList.remove(
        'experience-modal-open'
    );
}


/* =========================================================
   BUKA DETAIL PENGALAMAN
========================================================= */

function bukaPengalaman(id) {

    const pengalaman =
        dataPengalamanMagang.find(
            function(item) {

                return Number(item.id) === Number(id);

            }
        );

    if (!pengalaman) {

        console.error(
            'Data pengalaman dengan ID ' +
            id +
            ' tidak ditemukan.'
        );

        return;
    }


    const photo =
        document.getElementById(
            'experienceDetailPhoto'
        );

    const name =
        document.getElementById(
            'experienceDetailName'
        );

    const institution =
        document.getElementById(
            'experienceDetailInstitution'
        );

    const review =
        document.getElementById(
            'experienceDetailReview'
        );


    if (photo) {

        photo.src =
            '/storage/' + pengalaman.photo;

        photo.alt =
            'Foto ' + pengalaman.name;
    }


    if (name) {

        name.textContent =
            pengalaman.name;
    }


    if (institution) {

        institution.textContent =
            pengalaman.institution;
    }


    if (review) {

        review.textContent =
            pengalaman.review;
    }


    const modal =
        document.getElementById(
            'experienceDetailModal'
        );

    if (!modal) {

        console.error(
            'experienceDetailModal tidak ditemukan.'
        );

        return;
    }


    modal.classList.add('active');

    modal.setAttribute(
        'aria-hidden',
        'false'
    );

    document.body.classList.add(
        'experience-modal-open'
    );
}


/* =========================================================
   TUTUP DETAIL PENGALAMAN
========================================================= */

function tutupPengalaman() {

    const modal =
        document.getElementById(
            'experienceDetailModal'
        );

    if (!modal) {
        return;
    }

    modal.classList.remove('active');

    modal.setAttribute(
        'aria-hidden',
        'true'
    );

    document.body.classList.remove(
        'experience-modal-open'
    );
}


/* =========================================================
   DETAIL KEGIATAN LITERASI
========================================================= */

const dataLiterasi = {

    sosialisasi: {
        label: 'SOSIALISASI SEKOLAH & KAMPUS',
        title: 'Sosialisasi ke Sekolah & Kampus',
        image: '{{ asset('images/literasi-sekolah.jpg') }}',
        description: 'Kegiatan berbagi wawasan kepada siswa dan mahasiswa melalui interaksi langsung. Materi diarahkan pada pengenalan dunia kerja, lingkungan profesional, industri, serta pengetahuan dasar perdagangan berjangka.',
        meta: [
            ['bi-mortarboard-fill', 'Sekolah & Kampus'],
            ['bi-people-fill', 'Interaksi langsung'],
            ['bi-book-half', 'Edukasi & Wawasan']
        ],
        conceptTitle: 'Belajar melalui interaksi langsung',
        concept: 'Avengers Team hadir sebagai ruang berbagi pengalaman dan pengetahuan. Peserta tidak hanya menerima materi, tetapi juga dapat mengenal gambaran dunia kerja dan berdiskusi secara langsung.',
        points: [
            'Mengenalkan dunia kerja kepada peserta.',
            'Membuka wawasan tentang lingkungan profesional.',
            'Mendorong peserta untuk aktif bertanya dan berdiskusi.'
        ],
        highlight: 'Membawa edukasi lebih dekat dengan peserta melalui komunikasi dua arah.'
    },

    industri: {
        label: 'KUNJUNGAN INDUSTRI',
        title: 'Kunjungan Industri',
        image: '{{ asset('images/kunjungan-industri.jpg') }}',
        description: 'Kegiatan kunjungan yang memberikan kesempatan kepada peserta untuk mengenal lingkungan kerja secara lebih dekat, melihat aktivitas profesional, serta mendapatkan gambaran mengenai dunia industri secara langsung.',
        meta: [
            ['bi-buildings-fill', 'Lingkungan Industri'],
            ['bi-briefcase-fill', 'Dunia Profesional'],
            ['bi-people-fill', 'Pengalaman Langsung']
        ],
        conceptTitle: 'Mengenal dunia industri dari dekat',
        concept: 'Kunjungan industri dikemas sebagai pengalaman belajar di luar ruang kelas. Peserta diajak melihat bagaimana lingkungan profesional berjalan dan memahami aktivitas yang ada di dalamnya.',
        points: [
            'Memberikan gambaran nyata tentang lingkungan industri.',
            'Mengenalkan aktivitas dan budaya kerja profesional.',
            'Menghubungkan pengetahuan dengan pengalaman langsung.'
        ],
        highlight: 'Mengubah pengalaman kunjungan menjadi pembelajaran yang lebih nyata dan mudah dipahami.'
    }
};

function bukaLiterasiDetail(jenis) {

    const data = dataLiterasi[jenis];
    const modal = document.getElementById('literasiModal');

    if (!data || !modal) {
        return;
    }

    const image = document.getElementById('literasiModalImage');
    const label = document.getElementById('literasiModalLabel');
    const imageTitle = document.getElementById('literasiModalTitleImage');
    const labelText = document.getElementById('literasiModalLabelText');
    const title = document.getElementById('literasiModalTitle');
    const description = document.getElementById('literasiModalDescription');
    const meta = document.getElementById('literasiModalMeta');
    const conceptTitle = document.getElementById('literasiModalConceptTitle');
    const concept = document.getElementById('literasiModalConcept');
    const points = document.getElementById('literasiModalPoints');
    const highlight = document.getElementById('literasiModalHighlight');
    const imageWrap = document.querySelector('.literasi-modal-image-wrap');

    if (imageWrap) {
        imageWrap.classList.remove('image-fallback');
    }

    if (image) {
        image.style.display = 'block';
        image.src = data.image;
        image.alt = data.title;
    }

    if (label) label.textContent = data.label;
    if (imageTitle) imageTitle.textContent = data.title;
    if (labelText) labelText.textContent = data.label;
    if (title) title.textContent = data.title;
    if (description) description.textContent = data.description;
    if (conceptTitle) conceptTitle.textContent = data.conceptTitle;
    if (concept) concept.textContent = data.concept;
    if (highlight) highlight.textContent = data.highlight;

    if (meta) {
        meta.innerHTML = data.meta.map(function(item) {
            return `
                <span>
                    <i class="bi ${item[0]}"></i>
                    ${item[1]}
                </span>
            `;
        }).join('');
    }

    if (points) {
        points.innerHTML = data.points.map(function(item) {
            return `
                <div>
                    <i class="bi bi-check2"></i>
                    <span>${item}</span>
                </div>
            `;
        }).join('');
    }

    modal.classList.add('active');
    modal.setAttribute('aria-hidden', 'false');
    document.body.classList.add('literasi-modal-open');
}

function tutupLiterasiModal() {

    const modal = document.getElementById('literasiModal');

    if (!modal) {
        return;
    }

    modal.classList.remove('active');
    modal.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('literasi-modal-open');
}


/* =========================================================
   TUTUP MODAL DENGAN ESCAPE
========================================================= */

document.addEventListener(
    'keydown',
    function(event) {

        if (event.key !== 'Escape') {
            return;
        }

        tutupFormPengalaman();

        tutupPengalaman();
        tutupLiterasiModal();
    }
);

</script>



@endsection