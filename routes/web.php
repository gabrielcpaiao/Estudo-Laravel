<?php

//protected $namespace = 'App\Http\Controllers';


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return 'Teste';
});

Route::get('/produtos', 'ProdutoController@lista');

Route::get('/produtos/mostra', 'ProdutoController@mostra');
//Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra');

Route::get('/produtos/novo', 'ProdutoController@novo');

//Rota que aponta para o metodo adiciona no ProdutoController
//Route::get('/produtos/adiciona', 'ProdutoController@adiciona');
Route::post('/produtos/adiciona', [ProdutoController::class,'adiciona']);

Route::get('/produtos' , ['as' => 'apelido', 'uses' => 'ProdutoController@lista']);
//return redirect()->route('apelido');

Route::get('/produtos/json', 'ProdutoController@listaJson');

Route::get('/produtos/remove/{id}', 'ProdutoController@remove');

Route::get('home', 'HomeController@index');

Route::controllers(['auth' => 'Auth\AuthController', 'password' => 'Auth\PasswordController',]);

Route::get('/login', 'LoginController@login');

Route::get('/produtos/remove/{id}', ['middleware' => 'nosso-middleware', 'uses' => 'ProdutoController@remove']);