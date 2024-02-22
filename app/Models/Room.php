<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Room extends Model
{
    use SoftDeletes, HasFactory;

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
