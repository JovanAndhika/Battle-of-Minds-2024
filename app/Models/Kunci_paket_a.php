<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kunci_paket_a extends Model
{
    use HasFactory;

    protected $table = 'kuncis_paket_a';
    protected $fillable = [
        'id',
        'jawaban'
    ];

    protected $primaryKey = 'id';
    
}
