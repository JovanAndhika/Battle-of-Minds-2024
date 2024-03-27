<?php

namespace App\Http\Controllers;

use App\Models\Data_jawaban;
use Illuminate\Http\Request;

class PaketAController extends Controller
{
    //
    public function mainview(){
        return view('Eliminasi1.paket_a', ['title' => 'Paket A']);
    }

    public function setReady(Request $request){
        
        
    }
}
