<?php

namespace Database\Seeders;

use App\Models\Kunci_jawaban;
use App\Models\Data_jawaban;
use App\Models\Status;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
            'asalSekolah' => 'SMAK ABCD',
            'namaKelompok' => 'peserta',
            'password' => Hash::make('password'),
            'buktiTransaksi' => 'bukti-transaksi//komal.jpg',

            'emailPerwakilan' => 'asssss',
            'namaSatu' => 'Hasan Surabaya ABCDEFGH',
            'kontakSatu' => 'abcsefg@gmail.com',
            'kartuPelajarSatu' => 'debu',

            'namaDua' => 'Jevon',
            'kontakDua' => '2022',
            'kartuPelajarDua' => 'angin',

            'namaTiga' => 'Adi',
            'kontakTiga' => 'normal',
            'kartuPelajarTiga' => '-',

            'created_at' => Carbon::now()->setTime(23, 59, 59)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->setTime(23, 59, 59)->format('Y-m-d H:i:s')
        ]);

        User::where('namaKelompok', 'peserta')->update(['is_validated' => 1]);

        Status::create([
            'kelompok'=> 'Kelompok 1',
            'labirin_1'=> Carbon::now(),

        ]);
        Status::create([
            'kelompok'=> 'Kelompok 2',
            
            'labirin_1'=>Carbon::now(),
            'labirin_2'=>Carbon::now(),
            
        ]);
        Status::create([
            'kelompok'=> 'Kelompok 3',
            'labirin_1'=> Carbon::now(),
            'labirin_2'=> Carbon::now(),
            'labirin_3'=> Carbon::now(),
        
        ]);
        User::create([
            'asalSekolah' => 'admin',
            'namaKelompok' => 'C14220001',
            'password' => Hash::make('password'),
            'buktiTransaksi' => 'bukti-transaksi//komal.jpg',

            'emailPerwakilan' => 'asssss',
            'namaSatu' => 'Hasan Surabaya ABCDEFGH',
            'kontakSatu' => 'abcsefg@gmail.com',
            'kartuPelajarSatu' => 'debu',

            'namaDua' => 'Ado',
            'kontakDua' => '2022',
            'kartuPelajarDua' => 'angin',

            'namaTiga' => 'Adi',
            'kontakTiga' => 'normal',
            'kartuPelajarTiga' => '-',

            'created_at' => Carbon::now()->setTime(23, 59, 59)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->setTime(23, 59, 59)->format('Y-m-d H:i:s')
        ]);

        User::where('namaKelompok', 'C14220001')->update(['is_admin' => 1]);

        for ($i = 1; $i <= 300; $i++) {
            Kunci_jawaban::create([
                'id' => $i,
                'jawaban' => 'kunci' . $i
            ]);
        }
    }
}
