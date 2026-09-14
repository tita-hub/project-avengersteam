@extends('layouts.app')

@section('content')

<style>

/* ============================================================
   PETUNJUK TRANSAKSI
   CORPORATE MAROON + GREEN
   ANIMATION ENHANCED VERSION
   ============================================================ */

.transaction-page {

    --red: #8b2532;
    --red-dark: #6f1d29;
    --red-light: #a93a49;
    --red-soft: #f8eef0;
    --red-border: #ead4d8;

    --green: #2f6b57;
    --green-dark: #255443;
    --green-soft: #edf5f1;

    --text: #27313b;
    --text-soft: #68727d;
    --muted: #8a929c;

    --border: #e4e7eb;
    --surface: #ffffff;
    --surface-soft: #f7f8fa;

    min-height: 100vh;

    padding:
        35px 45px 80px;

    box-sizing: border-box;

    background:
        linear-gradient(
            180deg,
            #fbfbfc 0%,
            #f6f7f9 55%,
            #f3f5f7 100%
        );

    position: relative;

    overflow: hidden;
}


/* ============================================================
   BACKGROUND DECORATION
   ============================================================ */

.transaction-page::before {

    content: "";

    position: fixed;

    width: 420px;
    height: 420px;

    top: 70px;
    right: -230px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(139,37,50,.08) 0%,
            rgba(139,37,50,.035) 40%,
            transparent 70%
        );

    pointer-events: none;

    animation:
        floatingGlow 8s ease-in-out infinite;
}

.transaction-page::after {

    content: "";

    position: fixed;

    width: 350px;
    height: 350px;

    bottom: 50px;
    left: -210px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(47,107,87,.07) 0%,
            rgba(47,107,87,.025) 45%,
            transparent 70%
        );

    pointer-events: none;

    animation:
        floatingGlow 10s ease-in-out infinite reverse;
}


/* ============================================================
   BACK
   ============================================================ */

.transaction-back {

    max-width: 1050px;

    margin:
        0 auto 18px;

    position: relative;

    z-index: 5;
}

.transaction-back a {

    display: inline-flex;

    align-items: center;

    gap: 9px;

    color: var(--text);

    text-decoration: none;

    font-size: 14px;

    font-weight: 700;

    transition:
        .3s ease;
}

.transaction-back a:hover {

    color:
        var(--red);

    transform:
        translateX(-5px);
}

.transaction-back-arrow {

    width: 34px;
    height: 34px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 10px;

    background:
        rgba(255,255,255,.9);

    border:
        1px solid var(--border);

    color:
        var(--red);

    font-size: 17px;

    box-shadow:
        0 6px 18px rgba(39,49,59,.06);

    transition:
        .3s ease;
}

.transaction-back a:hover .transaction-back-arrow {

    background:
        var(--red);

    color:
        #fff;

    border-color:
        var(--red);

    transform:
        translateX(-2px)
        scale(1.06);

    box-shadow:
        0 7px 20px rgba(139,37,50,.2);
}


/* ============================================================
   HERO
   ============================================================ */

.transaction-header {

    max-width: 1050px;

    margin:
        0 auto 30px;

    position: relative;

    overflow: hidden;

    padding:
        45px 48px;

    border-radius:
        24px;

    background:
        rgba(255,255,255,.92);

    border:
        1px solid rgba(228,231,235,.9);

    box-shadow:
        0 18px 45px rgba(39,49,59,.08);

    animation:
        heroReveal .9s cubic-bezier(.22,1,.36,1);

    isolation: isolate;
}


/* shimmer */

.transaction-header::after {

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
            rgba(255,255,255,.75),
            transparent
        );

    transform:
        skewX(-18deg);

    animation:
        heroShine 2s ease .4s forwards;

    pointer-events: none;
}


/* garis atas */

.transaction-header-line {

    position: absolute;

    left: 0;
    top: 0;

    width: 100%;
    height: 5px;

    background:
        linear-gradient(
            90deg,
            var(--red) 0%,
            var(--red) 70%,
            var(--green) 70%,
            var(--green) 100%
        );

    transform-origin:
        left;

    animation:
        lineGrow 1s ease .25s both;
}


/* dekorasi lingkaran */

.transaction-header-decoration {

    position: absolute;

    width: 240px;
    height: 240px;

    right: -110px;
    top: -125px;

    border-radius: 50%;

    border:
        45px solid rgba(139,37,50,.035);

    animation:
        slowRotate 18s linear infinite;

    pointer-events: none;
}

.transaction-header-decoration::after {

    content: "";

    position: absolute;

    width: 80px;
    height: 80px;

    left: -145px;
    top: 180px;

    border-radius: 50%;

    border:
        18px solid rgba(47,107,87,.05);
}


/* isi */

.transaction-header-content {

    position: relative;

    z-index: 3;

    max-width: 850px;
}


/* label */

.transaction-header-label {

    display: inline-flex;

    align-items: center;

    gap: 9px;

    padding:
        8px 14px;

    margin-bottom:
        17px;

    border-radius:
        9px;

    background:
        var(--red-soft);

    border:
        1px solid var(--red-border);

    color:
        var(--red);

    font-size:
        11px;

    font-weight:
        800;

    letter-spacing:
        1.2px;

    text-transform:
        uppercase;

    animation:
        labelReveal .7s ease .25s both;
}

.transaction-header-label::before {

    content: "";

    width: 7px;
    height: 7px;

    border-radius: 50%;

    background:
        var(--red);

    box-shadow:
        0 0 0 4px rgba(139,37,50,.08);

    animation:
        dotPulse 2s ease-in-out infinite;
}


/* title */

.transaction-header h1 {

    margin:
        0 0 13px;

    color:
        var(--text);

    font-size:
        39px;

    line-height:
        1.18;

    font-weight:
        850;

    letter-spacing:
        -.8px;

    animation:
        titleReveal .8s cubic-bezier(.22,1,.36,1) .35s both;
}

.transaction-header h1 span {

    color:
        var(--red);

    position: relative;
}

.transaction-header h1 span::after {

    content: "";

    position: absolute;

    left: 0;
    bottom: -3px;

    width: 100%;
    height: 3px;

    background:
        var(--red);

    border-radius: 5px;

    transform:
        scaleX(0);

    transform-origin:
        left;

    animation:
        underlineGrow .7s ease 1s forwards;
}


/* paragraph */

.transaction-header p {

    margin:
        0;

    max-width:
        820px;

    color:
        var(--text-soft);

    font-size:
        15px;

    line-height:
        1.85;

    animation:
        fadeUp .7s ease .55s both;
}

.transaction-header strong {

    color:
        var(--red-dark);
}


/* status */

.transaction-status {

    display: inline-flex;

    align-items: center;

    gap: 11px;

    margin-top:
        24px;

    padding:
        11px 16px;

    background:
        var(--green-soft);

    border:
        1px solid #d7e7df;

    border-radius:
        11px;

    color:
        var(--green-dark);

    font-size:
        12px;

    font-weight:
        650;

    animation:
        fadeUp .7s ease .7s both;
}

.transaction-status-dot {

    width: 8px;
    height: 8px;

    flex-shrink: 0;

    border-radius: 50%;

    background:
        var(--green);

    box-shadow:
        0 0 0 4px rgba(47,107,87,.1);

    animation:
        greenPulse 2s ease-in-out infinite;
}


/* ============================================================
   DEMO INFO
   ============================================================ */

.demo-info {

    max-width:
        1050px;

    margin:
        0 auto 42px;

    position:
        relative;

    display:
        flex;

    align-items:
        flex-start;

    gap:
        16px;

    padding:
        22px 25px;

    background:
        linear-gradient(
            135deg,
            #f0f8f4,
            #edf5f1
        );

    border:
        1px solid #d8e7df;

    border-radius:
        16px;

    box-shadow:
        0 8px 25px rgba(39,49,59,.04);

    animation:
        fadeUp .8s ease .25s both;
}

.demo-info::before {

    content: "";

    position: absolute;

    left: 0;
    top: 0;
    bottom: 0;

    width: 4px;

    background:
        var(--green);

    border-radius:
        4px 0 0 4px;

    animation:
        sideGrow .7s ease .8s both;
}


/* icon */

.demo-icon {

    width:
        45px;

    height:
        45px;

    flex-shrink:
        0;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border-radius:
        12px;

    background:
        var(--green);

    color:
        white;

    font-size:
        18px;

    font-weight:
        900;

    box-shadow:
        0 7px 18px rgba(47,107,87,.17);

    animation:
        iconPop .7s cubic-bezier(.22,1,.36,1) .5s both;
}

.demo-info:hover .demo-icon {

    animation:
        iconBounce .55s ease;
}

.demo-info h3 {

    margin:
        0 0 5px;

    color:
        var(--green-dark);

    font-size:
        16px;

    font-weight:
        800;
}

.demo-info p {

    margin:
        0;

    color:
        #617269;

    font-size:
        13px;

    line-height:
        1.8;
}


/* ============================================================
   SECTION TITLE
   ============================================================ */

.transaction-section-title {

    max-width:
        1050px;

    margin:
        0 auto 23px;

    position:
        relative;
}

.transaction-title-row {

    display:
        flex;

    align-items:
        center;

    gap:
        13px;
}

.transaction-title-icon {

    width:
        44px;

    height:
        44px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    flex-shrink:
        0;

    border-radius:
        12px;

    background:
        var(--red-soft);

    color:
        var(--red);

    border:
        1px solid var(--red-border);

    font-size:
        18px;

    font-weight:
        900;

    transition:
        .35s ease;
}

.transaction-section-title:hover .transaction-title-icon {

    background:
        var(--red);

    color:
        white;

    transform:
        rotate(-6deg)
        scale(1.06);

    box-shadow:
        0 8px 20px rgba(139,37,50,.15);
}

.transaction-section-title h2 {

    margin:
        0;

    color:
        var(--text);

    font-size:
        25px;

    font-weight:
        800;

    letter-spacing:
        -.3px;
}

.transaction-section-title p {

    margin:
        5px 0 0 57px;

    color:
        var(--text-soft);

    font-size:
        13px;
}


/* ============================================================
   TIMELINE
   ============================================================ */

.transaction-timeline {

    max-width:
        1050px;

    margin:
        0 auto;

    position:
        relative;
}


/* background line */

.transaction-timeline::before {

    content: "";

    position:
        absolute;

    left:
        31px;

    top:
        31px;

    bottom:
        31px;

    width:
        2px;

    background:
        #dfe3e7;

    border-radius:
        10px;
}


/* animated progress */

.transaction-timeline::after {

    content: "";

    position:
        absolute;

    left:
        31px;

    top:
        31px;

    width:
        2px;

    height:
        0;

    background:
        linear-gradient(
            180deg,
            var(--red),
            var(--red-light),
            var(--green)
        );

    border-radius:
        10px;

    z-index:
        0;

    transition:
        height 1.6s cubic-bezier(.22,1,.36,1);
}

.transaction-timeline.timeline-active::after {

    height:
        calc(100% - 62px);
}


/* ============================================================
   STEP
   ============================================================ */

.transaction-step {

    display:
        flex;

    align-items:
        flex-start;

    gap:
        22px;

    margin-bottom:
        24px;

    position:
        relative;

    z-index:
        2;

    opacity:
        0;

    transform:
        translateY(35px)
        scale(.98);

    transition:
        opacity .7s ease,
        transform .7s cubic-bezier(.22,1,.36,1);
}

.transaction-step.show {

    opacity:
        1;

    transform:
        translateY(0)
        scale(1);
}

.transaction-step:nth-child(1) {
    transition-delay:
        .05s;
}

.transaction-step:nth-child(2) {
    transition-delay:
        .18s;
}

.transaction-step:nth-child(3) {
    transition-delay:
        .31s;
}


/* ============================================================
   NUMBER
   ============================================================ */

.transaction-step-number {

    width:
        63px;

    height:
        63px;

    flex-shrink:
        0;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    position:
        relative;

    z-index:
        3;

    border-radius:
        17px;

    background:
        #fff;

    border:
        2px solid var(--red-border);

    color:
        var(--red);

    font-size:
        14px;

    font-weight:
        900;

    box-shadow:
        0 8px 20px rgba(39,49,59,.08);

    transition:
        .4s cubic-bezier(.22,1,.36,1);
}


/* ripple */

.transaction-step-number::before {

    content: "";

    position:
        absolute;

    inset:
        -5px;

    border-radius:
        20px;

    border:
        1px solid rgba(139,37,50,.2);

    opacity:
        0;

    transform:
        scale(.8);
}

.transaction-step.show .transaction-step-number::before {

    animation:
        numberRipple 2s ease-out 1;
}

.transaction-step:hover .transaction-step-number {

    background:
        var(--red);

    border-color:
        var(--red);

    color:
        white;

    transform:
        translateY(-4px)
        rotate(-2deg);

    box-shadow:
        0 12px 25px rgba(139,37,50,.2);
}


/* ============================================================
   CARD
   ============================================================ */

.transaction-card {

    flex:
        1;

    position:
        relative;

    overflow:
        hidden;

    padding:
        28px 31px;

    background:
        rgba(255,255,255,.96);

    border:
        1px solid var(--border);

    border-radius:
        17px;

    box-shadow:
        0 8px 25px rgba(39,49,59,.045);

    transition:
        transform .4s cubic-bezier(.22,1,.36,1),
        box-shadow .4s ease,
        border-color .4s ease;
}


/* shine */

.transaction-card::after {

    content: "";

    position:
        absolute;

    top:
        -100%;

    left:
        -100%;

    width:
        55%;

    height:
        300%;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,.65),
            transparent
        );

    transform:
        rotate(18deg);

    transition:
        .8s ease;

    pointer-events:
        none;
}

.transaction-card:hover::after {

    left:
        150%;
}


/* left line */

.transaction-card::before {

    content: "";

    position:
        absolute;

    left:
        0;

    top:
        18px;

    bottom:
        18px;

    width:
        4px;

    background:
        linear-gradient(
            180deg,
            var(--red),
            var(--red-light)
        );

    border-radius:
        0 5px 5px 0;

    opacity:
        0;

    transform:
        scaleY(.3);

    transform-origin:
        center;

    transition:
        .4s ease;
}

.transaction-card:hover {

    transform:
        translateX(6px)
        translateY(-3px);

    border-color:
        var(--red-border);

    box-shadow:
        0 17px 35px rgba(39,49,59,.095);
}

.transaction-card:hover::before {

    opacity:
        1;

    transform:
        scaleY(1);
}


/* card content */

.transaction-card h3 {

    margin:
        0 0 10px;

    color:
        var(--text);

    font-size:
        19px;

    font-weight:
        800;

    transition:
        .3s ease;
}

.transaction-card:hover h3 {

    color:
        var(--red-dark);

    transform:
        translateX(3px);
}

.transaction-card p {

    margin:
        0;

    color:
        var(--text-soft);

    font-size:
        14px;

    line-height:
        1.8;
}

.transaction-card strong {

    color:
        var(--red-dark);
}


/* ============================================================
   CHECK LIST
   ============================================================ */

.check-list {

    display:
        flex;

    flex-wrap:
        wrap;

    gap:
        9px;

    margin-top:
        18px;
}

.check-item {

    display:
        flex;

    align-items:
        center;

    gap:
        7px;

    padding:
        8px 12px;

    background:
        #fafbfc;

    border:
        1px solid #e5e8ec;

    border-radius:
        9px;

    color:
        #59636e;

    font-size:
        12px;

    transition:
        .35s cubic-bezier(.22,1,.36,1);

    opacity:
        0;

    transform:
        translateY(10px);
}

.transaction-step.show .check-item {

    opacity:
        1;

    transform:
        translateY(0);
}

.transaction-step.show .check-item:nth-child(1) {
    transition-delay:
        .35s;
}

.transaction-step.show .check-item:nth-child(2) {
    transition-delay:
        .45s;
}

.transaction-step.show .check-item:nth-child(3) {
    transition-delay:
        .55s;
}

.check-item::before {

    content:
        "✓";

    width:
        20px;

    height:
        20px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    flex-shrink:
        0;

    border-radius:
        6px;

    background:
        var(--green-soft);

    color:
        var(--green);

    font-size:
        11px;

    font-weight:
        900;

    transition:
        .3s ease;
}

.check-item:hover {

    background:
        var(--green-soft);

    border-color:
        #d2e3da;

    transform:
        translateY(-3px)
        scale(1.02);

    box-shadow:
        0 6px 15px rgba(47,107,87,.08);
}

.check-item:hover::before {

    background:
        var(--green);

    color:
        white;

    transform:
        rotate(8deg)
        scale(1.1);
}


/* ============================================================
   TRADING PLATFORM
   ============================================================ */

.trading-platform {

    margin-top:
        19px;

    padding:
        18px 20px;

    background:
        #fafbfc;

    border:
        1px solid #e5e8ec;

    border-radius:
        12px;

    position:
        relative;

    overflow:
        hidden;

    transition:
        .35s ease;
}

.trading-platform::before {

    content: "";

    position:
        absolute;

    left:
        0;

    top:
        0;

    bottom:
        0;

    width:
        4px;

    background:
        var(--red);

    transition:
        .35s ease;
}

.trading-platform:hover {

    background:
        var(--red-soft);

    border-color:
        var(--red-border);

    transform:
        translateX(3px);
}

.trading-platform small {

    display:
        block;

    margin-bottom:
        6px;

    color:
        var(--muted);

    font-size:
        12px;
}

.trading-platform a {

    display:
        inline-flex;

    align-items:
        center;

    gap:
        6px;

    color:
        var(--red);

    font-size:
        14px;

    font-weight:
        800;

    text-decoration:
        none;

    transition:
        .35s ease;
}

.trading-platform a:hover {

    color:
        var(--red-dark);

    gap:
        12px;
}


/* ============================================================
   SECURITY
   ============================================================ */

.transaction-security {

    max-width:
        1050px;

    margin:
        40px auto 0;

    position:
        relative;

    padding:
        25px 28px 25px 31px;

    background:
        linear-gradient(
            135deg,
            #fffafa,
            #fffdfd
        );

    border:
        1px solid var(--red-border);

    border-radius:
        16px;

    overflow:
        hidden;

    box-shadow:
        0 8px 24px rgba(39,49,59,.04);

    opacity:
        0;

    transform:
        translateY(25px);

    transition:
        .8s cubic-bezier(.22,1,.36,1);
}

.transaction-security.show {

    opacity:
        1;

    transform:
        translateY(0);
}

.transaction-security::before {

    content: "";

    position:
        absolute;

    left:
        0;

    top:
        0;

    bottom:
        0;

    width:
        4px;

    background:
        var(--red);

    animation:
        sideGrow .8s ease .3s both;
}

.transaction-security::after {

    content: "";

    position:
        absolute;

    width:
        130px;

    height:
        130px;

    right:
        -70px;

    bottom:
        -75px;

    border-radius:
        50%;

    border:
        20px solid rgba(139,37,50,.035);

    animation:
        slowRotate 12s linear infinite;
}

.transaction-security-title {

    display:
        flex;

    align-items:
        center;

    gap:
        10px;

    margin-bottom:
        10px;

    color:
        var(--red-dark);

    font-size:
        17px;

    font-weight:
        800;
}

.transaction-security-icon {

    width:
        32px;

    height:
        32px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border-radius:
        9px;

    background:
        var(--red-soft);

    border:
        1px solid var(--red-border);

    color:
        var(--red);

    font-size:
        14px;

    font-weight:
        900;

    transition:
        .35s ease;
}

.transaction-security:hover .transaction-security-icon {

    background:
        var(--red);

    color:
        white;

    transform:
        rotate(8deg)
        scale(1.08);
}

.transaction-security p {

    margin:
        0;

    color:
        #69727c;

    font-size:
        13px;

    line-height:
        1.8;
}

.transaction-security strong {

    color:
        var(--red-dark);
}


/* ============================================================
   LEGALITAS
   ============================================================ */

.transaction-legal-section {

    max-width:
        1050px;

    margin:
        55px auto 0;
}

.transaction-legal-grid {

    display:
        grid;

    grid-template-columns:
        repeat(4, 1fr);

    gap:
        16px;
}


/* card */

.transaction-legal-card {

    position:
        relative;

    padding:
        23px;

    background:
        rgba(255,255,255,.96);

    border:
        1px solid var(--border);

    border-radius:
        16px;

    text-decoration:
        none;

    overflow:
        hidden;

    box-shadow:
        0 8px 23px rgba(39,49,59,.04);

    opacity:
        0;

    transform:
        translateY(25px)
        scale(.97);

    transition:
        opacity .65s ease,
        transform .65s cubic-bezier(.22,1,.36,1),
        box-shadow .35s ease,
        border-color .35s ease;
}

.transaction-legal-card.show {

    opacity:
        1;

    transform:
        translateY(0)
        scale(1);
}

.transaction-legal-card:nth-child(1) {
    transition-delay:
        .05s;
}

.transaction-legal-card:nth-child(2) {
    transition-delay:
        .13s;
}

.transaction-legal-card:nth-child(3) {
    transition-delay:
        .21s;
}

.transaction-legal-card:nth-child(4) {
    transition-delay:
        .29s;
}


/* top line */

.transaction-legal-card::before {

    content: "";

    position:
        absolute;

    left:
        0;

    top:
        0;

    width:
        100%;

    height:
        3px;

    background:
        linear-gradient(
            90deg,
            var(--red),
            var(--red-light)
        );

    transform:
        scaleX(0);

    transform-origin:
        left;

    transition:
        transform .4s ease;
}

.transaction-legal-card:hover::before {

    transform:
        scaleX(1);
}

.transaction-legal-card:hover {

    transform:
        translateY(-7px)
        scale(1.015);

    border-color:
        var(--red-border);

    box-shadow:
        0 17px 35px rgba(39,49,59,.09);
}


/* icon */

.transaction-legal-icon {

    width:
        43px;

    height:
        43px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    margin-bottom:
        14px;

    border-radius:
        11px;

    background:
        var(--red-soft);

    border:
        1px solid var(--red-border);

    color:
        var(--red);

    font-size:
        16px;

    font-weight:
        900;

    transition:
        .4s cubic-bezier(.22,1,.36,1);
}

.transaction-legal-card:hover .transaction-legal-icon {

    background:
        var(--red);

    border-color:
        var(--red);

    color:
        white;

    transform:
        rotate(-5deg)
        scale(1.08);

    box-shadow:
        0 8px 18px rgba(139,37,50,.17);
}


/* arrow */

.transaction-legal-card::after {

    content:
        "↗";

    position:
        absolute;

    top:
        19px;

    right:
        19px;

    width:
        29px;

    height:
        29px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border-radius:
        8px;

    background:
        #f7f8fa;

    border:
        1px solid var(--border);

    color:
        var(--red);

    font-size:
        14px;

    font-weight:
        900;

    transition:
        .35s ease;
}

.transaction-legal-card:hover::after {

    background:
        var(--red);

    border-color:
        var(--red);

    color:
        white;

    transform:
        translate(3px,-3px);
}

.transaction-legal-card h3 {

    margin:
        0 0 6px;

    color:
        var(--text);

    font-size:
        16px;

    line-height:
        1.4;

    font-weight:
        800;

    transition:
        .3s ease;
}

.transaction-legal-card:hover h3 {

    color:
        var(--red-dark);
}

.transaction-legal-card span {

    color:
        var(--red);

    font-size:
        12px;

    font-weight:
        700;
}


/* ============================================================
   ANIMATIONS
   ============================================================ */

@keyframes heroReveal {

    from {
        opacity: 0;
        transform:
            translateY(-25px)
            scale(.97);
        filter:
            blur(5px);
    }

    to {
        opacity: 1;
        transform:
            translateY(0)
            scale(1);
        filter:
            blur(0);
    }
}

@keyframes heroShine {

    to {
        left: 150%;
    }
}

@keyframes lineGrow {

    from {
        transform:
            scaleX(0);
    }

    to {
        transform:
            scaleX(1);
    }
}

@keyframes labelReveal {

    from {
        opacity: 0;
        transform:
            translateY(10px)
            scale(.95);
    }

    to {
        opacity: 1;
        transform:
            translateY(0)
            scale(1);
    }
}

@keyframes titleReveal {

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

@keyframes underlineGrow {

    from {
        transform:
            scaleX(0);
    }

    to {
        transform:
            scaleX(1);
    }
}

@keyframes fadeUp {

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

@keyframes floatingGlow {

    0%,
    100% {
        transform:
            translateY(0)
            scale(1);
    }

    50% {
        transform:
            translateY(-25px)
            scale(1.06);
    }
}

@keyframes slowRotate {

    from {
        transform:
            rotate(0deg);
    }

    to {
        transform:
            rotate(360deg);
    }
}

@keyframes dotPulse {

    0%,
    100% {
        transform:
            scale(1);
        box-shadow:
            0 0 0 4px rgba(139,37,50,.08);
    }

    50% {
        transform:
            scale(1.25);
        box-shadow:
            0 0 0 7px rgba(139,37,50,.03);
    }
}

@keyframes greenPulse {

    0%,
    100% {
        transform:
            scale(1);
    }

    50% {
        transform:
            scale(1.25);
        box-shadow:
            0 0 0 6px rgba(47,107,87,.05);
    }
}

@keyframes sideGrow {

    from {
        transform:
            scaleY(0);
        transform-origin:
            top;
    }

    to {
        transform:
            scaleY(1);
        transform-origin:
            top;
    }
}

@keyframes iconPop {

    from {
        opacity: 0;
        transform:
            scale(.5)
            rotate(-15deg);
    }

    70% {
        transform:
            scale(1.12)
            rotate(4deg);
    }

    to {
        opacity: 1;
        transform:
            scale(1)
            rotate(0);
    }
}

@keyframes iconBounce {

    0% {
        transform:
            translateY(0);
    }

    40% {
        transform:
            translateY(-6px)
            rotate(-5deg);
    }

    100% {
        transform:
            translateY(0);
    }
}

@keyframes numberRipple {

    0% {
        opacity:
            .5;
        transform:
            scale(.8);
    }

    100% {
        opacity:
            0;
        transform:
            scale(1.5);
    }
}


/* ============================================================
   RESPONSIVE
   ============================================================ */

@media (max-width: 1000px) {

    .transaction-legal-grid {

        grid-template-columns:
            repeat(2, 1fr);
    }
}


@media (max-width: 900px) {

    .transaction-page {

        padding:
            30px 20px 60px;
    }

    .transaction-header {

        padding:
            36px 30px;
    }

    .transaction-header h1 {

        font-size:
            32px;
    }
}


@media (max-width: 600px) {

    .transaction-page {

        padding:
            22px 15px 45px;
    }

    .transaction-header {

        padding:
            30px 22px;

        border-radius:
            19px;
    }

    .transaction-header h1 {

        font-size:
            27px;
    }

    .transaction-header p {

        font-size:
            13px;
    }

    .transaction-status {

        align-items:
            flex-start;

        line-height:
            1.5;
    }

    .demo-info {

        padding:
            18px;
    }

    .transaction-section-title h2 {

        font-size:
            21px;
    }

    .transaction-section-title p {

        margin-left:
            0;
    }

    .transaction-title-icon {

        width:
            39px;

        height:
            39px;
    }

    .transaction-timeline::before,
    .transaction-timeline::after {

        left:
            24px;
    }

    .transaction-step {

        gap:
            14px;
    }

    .transaction-step-number {

        width:
            49px;

        height:
            49px;

        border-radius:
            13px;

        font-size:
            12px;
    }

    .transaction-card {

        padding:
            20px;

        border-radius:
            14px;
    }

    .transaction-card h3 {

        font-size:
            16px;
    }

    .transaction-card p {

        font-size:
            13px;
    }

    .transaction-legal-grid {

        grid-template-columns:
            1fr;
    }

    .check-list {

        gap:
            7px;
    }

    .check-item {

        font-size:
            11px;

        padding:
            8px 10px;
    }

    .transaction-security {

        padding:
            20px;
    }

}


/* ============================================================
   REDUCED MOTION
   ============================================================ */

@media (prefers-reduced-motion: reduce) {

    *,
    *::before,
    *::after {

        animation-duration:
            .01ms !important;

        animation-iteration-count:
            1 !important;

        scroll-behavior:
            auto !important;

        transition-duration:
            .01ms !important;
    }
}

</style>


<div class="transaction-page">


    {{-- =========================================================
         KEMBALI
    ========================================================== --}}

    <div class="transaction-back">

        <a href="{{ url()->previous() }}">

            <span class="transaction-back-arrow">
                ←
            </span>

            Kembali

        </a>

    </div>



    {{-- =========================================================
         HERO
    ========================================================== --}}

    <div class="transaction-header">

        <div class="transaction-header-line"></div>

        <div class="transaction-header-decoration"></div>

        <div class="transaction-header-content">

            <div class="transaction-header-label">
                Panduan Transaksi
            </div>

            <h1>
                Petunjuk
                <span>Transaksi</span>
            </h1>

            <p>
                Nasabah dapat menyampaikan amanat transaksi secara online
                melalui platform trading yang disediakan. Untuk kenyamanan
                dan meminimalkan risiko kesalahan, disarankan Nasabah
                melakukan simulasi <strong>demo trading</strong> terlebih
                dahulu sebelum menggunakan akun riil.
            </p>

            <div class="transaction-status">

                <span class="transaction-status-dot"></span>

                Pastikan memahami prosedur sebelum melakukan transaksi.

            </div>

        </div>

    </div>



    {{-- =========================================================
         DEMO TRADING
    ========================================================== --}}

    <div class="demo-info">

        <div class="demo-icon">
            ✓
        </div>

        <div>

            <h3>
                Disarankan Melakukan Demo Trading
            </h3>

            <p>
                Sebelum melakukan transaksi menggunakan akun riil,
                pastikan Anda telah memahami cara kerja platform
                trading melalui simulasi terlebih dahulu.
            </p>

        </div>

    </div>



    {{-- =========================================================
         JUDUL TAHAPAN
    ========================================================== --}}

    <div class="transaction-section-title">

        <div class="transaction-title-row">

            <div class="transaction-title-icon">
                ✓
            </div>

            <h2>
                Tahapan Transaksi Online
            </h2>

        </div>

        <p>
            Ikuti langkah berikut untuk mengakses platform trading.
        </p>

    </div>



    {{-- =========================================================
         TIMELINE
    ========================================================== --}}

    <div class="transaction-timeline">


        {{-- STEP 01 --}}

        <div class="transaction-step">

            <div class="transaction-step-number">
                01
            </div>

            <div class="transaction-card">

                <h3>
                    Mendapatkan Akses Trading
                </h3>

                <p>
                    Nasabah yang melakukan transaksi secara online
                    akan memperoleh <strong>User ID</strong> dan
                    <strong>Password</strong> resmi dari
                    PT. Rifan Financindo Berjangka.
                </p>

                <p style="margin-top: 10px;">
                    Kredensial tersebut bersifat rahasia dan digunakan
                    untuk melakukan login ke platform trading.
                </p>

                <div class="check-list">

                    <div class="check-item">
                        User ID resmi
                    </div>

                    <div class="check-item">
                        Password resmi
                    </div>

                    <div class="check-item">
                        Jaga kerahasiaan akun
                    </div>

                </div>

            </div>

        </div>



        {{-- STEP 02 --}}

        <div class="transaction-step">

            <div class="transaction-step-number">
                02
            </div>

            <div class="transaction-card">

                <h3>
                    Persiapan Sebelum Transaksi
                </h3>

                <p>
                    Pastikan seluruh kebutuhan berikut telah tersedia
                    sebelum mengakses platform online trading.
                </p>

                <div class="check-list">

                    <div class="check-item">
                        Koneksi internet stabil
                    </div>

                    <div class="check-item">
                        Laptop / PC / Smartphone
                    </div>

                    <div class="check-item">
                        User ID dan Password
                    </div>

                </div>

                <div class="trading-platform">

                    <small>
                        Platform Online Trading
                    </small>

                    <a
                        href="http://etrade.rifanberjangka.com/login.php"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        Buka Platform Trading
                        <span>→</span>
                    </a>

                </div>

            </div>

        </div>



        {{-- STEP 03 --}}

        <div class="transaction-step">

            <div class="transaction-step-number">
                03
            </div>

            <div class="transaction-card">

                <h3>
                    Login ke Platform
                </h3>

                <p>
                    Masukkan <strong>User ID</strong> dan
                    <strong>Password</strong> yang telah diberikan
                    oleh PT. Rifan Financindo Berjangka.
                </p>

                <div class="check-list">

                    <div class="check-item">
                        Masukkan User ID
                    </div>

                    <div class="check-item">
                        Masukkan Password
                    </div>

                    <div class="check-item">
                        Periksa data
                    </div>

                </div>

                <p style="margin-top: 15px;">
                    Pastikan data yang dimasukkan sudah benar
                    sebelum menekan tombol login.
                </p>

            </div>

        </div>


    </div>



    {{-- =========================================================
         KEAMANAN
    ========================================================== --}}

    <div class="transaction-security">

        <div class="transaction-security-title">

            <span class="transaction-security-icon">
                !
            </span>

            Jaga Kerahasiaan Akun

        </div>

        <p>
            User ID dan Password merupakan informasi pribadi.
            Jangan membagikan kredensial akun kepada pihak lain
            dan pastikan Anda selalu menggunakan platform trading
            resmi yang diberikan oleh
            <strong>PT. Rifan Financindo Berjangka</strong>.
        </p>

    </div>



    {{-- =========================================================
         LEGALITAS
    ========================================================== --}}

    <div class="transaction-legal-section">

        <div class="transaction-section-title">

            <div class="transaction-title-row">

                <div class="transaction-title-icon">
                    ✓
                </div>

                <h2>
                    Link Legalitas
                </h2>

            </div>

            <p>
                Informasi resmi mengenai perusahaan dan lembaga terkait.
            </p>

        </div>


        <div class="transaction-legal-grid">


            {{-- BAPPEBTI --}}

            <a
                href="https://bappebti.go.id/pialang_berjangka/detail/012"
                target="_blank"
                rel="noopener noreferrer"
                class="transaction-legal-card"
            >

                <div class="transaction-legal-icon">
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
                class="transaction-legal-card"
            >

                <div class="transaction-legal-icon">
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
                class="transaction-legal-card"
            >

                <div class="transaction-legal-icon">
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
                class="transaction-legal-card"
            >

                <div class="transaction-legal-icon">
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


</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | SCROLL REVEAL
    |--------------------------------------------------------------------------
    */

    const revealItems = document.querySelectorAll(
        '.transaction-step, .transaction-security, .transaction-legal-card'
    );

    const observer = new IntersectionObserver(
        function(entries, obs) {

            entries.forEach(function(entry) {

                if (entry.isIntersecting) {

                    entry.target.classList.add('show');

                    obs.unobserve(entry.target);
                }

            });

        },
        {
            threshold: 0.15,
            rootMargin: '0px 0px -60px 0px'
        }
    );


    revealItems.forEach(function(item) {

        observer.observe(item);

    });


    /*
    |--------------------------------------------------------------------------
    | TIMELINE PROGRESS
    |--------------------------------------------------------------------------
    */

    const timeline =
        document.querySelector('.transaction-timeline');


    if (timeline) {

        const timelineObserver =
            new IntersectionObserver(
                function(entries, obs) {

                    entries.forEach(function(entry) {

                        if (entry.isIntersecting) {

                            timeline.classList.add(
                                'timeline-active'
                            );

                            obs.unobserve(entry.target);
                        }

                    });

                },
                {
                    threshold: 0.2
                }
            );


        timelineObserver.observe(timeline);

    }


    /*
    |--------------------------------------------------------------------------
    | CARD TILT HALUS
    |--------------------------------------------------------------------------
    */

    const cards =
        document.querySelectorAll(
            '.transaction-card'
        );


    cards.forEach(function(card) {

        card.addEventListener(
            'mousemove',
            function(e) {

                if (window.innerWidth <= 700) {
                    return;
                }

                const rect =
                    card.getBoundingClientRect();

                const x =
                    e.clientX - rect.left;

                const y =
                    e.clientY - rect.top;

                const centerX =
                    rect.width / 2;

                const centerY =
                    rect.height / 2;

                const rotateX =
                    ((y - centerY) / centerY) * -1.2;

                const rotateY =
                    ((x - centerX) / centerX) * 1.2;


                card.style.transform =
                    `
                    translateX(6px)
                    translateY(-3px)
                    perspective(900px)
                    rotateX(${rotateX}deg)
                    rotateY(${rotateY}deg)
                    `;
            }
        );


        card.addEventListener(
            'mouseleave',
            function() {

                card.style.transform = '';

            }
        );

    });


    /*
    |--------------------------------------------------------------------------
    | SMOOTH BACK BUTTON
    |--------------------------------------------------------------------------
    */

    const backButton =
        document.querySelector(
            '.transaction-back a'
        );


    if (backButton) {

        backButton.addEventListener(
            'mouseenter',
            function() {

                const arrow =
                    this.querySelector(
                        '.transaction-back-arrow'
                    );

                if (arrow) {

                    arrow.style.transform =
                        'translateX(-3px) scale(1.05)';
                }

            }
        );


        backButton.addEventListener(
            'mouseleave',
            function() {

                const arrow =
                    this.querySelector(
                        '.transaction-back-arrow'
                    );

                if (arrow) {

                    arrow.style.transform = '';
                }

            }
        );

    }

});

</script>

@endsection