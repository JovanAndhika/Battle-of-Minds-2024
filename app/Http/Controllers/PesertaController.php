<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PesertaController extends Controller
{
    //INDEX
    public function index()
    {

        return view('homepage', ['title' => 'BOM 2024 | PETRA CHRISTIAN UNIVERSITY']);
    }

    //INDEX
    public function buram()
    {

        return view('buram', ['title' => 'BOM 2024 | PETRA CHRISTIAN UNIVERSITY']);
    }

    // REGISTRATION HANDLER
    public function registration()
    {

        return view('registration', ['title' => 'BOM 2024 | REGISTRATION']);
    }

    public function storeRegistration(Request $request)
    {

        // Validasi input
        $validatedData = $request->validate([
            'asalSekolah' => 'required|string|max:120',
            'namaKelompok' => 'required|string|max:30',
            'confirmPass' => 'required|string|min:8|max:20',
            'buktiTransaksi' => 'image|mimes:jpg,png|max:10000',

            'kontakPerwakilan' => 'required|string|max:50',
            'namaSatu' => 'required|string|max:70',
            'emailSatu' => 'required|email:dns|max:70',
            'angkatanSatu' => 'required|string|max:15',
            'jenisKonsumsiSatu' => 'required|string|in:normal,vege,vegan|max:15',
            'alergiSatu' => 'required|string|max:100',

            'namaDua' => 'required|string|max:70',
            'angkatanDua' => 'required|string|max:15',
            'jenisKonsumsiDua' => 'required|string|in:normal,vege,vegan|max:15',
            'alergiDua' => 'required|string|max:100',

            'namaTiga' => 'required|string|max:70',
            'angkatanTiga' => 'required|string|max:15',
            'jenisKonsumsiTiga' => 'required|string|in:normal,vege,vegan|max:15',
            'alergiTiga' => 'required|string|max:100',

            'kartuPelajar' => 'file|mimes:pdf|max:10000',
        ]);


        $validatedData['confirmPass'] = Hash::make($validatedData['confirmPass']);
        $password = $request->input('passPeserta');

        $booleanCheck = Hash::check($password, $validatedData['confirmPass']);

        if (!$booleanCheck) {
            return back()->with('password_not_same', 'password is not the same');
        }

        // Bukti Transaksi
        if ($request->file('buktiTransaksi')) {
            $file_bukti_transaksi = $request->file('buktiTransaksi');

            $nama_bukti_transaksi = pathinfo($file_bukti_transaksi->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file_bukti_transaksi->getClientOriginalExtension();
            $fileNameToStoreTransaksi = $nama_bukti_transaksi . '.' . $extension;


            $validatedData['buktiTransaksi'] = $file_bukti_transaksi->storeAs('bukti-transaksi/', $fileNameToStoreTransaksi, 'public');
            $file_bukti_transaksi->move(public_path('bukti-transaksi'), $fileNameToStoreTransaksi);
        }


        // Scan kartu pelajar
        if ($request->file('kartuPelajar')) {
            $file_kartu_pelajar = $request->file('kartuPelajar');

            $nama_kartu_pelajar = pathinfo($file_kartu_pelajar->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file_kartu_pelajar->getClientOriginalExtension();
            $fileNameToStoreKartu = $nama_kartu_pelajar . '.' . $extension;


            $validatedData['kartuPelajar'] = $file_kartu_pelajar->storeAs('kartu-pelajar/', $fileNameToStoreKartu, 'public');
            $file_kartu_pelajar->move(public_path('kartu-pelajar'), $fileNameToStoreKartu);
        }


        Peserta::create($validatedData);

        // Kembalikan respons ke halaman yang sesuai
        return redirect("/")->with('registrationSuccess', 'Registration Berhasil!');
    }



    //LOGIN HANDLER
    public function login()
    {
        return view('login.login', ['title' => 'BOM 2024 | LOGIN']);
    }

    public function authenticate(Request $request)
    {
        $nrpPanitia = User::Where('nrp', $request->nrp)->count();
        $passPanitia = DB::table('users')->select('password')->where('nrp', $request->nrp)->value('password');
        $inputPass = $request->password;


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


            // LOGIN PESERTA
        } else if ($nrpPanitia == 0) {
            $cekUsernameKelompok = Peserta::Where('usernameKelompok', $request->nrp)
                ->Where('is_validated', 1)
                ->count();
            $passPeserta = DB::table('pesertas')->select('confirmPass')->where('usernameKelompok', $request->nrp)->value('password');
            $inputPass = $request->password;


            if ($cekUsernameKelompok == 1 && Hash::check($inputPass, $passPeserta)) {
                $usernameKelompok = DB::table('pesertas')->select('usernameKelompok')->where('usernameKelompok', $request->nrp)->value('usernameKelompok');
                return redirect()->route('eliminationone')->with('usernameKelompok', $usernameKelompok);
            }

            return redirect()->route('login')->with('not_validated', "You aren't validated nor registered");
        }
    }

    public function assessment()
    {
        return view('user.assessment', ['title' => 'BOM 2024 | ASSESSMENT']);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    public function view()
    {
        return view('user.view', ['title' => 'BOM 2024 | COMING SOON']);
    }
}
