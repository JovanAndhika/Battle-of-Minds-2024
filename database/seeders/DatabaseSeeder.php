<?php

namespace Database\Seeders;

use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Peserta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'nrp' => 'C14220001',
            'username' => 'khususpanitiabom',
            'password' => Hash::make('password'),
        ]);

        Peserta::create([
            'asalSekolah' => 'SMAK ABCD',
            'kontakSekolah' => 'abscd',
            'usernameKelompok' => 'peserta',
            'kelas' => 'abscs',
            'jurusan' => 'IPS',
            'kontakPerwakilan' => 'asssss',
            'confirmPass' => Hash::make('password'),
            'namaKetua' => 'Hasan Surabaya ABCDEFGH',
            'emailKetua' => 'abcsefg@gmail.com',
            'kerabatSatu' => 'kepo',
            'namaKedua' => 'Yasan',
            'kerabatDua' => 'kepo',
            'namaKetiga' => 'Susan',
            'kerabatTiga' => 'kepo',
            'jenisKonsumsi' => 'vegan',
            'alergi' => 'debu',
            'buktiTransaksi' => 'bukti-transaksi//komal.jpg',
            'created_at' => Carbon::now()->setTime(23,59,59)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->setTime(23,59,59)->format('Y-m-d H:i:s')
        ]);
    }
}
