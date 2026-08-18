@extends('layouts.app')

@section('title', 'Demo Dashboard — RFB Semarang')

@section('content')

<section class="dash-sec">
  <div class="wrap">
    <div class="eyebrow eyebrow-gold">Login / Dashboard</div>
    <h2 class="light">Satu sistem, dua peran.</h2>
    <p class="sub light">Pratinjau tampilan setelah login — menyesuaikan peran konsultan atau nasabah. Data di bawah masih contoh.</p>

    <div class="role-toggle">
      <button class="active" data-role="konsultan" type="button">Konsultan</button>
      <button data-role="nasabah" type="button">Nasabah</button>
    </div>

    <div class="dash-view active" id="view-konsultan">
      <div class="stat-grid">
        @foreach ($statKonsultan as $stat)
          <div class="stat-card">
            <div class="val">{{ $stat['nilai'] }}</div>
            <div class="lbl">{{ $stat['label'] }}</div>
          </div>
        @endforeach
      </div>

      <div class="funnel">
        @foreach ($funnel as $tahap)
          <div class="funnel-row">
            <div class="flabel">{{ $tahap['tahap'] }}</div>
            <div class="funnel-track">
              <div class="funnel-fill" style="width: {{ $tahap['persen'] }}%"></div>
            </div>
            <div class="fpct">{{ $tahap['jumlah'] }}</div>
          </div>
        @endforeach
      </div>
    </div>

    <div class="dash-view" id="view-nasabah">
      <div class="phone-wrap">
        <div class="phone">
          <div class="phone-bar">
            <span class="pt">RFB Nasabah</span>
            <div><div class="phone-menu-line"></div><div class="phone-menu-line"></div><div class="phone-menu-line"></div></div>
          </div>
          <div class="phone-body">
            <div class="phone-card">
              <div class="k">Status Akun</div>
              <div class="v">{{ $nasabah['status_akun'] }}</div>
              <p>Rekening tersambung ke wakil pialang: {{ $nasabah['wpb'] }}</p>
            </div>
            <div class="phone-card">
              <div class="k">Update Pasar</div>
              <div class="v">XAU/USD ▲</div>
              <p>{{ $nasabah['update_pasar'] }}</p>
            </div>
            <div class="phone-card">
              <div class="k">Edukasi Terbaru</div>
              <div class="v">Mengenal Margin</div>
              <p>{{ $nasabah['edukasi'] }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('scripts')
<script>
  const roleButtons = document.querySelectorAll('.role-toggle button');
  roleButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      roleButtons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      document.querySelectorAll('.dash-view').forEach(v => v.classList.remove('active'));
      document.getElementById('view-' + btn.dataset.role).classList.add('active');
    });
  });
</script>
@endsection
