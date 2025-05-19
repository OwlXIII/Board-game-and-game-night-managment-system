<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Linking to BoardGame Table
     *
     * @return HasMany
     */
    public function games() : HasMany
    {
        return $this->hasMany(BoardGame::class, 'created_by');
    }

    /**
     * Linking to GameReviews Table
     *
     * @return HasMany
     */
    public function gameReviews() : HasMany
    {
        return $this->hasMany(GameReviews::class);
    }

    /**
     * Linking to GameNight Table
     *
     * @return HasMany
     */
    public function gameNights() : HasMany
    {
        return $this->hasMany(GameNight::class, 'created_by');
    }

    /**
     * Linking to EventParticipants Table
     *
     * @return HasMany
     */
    public function eventParticipations() : HasMany
    {
        return $this->hasMany(EventParticipants::class);
    }

    /**
     * Linking to GameSuggestions Table
     *
     * @return HasMany
     */
    public function gameSuggestions() : HasMany
    {
        return $this->hasMany(GameSuggestions::class, 'suggested_by');
    }

    /**
     * Checking if user is Admin
     *
     * @return bool
     */
    public function isAdmin() : bool
    {
        return $this->role === 'admin';
    }
}
