@extends('layout.mainlayout')
@section('head')
<style>
    body {
        background-image: url('asset/bg-bom-main.png');
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

    #question-container {
        display: grid;
        grid-template-columns: auto auto auto;
    }

    .page {
        place-self: center;
    }

    .answer-input {
        border-radius: 5px;
        border: none;
        padding: 0 9px;
        height: 30px;
    }

    .pagination .page-link {
        background-color: #5f48e0;
        border-color: #fff;
    }

    .pagination .page-item.active .page-link {
        background-color: #fff;
        border-color: #fff;
        color: #5f48e0 !important;
    }

    .pagination .page-link:hover {
        background-color: #fff;
        color: #5f48e0;
    }

    .pagination .page-link,
    .pagination .page-item.active .page-link {
        color: #ffffff;
    }


    @media (max-width: 768px) {
        .title {
            font-size: 2rem;
        }
    }

    .checked {
        background-color: lightskyblue !important;
        /* Atur gaya CSS yang sesuai */
        color: white;
    }
</style>
@endsection

@section('content')

<body>

    @if (session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: "{{ session('success') }}",
            text: "{{ session('count') }}"
        });
    </script>
    @endif

    <div class="container">
        <div class="header">
            <h1 class="text-center title my-4">Big Game Elimination 1</h1>
        </div>
        <div class="form-content mb-5">
            @yield('form_soal')


        </div>
    </div>
    <button type="button" onclick="submit_jawaban()" id="btn-save-jawaban" class="btn btn-primary">SAVE</button>
    <a href="{{ route('user.soalBom') }}" type="button" id="btn-soalbom" class="btn btn-warning" hidden>BOM DOR</a>
    <a href="{{ route('user.view') }}" type="button" id="btn-back" class="btn btn-secondary">Back</a>
    <style>
        #btn-back{
            position:fixed;
            z-index: 99;
            top: 10%;
            left: 8%;
        }

        #btn-save-jawaban {
            position: fixed;
            z-index: 99;
            left: 80%;
            top: 90%;
            width: 150px;
        }

        #btn-soalbom {
            position: fixed;
            z-index: 99;
            left: 15%;
            top: 90%;
            width: 150px;
        }

        @media only screen and (max-width: 600px) {
            #btn-save-jawaban {
                position: fixed;
                top: 90%;
                left: 30%;
            }
        }
    </style>
    <div class="page mt-5 d-flex justify-content-center flex-column">
        <div id="timer" class="mb-3 fs-3 d-flex justify-content-center"></div>
        <ul id="pagination" class="pagination d-flex justify-content-center">
            <li class="page-item">
                <a class="page-link" onclick="submit_pagination(1)" id="pagination1">1</a>
            </li>
            <li class="page-item">
                <a class="page-link" onclick="submit_pagination(2)" id="pagination2">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" onclick="submit_pagination(3)" id="pagination3">3</a>
            </li>
            <li class="page-item">
                <a class="page-link" onclick="submit_pagination(4)" id="pagination4">4</a>
            </li>
            <li class="page-item">
                <a class="page-link" onclick="submit_pagination(5)" id="pagination5">5</a>
            </li>
            <li class="page-item">
                <a class="page-link" onclick="submit_pagination(6)" id="pagination6">6</a>
            </li>
        </ul>
    </div>
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
                for (var i = 1; i <= 300; i++) {
                    $('#biggamesanswer' + i).prop('disabled', true);
                }
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


            } else if (countdownTime <= 1800000) {
                $('#btn-soalbom').prop('hidden', false);
            }

            displayTime();
        }, 1000);
    }


    function displayTime() {
        var hours = Math.floor(countdownTime / (1000 * 60 * 60));
        var minutes = Math.floor((countdownTime % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((countdownTime % (1000 * 60)) / 1000);

        // Perbarui countdownTime setelah menghitung kembali jam, menit, dan detik
        countdownTime = hours * (1000 * 60 * 60) + minutes * (1000 * 60) + seconds * 1000;

        var timerDisplay = document.getElementById("timer");
        timerDisplay.innerHTML = (hours < 10 ? "0" : "") + hours + ":" +
            (minutes < 10 ? "0" : "") + minutes + ":" +
            (seconds < 10 ? "0" : "") + seconds;
    }

    function submit_jawaban() {
        document.getElementById('simpan-jawaban').submit();
    }

    function submit_pagination(page_value) {
        var input = document.createElement('Input');
        var simpan_jawaban_form = document.getElementById('simpan-jawaban');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'page');
        input.setAttribute('value', page_value);

        simpan_jawaban_form.appendChild(input);
        simpan_jawaban_form.submit();

    }
</script>
@endsection