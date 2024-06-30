<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JawabanLabirin;

class jawabanLabirinController extends Controller
{
    public function checkAnswer(Request $request)
    {
        $answers = $request->input('answers');
        $correctAnswers = JawabanLabirin::where('labirin_1', 1)->first()->labirin_1;
        $correctAnswersArray = explode(',', $correctAnswers);
      
        $errors = [];
        $incorrectAnswers = [];
        foreach ($answers as $key => $answer) {
          if ($answer != $correctAnswersArray[$key]) {
            $errors[] = "Answer for question " . ($key + 1) . " is incorrect";
            $incorrectAnswers[] = "question-" . ($key + 1);
          }
        }
      
        if (count($errors) > 0) {
          return response()->json(['status' => 'error', 'message' => implode('<br>', $errors), 'incorrectAnswers' => $incorrectAnswers]);
        } else {
          return response()->json(['status' => 'success']);
        }
    }
}
