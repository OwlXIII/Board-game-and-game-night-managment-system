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

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'category',
        'min_players',
        'max_players',
        'duration',
        'complexity',
        'rules',
        'created_by',
        'status',
    ];

    /**
     * Linking to User Table
     *
     * @return BelongsTo
     */
    public function creator() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Linking to GameReviews Table
     *
     * @return HasMany
     */
    public function reviews() : HasMany
    {
        return $this->hasMany(GameReviews::class);
    }

    /**
     * Linking to GameNight Table
     *
     * @return BelongsToMany
     */
    public function gameNights() : BelongsToMany
    {
        return $this->belongsToMany(GameNight::class, 'game_night_games');
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
