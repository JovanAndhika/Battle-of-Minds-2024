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
            22583, 4704, 18016, 15454, 13650,
            22996, 27925, 19974, 17379, 24082,
            13784, 27570, 25005, 18985, 30958
        ];

        $jawabanLabirin2 = [
            8555, 5519, 26432, 18255, 19344,
            43157, 4834, 7756, 9078, 4196,
            10182, 22509, 4179, 1221, 8413
        ];

        $jawabanLabirin3 = [
            512, 120, 6995, 1166, 4790,
            792, 560, 715, 3637, 3224,
            7256, 3777, 330, 4895, 128
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
