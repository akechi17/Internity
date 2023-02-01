<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Vacancy;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::all();
        foreach ($companies as $company) {
            $jobTitle = fake()->jobTitle;
            Vacancy::create([
                'name' => $jobTitle,
                'category' => fake()->randomElement(['IT', 'Marketing', 'Finance', 'Human Resources']),
                'description' => fake()->sentence,
                'slots' => fake()->numberBetween(1, 5),
                'status' => 1,
                'company_id' => $company->id,
            ]);
        }
    }
}
