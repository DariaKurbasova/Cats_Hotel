<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Placement extends BaseModel
{
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
