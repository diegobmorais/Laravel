<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'App\Http\Controllers\PrincipalController@principal')->name('site.index');


Route::get('/sobre-nos', 'App\Http\Controllers\SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'App\Http\Controllers\ContatoController@contato')->name('site.contato');
Route::post('/contato', 'App\Http\Controllers\ContatoController@save')->name('site.contato');

//rota para login no sistema
Route::get('/login/{erro?}', 'App\Http\Controllers\LoginController@index')->name('site.login');
Route::post('/login', 'App\Http\Controllers\LoginController@autenticar')->name('site.login');

// Agrupamento de rotas para /app
Route::middleware('autenticacao:padrao')->prefix('/app')->group(function () {
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('app.home');
    Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('app.logout');
    Route::get('/cliente', 'App\Http\Controllers\ClienteController@index')->name('app.cliente');
    Route::get('/fornecedor', 'App\Http\Controllers\FornecedorController@index')->name('app.fornecedor');
    Route::get('/produto', 'App\Http\Controllers\ProdutoController@index')->name('app.produto');
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('site.teste');

Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('site.index') . '">clique aqui</a> para ir para página inicial';
});
