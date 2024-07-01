<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Babak_final extends Model
{
    use HasFactory;
    protected $table = 'finals';
    protected $fillable = [
        'namaKelompok',
        'jumlahPoin',
        'asalSekolah',
    ];
}
