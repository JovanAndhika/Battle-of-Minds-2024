<?php

namespace Database\Seeders;

use App\Models\JawabanLabirin;
use Illuminate\Database\Seeder;

class JawabanLabirinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $jawabanLabirin1 = [
            0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0
            // 29151, 26767, 19350, 20228, 16754,
            // 29428, 25882, 22064, 23957, 10948,
            // 22518, 22784, 15355, 13712, 949, 17011
        ];

        $jawabanLabirin2 = [
            21387, 7658, 15588, 24275, 1691,
            2195, 23954, 1642, 46229, 22534,
            18858, 5861, 5667, 53019, 1525,
            4065, 2138, 17955, 3304, 3025,
            5099, 5714
        ];

        $jawabanLabirin3 = [
            462, 3389, 2380, 2351, 17826,
            120, 286, 5649, 3566, 79750,
            128, 5012, 37548, 374, 5771,
            76921, 126, 5577, 95938, 85796,
            3615, 78078, 5864, 6240, 107284,
            98722, 2397, 54280, 67370, 512, 5985
        ];

        // Find the maximum count of elements among all arrays
        $maxCount = max(count($jawabanLabirin1), count($jawabanLabirin2), count($jawabanLabirin3));

        for ($i = 0; $i < $maxCount; $i++) {
            JawabanLabirin::create([
                'labirin_1' => isset($jawabanLabirin1[$i]) ? $jawabanLabirin1[$i] : null,
                'labirin_2' => isset($jawabanLabirin2[$i]) ? $jawabanLabirin2[$i] : null,
                'labirin_3' => isset($jawabanLabirin3[$i]) ? $jawabanLabirin3[$i] : null,
            ]);
        }
    }
}
