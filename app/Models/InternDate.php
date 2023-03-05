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
        'finished',
    ];

    protected $appends = [
        'duration',
    ];

    public function getDurationAttribute()
    {
        // Get duration in month
        $start = new \DateTime($this->start_date);
        $end = new \DateTime($this->end_date);
        $interval = $start->diff($end);
        $duration = $interval->format('%m');

        return $duration;
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
