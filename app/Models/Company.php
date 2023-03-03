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
        'department_id',
        'contact_person',
    ];

    protected $orderBy = [
        'created_at' => 'desc',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'company_user', 'company_id', 'user_id');
    }

    public function presences()
    {
        return $this->hasMany(Presence::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function internDates()
    {
        return $this->hasMany(InternDate::class);
    }

    public function monitors()
    {
        return $this->hasMany(Monitor::class);
    }

    public function scopeActive()
    {
        return $this->where('status', 1);
    }

    public function scopeInactive()
    {
        return $this->where('status', 0);
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
