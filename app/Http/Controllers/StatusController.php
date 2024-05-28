<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;


class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function labirin1(Request $request)
    {
        $kelompokId = auth()->user()->id;
        // $namaKelompok = User::select('namaKelompok')->where('id',$kelompokId)->first()->value('namaKelompok');
        $namaKelompok = User::where('id', $kelompokId)->value('namaKelompok');
        $status = Status::where('kelompok', $namaKelompok)->first();
        if (is_null($status)) {
            // Jika status tidak ditemukan, buat entri baru
            $status = new Status();
            $status->kelompok = $namaKelompok;
        }
        
        // $status->kelompok = request(['nama']);
        $status->labirin_1 = Carbon::now();
        $status->save();
        return redirect()->intended('/game_elim1');
    }


    public function labirin2(Request $request)
    {
        $kelompokId = auth()->user()->id;
        // $namaKelompok = User::select('namaKelompok')->where('id',$kelompokId)->first()->value('namaKelompok');
        $namaKelompok = User::where('id', $kelompokId)->value('namaKelompok');
        $status = Status::where('kelompok', $namaKelompok)->first();
        if (is_null($status)) {
            // Jika status tidak ditemukan, buat entri baru
            $status = new Status();
            $status->kelompok = $namaKelompok;
        }
        
        // $status->kelompok = request(['nama']);
        $status->labirin_2 = Carbon::now();
        $status->save();
        return redirect()->intended('/game_elim1');
    }


    public function labirin3(Request $request)
    {
        $kelompokId = auth()->user()->id;
        // $namaKelompok = User::select('namaKelompok')->where('id',$kelompokId)->first()->value('namaKelompok');
        $namaKelompok = User::where('id', $kelompokId)->value('namaKelompok');
        $status = Status::where('kelompok', $namaKelompok)->first();
        if (is_null($status)) {
            // Jika status tidak ditemukan, buat entri baru
            $status = new Status();
            $status->kelompok = $namaKelompok;
        }
        
        // $status->kelompok = request(['nama']);
        $status->labirin_3 = Carbon::now();
        $status->save();
        return redirect()->intended('/game_elim1');
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusRequest $request, Status $status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        //
    }
}
