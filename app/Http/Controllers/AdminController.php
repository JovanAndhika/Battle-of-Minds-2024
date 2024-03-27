<?php

namespace App\Http\Controllers;

use App\Models\Data_jawaban;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //INDEX
    public function adminIndex(){
        
        return view('admin.adminMainPage', ['title' => 'BOM 2024 | PETRA CHRISTIAN UNIVERSITY']);
    }

    // Nanti admin bisa validasi peserta yang mendaftar
    public function adminSelection(){
        $pesertas = Peserta::all();
        return view('admin.adminEliminationSelect', ['title' => 'Selection', 'pesertas' => $pesertas]);
    }

    public function setReady(Peserta $peserta){
        $jumlahPeserta = DB::table('pesertas')->count();
        for($i = 1; $i <= $jumlahPeserta; $i++){
            Data_jawaban::create([
                'kelompok_id' => $peserta->id,
                'soal_no' => '1',
                'jawaban' => 'z'
            ]);

            Data_jawaban::create([
                'kelompok_id' => $peserta->id,
                'soal_no' => '2',
                'jawaban' => 'z'
            ]); 

            Data_jawaban::create([
                'kelompok_id' => $peserta->id,
                'soal_no' => '3',
                'jawaban' => 'z'
            ]);

            Data_jawaban::create([
                'kelompok_id' => $peserta->id,
                'soal_no' => '4',
                'jawaban' => 'z'
            ]);

            Data_jawaban::create([
                'kelompok_id' => $peserta->id,
                'soal_no' => '5',
                'jawaban' => 'z'
            ]);


            Data_jawaban::create([
                'kelompok_id' => $peserta->id,
                'soal_no' => '6',
                'jawaban' => 'z'
            ]);
        }
        return redirect()->route('adminSelection')->with('set_success', 'set is succes');
    }
}

?>