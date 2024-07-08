<?php

namespace Database\Seeders;

use App\Models\Data_bomsoal;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataSoalBomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataPesertas = User::where('is_admin', 0)
        ->where('is_validated', 1)
        ->get();

        foreach ($dataPesertas as $data) {
            Data_bomsoal::updateOrCreate(
                ['kelompok_id' => $data->id],
                ['jawaban_bom1' => '0', 'jawaban_bom2' => '0']
            );
        }
    }
}
