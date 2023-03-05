<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Score;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::whereHas('internDates', function ($query) {
            $query->where('finished', 1);
        })->get();

        foreach ($users as $user) {
            $subjects = ['Komunikasi', 'Kerja sama tim', 'Kerapihan', 'Kedisiplinan'];
            foreach ($subjects as $subject) {
                $score = rand(70, 100);
                Score::create([
                    'company_id' => $user->internDates->last()->company_id,
                    'name' => $subject,
                    'score' => $score,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
