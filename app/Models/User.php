<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'asalSekolah',
        'namaKelompok',
        'password',
        'buktiTransaksi',
        'emailPerwakilan',
        'namaSatu',
        'kontakSatu',
        'kartuPelajarSatu',
        'namaDua',
        'kontakDua',
        'kartuPelajarDua',
        'namaTiga',
        'kontakTiga',
        'kartuPelajarTiga',
    ];

    protected $primaryKey = 'id';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function data_jawaban(): HasMany
    {
        return $this->hasMany(Data_jawaban::class);
    }

    public function data_bomsoal(): HasOne
    {
        return $this->hasOne(Data_bomsoal::class, 'kelompok_id');
    }
}
