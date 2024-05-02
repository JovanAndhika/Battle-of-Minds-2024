<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Data_jawaban;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //INDEX
    public function index()
    {

        return view('homepage', ['title' => 'BOM 2024 | PETRA CHRISTIAN UNIVERSITY']);
    }
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
            'password' => 'required|string|min:8|max:20',
            'buktiTransaksi' => 'image|mimes:jpg,png|max:10240',

            'emailPerwakilan' => 'required|email:dns|string|max:70',
            'namaSatu' => 'required|string|max:70',
            'kontakSatu' => 'required|max:30',
            'kartuPelajarSatu' => 'file|mimes:jpg,png|max:10240',

            'namaDua' => 'required|string|max:70',
            'kontakDua' => 'required|max:30',
            'kartuPelajarDua' => 'file|mimes:jpg,png|max:10240',

            'namaTiga' => 'required|string|max:70',
            'kontakTiga' => 'required|max:30',
            'kartuPelajarTiga' => 'file|mimes:jpg,png|max:10240',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $password = $request->input('password');
        $booleanCheck = Hash::check($password, $validatedData['password']);
        if (!$booleanCheck) {
            return back()->with('password_not_same', '');
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
        if ($request->file('kartuPelajarSatu')) {
            $file_kartu_pelajar = $request->file('kartuPelajarSatu');

            $nama_kartu_pelajar = pathinfo($file_kartu_pelajar->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file_kartu_pelajar->getClientOriginalExtension();
            $fileNameToStoreKartu = $nama_kartu_pelajar . '.' . $extension;


            $validatedData['kartuPelajarSatu'] = $file_kartu_pelajar->storeAs('kartu-pelajar-1/', $fileNameToStoreKartu, 'public');
            $file_kartu_pelajar->move(public_path('kartu-pelajar-1'), $fileNameToStoreKartu);
        }
        if ($request->file('kartuPelajarDua')) {
            $file_kartu_pelajar = $request->file('kartuPelajarDua');

            $nama_kartu_pelajar = pathinfo($file_kartu_pelajar->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file_kartu_pelajar->getClientOriginalExtension();
            $fileNameToStoreKartu = $nama_kartu_pelajar . '.' . $extension;


            $validatedData['kartuPelajarDua'] = $file_kartu_pelajar->storeAs('kartu-pelajar-2/', $fileNameToStoreKartu, 'public');
            $file_kartu_pelajar->move(public_path('kartu-pelajar-2'), $fileNameToStoreKartu);
        }
        if ($request->file('kartuPelajarTiga')) {
            $file_kartu_pelajar = $request->file('kartuPelajarTiga');

            $nama_kartu_pelajar = pathinfo($file_kartu_pelajar->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file_kartu_pelajar->getClientOriginalExtension();
            $fileNameToStoreKartu = $nama_kartu_pelajar . '.' . $extension;


            $validatedData['kartuPelajarTiga'] = $file_kartu_pelajar->storeAs('kartu-pelajar-3/', $fileNameToStoreKartu, 'public');
            $file_kartu_pelajar->move(public_path('kartu-pelajar-3'), $fileNameToStoreKartu);
        }
        User::create($validatedData);
        // Kembalikan respons ke halaman yang sesuai
        return redirect("/")->with('registrationSuccess', 'Registration Berhasil!');
    }


    // TAMPILAN USER
    public function view()
    {
        echo 'hello world';
        return view('user.view', ['title' => 'BOM 2024 | COMING SOON']);
    }
    public function elim_satu()
    {
        return view('user.elim_satu', ['title' => 'BOM 2024 | ASSESSMENT']);
    }
    public function simpan_jawaban(Request $request)
    {

        $simpan_jawaban = Data_jawaban::where('kelompok_id', auth()->user()->id)
        ->where('soal_no', '1')
            ->update([
                'jawaban' => $request->biggamesanswer1 ,
            ]);

            return back()->with('simpan_success', 'your answer has been saved');
    }
}
