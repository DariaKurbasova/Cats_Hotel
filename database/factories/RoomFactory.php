<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    public function definition(): array
    {
        $createdAt = fake()->dateTimeBetween('-1 years');

        return [
            'name' => fake()->colorName(),
            'size' => Arr::random(['S', 'M', 'L', 'XL']),
            'description' => fake()->text,
            'is_valid' => fake()->boolean(90),
            'created_at' => $createdAt,
            'updated_at' => fake()->dateTimeBetween($createdAt),
        ];
    }
}
