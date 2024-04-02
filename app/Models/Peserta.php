<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function data_jawaban(): HasMany
    {
        return $this->hasMany(Data_jawaban::class);
    }

    public function set_jawabans_status(): HasMany{
        return $this->hasMany(Set_jawaban_status::class);
    }
}
