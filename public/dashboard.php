<?php

declare(strict_types=1);

require_once __DIR__ . '/auth/auth_check.php';


/*
|--------------------------------------------------------------------------
| User Data From Session
|--------------------------------------------------------------------------
*/

$userId = (int) ($_SESSION['user_id'] ?? 0);

$username = htmlspecialchars(
    (string) ($_SESSION['username'] ?? ''),
    ENT_QUOTES,
    'UTF-8'
);

$nama = htmlspecialchars(
    (string) ($_SESSION['nama'] ?? ''),
    ENT_QUOTES,
    'UTF-8'
);

$role = htmlspecialchars(
    (string) ($_SESSION['role'] ?? ''),
    ENT_QUOTES,
    'UTF-8'
);

?>
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard | PT Rifan Financindo</title>

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
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

</head>

<body class="dashboard-body">

    <header class="dashboard-navbar">

        <div class="dashboard-brand">

            <div class="dashboard-brand-text">
                PT RIFAN
                <span>FINANCINDO</span>
            </div>

        </div>


        <div class="dashboard-user">

            <div class="user-info">

                <strong>
                    <?= $nama; ?>
                </strong>

                <span>
                    @<?= $username; ?>
                </span>

            </div>


            <div class="user-avatar">

                <?= strtoupper(
                    substr($nama, 0, 1)
                ); ?>

            </div>


            <form
                action="logout.php"
                method="POST"
            >

                <button
                    type="submit"
                    class="logout-button"
                    title="Logout"
                >

                    <i class="bi bi-box-arrow-right"></i>

                </button>

            </form>

        </div>

    </header>


    <main class="dashboard-main">

        <section class="welcome-section">

            <div>

                <p class="dashboard-label">
                    DASHBOARD
                </p>

                <h1>
                    Selamat datang, <?= $nama; ?>.
                </h1>

                <p>
                    Anda berhasil masuk ke sistem PT Rifan Financindo.
                </p>

            </div>

            <div class="role-badge">

                <i class="bi bi-shield-check"></i>

                <?= ucfirst($role); ?>

            </div>

        </section>


        <section class="stats-grid">

            <div class="stat-card">

                <div class="stat-icon">
                    <i class="bi bi-people"></i>
                </div>

                <div>

                    <span>
                        Total User
                    </span>

                    <strong>
                        128
                    </strong>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>

                <div>

                    <span>
                        Aktivitas
                    </span>

                    <strong>
                        86%
                    </strong>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon">
                    <i class="bi bi-shield-check"></i>
                </div>

                <div>

                    <span>
                        Status
                    </span>

                    <strong>
                        Active
                    </strong>

                </div>

            </div>

        </section>


        <section class="dashboard-panel">

            <div class="panel-header">

                <div>

                    <h2>
                        Overview
                    </h2>

                    <p>
                        Ringkasan sistem dashboard.
                    </p>

                </div>

                <i class="bi bi-bar-chart-line"></i>

            </div>


            <div class="overview-content">

                <div class="overview-line">

                    <span>
                        User ID
                    </span>

                    <strong>
                        #<?= $userId; ?>
                    </strong>

                </div>


                <div class="overview-line">

                    <span>
                        Username
                    </span>

                    <strong>
                        <?= $username; ?>
                    </strong>

                </div>


                <div class="overview-line">

                    <span>
                        Role
                    </span>

                    <strong>
                        <?= ucfirst($role); ?>
                    </strong>

                </div>


                <div class="overview-line">

                    <span>
                        Session
                    </span>

                    <strong class="status-active">
                        <span></span>
                        Active
                    </strong>

                </div>

            </div>

        </section>

    </main>

</body>
</html>