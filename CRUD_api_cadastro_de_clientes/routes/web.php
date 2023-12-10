<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Console\Commands\CheckDrawsAndNotifyWinners;

Route::get('/test-email-notification', function () {
    Artisan::call(CheckDrawsAndNotifyWinners::class);
    return 'Tarefa programada executada manualmente.';
});

Route::get('/', function () {
    return view('welcome');
});
