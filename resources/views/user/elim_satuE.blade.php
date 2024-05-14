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
</style>
@endsection

@section('content')

<body>
    <div class="container">
        <div class="header">
            <h1 class="text-center title mt-5">ASSESSMENT</h1>
        </div>
        <div class="header">
            <h1 class="title mt-5">Welcome {{auth()->user()->namaKelompok}}</h1>
        </div>


        <div class="mx-md-5 form-content mb-5">
            <div id="question-container" class="ms-md-3 question">
                <form method="POST" action="{{ route('user.simpan_jawabanE') }}" id="simpan-jawaban" class="form-simpan-jawaban">
                    @csrf


                    @php
                    $questionNumber = 201;
                    @endphp
                    @foreach ($data_jawaban as $data)
                    @if (($data->kunci_jawabans_id) >= 201 && ($data->kunci_jawabans_id) <= 250) <div id="page-5" class="page">
                        <h1 class="mt-5">Question {{ $questionNumber }}:</h1>
                        <div class="mt-3">
                            <input class="form-control" type="text" name="biggamesanswer{{ $questionNumber }}" id="biggamesanswer{{ $questionNumber }}" value='{{ $data->jawaban_kelompok }}' required>
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
    // Menentukan waktu akhir countdown (dalam detik)

    var countdownTime = 3600; // misalnya, 60 detik
    // Memulai countdown timer saat halaman dimuat
    window.onload = function() {
        startCountdown();
    };

    function startCountdown() {
        // Set interval untuk mengupdate countdown setiap satu detik
        var countdownInterval = setInterval(function() {
            countdownTime--;
            if (countdownTime <= 0) {
                clearInterval(countdownInterval); // Menghentikan countdown saat mencapai 0
                alert("Countdown selesai!");
            }
            displayTime();
        }, 1000);
    }

    function displayTime() {
        // Mengonversi waktu countdown ke format yang sesuai dan menampilkannya
        var hours = Math.floor(countdownTime / 3600);
        var minutes = Math.floor((countdownTime % 3600) / 60);
        var seconds = countdownTime % 60;
        var timerDisplay = document.getElementById("timer");
        timerDisplay.innerHTML = (hours < 10 ? "0" : "") + hours + ":" +
            (minutes < 10 ? "0" : "") + minutes + ":" +
            (seconds < 10 ? "0" : "") + seconds;
    }
</script>
@endsection