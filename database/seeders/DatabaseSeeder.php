<?php

namespace Database\Seeders;

use App\Models\Kunci_jawaban;
use App\Models\Data_jawaban;
use App\Models\JawabanLabirin;
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
            'password' => Hash::make('12345678'),
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
            'is_panit' => 1,
            'is_validated' => 1,

            'created_at' => Carbon::now()->setTime(23, 59, 59)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->setTime(23, 59, 59)->format('Y-m-d H:i:s')
        ]);


        User::create([
            'asalSekolah' => 'SMAK ABCD',
            'namaKelompok' => 'pesertaDua',
            'password' => Hash::make('12345678'),
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
            'is_panit' => 1,
            'is_validated' => 1,

            'created_at' => Carbon::now()->setTime(23, 59, 59)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->setTime(23, 59, 59)->format('Y-m-d H:i:s')
        ]);


        User::create([
            'asalSekolah' => 'SMAK ABCD',
            'namaKelompok' => 'pesertaTiga',
            'password' => Hash::make('12345678'),
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
            'is_panit' => 1,
            'is_validated' => 1,

            'created_at' => Carbon::now()->setTime(23, 59, 59)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->setTime(23, 59, 59)->format('Y-m-d H:i:s')
        ]);

        User::create([
            'asalSekolah' => 'SMAK ABCD',
            'namaKelompok' => 'pesertaEmpat',
            'password' => Hash::make('12345678'),
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
            'is_panit' => 1,
            'is_validated' => 1,

            'created_at' => Carbon::now()->setTime(23, 59, 59)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->setTime(23, 59, 59)->format('Y-m-d H:i:s')
        ]);

    
        User::create([
            'asalSekolah' => 'admin',
            'namaKelompok' => 'admin',
            'password' => Hash::make('12345678'),
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
            'is_panit' => 0,

            'created_at' => Carbon::now()->setTime(23, 59, 59)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->setTime(23, 59, 59)->format('Y-m-d H:i:s')
        ]);

        User::where('namaKelompok', 'admin')->update(['is_admin' => 1]);

        for ($i = 1; $i <= 20; $i++) {
            Kunci_jawaban::create([
                'id' => $i,
                'jawaban' => 'kunci' . $i
            ]);
        }

        $this->call([
            DataSoalBomSeeder::class,
            JawabanLabirinSeeder::class
        ]);
    }
}
