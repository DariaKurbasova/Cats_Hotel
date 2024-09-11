<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class Room extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'size',
        'description',
        'is_valid',
    ];

    public function scopeOnlyValid(Builder $builder): void
    {
        $builder->where('is_valid', true);
    }
}
