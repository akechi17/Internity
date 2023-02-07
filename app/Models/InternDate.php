<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'user_id',
        'start_date',
        'end_date',
        'extend',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
