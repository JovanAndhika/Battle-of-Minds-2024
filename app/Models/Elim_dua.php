<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elim_dua extends Model
{
    use HasFactory;
    protected $table = 'elim_duas';
    protected $fillable = [
        'namaKelompok',
        'jumlahPoin',
    ];
}
