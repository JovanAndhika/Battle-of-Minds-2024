@extends('layout.twlayout')

@section('head')
    <style>
        html {
            scroll-behavior: smooth;
        }

        ::-webkit-scrollbar {
            width: 15px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: rgb(107, 21, 125);
            border-radius: 25px;
        }

        body::-webkit-scrollbar-track {
            background: linear-gradient(125deg, rgba(120, 27, 55, 0.75), rgba(123, 48, 176, 0.75) 51%, rgba(61, 37, 84, 0.75) 100%);
        }

        body {
            /* background: linear-gradient(180deg, rgb(26, 0, 36) 0%, rgb(63, 9, 121) 49%, rgb(96, 10, 255) 100%); */
            background-image: url('asset/bg-bom-main.png');
            background-size: cover;
            background-position: center;
            color: white;
            overflow-x: hidden;
            position: relative;
        }

        .body2 {
            backdrop-filter: brightness(80%);
            -webkit-backdrop-filter: brightness(80%);
            -moz-backdrop-filter: brightness(80%);
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

    <link rel="stylesheet" href="css/sidebar.css">
@endsection

@section('content')
    <div class="body2">
        {{-- <div class="content"> --}}
            @include('homepageComponents.about')
            @include('homepageComponents.prizepool')
            @include('homepageComponents.timeline')
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
                <h1 class="loading-text">A CHALLENGING</h1>
            </div>
            <div class="textlayer layer4">
                <h1 class="loading-text">MATHEMATICS</h1>
            </div>
            <div class="textlayer layer5">
                <h1 class="loading-text">COMPETITION</h1>
            </div>
            <div class="textlayer layer6">
                <h1 class="loading-text">IN</h1>
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
    <script src="js/footer.js" defer></script>
@endsection
