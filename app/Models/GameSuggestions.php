<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GameSuggestions extends Model
{
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
    public function game(): BelongsTo
    {
        return $this->belongsTo(BoardGame::class);
    }

    /**
     * Linking to User Table
     *
     * @return BelongsTo
     */
    public function suggestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
