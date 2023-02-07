<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresenceStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
    ];

    public function presences()
    {
        return $this->hasMany(Presence::class);
    }
}
