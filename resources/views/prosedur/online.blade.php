@extends('layouts.app')

@section('content')

<style>

/* ============================================================
   ONLINE PAGE
   ============================================================ */

.online-page {

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

.online-back {

    width: 100%;
    max-width: 1210px;

    margin: 0 auto 20px;

    opacity: 0;

    transform:
        translateY(-12px);

    animation:
        backEnter
        .7s
        cubic-bezier(.22,1,.36,1)
        .05s
        forwards;
}


.online-back a {

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


.online-back a:hover {

    color: var(--red);

    transform:
        translateX(-3px);
}


.online-arrow {

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


.online-back a:hover .online-arrow {

    background: var(--red) !important;

    border-color: var(--red) !important;

    color: #fff !important;

    box-shadow:
        0 8px 20px rgba(139,37,50,.18) !important;
}


/* ============================================================
   HERO
   ============================================================ */

.online-hero {

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

    filter:
        blur(4px);

    animation:
        heroEnter
        .9s
        cubic-bezier(.22,1,.36,1)
        .12s
        forwards;
}


/* ============================================================
   GARIS HERO
   ============================================================ */

.online-hero-line {

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


/* ============================================================
   DEKORASI HERO
   ============================================================ */

.online-hero::before {

    content: "";

    position: absolute;

    width: 320px;
    height: 320px;

    right: -155px;
    top: -170px;

    border-radius: 50%;

    border:
        55px solid rgba(139,37,50,.035);

    pointer-events: none;

    opacity: 0;

    transform:
        scale(.75);

    animation:
        decorationEnter
        1.2s
        cubic-bezier(.22,1,.36,1)
        .4s
        forwards;
}


.online-hero::after {

    content: "";

    position: absolute;

    width: 180px;
    height: 180px;

    right: 70px;
    bottom: -135px;

    border-radius: 50%;

    border:
        35px solid rgba(47,107,87,.04);

    pointer-events: none;

    opacity: 0;

    transform:
        scale(.7);

    animation:
        decorationEnter
        1.1s
        cubic-bezier(.22,1,.36,1)
        .5s
        forwards;
}


/* ============================================================
   HERO CONTENT
   ============================================================ */

.online-hero-content {

    position: relative;

    z-index: 5;

    max-width: 820px;
}


/* ============================================================
   LABEL
   ============================================================ */

.online-label {

    display: inline-flex;

    align-items: center;

    gap: 8px;

    padding: 8px 14px;

    margin-bottom: 16px;

    border-radius: 9px;

    background:
        var(--red-light);

    border:
        1px solid var(--red-border);

    color:
        var(--red);

    font-size: 11px;

    font-weight: 800;

    letter-spacing:
        1.3px;

    text-transform:
        uppercase;

    opacity: 0;

    transform:
        translateY(12px);

    animation:
        heroChildEnter
        .65s
        cubic-bezier(.22,1,.36,1)
        .42s
        forwards;
}


.online-label::before {

    content: "";

    width: 7px;
    height: 7px;

    border-radius: 50%;

    background:
        var(--red);

    box-shadow:
        0 0 0 4px rgba(139,37,50,.08);
}


/* ============================================================
   HERO TITLE
   ============================================================ */

.online-hero h1 {

    margin:
        0 0 12px;

    color:
        var(--text);

    font-size:
        39px;

    line-height:
        1.18;

    font-weight:
        850;

    letter-spacing:
        -1px;

    opacity:
        0;

    transform:
        translateY(15px);

    animation:
        heroChildEnter
        .7s
        cubic-bezier(.22,1,.36,1)
        .52s
        forwards;
}


.online-hero h1 span {

    color:
        var(--red);

    display:
        inline-block;
}


/* ============================================================
   HERO DESCRIPTION
   ============================================================ */

.online-hero-description {

    max-width:
        760px;

    margin:
        0;

    color:
        var(--text-soft);

    font-size:
        14px;

    line-height:
        1.75;

    opacity:
        0;

    transform:
        translateY(14px);

    animation:
        heroChildEnter
        .7s
        cubic-bezier(.22,1,.36,1)
        .62s
        forwards;
}


/* ============================================================
   STATUS
   ============================================================ */

.online-status {

    display: inline-flex;

    align-items: center;

    gap: 10px;

    margin-top: 19px;

    padding: 10px 15px;

    background:
        var(--green-light);

    border:
        1px solid #d6e6de;

    border-radius:
        10px;

    color:
        #255443;

    font-size:
        12px;

    font-weight:
        700;

    opacity:
        0;

    transform:
        translateY(14px);

    animation:
        heroChildEnter
        .7s
        cubic-bezier(.22,1,.36,1)
        .72s
        forwards;
}


.online-status-icon {

    width:
        8px;

    height:
        8px;

    flex-shrink:
        0;

    border-radius:
        50%;

    background:
        var(--green);

    box-shadow:
        0 0 0 4px rgba(47,107,87,.10);
}


/* ============================================================
   SECTION TITLE
   ============================================================ */

.online-section-title {

    width:
        100%;

    max-width:
        1100px;

    margin:
        0 auto 24px;

    opacity:
        0;

    transform:
        translateY(35px);

    filter:
        blur(4px);

    transition:
        opacity .8s cubic-bezier(.22,1,.36,1),
        transform .8s cubic-bezier(.22,1,.36,1),
        filter .8s cubic-bezier(.22,1,.36,1);
}


.online-section-title.show {

    opacity:
        1;

    transform:
        translateY(0);

    filter:
        blur(0);
}


.online-title-row {

    display:
        flex;

    align-items:
        center;

    gap:
        13px;
}


.online-title-icon {

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
        linear-gradient(
            145deg,
            #fff5f6,
            #f8e9ec
        );

    border:
        1px solid var(--red-border);

    color:
        var(--red);

    font-size:
        18px;

    font-weight:
        900;

    box-shadow:
        0 6px 16px rgba(139,37,50,.07);

    transition:
        transform .3s ease,
        box-shadow .3s ease;
}


.online-title-row:hover .online-title-icon {

    transform:
        translateY(-2px)
        rotate(-2deg);

    box-shadow:
        0 10px 22px rgba(139,37,50,.11);
}


.online-section-title h2 {

    margin:
        0;

    color:
        var(--text);

    font-size:
        26px;

    line-height:
        1.2;

    font-weight:
        850;

    letter-spacing:
        -.4px;
}


.online-section-title > p {

    margin:
        6px 0 0 58px;

    color:
        var(--text-soft);

    font-size:
        13px;

    line-height:
        1.6;
}


/* ============================================================
   TIMELINE
   ============================================================ */

.online-timeline {

    width:
        100%;

    max-width:
        1100px;

    margin:
        0 auto;

    position:
        relative;
}


.online-timeline::before {

    content:
        "";

    position:
        absolute;

    left:
        31px;

    top:
        31px;

    bottom:
        31px;

    width:
        1px;

    background:
        linear-gradient(
            180deg,
            #d8dde2,
            #e9ecef
        );

    z-index:
        0;
}


/* ============================================================
   STEP
   ============================================================ */

.online-step {

    display:
        flex;

    align-items:
        flex-start;

    gap:
        23px;

    margin-bottom:
        22px;

    position:
        relative;

    opacity:
        0;

    transform:
        translateX(-28px)
        translateY(10px);

    filter:
        blur(4px);

    transition:
        opacity .7s cubic-bezier(.22,1,.36,1),
        transform .7s cubic-bezier(.22,1,.36,1),
        filter .7s cubic-bezier(.22,1,.36,1);
}


.online-step.show {

    opacity:
        1;

    transform:
        translateX(0)
        translateY(0);

    filter:
        blur(0);
}


/* ============================================================
   STAGGER
   ============================================================ */

.online-step:nth-child(1) {
    transition-delay:
        .02s;
}

.online-step:nth-child(2) {
    transition-delay:
        .08s;
}

.online-step:nth-child(3) {
    transition-delay:
        .14s;
}

.online-step:nth-child(4) {
    transition-delay:
        .20s;
}

.online-step:nth-child(5) {
    transition-delay:
        .26s;
}


/* ============================================================
   NOMOR STEP
   ============================================================ */

.online-step-number {

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

    box-sizing:
        border-box;

    border-radius:
        16px;

    background:
        #ffffff;

    border:
        1px solid #dfc5ca;

    color:
        var(--red);

    font-size:
        14px;

    font-weight:
        900;

    letter-spacing:
        .5px;

    box-shadow:
        0 7px 20px rgba(39,49,59,.07);

    transition:
        background .3s ease,
        color .3s ease,
        border-color .3s ease,
        transform .3s ease,
        box-shadow .3s ease;
}


.online-step-number::before,
.online-step-number::after {

    content:
        none !important;

    display:
        none !important;
}


.online-step:hover .online-step-number {

    background:
        var(--red);

    border-color:
        var(--red);

    color:
        #fff;

    transform:
        translateY(-3px)
        scale(1.03);

    box-shadow:
        0 12px 25px rgba(139,37,50,.18);
}


/* ============================================================
   STEP CARD
   ============================================================ */

.online-step-card {

    flex:
        1;

    min-width:
        0;

    position:
        relative;

    box-sizing:
        border-box;

    padding:
        27px 30px;

    background:
        rgba(255,255,255,.96);

    border:
        1px solid var(--border);

    border-radius:
        17px;

    box-shadow:
        0 8px 24px rgba(39,49,59,.045);

    transition:
        transform .3s ease,
        box-shadow .3s ease,
        border-color .3s ease;
}


/* garis kiri */

.online-step-card::before {

    content:
        "";

    position:
        absolute;

    left:
        0;

    top:
        20px;

    bottom:
        20px;

    width:
        3px;

    background:
        var(--red);

    border-radius:
        0 4px 4px 0;

    transform:
        scaleY(.35);

    transform-origin:
        center;

    opacity:
        0;

    transition:
        transform .3s ease,
        opacity .3s ease;
}


.online-step-card:hover {

    transform:
        translateX(5px);

    border-color:
        var(--red-border);

    box-shadow:
        0 15px 35px rgba(39,49,59,.085);
}


.online-step-card:hover::before {

    opacity:
        1;

    transform:
        scaleY(1);
}


/* ============================================================
   STEP TITLE
   ============================================================ */

.online-step-card h3 {

    margin:
        0 0 10px;

    color:
        var(--text);

    font-size:
        19px;

    line-height:
        1.4;

    font-weight:
        850;

    transition:
        color .3s ease;
}


.online-step-card:hover h3 {

    color:
        var(--red);
}


/* ============================================================
   STEP PARAGRAPH
   ============================================================ */

.online-step-card p {

    margin:
        0;

    color:
        var(--text-soft);

    font-size:
        14px;

    line-height:
        1.8;
}


.online-step-card strong {

    color:
        var(--red-dark);

    font-weight:
        800;
}


/* ============================================================
   DOCUMENT LIST
   ============================================================ */

.online-document-list {

    display:
        grid;

    grid-template-columns:
        repeat(2, 1fr);

    gap:
        10px;

    margin-top:
        18px;
}


.online-document-item {

    display:
        flex;

    align-items:
        center;

    gap:
        10px;

    min-height:
        43px;

    padding:
        9px 12px;

    box-sizing:
        border-box;

    background:
        #fafbfc;

    border:
        1px solid #e5e8ec;

    border-radius:
        10px;

    color:
        #59636e;

    font-size:
        12.5px;

    line-height:
        1.5;

    transition:
        background .25s ease,
        border-color .25s ease,
        transform .25s ease;
}


.online-document-item::before {

    content:
        "✓";

    width:
        23px;

    height:
        23px;

    flex-shrink:
        0;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border-radius:
        7px;

    background:
        var(--green-light);

    color:
        var(--green);

    font-size:
        11px;

    font-weight:
        900;
}


.online-document-item:hover {

    background:
        var(--green-light);

    border-color:
        #d1e3da;

    transform:
        translateY(-2px);
}


/* ============================================================
   BANK SECTION
   ============================================================ */

.online-bank-section {

    width:
        100%;

    max-width:
        1100px;

    margin:
        58px auto 0;

    opacity:
        0;

    transform:
        translateY(35px);

    filter:
        blur(4px);

    transition:
        opacity .8s cubic-bezier(.22,1,.36,1),
        transform .8s cubic-bezier(.22,1,.36,1),
        filter .8s cubic-bezier(.22,1,.36,1);
}


.online-bank-section.show {

    opacity:
        1;

    transform:
        translateY(0);

    filter:
        blur(0);
}


/* ============================================================
   BANK GRID
   ============================================================ */

.online-bank-grid {

    display:
        flex !important;

    gap:
        18px;

    overflow-x:
        auto;

    overflow-y:
        hidden;

    padding:
        4px 4px 14px;

    box-sizing:
        border-box;

    scroll-snap-type:
        x proximity;

    scrollbar-width:
        thin;

    scrollbar-color:
        #cfd5da transparent;
}


.online-bank-grid::-webkit-scrollbar {

    height:
        6px;
}


.online-bank-grid::-webkit-scrollbar-track {

    background:
        transparent;
}


.online-bank-grid::-webkit-scrollbar-thumb {

    background:
        #cfd5da;

    border-radius:
        99px;
}


/* ============================================================
   BANK CARD
   ============================================================ */

.online-bank-card {

    flex:
        0 0 285px;

    width:
        285px;

    min-width:
        285px;

    position:
        relative;

    padding:
        25px;

    background:
        linear-gradient(
            145deg,
            #ffffff,
            #fcfcfd
        );

    border:
        1px solid var(--border);

    border-radius:
        17px;

    overflow:
        hidden;

    box-shadow:
        0 8px 25px rgba(39,49,59,.045);

    scroll-snap-align:
        start;

    opacity:
        0;

    transform:
        translateY(25px);

    transition:
        opacity .65s cubic-bezier(.22,1,.36,1),
        transform .65s cubic-bezier(.22,1,.36,1),
        box-shadow .3s ease,
        border-color .3s ease;
}


.online-bank-section.show .online-bank-card {

    opacity:
        1;

    transform:
        translateY(0);
}


.online-bank-section.show
.online-bank-card:nth-child(1) {

    transition-delay:
        .05s;
}


.online-bank-section.show
.online-bank-card:nth-child(2) {

    transition-delay:
        .12s;
}


.online-bank-section.show
.online-bank-card:nth-child(3) {

    transition-delay:
        .19s;
}


.online-bank-section.show
.online-bank-card:nth-child(4) {

    transition-delay:
        .26s;
}


.online-bank-section.show
.online-bank-card:nth-child(5) {

    transition-delay:
        .33s;
}


/* ============================================================
   BANK TOP LINE
   ============================================================ */

.online-bank-card::before {

    content:
        "";

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
        var(--red);

    transform:
        scaleX(.12);

    transform-origin:
        left;

    transition:
        transform .35s ease;
}


.online-bank-card:hover::before {

    transform:
        scaleX(1);
}


.online-bank-card:hover {

    transform:
        translateY(-5px) !important;

    border-color:
        var(--red-border);

    box-shadow:
        0 16px 34px rgba(39,49,59,.08);
}


/* ============================================================
   BANK ICON
   ============================================================ */

.online-bank-icon {

    width:
        100%;

    height:
        86px;

    margin-bottom:
        17px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        flex-start;

    padding:
        10px 14px;

    box-sizing:
        border-box;

    background:
        #ffffff;

    border:
        1px solid var(--border);

    border-radius:
        13px;

    transition:
        border-color .3s ease,
        box-shadow .3s ease;
}


.online-bank-icon img {

    display:
        block;

    width:
        auto;

    max-width:
        150px;

    height:
        54px;

    object-fit:
        contain;
}


.online-bank-card:hover .online-bank-icon {

    border-color:
        var(--red-border);

    box-shadow:
        0 5px 15px rgba(39,49,59,.05);
}


/* ============================================================
   BANK TEXT
   ============================================================ */

.online-bank-name {

    color:
        var(--text);

    font-size:
        17px;

    font-weight:
        850;

    margin-bottom:
        4px;
}


.online-bank-branch {

    color:
        var(--muted);

    font-size:
        12px;

    line-height:
        1.6;

    margin-bottom:
        0;
}


/* ============================================================
   LEGALITAS
   ============================================================ */

.online-legal-section {

    width:
        100%;

    max-width:
        1100px;

    margin:
        58px auto 0;

    opacity:
        0;

    transform:
        translateY(35px);

    filter:
        blur(4px);

    transition:
        opacity .8s cubic-bezier(.22,1,.36,1),
        transform .8s cubic-bezier(.22,1,.36,1),
        filter .8s cubic-bezier(.22,1,.36,1);
}


.online-legal-section.show {

    opacity:
        1;

    transform:
        translateY(0);

    filter:
        blur(0);
}


.online-legal-grid {

    display:
        grid;

    grid-template-columns:
        repeat(4, 1fr);

    gap:
        16px;
}


.online-legal-card {

    position:
        relative;

    padding:
        24px;

    background:
        #fff;

    border:
        1px solid var(--border);

    border-radius:
        16px;

    text-decoration:
        none;

    overflow:
        hidden;

    box-shadow:
        0 8px 24px rgba(39,49,59,.04);

    opacity:
        0;

    transform:
        translateY(25px);

    transition:
        opacity .65s cubic-bezier(.22,1,.36,1),
        transform .65s cubic-bezier(.22,1,.36,1),
        box-shadow .3s ease,
        border-color .3s ease;
}


.online-legal-section.show .online-legal-card {

    opacity:
        1;

    transform:
        translateY(0);
}


.online-legal-section.show
.online-legal-card:nth-child(1) {

    transition-delay:
        .05s;
}


.online-legal-section.show
.online-legal-card:nth-child(2) {

    transition-delay:
        .12s;
}


.online-legal-section.show
.online-legal-card:nth-child(3) {

    transition-delay:
        .19s;
}


.online-legal-section.show
.online-legal-card:nth-child(4) {

    transition-delay:
        .26s;
}


/* ============================================================
   LEGAL TOP LINE
   ============================================================ */

.online-legal-card::before {

    content:
        "";

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
        var(--red);

    transform:
        scaleX(0);

    transform-origin:
        left;

    transition:
        transform .3s ease;
}


.online-legal-card:hover::before {

    transform:
        scaleX(1);
}


/* ============================================================
   LEGAL ARROW
   ============================================================ */

.online-legal-card::after {

    content:
        "↗";

    position:
        absolute;

    top:
        18px;

    right:
        18px;

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
        .3s ease;
}


.online-legal-card:hover {

    transform:
        translateY(-5px) !important;

    border-color:
        var(--red-border);

    box-shadow:
        0 16px 34px rgba(39,49,59,.08);
}


.online-legal-card:hover::after {

    background:
        var(--red);

    border-color:
        var(--red);

    color:
        #fff;

    transform:
        translate(2px,-2px);
}


/* ============================================================
   LEGAL ICON
   ============================================================ */

.online-legal-icon {

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
        10px;

    background:
        var(--red-light);

    border:
        1px solid var(--red-border);

    color:
        var(--red);

    font-size:
        16px;

    font-weight:
        900;

    padding:
        7px;

    box-sizing:
        border-box;

    transition:
        .3s ease;
}


.online-legal-icon img {

    display:
        block;

    width:
        100%;

    height:
        100%;

    object-fit:
        contain;
}


.online-legal-card:hover .online-legal-icon {

    background:
        var(--red);

    border-color:
        var(--red);

    color:
        #fff;

    transform:
        scale(1.05);
}


/* ============================================================
   LEGAL TEXT
   ============================================================ */

.online-legal-card h3 {

    margin:
        0 0 6px;

    color:
        var(--text);

    font-size:
        17px;

    font-weight:
        850;
}


.online-legal-card span {

    color:
        var(--red);

    font-size:
        12px;

    font-weight:
        750;
}


/* ============================================================
   WARNING
   ============================================================ */

.online-warning {

    width:
        100%;

    max-width:
        1100px;

    margin:
        40px auto 0;

    position:
        relative;

    box-sizing:
        border-box;

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
        0 8px 24px rgba(39,49,59,.035);

    opacity:
        0;

    transform:
        translateY(35px);

    filter:
        blur(4px);

    transition:
        opacity .8s cubic-bezier(.22,1,.36,1),
        transform .8s cubic-bezier(.22,1,.36,1),
        filter .8s cubic-bezier(.22,1,.36,1);
}


.online-warning.show {

    opacity:
        1;

    transform:
        translateY(0);

    filter:
        blur(0);
}


/* ============================================================
   WARNING LINE
   ============================================================ */

.online-warning::before {

    content:
        "";

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

    transform:
        scaleY(.35);

    transform-origin:
        center;

    transition:
        transform .6s ease;
}


.online-warning.show::before {

    transform:
        scaleY(1);
}


/* ============================================================
   WARNING TITLE
   ============================================================ */

.online-warning-title {

    display:
        flex;

    align-items:
        center;

    gap:
        10px;

    margin-bottom:
        11px;

    color:
        var(--red-dark);

    font-size:
        17px;

    font-weight:
        850;
}


.online-warning-icon {

    width:
        31px;

    height:
        31px;

    display:
        flex;

    align-items:
        center;

    justify-content:
        center;

    border-radius:
        8px;

    background:
        var(--red-light);

    border:
        1px solid var(--red-border);

    color:
        var(--red);

    font-size:
        14px;

    font-weight:
        900;

    transition:
        .3s ease;
}


.online-warning:hover .online-warning-icon {

    transform:
        scale(1.08)
        rotate(-3deg);
}


/* ============================================================
   WARNING PARAGRAPH
   ============================================================ */

.online-warning p {

    margin:
        0 0 10px;

    color:
        #69727c;

    font-size:
        13px;

    line-height:
        1.8;
}


.online-warning p:last-child {

    margin-bottom:
        0;
}


.online-warning strong {

    color:
        var(--red-dark);
}


/* ============================================================
   KEYFRAMES
   ============================================================ */

@keyframes backEnter {

    from {

        opacity:
            0;

        transform:
            translateY(-12px);
    }

    to {

        opacity:
            1;

        transform:
            translateY(0);
    }

}


@keyframes heroEnter {

    from {

        opacity:
            0;

        transform:
            translateY(25px)
            scale(.985);

        filter:
            blur(4px);
    }

    to {

        opacity:
            1;

        transform:
            translateY(0)
            scale(1);

        filter:
            blur(0);
    }

}


@keyframes heroChildEnter {

    from {

        opacity:
            0;

        transform:
            translateY(15px);
    }

    to {

        opacity:
            1;

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

        opacity:
            0;

        transform:
            scale(.7);
    }

    to {

        opacity:
            1;

        transform:
            scale(1);
    }

}


@keyframes procedureCheckSoft {

    0% {

        opacity:
            .35;

        transform:
            scale(.92);
    }

    65% {

        opacity:
            1;

        transform:
            scale(1.03);
    }

    100% {

        opacity:
            1;

        transform:
            scale(1);
    }

}


/* ============================================================
   CHECK ANIMATION
   ============================================================ */

.online-document-item::before {

    animation:
        procedureCheckSoft
        .55s
        ease-out
        both;
}


/* ============================================================
   TABLET
   ============================================================ */

@media (max-width: 1000px) {

    .online-legal-grid {

        grid-template-columns:
            repeat(2, 1fr);
    }

}


/* ============================================================
   TABLET SMALL
   ============================================================ */

@media (max-width: 900px) {

    .online-page {

        padding:
            25px 20px 55px;
    }


    .online-hero {

        height:
            295px;

        padding:
            38px 35px;
    }


    .online-hero h1 {

        font-size:
            34px;
    }


    .online-document-list {

        grid-template-columns:
            1fr;
    }


    .online-bank-grid {

        display:
            flex !important;

        flex-direction:
            row;

        overflow-x:
            auto;

        overflow-y:
            hidden;
    }

}


/* ============================================================
   MOBILE
   ============================================================ */

@media (max-width: 600px) {

    .online-page {

        padding:
            20px 15px 45px;
    }


    .online-hero {

        height:
            auto;

        padding:
            28px 22px;

        margin-bottom:
            38px;

        border-radius:
            19px;
    }


    .online-hero h1 {

        font-size:
            27px;

        letter-spacing:
            -.6px;
    }


    .online-hero-description {

        font-size:
            13px;
    }


    .online-hero-status,
    .online-status {

        align-items:
            flex-start;

        line-height:
            1.5;
    }


    .online-section-title h2 {

        font-size:
            21px;
    }


    .online-section-title > p {

        margin-left:
            0;
    }


    .online-title-icon {

        width:
            40px;

        height:
            40px;
    }


    /* TIMELINE */

    .online-timeline::before {

        left:
            24px;
    }


    .online-step {

        gap:
            14px;
    }


    .online-step-number {

        width:
            49px;

        height:
            49px;

        border-radius:
            13px;

        font-size:
            12px;
    }


    .online-step-card {

        padding:
            20px;

        border-radius:
            14px;
    }


    .online-step-card h3 {

        font-size:
            16px;
    }


    .online-step-card p {

        font-size:
            13px;
    }


    /* BANK */

    .online-bank-section {

        margin-top:
            40px;
    }


    .online-bank-grid {

        gap:
            14px;

        padding:
            4px 3px 13px;
    }


    .online-bank-card {

        flex-basis:
            250px;

        width:
            250px;

        min-width:
            250px;

        padding:
            19px;
    }


    .online-bank-icon {

        height:
            80px;
    }


    .online-bank-icon img {

        max-width:
            135px;

        height:
            48px;
    }


    .online-bank-name {

        font-size:
            15px;
    }


    .online-bank-branch {

        font-size:
            11px;
    }


    /* LEGAL */

    .online-legal-grid {

        grid-template-columns:
            1fr;
    }


    .online-legal-card {

        padding:
            18px;
    }


    /* WARNING */

    .online-warning {

        padding:
            22px 21px 22px 25px;
    }


    .online-warning-title {

        font-size:
            15px;
    }


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
    .online-hero-description,
    .online-status,
    .online-hero-line,
    .online-hero::before,
    .online-hero::after {

        animation:
            none !important;

        opacity:
            1 !important;

        transform:
            none !important;

        filter:
            none !important;
    }


    .online-section-title,
    .online-step,
    .online-bank-section,
    .online-bank-card,
    .online-legal-section,
    .online-legal-card,
    .online-warning {

        transition:
            none !important;

        opacity:
            1 !important;

        transform:
            none !important;

        filter:
            none !important;
    }


    .online-document-item::before {

        animation:
            none !important;
    }


    .online-back a,
    .online-arrow,
    .online-step-card,
    .online-step-number,
    .online-bank-card,
    .online-bank-icon,
    .online-legal-card,
    .online-legal-icon,
    .online-warning-icon {

        transition:
            none !important;
    }

}

</style>


<div class="online-page">


    {{-- =====================================================
         KEMBALI
    ====================================================== --}}

    <div class="online-back">

        <a href="{{ url()->previous() }}">

            <span class="online-arrow">
                ←
            </span>

            Kembali

        </a>

    </div>


    {{-- =====================================================
         HERO
    ====================================================== --}}

    <div class="online-hero">

        <div class="online-hero-line"></div>


        <div class="online-hero-content">


            <div class="online-label">

                Prosedur Pembukaan Rekening

            </div>


            <h1>

                Prosedur Pembuatan

                <span>
                    Akun Online
                </span>

            </h1>


            <p class="online-hero-description">

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


    {{-- =====================================================
         PROSEDUR
    ====================================================== --}}

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


    {{-- =====================================================
         TIMELINE
    ====================================================== --}}

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
                    <strong>Demo Account</strong>
                    sebagai tahap awal untuk mengenal sistem
                    dan mekanisme transaksi perdagangan berjangka.

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


    {{-- =====================================================
         REKENING TERPISAH
    ====================================================== --}}

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

                    <img
                        src="{{ asset('images/bank/bca.png') }}"
                        alt="Bank BCA"
                    >

                </div>

                <div class="online-bank-name">
                    Bank BCA
                </div>

                <div class="online-bank-branch">
                    Cabang Sudirman, Jakarta
                </div>

            </div>


            {{-- CIMB NIAGA --}}

            <div class="online-bank-card">

                <div class="online-bank-icon">

                    <img
                        src="{{ asset('images/bank/cimb-niaga.png') }}"
                        alt="Bank CIMB Niaga"
                    >

                </div>

                <div class="online-bank-name">
                    Bank CIMB Niaga
                </div>

                <div class="online-bank-branch">
                    Cabang Gajahmada, Jakarta
                </div>

            </div>


            {{-- BNI --}}

            <div class="online-bank-card">

                <div class="online-bank-icon">

                    <img
                        src="{{ asset('images/bank/bni.png') }}"
                        alt="Bank BNI"
                    >

                </div>

                <div class="online-bank-name">
                    BNI Bank
                </div>

                <div class="online-bank-branch">
                    Gambir Branch, Jakarta
                </div>

            </div>


            {{-- MANDIRI --}}

            <div class="online-bank-card">

                <div class="online-bank-icon">

                    <img
                        src="{{ asset('images/bank/mandiri.png') }}"
                        alt="Bank Mandiri"
                    >

                </div>

                <div class="online-bank-name">
                    Bank Mandiri
                </div>

                <div class="online-bank-branch">
                    Cabang Imam Bonjol, Jakarta
                </div>

            </div>


            {{-- ARTHA GRAHA --}}

            <div class="online-bank-card">

                <div class="online-bank-icon">

                    <img
                        src="{{ asset('images/bank/artha-graha.png') }}"
                        alt="Bank Artha Graha"
                    >

                </div>

                <div class="online-bank-name">
                    Bank Artha Graha
                </div>

                <div class="online-bank-branch">
                    Cabang KPO Sudirman, Jakarta
                </div>

            </div>


        </div>

    </div>


    {{-- =====================================================
         LEGALITAS
    ====================================================== --}}

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

                    <img
                        src="{{ asset('images/legalitas/bappebti.png') }}"
                        alt="BAPPEBTI"
                    >

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

                    <img
                        src="{{ asset('images/legalitas/jfx.png') }}"
                        alt="JFX"
                    >

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

                    <img
                        src="{{ asset('images/legalitas/kbi.png') }}"
                        alt="KBI"
                    >

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

                    <img
                        src="{{ asset('images/legalitas/aspebtindo.png') }}"
                        alt="ASPEBTINDO"
                    >

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
         WARNING
    ====================================================== --}}

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


{{-- ============================================================
     SCROLL REVEAL JAVASCRIPT
     ============================================================ --}}

<script>

document.addEventListener('DOMContentLoaded', function () {


    /*
    |----------------------------------------------------------------------
    | ELEMENT YANG AKAN MUNCUL SAAT DI-SCROLL
    |----------------------------------------------------------------------
    */

    const revealElements = document.querySelectorAll(

        '.online-section-title,' +
        '.online-step,' +
        '.online-bank-section,' +
        '.online-legal-section,' +
        '.online-warning'

    );


    /*
    |----------------------------------------------------------------------
    | INTERSECTION OBSERVER
    |----------------------------------------------------------------------
    */

    const revealObserver = new IntersectionObserver(

        function (entries, observer) {

            entries.forEach(function (entry) {

                if (entry.isIntersecting) {

                    entry.target.classList.add('show');

                    observer.unobserve(entry.target);

                }

            });

        },

        {

            threshold:
                0.12,

            rootMargin:
                '0px 0px -60px 0px'

        }

    );


    /*
    |----------------------------------------------------------------------
    | OBSERVE SEMUA ELEMENT
    |----------------------------------------------------------------------
    */

    revealElements.forEach(function (element) {

        revealObserver.observe(element);

    });


});

</script>


@endsection