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
        -moz-box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1); */
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

<h2 class="text-center" id='title'>Soal Labirin 1 </h2>

  <div class="w-screen h-screen flex flex-col justify-center items-center">
    <div class="container h-[300px] flex flex-col justify-center items-center">
        <div class="form-box">
            <form>
              <div class="form-group">
                <label for="formGroupExampleInput">7027 + 8291 + 6207 + 7626 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here" inputmode="numeric" pattern="[0-9]*">
                <!-- 29151 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">9989 + 2373 + 5863 + 8542 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 26767 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">3178 + 5545 + 2667 + 7960 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 19350 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">3812 + 9237 - 1722 + 8901 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 20228 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">8747 + 1492 + 1388 + 5127 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 16754 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">9074 + 6908 + 9851 + 3595 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!--29428  -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">2856 + 8674 + 9326 + 5026 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!--25882  -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">6620 + 7514 + 5993 + 1937 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!--22064  -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">4578 + 7660 + 9780 + 1939 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 23957 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">1096 - 4330 + 8701 + 5481 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!--10948  -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">3785 + 7378 + 1959 + 9396 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!--22518  -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">4845 + 1721 + 7525 + 8693 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 22784 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">5350 + 1636 + 2467 + 5902 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 15355 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">3731 + 1670 + 1644 + 6667 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 13712 -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">5372 + 3681 - 1839 - 6265 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!--949  -->
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">2060 + 3174 + 7773 + 4004 </label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Answer here">
                <!-- 17011 -->
              </div>

              {{-- submit --}}
              <button type="submit" class="btn btn-primary mb-2">Submit</button>

              {{-- end form --}}
            </form>
          </div>
    </div>
</div>

@endsection