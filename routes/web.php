<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Login route
Route::post('/login', [AuthenticatedSessionController::class, 'store']);


// Logout route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);


require __DIR__.'/auth.php';
