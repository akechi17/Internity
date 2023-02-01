<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'company_id',
        'room_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_vacancy', 'vacancy_id', 'department_id');
    }

    public function scopeCompany($query, $company)
    {
        return $query->where('company_id', $company);
    }
}
