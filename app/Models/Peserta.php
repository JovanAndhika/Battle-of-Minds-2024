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
        'namaKelompok',
        'passPeserta',
        'buktiTransaksi',
        'emailPerwakilan',
        'namaSatu',
        'kontakSatu',
        'kartuPelajarSatu',
        'namaDua',
        'kontakDua',
        'kartuPelajarDua',
        'namaTiga',
        'kontakTiga',
        'kartuPelajarTiga',
    ];

    public function data_jawaban(): HasMany
    {
        return $this->hasMany(Data_jawaban::class);
    }

    public function set_jawabans_status(): HasMany{
        return $this->hasMany(Set_jawaban_status::class);
    }
}
