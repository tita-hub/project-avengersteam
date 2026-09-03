@extends('layouts.app')

@section('content')
    <div class="avengers-team-page">

        {{-- ============================================================
         SECTION 01 — SEJARAH BERDIRINYA TEAM
         ============================================================ --}}

        <section class="team-history">

            <div class="team-section-title">
                <div>
                    <h2>Avangers Team</h2>
                </div>

            </div>


            <div class="history-box">

                {{-- FOTO --}}
                <div class="history-photo">

                    <img src="{{ asset('images/12.png') }}" alt="Sejarah Avengers Team">

                </div>


                {{-- NARASI --}}
                <div class="history-content">

                    <div class="history-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <span class="history-label">
                        THE BEGINNING
                    </span>

                    <h3>
                        Awal Perjalanan Avengers Team
                    </h3>

                    <div class="history-divider"></div>

                    <p>
                        Team Avengers dibuat oleh Ci Christin Octavia
                        atas perintah Ibu Mia Amalia Maleppe.

                        Pada awalnya team ini hanya terdiri dari satu orang.
                        Seiring berjalannya waktu, kebutuhan dan perkembangan
                        team membuat beberapa anggota baru bergabung.

                        Hingga akhirnya Avengers Team berkembang menjadi
                        sebuah team yang terdiri dari enam orang dengan
                        karakteristik, kemampuan, dan peran yang berbeda-beda.
                    </p>

                </div>

            </div>

        </section>


        {{-- ============================================================
         SECTION 02 — VIDEO
         ============================================================ --}}

        @php
            $youtubeLink = 'https://youtu.be/84boVMbwbVI?si=FPCscD69hqPOqthc';
        @endphp


        <section class="team-video">

            <div class="team-section-title">
                <div>
                    <h2>About Avengers Team</h2>
                </div>

            </div>


            <div class="video-box">

                <iframe src="{{ str_replace('watch?v=', 'embed/', $youtubeLink) }}" title="OUR TEAM || AVENGERS TEAM"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>

            </div>

        </section>

        {{-- ============================================================
     SECTION 03 — ANGGOTA AVENGERS TEAM
     ============================================================ --}}

        <section class="team-members">

            <div class="team-section-title">
                <div>
                    <h2>Anggota Avengers Team</h2>
                </div>

            </div>


            {{-- ========================================================
         MEMBER 01
         ======================================================== --}}

            <div class="member-list">

                <div class="member-item">

                    <div class="member-photo">
                        <img src="{{ asset('images/member1.jpg') }}" alt="Anggota Avengers Team">
                    </div>


                    <div class="member-info">

                        <span class="member-number">
                            01
                        </span>

                        <h3>
                            Christin Octavia
                        </h3>

                        <span class="member-position">
                            Jabatan / Posisi
                        </span>

                        <p>
                            Teks singkat mengenai anggota ini dan
                            perannya di dalam Avengers Team.
                        </p>

                    </div>


                    <button type="button" class="member-detail-btn" onclick="openMemberModal('memberModal1')">
                        Baca Selengkapnya
                        <i class="bi bi-arrow-right"></i>
                    </button>

                </div>


                {{-- ====================================================
             MEMBER 02
             ==================================================== --}}

                <div class="member-item">

                    <div class="member-photo">
                        <img src="{{ asset('images/member2.jpg') }}" alt="Anggota Avengers Team">
                    </div>


                    <div class="member-info">

                        <span class="member-number">
                            02
                        </span>

                        <h3>
                            Dian Sri Rahmawati
                        </h3>

                        <span class="member-position">
                            Jabatan / Posisi
                        </span>

                        <p>
                            Teks singkat mengenai anggota ini dan
                            perannya di dalam Avengers Team.
                        </p>

                    </div>


                    <button type="button" class="member-detail-btn" onclick="openMemberModal('memberModal2')">
                        Baca Selengkapnya
                        <i class="bi bi-arrow-right"></i>
                    </button>

                </div>


                {{-- ====================================================
             MEMBER 03
             ==================================================== --}}

                <div class="member-item">

                    <div class="member-photo">
                        <img src="{{ asset('images/member3.jpg') }}" alt="Anggota Avengers Team">
                    </div>


                    <div class="member-info">

                        <span class="member-number">
                            03
                        </span>

                        <h3>
                            Dhiana Rizky Wulandari
                        </h3>

                        <span class="member-position">
                            Jabatan / Posisi
                        </span>

                        <p>
                            Teks singkat mengenai anggota ini dan
                            perannya di dalam Avengers Team.
                        </p>

                    </div>


                    <button type="button" class="member-detail-btn" onclick="openMemberModal('memberModal3')">
                        Baca Selengkapnya
                        <i class="bi bi-arrow-right"></i>
                    </button>

                </div>


                {{-- ====================================================
             MEMBER 04
             ==================================================== --}}

                <div class="member-item">

                    <div class="member-photo">
                        <img src="{{ asset('images/member4.jpg') }}" alt="Anggota Avengers Team">
                    </div>


                    <div class="member-info">

                        <span class="member-number">
                            04
                        </span>

                        <h3>
                            Yustinus Mahendra Dwi Putra
                        </h3>

                        <span class="member-position">
                            Jabatan / Posisi
                        </span>

                        <p>
                            Teks singkat mengenai anggota ini dan
                            perannya di dalam Avengers Team.
                        </p>

                    </div>


                    <button type="button" class="member-detail-btn" onclick="openMemberModal('memberModal4')">
                        Baca Selengkapnya
                        <i class="bi bi-arrow-right"></i>
                    </button>

                </div>


                {{-- ====================================================
             MEMBER 05
             ==================================================== --}}

                <div class="member-item">

                    <div class="member-photo">
                        <img src="{{ asset('images/member5.jpg') }}" alt="Anggota Avengers Team">
                    </div>


                    <div class="member-info">

                        <span class="member-number">
                            05
                        </span>

                        <h3>
                            Anita Yuliatin
                        </h3>

                        <span class="member-position">
                            Jabatan / Posisi
                        </span>

                        <p>
                            Teks singkat mengenai anggota ini dan
                            perannya di dalam Avengers Team.
                        </p>

                    </div>


                    <button type="button" class="member-detail-btn" onclick="openMemberModal('memberModal5')">
                        Baca Selengkapnya
                        <i class="bi bi-arrow-right"></i>
                    </button>

                </div>


                {{-- ====================================================
             MEMBER 06
             ==================================================== --}}

                <div class="member-item">

                    <div class="member-photo">
                        <img src="{{ asset('images/member6.jpg') }}" alt="Anggota Avengers Team">
                    </div>


                    <div class="member-info">

                        <span class="member-number">
                            06
                        </span>

                        <h3>
                            ⁠Compasion Abraham
                        </h3>

                        <span class="member-position">
                            Jabatan / Posisi
                        </span>

                        <p>
                            Teks singkat mengenai anggota ini dan
                            perannya di dalam Avengers Team.
                        </p>

                    </div>


                    <button type="button" class="member-detail-btn" onclick="openMemberModal('memberModal6')">
                        Baca Selengkapnya
                        <i class="bi bi-arrow-right"></i>
                    </button>

                </div>

            </div>

        </section>



        {{-- ============================================================
     MODAL MEMBER 01
     ============================================================ --}}

        <div id="memberModal1" class="member-modal">

            <div class="member-modal-content">

                <button type="button" class="member-modal-close" onclick="closeMemberModal('memberModal1')">
                    <i class="bi bi-x-lg"></i>
                </button>

                <div class="modal-photo">

                    <img src="{{ asset('images/member1.jpg') }}" alt="Nama Anggota 1">

                </div>

                <div class="modal-info">

                    <span class="modal-number">
                        ANGGOTA 01
                    </span>

                    <h2>
                        Nama Anggota 1
                    </h2>

                    <span class="modal-position">
                        Jabatan / Posisi
                    </span>

                    <div class="modal-divider"></div>

                    <p>
                        Tuliskan penjelasan lengkap mengenai anggota ini.
                        Bagian ini dapat berisi pengalaman, tanggung jawab,
                        keahlian, perjalanan di Avengers Team, maupun
                        informasi lain yang ingin ditampilkan.
                    </p>

                </div>

            </div>

        </div>



        {{-- ============================================================
     MODAL MEMBER 02
     ============================================================ --}}

        <div id="memberModal2" class="member-modal">

            <div class="member-modal-content">

                <button type="button" class="member-modal-close" onclick="closeMemberModal('memberModal2')">
                    <i class="bi bi-x-lg"></i>
                </button>

                <div class="modal-photo">
                    <img src="{{ asset('images/member2.jpg') }}" alt="Nama Anggota 2">
                </div>

                <div class="modal-info">

                    <span class="modal-number">
                        ANGGOTA 02
                    </span>

                    <h2>
                        Nama Anggota 2
                    </h2>

                    <span class="modal-position">
                        Jabatan / Posisi
                    </span>

                    <div class="modal-divider"></div>

                    <p>
                        Tuliskan penjelasan lengkap mengenai anggota ini.
                    </p>

                </div>

            </div>

        </div>



        {{-- ============================================================
     MODAL MEMBER 03
     ============================================================ --}}

        <div id="memberModal3" class="member-modal">

            <div class="member-modal-content">

                <button type="button" class="member-modal-close" onclick="closeMemberModal('memberModal3')">
                    <i class="bi bi-x-lg"></i>
                </button>

                <div class="modal-photo">
                    <img src="{{ asset('images/member3.jpg') }}" alt="Nama Anggota 3">
                </div>

                <div class="modal-info">

                    <span class="modal-number">
                        ANGGOTA 03
                    </span>

                    <h2>
                        Nama Anggota 3
                    </h2>

                    <span class="modal-position">
                        Jabatan / Posisi
                    </span>

                    <div class="modal-divider"></div>

                    <p>
                        Tuliskan penjelasan lengkap mengenai anggota ini.
                    </p>

                </div>

            </div>

        </div>



        {{-- ============================================================
     MODAL MEMBER 04
     ============================================================ --}}

        <div id="memberModal4" class="member-modal">

            <div class="member-modal-content">

                <button type="button" class="member-modal-close" onclick="closeMemberModal('memberModal4')">
                    <i class="bi bi-x-lg"></i>
                </button>

                <div class="modal-photo">
                    <img src="{{ asset('images/member4.jpg') }}" alt="Nama Anggota 4">
                </div>

                <div class="modal-info">

                    <span class="modal-number">
                        ANGGOTA 04
                    </span>

                    <h2>
                        Nama Anggota 4
                    </h2>

                    <span class="modal-position">
                        Jabatan / Posisi
                    </span>

                    <div class="modal-divider"></div>

                    <p>
                        Tuliskan penjelasan lengkap mengenai anggota ini.
                    </p>

                </div>

            </div>

        </div>



        {{-- ============================================================
     MODAL MEMBER 05
     ============================================================ --}}

        <div id="memberModal5" class="member-modal">

            <div class="member-modal-content">

                <button type="button" class="member-modal-close" onclick="closeMemberModal('memberModal5')">
                    <i class="bi bi-x-lg"></i>
                </button>

                <div class="modal-photo">
                    <img src="{{ asset('images/member5.jpg') }}" alt="Nama Anggota 5">
                </div>

                <div class="modal-info">

                    <span class="modal-number">
                        ANGGOTA 05
                    </span>

                    <h2>
                        Nama Anggota 5
                    </h2>

                    <span class="modal-position">
                        Jabatan / Posisi
                    </span>

                    <div class="modal-divider"></div>

                    <p>
                        Tuliskan penjelasan lengkap mengenai anggota ini.
                    </p>

                </div>

            </div>

        </div>



        {{-- ============================================================
     MODAL MEMBER 06
     ============================================================ --}}

        <div id="memberModal6" class="member-modal">

            <div class="member-modal-content">

                <button type="button" class="member-modal-close" onclick="closeMemberModal('memberModal6')">
                    <i class="bi bi-x-lg"></i>
                </button>

                <div class="modal-photo">
                    <img src="{{ asset('images/member6.jpg') }}" alt="Nama Anggota 6">
                </div>

                <div class="modal-info">

                    <span class="modal-number">
                        ANGGOTA 06
                    </span>

                    <h2>
                        Nama Anggota 6
                    </h2>

                    <span class="modal-position">
                        Jabatan / Posisi
                    </span>

                    <div class="modal-divider"></div>

                    <p>
                        Tuliskan penjelasan lengkap mengenai anggota ini.
                    </p>

                </div>

            </div>

        </div>



        {{-- ============================================================
     JAVASCRIPT MODAL
     ============================================================ --}}

        <script>
            function openMemberModal(modalId) {

                const modal = document.getElementById(modalId);

                if (modal) {
                    modal.classList.add('active');
                    document.body.classList.add('modal-open');
                }

            }


            function closeMemberModal(modalId) {

                const modal = document.getElementById(modalId);

                if (modal) {
                    modal.classList.remove('active');
                    document.body.classList.remove('modal-open');
                }

            }


            /* Klik area luar popup untuk menutup */

            document.querySelectorAll('.member-modal').forEach(function(modal) {

                modal.addEventListener('click', function(event) {

                    if (event.target === modal) {

                        modal.classList.remove('active');
                        document.body.classList.remove('modal-open');

                    }

                });

            });


            /* Tombol ESC untuk menutup popup */

            document.addEventListener('keydown', function(event) {

                if (event.key === 'Escape') {

                    document.querySelectorAll('.member-modal.active')
                        .forEach(function(modal) {

                            modal.classList.remove('active');

                        });

                    document.body.classList.remove('modal-open');

                }

            });
        </script>

    </div>
@endsection
