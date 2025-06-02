<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GameNight>
 */
class GameNightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Game Night: ' . $this->faker->words(2, true),
            'description' => $this->faker->optional()->paragraph,
            'event_time' => $this->faker->dateTimeBetween('+1 days', '+1 month'),
            'street' => $this->faker->streetName,
            'street_number' => $this->faker->buildingNumber,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'created_by' => User::inRandomOrder()->first()->id ?? User::factory(),
        ];
    }
}
