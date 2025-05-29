<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class GameSuggestions extends Model
{
    protected $fillable = ['game_night_id', 'game_id', 'suggested_by'];
    /**
     * Linking to GameNight Table
     *
     * @return BelongsTo
     */
    public function gameNight(): BelongsTo
    {
        return $this->belongsTo(GameNight::class);
    }

    /**
     * Linking to BoardGame Table
     *
     * @return BelongsTo
     */
    public function boardGame(): BelongsTo
    {
        return $this->belongsTo(BoardGame::class, 'game_id');
    }

    /**
     * Linking to User Table
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'suggested_by');
    }

    /**
     * Linking to User Table
     *
     * @return BelongsToMany
     */
    public function voters(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'game_suggestion_votes', 'game_suggestion_id', 'user_id')->withTimestamps();
    }
}
