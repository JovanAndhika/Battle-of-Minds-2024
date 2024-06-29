<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Babak_final_history extends Model
{
    use HasFactory;
    protected $table = 'final_historys';
    protected $fillable = [
        'namaKelompok',
        'poinDidapat',
    ];
}
