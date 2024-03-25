<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $table = 'pesertas';
    protected $fillable = [
        'asalSekolah',
        'kontakSekolah',
        'usernameKelompok',
        'kelas',
        'jurusan',
        'kontakPerwakilan',
        'confirmPass',
        'namaKetua',
        'emailKetua',
        'kerabatSatu',
        'namaKedua',
        'kerabatDua',
        'namaKetiga',
        'kerabatTiga',
        'jenisKonsumsi',
        'alergi',
        'buktiTransaksi',
    ];
}
