<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Data_jawaban extends Model
{
    use HasFactory;

    protected $table = 'data_jawabans';
    protected $fillable = [
        'kelompok_id',
        'soal_no'
    ];

    public function kunci_paket_a(): BelongsTo
    {
        return $this->belongsTo(Kunci_paket_a::class);
    }

    public function peserta(): BelongsTo{
        return $this->belongsTo(Peserta::class);
    }
}
