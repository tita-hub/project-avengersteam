@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="text-align: center;">Data Wakil Pialang Team Avangers</h1>

        <div class="wakil-pialang-container">

            <!-- FOTO 1 -->
            <div class="wakil-pialang-card">


                <div class="wakil-pialang-photo">
                    <img src="{{ asset('images/CI CHIRST 1.jpeg') }}" alt="Christin Octavia">
                </div>

                <div class="wakil-pialang-info">
                    <h3>Christin Octavia</h3>
                    <div class="wakil-pialang-detail">

                        <!-- SK WPB -->
                        <div class="wakil-pialang-item">

                            <span class="wakil-pialang-icon">
                                <i class="bi bi-file-earmark-text"></i>
                            </span>

                            <div>
                                <small>SK WPB</small>
                                <strong>0074/UPTP/SI/03/2020</strong>
                            </div>

                        </div>


                        <!-- EMAIL -->
                        <div class="wakil-pialang-item">

                            <span class="wakil-pialang-icon">
                                <i class="bi bi-envelope"></i>
                            </span>

                            <div>
                                <small>Email</small>
                                <strong>email@example.com</strong>
                            </div>

                        </div>

                    </div>
                </div>

            </div>


            <!-- FOTO 2 -->
            <div class="wakil-pialang-card">

                <div class="wakil-pialang-photo">
                    <img src="{{ asset('images/KA DHIANA.jpeg') }}" alt="Dhiana Rizky Wulandari">
                </div>

                <div class="wakil-pialang-info">
                    <h3>Dhiana Rizky Wulandari</h3>
                    <div class="wakil-pialang-detail">

                        <!-- SK WPB -->
                        <div class="wakil-pialang-item">

                            <span class="wakil-pialang-icon">
                                <i class="bi bi-file-earmark-text"></i>
                            </span>

                            <div>
                                <small>SK WPB</small>
                                <strong>0361/UPTP/SI/5/2023</strong>
                            </div>

                        </div>


                        <!-- EMAIL -->
                        <div class="wakil-pialang-item">

                            <span class="wakil-pialang-icon">
                                <i class="bi bi-envelope"></i>
                            </span>

                            <div>
                                <small>Email</small>
                                <strong>email@example.com</strong>
                            </div>

                        </div>

                    </div>
                </div>

            </div>


            <!-- FOTO 3 -->
            <div class="wakil-pialang-card">

                <div class="wakil-pialang-photo">
                    <img src="{{ asset('images/KA GEMPI 1.jpeg') }}" alt="Dian Sri Rahmawati">
                </div>
                <div class="wakil-pialang-info">
                    <h3>Dian Sri Rahmawati</h3>
                    <div class="wakil-pialang-detail">

                        <!-- SK WPB -->
                        <div class="wakil-pialang-item">

                            <span class="wakil-pialang-icon">
                                <i class="bi bi-file-earmark-text"></i>
                            </span>

                            <div>
                                <small>SK WPB</small>
                                <strong>216/UPTP/SI/10/2024</strong>
                            </div>

                        </div>


                        <!-- EMAIL -->
                        <div class="wakil-pialang-item">

                            <span class="wakil-pialang-icon">
                                <i class="bi bi-envelope"></i>
                            </span>

                            <div>
                                <small>Email</small>
                                <strong>email@example.com</strong>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>


    </div>
@endsection
