@extends('layouts.app')

@section('title', 'Pivot & Fibonacci — Analisis Pasar')

@section('content')

    {{---------------- CSS ---------------}}
<style>
    .pf-page {
        padding: 30px 24px 48px;
        width: 100%;
        min-height: 100vh;
        box-sizing: border-box;
        color: #1e293b;
    }

    .pf-page *,
    .pf-page *::before,
    .pf-page *::after {
        box-sizing: border-box;
    }

    /* KOTAK UTAMA */
    .pf-container {
        width: 100%;
        padding: 28px;
        background: #fff;
        border-radius: 12px;
    }

    /* JUDUL */
    .pf-title {
        margin: 0 0 24px;
        color: #0f172a;
        font-size: 28px;
        font-weight: 800;
        line-height: 1.4;
    }

    /* TAB PIVOT DAN FIBONACCI */
    .pf-tabs {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 0;
        margin-bottom: 26px;
        border-bottom: 2px solid #bbf7d0;
    }

    .pf-tab {
        position: relative;
        padding: 14px 20px;
        border: none;
        background: transparent;
        color: #64748b;
        font-family: inherit;
        font-size: 15px;
        font-weight: 700;
        cursor: pointer;
        transition: color .2s, background .2s;
    }

    .pf-tab:hover {
        color: #15803d;
        background: #f0fdf4;
    }

    .pf-tab.active {
        color: #15803d;
    }

    .pf-tab.active::after {
        position: absolute;
        right: 0;
        bottom: -2px;
        left: 0;
        height: 3px;
        background: #15803d;
        content: "";
    }

    /* FORM INPUT */
    .pf-form {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr)) auto;
        align-items: end;
        gap: 16px;
    }

    .pf-field {
        display: flex;
        flex-direction: column;
        gap: 8px;
        min-width: 0;
    }

    .pf-field label {
        color: #334155;
        font-size: 13px;
        font-weight: 700;
    }

    .pf-field input {
        width: 100%;
        min-width: 0;
        height: 44px;
        padding: 10px 12px;
        border: 1px solid #cbd5e1;
        border-radius: 7px;
        outline: none;
        background: #fff;
        color: #0f172a;
        font-family: inherit;
        font-size: 14px;
        transition: border-color .2s, box-shadow .2s;
    }

    .pf-field input:focus {
        border-color: #15803d;
        box-shadow: 0 0 0 3px rgba(21, 128, 61, .1);
    }

    .pf-field input::placeholder {
        color: #94a3b8;
    }

    /* TOMBOL KALKULASI */
    .pf-calculate {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        height: 44px;
        padding: 0 20px;
        border: 1px solid #15803d;
        border-radius: 7px;
        background: #15803d;
        color: #fff;
        font-family: inherit;
        font-size: 13px;
        font-weight: 700;
        white-space: nowrap;
        cursor: pointer;
        transition: background .2s;
    }

    .pf-calculate:hover {
        background: #166534;
    }

    /* AREA KONTEN TAB */
    .pf-panel[hidden] {
        display: none !important;
    }

    .pf-empty {
        min-height: 180px;
    }

    /* RESPONSIVE */
    @media (max-width: 1100px) {
        .pf-form {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .pf-calculate {
            width: fit-content;
        }
    }

    @media (max-width: 600px) {
        .pf-page {
            padding: 18px 12px 30px;
        }

        .pf-container {
            padding: 20px 15px;
            border-radius: 9px;
        }

        .pf-title {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .pf-tabs {
            margin-bottom: 22px;
        }

        .pf-tab {
            padding: 13px 8px;
            font-size: 14px;
        }

        .pf-form {
            grid-template-columns: minmax(0, 1fr);
            gap: 15px;
        }

        .pf-calculate {
            width: 100%;
            margin-top: 3px;
        }
    }

    /* TABEL PIVOT */
    .pf-table-wrapper {
        width: 100%;
        margin-top: 24px;
        overflow-x: auto;
        border: 1px solid #bbf7d0;
        border-radius: 8px;
    }

    .pf-table {
        width: 100%;
        min-width: 600px;
        border-collapse: collapse;
        text-align: center;
        background: #fff;
    }

    .pf-table th,
    .pf-table td {
        padding: 13px 16px;
        border-bottom: 1px solid #e2e8f0;
        font-size: 14px;
    }

    .pf-table thead th {
        background: #f0fdf4;
        color: #166534;
        font-weight: 700;
    }

    .pf-table tbody th {
        width: 90px;
        background: #f8fafc;
        color: #334155;
        font-weight: 700;
    }

    .pf-table tbody td {
        color: #64748b;
    }

    .pf-table tbody tr:last-child th,
    .pf-table tbody tr:last-child td {
        border-bottom: none;
    }

    .pf-table tbody tr:hover td,
    .pf-table tbody tr:hover th {
        background: #f0fdf4;
    }

    .pf-table .pf-pivot-row th,
    .pf-table .pf-pivot-row td {
        background: #f0fdf4;
        color: #166534;
        font-weight: 700;
    }

    /* FIBONACCI RETRACEMENT */
    .pf-fib-card {
        padding: 22px;
        border: 1px solid #bbf7d0;
        border-radius: 10px;
        background: #fff;
    }

    .pf-fib-heading {
        margin: 0 0 8px;
        color: #0f172a;
        font-size: 22px;
        font-weight: 800;
    }

    .pf-fib-description {
        margin: 0 0 22px;
        color: #64748b;
        font-size: 14px;
        line-height: 1.7;
    }

    .pf-fib-form {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr)) auto;
        align-items: end;
        gap: 16px;
    }

    .pf-fib-table-wrapper {
        margin-top: 26px;
    }

    .pf-fib-table tbody tr:nth-child(even) {
        background: #f0fdf4;
    }

    .pf-fib-table tbody tr:hover {
        background: #dcfce7;
    }

    .pf-fib-note {
        margin: 16px 0 0;
        color: #64748b;
        font-size: 12px;
        line-height: 1.7;
    }

    @media (max-width: 600px) {
        .pf-fib-card {
            padding: 16px;
        }

        .pf-fib-form {
            grid-template-columns: minmax(0, 1fr);
        }

        .pf-fib-form .pf-calculate {
            width: 100%;
        }

        .pf-fib-heading {
            font-size: 20px;
        }
    }
</style>

    {{---------------- HTML ---------------}}

    <div class="pf-page">

        <main class="pf-container">

            {{-- JUDUL UTAMA --}}
            <h1 class="pf-title">Pivot & Fibonacci</h1>

            {{-- TAB --}}
            <div class="pf-tabs" role="tablist" aria-label="Pilih alat analisis">

                <button type="button" class="pf-tab active" id="pf-tab-pivot" role="tab" aria-selected="true"
                    aria-controls="pf-panel-pivot" data-target="pivot">
                    Pivot
                </button>

                <button type="button" class="pf-tab" id="pf-tab-fibonacci" role="tab" aria-selected="false"
                    aria-controls="pf-panel-fibonacci" data-target="fibonacci" tabindex="-1">
                    Fibonacci
                </button>

            </div>


            {{-- KONTEN PIVOT --}}
            <section class="pf-panel" id="pf-panel-pivot" role="tabpanel" aria-labelledby="pf-tab-pivot">

                <form class="pf-form" id="pf-pivot-form">

                    <div class="pf-field">
                        <input type="number" id="pf-open" name="open" step="any" placeholder="Buka (Open)">
                    </div>

                    <div class="pf-field">
                        <input type="number" id="pf-high" name="high" step="any" placeholder="Tinggi (High)">
                    </div>

                    <div class="pf-field">
                        <input type="number" id="pf-low" name="low" step="any" placeholder="Rendah (Low)">
                    </div>

                    <div class="pf-field">
                        <input type="number" id="pf-close" name="close" step="any" placeholder="Tutup (Close)">
                    </div>

                    <button type="button" class="pf-calculate" id="pf-calculate">
                        <i class="bi bi-calculator"></i> Kalkulasi
                    </button>

                </form>


                <div class="pf-table-wrapper">
                    <table class="pf-table">
                        <thead>
                            <tr>
                                <th>Level</th>
                                <th>Klasik</th>
                                <th>Woodie</th>
                                <th>Camarilla</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <th>R4</th>
                                <td id="classic-r4">0,00</td>
                                <td id="woodie-r4">0,00</td>
                                <td id="camarilla-r4">0,00</td>
                            </tr>
                            <tr>
                                <th>R3</th>
                                <td id="classic-r3">0,00</td>
                                <td id="woodie-r3">0,00</td>
                                <td id="camarilla-r3">0,00</td>
                            </tr>
                            <tr>
                                <th>R2</th>
                                <td id="classic-r2">0,00</td>
                                <td id="woodie-r2">0,00</td>
                                <td id="camarilla-r2">0,00</td>
                            </tr>
                            <tr>
                                <th>R1</th>
                                <td id="classic-r1">0,00</td>
                                <td id="woodie-r1">0,00</td>
                                <td id="camarilla-r1">0,00</td>
                            </tr>
                            <tr class="pf-pivot-row">
                                <th>Pivot</th>
                                <td id="classic-pivot">0,00</td>
                                <td id="woodie-pivot">0,00</td>
                                <td id="camarilla-pivot">0,00</td>
                            </tr>
                            <tr>
                                <th>S1</th>
                                <td id="classic-s1">0,00</td>
                                <td id="woodie-s1">0,00</td>
                                <td id="camarilla-s1">0,00</td>
                            </tr>
                            <tr>
                                <th>S2</th>
                                <td id="classic-s2">0,00</td>
                                <td id="woodie-s2">0,00</td>
                                <td id="camarilla-s2">0,00</td>
                            </tr>
                            <tr>
                                <th>S3</th>
                                <td id="classic-s3">0,00</td>
                                <td id="woodie-s3">0,00</td>
                                <td id="camarilla-s3">0,00</td>
                            </tr>
                            <tr>
                                <th>S4</th>
                                <td id="classic-s4">0,00</td>
                                <td id="woodie-s4">0,00</td>
                                <td id="camarilla-s4">0,00</td>
                            </tr>

                        </tbody>
                    </table>
                </div>


            </section>

            {{-- KONTEN FIBONACCI --}}
            <section class="pf-panel" id="pf-panel-fibonacci" role="tabpanel" aria-labelledby="pf-tab-fibonacci" hidden>

                {{-- Konten Fibonacci ditambahkan pada tahap berikutnya --}}

                <div class="pf-fib-card">
                    <h2 class="pf-fib-heading">Fibonacci Retracement</h2>

                    <p class="pf-fib-description">
                        Masukkan harga tertinggi dan terendah untuk
                        menghitung level Fibonacci Retracement.
                    </p>

                    <form id="pf-fib-form" class="pf-fib-form">
                        <div class="pf-field">
                            <label for="pf-fib-high">Harga Tertinggi (High)</label>
                            <input type="number" id="pf-fib-high" step="any" min="0" placeholder="Contoh: 2500"
                                required>
                        </div>

                        <div class="pf-field">
                            <label for="pf-fib-low">Harga Terendah (Low)</label>
                            <input type="number" id="pf-fib-low" step="any" min="0"
                                placeholder="Contoh: 2000" required>
                        </div>

                        <button type="submit" class="pf-calculate">
                            <i class="bi bi-calculator"></i>
                            Hitung Fibonacci
                        </button>
                    </form>

                    <div class="pf-table-wrapper pf-fib-table-wrapper">
                        <table class="pf-table pf-fib-table">
                            <thead>
                                <tr>
                                    <th>Level</th>
                                    <th>Persentase</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>

                            <tbody id="pf-fib-body">
                                <tr>
                                    <td>0</td>
                                    <td>0%</td>
                                    <td>—</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>23,6%</td>
                                    <td>—</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>38,2%</td>
                                    <td>—</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>50%</td>
                                    <td>—</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>61,8%</td>
                                    <td>—</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>78,6%</td>
                                    <td>—</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>100%</td>
                                    <td>—</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <p class="pf-fib-note">
                        Level dihitung berdasarkan rentang High dan Low
                        yang Anda masukkan.
                    </p>
                </div>

            </section>

            
    {{---------------- SCRIPT ---------------}}
    


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const page = document.querySelector('.pf-page');

        if (!page) return;

        const tabs = page.querySelectorAll('.pf-tab');
        const panels = page.querySelectorAll('.pf-panel');

        // ============================================= TAB PIVOT DAN FIBONACCI =============================================

        function activateTab(target) {
            tabs.forEach(function(tab) {
                const active = tab.dataset.target === target;

                tab.classList.toggle('active', active);
                tab.setAttribute('aria-selected', String(active));
                tab.tabIndex = active ? 0 : -1;
            });

            panels.forEach(function(panel) {
                panel.hidden = panel.id !== 'pf-panel-' + target;
            });
        }


        tabs.forEach(function(tab, index) {
            tab.addEventListener('click', function() {
                activateTab(tab.dataset.target);
            });

            tab.addEventListener('keydown', function(event) {
                if (
                    event.key === 'ArrowRight' ||
                    event.key === 'ArrowLeft'
                ) {
                    event.preventDefault();

                    const direction =
                        event.key === 'ArrowRight' ? 1 : -1;

                    const nextIndex =
                        (index + direction + tabs.length) % tabs.length;

                    tabs[nextIndex].focus();
                    activateTab(tabs[nextIndex].dataset.target);
                }
            });
        });


        // ============================================= PIVOT CALCULATION =============================================

        const calculateButton = page.querySelector('#pf-calculate');
        const pivotForm = page.querySelector('#pf-pivot-form');

        if (calculateButton && pivotForm) {

            calculateButton.addEventListener('click', function() {

                const openInput = pivotForm.elements['open'].value.trim();
                const highInput = pivotForm.elements['high'].value.trim();
                const lowInput = pivotForm.elements['low'].value.trim();
                const closeInput = pivotForm.elements['close'].value.trim();

                if (
                    openInput === '' ||
                    highInput === '' ||
                    lowInput === '' ||
                    closeInput === ''
                ) {
                    alert('Silakan isi semua harga terlebih dahulu.');
                    return;
                }

                const open = Number(openInput);
                const high = Number(highInput);
                const low = Number(lowInput);
                const close = Number(closeInput);

                if (![open, high, low, close].every(Number.isFinite)) {
                    alert('Harga harus berupa angka yang valid.');
                    return;
                }

                if (
                    low <= 0 ||
                    high < low ||
                    open <= 0 ||
                    close <= 0 ||
                    open < low ||
                    open > high ||
                    close < low ||
                    close > high
                ) {
                    alert(
                        'Periksa kembali harga. Tinggi harus lebih besar atau sama dengan Rendah, dan harga Buka serta Tutup harus berada di antara keduanya.'
                    );
                    return;
                }

                const range = high - low;

                // METODE KLASIK
                const classicP = (high + low + close) / 3;

                const classic = {
                    pivot: classicP,
                    r1: (2 * classicP) - low,
                    r2: classicP + range,
                    r3: high + (2 * (classicP - low)),
                    r4: high + (3 * (classicP - low)),
                    s1: (2 * classicP) - high,
                    s2: classicP - range,
                    s3: low - (2 * (high - classicP)),
                    s4: low - (3 * (high - classicP))
                };

                // METODE WOODIE
                const woodieP = (high + low + (2 * close)) / 4;

                const woodie = {
                    pivot: woodieP,
                    r1: (2 * woodieP) - low,
                    r2: woodieP + range,
                    r3: high + (2 * (woodieP - low)),
                    r4: high + (3 * (woodieP - low)),
                    s1: (2 * woodieP) - high,
                    s2: woodieP - range,
                    s3: low - (2 * (high - woodieP)),
                    s4: low - (3 * (high - woodieP))
                };

                // METODE CAMARILLA
                const camarilla = {
                    pivot: close,
                    r1: close + (range * 1.1 / 12),
                    r2: close + (range * 1.1 / 6),
                    r3: close + (range * 1.1 / 4),
                    r4: close + (range * 1.1 / 2),
                    s1: close - (range * 1.1 / 12),
                    s2: close - (range * 1.1 / 6),
                    s3: close - (range * 1.1 / 4),
                    s4: close - (range * 1.1 / 2)
                };

                // FORMAT ANGKA INDONESIA
                const formatPrice = function(value) {
                    return new Intl.NumberFormat('id-ID', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }).format(value);
                };

                // MASUKKAN HASIL KE TABEL PIVOT
                const levels = [
                    'r4', 'r3', 'r2', 'r1', 'pivot',
                    's1', 's2', 's3', 's4'
                ];

                levels.forEach(function(level) {

                    const classicCell =
                        page.querySelector('#classic-' + level);

                    const woodieCell =
                        page.querySelector('#woodie-' + level);

                    const camarillaCell =
                        page.querySelector('#camarilla-' + level);

                    if (classicCell) {
                        classicCell.textContent =
                            formatPrice(classic[level]);
                    }

                    if (woodieCell) {
                        woodieCell.textContent =
                            formatPrice(woodie[level]);
                    }

                    if (camarillaCell) {
                        camarillaCell.textContent =
                            formatPrice(camarilla[level]);
                    }

                });

            });

        }


        // ============================================= FIBONACCI RETRACEMENT =============================================

        const fibForm = page.querySelector('#pf-fib-form');
        const fibHighInput = page.querySelector('#pf-fib-high');
        const fibLowInput = page.querySelector('#pf-fib-low');
        const fibBody = page.querySelector('#pf-fib-body');

        if (fibForm && fibHighInput && fibLowInput && fibBody) {

            fibForm.addEventListener('submit', function(event) {

                event.preventDefault();

                // AMBIL NILAI HIGH DAN LOW
                const highValue = fibHighInput.value.trim();
                const lowValue = fibLowInput.value.trim();

                // VALIDASI INPUT KOSONG
                if (highValue === '' || lowValue === '') {
                    alert(
                        'Silakan masukkan harga tertinggi dan terendah.'
                    );
                    return;
                }

                const high = Number(highValue);
                const low = Number(lowValue);

                // VALIDASI ANGKA
                if (
                    !Number.isFinite(high) ||
                    !Number.isFinite(low) ||
                    high <= 0 ||
                    low <= 0 ||
                    high <= low
                ) {
                    alert(
                        'Harga High harus lebih besar daripada harga Low.'
                    );
                    return;
                }

                // HITUNG SELISIH HARGA
                const range = high - low;

                // LEVEL FIBONACCI
                const fibLevels = [
                    { level: 0, percentage: 0 },
                    { level: 1, percentage: 0.236 },
                    { level: 2, percentage: 0.382 },
                    { level: 3, percentage: 0.500 },
                    { level: 4, percentage: 0.618 },
                    { level: 5, percentage: 0.786 },
                    { level: 6, percentage: 1 }
                ];

                // FORMAT ANGKA INDONESIA
                const formatPrice = function(value) {
                    return new Intl.NumberFormat('id-ID', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }).format(value);
                };

                const formatPercentage = function(value) {
                    return new Intl.NumberFormat('id-ID', {
                        maximumFractionDigits: 1
                    }).format(value * 100) + '%';
                };

                // BERSIHKAN TABEL SEBELUMNYA
                fibBody.innerHTML = '';

                // TAMPILKAN HASIL PERHITUNGAN
                fibLevels.forEach(function(item) {

                    // RUMUS FIBONACCI RETRACEMENT
                    const price =
                        high - (range * item.percentage);

                    const row = document.createElement('tr');

                    row.innerHTML = `
                        <td>${item.level}</td>
                        <td>${formatPercentage(item.percentage)}</td>
                        <td>${formatPrice(price)}</td>
                    `;

                    fibBody.appendChild(row);

                });

            });

        }

    });
</script>

@endsection
