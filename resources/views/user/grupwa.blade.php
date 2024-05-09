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
    <div class="container d-flex flex-column flex-nowrap justify-content-center align-items-center" style="height: 100vh;">
        <h1>Link Group WA</h1>
        <a href="https://chat.whatsapp.com/L5c6PPx9JToIXxLabvMAKB">Click Here</a>
    </div>
</body>
