<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BoardGame extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'category',
        'player_count_min',
        'player_count_max',
        'duration_minutes',
        'complexity',
        'rules',
        'created_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function reviews()
    {
        return $this->hasMany(GameReviews::class);
    }

    public function gameNights()
    {
        return $this->belongsToMany(GameNight::class, 'game_night_games');
    }

    public function suggestions()
    {
        return $this->hasMany(GameSuggestions::class);
    }
}
