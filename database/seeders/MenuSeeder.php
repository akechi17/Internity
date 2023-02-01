<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\School;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $school = School::first();
        $menus = [
            [
                'name' => 'Dashboard',
                'icon' => 'material-symbols:space-dashboard',
                'url' => 'dashboard',
                'status' => 1,
                'order' => 1,
                'parent_id' => null,
            ],
            [
                'name' => 'Siswa',
                'icon' => 'mdi:account-multiple',
                'url' => 'students',
                'status' => 1,
                'order' => 10,
                'parent_id' => null,
                'permission_id' => Permission::where('name', 'user-list')->first()->id,
            ],
            [
                'name' => 'Kompetensi Keahlian',
                'icon' => 'mdi:book-open-page-variant',
                'url' => 'departments',
                'status' => 1,
                'order' => 20,
                'parent_id' => null,
                'permission_id' => Permission::where('name', 'department-list')->first()->id,
            ],
            [
                'name' => 'Sekolah',
                'icon' => 'mdi:home-city',
                'url' => 'schools/' . encrypt($school->id),
                'status' => 1,
                'order' => 30,
                'parent_id' => null,
                'permission_id' => Permission::where('name', 'school-list')->first()->id,
            ],
            [
                'name' => 'Kontrol Akses',
                'icon' => 'icon-park-outline:permissions',
                'url' => '#',
                'status' => 1,
                'order' => 40,
                'parent_id' => null,
                'permission_id' => Permission::where('name', 'user-list')->first()->id,
            ],
            [
                'name' => 'User',
                'icon' => 'mdi:user-multiple',
                'url' => 'users',
                'status' => 1,
                'order' => 41,
                'parent_id' => 5,
                'permission_id' => Permission::where('name', 'user-list')->first()->id,
            ],
            [
                'name' => 'Role',
                'icon' => 'icon-park-outline:permissions',
                'url' => 'roles',
                'status' => 1,
                'order' => 42,
                'parent_id' => 5,
                'permission_id' => Permission::where('name', 'role-list')->first()->id,
            ],
        ];

        foreach ($menus as $menu) {
            $menu = Menu::create($menu);
        }
    }
}
