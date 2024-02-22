<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Placement extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'date_from',
        'date_to',
        'cats_count',
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function placements(): HasMany
    {
        return $this->hasMany(Cat::class);
    }
}
