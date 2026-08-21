@extends('layouts.app')

@section('content')
<div class="container">

    <h2 style="color:green">
        Tentang RFB Semarang</h2>

    <h1>Pialang Profesional Pilihan Ribuan Nasabah Di Indonesia</h1>

    <p style="text-align: justify;">
        PT Rifan Financindo Berjangka (“RFB”) berpengalaman lebih dari 20 tahun di industri Perdagangan Berjangka 
        Komoditi dan merupakan perusahaan pialang terbesar dengan menduduki posisi teratas dari 10 perusahaan 
        pialang berjangka teraktif dari PT Kliring Berjangka Indonesia (Persero). Selain anggota dari KBI (Persero), 
        PT Rifan Financindo Berjangka juga merupakan anggota PT Bursa Berjangka Jakarta dan terdaftar resmi di Badan 
        Pengawas Perdagangan Berjangka Komoditi (BAPPEBTI). Sejak tahun 2000, PT Rifan Financindo Berjangka terus 
        berkembang dengan jumlah kantor operasional sekarang di Jakarta (2 kantor), Bandung, Semarang, Solo, 
        Yogyakarta, Surabaya, Medan, Pekanbaru dan Palembang.</p>

    <p style="text-align: justify;">
        PT. Rifan Financindo Berjangka Semarang hadir sebagai perusahaan yang berorientasi kepada layanan jasa yang 
        memberikan fasilitas dan edukasi terbaik bagi masyarakat yang tertarik untuk mendapatkan keuntungan dalam 
        perdagangan komoditas dan pasar derivatif di Indonesia. Perusahaan telah didukung oleh teknologi informasi yang 
        mumpuni dan sumber daya manusia profesional yang memenuhi standar kualifikasi kepatutan dan kompetensi 
        oleh pemerintah yang dinaungi oleh Badan Pengawas Perdagangan Berjangka Komoditi (BAPPEBTI).

    </p>

    <h1>
        Legalitas Perusahaan
    </h1>

    <h2>Perusahaan kami terdaftar resmi dan legal secara hukum.</h2>

    <p>

        <ul>
            <li>
                Akta Perubahan Anggaran Dasar PT Rifan Financindo Komoditas No. 32 pada tanggal 7 Maret 2000 oleh Notaris 
                Linda Ibrahim SH.
            </li>

            <li>
                Pengesahan Departemen Hukum dan Perundang Undangan Republik Indonesia No : C-21254 HT.01.04.TH.2000
            </li>
            
             <li>
                Surat Persetujuan Anggota Bursa (SPAB) di Bursa Berjangka Jakarta No : SPAB-024/BBJ/09/00
            </li>

             <li>
                Izin Usaha Pialang Berjangka : Keputusan Kepala BAPPEBTI No : 08/BAPPEBTI/SI/XII/2000
            </li>

             <li>
                Anggota PT Kliring Berjangka Indonesia No : 03/AK-KJBK/XII/2000
            </li>

             <li>
                Perjanjian Kerjasama dengan Pedagang Penyelenggara SPA, PT Royal Assetindo No : 017/KOM/RFB-RA/III/2006
            </li>

             <li>
                Pemberian persetujuan sebagai peserta SPA dari BAPPEBTI No : 1162/BAPPEBTI/SP/5/2007
            </li>

             <li>
                Penetapan sebagai Pialang Berjangka yang melakukan kegiatan penerimaan calon nasabah secara Elektronik 
                On-Line di bidang Perdagangan Berjangka Komoditi kepada PT Rifan Financindo Berjangka 
                No : 28/BAPPEBTI/KEP-PBK/09/2014

            </li>
        </ul>

        

    </p>

    <div style="display: flex; gap: 30px; justify-content: center;">

        <div>
            <img src="{{ asset('images/1.png') }}"
                alt="Foto 1"
                style="width: 70px; height: 70px; object-fit: contain; border-radius: 5px;">
        </div>

        <div>
            <img src="{{ asset('images/2.png') }}"
                alt="Foto 2"
                style="width: 70px; height: 70px; object-fit: contain; border-radius: 5px;">
        </div>

        <div>
            <img src="{{ asset('images/3.png') }}"
                alt="Foto 3"
                style="width: 70px; height: 70px; object-fit: contain; border-radius: 5px;">
        </div>

        <div>
            <img src="{{ asset('images/4.png') }}"
                alt="Foto 4"
                style="width: 50px; height: 50px; object-fit: contain; border-radius: 5px;">
        </div>

    </div>


</div>
@endsection