<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/clients', [ClienteController::class, 'index']);
Route::get('/clients/{id}', [ClienteController::class, 'show']);
Route::post('/clients', [ClienteController::class, 'store']);
Route::put('/clients/{id}', [ClienteController::class, 'update']);
Route::delete('/clients/{id}', [ClienteController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
