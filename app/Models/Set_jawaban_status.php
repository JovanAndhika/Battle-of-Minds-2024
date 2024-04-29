<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Set_jawaban_status extends Model
{
    use HasFactory;

    protected $table = 'set_jawabans_status';
    protected $fillable = [
        'kelompok_id',
        'status_paket_a',
        'status_paket_b',
        'status_paket_c',
        'status_paket_d',
        'status_paket_e',
        'status_paket_f',
    ];


    public function peserta(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
