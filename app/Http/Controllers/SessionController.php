<?php

namespace App\Http\Controllers;

use App\Mail\PasswordReset;
use Str;
use App\Models\User;
use App\Models\PasswordResetToken;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
                if (auth()->user()->is_admin == 1) {
                    $request->session()->regenerate();
                    return redirect()->intended(route('admin.index'));
                }
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
                $credentials = $request->validate([
                    'namaKelompok' => ['required', 'max:70'],
                    'password' => ['required', 'max:30'],
                ]);

                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();
                    return redirect()->intended(route('user.view'));
                }
            }
        }
        return redirect()->route('session.index')->with('not_validated', "You aren't validated nor registered");
    }

    public function forget()
    {
        return view('sesi.forget', [
            'title' => 'BOM 2024 | Forget Password'
        ]);
    }

    public function forget_act(Request $request)
    {
        $custom_messages = [
            'email' => 'Email tidak valid.',
            'exists' => 'Data tidak tidak terdaftar.'
        ];

        $validate = $request->validate([
            'namaKelompok' => 'required|string|max:255|exists:users',
            'emailPerwakilan' => 'email:dns|required|string|max:255|exists:users'
        ], $custom_messages);


        $token = Str::random(60);

        // Creating token
        PasswordResetToken::updateOrCreate(
            [
                'email' => $request->emailPerwakilan,
            ],
            [
                'email' => $request->emailPerwakilan,
                'token' => $token,
                'created_at' => now(),
            ]
        );

        // Mailing
        Mail::to($request->emailPerwakilan)->send(new PasswordReset($token));

        return back()->with('success', 'Email reset password telah dikirimkan ! Silahkan cek email anda untuk melakukan reset password !');
    }

    public function forget_content($token)
    {
        $validasi_token = PasswordResetToken::where('token', $token)->count();

        // Pengecekan token dalam DB Password_reset_tokens
        if ($validasi_token > 0) {
            return view('sesi.forget_form', [
                'title' => 'BOM 2024 | Form forget password'
            ], compact('token'));
        } else {
            return redirect()->route('session.forget')->with('error', 'Token invalid');
        }
    }

    public function forget_form(Request $request)
    {
        $validasi_token = PasswordResetToken::where('token', $request->token)->first();

        // Pengecekan ulang
        if ($validasi_token) {
            $user = User::where('emailPerwakilan', $validasi_token->email)->first();
            if ($user) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
                $validasi_token->delete();

                return redirect()->route('session.index')->with('success', 'Berhasil melakukan update password !');
            }
        }

        return redirect()->route('session.forget')->with('error', 'Data invalid');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
