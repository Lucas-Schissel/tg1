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
Route::get('/index', 'IndexController@apresenta')
->name('index');

Auth::routes();

//...........Private Rotas..................................................
Route::middleware(['auth'])->group(function(){

    //Rotas Aplicaçao para todos usuarios

    Route::get('/home', 'HomeController@index')
    ->name('home');

    Route::get('/logout', 'AppController@logout')
    ->name('logout');

    Route::get('/configuracao', 'AppController@telaConfiguracao')
    ->name('configuracao');

    Route::get('/dashboard', 'AppController@telaDashboard')
    ->name('dashboard');
    
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
    
    //Cidades................................................................

    Route::get('/cidade/cadastro', 'CidadeController@telaCadastro')
    ->name('cidade_cadastro');
    
    Route::post('/cidade/cadastro/adicionar', 'CidadeController@adicionar')
    ->name('cidade_add');

    Route::get('/cidade/alterar/{id}', 'CidadeController@telaAlteracao')
    ->name('cidade_update');

    Route::post('/cidade/alterar/{id}', 'CidadeController@alterar')
	->name('cidade_alterar');

    Route::get('/cidade/mostrar', 'CidadeController@mostrar')
    ->name('cidade_mostrar');

    Route::get('/cidade/listar', 'CidadeController@listar')
    ->name('cidade_listar');

    Route::get('/cidade/buscar', 'CidadeController@buscar')
    ->name('cidade_buscar');

    Route::get('/cidade/ordenar/{id}/{nome}', 'CidadeController@ordenar')
    ->name('cidade_ordenar');

    Route::get('/cidade/excluir/{id}', 'CidadeController@excluir')
    ->name('cidade_delete'); 

     //Estado................................................................

     Route::get('/estado/cadastro', 'EstadoController@telaCadastro')
     ->name('estado_cadastro');
     
     Route::post('/estado/cadastro/adicionar', 'EstadoController@adicionar')
     ->name('estado_add');
 
     Route::get('/estado/alterar/{id}', 'EstadoController@telaAlteracao')
     ->name('estado_update');
 
     Route::post('/estado/alterar/{id}', 'EstadoController@alterar')
     ->name('estado_alterar');
 
     Route::get('/estado/mostrar', 'EstadoController@mostrar')
     ->name('estado_mostrar');
 
     Route::get('/estado/listar', 'EstadoController@listar')
     ->name('estado_listar');
 
     Route::get('/estado/buscar', 'EstadoController@buscar')
     ->name('estado_buscar');
 
     Route::get('/estado/ordenar/{id}/{nome}', 'EstadoController@ordenar')
     ->name('estado_ordenar');
 
     Route::get('/estado/excluir/{id}', 'EstadoController@excluir')
     ->name('estado_delete');

    //Status................................................................

     Route::get('/status/cadastro', 'StatusEntregaController@telaCadastro')
     ->name('status_cadastro');
     
     Route::post('/status/cadastro/adicionar', 'StatusEntregaController@adicionar')
     ->name('status_add');
 
     Route::get('/status/alterar/{id}', 'StatusEntregaController@telaAlteracao')
     ->name('status_update');
 
     Route::post('/status/alterar/{id}', 'StatusEntregaController@alterar')
     ->name('status_alterar');
 
     Route::get('/status/mostrar', 'StatusEntregaController@mostrar')
     ->name('status_mostrar');
 
     Route::get('/status/listar', 'StatusEntregaController@listar')
     ->name('status_listar');
 
     Route::get('/status/buscar', 'StatusEntregaController@buscar')
     ->name('status_buscar');
 
     Route::get('/status/ordenar/{id}', 'StatusEntregaController@ordenar')
     ->name('status_ordenar');
 
     Route::get('/status/excluir/{id}', 'StatusEntregaController@excluir')
     ->name('status_delete');
    
    
    
    //Motoboy...............................................................
    Route::get('/motoboy/cadastro', 'MotoboyController@telaCadastro')
    ->name('motoboy_cadastro');

    Route::post('/motoboy/cadastro/adicionar', 'MotoboyController@adicionar')
    ->name('motoboy_add');

    Route::get('/motoboy/alterar/{id}', 'MotoboyController@telaAlteracao')
    ->name('motoboy_update');

    Route::post('/motoboy/alterar/{id}', 'MotoboyController@alterar')
	->name('motoboy_alterar');

    Route::get('/motoboy/listar', 'MotoboyController@listar')
    ->name('motoboy_listar');

    Route::get('/motoboy/buscar', 'MotoboyController@buscar')
    ->name('motoboy_buscar');

    Route::get('/motoboy/ordenar/{id}/{nome}', 'MotoboyController@ordenar')
    ->name('motoboy_ordenar');

    Route::get('/motoboy/excluir/{id}', 'MotoboyController@excluir')
    ->name('motoboy_delete');
    
    //Entrega................................................................

        Route::get('/entrega/cadastro', 'EntregaController@telaCadastro')
        ->name('entrega_cadastro');

        Route::post('/entrega/cadastro/cep', 'EntregaController@buscacep')
        ->name('entrega_cep');
        
        Route::post('/entrega/cadastro/adicionar', 'EntregaController@adicionar')
        ->name('entrega_add');
    
        Route::get('/entrega/alterar/{id}', 'EntregaController@telaAlteracao')
        ->name('entrega_update');
    
        Route::post('/entrega/alterar/{id}', 'EntregaController@alterar')
        ->name('entrega_alterar');
    
        Route::get('/entrega/mostrar', 'EntregaController@mostrar')
        ->name('entrega_mostrar');
    
        Route::get('/entrega/listar', 'EntregaController@listar')
        ->name('entrega_listar');
    
        Route::post('/entrega/buscar', 'EntregaController@buscar')
        ->name('entrega_buscar');
    
        Route::post('/entrega/ordenar', 'EntregaController@ordenar')
        ->name('entrega_ordenar');
    
        Route::get('/entrega/excluir/{id}', 'EntregaController@excluir')
        ->name('entrega_delete');


    //......................................................................

    });

    //......................................................................
});



