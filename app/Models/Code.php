<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'codeable_id',
        'codeable_type',
        'expired_at',
    ];

    public function codeable()
    {
        return $this->morphTo();
    }
}
