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

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="app-body">

    <div class="app-shell">

        <aside class="sidebar">

            <a href="{{ route('dashboard') }}" class="brand">
                <img src="{{ asset('images/11.png') }}" alt="Avengersteam">
            </a>

            <nav class="sidebar-nav">

                <a href="{{ route('dashboard') }}" id="dashboardBtn"
                    class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>


                <!-- ===== TENTANG KAMI ===== -->

                <div id="tentangKamiContainer" style="width: 100%; position:relative">

                    <button type="button" id="tentangKamiBtn"
                        class="{{ request()->routeIs('profile.perusahaan', 'team.profile', 'wakil.pialang') ? 'active' : '' }}"
                        style="
                            width: 100%;
                            border: none;
                            background: transparent;
                            color: #000;
                            padding: 15px 16px;
                            border-radius: 10px;
                            display: flex;
                            align-items: center;
                            justify-content: space-between;
                            font-family: inherit;
                            font-size: 12px;
                            cursor: pointer;
                            box-sizing: border-box;
                            transition: all 0.25s ease;
                        ">

                        <span>Tentang Kami</span>

                        <span id="tentangKamiArrow" class= "bi bi-chevron-right"
                            style="
                                width: 20px;
                                height: 20px;
                                border-radius: 50%;
                                background: rgba(255,255,255,0.85);
                                color: #3b73d1;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                font-size: 10px;
                                line-height: 1;
                                box-sizing: border-box;
                                transition: transform 0.25s ease;
                                flex-shrink: 0;
                            ">

                        </span>
                    </button>


                    <!-- Dropdown -->
                    <div id="submenuTentang"
                        style="
                            display: none;
                            position:absolute;
                            top: 60px;
                            left: 0;
                            width: 100%;
                            background: white;
                            border-radius: 14px;
                            padding: 12px 0;
                            overflow: hidden;
                            z-index: 1000;
                            box-shadow: 
                            0 10px 25px rgba(0, 0, 0, 0.12),
                            0 4px 10px rgba(0, 0, 0, 0.06);
                            
                            border: 1px solid rgba(0, 0, 0, 0.04);
                        ">

                        <style>
                            .tentang-submenu-item {
                                display: block;
                                padding: 14px 20px;
                                color: #111;
                                text-decoration: none;
                                font-size: 10px;
                                font-weight: 600;

                                transition:
                                    background-color 0.2s ease,
                                    color 0.2s ease,
                                    padding-left 0.2s ease;
                            }

                            .tentang-submenu-item:hover {
                                background-color: #3b73d1;
                                color: white;
                                padding-left: 25px;
                            }
                        </style>

                        <a href="{{ route('profile.perusahaan') }}" class="tentang-submenu-item">
                            Profile Perusahaan
                        </a>

                        <a href="{{ route('team.profile') }}" class="tentang-submenu-item">
                            Avengers Team Profile
                        </a>

                        <a href="{{ route('wakil.pialang') }}" class="tentang-submenu-item">
                            Wakil Pialang Avengers
                        </a>

                    </div>

                </div>


                <script>
                    document.getElementById('tentangKamiBtn').addEventListener('click', function() {

                        const submenu = document.getElementById('submenuTentang');
                        const arrow = document.getElementById('tentangKamiArrow');
                        const isOpen = submenu.style.display === 'block';

                        if (!isOpen) {
                            setActiveDropdown(this);
                            submenu.style.display = 'block';
                            arrow.style.transform = 'rotate(90deg)';
                     


                        } else {

                            submenu.style.display = 'none';
                            arrow.style.transform = 'rotate(0deg)';
                            this.classList.remove('active');


                        }

                    });
                </script>

                <!-- ===== END TENTANG KAMI ===== -->


                <a href="{{ route('produk.index') }}"
                    class="nav-item {{ request()->routeIs('produk.index') ? 'active' : '' }}">
                    Produk
                </a>


                <!-- PROSEDUR -->
                <div id="prosedurContainer" style="width: 100%; position: relative;">

                    <!-- Tombol Prosedur -->
                    <button type="button" id="prosedurBtn"
                        class="{{ request()->routeIs('prosedur.*') ? 'active' : '' }}"
                        style="
                                width: 100%;
                                border: none;
                                background: transparent;
                                color: #000;
                                padding: 15px 16px;
                                border-radius: 10px;
                                display: flex;
                                align-items: center;
                                justify-content: space-between;
                                font-family: inherit;
                                font-size: 12px;
                                cursor: pointer;
                                box-sizing: border-box;
                                transition: all 0.25s ease;
                            ">

                        <span>Prosedur</span>

                        <!-- Panah -->
                        <span id="prosedurArrow" class="bi bi-chevron-right"
                            style="
                                    width: 20px;
                                    height: 20px;
                                    border-radius: 50%;
                                    background: rgba(255,255,255,0.85);
                                    color: #3b73d1;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    font-size: 10px;
                                    line-height: 1;
                                    box-sizing: border-box;
                                    transition: transform 0.25s ease;
                                    flex-shrink: 0;
                                ">
                        </span>

                    </button>


                    <!-- Dropdown Prosedur -->
                    <div id="submenuProsedur"
                        style="
                                display: none;
                                position: absolute;
                                top: 60px;
                                left: 0;
                                width: 100%;
                                background: white;
                                border-radius: 14px;
                                padding: 12px 0;
                                overflow: hidden;
                                z-index: 1000;
                                box-shadow:
                                    0 10px 25px rgba(0, 0, 0, 0.12),
                                    0 4px 10px rgba(0, 0, 0, 0.06);
                                border: 1px solid rgba(0, 0, 0, 0.04);
                            ">

                        <style>
                            .prosedur-submenu-item {
                                display: block;
                                padding: 14px 20px;
                                color: #111;
                                text-decoration: none;
                                font-size: 10px;
                                font-weight: 600;

                                transition:
                                    background-color 0.2s ease,
                                    color 0.2s ease,
                                    padding-left 0.2s ease;
                            }

                            .prosedur-submenu-item:hover {
                                background-color: #3b73d1;
                                color: white;
                                padding-left: 25px;
                            }
                        </style>


                        <!-- Pembukaan Rekening -->
                        <a href="{{ route('prosedur.pembukaan') }}" class="prosedur-submenu-item">
                            Pembukaan Rekening
                        </a>


                        <!-- Penarikan -->
                        <a href="{{ route('prosedur.penarikan') }}" class="prosedur-submenu-item">
                            Penarikan
                        </a>


                        <!-- Petunjuk Transaksi -->
                        <a href="{{ route('prosedur.petunjuk') }}" class="prosedur-submenu-item">
                            Petunjuk Transaksi
                        </a>

                    </div>

                </div>


                <script>
                    document.getElementById('prosedurBtn').addEventListener('click', function() {

                        const submenu = document.getElementById('submenuProsedur');
                        const arrow = document.getElementById('prosedurArrow');
                        const isOpen = submenu.style.display === 'block';

                        if (!isOpen) {
                            setActiveDropdown(this);
                            submenu.style.display = 'block';
                            arrow.style.transform = 'rotate(90deg)';
                        


                        } else {

                            submenu.style.display = 'none';
                            arrow.style.transform = 'rotate(0deg)';
                            this.classList.remove('active');

                        }

                    });
                </script>


                <!-- ===== END PROSEDUR ===== -->


                <!-- EDUKASI -->


                <div id="edukasiContainer" style="width: 100%; position: relative;">

                    <!-- Tombol Edukasi -->
                    <button type="button" id="edukasiBtn"
                        class="{{ request()->routeIs('edukasi.*') ? 'active' : '' }}"
                        style="
                                width: 100%;
                                border: none;
                                background: transparent;
                                color: #000;
                                padding: 15px 16px;
                                border-radius: 10px;
                                display: flex;
                                align-items: center;
                                justify-content: space-between;
                                font-family: inherit;
                                font-size: 12px;
                                cursor: pointer;
                                box-sizing: border-box;
                                transition: all 0.25s ease;
                            ">

                        <span>Edukasi</span>

                        <!-- Panah -->
                        <span id="edukasiArrow" class="bi bi-chevron-right"
                            style="
                                    width: 20px;
                                    height: 20px;
                                    border-radius: 50%;
                                    background: rgba(255,255,255,0.85);
                                    color: #3b73d1;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    font-size: 10px;
                                    line-height: 1;
                                    box-sizing: border-box;
                                    transition: transform 0.25s ease;
                                    flex-shrink: 0;
                                ">
                        </span>

                    </button>


                    <!-- Dropdown Edukasi -->
                    <div id="submenuEdukasi"
                        style="
                                display: none;
                                position: absolute;
                                top: 60px;
                                left: 0;
                                width: 100%;
                                background: white;
                                border-radius: 14px;
                                padding: 12px 0;
                                overflow: hidden;
                                z-index: 1000;
                                box-shadow:
                                    0 10px 25px rgba(0, 0, 0, 0.12),
                                    0 4px 10px rgba(0, 0, 0, 0.06);
                                border: 1px solid rgba(0, 0, 0, 0.04);
                            ">

                        <style>
                            .edukasi-submenu-item {
                                display: block;
                                padding: 14px 20px;
                                color: #111;
                                text-decoration: none;
                                font-size: 10px;
                                font-weight: 600;

                                transition:
                                    background-color 0.2s ease,
                                    color 0.2s ease,
                                    padding-left 0.2s ease;
                            }

                            .edukasi-submenu-item:hover {
                                background-color: #3b73d1;
                                color: white;
                                padding-left: 25px;
                            }
                        </style>


                        <!-- Edukasi Nasabah -->
                        <a href="{{ route('edukasi.nasabah') }}" class="edukasi-submenu-item">
                            Edukasi Nasabah
                        </a>


                        <!-- Edukasi Konsultan -->
                        <a href="{{ route('edukasi.konsultan') }}" class="edukasi-submenu-item">
                            Edukasi Konsultan
                        </a>


                        <!-- Edukasi Umum -->
                        <a href="{{ route('edukasi.umum') }}" class="edukasi-submenu-item">
                            Edukasi Umum
                        </a>

                    </div>

                </div>


                <script>
                    document.addEventListener('DOMContentLoaded', function() {

                        const edukasiBtn = document.getElementById('edukasiBtn');
                        const submenuEdukasi = document.getElementById('submenuEdukasi');
                        const edukasiArrow = document.getElementById('edukasiArrow');

                        if (!edukasiBtn || !submenuEdukasi || !edukasiArrow) {
                            return;
                        }

                        

                        edukasiBtn.addEventListener('click', function() {

                            const isOpen = submenuEdukasi.style.display === 'block';

                            if (!isOpen) {

                                setActiveDropdown(this);

                                submenuEdukasi.style.display = 'block';
                                edukasiArrow.style.transform = 'rotate(90deg)';

                            } else {

                               
                                submenuEdukasi.style.display = 'none';                            
                                edukasiArrow.style.transform = 'rotate(0deg)';
                                edukasiBtn.classList.remove('active');

                            }

                        });

                    });
                </script>

                <!-- ===== END EDUKASI ===== -->


                <!-- ===== Anu Tombol ===== -->

                <script>
                        function setActiveDropdown(clickedButton) {
                            
                            // Hapus active dari semua tombol dropdown
                            document.getElementById('tentangKamiBtn').classList.remove('active');
                            document.getElementById('prosedurBtn').classList.remove('active');
                            document.getElementById('edukasiBtn').classList.remove('active');
                            
                            // Hapus active dari nav-item biasa
                            document.querySelectorAll('.sidebar-nav .nav-item').forEach(function(item) {
                                item.classList.remove('active');
                            });
                        
                            // Tambahkan active ke tombol yang diklik
                            clickedButton.classList.add('active');
                        }
                    </script>
                <!-- ===== END Anu Tombol ===== -->



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

            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf

                <button type="submit" class="logout-btn">
                    Keluar
                </button>
            </form>

        </aside>

        <main class="main-content">

            @if (session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')

        </main>

    </div>

    </script>
