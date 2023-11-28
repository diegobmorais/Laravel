<?php

use Illuminate\Support\Facades\Route;


Route::get('/','App\Http\Controllers\PrincipalController@principal')->name('site.index');

Route::get('/sobre-nos', 'App\Http\Controllers\SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'App\Http\Controllers\ContatoController@contato')->name('site.contato');
Route::post('/contato', 'App\Http\Controllers\ContatoController@save')->name('site.contato');

//rota para login no sistema
Route::get('/login/{erro?}','App\Http\Controllers\LoginController@index')->name('site.login');
Route::post('/login','App\Http\Controllers\LoginController@autenticar')->name('site.login');

// Agrupamento de rotas para /app
Route::middleware('autenticacao:padrao,visitante,p3,p4')->prefix('/app')->group(function() {
    Route::get('/clientes', function(){return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos', function(){return 'produtos';})->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('site.teste');

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});

