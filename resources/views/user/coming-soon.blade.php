@extends('layout.mainlayout')

@section('head')
    <style>
        body {
            background: linear-gradient(180deg, rgb(26, 0, 36) 0%, rgb(63, 9, 121) 49%, rgb(96, 10, 255) 100%);
            color: white;
            overflow-x: hidden;
            position: relative;
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
    </style>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
@endsection 

<body>
    @include('partials.sidebar')
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="row g-0">
            <div class="col text-center text-lg-end d-none d-lg-block">
                <img src="{{ asset('asset/icon-logo-bom.png') }}" class="text-end" style="width: 60%" alt="">
            </div>
            <div class="col d-flex flex-column justify-content-center align-items-center">
                <h1 class="title d-none d-lg-block">COMING SOON</h1> <!-- Visible on large screens -->
                <h1 class="title d-lg-none text-center">COMING SOON</h1> <!-- Visible on small screens -->
            </div>
        </div>
    </div>
</body>
