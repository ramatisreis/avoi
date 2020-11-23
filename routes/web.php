<?php

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

Route::get('/', function () {
    return view('welcome');
});




Route::get('/listar', 'App\Http\Controllers\ClienteController@listarClientes')->name('cliente.listar');
Route::get('/listarativos', 'App\Http\Controllers\ClienteController@listarClientesAtivos')->name('cliente.listarativos');



Route::get('/cadastrar', 'App\Http\Controllers\ClienteController@cadastrarCliente')->name('cliente.cadastrar');
Route::post('/cadastrar/do', 'App\Http\Controllers\ClienteController@cadastrarClienteDo')->name('cliente.cadastrar.do');

Route::get('/editar/{id}', 'App\Http\Controllers\ClienteController@editarCliente')->name('cliente.editar');
Route::put('/editar/do', 'App\Http\Controllers\ClienteController@editarClienteDo')->name('cliente.editar.do');

Route::get('/deletar/{id}', 'App\Http\Controllers\ClienteController@deletarCliente')->name('cliente.deletar');
Route::put('/deletar/do', 'App\Http\Controllers\ClienteController@deletarClienteDo')->name('cliente.deletar.do');
