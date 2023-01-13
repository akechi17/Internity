<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Contracts\Role as RoleContract;
use Spatie\Permission\Models\Role as RoleModel;

class Role extends RoleModel implements RoleContract
{
    use HasFactory;

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', "%$search%");
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }
}
