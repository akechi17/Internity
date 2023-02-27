<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Searchable;

class Vacancy extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'category',
        'description',
        'status',
        'slots',
        'company_id',
    ];

    // #[SearchUsingFullText(['skills'])]
    // public function toSearchableArray()
    // {
    //     return [
    //         'name' => $this->name,
    //         'category' => $this->category,
    //         'description' => $this->description,
    //         'status' => $this->status,
    //         'slots' => $this->slots,
    //         'skills' => $this->skills,
    //         'company_id' => $this->company_id,
    //     ];
    // }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_vacancy', 'vacancy_id', 'department_id');
    }

    public function scopeCompany($query, $company)
    {
        return $query->where('company_id', $company);
    }
}
