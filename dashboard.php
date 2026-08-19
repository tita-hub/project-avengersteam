<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php");
    exit;
}
$nama = htmlspecialchars($_SESSION['nama'] ?? 'User');
$role = htmlspecialchars($_SESSION['role'] ?? 'user');
$username = htmlspecialchars($_SESSION['username'] ?? '');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - PT Rifan Financindo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #f0f4f9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background: #0b1a2e;
            color: #fff;
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 20px;
            font-weight: 600;
        }
        .navbar-brand i {
            font-size: 28px;
            color: #6aafda;
        }
        .navbar-brand span { font-weight:300; color:#8ab0d0; }
        .navbar-user {
            display: flex;
            align-items: center;
            gap: 20px;
            font-size: 14px;
        }
        .user-badge {
            background: rgba(255,255,255,0.10);
            padding: 6px 16px;
            border-radius: 30px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .btn-logout {
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.15);
            color: #fff;
            padding: 8px 18px;
            border-radius: 30px;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.25s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-logout:hover {
            background: rgba(255,70,70,0.25);
            border-color: rgba(255,70,70,0.4);
        }
        .container {
            flex: 1;
            padding: 40px 32px;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }
        .welcome-section { margin-bottom: 40px; }
        .welcome-section h1 {
            font-size: 28px;
            font-weight: 600;
            color: #0b1a2e;
        }
        .welcome-section h1 span { color: #1a5a8a; }
        .welcome-section p {
            color: #4a6a8a;
            font-size: 16px;
            margin-top: 4px;
        }
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 24px;
            margin-top: 20px;
        }
        .card {
            background: #ffffff;
            border-radius: 20px;
            padding: 24px 22px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.04);
            border: 1px solid rgba(0,0,0,0.02);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 40px rgba(0,0,0,0.07);
        }
        .card-icon {
            font-size: 28px;
            color: #1a5a8a;
            margin-bottom: 10px;
        }
        .card h3 {
            font-size: 15px;
            font-weight: 500;
            color: #6a8aaa;
            letter-spacing: 0.3px;
            text-transform: uppercase;
            margin-bottom: 6px;
        }
        .card .value {
            font-size: 32px;
            font-weight: 700;
            color: #0b1a2e;
        }
        .card .label {
            font-size: 13px;
            color: #8aabca;
            margin-top: 6px;
        }
        .info-box {
            margin-top: 40px;
            padding: 20px;
            background: #e8f0fe;
            border-radius: 16px;
            border-left: 6px solid #1a5a8a;
            font-size: 14px;
            color: #1a3a5a;
        }
        @media (max-width: 600px) {
            .navbar { flex-direction: column; align-items: stretch; gap: 8px; padding: 12px 16px; }
            .navbar-user { justify-content: space-between; flex-wrap: wrap; }
            .container { padding: 24px 16px; }
            .welcome-section h1 { font-size: 22px; }
            .card-grid { grid-template-columns: 1fr 1fr; gap: 16px; }
            .card { padding: 18px 16px; }
            .card .value { font-size: 26px; }
        }
        @media (max-width: 400px) {
            .card-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">
            <i class="bi bi-building"></i>
            PT Rifan <span>Financindo</span>
        </div>
        <div class="navbar-user">
            <div class="user-badge">
                <i class="bi bi-person-circle"></i>
                <?= $nama; ?>
                <span style="opacity:0.5; margin-left:4px;">(<?= $role; ?>)</span>
            </div>
            <a href="logout.php" class="btn-logout">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </div>
    </nav>
    <div class="container">
        <div class="welcome-section">
            <h1>Selamat datang, <span><?= $nama; ?></span> 👋</h1>
            <p>Anda login sebagai <strong><?= $role; ?></strong> dengan username <strong><?= $username; ?></strong>.</p>
        </div>
        <div class="card-grid">
            <div class="card">
                <div class="card-icon"><i class="bi bi-graph-up-arrow"></i></div>
                <h3>Total Pendapatan</h3>
                <div class="value">Rp 12,8 M</div>
                <div class="label">+8.2% dari bulan lalu</div>
            </div>
            <div class="card">
                <div class="card-icon"><i class="bi bi-people"></i></div>
                <h3>Klien Aktif</h3>
                <div class="value">1,284</div>
                <div class="label">+43 baru minggu ini</div>
            </div>
            <div class="card">
                <div class="card-icon"><i class="bi bi-file-earmark-text"></i></div>
                <h3>Transaksi</h3>
                <div class="value">3,921</div>
                <div class="label">Q1 2026</div>
            </div>
            <div class="card">
                <div class="card-icon"><i class="bi bi-clock"></i></div>
                <h3>Status</h3>
                <div class="value" style="font-size:24px;">Online</div>
                <div class="label">Sesi aktif</div>
            </div>
        </div>
        <div class="info-box">
            <i class="bi bi-shield-lock" style="margin-right:10px;"></i>
            Anda memiliki akses penuh ke sistem. Untuk keamanan, selalu logout setelah selesai.
        </div>
    </div>
</body>
</html>