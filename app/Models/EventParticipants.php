<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventParticipants extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'game_night_id',
    ];

    /**
     * Linking to User Table
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Linking to GameNight Table
     *
     * @return BelongsTo
     */
    public function gameNight(): BelongsTo
    {
        return $this->belongsTo(GameNight::class);
    }
}
