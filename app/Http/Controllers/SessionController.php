<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\ValidationException;

use function Laravel\Prompts\error;

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
            ->where('is_validated', 0)
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
                    session(['isAdmin' => true]);
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
                $credentials = $request->validate([
                    'namaKelompok' => ['required', 'max:70'],
                    'password' => ['required', 'max:30'],
                ]);

                if (Auth::attempt($credentials) && auth()->user()->is_validated == 1) {
                    $request->session()->regenerate();
                    session(['isGuest' => true]);


                    // SESI KHUSUS PANITIA BOM
                    $cekKelompokPanit = User::Where('namaKelompok', $request->namaKelompok)
                    ->Where('is_panit', 1)
                    ->count();
                    if ($cekKelompokPanit == 1){
                        session(['isPanit' => true]);
                    }


                    return redirect()->intended(route('index'))->with('login_success', 'Welcome, ' . $request->namaKelompok);
                }
            }
        }
        return redirect()->route('session.index')->with('not_validated', 'Invalid login credentials or maybe you are not validated yet');
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
            'exists' => 'Data tidak terdaftar.'
        ];

        $validate = $request->validate([
            'namaKelompok' => 'required|string|max:255|exists:users',
        ], $custom_messages);

        $checkUser = User::where('namaKelompok', $request->namaKelompok)
                        ->where('emailPerwakilan', $request->emailPerwakilan)
        ->get();
        if ($checkUser->count() <= 0) {
            throw ValidationException::withMessages(['emailPerwakilan' => 'Email tidak valid']);
        }

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
                User::where('emailPerwakilan', $validasi_token->email)->update([
                    'password' => Hash::make($request->password),
                ]);
                $validasi_token->delete();

                return redirect()->route('session.index')->with('success', 'Berhasil melakukan update password !');
            }
        }

        return redirect()->route('session.forget')->with('error', 'Data invalid');
    }

    public function change_pass() {
        return view('sesi.change_pass', [
            'title' => 'Change Password'
        ]);
    }

    public function pass_change(Request $request) {
        $custom_messages = [
            'exists' => 'Data tidak terdaftar.'
        ];

        $validate = $request->validate([
            'namaKelompok' => 'required|string|max:255|exists:users',
        ], $custom_messages);

        $user = User::where('namaKelompok', $request->namaKelompok)->first();

        $passCheck = Hash::check($request->old_pass, $user->password);

        if (!$passCheck) {
            throw ValidationException::withMessages(['old_pass' => 'Password lama masih salah.']);
        }

        User::where('namaKelompok', $request->namaKelompok)->update(['password' => Hash::make($request->new_pass)]);

        return redirect()->route('index')->with('success', 'Berhasil mengupdate password !');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
