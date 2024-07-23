<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;


class LabirinLeadController extends Controller
{
    private $welcome = ['Bonjour', 'Hola', 'Привет', 'Shalom', 'Guten tag', '你好', 'Hello', '안녕하세요', 'Aloha', 'Halo'];
    
    public function index()
    {
        $index = array_rand($this->welcome);

        $data_completion = Status::orderByRaw('CASE WHEN is_completed IS NULL THEN 1 ELSE 0 END, is_completed ASC')
        ->orderByRaw('CASE WHEN labirin_3 IS NULL THEN 1 ELSE 0 END, labirin_3 ASC')
        ->orderByRaw('CASE WHEN labirin_2 IS NULL THEN 1 ELSE 0 END, labirin_2 ASC')
        ->orderByRaw('CASE WHEN labirin_1 IS NULL THEN 1 ELSE 0 END, labirin_1 ASC')
        ->get();
        return view('admin.labirinLeaderboard', [
            'title' => 'BOM 2024 | Leaderboard Labirin',
            'information' => $this->welcome[$index] . ' ' . auth()->user()->namaKelompok,
            'list' => $data_completion,
        ]);
    }
}
