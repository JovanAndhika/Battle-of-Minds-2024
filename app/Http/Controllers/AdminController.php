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
            ->where('is_admin', '==', '0')->count(),
        ]);
    }

    public function validasi(Request $request)
    {
        DB::table('users')->where('id', $request->id)
            ->update(['is_validated' => 1]);


        return redirect()->route('admin.index')->with('success', 'Berhasil melakukan validasi !');
    }


    // MENU SET SOAL
    public function adminSelection()
    {
        $pesertas = User::all();
        $selectionStatus = Set_jawaban_status::all();
        return view('admin.adminSelectionSelect', [
            'title' => 'Selection',
            'pesertas' => $pesertas,
            'active' => 'peserta',
            'selectionStatus' => $selectionStatus,
        ]);
    }


    // SET PAKET A
    public function setReadyA()
    {
        $pesertas = DB::table('users')->where('is_validated', 1)
        ->where('is_admin', 0)
        ->get();

        foreach ($pesertas as $p) {
            for ($j = 1; $j <= 300; $j++) {
                Data_jawaban::create([
                    'kelompok_id' => $p->id,
                    'soal_no' => $j,
                    'jawaban' => 'z'
                ]);
            }

            $affected = Set_jawaban_status::create([
                'status_paket_a' => true
            ]);
        }
        
        return redirect()->route('admin.adminSelection')->with('set_success', 'set is succes');
    }
}
