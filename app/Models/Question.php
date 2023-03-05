<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'school_id',
        'order',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
