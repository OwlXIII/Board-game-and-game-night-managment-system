<?php

namespace Database\Seeders;

use App\Models\BoardGame;
use App\Models\GameNight;
use App\Models\GameSuggestions;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(3)->create(); // ensure some users exist

        BoardGame::factory()->count(10)->create();
        GameNight::factory()->count(10)->create();
        GameSuggestions::factory()->count(20)->create();
    }
}
