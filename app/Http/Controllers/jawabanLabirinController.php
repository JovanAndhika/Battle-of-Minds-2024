<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JawabanLabirin;
use Symfony\Component\Console\Input\Input;

class jawabanLabirinController extends Controller
{
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

        public function checkAnswer2(Request $request)
        {
            $count = 0;
            $correctAnswers = JawabanLabirin::all();
            $allInput = $request->except('_token');

            for ($i = 0; $i < 22; $i++) {
                $input = $request->input('question_' . $i);

                if (is_null($input) || $input === '') {
                    $count++;
                } else {
                    $input = (int) $input;
                    if ($input !== ($correctAnswers[$i]->labirin_2)) {
                        $count++;
                    }
                }
            } 

            if ($count > 0) {
                return redirect()->back()->withInput($allInput)->withErrors(['errors' => 'Masih ada jawaban yang Salah atau Kosong.']);
            }
            return redirect('/game_elim1');
        }

        public function checkAnswer3(Request $request)
        {
            $count = 0;
            $correctAnswers = JawabanLabirin::all();
            $allInput = $request->except('_token');

            for ($i = 0; $i < 31; $i++) {
                $input = $request->input('question_' . $i);

                if (is_null($input) || $input === '') {
                    $count++;
                } else {
                    $input = (int) $input;
                    if ($input !== ($correctAnswers[$i]->labirin_3)) {
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
