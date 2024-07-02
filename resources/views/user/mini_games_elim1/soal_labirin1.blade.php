@extends('layout.mainlayout')

{{-- BOM 2024 | Soal Labirin 1 --}}
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

    .form-control{
        margin-top:10px;
    }

    .form-group{
        margin-bottom:30px;
    }

    .modal {
      display: none;
      width: 600px;
      height: 325px;
      position : fixed;
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
        <h2 style="margin-bottom: 20px;">Welcome to Labirin 1!</h2>
        <p style="text-align: left;">1. Semua jawaban berupa angka.</p>
        <p style="text-align: left;">2. Tombol submit akan mengecek jawaban anda.</p>
        <p style="text-align: left;">3. Jika masih ada jawaban yang salah maka anda akan dikembalikan ke page soal hingga semuanya terjawab benar.</p>
        <button onclick="closeModal()" class="closeBtn">Close</button>
    @endif
</div>

<h2 class="text-center" id='title'>Soal Labirin 1 </h2>
  <div class="w-screen h-screen flex flex-col justify-center items-center">
    <div class="container h-[300px] flex flex-col justify-center items-center">
        <div class="form-box">
        <form  id="formLabirin1" action="/checkAnswer" method="post">
              @csrf
              @php
                $questions = [
                    '637 + 983 + 439 + 199',
                    '543 + 679 + 843 + 486',
                    '514 + 666 + 341 + 287',
                    '103 + 764 + 626 + 647',
                    '269 + 650 + 104 + 3917',
                    '379 + 135 + 313 + 477',
                    '228 + 659 + 892 + 643',
                    '218 + 963 + 964 + 760',
                    '310 + 968 + 313 + 794',
                    '630 + 472 + 765 + 435',
                    '362 + 548 + 270 + 612',
                    '752 + 817 + 479 + 314',
                    '125 + 217 + 635 + 245',
                    '812 + 424 + 420 + 609',
                    '819 + 504 + 513 + 107',
                    '535 + 637 + 853 + 650'
                ];
            @endphp

            @foreach ($questions as $i => $question)
                <div class="form-group">
                    <label for="question_{{ $i }}">{{ $question }}</label>
                    <input 
                        type="number" 
                        class="form-control" 
                        id="question_{{ $i }}" 
                        name="question_{{ $i }}" 
                        placeholder="Answer here" 
                        value="{{ old('question_' . $i) }}"
                    >
                    <!-- @error('question_' . $i)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror -->
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
  };
</script>

@endsection