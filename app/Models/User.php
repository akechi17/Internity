<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'bio',
        'address',
        'phone',
        'date_of_birth',
        'status',
        'password_by_admin',
        'last_login',
        'last_login_ip'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function schools()
    {
        return $this->belongsToMany(School::class, 'school_user', 'user_id', 'school_id');
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_user', 'user_id', 'department_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_user', 'user_id', 'course_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', "%$search%")
                    ->where('email', 'like', "%$search%");
    }

    public function scopeManager($query, $school_id)
    {
        return $query->whereHas('schools', function ($query) use ($school_id) {
            $query->where('school_id', $school_id);
        });
    }

    public function scopeTeacher($query, $department_id)
    {
        return $query->whereRelation('departments', 'id', $department_id)
                    ->whereHas('roles', function ($query) {
                        $query->where('name', 'student');
                    });
    }
}
