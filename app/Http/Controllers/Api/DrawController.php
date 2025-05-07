<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\PlayerTeamDraw;
use App\Models\Team;

class DrawController extends Controller
{
    public function execute() {
        $players = Player::inRandomOrder()->get();
        $teams = Team::all();
        $teamCount = $teams->count();

        if ($teamCount == 0) {
            return response()->json(['message' => 'No teams available'], 400);
        }

        PlayerTeamDraw::truncate();

        $i = 0;

        foreach ($players as $player) {
            $team = $teams[$i % $teamCount];
            PlayerTeamDraw::create([
                'player_id' => $player->id,
                'team_id' => $team->id,
            ]);
            $i++;
        }
        return response()->json(['message' => 'Players have been drawn to teams successfully']);
    }

    public function results() {
        $results = PlayerTeamDraw::with(['player', 'team'])->get();
        return response()->json($results);
    }
}
