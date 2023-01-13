<?php

namespace Database\Seeders;

use App\Models\Menu;
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
                'name' => 'User',
                'icon' => 'mdi:user-multiple',
                'url' => 'users',
                'status' => 1,
                'order' => 30,
                'parent_id' => null,
                'permission_id' => Permission::where('name', 'user-list')->first()->id,
            ],
            [
                'name' => 'Role',
                'icon' => 'icon-park-outline:permissions',
                'url' => 'roles',
                'status' => 1,
                'order' => 40,
                'parent_id' => null,
                'permission_id' => Permission::where('name', 'role-list')->first()->id,
            ],
        ];

        foreach ($menus as $menu) {
            $menu = Menu::create($menu);
        }
    }
}
