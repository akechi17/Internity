<?php

namespace Database\Seeders;

use App\Models\ScorePredicate;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScorePredicateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scorePredicates = [
            [
                'name' => 'D',
                'description' => 'Belum Lulus',
                'color' => '#ff0000',
                'min' => 60,
                'max' => 69,
            ],
            [
                'name' => 'C',
                'description' => 'Lulus Cukup',
                'color' => '#ffff00',
                'min' => 70,
                'max' => 79,
            ],
            [
                'name' => 'B',
                'description' => 'Lulus Baik',
                'color' => '#00ff00',
                'min' => 80,
                'max' => 89,
            ],
            [
                'name' => 'A',
                'description' => 'Lulus Amat Baik',
                'color' => '#00ffff',
                'min' => 90,
                'max' => 100,
            ],
        ];

        foreach ($scorePredicates as $scorePredicate) {
            ScorePredicate::create($scorePredicate);
        }
    }
}
