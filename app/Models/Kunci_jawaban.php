<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kunci_jawaban extends Model
{
    use HasFactory;

    protected $table = 'kunci_jawabans';
    protected $fillable = [
        'id',
        'jawaban'
    ];

    protected $primaryKey = 'id';
    public $incrementing = false;


    public function data_jawaban(): HasMany
    {
        return $this->hasMany(Data_jawaban::class);
    }
    
}
