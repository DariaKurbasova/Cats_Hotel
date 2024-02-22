<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Cat extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'sex',
        'breed',
        'birthday',
        'is_sterilised',
        'vaccine_active_till',
        'feeding_info',
        'communication_info',
        'more_info',
        'comment',
        'user_id',
    ];

    protected $appends = [
        'age',
        'is_vaccine_active', // ToDo Нужен ли атрибут?
    ];

    public function getAgeAttribute(): int
    {
        return Carbon::parse($this->birthday)->age;
    }

    public function getIsVaccineActiveAttribute(): bool
    {
        return now() <= $this->vaccine_active_till;
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function placements(): HasMany
    {
        return $this->hasMany(Placement::class);
    }

    /**
     * ToDo Сделать поле для пометки временной регистрации (при заполнении анкеты, но не оформления заказа), чтобы
     * потом раз в месяц командой проходить и чистить
     **/
}
