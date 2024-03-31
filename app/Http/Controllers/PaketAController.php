<?php

namespace App\Http\Controllers;

use App\Models\Data_jawaban;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaketAController extends Controller
{
    //
    public function mainview(){
        return view('Eliminasi1.paket_a', ['title' => 'Paket A']);
    }

}
