<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Data_jawaban extends Model
{
    use HasFactory;

    protected $table = 'data_jawabans';
    protected $fillable = [
        'kelompok_id',
        'kunci_jawabans_id',
        'jawaban_kelompok',
    ];

    protected $primaryKey = 'id';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function kunci_jawaban(): HasOne
    {
        return $this->hasOne(Kunci_jawaban::class, 'id', 'kunci_jawabans_id');
    }
}
