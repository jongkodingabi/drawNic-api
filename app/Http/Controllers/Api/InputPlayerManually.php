<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\PlayerTeamDraw;
use Illuminate\Http\Request;

class InputPlayerManually extends Controller
{
    public function inputPlayerManually(Request $request) {
        $validated = $request->validate([
            'player_id' => 'required|exists:players,id',
            'team_id' => 'required|exists:teams,id',
        ]);

        // Cek apakah player sudah di assign sebelumnya
        $exists = PlayerTeamDraw::where('player_id', $validated['player_id'])->exists();
        if ($exists) {
            return response()->json(['message' => 'Player already assigned to a team.'], 400);
        }

        // Simpan Player penanda awal
        PlayerTeamDraw::create([
            'player_id' => $validated['player_id'],
            'team_id' => $validated['team_id'],
            'is_manual' => true,
        ]);

        return response()->json(['message' => 'Player asiggned manually successfully.']);
    }

    public function getNotAssignedPLayer() {
        $players = Player::whereDoesntHave('teamDraw')->get();

        return response()->json([
            'message'=> 'this is list of player who doesnt have a team',
            'data' => $players,
        ]);
    }
}
