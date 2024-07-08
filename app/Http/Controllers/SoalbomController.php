<?php

namespace App\Http\Controllers;

use App\Models\Data_bomsoal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SoalbomController extends Controller
{
    //
    public function showSoal()
    {
        return view('user.soal_bom.show_soalbom', [
            'title' => 'BOM 2024 | Bomb Questions',
            'jawaban' => Data_bomsoal::where('id', auth()->user()->id)->first(),
        ]);
    }

    public function storeSoal(Request $request)
    {
        $idPeserta = auth()->user()->id;

        $inputJawaban1 = $request->input('answer1');
        $jawabanNomor1 = '$2y$10$fd.aTKQVYGt4qbbfgLB/8exBfsN6w.mEHHNmSE40jNUx5.7sJ/kte'; // Password yang benar (harus dienkripsi dalam aplikasi nyata)

        $inputJawaban2 = $request->input('answer2');
        $jawabanNomor2 = '$2y$10$5vZDRS9fvwPkt/JY6PeKf.DudCN0etGhPcGzIXZsbP4e0zZQNOFR.';

        Data_bomsoal::updateOrCreate(
            ['id' => $idPeserta],
            ['jawaban_bom1' => $inputJawaban1, 'jawaban_bom2' => $inputJawaban2]
        );

        if (Hash::check($inputJawaban1, $jawabanNomor1) || $inputJawaban1 != null) {
            $poinPeserta = User::where('id', $idPeserta)->limit(1)->value('poin');
            $newPoint = $poinPeserta + 5;

            User::where('id', $idPeserta)
                ->limit(1)
                ->update(['poin' => intval($newPoint)]);
        } else if (!Hash::check($inputJawaban1, $jawabanNomor1) || $inputJawaban1 == null){
            $poinPeserta = User::where('id', $idPeserta)->limit(1)->value('poin');
            $newPoint = $poinPeserta - 10;

            User::where('id', $idPeserta)
                ->limit(1)
                ->update(['poin' => intval($newPoint)]);
        }


        if (Hash::check($inputJawaban2, $jawabanNomor2) || $inputJawaban2 != null) {
            $poinPeserta = User::where('id', $idPeserta)->limit(1)->value('poin');
            $newPoint = $poinPeserta + 5;

            User::where('id', $idPeserta)
                ->limit(1)
                ->update(['poin' => intval($newPoint)]);
        } else if(!Hash::check($inputJawaban2, $jawabanNomor2) || $inputJawaban2 == null){
            $poinPeserta = User::where('id', $idPeserta)->limit(1)->value('poin');
            $newPoint = $poinPeserta - 10;

            User::where('id', $idPeserta)
                ->limit(1)
                ->update(['poin' => intval($newPoint)]);
        }

        return response()->json(['bomDone' => true, 'url' => route('user.elim_satu')]);
    }
}
