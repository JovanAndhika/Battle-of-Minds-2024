<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Peserta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'pesertas' => Peserta::all()
        ]);
    }

    public function validasi(Request $request)
    {
        DB::table('pesertas')->where('id', $request->id)
            ->update(['is_validated' => 1]);


        return redirect()->route('listPeserta')->with('success', 'Berhasil melakukan validasi !');
    }
}
