<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//...........Public Rotas..................................................

Auth::routes();

//...........Private Rotas..................................................
Route::middleware(['auth'])->group(function(){

    //Rotas Aplicaçao para todos usuarios

    Route::get('/home', 'HomeController@index')
    ->name('home');

    Route::get('/logout', 'AppController@logout')
    ->name('logout');
    
    //......................................................................
    //Rotas Aplicaçao para usuarios Administradores.........................
    Route::middleware(['admin'])->group(function(){

    //Empresa...............................................................
    Route::get('/empresa/cadastro', 'EmpresaController@telaCadastro')
    ->name('empresa_cadastro');
    
    Route::post('/empresa/cadastro/adicionar', 'EmpresaController@adicionar')
    ->name('empresa_add');

    



    //......................................................................


        


    });
    //......................................................................
});



