<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GameNight extends Model
{
    /**
     * Linking to User Table
     *
     * @return BelongsTo
     */
    public function creator() : belongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Linking to BoardGame Table
     *
     * @return BelongsToMany
     */
    public function games() : BelongsToMany
    {
        return $this->belongsToMany(BoardGame::class, 'game_night_games');
    }

    /**
     * Linking to EventParticipants Table
     *
     * @return HasMany
     */
    public function participants() : hasMany
    {
        return $this->hasMany(EventParticipants::class);
    }

    /**
     * Linking to GameSuggestions Table
     *
     * @return HasMany
     */
    public function suggestions() : HasMany
    {
        return $this->hasMany(GameSuggestions::class);
    }
}
