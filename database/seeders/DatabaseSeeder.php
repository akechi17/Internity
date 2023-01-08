<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\School;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            SchoolSeeder::class,
            CompanySeeder::class,
            DepartmentSeeder::class,
            CourseSeeder::class,
            VacancySeeder::class,
            ScorePredicateSeeder::class,
            UserTableSeeder::class,
            NewsSeeder::class,
        ]);
    }
}
