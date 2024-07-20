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

        for ($i = 0; $i < 15; $i++) {
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
        } else {
            $kelompokId = auth()->user()->id;
            $data_user = User::select('id', 'namaKelompok', 'asalSekolah')->where('id', $kelompokId)->first();
            $namaKelompok = $data_user->namaKelompok;
            $status = Status::where('kelompok_id', $kelompokId)->where('namaKelompok', $namaKelompok)->first();
            if (is_null($status)) {
                // Jika status tidak ditemukan, buat entri baru
                $status = new Status();
                $status->kelompok_id = $data_user->id;
                $status->namaKelompok = $data_user->namaKelompok;
                $status->asalSekolah = $data_user->asalSekolah;
            }

            $status->labirin_1 = Carbon::now();

            if ($status->labirin_1 != NULL && $status->labirin_2 != NULL && $status->labirin_3 != NULL) {
                $status->is_completed = Carbon::now();
            }

            $status->save();

            return redirect()->intended('/game_elim1');
        }
    }

    public function checkAnswer2(Request $request)
    {
        $count = 0;
        $correctAnswers = JawabanLabirin::all();
        $allInput = $request->except('_token');

        for ($i = 0; $i < 15; $i++) {
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
        } else {
            $kelompokId = auth()->user()->id;
            $data_user = User::select('id', 'namaKelompok', 'asalSekolah')->where('id', $kelompokId)->first();
            $namaKelompok = $data_user->namaKelompok;
            $status = Status::where('kelompok_id', $kelompokId)->where('namaKelompok', $namaKelompok)->first();
            if (is_null($status)) {
                // Jika status tidak ditemukan, buat entri baru
                $status = new Status();
                $status->kelompok_id = $data_user->id;
                $status->namaKelompok = $data_user->namaKelompok;
                $status->asalSekolah = $data_user->asalSekolah;
            }

            $status->labirin_2 = Carbon::now();

            if ($status->labirin_1 != NULL && $status->labirin_2 != NULL && $status->labirin_3 != NULL) {
                $status->is_completed = Carbon::now();
            }

            $status->save();

            return redirect()->intended('/game_elim1');
        }
    }

    public function checkAnswer3(Request $request)
    {
        $count = 0;
        $correctAnswers = JawabanLabirin::all();
        $allInput = $request->except('_token');

        for ($i = 0; $i < 15; $i++) {
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
        } else {
            $kelompokId = auth()->user()->id;
            $data_user = User::select('id', 'namaKelompok', 'asalSekolah')->where('id', $kelompokId)->first();
            $namaKelompok = $data_user->namaKelompok;
            $status = Status::where('kelompok_id', $kelompokId)->where('namaKelompok', $namaKelompok)->first();
            if (is_null($status)) {
                // Jika status tidak ditemukan, buat entri baru
                $status = new Status();
                $status->kelompok_id = $data_user->id;
                $status->namaKelompok = $data_user->namaKelompok;
                $status->asalSekolah = $data_user->asalSekolah;
            }

            // $status->kelompok = request(['nama']);
            $status->labirin_3 = Carbon::now();

            if ($status->labirin_1 != NULL && $status->labirin_2 != NULL && $status->labirin_3 != NULL) {
                $status->is_completed = Carbon::now();
            }

            $status->save();

            return redirect()->intended('/game_elim1');
        }
    }
}
