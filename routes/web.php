<?php

use App\Http\Controllers\App\ClienteController;
use App\Http\Controllers\App\FornecedorController;
use App\Http\Controllers\App\LoginController;
use App\Http\Controllers\App\PedidoController;
use App\Http\Controllers\App\PedidoProdutoController;
use App\Http\Controllers\App\ProdutoController;
use App\Http\Controllers\Site\ContatoController;
use App\Http\Controllers\Site\PrincipalController;
use App\Http\Controllers\Site\SobreNosController;
use App\Http\Middleware\LogAcessoMiddleware;
use App\Models\Site\ProdutoDetalhe;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PrincipalController::class, 'index'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'index'])->name('site.sobreNos');
Route::get('/contato', [ContatoController::class, 'index'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'create'])->name('site.contato.create');
Route::get('/login/{error?}', [LoginController::class, 'login'])->name('app.login');
Route::post('/login', [LoginController::class, 'loginIn'])->name('app.loginIn');
Route::middleware('autenticacao')->prefix('/app')->group(function () {
    Route::get('/home', [LoginController::class, 'home'])->name('app.home');
    // Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente.index');
    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor.index');
    Route::get('/fornecedor/adicionar/{msg?}', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/edit/{id}', [FornecedorController::class, 'edit'])->name('app.fornecedor.edit');
    Route::get('/fornecedor/delete/{id}', [FornecedorController::class, 'delete'])->name('app.fornecedor.delete');
    Route::get('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::post('/fornecedor/salvar', [FornecedorController::class, 'salvar'])->name('app.fornecedor.salvar');
    Route::resource('/produto', ProdutoController::class)->names('app.produto');
    Route::resource('/produto-detalhe', ProdutoDetalhe::class)->names('app.produtodetalhe');
    Route::resource('/cliente', ClienteController::class)->names('app.cliente');
    Route::resource('/pedido', PedidoController::class)->names('app.pedido');
    Route::get('/pedido-produto/{pedido}', [PedidoProdutoController::class, 'create'])->name('app.pedido_produto.create');
    Route::post('/pedido-produto/{pedido}', [PedidoProdutoController::class, 'store'])->name('app.pedido_produto.store');
    Route::delete('/pedido-produto/{pedido}/{produto}/{pedido_produto}', [PedidoProdutoController::class, 'destroy'])->name('app.pedido_produto.destroy');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
});
