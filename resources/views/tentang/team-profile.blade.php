@extends('layouts.app')

@section('content')
    <div class="avengers-team-page">


        @php
            $members = [
                [
                    'name' => 'Christin Octavia',
                    'position' => 'Avengers Team Lead',
                    'image' => 'images/A1.jpeg',
                    'description' => '
                    Perjalanan Christin Octavia di dunia jasa keuangan dimulai pada tahun 2014.
                    Mengawali karier sebagai seorang konsultan, Christin harus melewati berbagai tantangan sejak awal
                    perjalanan profesionalnya. Saat itu, ia memulai semuanya seorang diri tanpa sebuah tim yang mendukung
                    di belakangnya.

                    <br><br>

                    Perjalanan tersebut tidak selalu mudah. Berbagai kesulitan dan tantangan harus dihadapi, termasuk
                    perjuangan dalam membangun kepercayaan serta memperkenalkan dunia pialang kepada masyarakat.
                    Namun, keadaan tersebut justru menjadi bagian penting yang membentuk ketekunan dan mentalitas
                    Christin dalam bekerja.

                    <br><br>

                    Setelah tiga tahun berproses, tepatnya pada tahun 2017, Christin dipercaya untuk mengemban tanggung
                    jawab sebagai Manager. Dari perjalanan panjang tersebut, muncul keinginan untuk membangun sebuah tim
                    yang tidak hanya berorientasi pada pencapaian, tetapi juga memiliki semangat untuk tumbuh dan saling
                    membantu.

                    <br><br>

                    Dari sinilah langkah awal terbentuknya perjalanan Avengers dimulai.
                ',
                ],

                [
                    'name' => 'Dian Sri Rahmawati',
                    'position' => 'Member Team',
                    'image' => 'images/A2.jpeg',
                    'description' => '
                    Dian Sri Rahmawati menjadi salah satu sosok penting dalam perjalanan awal Christin Octavia.
                    Bergabung sebagai konsultan, Dian menjadi teman pertama yang berjalan bersama Christin dalam
                    menghadapi berbagai tantangan di dunia pialang.

                    <br><br>

                    Pada masa tersebut, Avengers belum terbentuk sebagai sebuah tim. Keduanya hanya berjuang bersama,
                    melewati berbagai situasi dan tantangan tanpa mengetahui bahwa perjalanan tersebut nantinya akan
                    menjadi awal dari terbentuknya sebuah tim.

                    <br><br>

                    Dian membuktikan bahwa perjalanan dalam dunia jasa keuangan membutuhkan kesabaran, keberanian, dan
                    kemauan untuk terus berkembang. Pengalaman yang dilalui bersama menjadi salah satu fondasi yang
                    memperkuat hubungan dan semangat kebersamaan di dalam tim.

                    <br><br>

                    Kini, Dian Sri Rahmawati juga telah dipercaya mengemban posisi sebagai Manager. Perjalanannya
                    menjadi bukti bahwa proses yang dimulai dari langkah kecil dapat berkembang menjadi sebuah
                    pencapaian yang lebih besar.
                ',
                ],

                [
                    'name' => 'Dhiana Rizky Wulandari',
                    'position' => 'Member Team',
                    'image' => 'images/A3.jpeg',
                    'description' => '
                    Perjalanan Dhiana Rizky Wulandari menjadi bagian dari Avengers juga tidak terlepas dari berbagai
                    tantangan. Bergabung sebagai anggota baru, Dhiana pernah berada dalam masa yang cukup sulit dalam
                    perjalanan kariernya.

                    <br><br>

                    Bagi Dhiana, perjalanan tersebut bukan alasan untuk berhenti. Dengan terus belajar, berusaha, dan
                    menghadapi setiap tantangan, ia mampu melewati masa sulit tersebut dan berkembang dalam kariernya.

                    <br><br>

                    Kini, Dhiana Rizky Wulandari juga telah mencapai posisi sebagai Manager. Perjalanannya menjadi
                    gambaran bahwa keberhasilan tidak selalu datang dengan cepat, tetapi dapat dibangun melalui
                    ketekunan dan keberanian untuk terus melangkah.
                ',
                ],

                [
                    'name' => 'Yustinus Mahendra Dwi Putra',
                    'position' => 'Member Team',
                    'image' => 'images/A4.jpeg',
                    'description' => '
                    Yustinus Mahendra bergabung sebagai konsultan pada tahun 2024 dan menjadi anggota keempat dalam
                    perjalanan Avengers setelah fondasi tim dibangun oleh tiga anggota sebelumnya.

                    <br><br>

                    Kehadiran Yustinus membawa warna baru dalam perjalanan tim. Tidak hanya berkembang sebagai seorang
                    konsultan, ia juga mulai mengambil peran dalam membantu membimbing anggota baru yang berada di bawah
                    naungannya.

                    <br><br>

                    Salah satu anggota yang kemudian dibimbing oleh Yustinus adalah Compasion. Hubungan senior dan junior
                    tersebut menjadi bagian dari proses regenerasi di dalam tim, di mana pengalaman dan pengetahuan
                    terus diteruskan kepada anggota berikutnya.

                    <br><br>

                    Perjalanan Yustinus menunjukkan bahwa menjadi bagian dari sebuah tim bukan hanya tentang berkembang
                    untuk diri sendiri, tetapi juga tentang bagaimana seseorang dapat membantu orang lain untuk tumbuh
                    bersama.
                ',
                ],

                [
                    'name' => 'Anita Yuliatin',
                    'position' => 'Member Team',
                    'image' => 'images/A5.jpeg',
                    'description' => '
                    Anita bergabung sebagai konsultan pada tahun 2024 dan menjadi salah satu bagian dari proses
                    perkembangan Avengers.

                    <br><br>

                    Dalam perjalanannya, Anita berada di bawah bimbingan Dhiana Rizky Wulandari sebagai anggota binaan
                    atau di bawah naungannya. Dari proses tersebut, Anita mendapatkan kesempatan untuk belajar dan
                    berkembang dengan mendapatkan arahan serta pengalaman dari anggota yang lebih dahulu menjalani
                    perjalanan di dunia pialang.

                    <br><br>

                    Keberadaan Anita menjadi bagian dari semangat regenerasi Avengers, di mana setiap anggota tidak
                    hanya memiliki kesempatan untuk berkembang secara individu, tetapi juga mendapatkan dukungan dari
                    anggota lainnya.

                    <br><br>

                    Perjalanannya menjadi gambaran bahwa sebuah tim dapat tumbuh ketika pengalaman, pengetahuan, dan
                    semangat untuk belajar terus diwariskan dari satu generasi anggota kepada anggota berikutnya.
                ',
                ],

                [
                    'name' => 'Compasion Abraham',
                    'position' => 'Member Team',
                    'image' => 'images/A6.jpeg',
                    'description' => '
                    Compasion merupakan salah satu anggota termuda dalam perjalanan Avengers. Ia bergabung sebagai konsultan
                    pada tahun 2026 dan berada di bawah bimbingan Yustinus Mahendra sebagai senior sekaligus mentor
                    dalam perjalanan awalnya di dunia pialang.

                    <br><br>

                    Sebagai anggota yang baru memulai perjalanan, Compasion memiliki kesempatan untuk belajar dari pengalaman
                    anggota-anggota yang telah lebih dahulu melewati berbagai tantangan di dunia jasa keuangan.

                    <br><br>

                    Kehadiran Compasion menjadi bagian dari perjalanan regenerasi Avengers. Dari pengalaman para senior, ia
                    diharapkan dapat membangun fondasi yang kuat, mengembangkan kemampuan, serta menemukan karakter dan
                    potensinya sendiri sebagai seorang konsultan.

                    <br><br>

                    Perjalanan Compasion masih berada di tahap awal, namun justru dari sinilah sebuah perjalanan baru
                    dimulai.
                ',
                ],
            ];

            $youtubeLink = 'https://youtu.be/84boVMbwbVI?si=FPCscD69hqPOqthc';
        @endphp


        {{-- ============================================================
         SECTION 01 — SEJARAH BERDIRINYA TEAM
         ============================================================ --}}

        <section class="team-history">

            <div class="team-section-title">
                <h2>Avengers Team</h2>
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
                        The Spirit Behind Avengers
                    </span>

                    <div class="history-divider"></div>

                    <p>
                        Avengers lahir dari perjalanan yang tidak selalu mudah. Tim ini dibangun dari orang-orang dengan
                        karakter, pengalaman, dan perjalanan yang berbeda, namun memiliki satu semangat yang sama:
                        <strong>saling membantu dan tumbuh bersama</strong>.

                        <br><br>

                        Nama Avengers bukan sekadar sebuah nama tim. Di dalamnya terdapat semangat untuk hadir bagi satu
                        sama lain, terutama dalam memberikan edukasi dan pendampingan kepada nasabah.

                        <br><br>

                        Perjalanan tim ini dimulai dari perjuangan yang sederhana, berkembang melalui berbagai tantangan,
                        hingga akhirnya menjadi sebuah tim yang terus mengalami regenerasi. Setiap anggota membawa cerita
                        dan pengalaman masing-masing, tetapi semuanya menjadi bagian dari satu perjalanan yang sama.

                        <br><br>

                        <strong>Berbeda karakter, satu tujuan.</strong><br>
                        <strong>Berbeda perjalanan, tetap saling menguatkan.</strong>

                        <br><br>

                        Itulah semangat yang menjadi dasar perjalanan Avengers.
                    </p>

                </div>

            </div>

        </section>


        {{-- ============================================================
         SECTION 02 — VIDEO
         ============================================================ --}}


        <section class="team-video">
            <div class="team-section-title">
                <h2>About Avengers Team</h2>
            </div>

            <div class="video-box">
                <video controls preload="metadata" playsinline>
                    <source src="{{ asset('videos/avengers-team.mp4') }}" type="video/mp4">

                    Browser Anda tidak mendukung pemutaran video.
                </video>
            </div>
        </section>




        {{-- ============================================================
         SECTION 03 — ANGGOTA AVENGERS TEAM
         ============================================================ --}}

        <section class="team-members">

            <div class="team-section-title">
                <h2>Anggota Avengers Team</h2>
            </div>


            <div class="member-list">

                @foreach ($members as $index => $member)
                    <article class="member-item">

                        <div class="member-photo">
                            <img src="{{ asset($member['image']) }}" alt="{{ $member['name'] }}">
                        </div>


                        <div class="member-info">

                            <h3>
                                {{ $member['name'] }}
                            </h3>

                            <span class="member-position">
                                {{ $member['position'] }}
                            </span>

                            {{-- 
                            Teks card otomatis mengambil dari narasi
                            yang sama dengan popup.
                        --}}
                            <p>
                                {{ \Illuminate\Support\Str::limit(strip_tags($member['description']), 180, '...') }}
                            </p>

                        </div>


                        <button type="button" class="member-detail-btn"
                            onclick="openMemberModal('memberModal{{ $index }}')">
                            Baca Selengkapnya
                            <i class="bi bi-arrow-right"></i>
                        </button>

                    </article>
                @endforeach

            </div>

        </section>


        {{-- ============================================================
         MODAL / POPUP ANGGOTA
         ============================================================ --}}

        @foreach ($members as $index => $member)
            <div id="memberModal{{ $index }}" class="member-modal" aria-hidden="true">

                <div class="member-modal-content">

                    <button type="button" class="member-modal-close"
                        onclick="closeMemberModal('memberModal{{ $index }}')" aria-label="Tutup">
                        <i class="bi bi-x-lg"></i>
                    </button>


                    <div class="modal-photo">

                        <img src="{{ asset($member['image']) }}" alt="{{ $member['name'] }}">

                    </div>


                    <div class="modal-info">

                        <h2>
                            {{ $member['name'] }}
                        </h2>

                        <span class="modal-position">
                            {{ $member['position'] }}
                        </span>

                        <div class="modal-divider"></div>

                        <div class="modal-description">
                            {!! $member['description'] !!}
                        </div>

                    </div>

                </div>

            </div>
        @endforeach


        {{-- ============================================================
         JAVASCRIPT MODAL
         ============================================================ --}}

        <script>
            function openMemberModal(modalId) {
                const modal = document.getElementById(modalId);

                if (!modal) {
                    return;
                }

                modal.classList.add('active');
                modal.setAttribute('aria-hidden', 'false');

                document.body.classList.add('modal-open');
            }


            function closeMemberModal(modalId) {
                const modal = document.getElementById(modalId);

                if (!modal) {
                    return;
                }

                modal.classList.remove('active');
                modal.setAttribute('aria-hidden', 'true');

                /*
                 * Hanya menghilangkan modal-open jika
                 * tidak ada popup lain yang sedang aktif.
                 */
                if (!document.querySelector('.member-modal.active')) {
                    document.body.classList.remove('modal-open');
                }
            }


            /*
             * Klik area gelap di luar popup untuk menutup.
             */
            document.querySelectorAll('.member-modal').forEach(function(modal) {

                modal.addEventListener('click', function(event) {

                    if (event.target === modal) {
                        closeMemberModal(modal.id);
                    }

                });

            });


            /*
             * Tombol ESC untuk menutup popup yang sedang aktif.
             */
            document.addEventListener('keydown', function(event) {

                if (event.key !== 'Escape') {
                    return;
                }

                document.querySelectorAll('.member-modal.active').forEach(function(modal) {
                    closeMemberModal(modal.id);
                });

            });
        </script>

    </div>
@endsection
