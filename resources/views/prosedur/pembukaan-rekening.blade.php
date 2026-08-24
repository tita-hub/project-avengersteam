@extends('layouts.app')

@section('content')

<div style="
    padding: 50px;
    background: #f5f7fb;
    min-height: 100vh;
">

    <h1 style="
        text-align: center;
        margin-bottom: 10px;
        font-size: 40px;
    ">
        Pembukaan Rekening
    </h1>

    <p style="
        text-align: center;
        color: #777;
        margin-bottom: 45px;
    ">
        Pilih metode pembukaan rekening yang diinginkan.
    </p>


    <div style="
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
    ">


        <!-- REGULAR -->
        <div style="
            width: 390px;
            background: white;
            border-radius: 18px;
            padding: 45px 35px;
            text-align: center;
            box-sizing: border-box;
            box-shadow: 0 8px 25px rgba(0,0,0,0.06);
        ">

            <div style="
                width: 90px;
                height: 90px;
                background: #38b963;
                border-radius: 12px;
                margin: 0 auto 25px;

                display: flex;
                align-items: center;
                justify-content: center;

                color: white;
                font-size: 42px;
            ">
                👤
            </div>

            <h2 style="
                margin-bottom: 15px;
                font-size: 28px;
            ">
                Regular
            </h2>

            <p style="
                color: #777;
                line-height: 1.7;
                min-height: 90px;
            ">
                Pembukaan rekening secara regular
                dengan bertemu dengan Wakil Pialang
                Berjangka PT. Rifan Financindo
                Berjangka
            </p>

            <!-- INI YANG DIKLIK -->
            <a href="{{ route('prosedur.regular') }}"
               style="
                    display: inline-block;
                    margin-top: 20px;
                    padding: 14px 25px;
                    background: #d8f5df;
                    color: #159447;
                    text-decoration: none;
                    border-radius: 10px;
                    font-weight: 700;
               ">
                View Details
            </a>

        </div>



        <!-- ONLINE -->
        <div style="
            width: 390px;
            background: white;
            border-radius: 18px;
            padding: 45px 35px;
            text-align: center;
            box-sizing: border-box;
            box-shadow: 0 8px 25px rgba(0,0,0,0.06);
        ">

            <div style="
                width: 90px;
                height: 90px;
                background: #38b963;
                border-radius: 12px;
                margin: 0 auto 25px;

                display: flex;
                align-items: center;
                justify-content: center;

                color: white;
                font-size: 42px;
            ">
                🖥️
            </div>

            <h2 style="
                margin-bottom: 15px;
                font-size: 28px;
            ">
                Online
            </h2>

            <p style="
                color: #777;
                line-height: 1.7;
                min-height: 90px;
            ">
                Pembukaan rekening secara online
                dengan mengisi form pembukaan
                rekening
            </p>

            <!-- INI YANG DIKLIK -->
            <a href="{{ route('prosedur.online') }}"
               style="
                    display: inline-block;
                    margin-top: 20px;
                    padding: 14px 25px;
                    background: #d8f5df;
                    color: #159447;
                    text-decoration: none;
                    border-radius: 10px;
                    font-weight: 700;
               ">
                View Details
            </a>

        </div>

    </div>

</div>

@endsection