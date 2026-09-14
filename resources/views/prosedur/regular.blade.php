@extends('layouts.app')

@section('content')

<style>

/* ============================================================
   REGULAR PAGE
   ============================================================ */

.regular-page {
    --red: #8b2532;
    --red-dark: #701c28;
    --red-light: #f8eef0;
    --red-border: #ead4d8;

    --green: #2f6b57;
    --green-light: #edf5f1;

    --text: #27313b;
    --text-soft: #68727d;
    --muted: #8a929c;

    --border: #e4e7eb;
    --white: #ffffff;

    width: 100%;
    min-height: 100vh;

    padding: 30px 40px 70px;

    box-sizing: border-box;

    background:
        radial-gradient(
            circle at 90% 5%,
            rgba(139,37,50,.035),
            transparent 300px
        ),
        linear-gradient(
            180deg,
            #fcfcfd 0%,
            #f6f7f9 100%
        );

    color: var(--text);
}


/* ============================================================
   BACK BUTTON
   ============================================================ */

.regular-back {
    width: 100%;
    max-width: 1210px;

    margin: 0 auto 20px;

    opacity: 0;

    transform: translateY(-12px);

    animation:
        backEnter .7s cubic-bezier(.22,1,.36,1)
        .05s forwards;
}

.regular-back a {
    display: inline-flex;

    align-items: center;

    gap: 10px;

    color: var(--text);

    text-decoration: none;

    font-size: 14px;

    font-weight: 700;

    transition:
        color .25s ease,
        transform .25s ease;
}

.regular-back a:hover {
    color: var(--red);

    transform:
        translateX(-3px);
}

.regular-arrow {
    width: 35px;
    height: 35px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 10px;

    background: #fff;

    border: 1px solid var(--border);

    color: var(--red);

    font-size: 17px;

    box-shadow:
        0 6px 18px rgba(39,49,59,.06);

    transition:
        background .25s ease,
        border-color .25s ease,
        color .25s ease,
        box-shadow .25s ease;
}

.regular-back a:hover .regular-arrow {
    background: var(--red);

    border-color: var(--red);

    color: #fff;

    box-shadow:
        0 8px 20px rgba(139,37,50,.18);
}


/* ============================================================
   HERO
   ============================================================ */

.regular-hero {
    width: 100%;
    max-width: 1210px;

    height: 320px;

    margin: 0 auto 50px;

    position: relative;

    overflow: hidden;

    box-sizing: border-box;

    padding: 46px 52px;

    border-radius: 24px;

    background:
        linear-gradient(
            135deg,
            #ffffff 0%,
            #fffafb 100%
        );

    border: 1px solid var(--border);

    box-shadow:
        0 18px 45px rgba(39,49,59,.08);

    opacity: 0;

    transform:
        translateY(25px)
        scale(.985);

    filter: blur(4px);

    animation:
        heroEnter
        .9s
        cubic-bezier(.22,1,.36,1)
        .12s
        forwards;
}


/* garis atas */

.regular-hero-line {
    position: absolute;

    top: 0;
    left: 0;

    width: 100%;
    height: 5px;

    background:
        linear-gradient(
            90deg,
            var(--red) 0%,
            var(--red) 68%,
            var(--green) 68%,
            var(--green) 100%
        );

    transform-origin: left;

    animation:
        heroLineEnter
        1s
        cubic-bezier(.22,1,.36,1)
        .35s
        both;
}


/* dekorasi besar */

.regular-hero::before {
    content: "";

    position: absolute;

    width: 320px;
    height: 320px;

    right: -155px;
    top: -170px;

    border-radius: 50%;

    border: 55px solid rgba(139,37,50,.035);

    pointer-events: none;

    opacity: 0;

    transform: scale(.75);

    animation:
        decorationEnter
        1.2s
        cubic-bezier(.22,1,.36,1)
        .4s
        forwards;
}

.regular-hero::after {
    content: "";

    position: absolute;

    width: 180px;
    height: 180px;

    right: 70px;
    bottom: -135px;

    border-radius: 50%;

    border: 35px solid rgba(47,107,87,.04);

    pointer-events: none;

    opacity: 0;

    transform: scale(.7);

    animation:
        decorationEnter
        1.1s
        cubic-bezier(.22,1,.36,1)
        .5s
        forwards;
}


/* isi */

.regular-hero-content {
    position: relative;

    z-index: 5;

    max-width: 820px;
}


/* label */

.regular-hero-label {
    display: inline-flex;

    align-items: center;

    gap: 8px;

    padding: 8px 14px;

    margin-bottom: 16px;

    border-radius: 9px;

    background: var(--red-light);

    border: 1px solid var(--red-border);

    color: var(--red);

    font-size: 11px;

    font-weight: 800;

    letter-spacing: 1.3px;

    text-transform: uppercase;

    opacity: 0;

    transform: translateY(12px);

    animation:
        heroChildEnter
        .65s
        cubic-bezier(.22,1,.36,1)
        .42s
        forwards;
}

.regular-hero-label::before {
    content: "";

    width: 7px;
    height: 7px;

    border-radius: 50%;

    background: var(--red);

    box-shadow:
        0 0 0 4px rgba(139,37,50,.08);
}


/* judul */

.regular-hero h1 {
    margin: 0 0 12px;

    color: var(--text);

    font-size: 39px;

    line-height: 1.18;

    font-weight: 850;

    letter-spacing: -1px;

    opacity: 0;

    transform: translateY(15px);

    animation:
        heroChildEnter
        .7s
        cubic-bezier(.22,1,.36,1)
        .52s
        forwards;
}

.regular-hero h1 span {
    color: var(--red);

    display: inline-block;
}


/* deskripsi */

.regular-hero-description {
    max-width: 760px;

    margin: 0;

    color: var(--text-soft);

    font-size: 14px;

    line-height: 1.75;

    opacity: 0;

    transform: translateY(14px);

    animation:
        heroChildEnter
        .7s
        cubic-bezier(.22,1,.36,1)
        .62s
        forwards;
}


/* status */

.regular-hero-status {
    display: inline-flex;

    align-items: center;

    gap: 10px;

    margin-top: 19px;

    padding: 10px 15px;

    background: var(--green-light);

    border: 1px solid #d6e6de;

    border-radius: 10px;

    color: #255443;

    font-size: 12px;

    font-weight: 700;

    opacity: 0;

    transform: translateY(14px);

    animation:
        heroChildEnter
        .7s
        cubic-bezier(.22,1,.36,1)
        .72s
        forwards;
}

.regular-status-icon {
    width: 8px;
    height: 8px;

    flex-shrink: 0;

    border-radius: 50%;

    background: var(--green);

    box-shadow:
        0 0 0 4px rgba(47,107,87,.10);
}


/* ============================================================
   SECTION HEADER
   ============================================================ */

.regular-section-title {
    width: 100%;
    max-width: 1100px;

    margin: 0 auto 24px;

    opacity: 0;

    transform: translateY(35px);

    filter: blur(4px);

    transition:
        opacity .8s cubic-bezier(.22,1,.36,1),
        transform .8s cubic-bezier(.22,1,.36,1),
        filter .8s cubic-bezier(.22,1,.36,1);
}

.regular-section-title.show {
    opacity: 1;

    transform: translateY(0);

    filter: blur(0);
}

.regular-title-row {
    display: flex;

    align-items: center;

    gap: 13px;
}

.regular-title-icon {
    width: 45px;
    height: 45px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 12px;

    background:
        linear-gradient(
            145deg,
            #fff5f6,
            #f8e9ec
        );

    border: 1px solid var(--red-border);

    color: var(--red);

    font-size: 18px;

    font-weight: 900;

    box-shadow:
        0 6px 16px rgba(139,37,50,.07);

    transition:
        transform .3s ease,
        box-shadow .3s ease;
}

.regular-title-row:hover .regular-title-icon {
    transform:
        translateY(-2px)
        rotate(-2deg);

    box-shadow:
        0 10px 22px rgba(139,37,50,.11);
}

.regular-section-title h2 {
    margin: 0;

    color: var(--text);

    font-size: 26px;

    line-height: 1.2;

    font-weight: 850;

    letter-spacing: -.4px;
}

.regular-section-title > p {
    margin: 6px 0 0 58px;

    color: var(--text-soft);

    font-size: 13px;

    line-height: 1.6;
}


/* ============================================================
   TIMELINE
   ============================================================ */

.regular-timeline {
    width: 100%;
    max-width: 1100px;

    margin: 0 auto;

    position: relative;
}


/* garis */

.regular-timeline::before {
    content: "";

    position: absolute;

    left: 31px;

    top: 31px;
    bottom: 31px;

    width: 1px;

    background:
        linear-gradient(
            180deg,
            #d8dde2,
            #e9ecef
        );

    z-index: 0;
}


/* ============================================================
   STEP
   ============================================================ */

.regular-step {
    display: flex;

    align-items: flex-start;

    gap: 23px;

    margin-bottom: 22px;

    position: relative;

    opacity: 0;

    transform:
        translateX(-28px)
        translateY(10px);

    filter: blur(4px);

    transition:
        opacity .7s cubic-bezier(.22,1,.36,1),
        transform .7s cubic-bezier(.22,1,.36,1),
        filter .7s cubic-bezier(.22,1,.36,1);
}

.regular-step.show {
    opacity: 1;

    transform:
        translateX(0)
        translateY(0);

    filter: blur(0);
}


/* stagger */

.regular-step:nth-child(1) {
    transition-delay: .02s;
}

.regular-step:nth-child(2) {
    transition-delay: .08s;
}

.regular-step:nth-child(3) {
    transition-delay: .14s;
}

.regular-step:nth-child(4) {
    transition-delay: .20s;
}

.regular-step:nth-child(5) {
    transition-delay: .26s;
}

.regular-step:nth-child(6) {
    transition-delay: .32s;
}


/* ============================================================
   NOMOR
   ============================================================ */

.regular-step-number {
    width: 63px;
    height: 63px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    position: relative;

    z-index: 3;

    box-sizing: border-box;

    border-radius: 16px;

    background: #ffffff;

    border: 1px solid #dfc5ca;

    color: var(--red);

    font-size: 14px;

    font-weight: 900;

    letter-spacing: .5px;

    box-shadow:
        0 7px 20px rgba(39,49,59,.07);

    transition:
        background .3s ease,
        color .3s ease,
        border-color .3s ease,
        transform .3s ease,
        box-shadow .3s ease;
}


/* hilangkan pseudo */

.regular-step-number::before,
.regular-step-number::after {
    content: none !important;

    display: none !important;
}


.regular-step:hover .regular-step-number {
    background: var(--red);

    border-color: var(--red);

    color: #fff;

    transform:
        translateY(-3px)
        scale(1.03);

    box-shadow:
        0 12px 25px rgba(139,37,50,.18);
}


/* ============================================================
   CARD
   ============================================================ */

.regular-step-card {
    flex: 1;

    min-width: 0;

    position: relative;

    box-sizing: border-box;

    padding: 27px 30px;

    background: rgba(255,255,255,.96);

    border: 1px solid var(--border);

    border-radius: 17px;

    box-shadow:
        0 8px 24px rgba(39,49,59,.045);

    transition:
        transform .3s ease,
        box-shadow .3s ease,
        border-color .3s ease;
}


/* garis kiri */

.regular-step-card::before {
    content: "";

    position: absolute;

    left: 0;

    top: 20px;
    bottom: 20px;

    width: 3px;

    background: var(--red);

    border-radius: 0 4px 4px 0;

    transform: scaleY(.35);

    transform-origin: center;

    opacity: 0;

    transition:
        transform .3s ease,
        opacity .3s ease;
}


.regular-step-card:hover {
    transform: translateX(5px);

    border-color: var(--red-border);

    box-shadow:
        0 15px 35px rgba(39,49,59,.085);
}


.regular-step-card:hover::before {
    opacity: 1;

    transform: scaleY(1);
}


/* judul */

.regular-step-card h3 {
    margin: 0 0 10px;

    color: var(--text);

    font-size: 19px;

    line-height: 1.4;

    font-weight: 850;
}


/* paragraf */

.regular-step-card p {
    margin: 0;

    color: var(--text-soft);

    font-size: 14px;

    line-height: 1.8;
}


/* strong */

.regular-step-card strong {
    color: var(--red-dark);

    font-weight: 800;
}


/* ============================================================
   DOCUMENT LIST
   ============================================================ */

.regular-document-list {
    display: grid;

    grid-template-columns: repeat(2, 1fr);

    gap: 10px;

    margin-top: 18px;
}

.regular-document-item {
    display: flex;

    align-items: center;

    gap: 10px;

    min-height: 43px;

    padding: 9px 12px;

    box-sizing: border-box;

    background: #fafbfc;

    border: 1px solid #e5e8ec;

    border-radius: 10px;

    color: #59636e;

    font-size: 12.5px;

    line-height: 1.5;

    transition:
        background .25s ease,
        border-color .25s ease,
        transform .25s ease;
}

.regular-document-item::before {
    content: "✓";

    width: 23px;
    height: 23px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 7px;

    background: var(--green-light);

    color: var(--green);

    font-size: 11px;

    font-weight: 900;
}

.regular-document-item:hover {
    background: var(--green-light);

    border-color: #d1e3da;

    transform: translateY(-2px);
}


/* ============================================================
   BANK SECTION
   ============================================================ */

.regular-bank-section {
    width: 100%;
    max-width: 1100px;

    margin: 58px auto 0;

    opacity: 0;

    transform: translateY(35px);

    filter: blur(4px);

    transition:
        opacity .8s cubic-bezier(.22,1,.36,1),
        transform .8s cubic-bezier(.22,1,.36,1),
        filter .8s cubic-bezier(.22,1,.36,1);
}

.regular-bank-section.show {
    opacity: 1;

    transform: translateY(0);

    filter: blur(0);
}


/* grid */

.regular-bank-grid {
    display: grid;

    grid-template-columns: repeat(2, 1fr);

    gap: 18px;
}


/* card */

.regular-bank-card {
    position: relative;

    padding: 25px;

    background:
        linear-gradient(
            145deg,
            #ffffff,
            #fcfcfd
        );

    border: 1px solid var(--border);

    border-radius: 17px;

    overflow: hidden;

    box-shadow:
        0 8px 25px rgba(39,49,59,.045);

    opacity: 0;

    transform: translateY(25px);

    transition:
        opacity .65s cubic-bezier(.22,1,.36,1),
        transform .65s cubic-bezier(.22,1,.36,1),
        box-shadow .3s ease,
        border-color .3s ease;
}

.regular-bank-section.show .regular-bank-card {
    opacity: 1;

    transform: translateY(0);
}

.regular-bank-section.show .regular-bank-card:nth-child(1) {
    transition-delay: .05s;
}

.regular-bank-section.show .regular-bank-card:nth-child(2) {
    transition-delay: .12s;
}

.regular-bank-section.show .regular-bank-card:nth-child(3) {
    transition-delay: .19s;
}

.regular-bank-section.show .regular-bank-card:nth-child(4) {
    transition-delay: .26s;
}

.regular-bank-section.show .regular-bank-card:nth-child(5) {
    transition-delay: .33s;
}


/* garis atas */

.regular-bank-card::before {
    content: "";

    position: absolute;

    left: 0;
    top: 0;

    width: 100%;
    height: 3px;

    background: var(--red);

    transform: scaleX(.12);

    transform-origin: left;

    transition: transform .35s ease;
}

.regular-bank-card:hover::before {
    transform: scaleX(1);
}

.regular-bank-card:hover {
    transform: translateY(-5px) !important;

    border-color: var(--red-border);

    box-shadow:
        0 16px 34px rgba(39,49,59,.08);
}


/* icon */

.regular-bank-icon {
    width: 45px;
    height: 45px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin-bottom: 14px;

    border-radius: 11px;

    background: var(--red-light);

    border: 1px solid var(--red-border);

    color: var(--red);

    font-size: 17px;

    font-weight: 900;

    transition: .3s ease;
}

.regular-bank-card:hover .regular-bank-icon {
    background: var(--red);

    border-color: var(--red);

    color: #fff;

    transform: scale(1.05);
}


/* name */

.regular-bank-name {
    color: var(--text);

    font-size: 17px;

    font-weight: 850;

    margin-bottom: 4px;
}


/* branch */

.regular-bank-branch {
    color: var(--muted);

    font-size: 12px;

    margin-bottom: 15px;
}


/* account */

.regular-account-row {
    display: flex;

    align-items: center;
    justify-content: space-between;

    gap: 15px;

    padding: 10px 0;

    border-top: 1px solid #edf0f3;
}

.regular-currency {
    color: var(--green);

    font-size: 10px;

    font-weight: 900;

    letter-spacing: .4px;

    padding: 5px 8px;

    background: var(--green-light);

    border-radius: 6px;
}

.regular-account-number {
    color: var(--text);

    font-size: 13px;

    font-weight: 850;

    text-align: right;

    letter-spacing: .3px;
}


/* ============================================================
   LEGALITAS
   ============================================================ */

.regular-legal-section {
    width: 100%;
    max-width: 1100px;

    margin: 58px auto 0;

    opacity: 0;

    transform: translateY(35px);

    filter: blur(4px);

    transition:
        opacity .8s cubic-bezier(.22,1,.36,1),
        transform .8s cubic-bezier(.22,1,.36,1),
        filter .8s cubic-bezier(.22,1,.36,1);
}

.regular-legal-section.show {
    opacity: 1;

    transform: translateY(0);

    filter: blur(0);
}


.regular-legal-grid {
    display: grid;

    grid-template-columns: repeat(4, 1fr);

    gap: 16px;
}


/* card */

.regular-legal-card {
    position: relative;

    padding: 24px;

    background: #fff;

    border: 1px solid var(--border);

    border-radius: 16px;

    text-decoration: none;

    overflow: hidden;

    box-shadow:
        0 8px 24px rgba(39,49,59,.04);

    opacity: 0;

    transform: translateY(25px);

    transition:
        opacity .65s cubic-bezier(.22,1,.36,1),
        transform .65s cubic-bezier(.22,1,.36,1),
        box-shadow .3s ease,
        border-color .3s ease;
}

.regular-legal-section.show .regular-legal-card {
    opacity: 1;

    transform: translateY(0);
}

.regular-legal-section.show .regular-legal-card:nth-child(1) {
    transition-delay: .05s;
}

.regular-legal-section.show .regular-legal-card:nth-child(2) {
    transition-delay: .12s;
}

.regular-legal-section.show .regular-legal-card:nth-child(3) {
    transition-delay: .19s;
}

.regular-legal-section.show .regular-legal-card:nth-child(4) {
    transition-delay: .26s;
}


/* top line */

.regular-legal-card::before {
    content: "";

    position: absolute;

    left: 0;
    top: 0;

    width: 100%;
    height: 3px;

    background: var(--red);

    transform: scaleX(0);

    transform-origin: left;

    transition: transform .3s ease;
}


/* arrow */

.regular-legal-card::after {
    content: "↗";

    position: absolute;

    top: 18px;
    right: 18px;

    width: 29px;
    height: 29px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 8px;

    background: #f7f8fa;

    border: 1px solid var(--border);

    color: var(--red);

    font-size: 14px;

    font-weight: 900;

    transition: .3s ease;
}


.regular-legal-card:hover {
    transform: translateY(-5px) !important;

    border-color: var(--red-border);

    box-shadow:
        0 16px 34px rgba(39,49,59,.08);
}

.regular-legal-card:hover::before {
    transform: scaleX(1);
}

.regular-legal-card:hover::after {
    background: var(--red);

    border-color: var(--red);

    color: #fff;

    transform: translate(2px,-2px);
}


/* icon */

.regular-legal-icon {
    width: 43px;
    height: 43px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin-bottom: 14px;

    border-radius: 10px;

    background: var(--red-light);

    border: 1px solid var(--red-border);

    color: var(--red);

    font-size: 16px;

    font-weight: 900;

    transition: .3s ease;
}

.regular-legal-card:hover .regular-legal-icon {
    background: var(--red);

    border-color: var(--red);

    color: #fff;

    transform: scale(1.05);
}


/* text */

.regular-legal-card h3 {
    margin: 0 0 6px;

    color: var(--text);

    font-size: 17px;

    font-weight: 850;
}

.regular-legal-card span {
    color: var(--red);

    font-size: 12px;

    font-weight: 750;
}


/* ============================================================
   WARNING
   ============================================================ */

.regular-warning {
    width: 100%;
    max-width: 1100px;

    margin: 40px auto 0;

    position: relative;

    box-sizing: border-box;

    padding: 25px 28px 25px 31px;

    background:
        linear-gradient(
            135deg,
            #fffafa,
            #fffdfd
        );

    border: 1px solid var(--red-border);

    border-radius: 16px;

    overflow: hidden;

    box-shadow:
        0 8px 24px rgba(39,49,59,.035);

    opacity: 0;

    transform: translateY(35px);

    filter: blur(4px);

    transition:
        opacity .8s cubic-bezier(.22,1,.36,1),
        transform .8s cubic-bezier(.22,1,.36,1),
        filter .8s cubic-bezier(.22,1,.36,1);
}

.regular-warning.show {
    opacity: 1;

    transform: translateY(0);

    filter: blur(0);
}


/* garis */

.regular-warning::before {
    content: "";

    position: absolute;

    left: 0;
    top: 0;
    bottom: 0;

    width: 4px;

    background: var(--red);

    transform:
        scaleY(.35);

    transform-origin: center;

    transition: transform .6s ease;
}

.regular-warning.show::before {
    transform: scaleY(1);
}


/* title */

.regular-warning-title {
    display: flex;

    align-items: center;

    gap: 10px;

    margin-bottom: 11px;

    color: var(--red-dark);

    font-size: 17px;

    font-weight: 850;
}

.regular-warning-icon {
    width: 31px;
    height: 31px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 8px;

    background: var(--red-light);

    border: 1px solid var(--red-border);

    color: var(--red);

    font-size: 14px;

    font-weight: 900;
}


/* paragraph */

.regular-warning p {
    margin: 0 0 10px;

    color: #69727c;

    font-size: 13px;

    line-height: 1.8;
}

.regular-warning p:last-child {
    margin-bottom: 0;
}

.regular-warning strong {
    color: var(--red-dark);
}


/* ============================================================
   PAGE ENTER ANIMATION
   ============================================================ */

@keyframes backEnter {

    from {
        opacity: 0;

        transform:
            translateY(-12px);
    }

    to {
        opacity: 1;

        transform:
            translateY(0);
    }

}


@keyframes heroEnter {

    from {
        opacity: 0;

        transform:
            translateY(25px)
            scale(.985);

        filter: blur(4px);
    }

    to {
        opacity: 1;

        transform:
            translateY(0)
            scale(1);

        filter: blur(0);
    }

}


@keyframes heroChildEnter {

    from {
        opacity: 0;

        transform:
            translateY(15px);
    }

    to {
        opacity: 1;

        transform:
            translateY(0);
    }

}


@keyframes heroLineEnter {

    from {
        transform:
            scaleX(0);
    }

    to {
        transform:
            scaleX(1);
    }

}


@keyframes decorationEnter {

    from {
        opacity: 0;

        transform:
            scale(.7);
    }

    to {
        opacity: 1;

        transform:
            scale(1);
    }

}


/* ============================================================
   TABLET
   ============================================================ */

@media (max-width: 1000px) {

    .regular-legal-grid {
        grid-template-columns: repeat(2, 1fr);
    }

}


/* ============================================================
   TABLET SMALL
   ============================================================ */

@media (max-width: 900px) {

    .regular-page {
        padding: 25px 20px 55px;
    }

    .regular-hero {
        height: 295px;

        padding: 38px 35px;
    }

    .regular-hero h1 {
        font-size: 34px;
    }

    .regular-document-list {
        grid-template-columns: 1fr;
    }

    .regular-bank-grid {
        grid-template-columns: 1fr;
    }

}


/* ============================================================
   MOBILE
   ============================================================ */

@media (max-width: 600px) {

    .regular-page {
        padding: 20px 15px 45px;
    }


    .regular-hero {
        height: auto;

        padding: 28px 22px;

        margin-bottom: 38px;

        border-radius: 19px;
    }


    .regular-hero h1 {
        font-size: 27px;

        letter-spacing: -.6px;
    }


    .regular-hero-description {
        font-size: 13px;
    }


    .regular-hero-status {
        align-items: flex-start;

        line-height: 1.5;
    }


    .regular-section-title h2 {
        font-size: 21px;
    }


    .regular-section-title > p {
        margin-left: 0;
    }


    .regular-title-icon {
        width: 40px;
        height: 40px;
    }


    /* timeline mobile */

    .regular-timeline::before {
        left: 24px;
    }


    .regular-step {
        gap: 14px;
    }


    .regular-step-number {
        width: 49px;
        height: 49px;

        border-radius: 13px;

        font-size: 12px;
    }


    .regular-step-card {
        padding: 20px;

        border-radius: 14px;
    }


    .regular-step-card h3 {
        font-size: 16px;
    }


    .regular-step-card p {
        font-size: 13px;
    }


    .regular-legal-grid {
        grid-template-columns: 1fr;
    }


    .regular-account-row {
        align-items: flex-start;

        flex-direction: column;

        gap: 5px;
    }


    .regular-account-number {
        text-align: left;
    }

}


/* ============================================================
   REDUCED MOTION
   ============================================================ */

@media (prefers-reduced-motion: reduce) {

    .regular-back,
    .regular-hero,
    .regular-hero-label,
    .regular-hero h1,
    .regular-hero-description,
    .regular-hero-status,
    .regular-hero-line,
    .regular-hero::before,
    .regular-hero::after {
        animation: none !important;

        opacity: 1 !important;

        transform: none !important;

        filter: none !important;
    }

    .regular-section-title,
    .regular-step,
    .regular-bank-section,
    .regular-bank-card,
    .regular-legal-section,
    .regular-legal-card,
    .regular-warning {
        transition: none !important;

        opacity: 1 !important;

        transform: none !important;

        filter: none !important;
    }

}

</style>


<div class="regular-page">


    {{-- =====================================================
         KEMBALI
    ====================================================== --}}

    <div class="regular-back">

        <a href="{{ url()->previous() }}">

            <span class="regular-arrow">
                ←
            </span>

            Kembali

        </a>

    </div>



    {{-- =====================================================
         HERO
    ====================================================== --}}

    <div class="regular-hero">

        <div class="regular-hero-line"></div>


        <div class="regular-hero-content">


            <div class="regular-hero-label">
                Prosedur Pembukaan Rekening
            </div>


            <h1>
                Prosedur Pembuatan
                <span>Akun Reguler</span>
            </h1>


            <p class="regular-hero-description">

                Panduan tahapan pembukaan rekening secara reguler
                bersama PT. Rifan Financindo Berjangka.
                Ikuti setiap proses dengan teliti agar pembukaan akun
                berjalan dengan lancar.

            </p>


            <div class="regular-hero-status">

                <span class="regular-status-icon"></span>

                Ikuti setiap tahapan sesuai urutan yang telah ditentukan.

            </div>


        </div>

    </div>



    {{-- =====================================================
         PROSEDUR
    ====================================================== --}}

    <div class="regular-section-title">

        <div class="regular-title-row">

            <div class="regular-title-icon">
                ✓
            </div>

            <h2>
                Prosedur Pembuatan Akun
            </h2>

        </div>

        <p>
            Berikut adalah tahapan yang perlu dilakukan oleh calon nasabah.
        </p>

    </div>



    {{-- =====================================================
         TIMELINE
    ====================================================== --}}

    <div class="regular-timeline">


        {{-- STEP 01 --}}

        <div class="regular-step">

            <div class="regular-step-number">
                01
            </div>


            <div class="regular-step-card">

                <h3>
                    Konsultasi dengan Wakil Pialang
                </h3>

                <p>
                    Calon Nasabah disarankan untuk bertemu dengan
                    Wakil Pialang Berjangka PT. Rifan Financindo
                    Berjangka untuk dijelaskan mengenai manfaat dan
                    risiko potensial dari kegiatan perdagangan
                    berjangka termasuk prosedur untuk membuka rekening.
                </p>

            </div>

        </div>



        {{-- STEP 02 --}}

        <div class="regular-step">

            <div class="regular-step-number">
                02
            </div>


            <div class="regular-step-card">

                <h3>
                    Simulasi Transaksi
                </h3>

                <p>
                    Melakukan simulasi transaksi pada
                    <strong>Demo Account</strong>.
                </p>

            </div>

        </div>



        {{-- STEP 03 --}}

        <div class="regular-step">

            <div class="regular-step-number">
                03
            </div>


            <div class="regular-step-card">

                <h3>
                    Membaca dan Memahami Buku Perjanjian
                </h3>

                <p>
                    Membaca dan memahami dengan seksama isi
                    Buku Perjanjian yang terdiri dari:
                </p>


                <div class="regular-document-list">


                    <div class="regular-document-item">
                        Aplikasi Pembukaan Rekening
                    </div>


                    <div class="regular-document-item">
                        Dokumen Pemberitahuan Adanya Risiko
                    </div>


                    <div class="regular-document-item">
                        Perjanjian Pemberian Amanat
                    </div>


                    <div class="regular-document-item">
                        Mekanisme Transaksi di Perdagangan Berjangka
                    </div>


                </div>

            </div>

        </div>



        {{-- STEP 04 --}}

        <div class="regular-step">

            <div class="regular-step-number">
                04
            </div>


            <div class="regular-step-card">

                <h3>
                    Pengisian dan Penandatanganan Dokumen
                </h3>

                <p>
                    Isi Aplikasi Pembukaan Rekening dalam Buku
                    Perjanjian, menandatangani, membubuhkan tulisan
                    tanggal dan memberi paraf di setiap bagian yang
                    diperlukan dari setiap halaman Perjanjian dan
                    Kelengkapan Dokumen / Administrasi lainnya.
                </p>

            </div>

        </div>



        {{-- STEP 05 --}}

        <div class="regular-step">

            <div class="regular-step-number">
                05
            </div>


            <div class="regular-step-card">

                <h3>
                    Transfer Dana
                </h3>

                <p>
                    Mentransfer dana ke Rekening Terpisah
                    (<strong>Segregated Account</strong>)
                    PT. Rifan Financindo Berjangka.
                </p>

            </div>

        </div>



        {{-- STEP 06 --}}

        <div class="regular-step">

            <div class="regular-step-number">
                06
            </div>


            <div class="regular-step-card">

                <h3>
                    Mengirimkan Slip Transfer
                </h3>

                <p>
                    Mengirimkan slip transfer bank melalui
                    fax / e-mail ke PT Rifan Financindo Berjangka.
                </p>

            </div>

        </div>


    </div>



    {{-- =====================================================
         REKENING TERPISAH
    ====================================================== --}}

    <div class="regular-bank-section">


        <div class="regular-section-title">

            <div class="regular-title-row">

                <div class="regular-title-icon">
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



        <div class="regular-bank-grid">


            {{-- BCA --}}

            <div class="regular-bank-card">

                <div class="regular-bank-icon">
                    B
                </div>

                <div class="regular-bank-name">
                    Bank BCA
                </div>

                <div class="regular-bank-branch">
                    Cabang Sudirman, Jakarta
                </div>


                <div class="regular-account-row">

                    <span class="regular-currency">
                        IDR
                    </span>

                    <span class="regular-account-number">
                        035 – 311 – 8975
                    </span>

                </div>


                <div class="regular-account-row">

                    <span class="regular-currency">
                        USD
                    </span>

                    <span class="regular-account-number">
                        035 – 311 – 7600
                    </span>

                </div>

            </div>



            {{-- CIMB --}}

            <div class="regular-bank-card">

                <div class="regular-bank-icon">
                    C
                </div>

                <div class="regular-bank-name">
                    Bank CIMB Niaga
                </div>

                <div class="regular-bank-branch">
                    Cabang Gajahmada, Jakarta
                </div>


                <div class="regular-account-row">

                    <span class="regular-currency">
                        IDR
                    </span>

                    <span class="regular-account-number">
                        800 – 12 – 97271 – 00
                    </span>

                </div>


                <div class="regular-account-row">

                    <span class="regular-currency">
                        USD
                    </span>

                    <span class="regular-account-number">
                        800 – 01 – 20945 – 40
                    </span>

                </div>

            </div>



            {{-- BNI --}}

            <div class="regular-bank-card">

                <div class="regular-bank-icon">
                    N
                </div>

                <div class="regular-bank-name">
                    BNI Bank
                </div>

                <div class="regular-bank-branch">
                    Gambir Branch, Jakarta
                </div>


                <div class="regular-account-row">

                    <span class="regular-currency">
                        IDR
                    </span>

                    <span class="regular-account-number">
                        017 – 5008 – 590
                    </span>

                </div>


                <div class="regular-account-row">

                    <span class="regular-currency">
                        USD
                    </span>

                    <span class="regular-account-number">
                        017 – 5020 – 200
                    </span>

                </div>

            </div>



            {{-- MANDIRI --}}

            <div class="regular-bank-card">

                <div class="regular-bank-icon">
                    M
                </div>

                <div class="regular-bank-name">
                    Bank Mandiri
                </div>

                <div class="regular-bank-branch">
                    Cabang Imam Bonjol, Jakarta
                </div>


                <div class="regular-account-row">

                    <span class="regular-currency">
                        IDR
                    </span>

                    <span class="regular-account-number">
                        122 - 000 - 664 - 2881
                    </span>

                </div>


                <div class="regular-account-row">

                    <span class="regular-currency">
                        USD
                    </span>

                    <span class="regular-account-number">
                        122 - 000 - 664 - 2873
                    </span>

                </div>

            </div>



            {{-- ARTHA GRAHA --}}

            <div class="regular-bank-card">

                <div class="regular-bank-icon">
                    A
                </div>

                <div class="regular-bank-name">
                    Bank Artha Graha
                </div>

                <div class="regular-bank-branch">
                    Cabang KPO Sudirman, Jakarta
                </div>


                <div class="regular-account-row">

                    <span class="regular-currency">
                        IDR
                    </span>

                    <span class="regular-account-number">
                        107 - 996 - 3271
                    </span>

                </div>

            </div>


        </div>

    </div>



    {{-- =====================================================
         LEGALITAS
    ====================================================== --}}

    <div class="regular-legal-section">


        <div class="regular-section-title">

            <div class="regular-title-row">

                <div class="regular-title-icon">
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



        <div class="regular-legal-grid">


            <a
                href="https://bappebti.go.id/pialang_berjangka/detail/012"
                target="_blank"
                rel="noopener noreferrer"
                class="regular-legal-card"
            >

                <div class="regular-legal-icon">
                    B
                </div>

                <h3>
                    BAPPEBTI
                </h3>

                <span>
                    Lihat informasi
                </span>

            </a>



            <a
                href="https://jfx.co.id/MarketMaker/market_maker"
                target="_blank"
                rel="noopener noreferrer"
                class="regular-legal-card"
            >

                <div class="regular-legal-icon">
                    J
                </div>

                <h3>
                    JFX
                </h3>

                <span>
                    Lihat informasi
                </span>

            </a>



            <a
                href="https://www.ptkbi.com/our-partner/perdagangan-berjangka-komoditi"
                target="_blank"
                rel="noopener noreferrer"
                class="regular-legal-card"
            >

                <div class="regular-legal-icon">
                    K
                </div>

                <h3>
                    KBI
                </h3>

                <span>
                    Lihat informasi
                </span>

            </a>



            <a
                href="https://www.aspebtindo.org/"
                target="_blank"
                rel="noopener noreferrer"
                class="regular-legal-card"
            >

                <div class="regular-legal-icon">
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



    {{-- =====================================================
         PERINGATAN
    ====================================================== --}}

    <div class="regular-warning">


        <div class="regular-warning-title">

            <span class="regular-warning-icon">
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


{{-- ============================================================
     SCROLL REVEAL JAVASCRIPT
     ============================================================ --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | ELEMENT YANG AKAN MUNCUL SAAT DI-SCROLL
    |--------------------------------------------------------------------------
    */

    const revealElements = document.querySelectorAll(
        '.regular-section-title,' +
        '.regular-step,' +
        '.regular-bank-section,' +
        '.regular-legal-section,' +
        '.regular-warning'
    );


    /*
    |--------------------------------------------------------------------------
    | INTERSECTION OBSERVER
    |--------------------------------------------------------------------------
    */

    const revealObserver = new IntersectionObserver(
        function (entries, observer) {

            entries.forEach(function (entry) {

                if (entry.isIntersecting) {

                    entry.target.classList.add('show');

                    /*
                    |--------------------------------------------------------------------------
                    | Stop observing setelah elemen muncul.
                    | Jadi animasi tidak mengulang terus-menerus.
                    |--------------------------------------------------------------------------
                    */

                    observer.unobserve(entry.target);

                }

            });

        },
        {
            threshold: 0.12,

            rootMargin:
                '0px 0px -60px 0px'
        }
    );


    /*
    |--------------------------------------------------------------------------
    | OBSERVE SEMUA ELEMENT
    |--------------------------------------------------------------------------
    */

    revealElements.forEach(function (element) {

        revealObserver.observe(element);

    });


});

</script>

@endsection