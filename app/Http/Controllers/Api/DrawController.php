<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\PlayerTeamDraw;
use App\Models\Team;

class DrawController extends Controller
{
    public function execute()
{
    // Ambil player yang belum di-assign
    $players = Player::whereDoesntHave('teamDraw')->get();
    $teams = Team::all();

    if ($players->isEmpty() || $teams->isEmpty()) {
        return response()->json(['message' => 'Tidak ada player atau tim tersedia'], 400);
    }

    $assigned = [];
    $teamIndex = 0;
    $teamCount = $teams->count();

    foreach ($players as $player) {
        $team = $teams[$teamIndex];
        $draw = PlayerTeamDraw::create([
            'player_id' => $player->id,
            'team_id'   => $team->id,
            'is_manual' => false,
        ]);
        $assigned[] = $draw;
        $teamIndex = ($teamIndex + 1) % $teamCount;
    }

    return response()->json([
        'message' => 'Undian berhasil dilakukan',
        'data'    => $assigned,
    ]);
}

    
    

    public function results() {
        $results = PlayerTeamDraw::with(['player', 'team'])->get();
        return response()->json($results);
    }


    public function destroy($id) {
        $entry = PlayerTeamDraw::find($id);

        if (! $entry) {
            return response()->json(['message' => 'Assignment not found'], 404);
        }

        $entry->delete();

        return response()->json(['message' => 'Successfully deleted data']);

    }
}
