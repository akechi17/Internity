<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = [
            [
                'name' => 'SMKN 1 Cibinong',
                'address' => 'Jl. Raya Karadenan No.7, Karadenan, Kec. Cibinong, Kabupaten Bogor, Jawa Barat 16111',
                'phone' => '0251-8663846',
                'email' => 'smkn1cbn@sch.id',
                'website' => 'smkn1cibinong.sch.id',
            ],
            // [
            //     'name' => 'SMKN 1 Bojonggede',
            //     'address' => 'Jl. Perum Pura, Tajurhalang, Kec. Tajur Halang, Kabupaten Bogor, Jawa Barat 16320',
            //     'phone' => '0251-8551934',
            //     'email' => 'smk@smkn1bojonggede.sch.id',
            //     'website' => 'https://www.smkn1bojonggede.sch.id',
            // ],
            // [
            //     'name' => 'SMKN 1 Depok',
            //     'address' => 'Jl. Raya Karadenan No.7, Karadenan, Kec. Cibinong, Kabupaten Bogor, Jawa Barat 16111',
            //     'phone' => '021-8790-7233',
            //     'email' => 'smkn1depok@gmail.com',
            //     'website' => 'https://www.smkn1depok.sch.id/',
            // ]
        ];

        foreach ($schools as $school) {
            $created = School::create($school);
            $created->code()->create([
                'code' => bin2hex(random_bytes(6/2)),
                'expired_at' => now()->addCenturies(2),
            ]);
        }
    }
}
