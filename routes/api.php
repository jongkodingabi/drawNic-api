<?php

use App\Http\Controllers\Api\PlayerController;
use App\Http\Controllers\Api\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Player Api Routes
Route::apiResource('players', PlayerController::class);

// Team Api Routes
Route::apiResource('teams', TeamController::class);

// Draw Api Routes
Route::get('draw', [\App\Http\Controllers\Api\DrawController::class, 'execute']);
Route::get('draw/results', [\App\Http\Controllers\Api\DrawController::class, 'results']);
