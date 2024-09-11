<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use SoftDeletes, Filterable;

    public function scopeWhereLike(Builder $query, string $column, string $value): Builder
    {
        $cleanVal = str_replace(['%', '_'], ['\%', '\_'], $value);

        return $query->where($column, 'LIKE', "%$cleanVal%");
    }
}
