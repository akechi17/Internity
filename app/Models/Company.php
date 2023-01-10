<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'city',
        'state',
        'country',
        'address',
        'email',
        'phone',
        'website',
        'logo',
        'school_id',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
