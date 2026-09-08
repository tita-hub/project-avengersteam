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


        <!-- =====================================================
             TOP HEADER / NAVBAR
        ====================================================== -->

        <header class="top-header">

            <div class="top-header-inner">

                <!-- LOGO AVENGERS -->
                <div class="top-logo">
                    <img src="{{ asset('images/avengersteam-header.png') }}"
                        alt="Avengersteam">
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
                            <a href="{{ route('profile.perusahaan') }}" class="tentang-submenu-item">
                                <span>Profile Perusahaan</span>
                            </a>
                            <a href="{{ route('team.profile') }}" class="tentang-submenu-item">
                                <span>Avengers Team Profile</span>
                            </a>
                            <a href="{{ route('wakil.pialang') }}" class="tentang-submenu-item">
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
                            <a href="{{ route('prosedur.pembukaan') }}" class="prosedur-submenu-item">
                                <span>Pembukaan Rekening</span>
                            </a>
                            <a href="{{ route('prosedur.penarikan') }}" class="prosedur-submenu-item">
                                <span>Penarikan</span>
                            </a>
                            <a href="{{ route('prosedur.petunjuk') }}" class="prosedur-submenu-item">
                                <span>Petunjuk Transaksi</span>
                            </a>
                        </div>
                    </div>

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

                <!-- HEADER ACTIONS -->
                <div class="top-header-actions">

                    <button type="button"
                        id="themeToggle"
                        class="theme-toggle"
                        aria-label="Aktifkan mode malam"
                        title="Mode siang / malam">
                        <i class="bi bi-moon-stars-fill"></i>
                    </button>

                    <!-- HAMBURGER: tetap tiga garis, tidak berubah menjadi X -->
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

                    <div class="mobile-nav-dropdown">
                        <button type="button"
                            id="mobileEdukasiBtn"
                            class="mobile-nav-item mobile-dropdown-btn {{ request()->routeIs('edukasi.*') ? 'active' : '' }}"
                            aria-expanded="false">
                            <span>Edukasi</span>
                            <i id="mobileEdukasiArrow" class="bi bi-chevron-down"></i>
                        </button>
                        <div id="mobileSubmenuEdukasi" class="mobile-submenu">
                            <a href="{{ route('edukasi.nasabah') }}" class="edukasi-submenu-item"><span>Edukasi Nasabah</span>
                            </a>
                            <a href="{{ route('edukasi.konsultan') }}" class="edukasi-submenu-item"><span>Edukasi Konsultan</span>
                            </a>
                            <a href="{{ route('edukasi.umum') }}" class="edukasi-submenu-item"><span>Edukasi Umum</span>
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

                    <a href="https://www.komdigi.go.id/"
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
               THEME TOGGLE
               Mode hanya mengubah area navigasi agar halaman lain
               tetap menggunakan desain yang sudah ada.
            ================================================== */

            const themeToggle = document.getElementById('themeToggle');
            const themeIcon = themeToggle?.querySelector('i');
            const savedTheme = localStorage.getItem('avengersteam-nav-theme');

            if (savedTheme === 'dark') {
                document.body.classList.add('nav-dark-mode');
            }

            function updateThemeButton() {
                if (!themeToggle || !themeIcon) return;

                const isDark = document.body.classList.contains('nav-dark-mode');

                themeIcon.className = isDark
                    ? 'bi bi-sun-fill'
                    : 'bi bi-moon-stars-fill';

                themeToggle.setAttribute(
                    'aria-label',
                    isDark ? 'Aktifkan mode siang' : 'Aktifkan mode malam'
                );
            }

            updateThemeButton();

            if (themeToggle) {
                themeToggle.addEventListener('click', function() {
                    document.body.classList.toggle('nav-dark-mode');

                    const isDark = document.body.classList.contains('nav-dark-mode');
                    localStorage.setItem(
                        'avengersteam-nav-theme',
                        isDark ? 'dark' : 'light'
                    );

                    updateThemeButton();
                });
            }


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

</body>

</html>