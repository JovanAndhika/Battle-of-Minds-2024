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
            2258, 2551, 1808, 2140, 1414,
            1304, 2422, 2905, 2385, 2302,
            1792, 2362, 1222, 2265, 1943, 
            2675
        ];

        $jawabanLabirin2 = [
            20276, 14393, 14303, 23274, 24969,
            4800, 12752, 43052, 43612, 31637,
            43930, 13921, 60285, 11251, 46936,
            4988, 12784, 17241, 50656, 55714,
            39434, 14019
        ];

        $jawabanLabirin3 = [
            504, 328, 540, 966, 829,
            678, 594, 932, 648, 524,
            193, 696, 847, 661, 1041,
            520, 330, 720, 107, 634,
            429, 443, 668, 221, 89,
            531, 412, 648, 412, 232, 
            376
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
