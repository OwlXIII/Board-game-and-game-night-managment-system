<?php

namespace Database\Factories;

use App\Models\BoardGame;
use App\Models\GameNight;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GameSuggestion>
 */
class GameSuggestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'game_night_id' => GameNight::inRandomOrder()->first()?->id ?? GameNight::factory(),
            'game_id' => BoardGame::inRandomOrder()->first()?->id ?? BoardGame::factory(),
            'suggested_by' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'votes' => $this->faker->numberBetween(0, 15),
        ];
    }
}
