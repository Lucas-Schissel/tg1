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

    Route::get('/empresa/alterar/{id}', 'EmpresaController@telaAlteracao')
    ->name('empresa_update');

    Route::post('/empresa/alterar/{id}', 'EmpresaController@alterar')
	->name('empresa_alterar');

    Route::get('/empresa/mostrar', 'EmpresaController@mostrar')
    ->name('empresa_mostrar');

    Route::get('/empresa/listar', 'EmpresaController@listar')
    ->name('empresa_listar');

    Route::get('/empresa/buscar', 'EmpresaController@buscar')
    ->name('empresa_buscar');

    Route::get('/empresa/ordenar/{id}/{nome}', 'EmpresaController@ordenar')
    ->name('empresa_ordenar');

    Route::get('/empresa/excluir/{id}', 'EmpresaController@excluir')
	->name('empresa_delete');  


    //Planos................................................................

    Route::get('/planos/cadastro', 'planosController@telaCadastro')
    ->name('planos_cadastro');
    
    Route::post('/planos/cadastro/adicionar', 'PlanosController@adicionar')
    ->name('planos_add');

    Route::get('/planos/alterar/{id}', 'PlanosController@telaAlteracao')
    ->name('planos_update');

    Route::post('/planos/alterar/{id}', 'PlanosController@alterar')
	->name('planos_alterar');

    Route::get('/planos/mostrar', 'PlanosController@mostrar')
    ->name('planos_mostrar');

    Route::get('/planos/listar', 'PlanosController@listar')
    ->name('planos_listar');

    Route::get('/planos/buscar', 'PlanosController@buscar')
    ->name('planos_buscar');

    Route::get('/planos/ordenar/{id}/{nome}', 'PlanosController@ordenar')
    ->name('planos_ordenar');

    Route::get('/planos/excluir/{id}', 'PlanosController@excluir')
    ->name('planos_delete');       
    
    //......................................................................
    

    });
    //......................................................................
});



