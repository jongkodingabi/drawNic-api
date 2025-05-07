<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        // Logic to retrieve and return all teams
        Team::all();

        return response()->json(['message' => 'List of all teams']);
    }

    public function show($id)
    {
        // Logic to retrieve and return a specific team
        $team = Team::findOrFail($id);

        return response()->json(['message' => 'Details of team with ID: ' . $id]);
    }

    public function store(Request $request)
    {
        // Logic to create a new team
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'string|max:255|unique:teams',
        ]);

        return response()->json(['message' => 'Team created successfully'], 201);
    }

    public function update(Team $team, $id, Request $request)
    {
        // Logic to update an existing team
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'color' => 'sometimes|required|string|max:255|unique:teams,color,' . $id,
        ]);

        $team->update($data);

        return response()->json(['message' => 'Team updated successfully']);
    }

    public function destroy(Team $team)
    {
        // Logic to delete a team
        $team->delete();
        return response()->json(['message' => 'Team deleted successfully']);
    }
}
