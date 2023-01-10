<?php

namespace Database\Seeders;

use App\Models\Room;
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
            $room = Room::factory()->count(2)->create([
                'company_id' => $company->id,
            ])->each(function ($room) use ($company) {
                Vacancy::create([
                    'name' => $room->name . ' - ' . $company->name,
                    'description' => fake()->sentence,
                    'slots' => fake()->numberBetween(1, 5),
                    'status' => 1,
                    'room_id' => $room->id,
                ]);
            });
        }
    }
}
