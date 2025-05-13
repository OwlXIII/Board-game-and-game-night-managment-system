<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GameSuggestions extends Model
{
    public function gameNight()
    {
        return $this->belongsTo(GameNight::class);
    }

    public function game()
    {
        return $this->belongsTo(BoardGame::class);
    }

    public function suggestedBy()
    {
        return $this->belongsTo(User::class, 'suggested_by');
    }
}
