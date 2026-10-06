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
    <div class="wakil-pialang-icon">
        <i class="bi bi-envelope"></i>
    </div>

    <div>
        <small>Email</small>

        <div class="email-action">
            <a href="mailto:christin.rfbsmg@gmail.com" class="email-link">
                christin.rfbsmg@gmail.com
            </a>

            <button
                type="button"
                class="copy-email-btn"
                onclick="copyEmail('christin.rfbsmg@gmail.com', this)"
                title="Salin email"
            >
                <i class="bi bi-copy"></i>
            </button>
        </div>
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
                                <strong>⁠dhiana.rfbsemarang@gmail.com</strong>
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
                                <strong>diansririfansemarang@gmail.com</strong>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

<script>
function copyEmail(email, button) {
    navigator.clipboard.writeText(email)
        .then(function () {

            const icon = button.querySelector('i');

            icon.classList.remove('bi-copy');
            icon.classList.add('bi-check2');

            button.title = 'Email berhasil disalin';

            setTimeout(function () {
                icon.classList.remove('bi-check2');
                icon.classList.add('bi-copy');

                button.title = 'Salin email';
            }, 1500);

        })
        .catch(function () {
            alert('Email tidak dapat disalin.');
        });
}
</script>

    </div>
@endsection
