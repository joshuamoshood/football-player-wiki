<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Player extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'age',
        'country_id',
        'football_club_id',
        'profile_pic',
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function club(): BelongsTo
    {
        return $this->belongsTo(FootballClub::class, 'football_club_id');
    }

    public function playerStat(): HasOne
    {
        return $this->hasOne(PlayerStat::class, 'player_id');
    }
}
