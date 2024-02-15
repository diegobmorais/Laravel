<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SobreNosController;
use Illuminate\Support\Facades\Route;



Route::get('/', [PrincipalController::class,'principal'])->name('site.index');


Route::get('/sobre-nos', [SobreNosController::class,'sobrenos'])->name('site.sobrenos');

Route::get('/contato', [ContatoController::class,'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class,'save'])->name('site.contato');

//rota para login no sistema
Route::get('/login/{erro?}', [LoginController::class,'index'])->name('site.login');
Route::post('/login', [LoginController::class,'autenticar'])->name('site.login');

// Agrupamento de rotas para /app
Route::middleware('autenticacao:padrao')->prefix('/app')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/logout', [LoginController::class, 'logout'])->name('app.logout');
    Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente');

    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');

    Route::post('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');

    Route::get('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', [FornecedorController::class, 'editar'])->name('app.fornecedor.editar');

    Route::get('/fornecedor/excluir/{id}', [FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');

    //rota para produtos
    Route::resource('/produto', ProdutoController::class);
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('site.teste');

Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('site.index') . '">clique aqui</a> para ir para página inicial';
});

