<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanLabirin extends Model
{
    use HasFactory;

    protected $table = 'jawaban_labirins';

    protected $fillable = ['labirin_1', 'labirin_2', 'labirin_3']; 

    public $timestamps = false;
}
