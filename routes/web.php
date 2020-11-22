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


Route::get('/listar', 'ClienteController@listarClientes')->name('cliente.listar');

Route::get('/cadastrar', 'ClienteController@cadastrarCliente')->name('cliente.cadastrar');
Route::get('/cadastrar/do', 'ClienteController@cadastrarClienteDo')->name('cliente.cadastrar.do');

Route::get('/editar', 'ClienteController@editarCliente')->name('cliente.editar');
Route::get('/editar/do', 'ClienteController@editarClienteDo')->name('cliente.editar.do');

Route::get('/deletar/do', 'ClienteController@deletePedidoDo')->name('cliente.deletar.do');
