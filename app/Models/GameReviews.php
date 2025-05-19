<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GameReviews extends Model
{
    /**
     * Linking to User Table
     *
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Linking to BoardGame Table
     *
     * @return BelongsTo
     */
    public function game() : BelongsTo
    {
        return $this->belongsTo(BoardGame::class);
    }
}
