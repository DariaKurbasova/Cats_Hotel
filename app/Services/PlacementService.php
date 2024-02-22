<?php

namespace App\Services;

use App\Models\Room;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class PlacementService
{
    public function getDaysCount(string $dateFrom, string $dateTo): int
    {
        return Carbon::parse($dateFrom)->startOfDay()->diffInDays(Carbon::parse($dateTo)->endOfDay()) + 1;
    }

    public function calculatePlacement(int $catsCount, string $roomSize, int $daysCount): int
    {
        $catsRate = 1 + config('placement_rules.discount_for_more_cats') * ($catsCount - 1);

        return config("placement_rules.room_pro_day.$roomSize") * $catsRate * $daysCount;
    }

    public function getError(Room $room, int $daysCount, string $dateEnd, Collection $cats): ?string
    {
        if (!$room->is_valid) {
            return 'Извините, данный номер занят. Пожалуйста, выберите другой.';
        }

        if ($daysCount < config('placement_rules.min_days') || $daysCount > config('placement_rules.max_days')) {
            return 'Гостиница принимает котиков только на период от ' . config('placement_rules.min_days') . ' до '
                . config('placement_rules.max_days') . ' дней';
        }

        if ($room->size !== 'XL' && $cats->count() > 1) {
            return 'Чтобы разместить несколько кошек в одном номере, выберите, пожалуйста, номер категории XL.';
        }

        if ($cats->count() > config('placement_rules.max_cats')) {
            return 'Больше 3 котиков не получится разместить в одном номере.';
        }

        if ($cats->contains('vaccine_active_till', '<', $dateEnd)) {
            return 'Ради безопасности всех постояльцев гостиницы мы принимаем только питомцев с действующей до конца пребывания вакциной.';
        }

        return null;
    }
}
