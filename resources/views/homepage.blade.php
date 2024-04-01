@extends('layout.twlayout')

@section('head')
    <style>
        body {
            background: linear-gradient(180deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 49%, rgba(0, 212, 255, 1) 100%);
            color: white;
            overflow-x: hidden;
            position: relative;
        }

        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: linear-gradient(to left, pink, rgb(78, 2, 78), purple, rgb(85, 0, 255), rgb(64, 0, 128));
            background-size: 400% 400%;
            color: white;
            pointer-events: none;
            z-index: 110;
        }

        .loader {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300px;
            height: 50px;
            transform: translate(-50%, -50%);
            display: flex;
            background: gray;
        }

        .loader-1 {
            position: relative;
            background: white;
            width: 300px;
        }

        .bar {
            height: 50px;
        }

        .content {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @keyframes gradient {
            0% {
                background-position: 0 50%
            }

            50% {
                background-position: 100% 50%;
            }
        }

        .textlayer {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            width: 100vw;
            height: 100vh;
            background: radial-gradient(circle, rgba(18, 0, 55, 1) 0%, rgba(34, 0, 106, 1) 18%, rgba(56, 0, 134, 1) 62%, rgba(68, 0, 162, 1) 79%, rgba(88, 0, 212, 1) 100%);
        }

        .layer1 {
            opacity: 0;
            z-index: 111;
        }

        .layer2 {
            opacity: 0;
            z-index: 112;
            transform: scale(0.3);
        }

        .layer3 {
            opacity: 0;
            z-index: 113;
            transform: scale(0.3);
        }

        .layer4 {
            opacity: 0;
            z-index: 114;
            transform: scale(0.3);
        }

        .layer5 {
            opacity: 0;
            z-index: 115;
            transform: scale(0.3);
        }

        .layer6 {
            opacity: 0;
            z-index: 116;
            transform: scale(0.3);
        }

        .layer7 {
            opacity: 0;
            z-index: 117;
            transform: scale(0.3);
        }

        .layer8 {
            opacity: 0;
            z-index: 118;
            transform: scale(0.3);
        }

        .layer9 {
            opacity: 0;
            z-index: 119;
            transform: scale(0.3);
        }

        .loading-text {
            text-align: center;
            font-size: 4rem;
            font-family: 'Rowdies', sans-serif;
            text-shadow: 0px 0px 5px white, 0px 0px 10px white;
        }
    </style>
@endsection

@section('content')
    {{-- <div class="content"> --}}
        @include('homepageComponents.about')
        {{-- @include('homepageComponents.timeline') --}}
        @include('homepageComponents.guide')
        @include('homepageComponents.faq')
        @include('homepageComponents.footer')
    {{-- </div> --}}

    {{-- <div class="loading-screen">
        <div class="textlayer layer1">
            <h1 class="loading-text">WELCOME</h1>
        </div>
        <div class="textlayer layer2">
            <h1 class="loading-text">TO</h1>
        </div>
        <div class="textlayer layer3">
            <h1 class="loading-text">THE BIGGEST</h1>
        </div>
        <div class="textlayer layer4">
            <h1 class="loading-text">MATHEMATICS</h1>
        </div>
        <div class="textlayer layer5">
            <h1 class="loading-text">COMPETITION</h1>
        </div>
        <div class="textlayer layer6">
            <h1 class="loading-text">OF</h1>
        </div>
        <div class="textlayer layer7">
            <h1 class="loading-text">PETRA</h1>
        </div>
        <div class="textlayer layer8">
            <h1 class="loading-text">CHRISTIAN</h1>
        </div>
        <div class="textlayer layer9">
            <h1 class="loading-text">UNIVERSITY</h1>
        </div>
        <div class="loader">
            <div class="loader-1 bar"></div>
        </div>
    </div> --}}
    @if (session('registrationSuccess'))
        <script>
            Swal.fire({
                title: "Registration Success",
                text: "Anda baru bisa login setelah tervalidasi Admin",
                icon: "success"
            });
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    {{-- <script src="js/loader.js" defer></script> --}}
@endsection
