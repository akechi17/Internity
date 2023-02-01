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

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'company_department', 'company_id', 'department_id');
    }

    public function scopeActive()
    {
        return $this->where('status', 1);
    }

    public function scopeInactive()
    {
        return $this->where('status', 0);
    }

    public function scopeSchool($query, $school)
    {
        return $query->where('school_id', $school);
    }

    public function scopeDepartment($query, $department)
    {
        return $query->whereRelation('departments', 'id', $department);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%' . $search . '%')
            ->orWhere('category', 'like', '%' . $search . '%')
            ->orWhere('city', 'like', '%' . $search . '%')
            ->orWhere('state', 'like', '%' . $search . '%')
            ->orWhere('country', 'like', '%' . $search . '%')
            ->orWhere('address', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->orWhere('website', 'like', '%' . $search . '%');
    }
}
