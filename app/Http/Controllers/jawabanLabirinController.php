<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Models\JawabanLabirin;
use Carbon\Carbon;

class jawabanLabirinController extends Controller
{
    public function checkAnswer(Request $request)
    {
        $count = 0;
        $correctAnswers = JawabanLabirin::all();
        $allInput = $request->except('_token');

        // dd($allInput);

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
        $kelompokId = auth()->user()->id;

        $namaKelompok = User::where('id', $kelompokId)->value('namaKelompok');
        $status = Status::where('kelompok', $namaKelompok)->first();
        if (is_null($status)) {
            // Jika status tidak ditemukan, buat entri baru
            $status = new Status();
            $status->kelompok = $namaKelompok;
        }

        $status->labirin_1 = Carbon::now();
        $status->save();

        return redirect()->intended('/game_elim1');
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
        $kelompokId = auth()->user()->id;
        // $namaKelompok = User::select('namaKelompok')->where('id',$kelompokId)->first()->value('namaKelompok');
        $namaKelompok = User::where('id', $kelompokId)->value('namaKelompok');
        $status = Status::where('kelompok', $namaKelompok)->first();
        if (is_null($status)) {
            // Jika status tidak ditemukan, buat entri baru
            $status = new Status();
            $status->kelompok = $namaKelompok;
        }

        // $status->kelompok = request(['nama']);
        $status->labirin_2 = Carbon::now();
        $status->save();

        return redirect()->intended('/game_elim1');
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
        $kelompokId = auth()->user()->id;
        // $namaKelompok = User::select('namaKelompok')->where('id',$kelompokId)->first()->value('namaKelompok');
        $namaKelompok = User::where('id', $kelompokId)->value('namaKelompok');
        $status = Status::where('kelompok', $namaKelompok)->first();
        if (is_null($status)) {
            // Jika status tidak ditemukan, buat entri baru
            $status = new Status();
            $status->kelompok = $namaKelompok;
        }

        // $status->kelompok = request(['nama']);
        $status->labirin_3 = Carbon::now();
        $status->save();

        return redirect()->intended('/game_elim1');
    }
}
