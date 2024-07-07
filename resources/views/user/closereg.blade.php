@extends('layout.twlayout')

@section('head')
    <style>
        body {
            background: linear-gradient(125deg, rgba(61, 37, 84, 1) 0%, rgba(123, 48, 176, 1) 51%, rgba(120, 27, 55, 1) 100%);
            animation: moveGradient 10s linear infinite;
            color: white;
            overflow-x: hidden;
            position: relative;
            background-size: 200%;
        }

        .title {
            font-weight: bold;
            font-size: 3rem;
            text-shadow:
                0 0 4px #fff,
                0 0 10px #fff,
                0 0 38px #8048e0,
                0 0 73px #5f48e0;
        }

        @keyframes moveGradient {
            0% {
                background-position: 0% 100%;
            }

            50% {
                background-position: 100% 100%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
@endsection

@section('content')
    <div class="w-screen h-screen flex justify-center items-center">
        <div class="flex">
            <img src="{{ asset('asset/icon-logo-bom.png') }}" class="w-[200px] max-md:hidden">
            <h1 class="title flex justify-center items-center ml-4 text-center">Registration is Closed
                <br>Thankyou for participating
            </h1>
        </div>
    </div>
@endsection
