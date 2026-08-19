<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PT Rifan Financindo</title>
    <!-- Google Fonts & Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* ====== CSS SAMA PERSIS DENGAN YANG DI INDEX.PHP SEBELUMNYA ====== */
        /* (saya salin seluruh style dari file index.php yang sudah Anda miliki) */
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #0b1a2e;
            position: relative;
        }
        .bg-gradient {
            position: fixed;
            top:0; left:0; width:100%; height:100%; z-index:0;
            background: linear-gradient(135deg, #0b1a2e 0%, #1a3a5c 40%, #2a5f7a 70%, #1a3a5c 100%);
            background-size: 400% 400%;
            animation: gradientShift 18s ease-in-out infinite alternate;
        }
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .particles { position:fixed; top:0; left:0; width:100%; height:100%; z-index:1; pointer-events:none; overflow:hidden; }
        .particle {
            position:absolute; border-radius:50%; background:rgba(255,255,255,0.04);
            border:1px solid rgba(255,255,255,0.06);
            animation: floatParticle linear infinite alternate;
        }
        .particle:nth-child(1) { width:120px; height:120px; top:5%; left:3%; animation-duration:22s; }
        .particle:nth-child(2) { width:80px; height:80px; bottom:10%; right:5%; animation-duration:18s; animation-delay:2s; border-radius:30% 70% 50% 50%/50% 40% 60% 50%; }
        .particle:nth-child(3) { width:160px; height:160px; top:50%; left:60%; animation-duration:25s; animation-delay:4s; border-radius:40% 60% 70% 30%/50% 60% 40% 50%; background:rgba(255,255,255,0.02); }
        .particle:nth-child(4) { width:60px; height:60px; bottom:20%; left:10%; animation-duration:16s; animation-delay:1s; border-radius:50% 50% 30% 70%/60% 40% 60% 40%; }
        .particle:nth-child(5) { width:100px; height:100px; top:15%; right:15%; animation-duration:20s; animation-delay:3s; border-radius:60% 40% 50% 50%/40% 60% 40% 60%; background:rgba(255,255,255,0.025); }
        .particle:nth-child(6) { width:200px; height:200px; bottom:-50px; left:50%; transform:translateX(-50%); animation-duration:28s; animation-delay:5s; border-radius:50%; background:rgba(255,255,255,0.015); border-color:rgba(255,255,255,0.03); }
        @keyframes floatParticle {
            0% { transform:translate(0,0) scale(1) rotate(0deg); opacity:0.3; }
            33% { transform:translate(40px,-30px) scale(1.05) rotate(10deg); opacity:0.6; }
            66% { transform:translate(-20px,40px) scale(0.95) rotate(-5deg); opacity:0.4; }
            100% { transform:translate(30px,-20px) scale(1.02) rotate(8deg); opacity:0.5; }
        }
        .glow-ring {
            position:fixed; z-index:1; border-radius:50%; filter:blur(80px); pointer-events:none;
        }
        .glow-ring-1 { width:500px; height:500px; top:-200px; right:-150px; background:rgba(30,100,180,0.15); animation:glowPulse 8s ease-in-out infinite alternate; }
        .glow-ring-2 { width:400px; height:400px; bottom:-150px; left:-100px; background:rgba(200,60,60,0.08); animation:glowPulse 10s ease-in-out infinite alternate-reverse; }
        @keyframes glowPulse {
            0% { opacity:0.5; transform:scale(1); }
            100% { opacity:1; transform:scale(1.1); }
        }
        .login-wrapper {
            position:relative; z-index:10; width:100%; max-width:420px; padding:20px;
            animation: fadeSlideUp 0.9s cubic-bezier(0.16,1,0.3,1) forwards;
            opacity:0; transform:translateY(40px);
        }
        @keyframes fadeSlideUp {
            0% { opacity:0; transform:translateY(40px) scale(0.96); }
            100% { opacity:1; transform:translateY(0) scale(1); }
        }
        .login-box {
            background:rgba(255,255,255,0.96); backdrop-filter:blur(20px); -webkit-backdrop-filter:blur(20px);
            border-radius:24px; padding:44px 36px 40px;
            box-shadow: 0 30px 80px rgba(0,0,0,0.35), 0 0 0 1px rgba(255,255,255,0.08) inset, 0 0 40px rgba(255,255,255,0.03);
            transition: box-shadow 0.4s ease;
        }
        .login-box:hover {
            box-shadow: 0 40px 100px rgba(0,0,0,0.40), 0 0 0 1px rgba(255,255,255,0.10) inset;
        }
        .logo-area { text-align:center; margin-bottom:32px; }
        .logo-area .logo-icon {
            display:inline-flex; align-items:center; justify-content:center;
            width:70px; height:70px; background:linear-gradient(135deg, #0b1a2e, #1a3a5c);
            border-radius:18px; margin-bottom:14px;
            box-shadow:0 8px 24px rgba(11,26,46,0.25);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .logo-area .logo-icon:hover { transform:scale(1.03); box-shadow:0 12px 32px rgba(11,26,46,0.35); }
        .logo-area .logo-icon i { font-size:36px; color:#fff; }
        .logo-area h1 { font-size:22px; font-weight:700; color:#0b1a2e; letter-spacing:-0.5px; margin:0; line-height:1.2; }
        .logo-area h1 span { font-weight:300; color:#4a6a8a; }
        .logo-area .subtitle { font-size:13px; color:#6a8aaa; font-weight:400; letter-spacing:0.3px; margin-top:2px; }
        .logo-divider { width:50px; height:3px; background:linear-gradient(90deg, #1a4a7a, #3a7aaa); border-radius:4px; margin:12px auto 0; opacity:0.5; }

        .input-group { position:relative; margin-bottom:20px; }
        .input-group .input-icon {
            position:absolute; left:16px; top:50%; transform:translateY(-50%);
            color:#8aabca; font-size:16px; transition:color 0.3s ease; pointer-events:none;
        }
        .input-group input {
            width:100%; padding:15px 44px 15px 48px; font-size:15px; font-family:'Poppins',sans-serif;
            font-weight:400; color:#1a2a3a; background:#f2f7fc;
            border:2px solid transparent; border-radius:14px; outline:none;
            transition: all 0.3s cubic-bezier(0.16,1,0.3,1); letter-spacing:0.2px;
        }
        .input-group input::placeholder { color:#9ab0c8; font-weight:300; font-size:14px; }
        .input-group input:focus {
            background:#ffffff; border-color:#1a5a8a; box-shadow:0 0 0 4px rgba(26,90,138,0.10);
        }
        .input-group input:focus + .input-icon { color:#1a5a8a; }
        .input-group input.error { border-color:#d9534f; background:#fff8f7; box-shadow:0 0 0 4px rgba(217,83,79,0.08); }

        .password-toggle {
            position:absolute; right:16px; top:50%; transform:translateY(-50%);
            background:none; border:none; color:#8aabca; font-size:18px; cursor:pointer;
            padding:4px; transition:all 0.25s ease; border-radius:50%;
            display:flex; align-items:center; justify-content:center; width:32px; height:32px;
        }
        .password-toggle:hover { color:#1a5a8a; background:rgba(26,90,138,0.08); }
        .password-toggle:active { transform:translateY(-50%) scale(0.92); }

        .error-message {
            display:flex; align-items:center; gap:10px; background:#fff0ee; border-left:4px solid #d9534f;
            padding:12px 16px; border-radius:12px; margin-bottom:20px; font-size:14px;
            color:#b52a27; font-weight:400; animation:shakeError 0.45s ease;
        }
        .error-message i { font-size:18px; color:#d9534f; flex-shrink:0; }
        @keyframes shakeError {
            0%,100% { transform:translateX(0); }
            20% { transform:translateX(-6px); }
            40% { transform:translateX(6px); }
            60% { transform:translateX(-4px); }
            80% { transform:translateX(4px); }
        }

        .btn-signin {
            width:100%; padding:16px 20px; font-size:16px; font-weight:600; font-family:'Poppins',sans-serif;
            color:#fff; background:linear-gradient(135deg, #0b2a4a, #1a5a8a);
            border:none; border-radius:14px; cursor:pointer;
            transition: all 0.35s cubic-bezier(0.16,1,0.3,1);
            box-shadow:0 6px 20px rgba(26,90,138,0.30); letter-spacing:0.5px;
            display:flex; align-items:center; justify-content:center; gap:10px; margin-top:4px;
        }
        .btn-signin:hover { transform:translateY(-2px); box-shadow:0 10px 32px rgba(26,90,138,0.40); background:linear-gradient(135deg, #123a5a, #1a6a9a); }
        .btn-signin:active { transform:translateY(0px) scale(0.98); box-shadow:0 4px 12px rgba(26,90,138,0.25); }
        .btn-signin:disabled { opacity:0.8; cursor:not-allowed; transform:none !important; }
        .btn-signin .btn-loader { display:none; width:24px; height:24px; border:3px solid rgba(255,255,255,0.2); border-top-color:#fff; border-radius:50%; animation:spinLoader 0.7s linear infinite; }
        .btn-signin.loading .btn-text { opacity:0; }
        .btn-signin.loading .btn-loader { display:block; }
        @keyframes spinLoader { to { transform:rotate(360deg); } }

        .login-footer { text-align:center; margin-top:22px; font-size:12px; color:#8aabca; font-weight:300; letter-spacing:0.2px; }
        .login-footer a { color:#1a5a8a; text-decoration:none; font-weight:500; transition:color 0.2s ease; }
        .login-footer a:hover { color:#0b2a4a; text-decoration:underline; }

        /* Responsive */
        @media (max-width:768px) {
            .login-wrapper { padding:16px; max-width:380px; }
            .login-box { padding:32px 24px 30px; border-radius:20px; }
            .logo-area .logo-icon { width:60px; height:60px; }
            .logo-area .logo-icon i { font-size:30px; }
            .logo-area h1 { font-size:19px; }
            .input-group input { padding:13px 40px 13px 44px; font-size:14px; }
            .btn-signin { padding:14px 18px; font-size:15px; }
        }
        @media (max-width:480px) {
            .login-wrapper { padding:12px; max-width:100%; }
            .login-box { padding:24px 18px 24px; border-radius:16px; }
            .logo-area .logo-icon { width:52px; height:52px; border-radius:14px; }
            .logo-area .logo-icon i { font-size:26px; }
            .logo-area h1 { font-size:17px; }
            .input-group input { padding:12px 36px 12px 40px; font-size:13px; border-radius:12px; }
            .btn-signin { padding:13px 16px; font-size:14px; border-radius:12px; }
        }
    </style>
</head>
<body>
    <div class="bg-gradient"></div>
    <div class="glow-ring glow-ring-1"></div>
    <div class="glow-ring glow-ring-2"></div>
    <div class="particles">
        <div class="particle"></div><div class="particle"></div><div class="particle"></div>
        <div class="particle"></div><div class="particle"></div><div class="particle"></div>
    </div>

    <div class="login-wrapper">
        <div class="login-box">
            <div class="logo-area">
                <div class="logo-icon"><i class="fas fa-building"></i></div>
                <h1>PT Rifan <span>Financindo</span></h1>
                <div class="subtitle">Secure Access Portal</div>
                <div class="logo-divider"></div>
            </div>

            @if ($errors->any())
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $errors->first('username') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="login-form" id="loginForm">
                @csrf
                <div class="input-group">
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <button type="button" class="password-toggle" id="togglePassword" aria-label="Toggle visibility">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <button type="submit" class="btn-signin" id="signinBtn">
                    <span class="btn-text"><i class="fas fa-arrow-right" style="margin-right:8px;"></i>Sign In</span>
                    <span class="btn-loader"></span>
                </button>
            </form>

            <div class="login-footer">
                &copy; 2026 PT Rifan Financindo &bull; All rights reserved.
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggle = document.getElementById('togglePassword');
            const pwd = document.getElementById('password');
            toggle.addEventListener('click', function() {
                const type = pwd.getAttribute('type') === 'password' ? 'text' : 'password';
                pwd.setAttribute('type', type);
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });

            // Loading state on submit
            const form = document.getElementById('loginForm');
            const btn = document.getElementById('signinBtn');
            form.addEventListener('submit', function() {
                btn.classList.add('loading');
                btn.disabled = true;
            });
        });
    </script>
</body>
</html>