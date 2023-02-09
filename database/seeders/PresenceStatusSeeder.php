<?php

namespace Database\Seeders;

use App\Models\PresenceStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PresenceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $presenceStatuses = [
            [
                'school_id' => 1,
                'name' => 'presence',
                'color' => '#00FF00',
            ],
            [
                'school_id' => 1,
                'name' => 'late',
                'color' => '#FFA500',
            ],
            [
                'school_id' => 1,
                'name' => 'absence',
                'color' => '#FF0000',
            ],
            [
                'school_id' => 1,
                'name' => 'excused',
                'color' => '#0000FF',
            ],
            [
                'school_id' => 1,
                'name' => 'sick',
                'color' => '#FF00FF',
            ],
            [
                'school_id' => 1,
                'name' => 'holiday',
                'color' => '#00FFFF',
            ]
        ];

        foreach ($presenceStatuses as $presenceStatus) {
            PresenceStatus::create($presenceStatus);
        }

    }
}
