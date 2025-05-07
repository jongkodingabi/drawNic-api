<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Logic to retrieve and return all players
        $players = Player::all();
        return response()->json(['message' => 'Players retrieved successfully', 'data' => $players]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Logic to create a new player
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'telephone' => 'required|string|max:255|unique:players',
            'position' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:120',
            'major' => 'required|string|max:255',
        ]);

        $player = Player::create($data);

        return response()->json(['message' => 'Player created successfully', 'data' => $player], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Logic to retrieve and return a specific player
        $player = Player::findOrFail($id);
        return response()->json(['message' => 'Player retrieved successfully', 'data' => $player]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Player $player, string $id, Request $request)
        // Logic to update an existing player
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'telephone' => 'sometimes|required|string|max:255|unique:players,telephone,' . $id,
            'position' => 'sometimes|required|string|max:255',
            'age' => 'sometimes|required|integer|min:1|max:120',
            'major' => 'sometimes|required|string|max:255',
        ]);

        $player->update($data);
        return response()->json(['message' => 'Player updated successfully', 'data' => $player]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        $player->delete();
    }
}
