<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
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

    public function authenticate(Request $request): RedirectResponse
    {
        $nrpPanitia = User::where('namaKelompok', $request->namaKelompok)
            ->where('is_admin', 1)
            ->count();
        $passPanitia = DB::table('users')->select('password')->where('namaKelompok', $request->namaKelompok)->value('password');
        $inputPass = $request->password;


        // LOGIN PANITIA
        if ($nrpPanitia == 1 && Hash::check($inputPass, $passPanitia)) {
            $credentials = $request->validate([
                'namaKelompok' => ['required', 'max:70'],
                'password' => ['required', 'max:30'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/admin');
            }
            return back()->withErrors([
                'loginError' => 'The provided credentials do not match our records.',
            ])->onlyInput('namaKelompok');
        } else if ($nrpPanitia == 0) {




            //LOGIN PESERTA
            $cekUsernameKelompok = User::Where('namaKelompok', $request->namaKelompok)
                ->Where('is_validated', 1)
                ->count();
            $password = DB::table('users')->select('password')->where('namaKelompok', $request->namaKelompok)->value('password');
            $inputPass = $request->password;

            if ($cekUsernameKelompok == 1 && Hash::check($inputPass, $password)) {
                $id = DB::table('users')
                    ->select('id')
                    ->where('namaKelompok', $request->namaKelompok)
                    ->value('id');

                return redirect()->intended(route('user.view', ['id' => $id]));
            }
        }
        return redirect()->route('session.index')->with('not_validated', "You aren't validated nor registered");
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
