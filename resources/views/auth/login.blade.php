<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login | PT Rifan Financindo</title>

    <meta
        name="description"
        content="Halaman login PT Rifan Financindo"
    >

    <!-- Google Font -->
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
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <!-- CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >

</head>

<body>

    <!-- Background Decoration -->

    <div class="background-decoration">

        <div class="gradient-orb orb-one"></div>
        <div class="gradient-orb orb-two"></div>
        <div class="gradient-orb orb-three"></div>

        <div class="grid-overlay"></div>

        <div class="particles">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="finance-line line-one"></div>
        <div class="finance-line line-two"></div>

    </div>


    <!-- Login Page -->

    <main class="login-page">

        <div class="login-container">

            <!-- Login Box -->

            <section class="login-card">

                <div class="login-content">

                    <!-- Logo -->

                    <div class="brand">

                        <img
                            src="{{ asset('images/logo.png') }}"
                            alt="PT Rifan Financindo"
                            class="brand-logo"
                            onerror="this.style.display='none'; document.querySelector('.brand-fallback').style.display='block';"
                        >

                        <div class="brand-fallback">
                            <span>PT RIFAN</span>
                            <small>FINANCINDO</small>
                        </div>

                    </div>


                    <!-- Error Message -->

                    <div
                        id="loginAlert"
                        class="login-alert"
                        role="alert"
                        aria-live="polite"
                    ></div>


                    <!-- Login Form -->

                    <form
                        id="loginForm"
                        action="{{ route('login.attempt') }}"
                        method="POST"
                        autocomplete="off"
                    >

                        @csrf

                        <!-- Username -->

                        <div class="input-group">

                            <i class="bi bi-person input-icon"></i>

                            <input
                                type="text"
                                id="username"
                                name="username"
                                placeholder="Username"
                                maxlength="50"
                                autocomplete="username"
                                required
                            >

                        </div>


                        <!-- Password -->

                        <div class="input-group password-group">

                            <i class="bi bi-lock input-icon"></i>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Password"
                                maxlength="100"
                                autocomplete="current-password"
                                required
                            >

                            <button
                                type="button"
                                id="togglePassword"
                                class="password-toggle"
                                aria-label="Tampilkan password"
                            >
                                <i class="bi bi-eye"></i>
                            </button>

                        </div>


                        <!-- Submit -->

                        <button
                            type="submit"
                            id="loginButton"
                            class="login-button"
                        >

                            <span class="button-text">
                                Sign In
                            </span>

                            <span class="button-loader">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>

                        </button>

                    </form>

                </div>

            </section>

        </div>

    </main>


    <!-- JavaScript -->

    <script
        src="{{ asset('js/script.js') }}"
    ></script>

</body>
</html>
