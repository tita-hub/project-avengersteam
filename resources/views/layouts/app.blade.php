<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        {{ $title ?? 'Avengersteam Dashboard' }}
    </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>


<body class="app-body">


    <!-- =====================================================
         APP SHELL
    ====================================================== -->

    <div class="app-shell">


        <!-- =================================================
             TOP HEADER
        ================================================== -->

        <header class="top-header">


            <!-- =============================================
                 TOMBOL MENU
                 Hanya muncul ketika sidebar tertutup
            ============================================== -->

            <button type="button"
                id="sidebarOpen"
                class="top-menu-btn"
                aria-label="Buka menu">

                <i class="bi bi-list"></i>

            </button>


            <!-- =============================================
                 LOGO AVENGERSTEAM
                 Tidak memiliki fungsi / tidak bisa diklik
                 Diposisikan di tengah header
            ============================================== -->

            <div class="top-logo"
                style="
                    position: absolute;
                    left: 50%;
                    top: 50%;
                    transform: translate(-50%, -50%);
                    margin-left: 0;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                ">

                <img src="{{ asset('images/avengersteam-header.png') }}"
                    alt="Avengersteam"
                    style="
                        width: 150px;
                        height: 80px;
                        object-fit: contain;
                        display: block;
                    ">

            </div>

            <!-- =====================================================
            FLOATING WHATSAPP
            ====================================================== -->

            <a href="https://wa.me/085128040216"
                class="floating-whatsapp"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Hubungi melalui WhatsApp">

                <i class="bi bi-whatsapp"></i>

            </a>


        </header>



        <!-- =================================================
             SIDEBAR
        ================================================== -->

        <aside class="sidebar">


            <!-- =============================================
                 TOMBOL CLOSE
                 Tetap ada ketika sidebar terbuka
            ============================================== -->

            <button type="button"
                id="sidebarClose"
                class="sidebar-close-btn"
                aria-label="Tutup menu">

                <i class="bi bi-x-lg"></i>

            </button>



            <!-- =============================================
                 MENU SIDEBAR
            ============================================== -->

            <nav class="sidebar-nav">


                <!-- =========================================
                     DASHBOARD
                ========================================== -->

                <a href="{{ route('dashboard') }}"
                    id="dashboardBtn"
                    class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">

                    Dashboard

                </a>



                <!-- =========================================
                     TENTANG KAMI
                ========================================== -->

                <div id="tentangKamiContainer"
                    class="sidebar-dropdown-container">


                    <button type="button"
                        id="tentangKamiBtn"
                        class="{{ request()->routeIs('profile.perusahaan', 'team.profile', 'wakil.pialang') ? 'active' : '' }}">

                        <span>
                            Tentang Kami
                        </span>

                        <span id="tentangKamiArrow"
                            class="bi bi-chevron-right dropdown-arrow">
                        </span>

                    </button>



                    <!-- DROPDOWN TENTANG KAMI -->

                    <div id="submenuTentang"
                        class="sidebar-submenu">


                        <a href="{{ route('profile.perusahaan') }}"
                            class="tentang-submenu-item">

                            Profile Perusahaan

                        </a>


                        <a href="{{ route('team.profile') }}"
                            class="tentang-submenu-item">

                            Avengers Team Profile

                        </a>


                        <a href="{{ route('wakil.pialang') }}"
                            class="tentang-submenu-item">

                            Wakil Pialang Avengers

                        </a>


                    </div>

                </div>



                <!-- =========================================
                     PRODUK
                ========================================== -->

                <a href="{{ route('produk.index') }}"
                    class="nav-item {{ request()->routeIs('produk.index') ? 'active' : '' }}">

                    Produk

                </a>



                <!-- =========================================
                     PROSEDUR
                ========================================== -->

                <div id="prosedurContainer"
                    class="sidebar-dropdown-container">


                    <button type="button"
                        id="prosedurBtn"
                        class="{{ request()->routeIs('prosedur.*') ? 'active' : '' }}">

                        <span>
                            Prosedur
                        </span>

                        <span id="prosedurArrow"
                            class="bi bi-chevron-right dropdown-arrow">
                        </span>

                    </button>



                    <!-- DROPDOWN PROSEDUR -->

                    <div id="submenuProsedur"
                        class="sidebar-submenu">


                        <a href="{{ route('prosedur.pembukaan') }}"
                            class="prosedur-submenu-item">

                            Pembukaan Rekening

                        </a>


                        <a href="{{ route('prosedur.penarikan') }}"
                            class="prosedur-submenu-item">

                            Penarikan

                        </a>


                        <a href="{{ route('prosedur.petunjuk') }}"
                            class="prosedur-submenu-item">

                            Petunjuk Transaksi

                        </a>


                    </div>

                </div>



                <!-- =========================================
                     EDUKASI
                ========================================== -->

                <div id="edukasiContainer"
                    class="sidebar-dropdown-container">


                    <button type="button"
                        id="edukasiBtn"
                        class="{{ request()->routeIs('edukasi.*') ? 'active' : '' }}">

                        <span>
                            Edukasi
                        </span>

                        <span id="edukasiArrow"
                            class="bi bi-chevron-right dropdown-arrow">
                        </span>

                    </button>



                    <!-- DROPDOWN EDUKASI -->

                    <div id="submenuEdukasi"
                        class="sidebar-submenu">


                        <a href="{{ route('edukasi.nasabah') }}"
                            class="edukasi-submenu-item">

                            Edukasi Nasabah

                        </a>


                        <a href="{{ route('edukasi.konsultan') }}"
                            class="edukasi-submenu-item">

                            Edukasi Konsultan

                        </a>


                        <a href="{{ route('edukasi.umum') }}"
                            class="edukasi-submenu-item">

                            Edukasi Umum

                        </a>


                    </div>

                </div>



                <!-- =========================================
                     MENU LAINNYA
                ========================================== -->

                <a href="#" class="nav-item">
                    WhatsApp
                </a>


                <a href="#" class="nav-item">
                    List
                </a>


                <a href="#" class="nav-item">
                    Broadcast
                </a>


                <a href="#" class="nav-item">
                    Templates
                </a>


                <a href="#" class="nav-item">
                    Input appointment
                </a>


                <a href="#" class="nav-item">
                    Daily Leads
                </a>


                <a href="#" class="nav-item">
                    Business Profile
                </a>


                <a href="#" class="nav-item">
                    Auto Follow Up
                </a>


                <a href="#" class="nav-item">
                    Smart Bot Action
                </a>


                <a href="#" class="nav-item">
                    Text Replies
                </a>


            </nav>



            <!-- =============================================
                 LOGOUT
            ============================================== -->

            <form method="POST"
                action="{{ route('logout') }}"
                class="logout-form">

                @csrf

                <button type="submit"
                    class="logout-btn">

                    Keluar

                </button>

            </form>


        </aside>



        <!-- =================================================
             MAIN CONTENT
        ================================================== -->

        <main class="main-content">


            @if (session('success'))

                <div class="alert-success">

                    {{ session('success') }}

                </div>

            @endif


            @yield('content')


        </main>


    </div>


    <!-- =====================================================
         FOOTER
    ====================================================== -->

    <footer class="site-footer">

        <div class="footer-container">


            <!-- =================================================
                 PERHATIAN
            ================================================== -->

            <div class="footer-warning">

                <div class="footer-warning-line"></div>

                <h3>
                    PERHATIAN!
                </h3>

                <p>
                    Manajemen PT Rifan Financindo Berjangka (PT RFB)
                    menghimbau seluruh masyarakat untuk selalu waspada
                    terhadap upaya penipuan berkedok investasi yang
                    mengatasnamakan PT RFB melalui media elektronik
                    maupun media sosial. Pastikan setiap proses transfer
                    dana untuk transaksi Perdagangan Berjangka dilakukan
                    hanya ke rekening Segregated Account atas nama
                    PT Rifan Financindo Berjangka, bukan ke rekening
                    pribadi siapa pun.
                </p>

            </div>



            <!-- =================================================
                 TAUTAN CEPAT
            ================================================== -->

            <div class="footer-links">

                <h3>
                    TAUTAN CEPAT
                </h3>


                <a href="#"
                    target="_blank"
                    rel="noopener noreferrer">

                    <i class="bi bi-chevron-right"></i>

                    <span>Beranda</span>

                </a>


                <a href="https://www.rf-berjangka.com/produk/jfx"
                    target="_blank"
                    rel="noopener noreferrer">

                    <i class="bi bi-chevron-right"></i>

                    <span>Produk JFX</span>

                </a>


                <a href="https://www.rf-berjangka.com/produk/spa"
                    target="_blank"
                    rel="noopener noreferrer">

                    <i class="bi bi-chevron-right"></i>

                    <span>Produk SPA</span>

                </a>


                <a href="#"
                    target="_blank"
                    rel="noopener noreferrer">

                    <i class="bi bi-chevron-right"></i>

                    <span>Kontak</span>

                </a>


                <!-- TAMBAHAN BARU -->

                <a href="https://www.rf-berjangkasemarang.com/"
                    target="_blank"
                    rel="noopener noreferrer">

                    <i class="bi bi-chevron-right"></i>

                    <span>Appointment</span>

                </a>


                <a href="https://performance-rfbsmg.com/"
                    target="_blank"
                    rel="noopener noreferrer">

                    <i class="bi bi-chevron-right"></i>

                    <span>Performance</span>

                </a>

            </div>



            <!-- =================================================
                 INFORMASI PERUSAHAAN
            ================================================== -->

            <div class="footer-company">

                <h3>
                    PT RIFAN FINANCINDO BERJANGKA SEMARANG
                </h3>


                <p>
                    Corner, Ruko Jl. Letnan Jenderal S. Parman 
                    No.47A Unit 5-6, Gajahmungkur, 
                    Kec. Gajahmungkur, Kota Semarang, 
                    Jawa Tengah 50231
                </p>


                <p>
                    <strong>Email:</strong>
                    compliance.smg@rifan-financindo-berjangka.co.id
                </p>


                <p>
                    <strong>Telepon:</strong>
                    (024) 8508868
                </p>


                <p>
                    <strong>Fax (Ruko S.Parman):</strong>
                    (024) 850 8869
                </p>


                <p>
                    <strong>Layanan pengaduan:</strong>
                    compliance.smg@rifan-financindo-berjangka.co.id
                </p>


                <!-- =================================================
                     LOGO KOMDIGI
                     LOGO INI BISA DIKLIK
                ================================================== -->

                <div class="footer-logos">


                    <!-- LOGO KOMDIGI -->

                    <a href="#"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="footer-logo-komdigi"
                        aria-label="Website Komdigi">

                        <img src="{{ asset('images/logo-komdigi.png') }}"
                            alt="Komdigi">

                    </a>


                    <!-- LOGO TSI / KAN -->

                    <a href="https://tsicertification.com/"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="footer-logo-kan"
                        aria-label="Website TSI KAN">

                        <img src="{{ asset('images/logo-tsi-kan.png') }}"
                            alt="TSI KAN">

                    </a>

                </div>


                <p class="footer-supervision">
                    Terdaftar dan diawasi oleh Kementerian Komunikasi
                    dan Digital Republik Indonesia
                </p>

            </div>

        </div>


        <!-- =================================================
             FOOTER BOTTOM
        ================================================== -->

        <div class="footer-bottom">

            <p>
                © {{ date('Y') }} PT Rifan Financindo Berjangka.
                All rights reserved.
            </p>

        </div>

    </footer>


    <!-- =====================================================
         JAVASCRIPT SIDEBAR
    ====================================================== -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const sidebar = document.querySelector('.sidebar');

            const appShell = document.querySelector('.app-shell');

            const sidebarOpen = document.getElementById('sidebarOpen');

            const sidebarClose = document.getElementById('sidebarClose');


            if (!sidebar || !appShell || !sidebarOpen || !sidebarClose) {
                return;
            }



            /* =================================================
               DEFAULT
               Sidebar tertutup saat halaman dibuka
            ================================================== */

            sidebar.classList.add('closed');

            appShell.classList.add('sidebar-closed');



            /* =================================================
               BUKA SIDEBAR
               Tombol garis tiga
            ================================================== */

            sidebarOpen.addEventListener('click', function() {

                sidebar.classList.remove('closed');

                appShell.classList.remove('sidebar-closed');

            });



            /* =================================================
               TUTUP SIDEBAR
               Tombol X
            ================================================== */

            sidebarClose.addEventListener('click', function() {

                sidebar.classList.add('closed');

                appShell.classList.add('sidebar-closed');

            });



            /* =================================================
               FUNGSI ACTIVE DROPDOWN
            ================================================== */

            function setActiveDropdown(clickedButton) {

                document
                    .querySelectorAll('.sidebar-nav button')
                    .forEach(function(button) {

                        button.classList.remove('active');

                    });


                document
                    .querySelectorAll('.sidebar-nav .nav-item')
                    .forEach(function(item) {

                        item.classList.remove('active');

                    });


                clickedButton.classList.add('active');

            }



            /* =================================================
               TENTANG KAMI
            ================================================== */

            const tentangBtn =
                document.getElementById('tentangKamiBtn');

            const tentangSubmenu =
                document.getElementById('submenuTentang');

            const tentangArrow =
                document.getElementById('tentangKamiArrow');


            if (tentangBtn && tentangSubmenu && tentangArrow) {

                tentangBtn.addEventListener('click', function() {

                    const isOpen =
                        tentangSubmenu.style.display === 'block';


                    closeAllDropdowns();


                    if (!isOpen) {

                        setActiveDropdown(this);

                        tentangSubmenu.style.display = 'block';

                        tentangArrow.style.transform =
                            'rotate(90deg)';

                    }

                });

            }



            /* =================================================
               PROSEDUR
            ================================================== */

            const prosedurBtn =
                document.getElementById('prosedurBtn');

            const prosedurSubmenu =
                document.getElementById('submenuProsedur');

            const prosedurArrow =
                document.getElementById('prosedurArrow');


            if (prosedurBtn && prosedurSubmenu && prosedurArrow) {

                prosedurBtn.addEventListener('click', function() {

                    const isOpen =
                        prosedurSubmenu.style.display === 'block';


                    closeAllDropdowns();


                    if (!isOpen) {

                        setActiveDropdown(this);

                        prosedurSubmenu.style.display = 'block';

                        prosedurArrow.style.transform =
                            'rotate(90deg)';

                    }

                });

            }



            /* =================================================
               EDUKASI
            ================================================== */

            const edukasiBtn =
                document.getElementById('edukasiBtn');

            const edukasiSubmenu =
                document.getElementById('submenuEdukasi');

            const edukasiArrow =
                document.getElementById('edukasiArrow');


            if (edukasiBtn && edukasiSubmenu && edukasiArrow) {

                edukasiBtn.addEventListener('click', function() {

                    const isOpen =
                        edukasiSubmenu.style.display === 'block';


                    closeAllDropdowns();


                    if (!isOpen) {

                        setActiveDropdown(this);

                        edukasiSubmenu.style.display = 'block';

                        edukasiArrow.style.transform =
                            'rotate(90deg)';

                    }

                });

            }



            /* =================================================
               TUTUP SEMUA DROPDOWN
            ================================================== */

            function closeAllDropdowns() {

                if (tentangSubmenu) {

                    tentangSubmenu.style.display = 'none';

                }


                if (prosedurSubmenu) {

                    prosedurSubmenu.style.display = 'none';

                }


                if (edukasiSubmenu) {

                    edukasiSubmenu.style.display = 'none';

                }


                if (tentangArrow) {

                    tentangArrow.style.transform =
                        'rotate(0deg)';

                }


                if (prosedurArrow) {

                    prosedurArrow.style.transform =
                        'rotate(0deg)';

                }


                if (edukasiArrow) {

                    edukasiArrow.style.transform =
                        'rotate(0deg)';

                }

            }


        });
    </script>


</body>

</html>