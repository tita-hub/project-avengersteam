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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
>
</head>


<body class="app-body">


    <!-- =====================================================
         APP SHELL
    ====================================================== -->

    <div class="app-shell">


        <!-- =====================================================
             TOP HEADER / NAVBAR
        ====================================================== -->

        <header class="top-header">

            <div class="top-header-inner">

                <!-- BRANDING: LOGO RIFAN + TEKS AVENGERS -->
                <div class="top-logo branding-text">

                    <!-- TEMPAT LOGO PT RIFAN -->
                    <div class="brand-rifan">
                            <img src="{{ asset('images/logo-rifan-2.png') }}"
                                alt="PT Rifan Financindo Berjangka">
                    </div>

                    <!-- NAMA TIM -->
                    <div class="brand-avengers-text">
                        <span>AVENGERS TEAM</span>
                        <small>SEMARANG</small>
                    </div>

                </div>

                <!-- DESKTOP NAVIGATION -->
                <nav class="top-nav" aria-label="Navigasi utama">

                    <a href="{{ route('dashboard') }}"
                        class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <span>Dashboard</span>
                    </a>

                    <div class="top-nav-dropdown" id="tentangKamiContainer">
                        <button type="button"
                            id="tentangKamiBtn"
                            class="nav-item nav-dropdown-btn {{ request()->routeIs('profile.perusahaan', 'team.profile', 'wakil.pialang') ? 'active' : '' }}"
                            aria-expanded="false">
                        <span>Tentang Kami</span>
                            <i id="tentangKamiArrow" class="bi bi-chevron-down dropdown-arrow"></i>
                        </button>

                        <div id="submenuTentang" class="top-submenu">
                            <a href="{{ route('profile.perusahaan') }}" 
                                class="tentang-submenu-item {{ request()->routeIs('profile.perusahaan') ? 'active' : '' }}">
                                <span>Profile Perusahaan</span>
                            </a>
                            <a href="{{ route('team.profile') }}" 
                                class="tentang-submenu-item {{ request()->routeIs('team.profile') ? 'active' : '' }}">
                                <span>Avengers Team Profile</span>
                            </a>
                            <a href="{{ route('wakil.pialang') }}"
                                class="tentang-submenu-item {{ request()->routeIs('wakil.pialang') ? 'active' : '' }}">
                                <span>Wakil Pialang Avengers</span>
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('produk.index') }}"
                        class="nav-item {{ request()->routeIs('produk.index') ? 'active' : '' }}">
                        <span>Produk</span>
                    </a>

                    <div class="top-nav-dropdown" id="prosedurContainer">
                        <button type="button"
                            id="prosedurBtn"
                            class="nav-item nav-dropdown-btn {{ request()->routeIs('prosedur.*') ? 'active' : '' }}"
                            aria-expanded="false">
                        <span>Prosedur</span>
                            <i id="prosedurArrow" class="bi bi-chevron-down dropdown-arrow"></i>
                        </button>

                        <div id="submenuProsedur" class="top-submenu">
                            <a href="{{ route('prosedur.pembukaan') }}"
                                class="prosedur-submenu-item {{ request()->routeIs('prosedur.pembukaan') ? 'active' : '' }}">
                                <span>Pembukaan Rekening</span>
                            </a>
                            <a href="{{ route('prosedur.penarikan') }}"
                                class="prosedur-submenu-item {{ request()->routeIs('prosedur.penarikan') ? 'active' : '' }}">
                                <span>Penarikan</span>
                            </a>
                            <a href="{{ route('prosedur.petunjuk') }}"
                                class="prosedur-submenu-item {{ request()->routeIs('prosedur.petunjuk') ? 'active' : '' }}">
                                <span>Petunjuk Transaksi</span>
                            </a>
                        </div>
                    </div>

                    <!-- MENU ANALISIS -->
                    <div class="top-nav-dropdown" id="analisisContainer">
                        <button type="button"
                            id="analisisBtn"
                            class="nav-item nav-dropdown-btn {{ request()->routeIs('news.*') ? 'active' : '' }}"
                            aria-expanded="false">
                            <span>Analisis</span>
                            <i id="analisisArrow" class="bi bi-chevron-down dropdown-arrow"></i>
                        </button>

                        <div id="submenuAnalisis" class="top-submenu">
                            <a href="{{ route('news.index') }}"
                                class="analisis-submenu-item {{ request()->routeIs('news.*') ? 'active' : '' }}">
                                <span>Berita</span>
                            </a>
                            <a href="{{ route('analisis.kalender-ekonomi') }}" class="analisis-submenu-item {{ request()->routeIs('analisis.kalender-ekonomi') ? 'active' : '' }}"><span>Kalender Ekonomi</span></a>
                            <a href="{{ route('analisis.data-historis') }}" class="analisis-submenu-item {{ request()->routeIs('analisis.data-historis') ? 'active' : '' }}"><span>Data Historis</span></a>
                            <a href="{{ route('analisis.pivot-fibonacci') }}" class="analisis-submenu-item {{ request()->routeIs('analisis.pivot-fibonacci') ? 'active' : '' }}"><span>Pivot &amp; Fibonacci</span></a>
                        </div>
                    </div>
                    <!-- END MENU ANALISIS -->

                    <div class="top-nav-dropdown" id="edukasiContainer">
                        <button type="button"
                            id="edukasiBtn"
                            class="nav-item nav-dropdown-btn {{ request()->routeIs('edukasi.*') ? 'active' : '' }}"
                            aria-expanded="false">
                        <span>Edukasi</span>
                            <i id="edukasiArrow" class="bi bi-chevron-down dropdown-arrow"></i>
                        </button>

                        <div id="submenuEdukasi" class="top-submenu">
                            <a href="{{ route('edukasi.nasabah') }}" class="edukasi-submenu-item">
                                <span>Edukasi Nasabah</span>
                            </a>
                            <a href="{{ route('edukasi.konsultan') }}" class="edukasi-submenu-item">
                                <span>Edukasi Konsultan</span>
                            </a>
                            <a href="{{ route('edukasi.umum') }}" class="edukasi-submenu-item">
                                <span>Edukasi Umum</span>
                            </a>
                        </div>
                    </div>

                </nav>

                <div class="top-header-actions">

                    <button type="button"
                        id="mobileMenuToggle"
                        class="mobile-menu-toggle"
                        aria-label="Buka menu"
                        aria-expanded="false">
                        <i class="bi bi-list"></i>
                    </button>

                </div>

            </div>

            <!-- MOBILE MENU: muncul di bawah header, tanpa logo/X tambahan -->
            <div id="mobileMenu" class="mobile-menu-panel">
                <nav class="mobile-nav" aria-label="Navigasi mobile">

                    <a href="{{ route('dashboard') }}"
                        class="mobile-nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <span>Dashboard</span>
                    </a>

                    <div class="mobile-nav-dropdown">
                        <button type="button"
                            id="mobileTentangBtn"
                            class="mobile-nav-item mobile-dropdown-btn {{ request()->routeIs('profile.perusahaan', 'team.profile', 'wakil.pialang') ? 'active' : '' }}"
                            aria-expanded="false">
                            <span>Tentang Kami</span>
                            <i id="mobileTentangArrow" class="bi bi-chevron-down"></i>
                        </button>
                        <div id="mobileSubmenuTentang" class="mobile-submenu">
                            <a href="{{ route('profile.perusahaan') }}" class="tentang-submenu-item"><span>Profile Perusahaan</span>
                            </a>
                            <a href="{{ route('team.profile') }}" class="tentang-submenu-item"><span>Avengers Team Profile</span>
                            </a>
                            <a href="{{ route('wakil.pialang') }}" class="tentang-submenu-item"><span>Wakil Pialang Avengers</span>
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('produk.index') }}"
                        class="mobile-nav-item {{ request()->routeIs('produk.index') ? 'active' : '' }}">
                        <span>Produk</span>
                    </a>

                    <div class="mobile-nav-dropdown">
                        <button type="button"
                            id="mobileProsedurBtn"
                            class="mobile-nav-item mobile-dropdown-btn {{ request()->routeIs('prosedur.*') ? 'active' : '' }}"
                            aria-expanded="false">
                            <span>Prosedur</span>
                            <i id="mobileProsedurArrow" class="bi bi-chevron-down"></i>
                        </button>
                        <div id="mobileSubmenuProsedur" class="mobile-submenu">
                            <a href="{{ route('prosedur.pembukaan') }}" class="prosedur-submenu-item"><span>Pembukaan Rekening</span>
                            </a>
                            <a href="{{ route('prosedur.penarikan') }}" class="prosedur-submenu-item"><span>Penarikan</span>
                            </a>
                            <a href="{{ route('prosedur.petunjuk') }}" class="prosedur-submenu-item"><span>Petunjuk Transaksi</span>
                            </a>
                        </div>
                    </div>

                    <!-- MENU ANALISIS MOBILE -->
                    <div class="mobile-nav-dropdown">
                        <button type="button"
                            id="mobileAnalisisBtn"
                            class="mobile-nav-item mobile-dropdown-btn {{ request()->routeIs('news.*') ? 'active' : '' }}"
                            aria-expanded="false">
                            <span>Analisis</span>
                            <i id="mobileAnalisisArrow" class="bi bi-chevron-down"></i>
                        </button>
                        <div id="mobileSubmenuAnalisis" class="mobile-submenu">
                            <a href="{{ route('news.index') }}"
                                class="analisis-submenu-item {{ request()->routeIs('news.*') ? 'active' : '' }}">
                                <span>Berita</span>
                            </a>
                            <a href="{{ route('analisis.kalender-ekonomi') }}" class="analisis-submenu-item {{ request()->routeIs('analisis.kalender-ekonomi') ? 'active' : '' }}">
                                <span>Kalender Ekonomi</span></a>
                            <a href="{{ route('analisis.data-historis') }}" class="analisis-submenu-item {{ request()->routeIs('analisis.data-historis') ? 'active' : '' }}">
                                <span>Data Historis</span></a>
                            <a href="{{ route('analisis.pivot-fibonacci') }}" class="analisis-submenu-item {{ request()->routeIs('analisis.pivot-fibonacci') ? 'active' : '' }}">
                                <span>Pivot &amp; Fibonacci</span></a>
                        </div>
                    </div>
                    <!-- END MENU ANALISIS MOBILE -->

                    <div class="mobile-nav-dropdown">
                        <button type="button"
                            id="mobileEdukasiBtn"
                            class="mobile-nav-item mobile-dropdown-btn {{ request()->routeIs('edukasi.*') ? 'active' : '' }}"
                            aria-expanded="false">
                            <span>Edukasi</span>
                            <i id="mobileEdukasiArrow" class="bi bi-chevron-down"></i>
                        </button>
                        <div id="mobileSubmenuEdukasi" class="mobile-submenu">
                            <a href="{{ route('edukasi.nasabah') }}"
                                class="edukasi-submenu-item {{ request()->routeIs('edukasi.nasabah') ? 'active' : '' }}">
                                <span>Edukasi Nasabah</span>
                            </a>
                            <a href="{{ route('edukasi.konsultan') }}"
                                class="edukasi-submenu-item {{ request()->routeIs('edukasi.konsultan') ? 'active' : '' }}">
                                <span>Edukasi Konsultan</span>
                            </a>
                            <a href="{{ route('edukasi.umum') }}"
                                class="edukasi-submenu-item {{ request()->routeIs('edukasi.umum') ? 'active' : '' }}">
                                <span>Edukasi Umum</span>
                            </a>
                        </div>
                    </div>

                </nav>
            </div>

        </header>

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


    
    <!-- ============================================================
        FOOTER
    ============================================================ -->

    <footer class="site-footer">

        <div class="footer-container">

            <!-- ====================================================
                PERHATIAN + MEDIA SOSIAL
            ===================================================== -->

            <div class="footer-warning">

                <div class="footer-warning-line"></div>

                <h3>PERHATIAN!</h3>

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

                <!-- GARIS PEMBATAS MEDIA SOSIAL -->

                <div class="footer-social-divider"></div>

                <h4 class="footer-social-title">IKUTI KAMI</h4>

                <div class="footer-social">

                    <!-- INSTAGRAM -->
                    <a href="https://www.instagram.com/avgsmgteam?xtok=Z2VtMXM1dTV1Z3Bw"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Instagram">

                        <i class="bi bi-instagram"></i>

                    </a>

                    <!-- TIKTOK -->
                    <a href="https://www.tiktok.com/@avengersteam_29?_r=1&_t=ZS-9B78lvcWi1J"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="TikTok">

                        <i class="bi bi-tiktok"></i>

                    </a>

                    <!-- YOUTUBE -->
                    <a href="#"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="YouTube">

                        <i class="bi bi-youtube"></i>

                    </a>

                    <!-- EMAIL -->
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=avengersteam.rfbsmg@gmail.com"
                    aria-label="Email">

                        <i class="bi bi-envelope-fill"></i>

                    </a>

                </div>

            </div>


            <!-- ====================================================
                TAUTAN CEPAT
            ===================================================== -->

            <div class="footer-links">

                <h3>TAUTAN CEPAT</h3>

                <a href="{{ route('dashboard') }}">

                    <i class="bi bi-chevron-right"></i>

                    <span>Beranda</span>

                </a>

                <a href="{{ route('produk.index') }}">

                    <i class="bi bi-chevron-right"></i>

                    <span>Produk SPA</span>

                </a>
            </div>


            <!-- ====================================================
                INFORMASI PERUSAHAAN
            ===================================================== -->

            <div class="footer-company">

                <h3>PT RIFAN FINANCINDO BERJANGKA SEMARANG</h3>

                <p>
                    Corner, Ruko Jl. Letnan Jenderal S. Parman
                    No.47A Unit 5-6, Gajahmungkur,
                    Kec. Gajahmungkur, Kota Semarang,
                    Jawa Tengah 50231
                </p>

                <p>
                    <strong>Email:</strong>
                    avengersteam.rfbsmg@gmail.com
                </p>

                <p>
                    <strong>Telepon (Fax):</strong>
                    (024) 8508868
                </p>

                <p>
                    <strong>Fax (Ruko S.Parman):</strong>
                    (024) 850 8869
                </p>

                <p>
                    <strong>Layanan pengaduan:</strong>
                    avengersteam.rfbsmg@gmail.com
                </p>


                <!-- =================================================
                    LEGALITAS PERUSAHAAN
                ================================================== -->

                <div class="footer-legality">

                    <!-- BAPPEBTI -->

                    <div class="footer-legality-group">

                        <h4>BERIZIN DAN DIAWASI OLEH</h4>

                        <div class="footer-legality-logos footer-bappebti">

                            <a href="https://bappebti.go.id/"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="BAPPEBTI">

                                <img src="{{ asset('images/legalitas/bappebti.png') }}"
                                    alt="BAPPEBTI">

                            </a>

                        </div>

                    </div>


                    <!-- ANGGOTA -->

                    <div class="footer-legality-group">

                        <h4>ANGGOTA DARI</h4>

                        <div class="footer-legality-logos footer-members">

                            <a href="https://jfx.co.id/"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="JFX">

                                <img src="{{ asset('images/legalitas/jfx.png') }}"
                                    alt="JFX">

                            </a>

                            <a href="https://www.ptkbi.com/"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="KBI">

                                <img src="{{ asset('images/legalitas/kbi.png') }}"
                                    alt="KBI">

                            </a>

                            <a href="https://www.aspebtindo.org/"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="ASPEBTINDO">

                                <img src="{{ asset('images/legalitas/aspebtindo.png') }}"
                                    alt="ASPEBTINDO">

                            </a>

                        </div>

                    </div>


                    <!-- SERTIFIKASI TSI KAN -->

                    <div class="footer-legality-group">

                        <h4>SERTIFIKASI</h4>

                        <div class="footer-legality-logos footer-tsi">

                            <a href="https://tsicertification.com/"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="TSI Certification">

                                <img src="{{ asset('images/legalitas/tsi-kan.png') }}"
                                    alt="TSI KAN">

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- ========================================================
            FOOTER BOTTOM
        ========================================================= -->

        <div class="footer-bottom">

            <p>
                © {{ date('Y') }} PT Rifan Financindo Berjangka Semarang.
                All rights reserved.
            </p>

        </div>

    </footer>



    <!-- =====================================================
         JAVASCRIPT NAVBAR
    ====================================================== -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            /* =================================================
               DESKTOP DROPDOWN
            ================================================== */

            const desktopDropdowns = [
                {
                    button: document.getElementById('tentangKamiBtn'),
                    submenu: document.getElementById('submenuTentang'),
                    arrow: document.getElementById('tentangKamiArrow')
                },
                {
                    button: document.getElementById('prosedurBtn'),
                    submenu: document.getElementById('submenuProsedur'),
                    arrow: document.getElementById('prosedurArrow')
                },
                {
                    button: document.getElementById('analisisBtn'),
                    submenu: document.getElementById('submenuAnalisis'),
                    arrow: document.getElementById('analisisArrow')
                },
                {
                    button: document.getElementById('edukasiBtn'),
                    submenu: document.getElementById('submenuEdukasi'),
                    arrow: document.getElementById('edukasiArrow')
                }
            ];

            function closeDesktopDropdowns(except = null) {
                desktopDropdowns.forEach(function(item) {
                    if (!item.button || !item.submenu) return;
                    if (item === except) return;

                    item.submenu.classList.remove('show');
                    item.button.setAttribute('aria-expanded', 'false');
                    item.arrow?.classList.remove('rotated');
                });
            }

            desktopDropdowns.forEach(function(item) {
                if (!item.button || !item.submenu) return;

                item.button.addEventListener('click', function(e) {
                    e.stopPropagation();

                    const isOpen = item.submenu.classList.contains('show');
                    closeDesktopDropdowns();

                    if (!isOpen) {
                        item.submenu.classList.add('show');
                        item.button.setAttribute('aria-expanded', 'true');
                        item.arrow?.classList.add('rotated');
                    }
                });

                item.submenu.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            });

            document.addEventListener('click', function() {
                closeDesktopDropdowns();
            });


            /* =================================================
               MOBILE HAMBURGER
               Tetap icon 3 garis, tidak berubah menjadi X.
            ================================================== */

            const mobileToggle = document.getElementById('mobileMenuToggle');
            const mobileMenu = document.getElementById('mobileMenu');

            if (mobileToggle && mobileMenu) {
                mobileToggle.addEventListener('click', function(e) {
                    e.stopPropagation();

                    const isOpen = mobileMenu.classList.toggle('show');

                    mobileToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                    mobileToggle.setAttribute('aria-label', isOpen ? 'Tutup menu' : 'Buka menu');
                });

                mobileMenu.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            }


            /* =================================================
               MOBILE DROPDOWN
            ================================================== */

            const mobileDropdowns = [
                {
                    button: document.getElementById('mobileTentangBtn'),
                    submenu: document.getElementById('mobileSubmenuTentang'),
                    arrow: document.getElementById('mobileTentangArrow')
                },
                {
                    button: document.getElementById('mobileProsedurBtn'),
                    submenu: document.getElementById('mobileSubmenuProsedur'),
                    arrow: document.getElementById('mobileProsedurArrow')
                },  
                {
                    button: document.getElementById('mobileAnalisisBtn'),
                    submenu: document.getElementById('mobileSubmenuAnalisis'),
                    arrow: document.getElementById('mobileAnalisisArrow')
                },
                {
                    button: document.getElementById('mobileEdukasiBtn'),
                    submenu: document.getElementById('mobileSubmenuEdukasi'),
                    arrow: document.getElementById('mobileEdukasiArrow')
                }
            ];

            function closeMobileDropdowns(except = null) {
                mobileDropdowns.forEach(function(item) {
                    if (!item.button || !item.submenu) return;
                    if (item === except) return;

                    item.submenu.classList.remove('show');
                    item.button.setAttribute('aria-expanded', 'false');
                    item.arrow?.classList.remove('rotated');
                });
            }

            mobileDropdowns.forEach(function(item) {
                if (!item.button || !item.submenu) return;

                item.button.addEventListener('click', function(e) {
                    e.stopPropagation();

                    const isOpen = item.submenu.classList.contains('show');
                    closeMobileDropdowns();

                    if (!isOpen) {
                        item.submenu.classList.add('show');
                        item.button.setAttribute('aria-expanded', 'true');
                        item.arrow?.classList.add('rotated');
                    }
                });
            });


            /* =================================================
               RESPONSIVE CLEANUP
               Saat kembali ke desktop, mobile menu ditutup.
            ================================================== */

            window.addEventListener('resize', function() {
                if (window.innerWidth > 760) {
                    mobileMenu?.classList.remove('show');
                    mobileToggle?.setAttribute('aria-expanded', 'false');
                    closeMobileDropdowns();
                }
            });

        });
    </script>

    <a
        href="https://wa.me/6285128040216"
        class="floating-whatsapp"
        target="_blank"
        rel="noopener noreferrer"
        aria-label="Hubungi kami melalui WhatsApp"
    >
        <i class="fab fa-whatsapp"></i>
    </a>

</body>

</html>