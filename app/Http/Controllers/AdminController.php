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

    private $welcome = ['Bonjour', 'Hola', 'Привет', 'Shalom', 'Guten tag', '你好', 'Hello', '안녕하세요', 'Aloha', 'Halo'];

    // Nanti admin bisa validasi peserta yang mendaftar
    public function peserta()
    {

        $index = array_rand($this->welcome);
        return view('admin.listPeserta', [
            'title' => 'BOM 2024 | List Peserta BOM',
            'active' => 'peserta',
            'pesertas' => User::where('is_admin', '0')->get(),
            'jumlah_peserta' => DB::table('users')
                ->where('is_admin', '==', '0')->count(),
            'information' => $this->welcome[$index] . ' ' . auth()->user()->namaKelompok
        ]);
    }

    public function getPembayaranUser(User $user, Request $request)
   
    {
        $img = User::where('id', $user->id)->first();

        if ($request->modal == 'bayar') {
            return response()->json($img->buktiTransaksi);
        } elseif ($request->modal == 'ktm') {
            if ($request->nomor == 1) {
                return response()->json($img->kartuPelajarSatu);
            } elseif ($request->nomor == 2) {
                return response()->json($img->kartuPelajarDua);
            } elseif ($request->nomor == 3) {
                return response()->json($img->kartuPelajarTiga);
            }
        }
    }

    public function getDataUser(User $user)
    {
        $data_user = User::where('id', $user->id)->first();

        $user_1 = $data_user->namaSatu;
        $user_2 = $data_user->namaDua;
        $user_3 = $data_user->namaTiga;

        $kontak_1 = $data_user->kontakSatu;
        $kontak_2 = $data_user->kontakDua;
        $kontak_3 = $data_user->kontakTiga;

        $kp_1 = $data_user->kartuPelajarSatu;
        $kp_2 = $data_user->kartuPelajarDua;
        $kp_3 = $data_user->kartuPelajarTiga;

        return response()->json(['user' => $data_user]);
    }

    public function validasi(Request $request)
    {
        DB::table('users')->where('id', $request->id)
            ->update(['is_validated' => 1]);


        return redirect()->route('admin.index')->with('success', 'Berhasil melakukan validasi !');
    }

    // Poins
    public function poin(Request $request)
    {

        $index = array_rand($this->welcome);
        return view('admin.poin', [
            'title' => 'BOM 2024 | Poin kelompok',
            'pesertas' => User::where('is_admin', '0')->get(),
            'information' => $this->welcome[$index] . ' ' . auth()->user()->namaKelompok
        ]);
    }

    public function poin_update(Request $request)
    {
        $validated = $request->validate([
            'namaKelompok' => 'string|exists:users|required',
            'poin' => 'numeric|required|min:0'
        ]);

        User::where('namaKelompok', $request->namaKelompok)
            ->update(['poin' => $request->poin]);

        return redirect()->route('admin.poin')->with('success', 'Berhasil melakukan update poin !');
    }

    // Lihat jawaban peserta
    public function jawaban(User $user)
    {
        $jawabans = Data_jawaban::where('kelompok_id', $user->id)
            ->get();

        return view('admin.jawaban', [
            'title' => 'BOM 2024 | Data Jawaban Peserta',
            'jawabans' => $jawabans,
            'information' => 'Data Jawaban ' . $user->namaKelompok
        ]);
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
            'information' => 'Welcome ' . auth()->user()->namaKelompok
        ]);
    }


    // SET PAKET
    public function setReady()
    {
        $pesertas = DB::table('users')->where('is_validated', 1)
            ->where('is_admin', 0)
            ->get();

        foreach ($pesertas as $p) {
            for ($j = 1; $j <= 300; $j++) {
                Data_jawaban::create([
                    'kelompok_id' => $p->id,
                    'kunci_jawabans_id' => intval($j), // Mengonversi $j menjadi integer
                    'jawaban_kelompok' => null
                ]);
            }

            $affected = Set_jawaban_status::create([
                'status_set' => true
            ]);
        }

        return redirect()->route('admin.index')->with('success', 'Berhasil melakukan set jawaban peserta !');
    }
}
