<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\GerenteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;


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



//Gerente

Route::get('/gerente/exibirconsultas', [GerenteController::class, 'exibirConsultas']);





// Route::get('/home', function(){
//     return view('home/index');
// });