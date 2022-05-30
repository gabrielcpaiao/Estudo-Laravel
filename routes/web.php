<?php

//protected $namespace = 'App\Http\Controllers';

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutooController;
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