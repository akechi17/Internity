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
    ];

    public function score()
    {
        return $this->hasMany(Score::class);
    }
}
