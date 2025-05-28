<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('game_suggestions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_night_id')->constrained('game_nights')->onDelete('cascade');
            $table->foreignId('game_id')->constrained('board_games')->onDelete('cascade');
            $table->foreignId('suggested_by')->constrained('users')->onDelete('cascade');
            $table->unsignedInteger('votes')->default(0);
            $table->timestamps();
            $table->unique(['game_night_id', 'board_game_id', 'suggested_by']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_suggestions');
    }
};
