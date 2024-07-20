@extends('layout.mainlayout')

{{-- BOM 2024 | Soal Labirin 3 --}}
@section('title', $title)

@section('content')
{{-- style --}}
<style>
    body {
        color: white;
        overflow-x: hidden;
        min-width: 100vw;
        min-height: 100vh;
        background-image: url('asset/bg-bom-main.png');
        background-size: cover;
        background-position: center 30%;
        margin: 0;
        padding: 0;
    }


    .card {
        background: linear-gradient(125deg, rgba(61, 37, 84, 1) 0%, rgba(123, 48, 176, 1) 51%, rgba(120, 27, 55, 1) 100%);
        animation: moveGradient 10s linear infinite;
        box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1);
        -webkit-box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1);
        -moz-box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1);
        background-size: 400%;

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
        font-weight: bold;
        font-size: 3rem;
        margin-top: 30px;
        margin-bottom: 30px;
        letter-spacing: 0.3rem;
        text-shadow:
            0 0 4px #fff,
            0 0 10px #fff,
            0 0 38px #8048e0,
            0 0 73px #5f48e0;
    }

    .container {
        background-color: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(20px);
        border-radius: 5px;
        width: 70%;
        margin: 0 auto;
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

    .form-control {
        margin-top: 10px;
    }

    .form-group {
        margin-bottom: 30px;
    }

    .modal {
        display: none;
        width: 600px;
        height: 325px;
        position: fixed;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        background: linear-gradient(125deg, rgba(61, 37, 84, 1) 0%, rgba(123, 48, 176, 1) 51%, rgba(120, 27, 55, 1) 100%);
        animation: moveGradient 10s linear infinite;
        box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1);
        -webkit-box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1);
        -moz-box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1);
        background-size: 400%;
        padding: 20px;
        text-align: center;
    }

    .closeBtn {
        padding: 10px 20px;
        background-color: rgba(255, 255, 255, 0.6);
        justify-content: center;
    }

    #btn-back {
        position: fixed;
        z-index: 99;
        top: 10%;
        left: 8%;
    }
</style>



{{-- content start --}}
<div id="popupModal" class="modal">
    @if ($errors->any())
    <h2 style="margin-bottom: 20px; color: red;">Semangat!</h2>
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <h3>{{ $error }}</h3>
            @endforeach
        </ul>
    </div>
    <button onclick="closeModal()" class="closeBtn">Close</button>
    @else
    <h2 style="margin-bottom: 20px;">Welcome to Labirin 3!</h2>
    <p style="text-align: left;">1. Semua jawaban berupa angka.</p>
    <p style="text-align: left;">2. Tombol submit akan mengecek jawaban anda.</p>
    <p style="text-align: left;">3. Jika masih ada jawaban yang salah maka anda akan dikembalikan ke page soal hingga semuanya terjawab benar.</p>
    <button onclick="closeModal()" class="closeBtn">Close</button>
    @endif
</div>

<a href="{{ route('user.game_elim1') }}" type="button" id="btn-back" class="btn btn-secondary">Back</a>

<h2 class="text-center" id='title'>Soal Labirin 3 </h2>

<div class="w-screen h-screen flex flex-col justify-center items-center">
    <div class="container h-[300px] flex flex-col justify-center items-center">
        <div class="form-box">
            <form method="post" action="/checkAnswer3">
                @csrf
                @php
                $questions = [
                'C(9,0) + C(9,1) + C(9,2) + C(9,3) + C(9,4) + C(9,5) + C(9,6) + C(9,7) + C(9,8) + C(9,9)',
                '[C(15,13) ÷ 21]!',
                '√(484) × 42 + 6643',
                'C(13,8) - 1573 ÷ 13',
                '√(169) × 62 + 4322',
                'C(12,5)',
                'C(16,13)',
                'C(13,4)',
                '√(324) × 52 + 3187',
                '√(484) × 32 + 3026',
                '√(676) × 52 + 6606',
                '√(169) × 72 + 3140',
                'C(11,7)',
                '√(676) × 62 + 3959',
                'C(7,0) + C(7,1) + C(7,2) + C(7,3) + C(7,4) + C(7,5) + C(7,6) + C(7,7)'
                ];
                @endphp

                @foreach ($questions as $i => $question)
                <div class="form-group">
                    <label for="question_{{ $i }}">{{ $question }}</label>
                    <input type="text" class="form-control" id="question_{{ $i  }}" name="question_{{ $i }}" placeholder="Answer here" value="{{ old('question_' . ($i)) }}">
                    <!-- Include any validation errors here if needed -->
                    <!-- {{-- @error('question' . ($i + 1))
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror --}} -->
                </div>
                @endforeach

                {{-- submit --}}
                <button type="submit" class="btn btn-primary mb-2">Submit</button>

                {{-- end form --}}
            </form>
        </div>
    </div>
</div>

<script>
    function displayModal() {
        var modal = document.getElementById('popupModal');
        modal.style.display = 'block';
    }

    function closeModal() {
        var modal = document.getElementById('popupModal');
        modal.style.display = 'none';
    }

    window.onload = function() {
        displayModal();
        startCountdown();
    };
</script>

@include('user.mini_games_elim1.timer_minigames')
@endsection