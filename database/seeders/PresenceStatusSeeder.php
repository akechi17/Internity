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
                'name' => 'Hadir',
                'color' => '#00FF00',
            ],
            [
                'school_id' => 1,
                'name' => 'Alpa',
                'color' => '#FF0000',
            ],
            [
                'school_id' => 1,
                'name' => 'Izin',
                'color' => '#0000FF',
            ],
            [
                'school_id' => 1,
                'name' => 'Sakit',
                'color' => '#FF00FF',
            ],
            [
                'school_id' => 1,
                'name' => 'Libur',
                'color' => '#00FFFF',
            ]
        ];

        foreach ($presenceStatuses as $presenceStatus) {
            PresenceStatus::create($presenceStatus);
        }

    }
}
