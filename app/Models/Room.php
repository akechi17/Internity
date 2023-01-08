<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'company_id',
    ];

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function codeable()
    {
        return $this->morphOne(Code::class, 'codeable');
    }
}
