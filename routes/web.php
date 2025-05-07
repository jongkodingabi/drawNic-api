<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PlayerController;

Route::get('/', function () {
    return view('welcome');
});


// Route For CRUD Player
Route::apiResource('players', PlayerController::class);