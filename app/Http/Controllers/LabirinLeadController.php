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

        $data_completion = Status::orderBy('is_completed', 'ASC')
        ->orderBy('labirin_3', 'ASC')
        ->orderBy('labirin_2', 'ASC')
        ->orderBy('labirin_1', 'ASC')
        ->get();
        return view('admin.labirinLeaderboard', [
            'title' => 'BOM 2024 | Leaderboard Labirin',
            'information' => $this->welcome[$index] . ' ' . auth()->user()->namaKelompok,
            'list' => $data_completion,
        ]);
    }
}
