<?php

use Illuminate\Support\Facades\Route;


Route::get('/','App\Http\Controllers\PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos', 'App\Http\Controllers\SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'App\Http\Controllers\ContatoController@contato')->name('site.contato');
Route::post('/contato', 'App\Http\Controllers\ContatoController@contato')->name('site.contato');

Route::get('/login', function(){
    return 'login';
})->name('site.login');

// Agrupamento de rotas para /app
Route::prefix('/app')->group(function(){

    Route::get('/clientes', function(){
        return 'clientes';
    })->name('app.clientes');
    Route::get('/fornecedores','App\Http\Controllers\FornecedorController@index' )->name('app.fornecedor');
    Route::get('/produtos', function(){
        return 'produtos';
    })->name('app.produtos');

});

