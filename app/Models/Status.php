<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';
    protected $guarded = ['id'];
    protected $fillable = ['kelompok_id','namaKelompok','asalSekolah','labirin_1','labirin_2','labirin_3','is_completed'];
    use HasFactory;
}
