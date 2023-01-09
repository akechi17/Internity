<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use App\Models\School;
use App\Models\Department;
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

        $school = School::where('name', 'SMKN 1 Cibinong')->first();
        $user = User::create([
            'name' => 'Manager',
            'email' => 'manager@test.dev',
            'password' => bcrypt('123qweasd'),
        ]);
        $user->assignRole('manager');
        $user->schools()->attach($school->id);

        $department = Department::where('name', 'SIJA')->where('school_id', $school->id)->first();
        $user = User::create([
            'name' => 'Teacher',
            'email' => 'teacher@test.dev',
            'password' => bcrypt('123qweasd'),
        ]);
        $user->assignRole('teacher');
        $user->departments()->attach($department->id);

        $user = User::create([
            'name' => 'Mentor',
            'email' => 'mentor@test.dev',
            'password' => bcrypt('123qweasd'),
        ]);
        $user->assignRole('mentor');

        $course = Course::where('name', 'XIII SIJA 1')->where('department_id', $department->id)->first();
        $user = User::create([
            'name' => 'Student',
            'email' => 'student@test.dev',
            'password' => bcrypt('123qweasd'),
        ]);
        $user->assignRole('student');
        $user->courses()->attach($course->id);

        $courses = Course::all();
        foreach ($courses as $course) {
            User::factory()->count(5)->create()->each(function ($user) use ($course) {
                $user->assignRole('student');
                $user->courses()->attach($course->id);
            });

            User::factory()->count(3)->create()->each(function ($user) use ($course) {
                $user->assignRole('teacher');
                $user->departments()->attach($course->department->id);
            });
        }

        $schools = School::all();
        foreach ($schools as $school) {
            User::factory()->count(1)->create()->each(function ($user) use ($school) {
                $user->assignRole('admin');
                $user->schools()->attach($school->id);
            });
        }
    }
}
