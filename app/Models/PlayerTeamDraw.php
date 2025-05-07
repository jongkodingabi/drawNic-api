<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerTeamDraw extends Model
{
    protected $fillable = [
        'player_id',
        'team_id',
    ];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
