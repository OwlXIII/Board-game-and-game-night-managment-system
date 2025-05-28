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
        Schema::table('game_nights', function (Blueprint $table) {
            $table->string('street')->after('event_time');
            $table->string('city')->after('street');
            $table->string('country')->after('city');
            $table->string('street_number')->after('street');
            $table->dropColumn('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('game_nights', function (Blueprint $table) {
            $table->dropColumn('street');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('street_number');
            $table->string('location', 255);
        });
    }
};
