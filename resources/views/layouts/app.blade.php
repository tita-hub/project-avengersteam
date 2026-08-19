<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Avengersteam Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="app-body">
    <div class="app-shell">
        <aside class="sidebar">
            <a href="{{ route('dashboard') }}" class="brand">ⓐ<span>AVENGERSTEAM</span></a>

            <nav class="sidebar-nav">
                <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="#" class="nav-item">WhatsApp <span>›</span></a>
                <div class="nav-label">AUDIENCES</div>
                <a href="#" class="nav-item">List</a>
                <div class="nav-label">BROADCAST UNOFFICIAL</div>
                <a href="#" class="nav-item">Broadcast</a>
                <div class="nav-label">WABA OFFICIAL</div>
                <a href="#" class="nav-item">Templates</a>
                <a href="#" class="nav-item">Broadcasts</a>
                <a href="#" class="nav-item">Input appointment</a>
                <a href="#" class="nav-item">Report Kinerja Harian</a>
                <a href="#" class="nav-item">Business Profile</a>
                <div class="nav-label">AUTO ENGAGE</div>
                <a href="#" class="nav-item">Auto Follow Up</a>
                <a href="#" class="nav-item">Smart Bot Action</a>
                <a href="#" class="nav-item">Billings</a>
                <div class="nav-label">AUTOMATION</div>
                <a href="#" class="nav-item">Text Replies</a>
            </nav>

            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button class="logout-btn">Keluar</button>
            </form>
        </aside>

        <main class="main-content">
            @if(session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
