<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;


Route::get("/pets", [PetController::class,"index"]);

Route::post("/pets", [PetController::class,"store"]);

Route::delete("/pets/{id}", [PetController::class,"destroy"]);
