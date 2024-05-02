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
        'jawaban_kelompok'
    ];

    protected $primaryKey = 'id';

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function kunci_jawaban(): BelongsTo
    {
        return $this->belongsTo(Kunci_jawaban::class);
    }
}
