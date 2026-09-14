@extends('layouts.app')

@section('content')

<style>

/* ============================================================
   WITHDRAWAL PAGE
   MODERN CORPORATE — MAROON / GREEN / WHITE
   ============================================================ */

.withdrawal-page {

    --maroon: #8b2532;
    --maroon-dark: #681a25;
    --maroon-soft: #f9eef0;
    --maroon-line: #ead2d6;

    --green: #34715b;
    --green-dark: #285743;
    --green-soft: #edf6f1;
    --green-line: #d6e8df;

    --text: #252a30;
    --text-soft: #68717b;
    --muted: #9299a1;

    --white: #ffffff;
    --bg: #f6f7f8;
    --border: #e5e8eb;

    min-height: 100vh;
    padding: 32px 45px 80px;
    box-sizing: border-box;

    background:
        radial-gradient(
            circle at 8% 5%,
            rgba(139,37,50,.045),
            transparent 25%
        ),
        radial-gradient(
            circle at 92% 15%,
            rgba(52,113,91,.045),
            transparent 25%
        ),
        linear-gradient(
            180deg,
            #fafbfb 0%,
            var(--bg) 100%
        );

    overflow: hidden;
}


/* ============================================================
   CONTAINER
   ============================================================ */

.withdrawal-container {

    width: 100%;
    max-width: 1080px;
    margin: auto;
}


/* ============================================================
   BACK BUTTON
   ============================================================ */

.withdrawal-back {

    margin-bottom: 18px;

    animation:
        wdFadeDown .6s ease both;
}

.withdrawal-back a {

    display: inline-flex;
    align-items: center;
    gap: 9px;

    color: var(--text);

    text-decoration: none;

    font-size: 13px;
    font-weight: 700;

    transition: .3s ease;
}

.withdrawal-back a:hover {

    color: var(--maroon);
    transform: translateX(-4px);
}

.withdrawal-back-icon {

    width: 34px;
    height: 34px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 10px;

    background: var(--white);
    border: 1px solid var(--border);

    color: var(--maroon);

    box-shadow:
        0 5px 16px rgba(0,0,0,.045);

    transition: .3s ease;
}

.withdrawal-back a:hover .withdrawal-back-icon {

    background: var(--maroon);
    border-color: var(--maroon);
    color: white;

    transform: translateX(-3px);
}


/* ============================================================
   HERO
   ============================================================ */

.withdrawal-hero {

    position: relative;

    padding: 48px 50px;

    margin-bottom: 24px;

    background: var(--white);

    border: 1px solid var(--border);

    border-radius: 25px;

    overflow: hidden;

    box-shadow:
        0 18px 45px rgba(36,43,48,.065);

    animation:
        wdHero .8s cubic-bezier(.22,1,.36,1) both;
}


/* TOP LINE */

.withdrawal-hero::before {

    content: "";

    position: absolute;

    left: 0;
    top: 0;

    width: 100%;
    height: 4px;

    background:
        linear-gradient(
            90deg,
            var(--maroon) 0%,
            var(--maroon) 64%,
            var(--green) 100%
        );
}


/* BIG CIRCLE */

.withdrawal-hero::after {

    content: "";

    position: absolute;

    width: 330px;
    height: 330px;

    right: -170px;
    top: -170px;

    border-radius: 50%;

    border:
        65px solid rgba(139,37,50,.035);

    animation:
        wdFloat 6s ease-in-out infinite;

    pointer-events: none;
}


/* floating decoration */

.hero-orbit {

    position: absolute;

    right: 65px;
    bottom: -40px;

    width: 150px;
    height: 150px;

    border-radius: 50%;

    border:
        22px solid rgba(52,113,91,.045);

    animation:
        wdRotate 14s linear infinite;

    pointer-events: none;
}

.hero-dot {

    position: absolute;

    width: 9px;
    height: 9px;

    right: 180px;
    top: 55px;

    border-radius: 50%;

    background: var(--green);

    opacity: .18;

    animation:
        wdPulse 2.5s ease-in-out infinite;
}


/* HERO CONTENT */

.withdrawal-hero-content {

    position: relative;

    z-index: 3;

    max-width: 820px;
}


/* LABEL */

.withdrawal-label {

    display: inline-flex;

    align-items: center;
    gap: 8px;

    padding: 8px 13px;

    margin-bottom: 17px;

    border-radius: 9px;

    background: var(--maroon-soft);

    border: 1px solid var(--maroon-line);

    color: var(--maroon);

    font-size: 10px;

    font-weight: 900;

    letter-spacing: 1.4px;

    text-transform: uppercase;

    animation:
        wdFadeUp .7s .15s ease both;
}

.withdrawal-label-dot {

    width: 7px;
    height: 7px;

    border-radius: 50%;

    background: var(--maroon);

    box-shadow:
        0 0 0 4px rgba(139,37,50,.08);

    animation:
        wdPulse 2s infinite;
}


/* TITLE */

.withdrawal-hero h1 {

    margin: 0 0 13px;

    font-size: 40px;

    line-height: 1.15;

    letter-spacing: -.9px;

    font-weight: 850;

    color: var(--text);

    animation:
        wdFadeUp .7s .22s ease both;
}

.withdrawal-hero h1 span {

    color: var(--maroon);

    position: relative;
}

.withdrawal-hero h1 span::after {

    content: "";

    position: absolute;

    left: 0;
    right: 0;
    bottom: -5px;

    height: 2px;

    background:
        linear-gradient(
            90deg,
            var(--maroon),
            transparent
        );

    transform-origin: left;

    animation:
        wdLine .8s .7s ease both;
}


/* DESCRIPTION */

.withdrawal-hero-description {

    margin: 0;

    max-width: 790px;

    color: var(--text-soft);

    font-size: 14px;

    line-height: 1.85;

    animation:
        wdFadeUp .7s .3s ease both;
}

.withdrawal-hero-description strong {

    color: var(--maroon-dark);
}


/* STATUS */

.withdrawal-status {

    display: inline-flex;

    align-items: center;
    gap: 10px;

    margin-top: 22px;

    padding: 10px 14px;

    border-radius: 10px;

    background: var(--green-soft);

    border: 1px solid var(--green-line);

    color: var(--green-dark);

    font-size: 11.5px;

    font-weight: 700;

    animation:
        wdFadeUp .7s .4s ease both;
}

.status-icon {

    width: 19px;
    height: 19px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: var(--green);

    color: white;

    font-size: 10px;

    animation:
        wdPulse 2.5s infinite;
}


/* ============================================================
   IMPORTANT INFO
   ============================================================ */

.withdrawal-info {

    display: grid;

    grid-template-columns: 55px 1fr auto;

    align-items: center;

    gap: 17px;

    padding: 21px 24px;

    margin-bottom: 42px;

    background:
        linear-gradient(
            110deg,
            #f0f7f3,
            #fbfdfc
        );

    border: 1px solid var(--green-line);

    border-radius: 17px;

    position: relative;

    overflow: hidden;

    animation:
        wdFadeUp .7s .15s ease both;
}

.withdrawal-info::before {

    content: "";

    position: absolute;

    left: 0;
    top: 0;
    bottom: 0;

    width: 4px;

    background: var(--green);
}

.withdrawal-info::after {

    content: "";

    position: absolute;

    width: 120px;
    height: 120px;

    right: -50px;
    top: -60px;

    border-radius: 50%;

    background: rgba(52,113,91,.04);
}


/* INFO ICON */

.info-icon {

    width: 50px;
    height: 50px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 14px;

    background: var(--green);

    color: white;

    font-size: 20px;

    font-weight: 900;

    box-shadow:
        0 9px 22px rgba(52,113,91,.18);

    animation:
        wdIconFloat 3s ease-in-out infinite;
}

.withdrawal-info h3 {

    margin: 0 0 5px;

    color: var(--green-dark);

    font-size: 15px;

    font-weight: 850;
}

.withdrawal-info p {

    margin: 0;

    color: #65736c;

    font-size: 12.5px;

    line-height: 1.75;
}

.withdrawal-info strong {

    color: var(--green-dark);
}


/* INFO BADGE */

.info-badge {

    padding: 8px 11px;

    border-radius: 8px;

    background: white;

    border: 1px solid var(--green-line);

    color: var(--green);

    font-size: 10px;

    font-weight: 800;

    white-space: nowrap;
}


/* ============================================================
   SECTION HEADING
   ============================================================ */

.withdrawal-section-heading {

    margin-bottom: 25px;

    animation:
        wdFadeUp .6s ease both;
}

.heading-row {

    display: flex;

    align-items: center;

    gap: 13px;
}

.heading-icon {

    width: 44px;
    height: 44px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 12px;

    background: var(--maroon-soft);

    border: 1px solid var(--maroon-line);

    color: var(--maroon);

    font-size: 17px;

    box-shadow:
        0 5px 15px rgba(139,37,50,.06);

    animation:
        wdIconFloat 3.5s ease-in-out infinite;
}

.withdrawal-section-heading h2 {

    margin: 0;

    color: var(--text);

    font-size: 24px;

    font-weight: 850;

    letter-spacing: -.3px;
}

.withdrawal-section-heading p {

    margin: 6px 0 0 57px;

    color: var(--muted);

    font-size: 12.5px;
}


/* ============================================================
   PROCESS
   ============================================================ */

.withdrawal-process {

    position: relative;

    margin-bottom: 48px;
}


/* animated line */

.withdrawal-process::before {

    content: "";

    position: absolute;

    left: 25px;

    top: 26px;
    bottom: 26px;

    width: 2px;

    background:
        linear-gradient(
            180deg,
            var(--maroon),
            var(--maroon-line) 55%,
            var(--green)
        );

    opacity: .7;

    transform-origin: top;

    animation:
        wdTimeline 1.5s .4s ease both;
}


/* STEP */

.withdrawal-step {

    display: grid;

    grid-template-columns: 52px 1fr;

    gap: 19px;

    margin-bottom: 18px;

    position: relative;

    animation:
        wdStep .65s ease both;
}

.withdrawal-step:nth-child(1) {
    animation-delay: .1s;
}

.withdrawal-step:nth-child(2) {
    animation-delay: .22s;
}

.withdrawal-step:nth-child(3) {
    animation-delay: .34s;
}


/* NUMBER */

.step-number {

    width: 52px;
    height: 52px;

    display: flex;
    align-items: center;
    justify-content: center;

    position: relative;
    z-index: 3;

    border-radius: 50%;

    background: white;

    border: 2px solid var(--maroon-line);

    color: var(--maroon);

    font-size: 12px;

    font-weight: 900;

    box-shadow:
        0 7px 18px rgba(0,0,0,.055);

    transition: .35s ease;
}

.withdrawal-step:hover .step-number {

    background: var(--maroon);

    border-color: var(--maroon);

    color: white;

    transform:
        scale(1.1)
        rotate(-4deg);

    box-shadow:
        0 10px 25px rgba(139,37,50,.2);
}


/* CARD */

.withdrawal-card {

    position: relative;

    padding: 26px 29px;

    background: white;

    border: 1px solid var(--border);

    border-radius: 17px;

    box-shadow:
        0 7px 23px rgba(34,41,46,.04);

    overflow: hidden;

    transition:
        transform .35s cubic-bezier(.22,1,.36,1),
        box-shadow .35s ease,
        border-color .35s ease;
}


/* CARD SHINE */

.withdrawal-card::after {

    content: "";

    position: absolute;

    top: 0;
    left: -100%;

    width: 60%;
    height: 100%;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,.8),
            transparent
        );

    transform: skewX(-20deg);

    transition: left .7s ease;

    pointer-events: none;
}

.withdrawal-card:hover::after {

    left: 140%;
}


/* LEFT INDICATOR */

.withdrawal-card::before {

    content: "";

    position: absolute;

    left: 0;
    top: 17px;
    bottom: 17px;

    width: 3px;

    background:
        linear-gradient(
            180deg,
            var(--maroon),
            var(--green)
        );

    border-radius:
        0 4px 4px 0;

    transform:
        scaleY(0);

    transform-origin: center;

    transition: .35s ease;
}

.withdrawal-card:hover {

    transform:
        translateX(6px)
        translateY(-2px);

    border-color: var(--maroon-line);

    box-shadow:
        0 17px 35px rgba(34,41,46,.08);
}

.withdrawal-card:hover::before {

    transform:
        scaleY(1);
}


/* CARD TOP */

.card-top {

    display: flex;

    align-items: flex-start;
    justify-content: space-between;

    gap: 15px;

    margin-bottom: 10px;
}

.withdrawal-card h3 {

    margin: 0;

    color: var(--text);

    font-size: 18px;

    font-weight: 850;
}

.step-tag {

    padding: 6px 9px;

    border-radius: 7px;

    background: #f7f8f9;

    border: 1px solid var(--border);

    color: var(--muted);

    font-size: 9px;

    font-weight: 900;

    letter-spacing: .7px;

    text-transform: uppercase;
}

.withdrawal-card p {

    margin: 0;

    color: var(--text-soft);

    font-size: 13px;

    line-height: 1.85;
}

.withdrawal-card strong {

    color: var(--maroon-dark);
}


/* ============================================================
   CHECK ITEMS
   ============================================================ */

.step-items {

    display: flex;

    flex-wrap: wrap;

    gap: 8px;

    margin-top: 18px;
}

.step-item {

    display: inline-flex;

    align-items: center;

    gap: 7px;

    padding: 8px 11px;

    background: #fafbfb;

    border: 1px solid var(--border);

    border-radius: 9px;

    color: #59635e;

    font-size: 11px;

    font-weight: 600;

    transition: .25s ease;
}

.step-item-icon {

    width: 19px;
    height: 19px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 6px;

    background: var(--green-soft);

    color: var(--green);

    font-size: 9px;

    font-weight: 900;

    transition: .25s ease;
}

.step-item:hover {

    transform: translateY(-3px);

    background: var(--green-soft);

    border-color: var(--green-line);
}

.step-item:hover .step-item-icon {

    background: var(--green);

    color: white;

    transform: rotate(8deg);
}


/* ============================================================
   MONEY FLOW VISUAL
   ============================================================ */

.money-flow {

    display: flex;

    align-items: center;

    gap: 11px;

    margin-top: 19px;

    padding: 13px;

    background: #fafbfb;

    border: 1px solid var(--border);

    border-radius: 11px;
}

.money-node {

    display: flex;

    align-items: center;

    gap: 7px;

    color: var(--text);

    font-size: 11px;

    font-weight: 750;
}

.money-node-icon {

    width: 29px;
    height: 29px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 8px;

    background: var(--maroon-soft);

    color: var(--maroon);

    font-size: 11px;

    font-weight: 900;
}

.money-node:last-child .money-node-icon {

    background: var(--green-soft);

    color: var(--green);
}

.money-arrow {

    flex: 1;

    height: 1px;

    position: relative;

    background: #d9dddf;

    overflow: hidden;
}

.money-arrow::after {

    content: "›";

    position: absolute;

    right: 0;
    top: 50%;

    transform:
        translateY(-55%);

    color: var(--maroon);

    font-size: 17px;

    background: #fafbfb;

    padding-left: 4px;
}


/* ============================================================
   WARNING
   ============================================================ */

.withdrawal-warning {

    position: relative;

    padding: 24px 27px;

    margin-bottom: 50px;

    background:
        linear-gradient(
            110deg,
            #fff7f8,
            #fffafa
        );

    border: 1px solid #ecd7da;

    border-radius: 17px;

    overflow: hidden;

    animation:
        wdFadeUp .7s ease both;
}

.withdrawal-warning::before {

    content: "";

    position: absolute;

    left: 0;
    top: 0;
    bottom: 0;

    width: 4px;

    background:
        linear-gradient(
            180deg,
            var(--maroon),
            #b64a59
        );
}

.withdrawal-warning::after {

    content: "!";

    position: absolute;

    right: 28px;
    bottom: -25px;

    font-size: 100px;

    line-height: 1;

    color: rgba(139,37,50,.035);

    font-weight: 900;
}

.warning-title {

    display: flex;

    align-items: center;

    gap: 10px;

    margin-bottom: 10px;

    color: var(--maroon-dark);

    font-size: 16px;

    font-weight: 850;
}

.warning-icon {

    width: 31px;
    height: 31px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 9px;

    background: var(--maroon);

    color: white;

    font-size: 13px;

    font-weight: 900;

    animation:
        wdPulse 2.5s infinite;
}

.withdrawal-warning p {

    position: relative;

    z-index: 2;

    margin: 0 0 9px;

    color: #686268;

    font-size: 12.5px;

    line-height: 1.85;
}

.withdrawal-warning p:last-child {

    margin-bottom: 0;
}

.withdrawal-warning strong {

    color: var(--maroon-dark);
}


/* ============================================================
   LEGALITY
   ============================================================ */

.legal-section {

    animation:
        wdFadeUp .7s ease both;
}

.legal-grid {

    display: grid;

    grid-template-columns:
        repeat(4, 1fr);

    gap: 14px;

    margin-top: 23px;
}

.legal-card {

    position: relative;

    padding: 21px;

    background: white;

    border: 1px solid var(--border);

    border-radius: 15px;

    text-decoration: none;

    overflow: hidden;

    box-shadow:
        0 6px 20px rgba(34,41,46,.035);

    transition:
        transform .35s ease,
        box-shadow .35s ease,
        border-color .35s ease;
}

.legal-card::before {

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

    transform-origin: left;

    transition: .35s ease;
}

.legal-card:hover {

    transform:
        translateY(-6px);

    border-color: var(--maroon-line);

    box-shadow:
        0 16px 32px rgba(34,41,46,.08);
}

.legal-card:hover::before {

    transform:
        scaleX(1);
}

.legal-icon {

    width: 40px;
    height: 40px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-bottom: 14px;

    border-radius: 10px;

    background: var(--maroon-soft);

    border: 1px solid var(--maroon-line);

    color: var(--maroon);

    font-size: 14px;

    font-weight: 900;

    transition: .3s ease;
}

.legal-card:hover .legal-icon {

    background: var(--maroon);

    border-color: var(--maroon);

    color: white;

    transform:
        rotate(-4deg)
        scale(1.07);
}

.legal-card h3 {

    margin: 0 0 5px;

    color: var(--text);

    font-size: 15px;

    font-weight: 850;
}

.legal-card span {

    color: var(--muted);

    font-size: 10.5px;

    font-weight: 650;
}

.legal-arrow {

    position: absolute;

    top: 16px;
    right: 16px;

    width: 27px;
    height: 27px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 7px;

    background: #f7f8f9;

    border: 1px solid var(--border);

    color: var(--muted);

    font-size: 12px;

    transition: .3s ease;
}

.legal-card:hover .legal-arrow {

    background: var(--maroon);

    border-color: var(--maroon);

    color: white;

    transform:
        translate(2px,-2px);
}


/* ============================================================
   ANIMATION
   ============================================================ */

@keyframes wdHero {

    from {
        opacity: 0;
        transform:
            translateY(-22px)
            scale(.985);
    }

    to {
        opacity: 1;
        transform:
            translateY(0)
            scale(1);
    }
}

@keyframes wdFadeDown {

    from {
        opacity: 0;
        transform: translateY(-10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes wdFadeUp {

    from {
        opacity: 0;
        transform: translateY(18px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes wdStep {

    from {
        opacity: 0;
        transform:
            translateX(-18px)
            translateY(12px);
    }

    to {
        opacity: 1;
        transform:
            translateX(0)
            translateY(0);
    }
}

@keyframes wdTimeline {

    from {
        transform: scaleY(0);
    }

    to {
        transform: scaleY(1);
    }
}

@keyframes wdLine {

    from {
        transform: scaleX(0);
    }

    to {
        transform: scaleX(1);
    }
}

@keyframes wdFloat {

    0%,100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(12px);
    }
}

@keyframes wdRotate {

    from {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(360deg);
    }
}

@keyframes wdPulse {

    0%,100% {
        transform: scale(1);
        opacity: 1;
    }

    50% {
        transform: scale(1.12);
        opacity: .75;
    }
}

@keyframes wdIconFloat {

    0%,100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-4px);
    }
}


/* ============================================================
   TABLET
   ============================================================ */

@media (max-width: 1000px) {

    .withdrawal-page {
        padding:
            28px 25px 60px;
    }

    .legal-grid {
        grid-template-columns:
            repeat(2,1fr);
    }

}


/* ============================================================
   MOBILE
   ============================================================ */

@media (max-width: 700px) {

    .withdrawal-page {
        padding:
            22px 15px 50px;
    }

    .withdrawal-hero {
        padding:
            35px 25px;
        border-radius: 20px;
    }

    .withdrawal-hero h1 {
        font-size: 29px;
    }

    .withdrawal-hero-description {
        font-size: 12.5px;
    }

    .withdrawal-info {

        grid-template-columns:
            43px 1fr;

        padding:
            18px;

        gap: 12px;
    }

    .info-icon {

        width: 43px;
        height: 43px;

        border-radius: 12px;
    }

    .info-badge {
        display: none;
    }

    .withdrawal-section-heading h2 {
        font-size: 20px;
    }

    .withdrawal-section-heading p {
        margin-left: 57px;
        font-size: 11.5px;
    }

    .withdrawal-process::before {
        left: 21px;
    }

    .withdrawal-step {

        grid-template-columns:
            44px 1fr;

        gap: 12px;
    }

    .step-number {

        width: 44px;
        height: 44px;

        font-size: 10px;
    }

    .withdrawal-card {

        padding:
            20px;

        border-radius: 14px;
    }

    .withdrawal-card h3 {
        font-size: 15px;
    }

    .withdrawal-card p {
        font-size: 12px;
    }

    .step-tag {
        display: none;
    }

    .money-flow {
        flex-direction: column;
        align-items: stretch;
    }

    .money-arrow {
        width: 100%;
    }

    .legal-grid {
        grid-template-columns: 1fr;
    }

}


/* ============================================================
   SMALL MOBILE
   ============================================================ */

@media (max-width: 420px) {

    .withdrawal-page {
        padding:
            18px 11px 40px;
    }

    .withdrawal-hero {
        padding:
            29px 20px;
    }

    .withdrawal-hero h1 {
        font-size: 25px;
    }

    .withdrawal-status {
        align-items: flex-start;
        line-height: 1.5;
    }

    .withdrawal-info {
        grid-template-columns: 1fr;
    }

    .info-icon {
        width: 40px;
        height: 40px;
    }

    .withdrawal-section-heading p {
        margin-left: 0;
    }

    .withdrawal-step {
        grid-template-columns: 39px 1fr;
        gap: 9px;
    }

    .step-number {
        width: 39px;
        height: 39px;
    }

    .withdrawal-process::before {
        left: 18px;
    }

    .withdrawal-card {
        padding: 17px;
    }

}


/* ============================================================
   REDUCED MOTION
   ============================================================ */

@media (prefers-reduced-motion: reduce) {

    *,
    *::before,
    *::after {

        animation-duration: .01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: .01ms !important;
    }

}

</style>


<div class="withdrawal-page">

<div class="withdrawal-container">


    {{-- ========================================================
         BACK
    ========================================================= --}}

    <div class="withdrawal-back">

        <a href="{{ url()->previous() }}">

            <span class="withdrawal-back-icon">
                ←
            </span>

            Kembali

        </a>

    </div>



    {{-- ========================================================
         HERO
    ========================================================= --}}

    <section class="withdrawal-hero">

        <div class="hero-orbit"></div>
        <div class="hero-dot"></div>

        <div class="withdrawal-hero-content">

            <div class="withdrawal-label">

                <span class="withdrawal-label-dot"></span>

                Prosedur Transaksi

            </div>


            <h1>

                Prosedur

                <span>
                    Penarikan Dana
                </span>

            </h1>


            <p class="withdrawal-hero-description">

                Penarikan dana atau
                <strong>Withdrawal</strong>
                dapat dilakukan oleh nasabah sesuai dengan
                ketentuan yang berlaku. Pastikan seluruh proses
                dilakukan melalui prosedur resmi agar penarikan
                dana dapat diproses dengan baik.

            </p>


            <div class="withdrawal-status">

                <span class="status-icon">
                    ✓
                </span>

                Ikuti setiap tahapan sesuai prosedur yang telah ditentukan.

            </div>

        </div>

    </section>



    {{-- ========================================================
         IMPORTANT INFO
    ========================================================= --}}

    <section class="withdrawal-info">

        <div class="info-icon">
            !
        </div>

        <div>

            <h3>
                Perhatikan Effective Margin
            </h3>

            <p>

                Dana yang ditarik tidak boleh melebihi jumlah
                <strong>Effective Margin</strong>
                yang terdapat pada laporan transaksi harian
                nasabah atau
                <strong>Statement Report</strong>.

            </p>

        </div>

        <div class="info-badge">
            PENTING
        </div>

    </section>



    {{-- ========================================================
         SECTION TITLE
    ========================================================= --}}

    <section class="withdrawal-section-heading">

        <div class="heading-row">

            <div class="heading-icon">
                ↓
            </div>

            <div>

                <h2>
                    Proses Penarikan Dana
                </h2>

            </div>

        </div>

        <p>
            Ikuti tiga tahapan berikut untuk melakukan Withdrawal.
        </p>

    </section>



    {{-- ========================================================
         PROCESS
    ========================================================= --}}

    <section class="withdrawal-process">


        {{-- STEP 01 --}}

        <div class="withdrawal-step">

            <div class="step-number">
                01
            </div>


            <div class="withdrawal-card">

                <div class="card-top">

                    <h3>
                        Isi Withdrawal Form
                    </h3>

                    <span class="step-tag">
                        Tahap 01
                    </span>

                </div>


                <p>

                    Nasabah mengisi dan menandatangani
                    <strong>
                        Lembar Aplikasi Penarikan Dana
                        (Withdrawal Form)
                    </strong>
                    sebagai dokumen pengajuan penarikan dana.

                </p>


                <div class="step-items">

                    <div class="step-item">

                        <span class="step-item-icon">
                            ✓
                        </span>

                        Isi formulir

                    </div>


                    <div class="step-item">

                        <span class="step-item-icon">
                            ✓
                        </span>

                        Pastikan data benar

                    </div>


                    <div class="step-item">

                        <span class="step-item-icon">
                            ✓
                        </span>

                        Tanda tangan

                    </div>

                </div>

            </div>

        </div>



        {{-- STEP 02 --}}

        <div class="withdrawal-step">

            <div class="step-number">
                02
            </div>


            <div class="withdrawal-card">

                <div class="card-top">

                    <h3>
                        Pengajuan Withdrawal
                    </h3>

                    <span class="step-tag">
                        Tahap 02
                    </span>

                </div>


                <p>

                    Withdrawal Form yang telah diisi dan
                    ditandatangani diberikan kepada
                    <strong>
                        PT Rifan Financindo Berjangka
                    </strong>
                    untuk diproses sesuai dengan ketentuan
                    yang berlaku.

                </p>


                <div class="step-items">

                    <div class="step-item">

                        <span class="step-item-icon">
                            ✓
                        </span>

                        Form telah diisi

                    </div>


                    <div class="step-item">

                        <span class="step-item-icon">
                            ✓
                        </span>

                        Form telah ditandatangani

                    </div>


                    <div class="step-item">

                        <span class="step-item-icon">
                            ✓
                        </span>

                        Pengajuan diproses

                    </div>

                </div>

            </div>

        </div>



        {{-- STEP 03 --}}

        <div class="withdrawal-step">

            <div class="step-number">
                03
            </div>


            <div class="withdrawal-card">

                <div class="card-top">

                    <h3>
                        Dana Ditransfer ke Rekening Nasabah
                    </h3>

                    <span class="step-tag">
                        Tahap 03
                    </span>

                </div>


                <p>

                    Penarikan dana hanya dapat ditransfer
                    ke rekening atas nama nasabah yang
                    bersangkutan dan harus sesuai dengan
                    rekening yang tercantum pada
                    <strong>
                        Aplikasi Pembukaan Rekening
                    </strong>
                    di dalam Buku Perjanjian.

                </p>


                <div class="money-flow">

                    <div class="money-node">

                        <span class="money-node-icon">
                            R
                        </span>

                        PT RFB

                    </div>


                    <div class="money-arrow"></div>


                    <div class="money-node">

                        <span class="money-node-icon">
                            ✓
                        </span>

                        Rekening Nasabah

                    </div>

                </div>


                <div class="step-items">

                    <div class="step-item">

                        <span class="step-item-icon">
                            ✓
                        </span>

                        Atas nama nasabah

                    </div>


                    <div class="step-item">

                        <span class="step-item-icon">
                            ✓
                        </span>

                        Sesuai data rekening

                    </div>

                </div>

            </div>

        </div>


    </section>



    {{-- ========================================================
         WARNING
    ========================================================= --}}

    <section class="withdrawal-warning">

        <div class="warning-title">

            <span class="warning-icon">
                !
            </span>

            Perhatian!

        </div>


        <p>

            Managemen PT. Rifan Financindo Berjangka (PT RFB)
            menghimbau kepada seluruh masyarakat untuk lebih
            berhati-hati terhadap beberapa bentuk penipuan yang
            berkedok investasi dan mengatasnamakan PT RFB
            menggunakan media elektronik ataupun sosial media.

        </p>


        <p>

            Pastikan transfer dana untuk melaksanakan transaksi
            Perdagangan Berjangka dilakukan ke rekening tujuan
            <strong>Segregated Account</strong> atas nama
            <strong>
                PT Rifan Financindo Berjangka
            </strong>,
            bukan atas nama individu.

        </p>

    </section>



    {{-- ========================================================
         LEGALITAS
    ========================================================= --}}

    <section class="legal-section">


        <div class="withdrawal-section-heading">

            <div class="heading-row">

                <div class="heading-icon">
                    ✓
                </div>

                <div>

                    <h2>
                        Link Legalitas
                    </h2>

                </div>

            </div>

            <p>
                Informasi resmi mengenai lembaga dan legalitas terkait.
            </p>

        </div>


        <div class="legal-grid">


            {{-- BAPPEBTI --}}

            <a
                href="https://bappebti.go.id/pialang_berjangka/detail/012"
                target="_blank"
                rel="noopener noreferrer"
                class="legal-card"
            >

                <div class="legal-arrow">
                    ↗
                </div>

                <div class="legal-icon">
                    B
                </div>

                <h3>
                    BAPPEBTI
                </h3>

                <span>
                    Lihat informasi resmi
                </span>

            </a>



            {{-- JFX --}}

            <a
                href="https://jfx.co.id/MarketMaker/market_maker"
                target="_blank"
                rel="noopener noreferrer"
                class="legal-card"
            >

                <div class="legal-arrow">
                    ↗
                </div>

                <div class="legal-icon">
                    J
                </div>

                <h3>
                    JFX
                </h3>

                <span>
                    Lihat informasi resmi
                </span>

            </a>



            {{-- KBI --}}

            <a
                href="https://www.ptkbi.com/our-partner/perdagangan-berjangka-komoditi"
                target="_blank"
                rel="noopener noreferrer"
                class="legal-card"
            >

                <div class="legal-arrow">
                    ↗
                </div>

                <div class="legal-icon">
                    K
                </div>

                <h3>
                    KBI
                </h3>

                <span>
                    Lihat informasi resmi
                </span>

            </a>



            {{-- ASPEBTINDO --}}

            <a
                href="https://www.rf-berjangkasemarang.com/service-details.html"
                target="_blank"
                rel="noopener noreferrer"
                class="legal-card"
            >

                <div class="legal-arrow">
                    ↗
                </div>

                <div class="legal-icon">
                    A
                </div>

                <h3>
                    Aspebtindo
                </h3>

                <span>
                    Lihat informasi resmi
                </span>

            </a>


        </div>

    </section>


</div>

</div>

@endsection