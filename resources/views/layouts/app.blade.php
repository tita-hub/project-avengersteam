<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'RFB Semarang — Tim Avengers')</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<header>
  <div class="headbar">
    <a href="{{ route('home') }}" class="logo">
      <div class="logo-mark">R</div>
      <div class="logo-text">
        <div class="n1">RFB Semarang</div>
        <div class="n2">Tim Avengers</div>
      </div>
    </a>
    <button class="burger" id="burgerBtn" aria-label="Buka menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>

<div class="scrim" id="scrim"></div>
<div class="drawer" id="drawer">
  <div class="drawer-top">
    <span class="drawer-label">Menu</span>
    <button class="drawer-close" id="drawerClose" type="button">✕</button>
  </div>
  <nav>
    <a href="{{ route('home') }}" class="nav-link"><span>Beranda</span><span class="num">01</span></a>
    <a href="{{ route('pembukaan-rekening.create') }}" class="nav-link"><span>Ajukan Pembukaan Rekening</span><span class="num">02</span></a>
    <a href="{{ route('dashboard.demo') }}" class="nav-link"><span>Demo Dashboard</span><span class="num">03</span></a>
  </nav>
  <div class="drawer-foot">
    PT RIFAN FINANCINDO BERJANGKA<br>
    CABANG SEMARANG<br>
    TERDAFTAR &amp; DIAWASI BAPPEBTI
  </div>
</div>

@yield('content')

<script>
  const burger = document.getElementById('burgerBtn');
  const drawer = document.getElementById('drawer');
  const scrim = document.getElementById('scrim');
  const closeBtn = document.getElementById('drawerClose');

  function openDrawer(){
    drawer.classList.add('open');
    scrim.classList.add('show');
    burger.classList.add('open');
  }
  function closeDrawer(){
    drawer.classList.remove('open');
    scrim.classList.remove('show');
    burger.classList.remove('open');
  }
  burger.addEventListener('click', () => {
    drawer.classList.contains('open') ? closeDrawer() : openDrawer();
  });
  closeBtn.addEventListener('click', closeDrawer);
  scrim.addEventListener('click', closeDrawer);
  document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', closeDrawer);
  });
</script>

@yield('scripts')

</body>
</html>
