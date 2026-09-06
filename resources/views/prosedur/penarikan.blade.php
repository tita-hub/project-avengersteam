@extends('layouts.app')

@section('content')

<style>

/* ============================================================
   HALAMAN PROSEDUR PENARIKAN
   TEMA : CORPORATE CLEAN - MAROON + GREEN + WHITE
   ============================================================ */

.withdrawal-page {

    --maroon: #8b2635;
    --maroon-dark: #6f1d2a;
    --maroon-soft: #f8edef;

    --green: #3f725d;
    --green-dark: #315b4a;
    --green-soft: #edf4f0;

    --text: #30343b;
    --text-soft: #69727d;
    --muted: #87909a;

    --border: #e5e8eb;
    --surface: #ffffff;
    --background: #f7f8f7;

    padding: 35px 45px 70px;

    background:
        radial-gradient(
            circle at top right,
            rgba(63,114,93,.035),
            transparent 30%
        ),
        var(--background);

    min-height: 100vh;

    box-sizing: border-box;
}


/* ============================================================
   KEMBALI
   ============================================================ */

.withdrawal-back {

    max-width: 1050px;

    margin: 0 auto 18px;
}

.withdrawal-back a {

    display: inline-flex;

    align-items: center;

    gap: 9px;

    color: var(--maroon);

    text-decoration: none;

    font-size: 14px;

    font-weight: 700;

    transition: .3s ease;
}

.withdrawal-back a:hover {

    color: var(--green);

    transform: translateX(-4px);
}

.withdrawal-back-arrow {

    width: 32px;
    height: 32px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 10px;

    background: var(--surface);

    border: 1px solid var(--border);

    color: var(--maroon);

    font-size: 18px;

    box-shadow:
        0 5px 15px rgba(35,45,40,.055);

    transition: .3s ease;
}

.withdrawal-back a:hover .withdrawal-back-arrow {

    background: var(--maroon);

    color: white;

    border-color: var(--maroon);

    transform: translateX(-2px);
}


/* ============================================================
   HERO HEADER
   ============================================================ */

.withdrawal-header {

    max-width: 1050px;

    margin: 0 auto 30px;

    position: relative;

    overflow: hidden;

    padding: 42px 45px;

    border-radius: 22px;

    background: var(--surface);

    color: var(--text);

    border: 1px solid var(--border);

    box-shadow:
        0 12px 35px rgba(38,48,43,.065);

    animation: withdrawalHero .7s ease;
}


/* garis identitas */

.withdrawal-header-line {

    position: absolute;

    left: 0;
    top: 0;

    width: 100%;
    height: 4px;

    background:
        linear-gradient(
            90deg,
            var(--maroon) 0%,
            var(--maroon) 68%,
            var(--green) 100%
        );
}


/* dekorasi kanan */

.withdrawal-header::before {

    content: "";

    position: absolute;

    width: 230px;
    height: 230px;

    right: -105px;
    top: -125px;

    border-radius: 50%;

    border:
        35px solid rgba(139,38,53,.035);

    pointer-events: none;
}

.withdrawal-header::after {

    content: "";

    position: absolute;

    width: 110px;
    height: 110px;

    right: 90px;
    bottom: -70px;

    border-radius: 50%;

    background:
        rgba(63,114,93,.035);

    pointer-events: none;
}


/* isi hero */

.withdrawal-header-content {

    position: relative;

    z-index: 2;

    max-width: 850px;
}


/* label */

.withdrawal-header-label {

    display: inline-flex;

    align-items: center;

    gap: 8px;

    padding: 7px 13px;

    margin-bottom: 17px;

    border-radius: 30px;

    background:
        var(--maroon-soft);

    border:
        1px solid rgba(139,38,53,.10);

    color: var(--maroon);

    font-size: 11px;

    font-weight: 800;

    letter-spacing: 1.2px;

    text-transform: uppercase;
}

.withdrawal-header-label::before {

    content: "";

    width: 7px;
    height: 7px;

    border-radius: 50%;

    background: var(--maroon);

    box-shadow:
        0 0 0 4px rgba(139,38,53,.08);
}


/* judul */

.withdrawal-header h1 {

    margin: 0 0 12px;

    color: #292d33;

    font-size: 38px;

    line-height: 1.2;

    font-weight: 800;

    letter-spacing: -.4px;
}

.withdrawal-header h1 span {

    color: var(--maroon);
}


/* deskripsi */

.withdrawal-header p {

    margin: 0;

    max-width: 800px;

    color: var(--text-soft);

    font-size: 15px;

    line-height: 1.8;
}

.withdrawal-header strong {

    color: var(--maroon);
}


/* status */

.withdrawal-status {

    display: inline-flex;

    align-items: center;

    gap: 10px;

    margin-top: 23px;

    padding: 10px 15px;

    background:
        #fafbfa;

    border:
        1px solid #e4e9e6;

    border-radius: 12px;

    color: #66716b;

    font-size: 12px;
}

.withdrawal-status-dot {

    width: 8px;
    height: 8px;

    border-radius: 50%;

    background: var(--green);

    box-shadow:
        0 0 0 4px rgba(63,114,93,.09);
}


/* ============================================================
   EFFECTIVE MARGIN
   ============================================================ */

.margin-info {

    max-width: 1050px;

    margin: 0 auto 38px;

    position: relative;

    display: flex;

    align-items: flex-start;

    gap: 15px;

    padding: 21px 24px;

    background:
        #fbfcfb;

    border:
        1px solid #dfe8e3;

    border-radius: 16px;

    box-shadow:
        0 6px 20px rgba(38,48,43,.04);

    animation: withdrawalFadeUp .7s ease;
}


/* garis kiri hijau */

.margin-info::before {

    content: "";

    position: absolute;

    left: 0;
    top: 0;
    bottom: 0;

    width: 4px;

    background: var(--green);

    border-radius:
        4px 0 0 4px;
}


/* icon */

.margin-icon {

    width: 43px;
    height: 43px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 12px;

    background: var(--green-soft);

    color: var(--green-dark);

    font-size: 19px;

    font-weight: 900;

    border:
        1px solid rgba(63,114,93,.08);
}

.margin-info h3 {

    margin: 0 0 5px;

    color: var(--green-dark);

    font-size: 16px;

    font-weight: 800;
}

.margin-info p {

    margin: 0;

    color: #68736d;

    font-size: 13px;

    line-height: 1.8;
}

.margin-info strong {

    color: #3f5148;
}


/* ============================================================
   SECTION TITLE
   ============================================================ */

.withdrawal-section-title {

    max-width: 1050px;

    margin: 0 auto 22px;
}

.withdrawal-title-row {

    display: flex;

    align-items: center;

    gap: 13px;
}

.withdrawal-title-icon {

    width: 43px;
    height: 43px;

    display: flex;

    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 13px;

    background: var(--maroon-soft);

    color: var(--maroon);

    font-size: 18px;

    font-weight: 900;

    border:
        1px solid rgba(139,38,53,.08);

    box-shadow:
        0 6px 15px rgba(139,38,53,.06);
}

.withdrawal-section-title h2 {

    margin: 0;

    color: #34383e;

    font-size: 25px;

    font-weight: 800;
}

.withdrawal-section-title p {

    margin: 5px 0 0 56px;

    color: var(--muted);

    font-size: 13px;
}


/* ============================================================
   TIMELINE
   ============================================================ */

.withdrawal-timeline {

    max-width: 1050px;

    margin: 0 auto;

    position: relative;
}


/* garis timeline */

.withdrawal-timeline::before {

    content: "";

    position: absolute;

    left: 31px;

    top: 32px;

    bottom: 32px;

    width: 2px;

    background:
        linear-gradient(
            to bottom,
            rgba(139,38,53,.38),
            #dfe5e2
        );

    border-radius: 10px;
}


/* ============================================================
   STEP
   ============================================================ */

.withdrawal-step {

    display: flex;

    align-items: flex-start;

    gap: 22px;

    margin-bottom: 22px;

    position: relative;

    animation:
        withdrawalStep .65s ease both;
}

.withdrawal-step:nth-child(1) {
    animation-delay: .05s;
}

.withdrawal-step:nth-child(2) {
    animation-delay: .13s;
}

.withdrawal-step:nth-child(3) {
    animation-delay: .21s;
}


/* ============================================================
   NOMOR STEP
   ============================================================ */

.withdrawal-step-number {

    width: 63px;
    height: 63px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    position: relative;

    z-index: 3;

    border-radius: 18px;

    background: white;

    border:
        2px solid rgba(139,38,53,.55);

    color: var(--maroon);

    font-size: 15px;

    font-weight: 900;

    box-shadow:
        0 7px 18px rgba(38,48,43,.065);

    transition: .3s ease;
}

.withdrawal-step:hover
.withdrawal-step-number {

    background: var(--maroon);

    color: white;

    border-color: var(--maroon);

    transform:
        rotate(-3deg)
        scale(1.04);
}


/* ============================================================
   CARD STEP
   ============================================================ */

.withdrawal-card {

    flex: 1;

    position: relative;

    padding: 27px 30px;

    background: white;

    border:
        1px solid var(--border);

    border-radius: 17px;

    box-shadow:
        0 6px 20px rgba(38,48,43,.045);

    transition:
        transform .3s ease,
        box-shadow .3s ease,
        border-color .3s ease;
}


/* garis kiri */

.withdrawal-card::before {

    content: "";

    position: absolute;

    left: 0;

    top: 20px;
    bottom: 20px;

    width: 3px;

    background: var(--maroon);

    border-radius:
        0 4px 4px 0;

    opacity: 0;

    transition: .3s ease;
}

.withdrawal-card:hover {

    transform:
        translateX(4px);

    border-color:
        rgba(139,38,53,.20);

    box-shadow:
        0 13px 28px rgba(38,48,43,.075);
}

.withdrawal-card:hover::before {

    opacity: 1;
}


/* judul */

.withdrawal-card h3 {

    margin: 0 0 10px;

    color: #34383e;

    font-size: 19px;

    font-weight: 800;
}

.withdrawal-card p {

    margin: 0;

    color: var(--text-soft);

    font-size: 14px;

    line-height: 1.8;
}

.withdrawal-card strong {

    color: var(--maroon);
}


/* ============================================================
   NOTE / CHECKLIST
   ============================================================ */

.step-note {

    display: flex;

    flex-wrap: wrap;

    gap: 10px;

    margin-top: 18px;
}

.note-item {

    display: flex;

    align-items: center;

    gap: 7px;

    padding: 9px 13px;

    background: #fafbfb;

    border:
        1px solid #e5e9e7;

    border-radius: 10px;

    color: #59645f;

    font-size: 12px;

    transition: .25s ease;
}

.note-item::before {

    content: "✓";

    width: 20px;
    height: 20px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 6px;

    background: var(--green-soft);

    color: var(--green-dark);

    font-size: 11px;

    font-weight: 900;
}

.note-item:hover {

    background:
        var(--green-soft);

    border-color:
        rgba(63,114,93,.18);

    transform:
        translateY(-2px);
}


/* ============================================================
   LEGALITAS
   ============================================================ */

.withdrawal-legal-section {

    max-width: 1050px;

    margin: 52px auto 0;
}

.withdrawal-legal-grid {

    display: grid;

    grid-template-columns:
        repeat(4, 1fr);

    gap: 16px;
}


/* card */

.withdrawal-legal-card {

    position: relative;

    padding: 23px;

    background: white;

    border:
        1px solid var(--border);

    border-radius: 16px;

    text-decoration: none;

    overflow: hidden;

    box-shadow:
        0 6px 20px rgba(38,48,43,.04);

    transition: .3s ease;
}


/* garis atas */

.withdrawal-legal-card::before {

    content: "";

    position: absolute;

    left: 0;
    top: 0;

    width: 100%;
    height: 3px;

    background:
        linear-gradient(
            90deg,
            var(--maroon),
            var(--green)
        );

    transform:
        scaleX(0);

    transform-origin:
        center;

    transition:
        transform .3s ease;
}

.withdrawal-legal-card:hover::before {

    transform:
        scaleX(1);
}

.withdrawal-legal-card:hover {

    transform:
        translateY(-4px);

    border-color:
        rgba(139,38,53,.18);

    box-shadow:
        0 13px 28px rgba(38,48,43,.075);
}


/* icon */

.withdrawal-legal-icon {

    width: 42px;
    height: 42px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin-bottom: 14px;

    border-radius: 12px;

    background:
        var(--maroon-soft);

    color:
        var(--maroon);

    font-size: 17px;

    font-weight: 900;

    transition: .3s ease;
}

.withdrawal-legal-card:hover
.withdrawal-legal-icon {

    background:
        var(--maroon);

    color: white;

    transform:
        scale(1.04);
}


/* arrow kanan atas */

.withdrawal-legal-card::after {

    content: "↗";

    position: absolute;

    top: 19px;
    right: 19px;

    width: 30px;
    height: 30px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 9px;

    background:
        var(--green-soft);

    color:
        var(--green-dark);

    font-size: 15px;

    font-weight: 900;

    transition: .3s ease;
}

.withdrawal-legal-card:hover::after {

    background:
        var(--green);

    color: white;

    transform:
        translate(2px,-2px);
}


.withdrawal-legal-card h3 {

    margin: 0 0 6px;

    color: #34383e;

    font-size: 16px;

    line-height: 1.4;

    font-weight: 800;
}

.withdrawal-legal-card span {

    color:
        var(--green-dark);

    font-size: 12px;

    font-weight: 700;
}


/* ============================================================
   HELP
   ============================================================ */

.withdrawal-help-section {

    max-width: 1050px;

    margin: 25px auto 0;

    display: grid;

    grid-template-columns:
        repeat(2, 1fr);

    gap: 16px;
}

.withdrawal-help-card {

    position: relative;

    padding: 21px 23px;

    background: white;

    border:
        1px solid var(--border);

    border-radius: 16px;

    text-decoration: none;

    overflow: hidden;

    box-shadow:
        0 6px 20px rgba(38,48,43,.035);

    transition: .3s ease;
}

.withdrawal-help-card::before {

    content: "";

    position: absolute;

    left: 0;
    top: 0;
    bottom: 0;

    width: 3px;

    background:
        var(--green);

    transform:
        scaleY(0);

    transform-origin:
        bottom;

    transition: .3s ease;
}

.withdrawal-help-card:hover {

    transform:
        translateY(-3px);

    border-color:
        rgba(63,114,93,.18);

    box-shadow:
        0 12px 26px rgba(38,48,43,.065);
}

.withdrawal-help-card:hover::before {

    transform:
        scaleY(1);
}

.withdrawal-help-card h3 {

    margin: 0 0 7px;

    color: #34383e;

    font-size: 16px;

    font-weight: 800;
}

.withdrawal-help-card span {

    color:
        var(--green-dark);

    font-size: 13px;

    font-weight: 600;
}


/* ============================================================
   WARNING
   ============================================================ */

.withdrawal-warning {

    max-width: 1050px;

    margin: 38px auto 0;

    position: relative;

    padding: 24px 27px 24px 30px;

    background:
        #fbfaf8;

    border:
        1px solid #e9e3da;

    border-radius: 17px;

    overflow: hidden;

    box-shadow:
        0 6px 20px rgba(38,48,43,.035);
}

.withdrawal-warning::before {

    content: "";

    position: absolute;

    left: 0;
    top: 0;
    bottom: 0;

    width: 4px;

    background:
        var(--maroon);
}

.withdrawal-warning-title {

    display: flex;

    align-items: center;

    gap: 10px;

    margin-bottom: 10px;

    color: var(--maroon);

    font-size: 17px;

    font-weight: 800;
}

.withdrawal-warning-icon {

    width: 31px;
    height: 31px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 9px;

    background:
        var(--maroon-soft);

    color: var(--maroon);

    font-size: 15px;

    font-weight: 900;

    border:
        1px solid rgba(139,38,53,.08);
}

.withdrawal-warning p {

    margin: 0 0 10px;

    color: #6c6b68;

    font-size: 13px;

    line-height: 1.8;
}

.withdrawal-warning p:last-child {

    margin-bottom: 0;
}

.withdrawal-warning strong {

    color: #4d4a46;
}


/* ============================================================
   FOOTER LINKS
   ============================================================ */

.withdrawal-footer-links {

    max-width: 1050px;

    margin: 35px auto 0;

    padding-top: 25px;

    border-top:
        1px solid #e2e5e4;

    text-align: center;
}

.withdrawal-footer-links a {

    color:
        #7b8491;

    text-decoration: none;

    font-size: 12px;

    transition: .3s ease;
}

.withdrawal-footer-links a:hover {

    color:
        var(--maroon);
}


/* ============================================================
   ANIMASI
   ============================================================ */

@keyframes withdrawalHero {

    from {

        opacity: 0;

        transform:
            translateY(-20px);
    }

    to {

        opacity: 1;

        transform:
            translateY(0);
    }
}


@keyframes withdrawalStep {

    from {

        opacity: 0;

        transform:
            translateY(25px);
    }

    to {

        opacity: 1;

        transform:
            translateY(0);
    }
}


@keyframes withdrawalFadeUp {

    from {

        opacity: 0;

        transform:
            translateY(20px);
    }

    to {

        opacity: 1;

        transform:
            translateY(0);
    }
}


/* ============================================================
   RESPONSIVE
   ============================================================ */

@media (max-width: 1000px) {

    .withdrawal-legal-grid {

        grid-template-columns:
            repeat(2, 1fr);
    }
}


@media (max-width: 900px) {

    .withdrawal-page {

        padding:
            30px 20px 55px;
    }

    .withdrawal-header {

        padding:
            35px 30px;
    }

    .withdrawal-header h1 {

        font-size: 32px;
    }

    .withdrawal-help-section {

        grid-template-columns:
            1fr;
    }
}


@media (max-width: 600px) {

    .withdrawal-page {

        padding:
            22px 15px 45px;
    }

    .withdrawal-header {

        padding:
            30px 22px;

        border-radius:
            19px;
    }

    .withdrawal-header h1 {

        font-size:
            27px;
    }

    .withdrawal-header p {

        font-size:
            13px;
    }

    .withdrawal-status {

        align-items:
            flex-start;

        line-height:
            1.5;
    }

    .margin-info {

        padding:
            18px;
    }

    .withdrawal-section-title h2 {

        font-size:
            21px;
    }

    .withdrawal-section-title p {

        margin-left:
            0;
    }

    .withdrawal-title-icon {

        width:
            39px;

        height:
            39px;
    }

    .withdrawal-timeline::before {

        left:
            24px;
    }

    .withdrawal-step {

        gap:
            14px;
    }

    .withdrawal-step-number {

        width:
            49px;

        height:
            49px;

        border-radius:
            14px;

        font-size:
            12px;
    }

    .withdrawal-card {

        padding:
            20px;

        border-radius:
            15px;
    }

    .withdrawal-card h3 {

        font-size:
            16px;
    }

    .withdrawal-card p {

        font-size:
            13px;
    }

    .withdrawal-legal-grid {

        grid-template-columns:
            1fr;
    }

    .step-note {

        gap:
            7px;
    }

    .note-item {

        font-size:
            11px;

        padding:
            8px 10px;
    }

}


/* ============================================================
   REDUCED MOTION
   ============================================================ */

@media (prefers-reduced-motion: reduce) {

    .withdrawal-header,
    .withdrawal-step,
    .margin-info {

        animation:
            none;
    }

    .withdrawal-card,
    .withdrawal-step-number,
    .withdrawal-legal-card,
    .withdrawal-help-card,
    .withdrawal-legal-icon {

        transition:
            none;
    }
}

</style>


<div class="withdrawal-page">


    {{-- =========================================================
         KEMBALI
    ========================================================== --}}

    <div class="withdrawal-back">

        <a href="{{ url()->previous() }}">

            <span class="withdrawal-back-arrow">
                ←
            </span>

            Kembali

        </a>

    </div>



    {{-- =========================================================
         HERO
    ========================================================== --}}

    <div class="withdrawal-header">

        <div class="withdrawal-header-line"></div>

        <div class="withdrawal-header-content">

            <div class="withdrawal-header-label">
                Prosedur Transaksi
            </div>

            <h1>
                Prosedur
                <span>Penarikan Dana</span>
            </h1>

            <p>
                Penarikan dana atau <strong>Withdrawal</strong> dapat dilakukan
                sewaktu-waktu oleh nasabah sesuai dengan ketentuan yang berlaku.
                Pastikan proses penarikan dilakukan melalui prosedur resmi.
            </p>

            <div class="withdrawal-status">

                <span class="withdrawal-status-dot"></span>

                Ikuti setiap tahapan sesuai prosedur yang telah ditentukan.

            </div>

        </div>

    </div>



    {{-- =========================================================
         EFFECTIVE MARGIN
    ========================================================== --}}

    <div class="margin-info">

        <div class="margin-icon">
            !
        </div>

        <div>

            <h3>
                Perhatikan Effective Margin
            </h3>

            <p>
                Dana yang ditarik oleh nasabah tidak boleh melebihi jumlah
                <strong>Effective Margin</strong> yang terdapat pada
                laporan transaksi harian nasabah
                (<strong>Statement Report</strong>).
            </p>

        </div>

    </div>



    {{-- =========================================================
         JUDUL PROSES
    ========================================================== --}}

    <div class="withdrawal-section-title">

        <div class="withdrawal-title-row">

            <div class="withdrawal-title-icon">
                ✓
            </div>

            <h2>
                Proses Penarikan Dana
            </h2>

        </div>

        <p>
            Ikuti tiga tahapan berikut untuk melakukan Withdrawal.
        </p>

    </div>



    {{-- =========================================================
         TIMELINE
    ========================================================== --}}

    <div class="withdrawal-timeline">


        {{-- STEP 01 --}}

        <div class="withdrawal-step">

            <div class="withdrawal-step-number">
                01
            </div>

            <div class="withdrawal-card">

                <h3>
                    Isi Withdrawal Form
                </h3>

                <p>
                    Nasabah mengisi dan menandatangani
                    <strong>
                        Lembar Aplikasi Penarikan Dana
                        (Withdrawal Form)
                    </strong>.
                </p>

                <div class="step-note">

                    <div class="note-item">
                        Isi formulir
                    </div>

                    <div class="note-item">
                        Pastikan data benar
                    </div>

                    <div class="note-item">
                        Tanda tangan
                    </div>

                </div>

            </div>

        </div>



        {{-- STEP 02 --}}

        <div class="withdrawal-step">

            <div class="withdrawal-step-number">
                02
            </div>

            <div class="withdrawal-card">

                <h3>
                    Pengajuan ke PT Rifan Financindo Berjangka
                </h3>

                <p>
                    Withdrawal Form yang telah diisi dan ditandatangani
                    diberikan kepada PT Rifan Financindo Berjangka
                    untuk diproses sesuai dengan ketentuan yang berlaku.
                </p>

            </div>

        </div>



        {{-- STEP 03 --}}

        <div class="withdrawal-step">

            <div class="withdrawal-step-number">
                03
            </div>

            <div class="withdrawal-card">

                <h3>
                    Dana Ditransfer ke Rekening Nasabah
                </h3>

                <p>
                    Penarikan dana hanya dapat ditransfer ke rekening
                    atas nama nasabah yang bersangkutan dan harus sesuai
                    dengan rekening yang tercantum pada
                    <strong>
                        Aplikasi Pembukaan Rekening
                    </strong>
                    di dalam Buku Perjanjian.
                </p>

                <div class="step-note">

                    <div class="note-item">
                        Rekening atas nama nasabah
                    </div>

                    <div class="note-item">
                        Sesuai data rekening
                    </div>

                </div>

            </div>

        </div>


    </div>



    {{-- =========================================================
         LEGALITAS
    ========================================================== --}}

    <div class="withdrawal-legal-section">

        <div class="withdrawal-section-title">

            <div class="withdrawal-title-row">

                <div class="withdrawal-title-icon">
                    ✓
                </div>

                <h2>
                    Link Legalitas
                </h2>

            </div>

            <p>
                Informasi resmi mengenai lembaga dan legalitas terkait.
            </p>

        </div>


        <div class="withdrawal-legal-grid">


            {{-- BAPPEBTI --}}

            <a
                href="https://bappebti.go.id/pialang_berjangka/detail/012"
                target="_blank"
                rel="noopener noreferrer"
                class="withdrawal-legal-card"
            >

                <div class="withdrawal-legal-icon">
                    B
                </div>

                <h3>
                    BAPPEBTI
                </h3>

                <span>
                    Lihat informasi
                </span>

            </a>



            {{-- JFX --}}

            <a
                href="https://jfx.co.id/MarketMaker/market_maker"
                target="_blank"
                rel="noopener noreferrer"
                class="withdrawal-legal-card"
            >

                <div class="withdrawal-legal-icon">
                    J
                </div>

                <h3>
                    JFX
                </h3>

                <span>
                    Lihat informasi
                </span>

            </a>



            {{-- KBI --}}

            <a
                href="https://www.ptkbi.com/our-partner/perdagangan-berjangka-komoditi"
                target="_blank"
                rel="noopener noreferrer"
                class="withdrawal-legal-card"
            >

                <div class="withdrawal-legal-icon">
                    K
                </div>

                <h3>
                    KBI
                </h3>

                <span>
                    Lihat informasi
                </span>

            </a>



            {{-- ASPEBTINDO --}}

            <a
                href="https://www.rf-berjangkasemarang.com/service-details.html"
                target="_blank"
                rel="noopener noreferrer"
                class="withdrawal-legal-card"
            >

                <div class="withdrawal-legal-icon">
                    A
                </div>

                <h3>
                    Aspebtindo
                </h3>

                <span>
                    Lihat informasi
                </span>

            </a>


        </div>

    </div>



    {{-- =========================================================
         PERHATIAN
    ========================================================== --}}

    <div class="withdrawal-warning">

        <div class="withdrawal-warning-title">

            <span class="withdrawal-warning-icon">
                !
            </span>

            Perhatian!

        </div>

        <p>
            Managemen PT. Rifan Financindo Berjangka (PT RFB) menghimbau
            kepada seluruh masyarakat untuk lebih berhati-hati terhadap
            beberapa bentuk penipuan yang berkedok investasi mengatasnamakan
            PT RFB dengan menggunakan media elektronik ataupun sosial media.
        </p>

        <p>
            Untuk itu harus dipastikan bahwa transfer dana ke rekening tujuan
            (<strong>Segregated Account</strong>) guna melaksanakan transaksi
            Perdagangan Berjangka adalah atas nama
            <strong>
                PT Rifan Financindo Berjangka
            </strong>,
            bukan atas nama individu.
        </p>

    </div>

</div>

@endsection