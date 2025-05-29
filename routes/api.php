<?php

use App\Http\Controllers\Api\PlayerController;
use App\Http\Controllers\Api\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });


// Player Api Routes
Route::get('players/count', [PlayerController::class, 'count']);
Route::apiResource('players', PlayerController::class);

// Team Api Routes
Route::get('teams/count', [TeamController::class, 'count']);
Route::apiResource('teams', TeamController::class);

// Draw Api Routes
Route::post('draw', [\App\Http\Controllers\Api\DrawController::class, 'execute']);
Route::get('draw/results', [\App\Http\Controllers\Api\DrawController::class, 'results']);
