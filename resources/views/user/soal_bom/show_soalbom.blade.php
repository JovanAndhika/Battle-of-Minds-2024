@extends('layout.mainlayout')
@section('head')
<style>
    body {
        background-image: url('{{ asset("asset/bg-bom-main.png") }}');
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

    .answer-input {
        border-radius: 5px;
        border: none;
        padding: 0 9px;
        height: 30px;
    }

    img{
        height: 200px;
    }
</style>
@endsection

@section('content')

<body>
    <div class="container">
        <div class="header text-center my-4">
            <h1 class="title">Bomb Game</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 form-content">
                <form id="soalBom" method="post">
                    @csrf
                    <div class="mb-4">
                        <img src="{{ asset('soalBom/soalBom (1).jpg') }}" alt="Question Image 1" class="w-100 rounded-lg shadow-md mb-3">
                        <label for="answer1" class="form-label">Your Answer for Question 1</label>
                        <input type="text" id="answer1" name="answer1" placeholder="Type your answer for Question 1" class="form-control answer-input" value="{{ $jawaban->jawaban_bom1 }}" required>
                    </div>

                    <div class="mb-4">
                        <img src="{{ asset('soalBom/soalBom (2).jpg') }}" alt="Question Image 2" class="w-100 rounded-lg shadow-md mb-3">
                        <label for="answer2" class="form-label">Your Answer for Question 2</label>
                        <input type="text" id="answer2" name="answer2" placeholder="Type your answer for Question 2" class="form-control answer-input" value="{{ $jawaban->jawaban_bom2 }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>


<script>
    $(document).ready(function() {
        $('#soalBom').on('submit', function(event) {
            event.preventDefault();

            var inputJawaban1 = $('#answer1').val();
            var inputJawaban2 = $('#answer2').val();

            $.ajax({
                type: 'POST',
                url: '{{ route("user.soalBomStore") }}',
                data: {
                    answer1: inputJawaban1,
                    answer2: inputJawaban2,
                    _token: '{{ csrf_token() }}' // Token CSRF untuk keamanan Laravel
                },
                success: function(response) {
                    if (response.bomDone) {
                        Swal.fire({
                                title: 'Success',
                                text: 'Answer is saved',
                                icon: 'success'
                            })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = response.url; // Redirect ke URL yang dikirim dari backend
                                }
                            });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred. Please try again.',
                        icon: 'error'
                    });
                }
            });
        });
    });



    var now = new Date().getTime();
    var timer = new Date("July 9, 2024 12:15:00").getTime();

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