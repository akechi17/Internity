<?php

namespace Database\Seeders;

use App\Models\Appliance;
use App\Models\User;
use App\Models\Course;
use App\Models\School;
use App\Models\Company;
use App\Models\Vacancy;
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
        $school = School::where('name', 'SMKN 1 Cibinong')->first();
        $user = User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@test.dev',
            'password' => bcrypt('123qweasd'),
        ]);
        $user->assignRole('super-admin');
        $user->schools()->attach($school->id);

        // $user = User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@test.dev',
        //     'password' => bcrypt('123qweasd'),
        // ]);
        // $user->assignRole('admin');


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
        $user->schools()->attach($school->id);
        $user->departments()->attach($department->id);

        $company = Company::find(1);
        $vacancy = Vacancy::where('company_id', $company->id)->first();
        $user = User::create([
            'name' => 'Mentor',
            'email' => 'mentor@test.dev',
            'password' => bcrypt('123qweasd'),
        ]);
        $user->assignRole('mentor');
        $user->companies()->attach($company->id);

        $startDate = now()->subDays(30);
        $endDate = now()->addDays(180);
        $course = Course::where('name', 'XIII SIJA 1')->where('department_id', $department->id)->first();
        $user = User::create([
            'name' => 'Student',
            'email' => 'student@test.dev',
            'password' => bcrypt('123qweasd'),
        ]);
        $user->assignRole('student');
        $user->schools()->attach($school->id);
        $user->departments()->attach($department->id);
        $user->courses()->attach($course->id);
        $user->companies()->attach($company->id);
        $user->internDate()->create([
            'start_date' => $startDate,
            'end_date' => $endDate,
            'company_id' => $company->id,
            'user_id' => $user->id,
        ]);

        Appliance::create([
            'user_id' => $user->id,
            'vacancy_id' => $vacancy->id,
            'status' => 'accepted',
        ]);

        $courses = Course::all();
        foreach ($courses as $course) {
            User::factory()->count(5)->create()->each(function ($user) use ($course) {
                $user->assignRole('student');
                $user->schools()->attach($course->department->school_id);
                $user->departments()->attach($course->department_id);
                $user->courses()->attach($course->id);
            });

            User::factory()->count(3)->create()->each(function ($user) use ($course) {
                $user->assignRole('teacher');
                $user->schools()->attach($course->department->school_id);
                $user->departments()->attach($course->department->id);
            });
        }

        $schools = School::all();
        foreach ($schools as $school) {
            User::factory()->count(1)->create()->each(function ($user) use ($school) {
                $user->assignRole('manager');
                $user->schools()->attach($school->id);
            });
        }
    }
}
