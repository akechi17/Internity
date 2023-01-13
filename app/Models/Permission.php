<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Contracts\Permission as PermissionContract;
use Spatie\Permission\Models\Permission as PermissionModel;

class Permission extends PermissionModel implements PermissionContract
{
    use HasFactory;

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
