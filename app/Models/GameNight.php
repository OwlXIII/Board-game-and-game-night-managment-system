<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GameNight extends Model
{
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function games()
    {
        return $this->belongsToMany(BoardGame::class, 'game_night_games');
    }

    public function participants()
    {
        return $this->hasMany(EventParticipants::class);
    }

    public function suggestions()
    {
        return $this->hasMany(GameSuggestions::class);
    }
}
