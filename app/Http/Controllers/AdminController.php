<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Data_jawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //INDEX
    public function adminIndex()
    {

        return view('admin.homepage', [
            'title' => 'BOM 2024 | PETRA CHRISTIAN UNIVERSITY',
            'active' => 'home'
        ]);
    }


    // Nanti admin bisa validasi peserta yang mendaftar
    public function peserta()
    {
        return view('admin.listPeserta', [
            'title' => 'BOM 2024 | List Peserta BOM',
            'active' => 'peserta',
            'pesertas' => Peserta::all(),
            'jumlah_peserta' => DB::table('pesertas')->count()
        ]);
    }

    public function validasi(Request $request)
    {
        DB::table('pesertas')->where('id', $request->id)
            ->update(['is_validated' => 1]);


        return redirect()->route('admin.index')->with('success', 'Berhasil melakukan validasi !');
    }


    // Nanti admin bisa validasi peserta yang mendaftar
    public function adminSelection()
    {
        $pesertas = Peserta::all();
        return view('admin.adminEliminationSelect', [
            'title' => 'Selection',
            'pesertas' => $pesertas,
            'active' => 'peserta',
        ]);
    }


    public function setReadyA()
    {
        $pesertas = Peserta::all();
        foreach ($pesertas as $p) {


            for ($j = 1; $j <= 50; $j++) {
                Data_jawaban::create([
                    'kelompok_id' => $p->id,
                    'soal_no' => $j,
                    'jawaban' => 'z'
                ]);
            }

            $affected = DB::table('set_jawabans_status')
                ->where('kelompok_id', $p->id)
                ->update(['status_paket_a' => true]);
        }


        return redirect()->route('adminSelection')->with('set_success', 'set is succes');
    }
}
