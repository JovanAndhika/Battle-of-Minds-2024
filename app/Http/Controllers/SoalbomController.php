<?php

namespace App\Http\Controllers;

use App\Models\Data_bomsoal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SoalbomController extends Controller
{
    //
    public function showSoal()
    {
        return view('user.soal_bom.show_soalbom', [
            'title' => 'BOM 2024 | Bomb Questions',
            'jawaban' => Data_bomsoal::where('kelompok_id', auth()->user()->id)->first(),
        ]);
    }

    public function storeSoal(Request $request)
    {
        $idPeserta = auth()->user()->id;

        $inputJawaban1 = $request->input('answer1');
        $jawabanNomor1 = '$2y$10$QCG9hw6nFsKpHTV70TpV2OoInhqnFEq.ad.D44l9MqmgkZCQVZeiS'; // Jawaban yang benar
        $inputJawaban2 = $request->input('answer2');
        $jawabanNomor2 = '$2y$10$uSKNBp5YtoZgK9NrRUbkuOoFhThXrypLzTKaGGFUaW8C8kXgT3n4q';

        $maxRetries = 3;
        $attempts = 0;

        while ($attempts < $maxRetries) {
            try {
                DB::transaction(function () use ($idPeserta, $inputJawaban1, $inputJawaban2) {
                    Data_bomsoal::updateOrCreate(
                        ['kelompok_id' => $idPeserta],
                        ['jawaban_bom1' => $inputJawaban1, 'jawaban_bom2' => $inputJawaban2]
                    );
                });
                break; // Exit the loop if successful
            } catch (\Exception $e) {
                $attempts++;
                if ($attempts >= $maxRetries) {
                    return response()->json(['error' => 'A deadlock occurred, please try again later.'], 500);
                }
                // Optional: wait a bit before retrying
                usleep(100000); // 100 milliseconds
            }
        }

        $cekUser = Data_bomsoal::where('kelompok_id', $idPeserta)->count();

        $countBenar = 0;

        if (Hash::check($inputJawaban1, $jawabanNomor1)) {
            $countBenar = $countBenar + 1;
        }
        if (Hash::check($inputJawaban2, $jawabanNomor2)) {
            $countBenar = $countBenar + 1;
        }

        $selisihBenar = 2 - $countBenar;

        $poin = $countBenar * 5;
        $salah = $selisihBenar * (-5);

        $total_poin = $poin + $salah;

        if ($cekUser === 1) {
            $maxRetries = 3;
            $attempts = 0;

            while ($attempts < $maxRetries) {
                try {
                    DB::transaction(function () use ($idPeserta, $total_poin) {
                        Data_bomsoal::where('kelompok_id', $idPeserta)->update(['poinBom' => $total_poin]);
                    });
                    break; // Exit the loop if successful
                } catch (\Exception $e) {
                    $attempts++;
                    if ($attempts >= $maxRetries) {
                        return response()->json(['error' => 'A deadlock occurred, please try again later.'], 500);
                    }
                    // Optional: wait a bit before retrying
                    usleep(100000); // 100 milliseconds
                }
            }
        }


        return redirect()->route("user.elim_satu")->with(session()->flash('saveBom', 'Save BOM DOR successfull!'));
    }
}
