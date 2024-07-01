@extends('layout.mainlayout')

{{-- BOM 2024 | Soal Labirin 2 --}}
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
</style>



{{-- content start --}}

<h2 class="text-center" id='title'>Soal Labirin 2 </h2>

  <div class="w-screen h-screen flex flex-col justify-center items-center">
    <div class="container h-[300px] flex flex-col justify-center items-center">
        <div class="form-box">
            <form method="post" action="{{ route('user.labirin2_store') }}">
            @csrf
              <div class="form-group">
                <label for="question1">331 × 60 + 1527 </label>
                <input type="text" class="form-control" id="question1" placeholder="Answer here">
                <!-- 21387 -->
              </div>
              <div class="form-group">
                <label for="question2">132 × 44 + 1850 </label>
                <input type="text" class="form-control" id="question2" placeholder="Answer here">
                <!-- 7658 -->
              </div>
              <div class="form-group">
                <label for="question3">1651 + 240 - 615 + 14312 </label>
                <input type="text" class="form-control" id="question3" placeholder="Answer here">
                <!-- 15588 -->
              </div>
              <div class="form-group">
                <label for="question4">354 × 61 + 2681 </label>
                <input type="text" class="form-control" id="question4" placeholder="Answer here">
                <!-- 24275 -->
              </div>
              <div class="form-group">
                <label for="question5">(88 - 69) × 89 </label>
                <input type="text" class="form-control" id="question5" placeholder="Answer here">
                <!-- 1691 -->
              </div>
              <div class="form-group">
                <label for="question6">1999 + 70 × 42 ÷ 15 </label>
                <input type="text" class="form-control" id="question6" placeholder="Answer here">
                <!-- 2195 -->
              </div>
              <div class="form-group">
                <label for="question7">3647 + 763 + 930 + 18614 </label>
                <input type="text" class="form-control" id="question7" placeholder="Answer here">
                <!-- 23954 -->
              </div>
              <div class="form-group">
                <label for="question8">1117 + 25 × 357 ÷ 17 </label>
                <input type="text" class="form-control" id="question8" placeholder="Answer here">
                <!-- 1642 -->
              </div>
              <div class="form-group">
                <label for="question9">1318 + 327 + 200 + 44384 </label>
                <input type="text" class="form-control" id="question9" placeholder="Answer here">
                <!-- 46229 -->
              </div>
              <div class="form-group">
                <label for="question10">386 × 47 + 4392 </label>
                <input type="text" class="form-control" id="question10" placeholder="Answer here">
                <!-- 22534 -->
              </div>
              <div class="form-group">
                <label for="question11">315 × 56 + 1218 </label>
                <input type="text" class="form-control" id="question11" placeholder="Answer here">
                <!-- 18858 -->
              </div>
              <div class="form-group">
                <label for="question12">-509 + 91 × 70 </label>
                <input type="text" class="form-control" id="question12" placeholder="Answer here">
                <!-- 5861 -->
              </div>
              <div class="form-group">
                <label for="question13">5462 + 41 × 65 ÷ 13 </label>
                <input type="text" class="form-control" id="question13" placeholder="Answer here">
                <!-- 5667 -->
              </div>
              <div class="form-group">
                <label for="question14">2672 + 428 + 945 + 48974 </label>
                <input type="text" class="form-control" id="question14" placeholder="Answer here">
                <!-- 53019 -->
              </div>
              <div class="form-group">
                <label for="question15">223 + 14 × 93 </label>
                <input type="text" class="form-control" id="question15" placeholder="Answer here">
                <!-- 1525 -->
              </div>
              <div class="form-group">
                <label for="question16">110 × 59 - 2425 </label>
                <input type="text" class="form-control" id="question16" placeholder="Answer here">
                <!-- 4065 -->
              </div>
              <div class="form-group">
                <label for="question17">2203 - 78 × 15 ÷ 18 </label>
                <input type="text" class="form-control" id="question17" placeholder="Answer here">
                <!-- 2138 -->
              </div>
              <div class="form-group">
                <label for="question18">2344 + 201 + 671 + 14739 </label>
                <input type="text" class="form-control" id="question18" placeholder="Answer here">
                <!-- 17955 -->
              </div>
              <div class="form-group">
                <label for="question19">(97 - 38) × 56 </label>
                <input type="text" class="form-control" id="question19" placeholder="Answer here">
                <!-- 3304 -->
              </div>
              <div class="form-group">
                <label for="question20">973 + 76 × 27 </label>
                <input type="text" class="form-control" id="question20" placeholder="Answer here">
                <!-- 3025 -->
              </div>
              <div class="form-group">
                <label for="question21">4883 + 81 × 32 ÷ 12 </label>
                <input type="text" class="form-control" id="question21" placeholder="Answer here">
                <!-- 5099 -->
              </div>
              <div class="form-group">
                <label for="question22">5652 + 24 × 31 ÷ 12 </label>
                <input type="text" class="form-control" id="question22" placeholder="Answer here">
                <!-- 5714 -->
              </div>

              {{-- submit --}}
              <button type="submit" id="submitButton" class="btn btn-primary mb-2">Submit</button>

              {{-- end form --}}
            </form>
          </div>
    </div>
</div>

@endsection