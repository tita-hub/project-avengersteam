```blade
@extends('layouts.app')

@section('title', 'Kalender Ekonomi')

@section('content')

<style>
    .economic-calendar-page {
        width: 100%;
        padding: 42px 24px 60px;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    .economic-calendar-card {
        width: 100%;
        max-width: 1450px;
        margin: 0 auto;
        overflow: hidden;
        background: #ffffff;
        border: 8px solid #ffb900;
        border-radius: 22px;
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.13);
    }

    .economic-calendar-header {
        padding: 38px 20px;
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
        color: #ffffff;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        transition: background 0.2s ease;
    }

    .economic-calendar-download:hover {
        background: #008b38;
    }

    .economic-calendar-download:focus-visible {
        outline: 3px solid #ffb900;
        outline-offset: 3px;
    }

    .economic-calendar-frame {
        width: 100%;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
    }

    .economic-calendar-frame iframe {
        display: block;
        width: 100%;
        height: 1000px;
        border: none;
        background: #ffffff;
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

        .economic-calendar-frame iframe {
            height: 1000px;
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

        .economic-calendar-frame iframe {
            height: 1100px;
            min-width: 320px;
        }
    }

    @media print {
        .economic-calendar-download {
            display: none !important;
        }

        .economic-calendar-page {
            padding: 0;
        }

        .economic-calendar-card {
            max-width: none;
            border: 0;
            box-shadow: none;
        }

        .economic-calendar-content {
            padding: 10px;
        }
    }
</style>

<div class="economic-calendar-page">

    <section class="economic-calendar-card">

        {{-- HEADER KALENDER EKONOMI --}}
        <header class="economic-calendar-header">
            <h1>Kalender Ekonomi</h1>

            <p>
                Pantau jadwal rilis data ekonomi global,
                tingkat kepentingan, hasil aktual, dan perkiraan pasar.
            </p>
        </header>

        <div class="economic-calendar-content">

            {{-- TOOLBAR KALENDER --}}
            <div class="economic-calendar-toolbar">

                <div class="economic-calendar-description">
                    <h2>Jadwal Rilis Data Ekonomi</h2>

                    <p>
                        Pantau jadwal rilis data ekonomi dan
                        perkembangan informasi pasar.
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

            {{-- TABEL KALENDER EKONOMI NEWSMAKER --}}
            <div class="economic-calendar-frame">

                <iframe
                    id="newsMakerEconomicCalendar"
                    src="https://www.rf-berjangka.com/analisis/economic-calendar"
                    title="Kalender Ekonomi NewsMaker"
                    loading="lazy"
                    referrerpolicy="strict-origin-when-cross-origin">
                </iframe>

            </div>

        </div>

    </section>

</div>

<script>
    function downloadEconomicCalendarPDF() {
        window.print();
    }
</script>

@endsection
```