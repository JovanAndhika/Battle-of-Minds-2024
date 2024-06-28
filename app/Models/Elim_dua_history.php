<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elim_dua_history extends Model
{
    use HasFactory;
    protected $table = 'elim_dua_historys';
    protected $fillable = [
        'namaKelompok',
        'poinDidapat',
    ];

    protected $timestamps = true;
}
