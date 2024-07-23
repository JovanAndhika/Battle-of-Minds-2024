@extends('layout.mainlayout')
@section('head')
    <style>
        body {
            background-image: url('{{ asset('asset/bg-bom-main.png') }}');
            background-size: cover;
            background-position: center;
            color: white;
            min-height: 100vh !important;
        }

        .title {
            font-size: 3rem;
            font-weight: bold;
            padding: 20px;
            letter-spacing: 0.3rem;
            text-shadow:
                0 0 4px #fff,
                0 0 10px #fff,
                0 0 38px #8048e0,
                0 0 73px #5f48e0;
        }

        .form-content {
            background: rgb(255, 255, 255, 0.2);
            backdrop-filter: blur(20px);
            border: 4px solid white;
            padding: 30px;
            box-shadow: 2px 10px 10px 2px #ffffff;
        }

        .btn {
            margin-top: 10px;
            background: linear-gradient(125deg, rgba(120, 27, 55, 1), rgba(123, 48, 176, 1) 51%, rgba(61, 37, 84, 1) 100%);
            box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1);
            -webkit-box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1);
            -moz-box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1);
        }

        #question-container {
            display: grid;
            grid-template-columns: auto auto auto;
        }

        .answer-input {
            border-radius: 5px;
            border: none;
            padding: 0 9px;
            height: 30px;
        }

        img {
            height: 200px;
        }
    </style>
@endsection

@section('content')
    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: "{{ session('success') }}",
                text: "{{ session('count') }}"
            });
        </script>
    @endif

    <body>
        <div class="container">
            <div class="header text-center my-4">
                <h1 class="title">Bomb Game</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 form-content">
                    <form action="{{ route('user.soalBomStore') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="mb-4">
                            <p>301. Please answer the question below</p>
                            <img src="{{ asset('soalBom/soalBom (1).jpg') }}" alt="Question Image 1"
                                class="w-100 rounded-lg shadow-md mb-3">
                            <label for="answer1" class="form-label">Your Answer for Question 301</label>
                            <input type="text" id="answer1" name="answer1"
                                placeholder="Type your answer for Question 1" class="form-control answer-input"
                                value="{{ $jawaban->jawaban_bom1 ?? '0' }}" required autocomplete="off">
                        </div>

                        <div class="mb-4">
                            <p>302. Please answer the question below</p>
                            <img src="{{ asset('soalBom/soalBom (2).jpg') }}" alt="Question Image 2"
                                class="w-100 rounded-lg shadow-md mb-3">
                            <label for="answer2" class="form-label">Your Answer for Question 302</label>
                            <input type="text" id="answer2" name="answer2"
                                placeholder="Type your answer for Question 2" class="form-control answer-input"
                                value="{{ $jawaban->jawaban_bom2 ?? '0' }}" required autocomplete="off">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <a href="{{ route('user.elim_satu') }}" type="button" class="btn btn-secondary"
            style="position:fixed; top:10%; left:8%; z-index:99;">Back</button>
    </body>


    <script>
        var now = new Date().getTime();
        var timer = new Date("July 23, 2024 12:47:00").getTime();

        var countdownTime = timer - now;; // misalnya, 60 detik

        window.onload = function() {
            startCountdown();
        };


        function startCountdown() {
            var countdownInterval = setInterval(function() {
                countdownTime--;
                if (countdownTime <= 0) {
                    clearInterval(countdownInterval);
                    Swal.fire({
                        icon: 'info',
                        title: 'Waktu telah habis !',
                        showConfirmButton: false,
                        timer: 2000
                    });

                    setTimeout(() => {
                        window.location = '/view'
                    }, 2000);
                }
                displayTime();
            }, 1000);
        }

        if (countdownTime <= 0) {
            $(document).ready(function() {
                $('#answer1').prop('disabled', true);
                $('#answer2').prop('disabled', true);
            });
        }
    </script>
@endsection
