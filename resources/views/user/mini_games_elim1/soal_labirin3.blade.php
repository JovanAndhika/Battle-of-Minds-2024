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

    .form-control{
        margin-top:10px;
    }

    .form-group{
        margin-bottom:30px;
    }
</style>



{{-- content start --}}

<h2 class="text-center" id='title'>Soal Labirin 3 </h2>

  <div class="w-screen h-screen flex flex-col justify-center items-center">
    <div class="container h-[300px] flex flex-col justify-center items-center">
        <div class="form-box">
            <form method="post" action="{{ route('user.labirin3_store') }}">
              @csrf
              <div class="form-group">
                <label for="formGroupExampleInput">C(11,5) </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 462 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">√(169) × 7² + 2752 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 3389 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">C(17,13) </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!--2380  -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">C(13,7) + 1716 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!--2351  -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">311 + 1637 - 118 + 15906 + 90 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 17826 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">[C(15,13) ÷ 21]!  </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 120 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">C(13,10) </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 286  -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">√(676) × 3² + 5415 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 5649  -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">√(196) × 9² + 2432 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 3566 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">299 + 2904 + 224 + 76304 + 19 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 79750 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">C(7,0) + C(7,1) + C(7,2) + C(7,3) + C(7,4) + C(7,5) + C(7,6) + C(7,7) </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 128 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">√(484) × 3² + 4814 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 5012 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">838 + 6611 + 320 + 307 × 97 3 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 37548 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">C(12,8) - 1573 ÷ 13 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 374 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput"> √(324) × 5² + 5321</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 5771 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">180 + 5163 + 726 + 70759 + 93 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 76921 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">C(9,4) </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 126 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">√(676) × 5² + 4927 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 5577 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">688 + 8207 + 135 + 86863 + 45 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 95938 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput"> 476 + 7868 + 764 + 76614 + 74</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 85796 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">√(484) × 4² + 3263 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 3615 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">527 + 1125 + 691 + 75686 + 49 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 78078 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">√(484) × 4² + 5512 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 5864 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">√(676) × 6² + 5304 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 6240 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">568 + 8376 + 667 + 97646 + 27 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 107284 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">169 + 4388 + 159 + 93988 + 18  </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 98722 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">√(169) × 6² + 1929</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 2397 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">389 + 6710 + 410 + 46757 + 14 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 54280 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">290 + 6095 + 357 + 60584 + 44</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 67370 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">C(9,0) + C(9,1) + C(9,2) + C(9,3) + C(9,4)
                  + C(9,5) + C(9,6) + C(9,7) + C(9,8) + C(9,9) </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 512 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput"> C(21,17) </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 5985 -->
              </div>

              {{-- submit --}}
              <button type="submit" class="btn btn-primary mb-2">Submit</button>

              {{-- end form --}}
            </form>
          </div>
    </div>
</div>

@endsection