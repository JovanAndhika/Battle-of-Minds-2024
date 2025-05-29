<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Data_jawaban;
use App\Models\Kunci_jawaban;
use Illuminate\Support\Facades\Hash;
use App\Models\Status;

use function Laravel\Prompts\progress;

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
            'asalSekolah' => 'required|string|max:200',
            'namaKelompok' => 'required|string|max:200',
            'password' => 'required|string|min:8|max:100',
            'buktiTransaksi' => 'image|file|mimes:jpg,png|max:10240',
            'emailPerwakilan' => 'required|email:dns|string|max:200',
            'namaSatu' => 'required|string|max:200',
            'kontakSatu' => 'required|max:200',
            'kartuPelajarSatu' => 'image|file|mimes:jpg,png|max:10240',
            'namaDua' => 'required|string|max:200',
            'kontakDua' => 'required|max:200',
            'kartuPelajarDua' => 'image|file|mimes:jpg,png|max:10240',
            'namaTiga' => 'required|string|max:200',
            'kontakTiga' => 'required|max:200',
            'kartuPelajarTiga' => 'image|file|mimes:jpg,png|max:10240',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $password = $request->input('confirmPass');
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

        // Check password confirmation manual
        if ($request->input('password') !== $request->input('confirmPass')) {
            return back()->withErrors(['confirmPass' => 'Password konfirmasi tidak cocok'])->withInput();
        }

        $validatedData['password'] = Hash::make($validatedData['password']);

        // Proses file dan simpan seperti kode kamu...

        if ($validatedData) {
            User::create($validatedData);
            return redirect()->route('index')->with('registrationSuccess', 'Pendaftaran berhasil!');
        } else {
            return back()->with('registrationFailed', 'Pendaftaran gagal, silakan coba lagi.');
        }
    }
    // TAMPILAN USER
    public function view()
    {
        $user_name = DB::select('select namaKelompok from users where id = ?', [auth()->user()->id]);
        $results = $user_name[0]->namaKelompok;
        return view('user.view', ['title' => 'BOM 2024 | WELCOME TO ELIM 1', 'username' => $results, 'idUser' => auth()->user()->id]);
    }
    public function grupwa()
    {
        return view('user.grupwa', ['title' => 'BOM 2024 | GRUP WA']);
    }
    public function elim_satu()
    {
        $title = 'BOM 2024 | Eliminasi 1';

        $data_jawaban = Data_jawaban::where('kelompok_id', auth()->user()->id)
            ->orderBy('kunci_jawabans_id')
            ->get();

        return view('user.elim_satu', [
            'title' => $title,
            'data_jawaban' => $data_jawaban
        ]);
    }


    public function elim_satuB()
    {
        $title = 'BOM 2024 | Eliminasi 1';

        $data_jawaban = Data_jawaban::where('kelompok_id', auth()->user()->id)
            ->orderBy('kunci_jawabans_id')
            ->get();

        return view('user.elim_satuB', ['title' => $title, 'data_jawaban' => $data_jawaban]);
    }


    public function elim_satuC()
    {
        $title = 'BOM 2024 | Eliminasi 1';

        $data_jawaban = Data_jawaban::where('kelompok_id', auth()->user()->id)
            ->orderBy('kunci_jawabans_id')
            ->get();

        return view('user.elim_satuC', ['title' => $title, 'data_jawaban' => $data_jawaban]);
    }

    public function elim_satuD()
    {
        $title = 'BOM 2024 | Eliminasi 1';

        $data_jawaban = Data_jawaban::where('kelompok_id', auth()->user()->id)
            ->orderBy('kunci_jawabans_id')
            ->get();

        return view('user.elim_satuD', ['title' => $title, 'data_jawaban' => $data_jawaban]);
    }

    public function elim_satuE()
    {
        $title = 'BOM 2024 | Eliminasi 1';

        $data_jawaban = Data_jawaban::where('kelompok_id', auth()->user()->id)
            ->orderBy('kunci_jawabans_id')
            ->get();

        return view('user.elim_satuE', ['title' => $title, 'data_jawaban' => $data_jawaban]);
    }

    public function elim_satuF()
    {
        $title = 'BOM 2024 | Eliminasi 1';

        $data_jawaban = Data_jawaban::where('kelompok_id', auth()->user()->id)
            ->orderBy('kunci_jawabans_id')
            ->get();

        return view('user.elim_satuF', ['title' => $title, 'data_jawaban' => $data_jawaban]);
    }

    public function simpan_jawabanA(Request $request)
    {
        $kelompokId = auth()->user()->id;


        $maxRetries = 3;
        $attempts = 0;

        while ($attempts < $maxRetries) {
            try {
                DB::transaction(function () use ($request, $kelompokId) {
                    for ($i = 1; $i <= 20; $i++) {
                        Data_Jawaban::where('kelompok_id', $kelompokId)
                            ->where('kunci_jawabans_id', $i)
                            ->lockForUpdate()
                            ->update([
                                'jawaban_kelompok' => $request->input('biggamesanswer' . $i),
                            ]);
                    }
                });
                break; // Exit the loop if successful
            } catch (\Exception $e) {
                $attempts++;
                if ($attempts >= $maxRetries) {
                    return response()->json(['error' => 'A deadlock occurred, please try again later.'], 500);
                }
                // Optional: wait a bit before retrying
                usleep(100000); // 100 milliseconds
            }
        }

        $kuncis = Kunci_jawaban::orderBy('id')->get();
        $count = 0;
        $iterasi = 1;


        foreach ($kuncis as $kunci) {
            $jawaban = Data_jawaban::where('kunci_jawabans_id', $iterasi++)
                ->where('kelompok_id', $kelompokId)
                ->where('jawaban_kelompok', $kunci->jawaban)->first();
            if (!$jawaban) {
                $count++;
            }
        }

        // Update poin
        User::where('id', $kelompokId)->update(['poin' => 300 - $count]);

        if ($request->page) {
            if ($request->page == 1) {
                return redirect()->route('user.elim_satu')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 2) {
                return redirect()->route('user.elim_satuB')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 3) {
                return redirect()->route('user.elim_satuC')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 4) {
                return redirect()->route('user.elim_satuD')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 5) {
                return redirect()->route('user.elim_satuE')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 6) {
                return redirect()->route('user.elim_satuF')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 100) {
                return redirect()->route('user.soalBom')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            }
        }

        return back()->with([
            'success' => 'Jawaban anda telah berhasil tersimpan !',
            'count' => 'Jumlah jawaban yang masih salah : ' . $count,
        ]);
    }

    public function simpan_jawabanB(Request $request)
    {
        $kelompokId = auth()->user()->id;

        $maxRetries = 3;
        $attempts = 0;

        while ($attempts < $maxRetries) {
            try {
                DB::transaction(function () use ($request, $kelompokId) {
                    for ($i = 51; $i <= 100; $i++) {
                        Data_Jawaban::where('kelompok_id', $kelompokId)
                            ->where('kunci_jawabans_id', $i)
                            ->lockForUpdate()
                            ->update([
                                'jawaban_kelompok' => $request->input('biggamesanswer' . $i),
                            ]);
                    }
                });
                break; // Exit the loop if successful
            } catch (\Exception $e) {
                $attempts++;
                if ($attempts >= $maxRetries) {
                    return response()->json(['error' => 'A deadlock occurred, please try again later.'], 500);
                }
                // Optional: wait a bit before retrying
                usleep(100000); // 100 milliseconds
            }
        }

        $kuncis = Kunci_jawaban::orderBy('id')->get();
        $count = 0;
        $iterasi = 1;


        foreach ($kuncis as $kunci) {
            $jawaban = Data_jawaban::where('kunci_jawabans_id', $iterasi++)
                ->where('kelompok_id', $kelompokId)
                ->where('jawaban_kelompok', $kunci->jawaban)->first();
            if (!$jawaban) {
                $count++;
            }
        }

        // Update poin
        User::where('id', $kelompokId)->update(['poin' => 300 - $count]);

        if ($request->page) {
            if ($request->page == 1) {
                return redirect()->route('user.elim_satu')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 2) {
                return redirect()->route('user.elim_satuB')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 3) {
                return redirect()->route('user.elim_satuC')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 4) {
                return redirect()->route('user.elim_satuD')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 5) {
                return redirect()->route('user.elim_satuE')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 6) {
                return redirect()->route('user.elim_satuF')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 100) {
                return redirect()->route('user.soalBom')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            }
        }

        return back()->with([
            'success' => 'Jawaban anda telah berhasil tersimpan !',
            'count' => 'Jumlah jawaban yang masih salah : ' . $count,
        ]);
    }

    public function simpan_jawabanC(Request $request)
    {
        $kelompokId = auth()->user()->id;

        $maxRetries = 3;
        $attempts = 0;

        while ($attempts < $maxRetries) {
            try {
                DB::transaction(function () use ($request, $kelompokId) {
                    for ($i = 101; $i <= 150; $i++) {
                        Data_Jawaban::where('kelompok_id', $kelompokId)
                            ->where('kunci_jawabans_id', $i)
                            ->lockForUpdate()
                            ->update([
                                'jawaban_kelompok' => $request->input('biggamesanswer' . $i),
                            ]);
                    }
                });
                break; // Exit the loop if successful
            } catch (\Exception $e) {
                $attempts++;
                if ($attempts >= $maxRetries) {
                    return response()->json(['error' => 'A deadlock occurred, please try again later.'], 500);
                }
                // Optional: wait a bit before retrying
                usleep(100000); // 100 milliseconds
            }
        }

        $kuncis = Kunci_jawaban::orderBy('id')->get();
        $count = 0;
        $iterasi = 1;


        foreach ($kuncis as $kunci) {
            $jawaban = Data_jawaban::where('kunci_jawabans_id', $iterasi++)
                ->where('kelompok_id', $kelompokId)
                ->where('jawaban_kelompok', $kunci->jawaban)->first();
            if (!$jawaban) {
                $count++;
            }
        }

        // Update poin
        User::where('id', $kelompokId)->update(['poin' => 300 - $count]);

        if ($request->page) {
            if ($request->page == 1) {
                return redirect()->route('user.elim_satu')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 2) {
                return redirect()->route('user.elim_satuB')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 3) {
                return redirect()->route('user.elim_satuC')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 4) {
                return redirect()->route('user.elim_satuD')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 5) {
                return redirect()->route('user.elim_satuE')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 6) {
                return redirect()->route('user.elim_satuF')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 100) {
                return redirect()->route('user.soalBom')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            }
        }

        return back()->with([
            'success' => 'Jawaban anda telah berhasil tersimpan !',
            'count' => 'Jumlah jawaban yang masih salah : ' . $count,
        ]);
    }

    public function simpan_jawabanD(Request $request)
    {
        $kelompokId = auth()->user()->id;

        $maxRetries = 3;
        $attempts = 0;

        while ($attempts < $maxRetries) {
            try {
                DB::transaction(function () use ($request, $kelompokId) {
                    for ($i = 151; $i <= 200; $i++) {
                        Data_Jawaban::where('kelompok_id', $kelompokId)
                            ->where('kunci_jawabans_id', $i)
                            ->lockForUpdate()
                            ->update([
                                'jawaban_kelompok' => $request->input('biggamesanswer' . $i),
                            ]);
                    }
                });
                break; // Exit the loop if successful
            } catch (\Exception $e) {
                $attempts++;
                if ($attempts >= $maxRetries) {
                    return response()->json(['error' => 'A deadlock occurred, please try again later.'], 500);
                }
                // Optional: wait a bit before retrying
                usleep(100000); // 100 milliseconds
            }
        }

        $kuncis = Kunci_jawaban::orderBy('id')->get();
        $count = 0;
        $iterasi = 1;


        foreach ($kuncis as $kunci) {
            $jawaban = Data_jawaban::where('kunci_jawabans_id', $iterasi++)
                ->where('kelompok_id', $kelompokId)
                ->where('jawaban_kelompok', $kunci->jawaban)->first();
            if (!$jawaban) {
                $count++;
            }
        }

        // Update poin
        User::where('id', $kelompokId)->update(['poin' => 300 - $count]);

        if ($request->page) {
            if ($request->page == 1) {
                return redirect()->route('user.elim_satu')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 2) {
                return redirect()->route('user.elim_satuB')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 3) {
                return redirect()->route('user.elim_satuC')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 4) {
                return redirect()->route('user.elim_satuD')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 5) {
                return redirect()->route('user.elim_satuE')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 6) {
                return redirect()->route('user.elim_satuF')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 100) {
                return redirect()->route('user.soalBom')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            }
        }

        return back()->with([
            'success' => 'Jawaban anda telah berhasil tersimpan !',
            'count' => 'Jumlah jawaban yang masih salah : ' . $count,
        ]);
    }

    public function simpan_jawabanE(Request $request)
    {
        $kelompokId = auth()->user()->id;

        $maxRetries = 3;
        $attempts = 0;

        while ($attempts < $maxRetries) {
            try {
                DB::transaction(function () use ($request, $kelompokId) {
                    for ($i = 201; $i <= 250; $i++) {
                        Data_Jawaban::where('kelompok_id', $kelompokId)
                            ->where('kunci_jawabans_id', $i)
                            ->lockForUpdate()
                            ->update([
                                'jawaban_kelompok' => $request->input('biggamesanswer' . $i),
                            ]);
                    }
                });
                break; // Exit the loop if successful
            } catch (\Exception $e) {
                $attempts++;
                if ($attempts >= $maxRetries) {
                    return response()->json(['error' => 'A deadlock occurred, please try again later.'], 500);
                }
                // Optional: wait a bit before retrying
                usleep(100000); // 100 milliseconds
            }
        }

        $kuncis = Kunci_jawaban::orderBy('id')->get();
        $count = 0;
        $iterasi = 1;


        foreach ($kuncis as $kunci) {
            $jawaban = Data_jawaban::where('kunci_jawabans_id', $iterasi++)
                ->where('kelompok_id', $kelompokId)
                ->where('jawaban_kelompok', $kunci->jawaban)->first();
            if (!$jawaban) {
                $count++;
            }
        }

        // Update poin
        User::where('id', $kelompokId)->update(['poin' => 300 - $count]);

        if ($request->page) {
            if ($request->page == 1) {
                return redirect()->route('user.elim_satu')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 2) {
                return redirect()->route('user.elim_satuB')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 3) {
                return redirect()->route('user.elim_satuC')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 4) {
                return redirect()->route('user.elim_satuD')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 5) {
                return redirect()->route('user.elim_satuE')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 6) {
                return redirect()->route('user.elim_satuF')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 100) {
                return redirect()->route('user.soalBom')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            }
        }

        return back()->with([
            'success' => 'Jawaban anda telah berhasil tersimpan !',
            'count' => 'Jumlah jawaban yang masih salah : ' . $count,
        ]);
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

        $kuncis = Kunci_jawaban::orderBy('id')->get();
        $count = 0;
        $iterasi = 1;


        foreach ($kuncis as $kunci) {
            $jawaban = Data_jawaban::where('kunci_jawabans_id', $iterasi++)
                ->where('kelompok_id', $kelompokId)
                ->where('jawaban_kelompok', $kunci->jawaban)->first();
            if (!$jawaban) {
                $count++;
            }
        }

        // Update poin
        User::where('id', $kelompokId)->update(['poin' => 300 - $count]);

        if ($request->page) {
            if ($request->page == 1) {
                return redirect()->route('user.elim_satu')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 2) {
                return redirect()->route('user.elim_satuB')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 3) {
                return redirect()->route('user.elim_satuC')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 4) {
                return redirect()->route('user.elim_satuD')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 5) {
                return redirect()->route('user.elim_satuE')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 6) {
                return redirect()->route('user.elim_satuF')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            } elseif ($request->page == 100) {
                return redirect()->route('user.soalBom')->with([
                    'success' => 'Jawaban anda telah berhasil tersimpan !',
                    'count' => 'Jumlah jawaban yang masih salah : ' . $count,
                ]);
            }
        }

        return back()->with([
            'success' => 'Jawaban anda telah berhasil tersimpan !',
            'count' => 'Jumlah jawaban yang masih salah : ' . $count,
        ]);
    }

    public function comingSoon() //for coming soon
    {
        return view('user.coming-soon', ['title' => 'BOM 2024 | COMING SOON']);
    }

    public function closeReg() //for coming soon
    {
        return view('user.closereg', ['title' => 'BOM 2024 | REGISTRATION CLOSED']);
    }




    // VIEW MINI GAME
    public function game_elim1()
    {
        $user = auth()->user()->id;
        $status = Status::where('kelompok_id', $user)->first();
        $lab1 = null;
        $lab2 = null;
        $lab3 = null;
        if ($status) {
            $lab1 =  $status->labirin_1;
            $lab2 = $status->labirin_2;
            $lab3 = $status->labirin_3;
        }
        return view('user.mini_games_elim1.game_elim1', ['title' => 'BOM 2024 | MiniGame Elimination 1', 'lab1' => $lab1, 'lab2' => $lab2, 'lab3' => $lab3]);
    }



    // Validation Labirin
    public function labirin1_validate(Request $request)
    {
        $inputPassword = $request->input('password_labirin_satu');
        $password_labirin_satu = '$2y$10$fv/yEfagkjqbAGdCENhTlOBsyVrrxueu.6iOU05bQBI.t54OhVG/K'; // Password yang benar (harus dienkripsi dalam aplikasi nyata)

        if (Hash::check($inputPassword, $password_labirin_satu)) {
            $redirectUrl = route('user.labirin1_soal'); // Dapatkan URL tujuan
            return response()->json(['valid' => true, 'url' => $redirectUrl]);
        } else {
            return response()->json(['valid' => false]);
        }
    }
    public function labirin2_validate(Request $request)
    {
        $inputPassword = $request->input('password_labirin_dua');
        $password_labirin_dua = '$2y$10$7FhK6pyFPCIbeNESRkiBuOkH.Xim8iOcRj.kt9s6usYLDigl/a4ee'; // Password yang benar (harus dienkripsi dalam aplikasi nyata)

        if (Hash::check($inputPassword, $password_labirin_dua)) {
            $redirectUrl = route('user.labirin2_soal'); // Dapatkan URL tujuan
            return response()->json(['valid' => true, 'url' => $redirectUrl]);
        } else {
            return response()->json(['valid' => false]);
        }
    }
    public function labirin3_validate(Request $request)
    {
        $inputPassword = $request->input('password_labirin_tiga');
        $password_labirin_tiga = '$2y$10$52aXp3ZECVYbZ.REPbGBQeSbqlrHqJjgQ6hT4B1Yfkl9NvEdiPGHC'; // Password yang benar (harus dienkripsi dalam aplikasi nyata)

        if (Hash::check($inputPassword, $password_labirin_tiga)) {
            $redirectUrl = route('user.labirin3_soal'); // Dapatkan URL tujuan
            return response()->json(['valid' => true, 'url' => $redirectUrl]);
        } else {
            return response()->json(['valid' => false]);
        }
    }


    public function labirin1_soal()
    {
        return view('user.mini_games_elim1.soal_labirin1', ['title' => 'BOM 2024 | Soal Labirin 1']);
    }

    public function labirin2_soal()
    {
        return view('user.mini_games_elim1.soal_labirin2', ['title' => 'BOM 2024 | Soal Labirin 2']);
    }

    public function labirin3_soal()
    {
        return view('user.mini_games_elim1.soal_labirin3', ['title' => 'BOM 2024 | Soal Labirin 3']);
    }
}
