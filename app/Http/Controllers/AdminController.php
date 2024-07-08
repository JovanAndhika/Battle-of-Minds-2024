<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Data_jawaban;
use App\Models\Elim_dua;
use Illuminate\Http\Request;
use App\Models\Set_jawaban_status;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Babak_final;
use App\Models\Babak_final_history;
use App\Models\Elim_dua_history;

class AdminController extends Controller
{

    private $welcome = ['Bonjour', 'Hola', 'Привет', 'Shalom', 'Guten tag', '你好', 'Hello', '안녕하세요', 'Aloha', 'Halo'];

    // Nanti admin bisa validasi peserta yang mendaftar
    public function peserta()
    {
        $index = array_rand($this->welcome);
        $stsSetJawaban = Data_jawaban::select('kelompok_id')->limit(10)->count();
        return view('admin.listPeserta', [
            'title' => 'BOM 2024 | List Peserta BOM',
            'active' => 'peserta',
            'pesertas' => User::where('is_admin', '0')->get(),
            'jumlah_peserta' => DB::table('users')
                ->where('is_admin', '==', '0')->count(),
            'information' => $this->welcome[$index] . ' ' . auth()->user()->namaKelompok,
            'stsSetJawaban' => $stsSetJawaban,
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
            'information' => 'Data Jawaban ' . $user->namaKelompok . '. total poin : ' . $user->poin
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


    // ELIM DUA
    public function elimduaView(Request $request)
    {
        $index = array_rand($this->welcome);

        if ($request->ajax()) {
            $data = Elim_dua::where('namaKelompok', 'LIKE', $request->namaKelompok . '%')->get();
            $output = '';
            if (count($data) > 0) {
                $output = '<ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">';
                foreach ($data as $row) {
                    $output .= '<li class="pilihan block w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">' . $row->namaKelompok . '</li>';
                }
                $output .= '</ul>';
            } else {
                $output .= '<li class="pilihan block w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">No Data Found</li>';
            }
            return $output;
        }

        return view('admin.elimDua', [
            'title' => 'BOM 2024 | Poin Elim Dua',
            'information' => $this->welcome[$index] . ' ' . auth()->user()->namaKelompok
        ]);
    }

    public function elimduaStore(Request $request)
    {

        $validatedData = $request->validate([
            'namaKelompok' => 'required|max:255',
            'poinDidapat' => 'required',
        ]);

        $exist = Elim_dua::where('namaKelompok', $request->namaKelompok)->exists();
        $jumlahPoin = Elim_dua::where('namaKelompok', $request->namaKelompok)->value('jumlahPoin');

        if ($exist) {
            $history = new Elim_dua_history;
            $history->namaKelompok = $request->namaKelompok;
            $history->poinDidapat = $request->poinDidapat;
            $history->save();
            Elim_dua::where('namaKelompok', $request->namaKelompok)
                ->update(['jumlahPoin' => $jumlahPoin + floatval($request->poinDidapat)]);

            return response()->json(['res' => 'Form submitted successfully!'], 200);

        } else {
            return response()->json(['res' => 'Nama Kelompok is not in the database'], 404);
        }
    }



    // FINAL
    public function finalView(Request $request)
    {
        $index = array_rand($this->welcome);

        if ($request->ajax()) {
            $data = Babak_final::where('namaKelompok', 'LIKE', $request->namaKelompok . '%')->get();
            $output = '';
            if (count($data) > 0) {
                $output = '<ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">';
                foreach ($data as $row) {
                    $output .= '<li class="pilihan block w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">' . $row->namaKelompok . '</li>';
                }
                $output .= '</ul>';
            } else {
                $output .= '<li class="pilihan block w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">No Data Found</li>';
            }
            return $output;
        }

        return view('admin.babakFinal', [
            'title' => 'BOM 2024 | Poin Final',
            'information' => $this->welcome[$index] . ' ' . auth()->user()->namaKelompok
        ]);
    }

    public function finalStore(Request $request)
    {

        $validatedData = $request->validate([
            'namaKelompok' => 'required|max:255',
            'poinDidapat' => 'required',
        ]);

        $exist = Babak_final::where('namaKelompok', $request->namaKelompok)->exists();
        $jumlahPoin = Babak_final::where('namaKelompok', $request->namaKelompok)->value('jumlahPoin');

        if ($exist) {
            $history = new Babak_final_history;
            $history->namaKelompok = $request->namaKelompok;
            $history->poinDidapat = $request->poinDidapat;
            $history->save();
            Babak_final::where('namaKelompok', $request->namaKelompok)
                ->update(['jumlahPoin' => $jumlahPoin + floatval($request->poinDidapat)]);

            return response()->json(['res' => 'Form submitted successfully!'], 200);
            
        } else {
            return response()->json(['res' => 'Nama Kelompok is not in the database'], 404);
        }
    }

    // Leaderboard
    public function elimduaLeaderboard(){
        $index = array_rand($this->welcome);

        return view('admin.elimDuaLeaderboard', [
            'title' => 'BOM 2024 | Leaderboard Elim Dua',
            'information' => $this->welcome[$index] . ' ' . auth()->user()->namaKelompok,
            'pesertas' => Elim_dua::all(),
        ]);
    }

    public function finalLeaderboard(){
        $index = array_rand($this->welcome);

        return view('admin.finalLeaderboard', [
            'title' => 'BOM 2024 | Leaderboard Elim Dua',
            'information' => $this->welcome[$index] . ' ' . auth()->user()->namaKelompok,
            'pesertas' => Babak_final::all(),
        ]);
    }


    // History
    public function elimduaHistory(){
        $index = array_rand($this->welcome);

        return view('admin.elimDuaHistory', [
            'title' => 'BOM 2024 | Leaderboard Elim Dua',
            'information' => $this->welcome[$index] . ' ' . auth()->user()->namaKelompok,
            'pesertas' => Elim_dua_history::all(),
        ]);
    }

    public function finalHistory(){
        $index = array_rand($this->welcome);

        return view('admin.finalHistory', [
            'title' => 'BOM 2024 | Leaderboard Elim Dua',
            'information' => $this->welcome[$index] . ' ' . auth()->user()->namaKelompok,
            'pesertas' => Babak_final_history::all(),
        ]);
    }
}
