<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - AvengersTeam</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="login-body">
    <div class="login-page-title">Login</div>
    <div class="login-card">
        <div class="login-brand">AVENGERSTEAM<sup>®</sup></div>

        @if($errors->any())
            <div class="login-error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <input class="login-input" type="email" name="email" value="{{ old('email') }}" placeholder="Username" autocomplete="username" required>
            <div class="password-wrap">
                <input id="password" class="login-input" type="password" name="password" placeholder="Password" autocomplete="current-password" required>
                <button type="button" class="eye-btn" onclick="togglePassword()" aria-label="Tampilkan password">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12Z"/><circle cx="12" cy="12" r="2.7"/></svg>
                </button>
            </div>
            <button class="signin-btn" type="submit">Sign In</button>
        </form>
    </div>
<script>
function togglePassword() {
    const input = document.getElementById('password');
    input.type = input.type === 'password' ? 'text' : 'password';
}
</script>
</body>
</html>
