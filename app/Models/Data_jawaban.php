<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Data_jawaban extends Model
{
    use HasFactory;

    protected $table = 'data_jawabans';
    protected $fillable = [
        'kelompok_id',
        'soal_no',
        'jawaban'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
