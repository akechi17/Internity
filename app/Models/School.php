<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'website',
        'logo',
        'status',
    ];

    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    public function courses()
    {
        return $this->hasManyThrough(Course::class, Department::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'school_user', 'school_id', 'user_id');
    }

    public function news()
    {
        return $this->morphMany(News::class, 'newsable');
    }

    public function code()
    {
        return $this->morphOne(Code::class, 'codeable');
    }
}
