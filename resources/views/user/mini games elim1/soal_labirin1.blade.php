@extends('layout.mainlayout')

{{-- BOM 2024 | Soal Labirin 1 --}}
@section('title', $title)

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>

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
      width: 50%;
      height: 50%;
      position : sticky;
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

    .incorrect { color: red; }
    .correct { color: green; }
</style>



{{-- content start --}}
<div id="popupModal" class="modal">
    <h2 style="margin-bottom: 20px;">Welcome to Labirin 1!</h2>
    <p style="text-align: left;">1. Semua jawaban berupa angka.</p>
    <p style="text-align: left;">2. Submit button akan aktif ketika semua jawaban yang dimasukkan sudah benar.</p>
    <p style="text-align: left;">3. Apabila jawaban salah, maka jawaban akan hilang dari field input.</p>
    <p style="text-align: left;">4. Sebaliknya, jika benar maka jawaban akan tetap ada di field input.</p>
    <button onclick="closeModal()" class="closeBtn">Close</button>
</div>

<h2 class="text-center" id='title'>Soal Labirin 1 </h2>
  <div class="w-screen h-screen flex flex-col justify-center items-center">
    <div class="container h-[300px] flex flex-col justify-center items-center">
        <div class="form-box">
        <form name="formlabirin1" id="formlabirin1">
              @csrf
                <div class="form-group">
                  <label for="question-1">7027 + 8291 + 6207 + 7626</label>
                  <input type="number" class="form-control" id="question-1" name="question-1" placeholder="Answer here" onkeyup="checkAnswer()">
                </div>
                <div class="form-group">
                  <label for="question-2">9989 + 2373 + 5863 + 8542</label>
                  <input type="number" class="form-control" id="question-2" name="question-2" placeholder="Answer here" onkeyup="checkAnswer()">
                </div>
                <div class="form-group">
                  <label for="question-3">3178 + 5545 + 2667 + 7960</label>
                  <input type="number" class="form-control" id="question-3" name="question-3" placeholder="Answer here" onkeyup="checkAnswer()">
                </div>
                <div class="form-group">
                  <label for="question-4">3812 + 9237 - 1722 + 8901</label>
                  <input type="number" class="form-control" id="question-4" name="question-4" placeholder="Answer here" onkeyup="checkAnswer()">
                </div>
                <div class="form-group">
                  <label for="question-5">8747 + 1492 + 1388 + 5127</label>
                  <input type="number" class="form-control" id="question-5" name="question-5" placeholder="Answer here" onkeyup="checkAnswer()">
                </div>
                <div class="form-group">
                  <label for="question-6">9074 + 6908 + 9851 + 3595</label>
                  <input type="number" class="form-control" id="question-6" name="question-6" placeholder="Answer here" onkeyup="checkAnswer()">
                </div>
                <div class="form-group">
                  <label for="question-7">2856 + 8674 + 9326 + 5026</label>
                  <input type="number" class="form-control" id="question-7" name="question-7" placeholder="Answer here" onkeyup="checkAnswer()">
                </div>
                <div class="form-group">
                  <label for="question-8">6620 + 7514 + 5993 + 1937</label>
                  <input type="number" class="form-control" id="question-8" name="question-8" placeholder="Answer here" onkeyup="checkAnswer()">
                </div>
                <div class="form-group">
                  <label for="question-9">4578 + 7660 + 9780 + 1939</label>
                  <input type="number" class="form-control" id="question-9" name="question-9" placeholder="Answer here" onkeyup="checkAnswer()">
                </div>
                <div class="form-group">
                  <label for="question-10">1096 - 4330 + 8701 + 5481</label>
                  <input type="number" class="form-control" id="question-10" name="question-10" placeholder="Answer here" onkeyup="checkAnswer()">
                </div>
                <div class="form-group">
                  <label for="question-11">3785 + 7378 + 1959 + 9396</label>
                  <input type="number" class="form-control" id="question-11" name="question-11" placeholder="Answer here" onkeyup="checkAnswer()">
                </div>
                <div class="form-group">
                  <label for="question-12">4845 + 1721 + 7525 + 8693</label>
                  <input type="number" class="form-control" id="question-12" name="question-12" placeholder="Answer here" onkeyup="checkAnswer()">
                </div>
                <div class="form-group">
                  <label for="question-13">5350 + 1636 + 2467 + 5902</label>
                  <input type="number" class="form-control" id="question-13" name="question-13" placeholder="Answer here" onkeyup="checkAnswer()">
                </div>
                <div class="form-group">
                  <label for="question-14">3731 + 1670 + 1644 + 6667</label>
                  <input type="number" class="form-control" id="question-14" name="question-14" placeholder="Answer here" onkeyup="checkAnswer()">
                </div>
                <div class="form-group">
                  <label for="question-15">5372 + 3681 - 1839 - 6265</label>
                  <input type="number" class="form-control" id="question-15" name="question-15" placeholder="Answer here" onkeyup="checkAnswer()">
                </div>
                <div class="form-group">
                  <label for="question-16">2060 + 3174 + 7773 + 4004</label>
                  <input type="number" class="form-control" id="question-16" name="question-16" placeholder="Answer here" onkeyup="checkAnswer()">
                </div>

              {{-- submit --}}
              <button type="submit" class="btn btn-primary mb-2" id="submitBtn" disabled="disabled">Submit</button>

              {{-- end form --}}
            </form>
          </div>
    </div>
</div>

<script>
// $(document).ready(function() {
//     var form = document.forms["formlabirin1"].elements;

//     $("formlabirin1").submit(function(event) {
//       event.preventDefault();
//       var submit = $submitBtn
//       for(var i = 0; i < form.length; i++){
//         if(form[i].type() === "number"){
//           var userAnswer = form[i].val();
//         }
//       }

//       $(".form-message").load("/check-answer", {
        
//       })

//     });
//   });
  function checkAnswer() {
    var form = document.forms["formlabirin1"].elements;
    var answers = [];
    for (var i = 0; i < form.length; i++) {
      if (form[i].type === "number") {
        answers.push(form[i].value);
      }
    }
    $.ajax({
      type: "POST",
      url: "/check-answer",
      data: {
        answers: answers,
        _token: $('meta[name="csrf-token"]').attr('content')
      },
      success: function(response) {
        if (response.status === "success") {
          // enable submit button if all answers are correct
          $("#submitBtn").prop("disabled", false);
        } else {
          // show error message if any answer is incorrect
          $(".form-message").html(response.message);
          // clear incorrect answers
          $.each(response.incorrectAnswers, function(index, value) {
            $("#" + value).val("");
          });
        }
      }
    });
  }

  $(document).ready(function(){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  });


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