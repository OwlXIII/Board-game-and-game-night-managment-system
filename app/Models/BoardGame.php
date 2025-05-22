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

    protected $table = 'board_games';

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
     * Board Game Filter System
     *
     * @param $query
     * @param $filters
     * @return mixed
     */
    public function scopeSearch($query, $filters)
    {
        $query->where('status', 'approved');

        if (!empty($filters['search'])) {
            $query->where('title', 'like', '%' . $filters['search'] . '%');
        }

        if (!empty($filters['category'])) {
            $query->where('category', $filters['category']);
        }

        if (!empty($filters['complexity'])) {
            $query->where('complexity', $filters['complexity']);
        }

        if (!empty($filters['min_players'])) {
            $query->where('min_players', '<=', $filters['min_players']);
        }

        if (!empty($filters['max_players'])) {
            $query->where('max_players', '>=', $filters['max_players']);
        }

        if (!empty($filters['min_duration'])) {
            $query->where('duration', '>=', $filters['min_duration']);
        }

        if (!empty($filters['max_duration'])) {
            $query->where('duration', '<=', $filters['max_duration']);
        }

        return $query;
    }

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
        return $this->hasMany(GameReviews::class, 'game_id');
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
