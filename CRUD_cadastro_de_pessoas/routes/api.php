<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// cria automaticamento rotas CRUD (index, store, update, destroy, show)

Route::resource('pessoas', \App\Http\Controllers\PessoaController::class);

/*
Route::get('/pessoas', [\App\Http\Controllers\PessoaController::class, 'index']);
Route::post('/pessoas', [\App\Http\Controllers\PessoaController::class,'store']);
Route::put('/pessoas', [\App\Http\Controllers\PessoaController::class,'update']);
Route::delete('/pessoas', [\App\Http\Controllers\PessoaController::class,'destroy']);
Route::get('/pessoas/{id}', [\App\Http\Controllers\PessoaController::class,'show']);
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
