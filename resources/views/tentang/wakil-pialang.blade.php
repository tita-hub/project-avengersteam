@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Wakil Pialang</h1>

    <p>
        Intinya Anu
    </p>


    <div style="width: 100%; margin: 0 auto;">

    <!-- FOTO 1 -->
        <div style="display: flex; align-items: center; gap: 20px; border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 10px;">


            <img src="{{ asset('images/5.jpg') }}"
                alt="Foto 1"
                style="width: 170px; height: 200px; object-fit: contain;">

            <div style="text-align: justify;">
                <h3>Christin Octavia</h3>
                <p>
                    Tambahkan Info mengenai Beliau.
                </p>
            </div>

        </div>


        <!-- FOTO 2 -->
        <div style="display: flex; align-items: center; gap: 20px; border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 10px;">

            <img src="{{ asset('images/5.jpg') }}"
                alt="Foto 2"
                style="width: 170px; height: 200px; object-fit: contain;">

            <div style="text-align: justify;">
                <h3>Dhiana Rizky Wulandari</h3>
                <p>
                    Tambahkan Info mengenai Beliau.
                </p>
            </div>

        </div>


        <!-- FOTO 3 -->
        <div style="display: flex; align-items: center; gap: 20px; border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 10px;">

            <img src="{{ asset('images/6.jpg') }}"
                alt="Foto 3"
                style="width: 170px; height: 200px; object-fit: contain;">

            <div style="text-align: justify;">
                <h3>Dian Sri Rahmawati</h3>
                <p>
                    Tambahkan Info mengenai Beliau.
                </p>
            </div>

        </div>

    </div>


    <h2>Anggota Team Avangers</h2>

</div>


</div>
@endsection