@extends('layouts.app')

@section('title', 'Pivot & Fibonacci — Analisis Pasar')

@section('content')

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
        border: 3px solid #2563eb;
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
        border-bottom: 2px solid #dbeafe;
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
        color: #2563eb;
        background: #f8fbff;
    }

    .pf-tab.active {
        color: #2563eb;
    }

    .pf-tab.active::after {
        position: absolute;
        right: 0;
        bottom: -2px;
        left: 0;
        height: 3px;
        background: #2563eb;
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
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, .1);
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
        border: 1px solid #2563eb;
        border-radius: 7px;
        background: #2563eb;
        color: #fff;
        font-family: inherit;
        font-size: 13px;
        font-weight: 700;
        white-space: nowrap;
        cursor: pointer;
        transition: background .2s;
    }

    .pf-calculate:hover {
        background: #1d4ed8;
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

    
/* Tabel Pivot */
.pf-table-wrapper {
    width: 100%;
    margin-top: 24px;
    overflow-x: auto;
    border: 1px solid #dbeafe;
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
    background: #eff6ff;
    color: #1d4ed8;
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
    background: #f8fbff;
}

.pf-table .pf-pivot-row th,
.pf-table .pf-pivot-row td {
    background: #eff6ff;
    color: #1d4ed8;
    font-weight: 700;
}


/* DATA OHLC TERBARU */
.pf-ohlc {
    margin-top: 32px;
    padding-top: 26px;
    border-top: 1px solid #dbeafe;
}

.pf-ohlc-title {
    margin: 0 0 8px;
    color: #0f172a;
    font-size: 21px;
    font-weight: 800;
}

.pf-ohlc-description {
    margin: 0 0 20px;
    color: #64748b;
    font-size: 13px;
    line-height: 1.7;
}

.pf-ohlc-toolbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 16px;
}

.pf-ohlc-select {
    width: min(100%, 300px);
    min-height: 42px;
    padding: 9px 12px;
    border: 1px solid #cbd5e1;
    border-radius: 7px;
    background: #fff;
    color: #334155;
    font: inherit;
    font-size: 14px;
}

.pf-ohlc-refresh {
    min-height: 42px;
    padding: 9px 16px;
    border: 1px solid #2563eb;
    border-radius: 7px;
    background: #2563eb;
    color: #fff;
    font: inherit;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
}

.pf-ohlc-refresh:hover {
    background: #1d4ed8;
}

.pf-ohlc-refresh:disabled {
    opacity: .6;
    cursor: wait;
}

.pf-ohlc-info {
    margin-bottom: 12px;
    color: #64748b;
    font-size: 12px;
}

.pf-ohlc-table-wrap {
    width: 100%;
    overflow-x: auto;
    border: 1px solid #dbeafe;
    border-radius: 8px;
}

.pf-ohlc-table {
    width: 100%;
    min-width: 600px;
    border-collapse: collapse;
    background: #fff;
}

.pf-ohlc-table th,
.pf-ohlc-table td {
    padding: 13px 16px;
    border-bottom: 1px solid #e2e8f0;
    text-align: right;
    white-space: nowrap;
    font-size: 13px;
}

.pf-ohlc-table thead th {
    background: #eff6ff;
    color: #1d4ed8;
    font-weight: 700;
}

.pf-ohlc-table th:first-child,
.pf-ohlc-table td:first-child {
    text-align: left;
}

.pf-ohlc-table tbody td {
    color: #334155;
}

.pf-ohlc-table tbody tr:last-child td {
    border-bottom: none;
}

.pf-ohlc-table tbody tr:hover {
    background: #f8fbff;
}

.pf-ohlc-message {
    padding: 22px 12px;
    color: #64748b;
    text-align: center !important;
}

@media (max-width: 600px) {
    .pf-ohlc-toolbar {
        align-items: stretch;
        flex-direction: column;
    }

    .pf-ohlc-select,
    .pf-ohlc-refresh {
        width: 100%;
    }

    .pf-ohlc-title {
        font-size: 19px;
    }
}

/* DATA OHLC TERBARU */
.pf-ohlc {
    margin-top: 32px;
    padding-top: 26px;
    border-top: 1px solid #dbeafe;
}

.pf-ohlc-title {
    margin: 0 0 20px;
    color: #64748b;
    font-size: 15px;
    font-weight: 700;
}

.pf-ohlc-toolbar {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 16px;
}

.pf-ohlc-select {
    width: 180px;
    min-height: 42px;
    padding: 9px 12px;
    border: 1px solid #dbe3ef;
    border-radius: 8px;
    background: #fff;
    color: #334155;
    font: inherit;
    font-size: 14px;
    cursor: pointer;
}

.pf-ohlc-info {
    margin-bottom: 12px;
    color: #64748b;
    font-size: 12px;
}

.pf-ohlc-table-wrap {
    width: 100%;
    overflow-x: auto;
    border: 1px solid #dbeafe;
    border-radius: 8px;
}

.pf-ohlc-table {
    width: 100%;
    min-width: 600px;
    border-collapse: collapse;
    background: #fff;
}

.pf-ohlc-table th,
.pf-ohlc-table td {
    padding: 16px 20px;
    border-bottom: 1px solid #e2e8f0;
    text-align: right;
    white-space: nowrap;
    font-size: 14px;
}

.pf-ohlc-table thead th {
    background: #f8fafc;
    color: #334155;
    font-weight: 700;
}

.pf-ohlc-table th:first-child,
.pf-ohlc-table td:first-child {
    text-align: left;
}

.pf-ohlc-table tbody td {
    color: #475569;
}

.pf-ohlc-table tbody tr:hover {
    background: #f8fbff;
}

.pf-ohlc-table tbody tr:last-child td {
    border-bottom: none;
}

.pf-ohlc-message {
    padding: 22px 12px;
    color: #64748b;
    text-align: center !important;
}

@media (max-width: 600px) {
    .pf-ohlc-select {
        width: 100%;
    }

    .pf-ohlc-table th,
    .pf-ohlc-table td {
        padding: 12px;
    }
}


</style>

<div class="pf-page">

    <main class="pf-container">

        {{-- JUDUL UTAMA --}}
        <h1 class="pf-title">Pivot & Fibonacci</h1>

        {{-- TAB --}}
        <div class="pf-tabs" role="tablist"
             aria-label="Pilih alat analisis">

            <button
                type="button"
                class="pf-tab active"
                id="pf-tab-pivot"
                role="tab"
                aria-selected="true"
                aria-controls="pf-panel-pivot"
                data-target="pivot">
                Pivot
            </button>

            <button
                type="button"
                class="pf-tab"
                id="pf-tab-fibonacci"
                role="tab"
                aria-selected="false"
                aria-controls="pf-panel-fibonacci"
                data-target="fibonacci"
                tabindex="-1">
                Fibonacci
            </button>

        </div>

        
        {{-- KONTEN PIVOT --}}
        <section
            class="pf-panel"
            id="pf-panel-pivot"
            role="tabpanel"
            aria-labelledby="pf-tab-pivot">

            <form class="pf-form" id="pf-pivot-form">

                <div class="pf-field">
                    <input
                        type="number"
                        id="pf-open"
                        name="open"
                        step="any"
                        placeholder="Buka (Open)">
                </div>

                <div class="pf-field">
                    <input
                        type="number"
                        id="pf-high"
                        name="high"
                        step="any"
                        placeholder="Tinggi (High)">
                </div>

                <div class="pf-field">
                    <input
                        type="number"
                        id="pf-low"
                        name="low"
                        step="any"
                        placeholder="Rendah (Low)">
                </div>

                <div class="pf-field">
                    <input
                        type="number"
                        id="pf-close"
                        name="close"
                        step="any"
                        placeholder="Tutup (Close)">
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
        <section
            class="pf-panel"
            id="pf-panel-fibonacci"
            role="tabpanel"
            aria-labelledby="pf-tab-fibonacci"
            hidden>

            {{-- Konten Fibonacci ditambahkan pada tahap berikutnya --}}

            <div class="pf-empty"></div>

        </section>

{{-- DATA OHLC TERBARU --}}
<section class="pf-ohlc" id="pf-ohlc-section">

    <h2 class="pf-ohlc-title">DATA OHLC TERBARU</h2>

    <div class="pf-ohlc-toolbar">
        <select
            class="pf-ohlc-select"
            id="pf-ohlc-category"
            aria-label="Pilih instrumen OHLC">
            <option value="">Memuat instrumen...</option>
        </select>
    </div>

    <div class="pf-ohlc-info" id="pf-ohlc-info">
        Memuat data OHLC...
    </div>

    <div class="pf-ohlc-table-wrap">
        <table class="pf-ohlc-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Open</th>
                    <th>High</th>
                    <th>Low</th>
                    <th>Close</th>
                </tr>
            </thead>

            <tbody id="pf-ohlc-body">
                <tr>
                    <td colspan="5" class="pf-ohlc-message">
                        Memuat data OHLC...
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</section>

    </main>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const page = document.querySelector('.pf-page');

    if (!page) return;

    const tabs = page.querySelectorAll('.pf-tab');
    const panels = page.querySelectorAll('.pf-panel');

    // Fungsi untuk mengganti tab Pivot dan Fibonacci
    function activateTab(target) {
        tabs.forEach(function (tab) {
            const active = tab.dataset.target === target;

            tab.classList.toggle('active', active);
            tab.setAttribute('aria-selected', String(active));
            tab.tabIndex = active ? 0 : -1;
        });

        panels.forEach(function (panel) {
            panel.hidden = panel.id !== 'pf-panel-' + target;
        });
    }

    // Event tab
    tabs.forEach(function (tab, index) {
        tab.addEventListener('click', function () {
            activateTab(tab.dataset.target);
        });

        tab.addEventListener('keydown', function (event) {
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

    // Event tombol Kalkulasi
    const calculateButton = page.querySelector('#pf-calculate');
    const pivotForm = page.querySelector('#pf-pivot-form');

    if (calculateButton && pivotForm) {
        calculateButton.addEventListener('click', function () {
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

            // Metode Klasik
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

            // Metode Woodie
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

            // Metode Camarilla
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

            // Format angka Indonesia
            const formatPrice = function (value) {
                return new Intl.NumberFormat('id-ID', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }).format(value);
            };

            // Masukkan hasil ke tabel
            const levels = [
                'r4', 'r3', 'r2', 'r1', 'pivot',
                's1', 's2', 's3', 's4'
            ];

            levels.forEach(function (level) {
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

    
    
    // DATA OHLC TERBARU DARI NEWSMAKER
    const ohlcCategory = page.querySelector('#pf-ohlc-category');
    const ohlcBody = page.querySelector('#pf-ohlc-body');
    const ohlcInfo = page.querySelector('#pf-ohlc-info');
    
    if (ohlcCategory && ohlcBody && ohlcInfo) {
        let ohlcRows = [];

        function getOhlcRows(payload) {
            if (Array.isArray(payload)) return payload;

            if (payload && typeof payload === 'object') {
                for (const key of ['data', 'items', 'results', 'rows', 'records']) {
                    if (Array.isArray(payload[key])) {
                        return payload[key];
                    }
                }
            }

            return [];
        }

        function getCategory(row) {
            return String(row.category || row.description || '').trim();
        }

        function getDate(row) {
            return row.tanggal || row.date || row.datetime || '';
        }

        function formatOhlcPrice(value) {
            if (value === null || value === undefined || value === '') {
                return '—';
            }

            const number = Number(value);

            return Number.isFinite(number)
                ? new Intl.NumberFormat('id-ID', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }).format(number)
                : '—';
        }

        function renderOhlc() {
            const selectedCategory = ohlcCategory.value;

            const filteredRows = ohlcRows
                .filter(function (row) {
                    return getCategory(row) === selectedCategory;
                })
                .sort(function (a, b) {
                    return String(getDate(b)).localeCompare(String(getDate(a)));
                })
                .slice(0, 10);

            ohlcBody.innerHTML = '';

            if (filteredRows.length === 0) {
                ohlcBody.innerHTML = `
                    <tr>
                        <td colspan="5" class="pf-ohlc-message">
                            Tidak ada data untuk instrumen ini.
                        </td>
                    </tr>
                `;

                ohlcInfo.textContent = 'Tidak ada data OHLC yang tersedia.';
                return;
            }

            filteredRows.forEach(function (row) {
                const tr = document.createElement('tr');

                [
                    getDate(row),
                    formatOhlcPrice(row.open),
                    formatOhlcPrice(row.high),
                    formatOhlcPrice(row.low),
                    formatOhlcPrice(row.close)
                ].forEach(function (value) {
                    const td = document.createElement('td');
                    td.textContent = value || '—';
                    tr.appendChild(td);
                });

                ohlcBody.appendChild(tr);
            });

            ohlcInfo.textContent =
                'Menampilkan ' + filteredRows.length +
                ' data terbaru · Sumber: NewsMaker';
        }

        async function loadOhlc() {
            ohlcInfo.textContent = 'Mengambil data dari NewsMaker...';

            try {
                const response = await fetch('/newsmaker-ohlc', {
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) {
                    throw new Error('Gagal mengambil data OHLC.');
                }

                const payload = await response.json();
                ohlcRows = getOhlcRows(payload);

                if (ohlcRows.length === 0) {
                    throw new Error('Format data OHLC tidak ditemukan.');
                }

                const categories = [...new Set(
                    ohlcRows.map(getCategory).filter(Boolean)
                )].sort();

                ohlcCategory.innerHTML = '';

                categories.forEach(function (category) {
                    const option = document.createElement('option');
                    option.value = category;
                    option.textContent = category;
                    ohlcCategory.appendChild(option);
                });

                if (categories.length === 0) {
                    throw new Error('Kategori instrumen tidak tersedia.');
                }

                renderOhlc();
            } catch (error) {
                console.error('Kesalahan Data OHLC:', error);

                ohlcInfo.textContent = 'Data OHLC gagal dimuat.';
                ohlcBody.innerHTML = `
                    <tr>
                        <td colspan="5" class="pf-ohlc-message">
                            Data belum bisa diambil dari NewsMaker.
                            Coba perbarui kembali.
                        </td>
                    </tr>
                `;
            } finally {

            }
        }
       
        ohlcCategory.addEventListener('change', renderOhlc);

        loadOhlc();
    }
    

});
</script>

@endsection