<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>
        {{ $title ?? 'Avengersteam Dashboard' }}
    </title>

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >
</head>

<body class="app-body">

    <div class="app-shell">

        <aside class="sidebar">

            <a
                href="{{ route('dashboard') }}"
                class="brand"
            >
                <img
                    src="{{ asset('images/logo-pt-rifan.png') }}"
                    alt="Avengersteam"
                >
            </a>

            <nav class="sidebar-nav">

                <a
                    href="{{ route('dashboard') }}"
                    class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                >
                    Dashboard
                </a>

                <a href="#" class="nav-item">
                    Tentang Kami
                    <span>›</span>
                </a>

                <a href="#" class="nav-item">
                    Produk
                </a>

                <a href="#" class="nav-item">
                    Prosedur
                    <span>›</span>
                </a>

                <a href="#" class="nav-item">
                    Edukasi
                    <span>›</span>
                </a>

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

            <form
                method="POST"
                action="{{ route('logout') }}"
                class="logout-form"
            >
                @csrf

                <button
                    type="submit"
                    class="logout-btn"
                >
                    Keluar
                </button>
            </form>

        </aside>

        <main class="main-content">

            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')

        </main>

    </div>

</body>

</html>