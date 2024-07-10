<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Data_bomsoal extends Model
{
    use HasFactory;
    protected $table = 'data_bomsoals';
    protected $fillable = [
        'kelompok_id',
        'jawaban_bom1',
        'jawaban_bom2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
