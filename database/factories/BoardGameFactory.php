<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BoardGame>
 */
class BoardGameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph,
            'category' => $this->faker->randomElement(['Strategy', 'Party', 'Card', 'Co-op', 'Family']),
            'min_players' => $min = $this->faker->numberBetween(1, 4),
            'max_players' => $min + $this->faker->numberBetween(1, 5),
            'duration' => $this->faker->numberBetween(30, 120),
            'complexity' => $this->faker->randomElement(['low', 'medium', 'high']),
            'rules' => $this->faker->paragraph,
            'created_by' => User::inRandomOrder()->first()->id ?? User::factory(),
            'status' => $this->faker->randomElement(['pending', 'approved', 'denied']),
        ];
    }
}
