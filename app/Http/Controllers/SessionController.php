<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    //LOGIN HANDLER
    public function index()
    {
        return view('sesi/index', ['title' => 'BOM 2024 | LOGIN']);
    }

    public function login(Request $request)
    {
        $nrpPanitia = User::Where('nrp', $request->nrp)->count();
        $passPanitia = DB::table('users')->select('password')->where('nrp', $request->nrp)->value('password');
        $inputPass = $request->password;

        // LOGIN PANITIA
        if ($nrpPanitia == 1 && Hash::check($inputPass, $passPanitia)) {
            $credentials = $request->validate([
                'nrp' => 'required',
                'password' => 'required'
            ]);
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            }
            return back()->with('loginError', 'Login credentials invalid!');
        } else if ($nrpPanitia == 0) {

            return redirect()->intended(route('user.view', ['id' => 1]));
            //LOGIN PESERTA
            $cekUsernameKelompok = Peserta::Where('namaKelompok', $request->nrp)
                ->Where('is_validated', 1)
                ->count();
            $passPeserta = DB::table('pesertas')->select('passPeserta')->where('namaKelompok', $request->nrp)->value('password');
            $inputPass = $request->password;

            if ($cekUsernameKelompok == 1 && Hash::check($inputPass, $passPeserta)) {
                $id = DB::table('pesertas')
                    ->select('id')
                    ->where('namaKelompok', $request->nrp)
                    ->value('id');

                // return redirect()->intended(route('user.view', ['id' => $id]));
            }

            return redirect()->route('session.index')->with('not_validated', "You aren't validated nor registered");
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
