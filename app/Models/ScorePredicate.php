<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScorePredicate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'color',
        'min',
        'max',
        'school_id',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->orWhere('color', 'like', "%$search%")
            ->orWhere('min', 'like', "%$search%")
            ->orWhere('max', 'like', "%$search%");
    }
}
