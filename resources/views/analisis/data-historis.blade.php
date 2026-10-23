
@extends('layouts.app')

@section('title', 'Data Historis — Analisis Pasar')

@section('content')
<div id="data-historis-page">

    <style>
        #data-historis-page {
            --hist-green: #15803d;
            --hist-border: #e2e8f0;
            --hist-muted: #64748b;
            padding: 28px 24px 48px;
            width: 100%;
            color: #1e293b;
            box-sizing: border-box;
        }

        #data-historis-page *,
        #data-historis-page *::before,
        #data-historis-page *::after {
            box-sizing: border-box;
        }

        /* Wadah utama Data Historis */
        #data-historis-page .hist-main-card {
            padding: 24px;
            border: 1px solid var(--hist-border);
            border-radius: 12px;
            background: #fff;
            margin-bottom: 30px;
        }

        /* Judul di kiri dan tombol di kanan */
        #data-historis-page .hist-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin: 0 0 22px;
        }

        #data-historis-page .hist-heading-text {
            flex: 1;
            min-width: 0;
        }

        #data-historis-page .hist-heading-text h1 {
            margin: 0 0 8px;
            font-size: clamp(26px, 3vw, 34px);
            color: #0f172a;
        }

        #data-historis-page .hist-heading-text p {
            margin: 0;
            color: var(--hist-muted);
            font-size: 14px;
            line-height: 1.7;
        }

        /* Tombol aksi */
        #data-historis-page .hist-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 9px;
            margin: 0;
            flex-shrink: 0;
        }

        #data-historis-page .hist-btn {
            min-height: 40px;
            padding: 10px 16px;
            border: 1px solid var(--hist-green);
            border-radius: 7px;
            background: var(--hist-green);
            color: #fff;
            font-size: 13px;
            font-weight: 650;
            cursor: pointer;
            transition: filter .2s ease;
        }

        #data-historis-page .hist-btn:hover {
            filter: brightness(.94);
        }

        #data-historis-page .hist-btn-outline {
            background: #fff;
            color: var(--hist-green);
        }

        /* Filter menyatu dengan wadah utama */
        #data-historis-page .hist-card {
            padding: 0;
            border: none;
            border-radius: 0;
            background: transparent;
            margin: 0;
        }

        #data-historis-page .hist-filters {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        #data-historis-page .hist-field {
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-width: 0;
        }

        #data-historis-page .hist-field label {
            color: #334155;
            font-size: 13px;
            font-weight: 650;
        }

        #data-historis-page .hist-field input,
        #data-historis-page .hist-field select {
            width: 100%;
            min-height: 42px;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            background: #fff;
            color: #1e293b;
            font-size: 14px;
        }

        #data-historis-page .hist-field input:focus,
        #data-historis-page .hist-field select:focus {
            outline: 2px solid rgba(21, 128, 61, .15);
            border-color: var(--hist-green);
        }

        #data-historis-page .hist-status {
            margin: 15px 0 0;
            color: var(--hist-muted);
            font-size: 13px;
            line-height: 1.6;
        }

        #data-historis-page .hist-status.error {
            color: #b91c1c;
        }

        /* Header tabel dan jumlah data */
        #data-historis-page .hist-table-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            margin: 24px 0 12px;
        }

        #data-historis-page .hist-table-header h2 {
            margin: 0;
            font-size: 16px;
            color: #0f172a;
        }

        #data-historis-page .hist-table-count {
            color: var(--hist-muted);
            font-size: 12px;
            text-align: right;
        }

        /* Card tabel tersendiri di dalam wadah utama */
        #data-historis-page .hist-table-wrap {
            width: 100%;
            overflow-x: auto;
            border: 1px solid var(--hist-border);
            border-radius: 10px;
            background: #fff;
        }

        #data-historis-page .hist-table {
            width: 100%;
            min-width: 650px;
            border-collapse: collapse;
            font-size: 13px;
        }

        #data-historis-page .hist-table th {
            padding: 14px 16px;
            text-align: left;
            white-space: nowrap;
            color: #475569;
            background: #f8fafc;
            border-bottom: 1px solid var(--hist-border);
            font-weight: 700;
        }

        #data-historis-page .hist-table td {
            padding: 13px 16px;
            border-bottom: 1px solid #f1f5f9;
            white-space: nowrap;
            color: #334155;
        }

        #data-historis-page .hist-table tbody tr:last-child td {
            border-bottom: 0;
        }

        #data-historis-page .hist-table tbody tr:hover {
            background: #f8fafc;
        }

        #data-historis-page .hist-empty {
            padding: 30px 16px !important;
            text-align: center;
            white-space: normal !important;
            color: var(--hist-muted) !important;
        }

        /* Pagination */
        #data-historis-page .hist-pagination {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 16px;
        }

        #data-historis-page .hist-page-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        #data-historis-page .hist-page-buttons button {
            min-width: 36px;
            min-height: 35px;
            padding: 6px 10px;
            border: 1px solid var(--hist-border);
            border-radius: 6px;
            background: #fff;
            color: #334155;
            cursor: pointer;
        }

        #data-historis-page .hist-page-buttons button.active {
            background: var(--hist-green);
            color: #fff;
            border-color: var(--hist-green);
        }

        #data-historis-page .hist-page-buttons button:disabled {
            opacity: .45;
            cursor: not-allowed;
        }

        /* Wadah utama Currency Converter */
        #data-historis-page .hist-currency-card {
            padding: 24px;
            border: 1px solid var(--hist-border);
            border-radius: 12px;
            background: #fff;
            margin-top: 30px;
        }

        #data-historis-page .hist-currency-heading {
            margin: 0 0 20px;
        }

        #data-historis-page .hist-currency-card h2 {
            margin: 0 0 8px;
            font-size: 22px;
            color: #0f172a;
        }

        #data-historis-page .hist-currency-heading p {
            margin: 0;
            color: var(--hist-muted);
            font-size: 13px;
            line-height: 1.6;
        }

        /* Card konversi */
        #data-historis-page .hist-converter-card {
            padding: 20px;
            border: 1px solid var(--hist-border);
            border-radius: 10px;
            background: #fff;
        }

        #data-historis-page .hist-converter {
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto minmax(0, 1fr);
            align-items: end;
            gap: 16px;
        }

        #data-historis-page .hist-converter-equals {
            padding-bottom: 12px;
            font-size: 22px;
            font-weight: 700;
            color: var(--hist-muted);
            text-align: center;
        }

        #data-historis-page .hist-converter .hist-field input,
        #data-historis-page .hist-converter .hist-field select {
            min-height: 44px;
        }

        #data-historis-page .hist-converter .hist-field input {
            margin-top: 8px;
        }

        #data-historis-page .hist-converter-result {
            margin-top: 18px;
            padding: 15px;
            border-radius: 8px;
            background: #f8fafc;
            border: 1px solid var(--hist-border);
            color: #0f172a;
            font-size: 14px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        #data-historis-page .hist-converter-result strong {
            font-size: 18px;
        }

        #data-historis-page .hist-converter-meta {
            margin-top: 8px;
            font-size: 12px;
            color: var(--hist-muted);
        }

        @media (max-width: 768px) {
            #data-historis-page {
                padding: 22px 15px 35px;
            }

            #data-historis-page .hist-main-card,
            #data-historis-page .hist-currency-card {
                padding: 16px;
            }

            #data-historis-page .hist-heading {
                align-items: flex-start;
                flex-direction: column;
                gap: 16px;
            }

            #data-historis-page .hist-heading .hist-actions {
                justify-content: flex-start;
                width: 100%;
            }

            #data-historis-page .hist-converter-card {
                padding: 15px;
            }

            #data-historis-page .hist-filters {
                grid-template-columns: 1fr;
            }

            #data-historis-page .hist-converter {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            #data-historis-page .hist-converter-equals {
                padding: 0;
            }

            #data-historis-page .hist-table-header {
                align-items: flex-start;
            }

            #data-historis-page .hist-table-count {
                text-align: left;
            }

            #data-historis-page .hist-pagination {
                justify-content: flex-start;
            }
        }

        @media (max-width: 480px) {
            #data-historis-page .hist-heading .hist-actions {
                display: grid;
                grid-template-columns: 1fr;
            }

            #data-historis-page .hist-heading .hist-btn {
                width: 100%;
            }
        }

        @media print {
            body * {
                visibility: hidden !important;
            }

            #hist-print-area,
            #hist-print-area * {
                visibility: visible !important;
            }

            #hist-print-area {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
        }
    </style>

    {{-- WADAH UTAMA DATA HISTORIS --}}
    <section class="hist-main-card">

        {{-- JUDUL KIRI DAN TOMBOL KANAN --}}
        <div class="hist-heading">
            <div class="hist-heading-text">
                <h1>Data Historis</h1>
                <p>Riwayat pergerakan harga berdasarkan data yang tersedia dari NewsMaker.</p>
            </div>

            <div class="hist-actions">
                <button type="button" class="hist-btn" id="historis-refresh">
                    Refresh
                </button>

                <button type="button" class="hist-btn hist-btn-outline" id="historis-csv">
                    Unduh CSV
                </button>

                <button type="button" class="hist-btn hist-btn-outline" id="historis-pdf">
                    Unduh PDF
                </button>
            </div>
        </div>

        {{-- FILTER DAN TABEL --}}
        <section class="hist-card" aria-label="Filter data historis">

            {{-- FILTER TANPA CARD TERPISAH --}}
            <div class="hist-filters">
                <div class="hist-field">
                    <label for="historis-instrumen">Kategori</label>
                    <select id="historis-instrumen">
                        <option value="">Semua kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category }}">{{ $category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="hist-field">
                    <label for="historis-mulai">Mulai</label>
                    <input type="date" id="historis-mulai">
                </div>

                <div class="hist-field">
                    <label for="historis-akhir">Akhir</label>
                    <input type="date" id="historis-akhir">
                </div>
            </div>

            <p
                class="hist-status {{ !empty($error) ? 'error' : '' }}"
                id="historis-status"
                role="status"
                aria-live="polite"
            >{{ $error ?? 'Pilih kategori atau rentang tanggal, lalu tekan Refresh.' }}</p>

            {{-- TABEL DAN JUMLAH DATA --}}
            <section id="hist-print-area">

                <div class="hist-table-header">
                    <h2>Riwayat Harga</h2>

                    <span class="hist-table-count" id="historis-count">
                        0 baris | Menampilkan 0-0 dari 0
                    </span>
                </div>

                {{-- CARD TABEL --}}
                <div class="hist-table-wrap">
                    <table class="hist-table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Open</th>
                                <th>High</th>
                                <th>Low</th>
                                <th>Close</th>
                            </tr>
                        </thead>

                        <tbody id="historis-tbody">
                            <tr>
                                <td colspan="5" class="hist-empty">
                                    Menyiapkan data historis...
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="hist-pagination">
                    <div class="hist-page-buttons" id="historis-page-buttons"></div>
                </div>

            </section>
        </section>
    </section>

    {{-- WADAH UTAMA CURRENCY CONVERTER --}}
    <section class="hist-currency-card">

        <div class="hist-currency-heading">
            <h2>Currency Converter</h2>
            <p>Konversi menggunakan kurs referensi terbaru yang tersedia dari penyedia kurs.</p>
        </div>

        {{-- CARD KONVERSI --}}
        <div class="hist-converter-card">

            <div class="hist-converter">
                <div class="hist-field">
                    <label for="currency-from">From</label>
                    <select id="currency-from"></select>

                    <input
                        type="number"
                        id="currency-amount"
                        min="0"
                        step="any"
                        value="1"
                        aria-label="Jumlah mata uang asal"
                    >
                </div>

                <div class="hist-converter-equals">=</div>

                <div class="hist-field">
                    <label for="currency-to">To</label>
                    <select id="currency-to"></select>

                    <input
                        type="text"
                        id="currency-output"
                        readonly
                        aria-label="Hasil konversi mata uang"
                    >
                </div>
            </div>

            <div class="hist-converter-result" id="currency-result">
                Menyiapkan kurs mata uang...
            </div>

            <div class="hist-converter-meta" id="currency-meta"></div>
        </div>
    </section>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const root = document.getElementById('data-historis-page');
    if (!root) return;

    const allData = @js($dataHistoris ?? []);
    const initialError = @js($error ?? null);
    const currencyData = @js($currency ?? ['rates' => []]);
    const currencyError = @js($currencyError ?? null);

    const categoryInput = root.querySelector('#historis-instrumen');
    const startInput = root.querySelector('#historis-mulai');
    const endInput = root.querySelector('#historis-akhir');
    const statusBox = root.querySelector('#historis-status');
    const tbody = root.querySelector('#historis-tbody');
    const pageButtons = root.querySelector('#historis-page-buttons');
    const countBox = root.querySelector('#historis-count');

    const PAGE_SIZE = 10;
    let currentPage = 1;
    let filteredData = [];

    function parsePrice(value) {
        if (value === null || value === undefined || value === '') return null;

        const number = Number(value);
        return Number.isFinite(number) ? number : null;
    }

    function formatPrice(value) {
        const number = parsePrice(value);
        if (number === null) return '—';

        return number.toLocaleString('id-ID', {
            maximumFractionDigits: 8
        });
    }

    function escapeHTML(value) {
        return String(value ?? '').replace(/[&<>"']/g, char => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        })[char]);
    }

    function validDate(value) {
        if (!value) return null;

        const date = new Date(String(value) + 'T00:00:00');
        return Number.isNaN(date.getTime()) ? null : date;
    }

    function formatDate(value) {
        const date = validDate(value);
        if (!date) return escapeHTML(value || '—');

        return date.toLocaleDateString('en-CA');
    }

    function setStatus(message, isError = false) {
        statusBox.textContent = message;
        statusBox.classList.toggle('error', isError);
    }

    function getFilteredData() {
        let result = Array.isArray(allData) ? allData.slice() : [];

        const category = categoryInput.value;
        const start = startInput.value;
        const end = endInput.value;

        if (category) {
            result = result.filter(item =>
                String(item.category ?? '') === category
            );
        }

        if (start) {
            result = result.filter(item =>
                String(item.tanggal ?? '') >= start
            );
        }

        if (end) {
            result = result.filter(item =>
                String(item.tanggal ?? '') <= end
            );
        }

        return result.sort((a, b) =>
            String(b.tanggal ?? '').localeCompare(String(a.tanggal ?? ''))
        );
    }

    function renderPagination(totalPages) {
        pageButtons.innerHTML = '';

        if (totalPages <= 1) return;

        function addButton(label, page, disabled = false, active = false) {
            const button = document.createElement('button');

            button.type = 'button';
            button.textContent = label;
            button.disabled = disabled;
            button.classList.toggle('active', active);

            button.addEventListener('click', function () {
                currentPage = page;
                renderTable();
            });

            pageButtons.appendChild(button);
        }

        addButton('‹', currentPage - 1, currentPage === 1);

        const firstPage = Math.max(1, currentPage - 2);
        const lastPage = Math.min(totalPages, currentPage + 2);

        for (let page = firstPage; page <= lastPage; page++) {
            addButton(String(page), page, false, page === currentPage);
        }

        addButton('›', currentPage + 1, currentPage === totalPages);
    }

    function renderTable() {
        const total = filteredData.length;
        const totalPages = Math.ceil(total / PAGE_SIZE);

        if (totalPages > 0 && currentPage > totalPages) {
            currentPage = totalPages;
        }

        if (totalPages === 0) {
            currentPage = 1;
        }

        const start = (currentPage - 1) * PAGE_SIZE;
        const pageData = filteredData.slice(start, start + PAGE_SIZE);

        const displayStart = total > 0 ? start + 1 : 0;
        const displayEnd = start + pageData.length;

        countBox.textContent =
            `${total} baris | Menampilkan ${displayStart}-${displayEnd} dari ${total}`;

        tbody.innerHTML = '';

        if (!pageData.length) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="5" class="hist-empty">
                        Tidak ada data untuk kategori atau rentang tanggal yang dipilih.
                    </td>
                </tr>
            `;

            pageButtons.innerHTML = '';
            return;
        }

        pageData.forEach(item => {
            const row = document.createElement('tr');

            row.innerHTML = `
                <td>${formatDate(item.tanggal)}</td>
                <td>${formatPrice(item.open)}</td>
                <td>${formatPrice(item.high)}</td>
                <td>${formatPrice(item.low)}</td>
                <td>${formatPrice(item.close)}</td>
            `;

            tbody.appendChild(row);
        });

        renderPagination(totalPages);
    }

    function applyFilters() {
        if (
            startInput.value &&
            endInput.value &&
            startInput.value > endInput.value
        ) {
            setStatus('Tanggal mulai tidak boleh melewati tanggal akhir.', true);
            return;
        }

        currentPage = 1;
        filteredData = getFilteredData();

        renderTable();

        if (initialError && !allData.length) {
            setStatus(initialError, true);
        } else {
            setStatus('Data ditampilkan sesuai kategori dan tanggal yang dipilih.');
        }
    }

    root.querySelector('#historis-refresh')
        .addEventListener('click', applyFilters);

    categoryInput.addEventListener('change', applyFilters);
    startInput.addEventListener('change', applyFilters);
    endInput.addEventListener('change', applyFilters);

    // CSV berisi seluruh hasil filter, bukan hanya halaman aktif.
    root.querySelector('#historis-csv').addEventListener('click', function () {
        if (!filteredData.length) {
            setStatus('Tidak ada data untuk diunduh.', true);
            return;
        }

        const columns = ['tanggal', 'open', 'high', 'low', 'close'];

        function csvValue(value) {
            return '"' + String(value ?? '').replace(/"/g, '""') + '"';
        }

        const csv = [
            columns.join(','),
            ...filteredData.map(item =>
                columns.map(column => csvValue(item[column])).join(',')
            )
        ].join('\r\n');

        const blob = new Blob(['\uFEFF' + csv], {
            type: 'text/csv;charset=utf-8;'
        });

        const url = URL.createObjectURL(blob);
        const link = document.createElement('a');

        link.href = url;
        link.download = 'data-historis-newsmaker.csv';

        document.body.appendChild(link);
        link.click();
        link.remove();

        URL.revokeObjectURL(url);
    });

    // PDF dibuat melalui dialog cetak browser.
    // Pilih "Save as PDF" untuk menyimpan hasilnya.
    root.querySelector('#historis-pdf').addEventListener('click', function () {
        if (!filteredData.length) {
            setStatus('Tidak ada data untuk diunduh.', true);
            return;
        }

        const printableRows = filteredData.map(item => `
            <tr>
                <td>${escapeHTML(item.tanggal ?? '')}</td>
                <td>${escapeHTML(item.open ?? '')}</td>
                <td>${escapeHTML(item.high ?? '')}</td>
                <td>${escapeHTML(item.low ?? '')}</td>
                <td>${escapeHTML(item.close ?? '')}</td>
            </tr>
        `).join('');

        const printWindow = window.open('', '_blank');

        if (!printWindow) {
            setStatus(
                'Popup diblokir browser. Izinkan popup untuk mengunduh PDF.',
                true
            );
            return;
        }

        printWindow.document.write(`
            <!doctype html>
            <html lang="id">
            <head>
                <meta charset="utf-8">
                <title>Data Historis NewsMaker</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        padding: 20px;
                        color: #222;
                    }

                    h1 {
                        font-size: 20px;
                    }

                    p {
                        font-size: 12px;
                    }

                    table {
                        width: 100%;
                        border-collapse: collapse;
                        font-size: 11px;
                    }

                    th, td {
                        border: 1px solid #ccc;
                        padding: 7px;
                        text-align: left;
                    }

                    th {
                        background: #f1f5f9;
                    }

                    @page {
                        size: landscape;
                        margin: 12mm;
                    }
                </style>
            </head>
            <body>
                <h1>Data Historis</h1>
                <p>Sumber data: NewsMaker. Jumlah baris: ${filteredData.length}</p>

                <table>
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Open</th>
                            <th>High</th>
                            <th>Low</th>
                            <th>Close</th>
                        </tr>
                    </thead>
                    <tbody>${printableRows}</tbody>
                </table>
            </body>
            </html>
        `);

        printWindow.document.close();
        printWindow.focus();

        printWindow.onload = function () {
            printWindow.print();
        };
    });

    // ---------------- CURRENCY CONVERTER ----------------

    const rates = currencyData && currencyData.rates
        ? currencyData.rates
        : {};

    const fromSelect = root.querySelector('#currency-from');
    const toSelect = root.querySelector('#currency-to');
    const amountInput = root.querySelector('#currency-amount');
    const outputInput = root.querySelector('#currency-output');
    const resultBox = root.querySelector('#currency-result');
    const currencyMeta = root.querySelector('#currency-meta');

    const currencyNames = {
        USD: 'US Dollar',
        IDR: 'Indonesian Rupiah',
        EUR: 'Euro',
        GBP: 'British Pound',
        JPY: 'Japanese Yen',
        SGD: 'Singapore Dollar',
        AUD: 'Australian Dollar',
        CAD: 'Canadian Dollar',
        CHF: 'Swiss Franc',
        CNY: 'Chinese Yuan',
        MYR: 'Malaysian Ringgit',
        HKD: 'Hong Kong Dollar',
        NZD: 'New Zealand Dollar',
        KRW: 'South Korean Won',
        THB: 'Thai Baht'
    };

    const availableCurrencies = Object.keys(rates).sort();

    function fillCurrencyOptions(select, preferred) {
        select.innerHTML = '';

        availableCurrencies.forEach(code => {
            const option = document.createElement('option');

            option.value = code;
            option.textContent = `${code} — ${currencyNames[code] || code}`;

            select.appendChild(option);
        });

        if (availableCurrencies.includes(preferred)) {
            select.value = preferred;
        }
    }

    function updateCurrency() {
        if (currencyError || !availableCurrencies.length) {
            resultBox.textContent = currencyError ||
                'Kurs belum tersedia dari penyedia.';

            outputInput.value = '';
            return;
        }

        const from = fromSelect.value;
        const to = toSelect.value;
        const amount = Number(amountInput.value);

        if (!Number.isFinite(amount) || amount < 0) {
            resultBox.textContent = 'Masukkan jumlah mata uang yang valid.';
            outputInput.value = '';
            return;
        }

        const fromRate = Number(rates[from]);
        const toRate = Number(rates[to]);

        if (!(fromRate > 0) || !(toRate > 0)) {
            resultBox.textContent =
                'Kurs untuk mata uang yang dipilih belum tersedia.';

            outputInput.value = '';
            return;
        }

        const converted = (amount / fromRate) * toRate;

        const formatted = converted.toLocaleString('id-ID', {
            maximumFractionDigits: 6
        });

        outputInput.value = formatted;

        resultBox.innerHTML =
            `<strong>${escapeHTML(amount.toLocaleString('id-ID'))} ${escapeHTML(from)} = ${escapeHTML(formatted)} ${escapeHTML(to)}</strong>`;

        currencyMeta.textContent =
            'Kurs referensi, bukan jaminan kurs transaksi.';

        if (currencyData.date) {
            currencyMeta.textContent +=
                ' Pembaruan penyedia: ' + currencyData.date;
        }
    }

    if (currencyError || !availableCurrencies.length) {
        resultBox.textContent = currencyError ||
            'Kurs belum tersedia dari penyedia.';

        currencyMeta.textContent =
            'Konverter memerlukan koneksi ke penyedia kurs.';

        outputInput.value = '';
    } else {
        fillCurrencyOptions(fromSelect, 'USD');
        fillCurrencyOptions(toSelect, 'IDR');

        fromSelect.addEventListener('change', updateCurrency);
        toSelect.addEventListener('change', updateCurrency);
        amountInput.addEventListener('input', updateCurrency);

        updateCurrency();
    }

    if (initialError && !allData.length) {
        setStatus(initialError, true);
    }

    applyFilters();
});
</script>

@endsection
