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
            'buktiTransaksi' => 'image|file|mimes:jpg,png|max:10240',
            'emailPerwakilan' => 'required|email:dns|string|max:70',
            'namaSatu' => 'required|string|max:70',
            'kontakSatu' => 'required|max:30',
            'kartuPelajarSatu' => 'image|file|mimes:jpg,png|max:10240',
            'namaDua' => 'required|string|max:70',
            'kontakDua' => 'required|max:30',
            'kartuPelajarDua' => 'image|file|mimes:jpg,png|max:10240',
            'namaTiga' => 'required|string|max:70',
            'kontakTiga' => 'required|max:30',
            'kartuPelajarTiga' => 'image|file|mimes:jpg,png|max:10240',
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
            $file_kartu_pelajarSatu = $request->file('kartuPelajarSatu');
            $nama_kartu_pelajar = pathinfo($file_kartu_pelajarSatu->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file_kartu_pelajarSatu->getClientOriginalExtension();
            $fileNameToStoreKartuSatu = $nama_kartu_pelajar . '.' . $extension;
            $validatedData['kartuPelajarSatu'] = $file_kartu_pelajarSatu->storeAs('kartu-pelajar-1/', $fileNameToStoreKartuSatu, 'public');
            $file_kartu_pelajarSatu->move(public_path('kartu-pelajar-1'), $fileNameToStoreKartuSatu);
        }
        if ($request->file('kartuPelajarDua')) {
            $file_kartu_pelajarDua = $request->file('kartuPelajarDua');
            $nama_kartu_pelajar = pathinfo($file_kartu_pelajarDua->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file_kartu_pelajarDua->getClientOriginalExtension();
            $fileNameToStoreKartuDua = $nama_kartu_pelajar . '.' . $extension;
            $validatedData['kartuPelajarDua'] = $file_kartu_pelajarDua->storeAs('kartu-pelajar-2/', $fileNameToStoreKartuDua, 'public');
            $file_kartu_pelajarDua->move(public_path('kartu-pelajar-2'), $fileNameToStoreKartuDua);
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
        return redirect()->route('grupwa')->with('registrationSuccess', 'Registration Berhasil!');
    }
    // TAMPILAN USER
    public function view()
    {
        $user_name = DB::select('select namaKelompok from users where id = ?', [auth()->user()->id]);
        $results = $user_name[0]->namaKelompok;
        return view('user.view', ['title' => 'BOM 2024 | COMING SOON', 'username' => $results, 'idUser' => auth()->user()->id]);
    }
    public function grupwa()
    {
        return view('user.grupwa', ['title' => 'BOM 2024 | GRUP WA']);
    }
    public function elim_satu()
    {
        $title = 'BOM 2024 | COMING SOON';

        $data_jawaban = Data_jawaban::where('kelompok_id', auth()->user()->id)
            ->orderBy('kunci_jawabans_id')
            ->get();

        return view('user.elim_satu', ['title' => $title, 'data_jawaban' => $data_jawaban]);
    }


    public function elim_satuB()
    {
        $title = 'BOM 2024 | COMING SOON';

        $data_jawaban = Data_jawaban::where('kelompok_id', auth()->user()->id)
            ->orderBy('kunci_jawabans_id')
            ->get();

        return view('user.elim_satuB', ['title' => $title, 'data_jawaban' => $data_jawaban]);
    }


    public function elim_satuC()
    {
        $title = 'BOM 2024 | COMING SOON';

        $data_jawaban = Data_jawaban::where('kelompok_id', auth()->user()->id)
            ->orderBy('kunci_jawabans_id')
            ->get();

        return view('user.elim_satuC', ['title' => $title, 'data_jawaban' => $data_jawaban]);
    }

    public function elim_satuD()
    {
        $title = 'BOM 2024 | COMING SOON';

        $data_jawaban = Data_jawaban::where('kelompok_id', auth()->user()->id)
            ->orderBy('kunci_jawabans_id')
            ->get();

        return view('user.elim_satuD', ['title' => $title, 'data_jawaban' => $data_jawaban]);
    }

    public function elim_satuE()
    {
        $title = 'BOM 2024 | COMING SOON';

        $data_jawaban = Data_jawaban::where('kelompok_id', auth()->user()->id)
            ->orderBy('kunci_jawabans_id')
            ->get();

        return view('user.elim_satuE', ['title' => $title, 'data_jawaban' => $data_jawaban]);
    }

    public function elim_satuF()
    {
        $title = 'BOM 2024 | COMING SOON';

        $data_jawaban = Data_jawaban::where('kelompok_id', auth()->user()->id)
            ->orderBy('kunci_jawabans_id')
            ->get();

        return view('user.elim_satuF', ['title' => $title, 'data_jawaban' => $data_jawaban]);
    }

    public function simpan_jawabanA(Request $request)
    {
        $kelompokId = auth()->user()->id;

        for ($i = 1; $i <= 50; $i++) {
            Data_jawaban::where('kelompok_id', $kelompokId)
                ->where('kunci_jawabans_id', $i)
                ->update([
                    'jawaban_kelompok' => $request->input('biggamesanswer' . $i),
                ]);
        }

        return back()->with('simpan_success', 'your answer has been saved');
    }

    public function simpan_jawabanB(Request $request)
    {
        $kelompokId = auth()->user()->id;

        for ($i = 51; $i <= 100; $i++) {
            Data_jawaban::where('kelompok_id', $kelompokId)
                ->where('kunci_jawabans_id', $i)
                ->update([
                    'jawaban_kelompok' => $request->input('biggamesanswer' . $i),
                ]);
        }

        return back()->with('simpan_success', 'your answer has been saved');
    }

    public function simpan_jawabanC(Request $request)
    {
        $kelompokId = auth()->user()->id;

        for ($i = 101; $i <= 150; $i++) {
            Data_jawaban::where('kelompok_id', $kelompokId)
                ->where('kunci_jawabans_id', $i)
                ->update([
                    'jawaban_kelompok' => $request->input('biggamesanswer' . $i),
                ]);
        }

        return back()->with('simpan_success', 'your answer has been saved');
    }

    public function simpan_jawabanD(Request $request)
    {
        $kelompokId = auth()->user()->id;

        for ($i = 151; $i <= 200; $i++) {
            Data_jawaban::where('kelompok_id', $kelompokId)
                ->where('kunci_jawabans_id', $i)
                ->update([
                    'jawaban_kelompok' => $request->input('biggamesanswer' . $i),
                ]);
        }

        return back()->with('simpan_success', 'your answer has been saved');
    }

    public function simpan_jawabanE(Request $request)
    {
        $kelompokId = auth()->user()->id;

        for ($i = 201; $i <= 250; $i++) {
            Data_jawaban::where('kelompok_id', $kelompokId)
                ->where('kunci_jawabans_id', $i)
                ->update([
                    'jawaban_kelompok' => $request->input('biggamesanswer' . $i),
                ]);
        }

        return back()->with('simpan_success', 'your answer has been saved');
    }

    public function simpan_jawabanF(Request $request)
    {
        $kelompokId = auth()->user()->id;

        for ($i = 251; $i <= 300; $i++) {
            Data_jawaban::where('kelompok_id', $kelompokId)
                ->where('kunci_jawabans_id', $i)
                ->update([
                    'jawaban_kelompok' => $request->input('biggamesanswer' . $i),
                ]);
        }

        return back()->with('simpan_success', 'your answer has been saved');
    }

    public function comingSoon() //for coming soon
    {
        return view('user.coming-soon', ['title' => 'BOM 2024 | COMING SOON']);
    }
}
