@extends('layout.mainlayout')

@section('head')
    <style>
        body {
            background: linear-gradient(180deg, rgb(26, 0, 36) 0%, rgb(63, 9, 121) 49%, rgb(96, 10, 255) 100%);
            color: white;
            overflow-x: hidden;
            position: relative;
        }
        .card {
            width : 100%;
            height : 500px;
            background: linear-gradient(125deg, rgba(61,37,84,1) 0%, rgba(123,48,176,1) 51%, rgba(120,27,55,1) 100%);
            animation: moveGradient 30s linear infinite; /* Adjust animation duration as needed */
            box-shadow: 1px 0px 14px 4px rgba(255,255,255,1);
            -webkit-box-shadow: 1px 0px 14px 4px rgba(255,255,255,1);
            -moz-box-shadow: 1px 0px 14px 4px rgba(255,255,255,1);
        }
        @keyframes moveGradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
       #title {
            font-weight : bold;
            margin-top : 40px;
            margin-bottom : 30px;
            font-size: 3rem;
            letter-spacing: 0.3rem;
            text-shadow:
                0 0 4px #fff,
                0 0 10px #fff,
                0 0 38px #8048e0,
                0 0 73px #5f48e0;
        }
        .btn{
            background-color: #1cd9ff;
            width: 100%;
            font-weight: bold;
            border: none;
        }
        </style>
        <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    </style> 
@endsection

<body>
    @include('partials.sidebar')
    <div class="container mt-4">
        <h1 style="text-align: center" id='title'>Welcome, {{$username}}</h1><br/>

        <div class="row mb-3 me-2 ms-2 mb-5" style="justify-content:center">
            <div class="col">
                <div class="card bg-dark text-white ms-3 me-3">
                    <!-- <img src="..." class="card-img" alt="..."> -->
                    <div class="card-img-overlay">
                        <h3 class="card-title">Elimination One</h3>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <a class="btn" href="{{ route('user.elim_satu', ['id' =>$idUser]) }}" type="button">ELIMINATION ONE</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3 me-2 ms-2 mb-5">
            <div class="col">
                <div class="card bg-dark text-white ms-3 me-3">
                    <!-- <img src="..." class="card-img" alt="..."> -->
                    <div class="card-img-overlay">
                        <h3 class="card-title">Elimination Two</h3>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <a class="btn" href="{{ route('user.comingSoon', ['id' => $idUser]) }}" type="button">ELIMINATION TWO</a>
                    </div>
                </div>
            </div>
        </div>    
        </div>
    </div>
</body>
