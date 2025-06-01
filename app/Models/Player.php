<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name',
        'telephone',
        'position',
        'age',
        'major',
    ];

    public function teamDraw() {
        return $this->hasOne(PlayerTeamDraw::class);
    }
}
