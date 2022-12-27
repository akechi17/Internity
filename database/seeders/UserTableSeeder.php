<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@test.dev',
            'password' => bcrypt('123qweasd'),
        ]);
        $user->assignRole('super-admin');

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@test.dev',
            'password' => bcrypt('123qweasd'),
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name' => 'Teacher',
            'email' => 'teacher@test.dev',
            'password' => bcrypt('123qweasd'),
        ]);
        $user->assignRole('teacher');

        $user = User::create([
            'name' => 'Mentor',
            'email' => 'mentor@test.dev',
            'password' => bcrypt('123qweasd'),
        ]);
        $user->assignRole('mentor');

        $user = User::create([
            'name' => 'Student',
            'email' => 'student@test.dev',
            'password' => bcrypt('123qweasd'),
        ]);
        $user->assignRole('student');

        User::factory()->count(50)->create();
    }
}
