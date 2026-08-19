@extends('layouts.app')  {{-- jika pakai layout, atau langsung --}}

@section('content')
<div style="padding: 40px; max-width: 1200px; margin: 0 auto;">
    <h1 style="font-size:28px; font-weight:600; color:#0b1a2e;">Selamat datang, <span style="color:#1a5a8a;">{{ Auth::user()->nama }}</span> 👋</h1>
    <p style="color:#4a6a8a;">Anda login sebagai <strong>{{ Auth::user()->role }}</strong> dengan username <strong>{{ Auth::user()->username }}</strong>.</p>

    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(220px,1fr)); gap:24px; margin-top:30px;">
        <div style="background:#fff; border-radius:20px; padding:24px; box-shadow:0 8px 30px rgba(0,0,0,0.04);">
            <div style="font-size:28px; color:#1a5a8a;"><i class="fas fa-chart-line"></i></div>
            <h3 style="font-size:15px; font-weight:500; color:#6a8aaa; text-transform:uppercase; margin:10px 0 6px;">Total Pendapatan</h3>
            <div style="font-size:32px; font-weight:700; color:#0b1a2e;">Rp 12,8 M</div>
            <div style="font-size:13px; color:#8aabca;">+8.2% dari bulan lalu</div>
        </div>
        <div style="background:#fff; border-radius:20px; padding:24px; box-shadow:0 8px 30px rgba(0,0,0,0.04);">
            <div style="font-size:28px; color:#1a5a8a;"><i class="fas fa-users"></i></div>
            <h3 style="font-size:15px; font-weight:500; color:#6a8aaa; text-transform:uppercase; margin:10px 0 6px;">Klien Aktif</h3>
            <div style="font-size:32px; font-weight:700; color:#0b1a2e;">1,284</div>
            <div style="font-size:13px; color:#8aabca;">+43 baru minggu ini</div>
        </div>
        <div style="background:#fff; border-radius:20px; padding:24px; box-shadow:0 8px 30px rgba(0,0,0,0.04);">
            <div style="font-size:28px; color:#1a5a8a;"><i class="fas fa-file-invoice"></i></div>
            <h3 style="font-size:15px; font-weight:500; color:#6a8aaa; text-transform:uppercase; margin:10px 0 6px;">Transaksi</h3>
            <div style="font-size:32px; font-weight:700; color:#0b1a2e;">3,921</div>
            <div style="font-size:13px; color:#8aabca;">Q1 2026</div>
        </div>
        <div style="background:#fff; border-radius:20px; padding:24px; box-shadow:0 8px 30px rgba(0,0,0,0.04);">
            <div style="font-size:28px; color:#1a5a8a;"><i class="fas fa-clock"></i></div>
            <h3 style="font-size:15px; font-weight:500; color:#6a8aaa; text-transform:uppercase; margin:10px 0 6px;">Status</h3>
            <div style="font-size:24px; font-weight:700; color:#0b1a2e;">Online</div>
            <div style="font-size:13px; color:#8aabca;">Sesi aktif</div>
        </div>
    </div>

    <div style="margin-top:40px; padding:20px; background:#e8f0fe; border-radius:16px; border-left:6px solid #1a5a8a;">
        <p style="font-size:14px; color:#1a3a5a;"><i class="fas fa-shield-alt" style="margin-right:10px;"></i>Anda memiliki akses penuh ke sistem. Untuk keamanan, selalu logout setelah selesai.</p>
    </div>

    <form method="POST" action="{{ route('logout') }}" style="margin-top:30px;">
        @csrf
        <button type="submit" style="background:#0b1a2e; color:#fff; border:none; padding:10px 24px; border-radius:30px; cursor:pointer; font-size:14px; font-weight:500;">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </form>
</div>
@endsection