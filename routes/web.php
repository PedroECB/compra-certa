<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GerenteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ComprasController;



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

// Route::get('/', function () {
//     return view('welcome');
// });


            //Home

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', function(){
    session_start();
    if(isset($_SESSION['usuario']))
    {
        return redirect('/');
    }else{
        return view('home.login');
    }
});

Route::post('/login', [HomeController::class, 'autenticar']);

Route::get('/register', function(){
    return view('home.register');
});

Route::post('/register', [HomeController::class, 'registrar']);

Route::get('/logout', [HomeController::class, 'logout']);

            //Product

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/filter/', [ProductController::class, 'filterByCategory']);

Route::get('product/{id}', [ProductController::class, 'show']);


            //Carrinho
Route::post('/cart/addproduct', [CartController::class, 'addProduct']);

Route::get('/cart/show', [CartController::class, 'show']);

Route::get('/cart/limparCarrinho', [CartController::class, 'limparCarrinho']);

Route::get('/cart/removerProduto/{id}', [CartController::class, 'removerProduto']);

Route::get('/cart/checkout', [CartController::class, 'checkout']);

Route::post('/cart/checkout', [CartController::class, 'postCheckout']);

Route::get('/cart/finalizacao-compra', [CartController::class, 'finalizacaoCompra']);

//Gerente

Route::get('/gerente/exibirconsultas', [GerenteController::class, 'exibirConsultas']);



//Clientes

Route::get('/clientes/listar', [ClienteController::class, 'listarClientes']);

Route::get('/clientes/show/{id}', [ClienteController::class, 'show']);

Route::get('/clientes/edit/{id}', [ClienteController::class, 'edit']);

Route::post('/clientes/edit/{id}', [ClienteController::class, 'saveEdit']);

Route::get('/clientes/delete/{id}', [ClienteController::class, 'delete']);

Route::get('/clientes/minhas-compras', [ComprasController::class, 'listarComprasCliente']);

Route::get('/clientes/minhas-compras/{id}', [ComprasController::class, 'visualizarCompraCliente']);

Route::get('/clientes/avaliar-compra/{id}', [ComprasController::class, 'avaliarCompra']);

Route::post('/clientes/avaliar-compra/{id}', [ComprasController::class, 'postAvaliacaoCompra']);


//Compras

Route::get('/compras/listar', [ComprasController::class, 'listar']);

Route::get('/compras/visualizar/{id}', [ComprasController::class, 'visualizarCompra']);

Route::get('/compras/enviar-para-conferencia/{id}', [ComprasController::class, 'enviarParaConferencia']);

Route::get('/compras/enviar-para-entrega/{id}', [ComprasController::class, 'enviarParaEntrega']);

Route::get('/compras/enviar-para-preparacao/{id}', [ComprasController::class, 'enviarParaPreparacao']);

Route::get('/compras/entregar/{id}', [ComprasController::class, 'entregar']);






// Route::get('/home', function(){
//     return view('home/index');
// });