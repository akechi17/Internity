<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = School::all();
        foreach ($schools as $school) {
            Company::factory()->count(25)->create([
                'school_id' => $school->id,
            ]);
        }
    }
}
