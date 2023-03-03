<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachers = User::whereHas('roles', function ($query) {
            $query->where('name', 'teacher');
        })->get();

        foreach ($teachers as $teacher) {
            News::factory()->count(3)->create([
                'user_id' => $teacher->id,
                'newsable_type' => 'App\Models\Department',
                'newsable_id' => $teacher->departments->first()->id,
            ]);
        }

        $manager = User::whereHas('roles', function ($query) {
            $query->where('name', 'manager');
        })->first();

        News::factory()->count(3)->create([
            'user_id' => $manager->id,
            'newsable_type' => 'App\Models\School',
            'newsable_id' => $manager->schools->first()->id,
        ]);
    }
}
