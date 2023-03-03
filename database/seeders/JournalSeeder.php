<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Journal;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JournalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::where('email', 'student@test.dev')->first();
        // Journal::factory()->count(5)->create([
        //     'user_id' => $user->id,
        //     'company_id' => $user->companies()->first()->id,
        //     'date' => now(),
        // ]);

        // $user = User::where('email', 'student2@test.dev')->first();
        // Journal::factory()->count(1)->create([
        //     'user_id' => $user->id,
        //     'company_id' => $user->companies()->first()->id,
        //     'date' => now(),
        // ]);
    }
}
