<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
class EventParticipants extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gameNight()
    {
        return $this->belongsTo(GameNight::class);
    }
}
