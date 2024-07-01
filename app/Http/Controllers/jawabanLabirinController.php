<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JawabanLabirin;
use Symfony\Component\Console\Input\Input;

class jawabanLabirinController extends Controller
{
        //cek labirin 1
        // public function checkAnswer(Request $request)
        // {
        //     $count = 0;
        //     $correctAnswers = JawabanLabirin::all();
        //     $allInput = $request->except('_token');
        //     // dd($allInput);
        //     for($i= 0; $i < 16; $i++){
        //         $input = (int)$request -> input('question_'.$i);
        //         if($input != ($correctAnswers[$i]->labirin_1) && is_null($input)){
        //             $count++;
        //         }
        //     }
        //     dd($count);
            
        //     if ($count==0) {
        //         return redirect('/game_elim1');
        //     } else {
        //         return redirect()->back()->withInput($allInput);
        //     }
        // }

        public function checkAnswer(Request $request)
        {
            $count = 0;
            $correctAnswers = JawabanLabirin::all();
            $allInput = $request->except('_token');

            for ($i = 0; $i < 16; $i++) {
                $input = $request->input('question_' . $i);

                if (is_null($input) || $input === '') {
                    $count++;
                } else {
                    $input = (int) $input;
                    if ($input !== ($correctAnswers[$i]->labirin_1)) {
                        $count++;
                    }
                }
            } 

            if ($count > 0) {
                return redirect()->back()->withInput($allInput)->withErrors(['errors' => 'Masih ada jawaban yang Salah atau Kosong.']);
            }
            return redirect('/game_elim1');
        }

}
