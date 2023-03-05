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

    protected $orderBy = [
        'updated_at' => 'desc',
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

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function scorePredicates()
    {
        return $this->hasMany(ScorePredicate::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
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
            ->orWhere('address', 'like', "%$search%")
            ->orWhere('phone', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->orWhere('website', 'like', "%$search%");
    }

    public function scopeNotAdmin($query, $school_id)
    {
        return $query->where('id', $school_id);
    }
}
