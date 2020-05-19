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

//...........Public Rotas..................................................

Route::get('/', function () {
    return view('welcome');
});

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
    Route::get('/cadastro/empresa', 'EmpresaController@telaCadastro')
	->name('cadastro_empresa');



    //......................................................................


        


    });
    //......................................................................
});



