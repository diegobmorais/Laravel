<?php

use Illuminate\Support\Facades\Route;


Route::get('/','App\Http\Controllers\PrincipalController@principal');

Route::get('/sobre-nos', 'App\Http\Controllers\SobreNosController@sobreNos');

Route::get('/contato', 'App\Http\Controllers\ContatoController@contato');
Route::get('/login', function(){
    return 'login';
});

// Agrupamento de rotas para /app
Route::prefix('/app')->group(function(){

    Route::get('/clientes', function(){
        return 'clientes';
    });
    Route::get('/fornecedores','App\Http\Controllers\FornecedorController@index' )->name('app.fornecedor');
    Route::get('/produtos', function(){
        return 'produtos';
    });

});

