@extends('layouts.app')

@section('content')

<style>

/* ============================================================
   PROSEDUR PEMBUKAAN AKUN ONLINE
   THEME : CORPORATE RED + MUTED GREEN + WHITE
   ============================================================ */

.online-page {
    --red: #9f1d27;
    --red-dark: #831820;
    --red-soft: #faf0f1;

    --green: #39785a;
    --green-soft: #f1f7f3;

    --text: #20272e;
    --text-soft: #66717b;
    --text-light: #89929a;

    --border: #e4e8e6;
    --border-soft: #edf0ee;

    --bg: #f7f8f7;
    --white: #ffffff;

    min-height: 100vh;

    padding: 34px 45px 70px;

    box-sizing: border-box;

    background:
        radial-gradient(
            circle at 92% 5%,
            rgba(159, 29, 39, .035),
            transparent 25%
        ),
        radial-gradient(
            circle at 5% 75%,
            rgba(57, 120, 90, .025),
            transparent 25%
        ),
        var(--bg);

    overflow: hidden;
}


/* ============================================================
   KEMBALI
   ============================================================ */

.online-back {
    max-width: 1050px;

    margin: 0 auto 18px;

    opacity: 0;

    animation:
        onlineBackReveal .55s ease .05s forwards;
}

.online-back a {
    display: inline-flex;

    align-items: center;

    gap: 9px;

    color: var(--text-soft);

    text-decoration: none;

    font-size: 13px;

    font-weight: 700;

    transition:
        color .25s ease,
        transform .25s ease;
}

.online-back a:hover {
    color: var(--red);

    transform:
        translateX(-4px);
}

.online-back .arrow {
    width: 33px;
    height: 33px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 10px;

    background: var(--white);

    border: 1px solid var(--border);

    color: var(--red);

    font-size: 17px;

    box-shadow:
        0 4px 14px rgba(31, 41, 51, .045);

    transition:
        .25s ease;
}

.online-back a:hover .arrow {
    border-color:
        rgba(159, 29, 39, .25);

    background:
        var(--red-soft);

    transform:
        translateX(-2px);
}


/* ============================================================
   HERO
   ============================================================ */

.online-hero {
    max-width: 1050px;

    margin: 0 auto 43px;

    position: relative;

    overflow: hidden;

    padding: 42px 45px;

    background: var(--white);

    border:
        1px solid var(--border);

    border-radius: 22px;

    box-shadow:
        0 12px 35px rgba(31, 41, 51, .055);

    opacity: 0;

    animation:
        onlineHeroReveal .8s cubic-bezier(.22,.61,.36,1) .12s forwards;
}


/* garis atas */

.online-hero-line {
    position: absolute;

    top: 0;
    left: 0;

    width: 100%;
    height: 3px;

    background: var(--red);

    transform:
        scaleX(0);

    transform-origin: left;

    animation:
        onlineHeroLine .9s cubic-bezier(.22,.61,.36,1) .35s forwards;
}


/* lingkaran dekorasi */

.online-hero::before {
    content: "";

    position: absolute;

    width: 260px;
    height: 260px;

    right: -135px;
    top: -145px;

    border-radius: 50%;

    border:
        1px solid rgba(159, 29, 39, .08);

    box-shadow:
        0 0 0 25px rgba(159, 29, 39, .012),
        0 0 0 50px rgba(159, 29, 39, .008);

    animation:
        onlineCircleFloat 8s ease-in-out infinite;
}

.online-hero::after {
    content: "";

    position: absolute;

    width: 120px;
    height: 120px;

    right: 80px;
    bottom: -75px;

    border-radius: 50%;

    border:
        1px solid rgba(57, 120, 90, .08);

    animation:
        onlineCircleFloatReverse 9s ease-in-out infinite;
}


.online-hero-content {
    position: relative;

    z-index: 2;

    max-width: 780px;
}


/* ============================================================
   LABEL
   ============================================================ */

.online-label {
    display: inline-flex;

    align-items: center;

    gap: 8px;

    padding: 7px 12px;

    border-radius: 7px;

    background:
        var(--red-soft);

    border:
        1px solid rgba(159, 29, 39, .13);

    color:
        var(--red);

    font-size: 10px;

    font-weight: 800;

    letter-spacing: 1.1px;

    text-transform: uppercase;

    margin-bottom: 17px;

    opacity: 0;

    animation:
        onlineFadeUp .6s ease .38s forwards;
}

.online-label::before {
    content: "";

    width: 6px;
    height: 6px;

    border-radius: 50%;

    background: var(--red);

    box-shadow:
        0 0 0 4px rgba(159, 29, 39, .06);
}


/* ============================================================
   HERO TITLE
   ============================================================ */

.online-hero h1 {
    margin: 0 0 12px;

    color: var(--text);

    font-size: 38px;

    line-height: 1.2;

    font-weight: 800;

    letter-spacing: -.7px;

    opacity: 0;

    animation:
        onlineFadeUp .7s ease .48s forwards;
}

.online-hero h1 span {
    color: var(--red);
}


/* ============================================================
   HERO DESCRIPTION
   ============================================================ */

.online-hero p {
    margin: 0;

    max-width: 720px;

    color: var(--text-soft);

    font-size: 14px;

    line-height: 1.85;

    opacity: 0;

    animation:
        onlineFadeUp .7s ease .58s forwards;
}


/* ============================================================
   STATUS
   ============================================================ */

.online-status {
    display: inline-flex;

    align-items: center;

    gap: 9px;

    margin-top: 23px;

    padding: 9px 13px;

    background:
        var(--green-soft);

    border:
        1px solid rgba(57, 120, 90, .13);

    border-radius: 8px;

    color: var(--green);

    font-size: 11.5px;

    font-weight: 600;

    opacity: 0;

    animation:
        onlineFadeUp .7s ease .68s forwards;
}

.online-status-icon {
    width: 7px;
    height: 7px;

    flex-shrink: 0;

    border-radius: 50%;

    background: var(--green);

    animation:
        onlineStatusPulse 2s ease-in-out infinite;
}


/* ============================================================
   SECTION TITLE
   ============================================================ */

.online-section-title {
    max-width: 1050px;

    margin: 0 auto 21px;

    opacity: 0;

    animation:
        onlineSectionReveal .7s ease .35s forwards;
}

.online-title-row {
    display: flex;

    align-items: center;

    gap: 13px;
}

.online-title-icon {
    width: 42px;
    height: 42px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 11px;

    background: var(--white);

    border:
        1px solid rgba(159, 29, 39, .20);

    color: var(--red);

    font-size: 17px;

    font-weight: 800;

    box-shadow:
        0 4px 13px rgba(31, 41, 51, .035);

    transition:
        transform .3s ease,
        background .3s ease;
}

.online-title-row:hover .online-title-icon {
    transform:
        rotate(-4deg)
        scale(1.06);

    background:
        var(--red-soft);
}

.online-section-title h2 {
    margin: 0;

    color: var(--text);

    font-size: 23px;

    font-weight: 800;

    letter-spacing: -.25px;
}

.online-section-title h2::after {
    content: "";

    display: block;

    width: 30px;
    height: 2px;

    margin-top: 6px;

    background:
        var(--red);

    border-radius: 10px;

    transform:
        scaleX(0);

    transform-origin: left;

    animation:
        onlineTitleLine .55s ease .7s forwards;
}

.online-section-title p {
    margin: 5px 0 0 55px;

    color: var(--text-light);

    font-size: 12.5px;
}


/* ============================================================
   TIMELINE
   ============================================================ */

.online-timeline {
    max-width: 1050px;

    margin: 0 auto;

    position: relative;
}

.online-timeline::before {
    content: "";

    position: absolute;

    left: 25px;

    top: 27px;
    bottom: 27px;

    width: 2px;

    background:
        linear-gradient(
            to bottom,
            var(--red),
            #dfe4e1 35%,
            #dfe4e1
        );

    transform:
        scaleY(0);

    transform-origin: top;

    animation:
        onlineTimelineDraw 1.5s cubic-bezier(.22,.61,.36,1) .65s forwards;
}


/* ============================================================
   STEP
   ============================================================ */

.online-step {
    display: flex;

    align-items: flex-start;

    gap: 19px;

    margin-bottom: 19px;

    position: relative;

    opacity: 0;

    animation:
        onlineStepReveal .65s cubic-bezier(.22,.61,.36,1) forwards;
}

.online-step:nth-child(1) {
    animation-delay: .62s;
}

.online-step:nth-child(2) {
    animation-delay: .76s;
}

.online-step:nth-child(3) {
    animation-delay: .90s;
}

.online-step:nth-child(4) {
    animation-delay: 1.04s;
}

.online-step:nth-child(5) {
    animation-delay: 1.18s;
}


/* ============================================================
   STEP NUMBER
   ============================================================ */

.online-step-number {
    width: 51px;
    height: 51px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    position: relative;

    z-index: 3;

    border-radius: 50%;

    background:
        var(--white);

    border:
        2px solid #d7ddda;

    color:
        var(--red);

    font-size: 12px;

    font-weight: 800;

    box-shadow:
        0 3px 12px rgba(31, 41, 51, .035);

    transition:
        transform .3s cubic-bezier(.22,.61,.36,1),
        background .3s ease,
        border-color .3s ease,
        color .3s ease,
        box-shadow .3s ease;
}

.online-step:hover .online-step-number {
    border-color:
        var(--red);

    background:
        var(--red);

    color:
        var(--white);

    transform:
        scale(1.1)
        rotate(-4deg);

    box-shadow:
        0 8px 20px rgba(159, 29, 39, .14);
}


/* ============================================================
   STEP CARD
   ============================================================ */

.online-step-card {
    flex: 1;

    position: relative;

    padding: 25px 28px;

    background:
        var(--white);

    border:
        1px solid var(--border);

    border-radius: 15px;

    box-shadow:
        0 5px 18px rgba(31, 41, 51, .035);

    overflow: hidden;

    transition:
        transform .35s cubic-bezier(.22,.61,.36,1),
        box-shadow .35s ease,
        border-color .35s ease;
}


/* garis kiri */

.online-step-card::before {
    content: "";

    position: absolute;

    left: 0;

    top: 18px;
    bottom: 18px;

    width: 3px;

    background:
        var(--red);

    border-radius:
        0 4px 4px 0;

    opacity: 0;

    transition:
        opacity .3s ease;
}


/* garis bawah */

.online-step-card::after {
    content: "";

    position: absolute;

    left: 0;
    bottom: 0;

    width: 0;
    height: 2px;

    background:
        var(--red);

    transition:
        width .45s cubic-bezier(.22,.61,.36,1);
}

.online-step-card:hover {
    transform:
        translateX(5px);

    border-color:
        rgba(159, 29, 39, .15);

    box-shadow:
        0 12px 28px rgba(31, 41, 51, .075);
}

.online-step-card:hover::before {
    opacity: 1;
}

.online-step-card:hover::after {
    width: 100%;
}


/* ============================================================
   STEP TITLE
   ============================================================ */

.online-step-card h3 {
    margin: 0 0 9px;

    color: var(--text);

    font-size: 18px;

    font-weight: 800;

    transition:
        color .3s ease,
        transform .3s ease;
}

.online-step-card:hover h3 {
    color:
        var(--red);

    transform:
        translateX(3px);
}


/* ============================================================
   STEP DESCRIPTION
   ============================================================ */

.online-step-card p {
    margin: 0;

    color: var(--text-soft);

    font-size: 13.5px;

    line-height: 1.8;
}

.online-step-card strong {
    color:
        var(--red);

    font-weight: 700;
}


/* ============================================================
   DOKUMEN
   ============================================================ */

.online-document-list {
    display: grid;

    grid-template-columns:
        repeat(2, 1fr);

    gap: 9px;

    margin-top: 17px;
}

.online-document-item {
    display: flex;

    align-items: center;

    gap: 9px;

    padding: 11px 13px;

    background:
        #fafcfb;

    border:
        1px solid var(--border-soft);

    border-radius: 9px;

    color:
        #59646d;

    font-size: 12.5px;

    position: relative;

    overflow: hidden;

    transition:
        transform .3s ease,
        background .3s ease,
        border-color .3s ease,
        box-shadow .3s ease;
}

.online-document-item::before {
    content: "✓";

    width: 21px;
    height: 21px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background:
        var(--green-soft);

    color:
        var(--green);

    font-size: 10px;

    font-weight: 900;

    transition:
        transform .3s ease;
}

.online-document-item::after {
    content: "";

    position: absolute;

    top: 0;
    left: -120%;

    width: 70%;
    height: 100%;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,.7),
            transparent
        );

    transform:
        skewX(-20deg);

    transition:
        left .6s ease;
}

.online-document-item:hover {
    background:
        var(--green-soft);

    border-color:
        rgba(57, 120, 90, .16);

    transform:
        translateY(-2px)
        translateX(2px);

    box-shadow:
        0 5px 14px rgba(57, 120, 90, .06);
}

.online-document-item:hover::before {
    transform:
        scale(1.12);
}

.online-document-item:hover::after {
    left: 140%;
}


/* ============================================================
   REKENING TERPISAH
   ============================================================ */

.online-bank-section {
    max-width: 1050px;

    margin: 51px auto 0;

    opacity: 0;

    animation:
        onlineContentReveal .75s ease 1.35s forwards;
}

.online-bank-grid {
    display: grid;

    grid-template-columns:
        repeat(2, 1fr);

    gap: 15px;
}

.online-bank-card {
    position: relative;

    padding: 22px;

    background:
        var(--white);

    border:
        1px solid var(--border);

    border-radius: 14px;

    overflow: hidden;

    box-shadow:
        0 5px 18px rgba(31, 41, 51, .035);

    opacity: 0;

    animation:
        onlineBankReveal .65s cubic-bezier(.22,.61,.36,1) forwards;

    transition:
        transform .3s cubic-bezier(.22,.61,.36,1),
        box-shadow .3s ease,
        border-color .3s ease;
}

.online-bank-card:nth-child(1) {
    animation-delay: 1.45s;
}

.online-bank-card:nth-child(2) {
    animation-delay: 1.55s;
}

.online-bank-card:nth-child(3) {
    animation-delay: 1.65s;
}

.online-bank-card:nth-child(4) {
    animation-delay: 1.75s;
}

.online-bank-card:nth-child(5) {
    animation-delay: 1.85s;
}


/* garis */

.online-bank-card::before {
    content: "";

    position: absolute;

    top: 0;
    left: 0;

    width: 100%;
    height: 2px;

    background:
        var(--red);

    opacity: .85;

    transform:
        scaleX(.25);

    transform-origin: left;

    transition:
        transform .35s ease;
}

.online-bank-card:hover {
    transform:
        translateY(-5px);

    border-color:
        rgba(159, 29, 39, .14);

    box-shadow:
        0 13px 28px rgba(31, 41, 51, .075);
}

.online-bank-card:hover::before {
    transform:
        scaleX(1);
}


/* ============================================================
   BANK ICON
   ============================================================ */

.online-bank-icon {
    width: 39px;
    height: 39px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin-bottom: 12px;

    border-radius: 9px;

    background:
        #f5f6f5;

    border:
        1px solid var(--border);

    color:
        var(--text);

    font-size: 15px;

    font-weight: 800;

    transition:
        transform .3s ease,
        background .3s ease,
        color .3s ease;
}

.online-bank-card:hover .online-bank-icon {
    transform:
        translateY(-3px)
        rotate(-3deg);

    background:
        var(--red-soft);

    color:
        var(--red);
}


/* ============================================================
   BANK TEXT
   ============================================================ */

.online-bank-name {
    color:
        var(--text);

    font-size: 16px;

    font-weight: 800;

    margin-bottom: 4px;
}

.online-bank-branch {
    color:
        var(--text-light);

    font-size: 11.5px;

    margin-bottom: 14px;
}


/* ============================================================
   ACCOUNT
   ============================================================ */

.online-account-row {
    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 15px;

    padding: 9px 0;

    border-top:
        1px solid var(--border-soft);

    transition:
        background .25s ease;
}

.online-currency {
    color:
        var(--green);

    font-size: 11px;

    font-weight: 800;
}

.online-account-number {
    color:
        var(--text);

    font-size: 12.5px;

    font-weight: 750;

    text-align: right;

    letter-spacing: .15px;

    transition:
        color .25s ease,
        transform .25s ease;
}

.online-account-row:hover .online-account-number {
    color:
        var(--red);

    transform:
        translateX(-3px);
}


/* ============================================================
   LEGALITAS
   ============================================================ */

.online-legal-section {
    max-width: 1050px;

    margin: 51px auto 0;

    opacity: 0;

    animation:
        onlineContentReveal .75s ease 1.95s forwards;
}

.online-legal-grid {
    display: grid;

    grid-template-columns:
        repeat(4, 1fr);

    gap: 14px;
}

.online-legal-card {
    position: relative;

    padding: 21px;

    background:
        var(--white);

    border:
        1px solid var(--border);

    border-radius: 14px;

    text-decoration: none;

    overflow: hidden;

    box-shadow:
        0 5px 18px rgba(31, 41, 51, .035);

    opacity: 0;

    animation:
        onlineLegalReveal .6s cubic-bezier(.22,.61,.36,1) forwards;

    transition:
        transform .3s cubic-bezier(.22,.61,.36,1),
        box-shadow .3s ease,
        border-color .3s ease;
}

.online-legal-card:nth-child(1) {
    animation-delay: 2.05s;
}

.online-legal-card:nth-child(2) {
    animation-delay: 2.15s;
}

.online-legal-card:nth-child(3) {
    animation-delay: 2.25s;
}

.online-legal-card:nth-child(4) {
    animation-delay: 2.35s;
}


/* icon link */

.online-legal-card::after {
    content: "↗";

    position: absolute;

    top: 17px;
    right: 17px;

    width: 27px;
    height: 27px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 7px;

    background:
        #f6f7f6;

    color:
        #78827c;

    font-size: 13px;

    font-weight: 800;

    transition:
        .25s ease;
}

.online-legal-card:hover {
    transform:
        translateY(-5px);

    border-color:
        rgba(159, 29, 39, .22);

    box-shadow:
        0 12px 28px rgba(31, 41, 51, .075);
}

.online-legal-card:hover::after {
    background:
        var(--red-soft);

    color:
        var(--red);

    transform:
        translate(1px, -1px);
}


/* ============================================================
   LEGAL ICON
   ============================================================ */

.online-legal-icon {
    width: 38px;
    height: 38px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin-bottom: 13px;

    border-radius: 9px;

    background:
        #f7f8f7;

    border:
        1px solid var(--border);

    color:
        var(--red);

    font-size: 14px;

    font-weight: 800;

    transition:
        transform .3s ease,
        background .3s ease;
}

.online-legal-card:hover .online-legal-icon {
    transform:
        scale(1.08)
        rotate(-3deg);

    background:
        var(--red-soft);
}


/* ============================================================
   LEGAL TEXT
   ============================================================ */

.online-legal-card h3 {
    margin: 0 0 6px;

    color:
        var(--text);

    font-size: 15.5px;

    font-weight: 800;

    transition:
        color .25s ease;
}

.online-legal-card:hover h3 {
    color:
        var(--red);
}

.online-legal-card span {
    color:
        var(--text-light);

    font-size: 11px;

    font-weight: 600;
}


/* ============================================================
   HELP
   ============================================================ */

.online-help {
    max-width: 1050px;

    margin: 36px auto 0;

    padding: 22px 25px;

    background:
        var(--green-soft);

    border:
        1px solid rgba(57, 120, 90, .12);

    border-radius: 14px;

    position: relative;

    overflow: hidden;

    opacity: 0;

    animation:
        onlineBottomReveal .7s ease 2.45s forwards;
}

.online-help::before {
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

    transform-origin: top;

    animation:
        onlineSideLine .6s ease 2.7s forwards;
}

.online-help-title {
    display: flex;

    align-items: center;

    gap: 9px;

    margin-bottom: 9px;

    color:
        var(--text);

    font-size: 16px;

    font-weight: 800;
}

.online-help-icon {
    width: 29px;
    height: 29px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 8px;

    background:
        var(--white);

    border:
        1px solid rgba(57, 120, 90, .15);

    color:
        var(--green);

    font-size: 14px;

    font-weight: 800;

    transition:
        transform .3s ease;
}

.online-help:hover .online-help-icon {
    transform:
        rotate(8deg)
        scale(1.08);
}

.online-help p {
    margin: 0;

    color:
        var(--text-soft);

    font-size: 12.5px;

    line-height: 1.8;
}


/* ============================================================
   PERINGATAN
   ============================================================ */

.online-warning {
    max-width: 1050px;

    margin: 17px auto 0;

    position: relative;

    padding: 22px 25px 22px 27px;

    background:
        var(--red-soft);

    border:
        1px solid rgba(159, 29, 39, .12);

    border-radius: 14px;

    overflow: hidden;

    opacity: 0;

    animation:
        onlineBottomReveal .7s ease 2.58s forwards;
}

.online-warning::before {
    content: "";

    position: absolute;

    left: 0;

    top: 0;
    bottom: 0;

    width: 3px;

    background:
        var(--red);

    transform:
        scaleY(0);

    transform-origin: top;

    animation:
        onlineSideLine .6s ease 2.83s forwards;
}

.online-warning-title {
    display: flex;

    align-items: center;

    gap: 9px;

    margin-bottom: 9px;

    color:
        var(--red-dark);

    font-size: 16px;

    font-weight: 800;
}

.online-warning-icon {
    width: 29px;
    height: 29px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 8px;

    background:
        var(--white);

    border:
        1px solid rgba(159, 29, 39, .13);

    color:
        var(--red);

    font-size: 14px;

    font-weight: 900;

    transition:
        transform .3s ease;
}

.online-warning:hover .online-warning-icon {
    transform:
        scale(1.08)
        rotate(-3deg);
}

.online-warning p {
    margin:
        0 0 9px;

    color:
        #62666a;

    font-size: 12.5px;

    line-height: 1.8;
}

.online-warning p:last-child {
    margin-bottom: 0;
}

.online-warning strong {
    color:
        var(--red-dark);
}


/* ============================================================
   ANIMATION KEYFRAMES
   ============================================================ */

@keyframes onlineBackReveal {

    from {
        opacity: 0;

        transform:
            translateX(-12px);
    }

    to {
        opacity: 1;

        transform:
            translateX(0);
    }

}


@keyframes onlineHeroReveal {

    from {
        opacity: 0;

        transform:
            translateY(-25px)
            scale(.985);
    }

    to {
        opacity: 1;

        transform:
            translateY(0)
            scale(1);
    }

}


@keyframes onlineHeroLine {

    to {
        transform:
            scaleX(1);
    }

}


@keyframes onlineFadeUp {

    from {
        opacity: 0;

        transform:
            translateY(14px);
    }

    to {
        opacity: 1;

        transform:
            translateY(0);
    }

}


@keyframes onlineSectionReveal {

    from {
        opacity: 0;

        transform:
            translateY(18px);
    }

    to {
        opacity: 1;

        transform:
            translateY(0);
    }

}


@keyframes onlineTitleLine {

    to {
        transform:
            scaleX(1);
    }

}


@keyframes onlineTimelineDraw {

    to {
        transform:
            scaleY(1);
    }

}


@keyframes onlineStepReveal {

    from {
        opacity: 0;

        transform:
            translateX(-25px)
            translateY(10px);
    }

    to {
        opacity: 1;

        transform:
            translateX(0)
            translateY(0);
    }

}


@keyframes onlineBankReveal {

    from {
        opacity: 0;

        transform:
            translateY(22px)
            scale(.98);
    }

    to {
        opacity: 1;

        transform:
            translateY(0)
            scale(1);
    }

}


@keyframes onlineLegalReveal {

    from {
        opacity: 0;

        transform:
            translateY(18px)
            scale(.98);
    }

    to {
        opacity: 1;

        transform:
            translateY(0)
            scale(1);
    }

}


@keyframes onlineContentReveal {

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


@keyframes onlineBottomReveal {

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


@keyframes onlineSideLine {

    to {
        transform:
            scaleY(1);
    }

}


@keyframes onlineCircleFloat {

    0%,
    100% {
        transform:
            translate(0, 0);
    }

    50% {
        transform:
            translate(-12px, 10px);
    }

}


@keyframes onlineCircleFloatReverse {

    0%,
    100% {
        transform:
            translate(0, 0);
    }

    50% {
        transform:
            translate(10px, -8px);
    }

}


@keyframes onlineStatusPulse {

    0%,
    100% {
        box-shadow:
            0 0 0 0 rgba(57, 120, 90, .20);
    }

    50% {
        box-shadow:
            0 0 0 6px rgba(57, 120, 90, 0);
    }

}


/* ============================================================
   RESPONSIVE TABLET
   ============================================================ */

@media (max-width: 1000px) {

    .online-legal-grid {
        grid-template-columns:
            repeat(2, 1fr);
    }

}


/* ============================================================
   RESPONSIVE
   ============================================================ */

@media (max-width: 900px) {

    .online-page {
        padding:
            28px 20px 55px;
    }

    .online-hero {
        padding:
            34px 30px;
    }

    .online-hero h1 {
        font-size:
            32px;
    }

    .online-document-list {
        grid-template-columns:
            1fr;
    }

    .online-bank-grid {
        grid-template-columns:
            1fr;
    }

}


/* ============================================================
   MOBILE
   ============================================================ */

@media (max-width: 600px) {

    .online-page {
        padding:
            21px 14px 45px;
    }


    .online-back {
        margin-bottom:
            15px;
    }


    .online-hero {
        padding:
            29px 21px;

        border-radius:
            17px;

        margin-bottom:
            35px;
    }


    .online-label {
        font-size:
            9px;

        padding:
            6px 10px;
    }


    .online-hero h1 {
        font-size:
            27px;

        letter-spacing:
            -.4px;
    }


    .online-hero p {
        font-size:
            12.5px;

        line-height:
            1.75;
    }


    .online-status {
        align-items:
            flex-start;

        font-size:
            11px;

        line-height:
            1.5;
    }


    .online-section-title {
        margin-bottom:
            18px;
    }


    .online-title-row {
        align-items:
            flex-start;
    }


    .online-title-icon {
        width:
            38px;

        height:
            38px;

        border-radius:
            10px;
    }


    .online-section-title h2 {
        font-size:
            20px;

        line-height:
            1.3;
    }


    .online-section-title p {
        margin-left:
            0;

        margin-top:
            7px;

        font-size:
            11.5px;
    }


    .online-timeline::before {
        left:
            22px;
    }


    .online-step {
        gap:
            13px;

        margin-bottom:
            15px;
    }


    .online-step-number {
        width:
            45px;

        height:
            45px;

        font-size:
            10.5px;
    }


    .online-step-card {
        padding:
            18px;

        border-radius:
            13px;
    }


    .online-step-card h3 {
        font-size:
            15px;

        line-height:
            1.4;
    }


    .online-step-card p {
        font-size:
            12.5px;

        line-height:
            1.75;
    }


    .online-document-item {
        padding:
            10px 11px;

        font-size:
            11.5px;
    }


    .online-bank-section,
    .online-legal-section {
        margin-top:
            40px;
    }


    .online-bank-card {
        padding:
            19px;
    }


    .online-bank-name {
        font-size:
            15px;
    }


    .online-bank-branch {
        font-size:
            11px;
    }


    .online-account-row {
        align-items:
            flex-start;

        flex-direction:
            column;

        gap:
            3px;
    }


    .online-account-number {
        text-align:
            left;

        font-size:
            12px;
    }


    .online-legal-grid {
        grid-template-columns:
            1fr;
    }


    .online-legal-card {
        padding:
            18px;
    }


    .online-help,
    .online-warning {
        padding:
            19px 19px 19px 22px;
    }


    .online-help-title,
    .online-warning-title {
        font-size:
            15px;
    }


    .online-help p,
    .online-warning p {
        font-size:
            11.5px;
    }

}


/* ============================================================
   SMALL MOBILE
   ============================================================ */

@media (max-width: 400px) {

    .online-page {
        padding-left:
            11px;

        padding-right:
            11px;
    }


    .online-hero {
        padding:
            25px 18px;
    }


    .online-hero h1 {
        font-size:
            24px;
    }


    .online-step {
        gap:
            10px;
    }


    .online-step-number {
        width:
            40px;

        height:
            40px;

        font-size:
            9.5px;
    }


    .online-timeline::before {
        left:
            19px;
    }


    .online-step-card {
        padding:
            16px;
    }


    .online-document-item {
        align-items:
            flex-start;
    }

}


/* ============================================================
   REDUCED MOTION
   ============================================================ */

@media (prefers-reduced-motion: reduce) {

    .online-back,
    .online-hero,
    .online-label,
    .online-hero h1,
    .online-hero p,
    .online-status,
    .online-section-title,
    .online-step,
    .online-bank-section,
    .online-bank-card,
    .online-legal-section,
    .online-legal-card,
    .online-help,
    .online-warning,
    .online-hero-line,
    .online-timeline::before,
    .online-help::before,
    .online-warning::before {
        animation:
            none !important;

        opacity:
            1 !important;

        transform:
            none !important;
    }

    .online-hero::before,
    .online-hero::after,
    .online-status-icon {
        animation:
            none !important;
    }

    .online-step-card,
    .online-step-number,
    .online-bank-card,
    .online-legal-card,
    .online-document-item,
    .online-back a,
    .online-bank-icon,
    .online-legal-icon,
    .online-help-icon,
    .online-warning-icon {
        transition:
            none !important;
    }

}


/* ============================================================
   END
   ============================================================ */

</style>


<div class="online-page">


    {{-- =========================================================
         KEMBALI
    ========================================================== --}}

    <div class="online-back">

        <a href="{{ url()->previous() }}">

            <span class="arrow">
                ←
            </span>

            Kembali

        </a>

    </div>


    {{-- =========================================================
         HERO
    ========================================================== --}}

    <div class="online-hero">

        <div class="online-hero-line"></div>

        <div class="online-hero-content">

            <div class="online-label">
                Prosedur Pembukaan Rekening
            </div>

            <h1>
                Prosedur Pembuatan
                <span>Akun Online</span>
            </h1>

            <p>
                Panduan tahapan pembukaan rekening secara online
                bersama PT. Rifan Financindo Berjangka.
                Ikuti setiap proses dengan teliti agar pembukaan akun
                berjalan dengan lancar.
            </p>

            <div class="online-status">

                <span class="online-status-icon"></span>

                Ikuti setiap tahapan sesuai urutan yang telah ditentukan.

            </div>

        </div>

    </div>


    {{-- =========================================================
         JUDUL PROSEDUR
    ========================================================== --}}

    <div class="online-section-title">

        <div class="online-title-row">

            <div class="online-title-icon">
                ✓
            </div>

            <h2>
                Prosedur Pembuatan Akun Online
            </h2>

        </div>

        <p>
            Berikut adalah tahapan pembukaan akun secara online.
        </p>

    </div>


    {{-- =========================================================
         TIMELINE
    ========================================================== --}}

    <div class="online-timeline">


        {{-- STEP 01 --}}

        <div class="online-step">

            <div class="online-step-number">
                01
            </div>

            <div class="online-step-card">

                <h3>
                    Registrasi Demo Account
                </h3>

                <p>
                    Calon Nasabah melakukan registrasi
                    <strong>Demo Account</strong> sebagai tahap awal
                    untuk mengenal sistem dan mekanisme transaksi
                    perdagangan berjangka.
                </p>

            </div>

        </div>


        {{-- STEP 02 --}}

        <div class="online-step">

            <div class="online-step-number">
                02
            </div>

            <div class="online-step-card">

                <h3>
                    Melengkapi Dokumen Perjanjian
                </h3>

                <p>
                    Calon Nasabah melengkapi seluruh data dan dokumen
                    yang diperlukan dalam proses pembukaan rekening
                    secara online.
                </p>

                <div class="online-document-list">

                    <div class="online-document-item">
                        Aplikasi Pembukaan Rekening
                    </div>

                    <div class="online-document-item">
                        Dokumen Pemberitahuan Adanya Risiko
                    </div>

                    <div class="online-document-item">
                        Perjanjian Pemberian Amanat
                    </div>

                    <div class="online-document-item">
                        Mekanisme Transaksi di Perdagangan Berjangka
                    </div>

                </div>

            </div>

        </div>


        {{-- STEP 03 --}}

        <div class="online-step">

            <div class="online-step-number">
                03
            </div>

            <div class="online-step-card">

                <h3>
                    Verifikasi Data
                </h3>

                <p>
                    Data dan dokumen yang telah dikirimkan akan melalui
                    proses verifikasi untuk memastikan kelengkapan
                    dan kesesuaian informasi calon Nasabah.
                </p>

            </div>

        </div>


        {{-- STEP 04 --}}

        <div class="online-step">

            <div class="online-step-number">
                04
            </div>

            <div class="online-step-card">

                <h3>
                    Proses dan Aktivasi Akun
                </h3>

                <p>
                    Setelah data dinyatakan lengkap dan sesuai,
                    proses pembukaan rekening akan dilanjutkan
                    hingga akun siap untuk digunakan.
                </p>

            </div>

        </div>


        {{-- STEP 05 --}}

        <div class="online-step">

            <div class="online-step-number">
                05
            </div>

            <div class="online-step-card">

                <h3>
                    Akun Berhasil Diaktifkan
                </h3>

                <p>
                    Setelah seluruh proses selesai, akun Nasabah
                    akan diaktifkan dan dapat digunakan sesuai
                    dengan ketentuan yang berlaku.
                </p>

            </div>

        </div>


    </div>


    {{-- =========================================================
         REKENING BANK
    ========================================================== --}}

    <div class="online-bank-section">

        <div class="online-section-title">

            <div class="online-title-row">

                <div class="online-title-icon">
                    $
                </div>

                <h2>
                    Rekening Terpisah
                </h2>

            </div>

            <p>
                Rekening tujuan untuk melakukan transfer dana.
            </p>

        </div>


        <div class="online-bank-grid">


            {{-- BCA --}}

            <div class="online-bank-card">

                <div class="online-bank-icon">
                    B
                </div>

                <div class="online-bank-name">
                    Bank BCA
                </div>

                <div class="online-bank-branch">
                    Cabang Sudirman, Jakarta
                </div>

                <div class="online-account-row">

                    <span class="online-currency">
                        IDR
                    </span>

                    <span class="online-account-number">
                        035 – 311 – 8975
                    </span>

                </div>

                <div class="online-account-row">

                    <span class="online-currency">
                        USD
                    </span>

                    <span class="online-account-number">
                        035 – 311 – 7600
                    </span>

                </div>

            </div>


            {{-- CIMB --}}

            <div class="online-bank-card">

                <div class="online-bank-icon">
                    C
                </div>

                <div class="online-bank-name">
                    Bank CIMB Niaga
                </div>

                <div class="online-bank-branch">
                    Cabang Gajahmada, Jakarta
                </div>

                <div class="online-account-row">

                    <span class="online-currency">
                        IDR
                    </span>

                    <span class="online-account-number">
                        800 – 12 – 97271 – 00
                    </span>

                </div>

                <div class="online-account-row">

                    <span class="online-currency">
                        USD
                    </span>

                    <span class="online-account-number">
                        800 – 01 – 20945 – 40
                    </span>

                </div>

            </div>


            {{-- BNI --}}

            <div class="online-bank-card">

                <div class="online-bank-icon">
                    N
                </div>

                <div class="online-bank-name">
                    BNI Bank
                </div>

                <div class="online-bank-branch">
                    Gambir Branch, Jakarta
                </div>

                <div class="online-account-row">

                    <span class="online-currency">
                        IDR
                    </span>

                    <span class="online-account-number">
                        017 – 5008 – 590
                    </span>

                </div>

                <div class="online-account-row">

                    <span class="online-currency">
                        USD
                    </span>

                    <span class="online-account-number">
                        017 – 5020 – 200
                    </span>

                </div>

            </div>


            {{-- MANDIRI --}}

            <div class="online-bank-card">

                <div class="online-bank-icon">
                    M
                </div>

                <div class="online-bank-name">
                    Bank Mandiri
                </div>

                <div class="online-bank-branch">
                    Cabang Imam Bonjol, Jakarta
                </div>

                <div class="online-account-row">

                    <span class="online-currency">
                        IDR
                    </span>

                    <span class="online-account-number">
                        122 - 000 - 664 - 2881
                    </span>

                </div>

                <div class="online-account-row">

                    <span class="online-currency">
                        USD
                    </span>

                    <span class="online-account-number">
                        122 - 000 - 664 - 2873
                    </span>

                </div>

            </div>


            {{-- ARTHA GRAHA --}}

            <div class="online-bank-card">

                <div class="online-bank-icon">
                    A
                </div>

                <div class="online-bank-name">
                    Bank Artha Graha
                </div>

                <div class="online-bank-branch">
                    Cabang KPO Sudirman, Jakarta
                </div>

                <div class="online-account-row">

                    <span class="online-currency">
                        IDR
                    </span>

                    <span class="online-account-number">
                        107 - 996 - 3271
                    </span>

                </div>

            </div>


        </div>

    </div>


    {{-- =========================================================
         LEGALITAS
    ========================================================== --}}

    <div class="online-legal-section">

        <div class="online-section-title">

            <div class="online-title-row">

                <div class="online-title-icon">
                    ✓
                </div>

                <h2>
                    Link Legalitas
                </h2>

            </div>

            <p>
                Informasi legalitas dan lembaga terkait.
            </p>

        </div>


        <div class="online-legal-grid">


            {{-- BAPPEBTI --}}

            <a
                href="https://bappebti.go.id/pialang_berjangka/detail/012"
                target="_blank"
                rel="noopener noreferrer"
                class="online-legal-card"
            >

                <div class="online-legal-icon">
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
                class="online-legal-card"
            >

                <div class="online-legal-icon">
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
                class="online-legal-card"
            >

                <div class="online-legal-icon">
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
                href="https://www.aspebtindo.org/"
                target="_blank"
                rel="noopener noreferrer"
                class="online-legal-card"
            >

                <div class="online-legal-icon">
                    A
                </div>

                <h3>
                    ASPEBTINDO
                </h3>

                <span>
                    Lihat informasi
                </span>

            </a>


        </div>

    </div>


    {{-- =========================================================
         HELP
    ========================================================== --}}

    <div class="online-help">

        <div class="online-help-title">

            <span class="online-help-icon">
                ?
            </span>

            Butuh Bantuan?

        </div>

        <p>
            Apabila terdapat kendala atau membutuhkan informasi
            lebih lanjut mengenai proses pembukaan akun secara online,
            silakan menghubungi Wakil Pialang Berjangka PT Rifan
            Financindo Berjangka.
        </p>

    </div>


    {{-- =========================================================
         PERINGATAN
    ========================================================== --}}

    <div class="online-warning">

        <div class="online-warning-title">

            <span class="online-warning-icon">
                !
            </span>

            Perhatian!

        </div>

        <p>
            Managemen PT. Rifan Financindo Berjangka (PT RFB)
            menghimbau kepada seluruh masyarakat untuk lebih berhati-hati
            terhadap beberapa bentuk penipuan yang berkedok investasi
            mengatasnamakan PT RFB dengan menggunakan media elektronik
            ataupun sosial media.
        </p>

        <p>
            Untuk itu harus dipastikan bahwa transfer dana ke rekening
            tujuan (<strong>Segregated Account</strong>) guna melaksanakan
            transaksi Perdagangan Berjangka adalah atas nama
            <strong>PT Rifan Financindo Berjangka</strong>,
            bukan atas nama individu.
        </p>

    </div>


</div>

@endsection