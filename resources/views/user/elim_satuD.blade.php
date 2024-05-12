@extends('layout.mainlayout')
@section('head')
<style>
    body {
        background: linear-gradient(180deg, rgb(26, 0, 36) 0%, rgb(63, 9, 121) 5%, rgb(96, 10, 255) 10%);
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
        border: 4px solid white;
        padding: 30px;
        box-shadow: 2px 10px 10px 2px #ffffff;
    }

    /* PAGINATION */
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
        background-color: green !important; /* Atur gaya CSS yang sesuai */
        color: white;
    }
</style>
@endsection

@section('content')

<body>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            for (var angka = 151; angka <= 200; angka++) {
                cekNilai(angka);
            }
        });
    
        function cekNilai(questionNumber) {
            var inputName = 'biggamesanswer' + questionNumber;
            var nilai = document.getElementById(inputName).value;
            var inputElement = document.getElementById(inputName);
    
            if (nilai === null || nilai === '') {
                inputElement.classList.remove('checked');
            } else {
                inputElement.classList.add('checked');
            }
        }
    </script>
    <div class="container">
        <div class="header">
            <h1 class="text-center title mt-5">ASSESSMENT</h1>
        </div>
        <div class="header">
            <h1 class="title mt-5">Welcome {{auth()->user()->namaKelompok}}</h1>
        </div>


        <div class="mx-md-5 form-content mb-5">
            <div id="question-container" class="ms-md-3 question">
                <form method="POST" action="{{ route('user.simpan_jawabanD') }}" id="simpan-jawaban" class="form-simpan-jawaban">
                    @csrf


                    @php
                    $questionNumber = 151;
                    @endphp
                    @foreach ($data_jawaban as $data)
                    @if (($data->kunci_jawabans_id) >= 151 && ($data->kunci_jawabans_id) <= 200) <div id="page-4" class="page">
                        <h1 class="mt-5">Question {{ $questionNumber }}:</h1>
                        <div class="mt-3">
                            <input class="form-control" type="text" name="biggamesanswer{{ $questionNumber }}" id="biggamesanswer{{ $questionNumber }}" value='{{ $data->jawaban_kelompok }}'>
                        </div>
                        @php
                        $questionNumber++;
                        @endphp
                        @endif
                        @endforeach


                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" id="btn-save-jawaban" class="btn btn-primary">SAVE</button>
                        </div>
                </form>
            </div>
        </div>
    </div>




    <style>
        #btn-save-jawaban {
            position: fixed;
            z-index: 99;
            left: 80%;
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
                <a class="page-link" href="{{ route('user.elim_satu') }}" id="pagination1">1</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="{{ route('user.elim_satuB') }}" id="pagination2">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="{{ route('user.elim_satuC') }}" id="pagination3">3</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="{{ route('user.elim_satuD') }}" id="pagination4">4</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="{{ route('user.elim_satuE') }}" id="pagination5">5</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="{{ route('user.elim_satuF') }}" id="pagination6">6</a>
            </li>
        </ul>
    </div>
    </div>
    </div>
</body>
<!-- Skrip blade untuk menyertakan data PHP -->


<!-- Skrip jQuery untuk mengakses data -->





<!-- Countdown -->
<script>
    var now = new Date().getTime();
    var timer = new Date("May 12, 2024 18:30:00").getTime();

    var countdownTime = timer - now;; // misalnya, 60 detik

    window.onload = function() {
        startCountdown();
    };

    function startCountdown() {
        var countdownInterval = setInterval(function() {
            countdownTime--;
            if (countdownTime <= 0) {
                clearInterval(countdownInterval);
                alert("Countdown selesai!");
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
</script>
@endsection