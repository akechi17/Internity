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
                'name' => 'presence',
                'color' => '#00FF00',
            ],
            [
                'name' => 'late',
                'color' => '#FFA500',
            ],
            [
                'name' => 'absence',
                'color' => '#FF0000',
            ],
            [
                'name' => 'excused',
                'color' => '#0000FF',
            ]
        ];

        foreach ($presenceStatuses as $presenceStatus) {
            PresenceStatus::create($presenceStatus);
        }

    }
}
