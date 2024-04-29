<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Data_jawaban;
use Illuminate\Http\Request;
use App\Models\Set_jawaban_status;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    
    // Nanti admin bisa validasi peserta yang mendaftar
    public function peserta()
    {
        return view('admin.listPeserta', [
            'title' => 'BOM 2024 | List Peserta BOM',
            'active' => 'peserta',
            'pesertas' => User::all(),
            'jumlah_peserta' => DB::table('users')
            ->where('is_admin', '==', '0')->count()
        ]);
    }

    public function validasi(Request $request)
    {
        DB::table('pesertas')->where('id', $request->id)
            ->update(['is_validated' => 1]);


        return redirect()->route('admin.index')->with('success', 'Berhasil melakukan validasi !');
    }


    // MENU SET SOAL
    public function adminSelection()
    {
        $pesertas = User::all();
        return view('admin.adminSelectionSelect', [
            'title' => 'Selection',
            'pesertas' => $pesertas,
            'active' => 'peserta',
        ]);
    }


    // SET PAKET A
    public function setReadyA()
    {
        $pesertas = User::all();
        foreach ($pesertas as $p) {


            for ($j = 1; $j <= 50; $j++) {
                Data_jawaban::create([
                    'kelompok_id' => $p->id,
                    'soal_no' => $j,
                    'jawaban' => 'z'
                ]);
            }

            $affected = Set_jawaban_status::create([
                'kelompok_id' => $p->id,
                'status_paket_a' => true
            ]);
        }
        
        return redirect()->route('admin.adminSelection')->with('set_success', 'set is succes');
    }
}
