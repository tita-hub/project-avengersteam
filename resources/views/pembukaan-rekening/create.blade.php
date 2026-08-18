@extends('layouts.app')

@section('title', 'Ajukan Pembukaan Rekening — RFB Semarang')

@section('content')

<section class="form-sec">
  <div class="wrap wrap-narrow">
    <div class="eyebrow">Pembukaan Rekening</div>
    <h2>Ajukan pembukaan rekening.</h2>
    <p class="sub">Isi data di bawah, tim kami akan menghubungi kamu untuk proses selanjutnya.</p>

    @if (session('sukses'))
      <div class="alert alert-sukses">{{ session('sukses') }}</div>
    @endif

    @if ($errors->any())
      <div class="alert alert-error">
        <strong>Periksa kembali data kamu:</strong>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('pembukaan-rekening.store') }}" class="form-card">
      @csrf

      <div class="field">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Sesuai KTP" required>
      </div>

      <div class="field-row">
        <div class="field">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required>
        </div>
        <div class="field">
          <label for="no_hp">No. HP / WhatsApp</label>
          <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" placeholder="08xxxxxxxxxx" required>
        </div>
      </div>

      <div class="field">
        <label for="nik">NIK</label>
        <input type="text" id="nik" name="nik" value="{{ old('nik') }}" placeholder="16 digit sesuai KTP" maxlength="16" required>
      </div>

      <div class="field">
        <label>Produk yang Diminati</label>
        <div class="radio-row">
          <label class="radio-opt">
            <input type="radio" name="produk_diminati" value="emas" {{ old('produk_diminati') == 'emas' ? 'checked' : '' }} required>
            <span>Komoditas — Emas</span>
          </label>
          <label class="radio-opt">
            <input type="radio" name="produk_diminati" value="nikkei" {{ old('produk_diminati') == 'nikkei' ? 'checked' : '' }}>
            <span>Indeks Saham — Nikkei</span>
          </label>
          <label class="radio-opt">
            <input type="radio" name="produk_diminati" value="aud" {{ old('produk_diminati') == 'aud' ? 'checked' : '' }}>
            <span>Forex — AUD</span>
          </label>
        </div>
      </div>

      <div class="field">
        <label for="catatan">Catatan (opsional)</label>
        <textarea id="catatan" name="catatan" rows="3" placeholder="Pertanyaan atau permintaan khusus">{{ old('catatan') }}</textarea>
      </div>

      <button type="submit" class="btn btn-gold btn-block">Kirim Pengajuan</button>
    </form>
  </div>
</section>

@endsection
