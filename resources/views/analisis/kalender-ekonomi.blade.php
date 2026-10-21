
@extends('layouts.app')

@section('title', 'Kalender Ekonomi')

@section('content')

<style>
    .economic-calendar-page {
        width: 100%;
        padding: 42px 24px 60px;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
        color: #172b4d;
    }

    .economic-calendar-card {
        width: 100%;
        max-width: 1450px;
        margin: 0 auto;
        overflow: hidden;
        background: #fff;
        border: 8px solid #ffb900;
        border-radius: 22px;
        box-shadow: 0 12px 35px rgba(0, 0, 0, .13);
    }

    .economic-calendar-header {
        padding: 30px 20px;
        text-align: center;
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
    }

    .economic-calendar-header h1 {
        margin: 0;
        color: #080808;
        font-size: 34px;
        font-weight: 800;
    }

    .economic-calendar-header p {
        margin: 12px 0 0;
        color: #64748b;
        font-size: 14px;
        line-height: 1.7;
    }

    .economic-calendar-content {
        padding: 28px;
        background: #f8fafc;
    }

    .economic-calendar-toolbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
        margin-bottom: 22px;
    }

    .economic-calendar-description h2 {
        margin: 0;
        color: #1f2937;
        font-size: 18px;
        font-weight: 700;
    }

    .economic-calendar-description p {
        margin: 7px 0 0;
        color: #64748b;
        font-size: 13px;
        line-height: 1.6;
    }

    .economic-calendar-download {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        padding: 12px 18px;
        background: #00a443;
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        transition: background .2s ease;
    }

    .economic-calendar-download:hover {
        background: #008b38;
    }

    .economic-calendar-download:focus-visible {
        outline: 3px solid #ffb900;
        outline-offset: 3px;
    }

    .economic-calendar-table-wrap {
        width: 100%;
        overflow-x: auto;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        -webkit-overflow-scrolling: touch;
    }

    .economic-calendar-table {
        width: 100%;
        min-width: 850px;
        border-collapse: collapse;
        background: #fff;
        font-size: 13px;
    }

    .economic-calendar-table thead {
        background: #172b4d;
        color: #fff;
    }

    .economic-calendar-table th {
        padding: 16px 14px;
        text-align: left;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
    }

    .economic-calendar-table td {
        padding: 15px 14px;
        border-bottom: 1px solid #e9eef5;
        color: #334155;
        vertical-align: middle;
    }

    .economic-calendar-table tbody tr:hover {
        background: #f8fafc;
    }

    .economic-calendar-table tbody tr:last-child td {
        border-bottom: none;
    }

    .economic-calendar-time {
        white-space: nowrap;
        font-weight: 700;
        color: #172b4d !important;
    }

    .economic-calendar-currency {
        font-weight: 800;
        color: #172b4d !important;
    }

    .economic-calendar-impact {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        white-space: nowrap;
    }

    .economic-calendar-impact-dot {
        width: 8px;
        height: 8px;
        display: inline-block;
        border-radius: 50%;
    }

    .impact-high {
        background: #ef4444;
    }

    .impact-medium {
        background: #f59e0b;
    }

    .impact-low {
        background: #22c55e;
    }

    .economic-calendar-status {
        padding: 28px 16px;
        text-align: center;
        color: #64748b;
        font-size: 13px;
        line-height: 1.7;
    }

    .economic-calendar-error {
        color: #b91c1c;
    }

    .economic-calendar-date {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 16px;
    }

    .economic-calendar-date label {
        font-size: 13px;
        color: #475569;
        font-weight: 700;
    }

    .economic-calendar-date input {
        padding: 9px 11px;
        border: 1px solid #cbd5e1;
        border-radius: 7px;
        background: #fff;
        color: #172b4d;
        font: inherit;
    }

    @media (max-width: 992px) {
        .economic-calendar-page {
            padding: 30px 16px 45px;
        }

        .economic-calendar-card {
            border-width: 6px;
            border-radius: 17px;
        }

        .economic-calendar-content {
            padding: 20px;
        }

        .economic-calendar-header h1 {
            font-size: 29px;
        }
    }

    @media (max-width: 576px) {
        .economic-calendar-page {
            padding: 20px 10px 35px;
        }

        .economic-calendar-card {
            border-width: 4px;
            border-radius: 13px;
        }

        .economic-calendar-header {
            padding: 26px 14px;
        }

        .economic-calendar-header h1 {
            font-size: 25px;
        }

        .economic-calendar-header p {
            font-size: 12px;
        }

        .economic-calendar-content {
            padding: 14px;
        }

        .economic-calendar-toolbar {
            align-items: flex-start;
            flex-direction: column;
        }

        .economic-calendar-download {
            width: 100%;
        }

        .economic-calendar-date {
            align-items: flex-start;
            flex-direction: column;
        }

        .economic-calendar-date input {
            width: 100%;
            box-sizing: border-box;
        }
    }

    @media print {
        @page {
            size: A4 landscape;
            margin: 10mm;
        }

        body * {
            visibility: hidden !important;
        }

        .economic-calendar-page,
        .economic-calendar-page * {
            visibility: visible !important;
        }

        .economic-calendar-download,
        .economic-calendar-date {
            display: none !important;
        }

        .economic-calendar-page {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 0;
        }

        .economic-calendar-card {
            max-width: none;
            border: 0;
            border-radius: 0;
            box-shadow: none;
        }

        .economic-calendar-header {
            padding: 12px;
        }

        .economic-calendar-header h1 {
            font-size: 24px;
        }

        .economic-calendar-content {
            padding: 10px;
            background: #fff;
        }

        .economic-calendar-table-wrap {
            overflow: visible;
            border: none;
        }

        .economic-calendar-table {
            min-width: 0;
            font-size: 9px;
        }

        .economic-calendar-table th,
        .economic-calendar-table td {
            padding: 7px 5px;
        }
    }
</style>

<div class="economic-calendar-page">
    <section class="economic-calendar-card">

        <header class="economic-calendar-header">
            <h1>Kalender Ekonomi</h1>
            <p>
                Pantau jadwal rilis data ekonomi global,
                tingkat kepentingan, hasil aktual, dan perkiraan pasar.
            </p>
        </header>

        <div class="economic-calendar-content">

            <div class="economic-calendar-toolbar">
                <div class="economic-calendar-description">
                    <h2>Jadwal Rilis Data Ekonomi</h2>
                    <p>
                        Informasi jadwal dan indikator ekonomi pasar global.
                    </p>
                </div>

                <button
                    type="button"
                    class="economic-calendar-download"
                    onclick="downloadEconomicCalendarPDF()">

                    <svg
                        width="18"
                        height="18"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <path d="m7 10 5 5 5-5"/>
                        <path d="M12 15V3"/>
                    </svg>

                    Download PDF
                </button>
            </div>

            <div class="economic-calendar-date">
                <label for="economicCalendarDate">
                    Tanggal kalender
                </label>

                <input
                    type="date"
                    id="economicCalendarDate"
                    onchange="loadEconomicCalendar()">
            </div>

            <div class="economic-calendar-table-wrap">
                <table class="economic-calendar-table">
                    <thead>
                        <tr>
                            <th>Waktu</th>
                            <th>Mata Uang</th>
                            <th>Dampak</th>
                            <th>Peristiwa Ekonomi</th>
                            <th>Aktual</th>
                            <th>Perkiraan</th>
                            <th>Sebelumnya</th>
                        </tr>
                    </thead>

                    <tbody id="economicCalendarBody">
                        <tr>
                            <td colspan="7">
                                <div class="economic-calendar-status">
                                    Memuat data kalender ekonomi...
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </section>
</div>

<script>

const economicCalendarEndpoint = '/api/economic-calendar';

function escapeCalendarHTML(value) {
    return String(value ?? '-').replace(/[&<>"']/g, function (char) {
        return {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        }[char];
    });
}

function getImpactInfo(impact) {
    const value = Number(impact);

    // Pemetaan sementara: sesuaikan setelah arti angka
    // impact dari NewsMaker terverifikasi.
    if (value === 3) {
        return { label: 'Tinggi', className: 'impact-high' };
    }

    if (value === 2) {
        return { label: 'Sedang', className: 'impact-medium' };
    }

    if (value === 1) {
        return { label: 'Rendah', className: 'impact-low' };
    }

    return { label: 'Tidak diketahui', className: 'impact-low' };
}

function renderEconomicCalendar(events) {
    const tbody = document.getElementById('economicCalendarBody');

    if (!Array.isArray(events) || events.length === 0) {
        tbody.innerHTML = `
            <tr>
                <td colspan="7">
                    <div class="economic-calendar-status">
                        Belum ada data kalender ekonomi.
                    </div>
                </td>
            </tr>
        `;
        return;
    }

    tbody.innerHTML = events.map(function (event) {
        const impact = getImpactInfo(event.impact);

        return `
            <tr>
                <td class="economic-calendar-time">
                    ${escapeCalendarHTML(event.time)}
                </td>
                <td class="economic-calendar-currency">
                    ${escapeCalendarHTML(event.currency)}
                </td>
                <td>
                    <span class="economic-calendar-impact">
                        <span class="economic-calendar-impact-dot ${impact.className}"></span>
                        ${impact.label}
                    </span>
                </td>
                <td>${escapeCalendarHTML(event.title)}</td>
                <td>${escapeCalendarHTML(event.actual)}</td>
                <td>${escapeCalendarHTML(event.forecast)}</td>
                <td>${escapeCalendarHTML(event.previous)}</td>
            </tr>
        `;
    }).join('');
}

async function loadEconomicCalendar() {
    const tbody = document.getElementById('economicCalendarBody');
    const dateInput = document.getElementById('economicCalendarDate');

    if (!tbody || !dateInput) return;

    tbody.innerHTML = `
        <tr>
            <td colspan="7">
                <div class="economic-calendar-status">
                    Memuat data kalender ekonomi...
                </div>
            </td>
        </tr>
    `;

    try {
        const url = new URL(
            economicCalendarEndpoint,
            window.location.origin
        );

        // Mengirim tanggal pilihan ke Laravel.
        if (dateInput.value) {
            url.searchParams.set('date', dateInput.value);
        }

        const response = await fetch(url, {
            headers: {
                'Accept': 'application/json'
            }
        });

        const result = await response.json();

        if (!response.ok || !Array.isArray(result.data)) {
            throw new Error(
                result.message || 'Format data kalender tidak valid.'
            );
        }

        renderEconomicCalendar(result.data);
    } catch (error) {
        console.error('Kalender ekonomi:', error);

        tbody.innerHTML = `
            <tr>
                <td colspan="7">
                    <div class="economic-calendar-status economic-calendar-error">
                        Data kalender gagal dimuat. Periksa koneksi
                        dan endpoint kalender ekonomi.
                    </div>
                </td>
            </tr>
        `;
    }
}

function downloadEconomicCalendarPDF() {
    window.print();
}

document.addEventListener('DOMContentLoaded', function () {
    const dateInput = document.getElementById('economicCalendarDate');

    if (!dateInput.value) {
        const now = new Date();

        dateInput.value = [
            now.getFullYear(),
            String(now.getMonth() + 1).padStart(2, '0'),
            String(now.getDate()).padStart(2, '0')
        ].join('-');
    }

    loadEconomicCalendar();
});


</script>

@endsection
