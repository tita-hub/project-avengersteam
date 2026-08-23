@extends('layouts.app')

@section('content')

<style>

.pembukaan-page {
    min-height: 100vh;
    padding: 50px 45px;
    background: #f5f6fa;
    box-sizing: border-box;
}

.pembukaan-header {
    text-align: center;
    margin-bottom: 40px;
}

.pembukaan-header h1 {
    margin: 0;
    font-size: 34px;
    color: #111827;
}

.pembukaan-header p {
    margin-top: 10px;
    color: #777;
    font-size: 15px;
}

.rekening-grid {
    max-width: 850px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 25px;
}

.rekening-card {
    background: white;
    border-radius: 16px;
    min-height: 440px;
    padding: 55px 35px;
    box-sizing: border-box;
    text-align: center;

    box-shadow:
        0 5px 20px rgba(0,0,0,0.04);

    transition:
        transform 0.25s ease,
        box-shadow 0.25s ease;
}

.rekening-card:hover {
    transform: translateY(-5px);

    box-shadow:
        0 12px 30px rgba(0,0,0,0.08);
}

.rekening-icon {
    width: 92px;
    height: 92px;

    margin: 0 auto 25px;

    border-radius: 9px;

    background: #35b961;

    display: flex;
    align-items: center;
    justify-content: center;

    color: white;

    font-size: 45px;
}

.rekening-card h2 {
    margin: 0 0 14px;

    font-size: 27px;

    color: #111;
}

.rekening-card p {
    margin: 0 auto 25px;

    max-width: 320px;

    color: #707070;

    font-size: 14px;

    line-height: 1.65;
}

.rekening-button {
    display: inline-block;

    padding: 13px 20px;

    border-radius: 8px;

    background: #c9f4d0;

    color: #00a63c;

    text-decoration: none;

    font-size: 16px;

    font-weight: 700;
}

.rekening-button:hover {
    background: #35b961;
    color: white;
}

@media (max-width: 800px) {

    .rekening-grid {
        grid-template-columns: 1fr;
    }

    .pembukaan-page {
        padding: 30px 20px;
    }

}

</style>


<div class="pembukaan-page">

    <div class="pembukaan-header">

        <h1>
            Pembukaan Rekening
        </h1>

        <p>
            Pilih metode pembukaan rekening yang sesuai.
        </p>

    </div>


    <div class="rekening-grid">


        <!-- REGULAR -->

        <div class="rekening-card">

            <div class="rekening-icon">

                <i class="bi bi-person-fill"></i>

            </div>

            <h2>
                Regular
            </h2>

            <p>
                Pembukaan rekening secara regular
                dengan bertemu dengan Wakil Pialang
                Berjangka PT. Rifan Financindo Berjangka.
            </p>

            <a href="#" class="rekening-button">
                View Detail
            </a>

        </div>


        <!-- ONLINE -->

        <div class="rekening-card">

            <div class="rekening-icon">

                <i class="bi bi-display"></i>

            </div>

            <h2>
                Online
            </h2>

            <p>
                Pembukaan rekening secara online
                dengan mengisi form pembukaan rekening.
            </p>

            <a href="#" class="rekening-button">
                View Detail
            </a>

        </div>

    </div>

</div>

@endsection