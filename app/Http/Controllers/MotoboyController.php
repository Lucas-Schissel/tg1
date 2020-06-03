<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motoboy;

class MotoboyController extends Controller
{
    function telaCadastro(){
        return view('telas_cadastros.cadastro_motoboy');
    }

    function telaAlteracao($id){
            $motoboy = motoboy::find($id);
            return view("telas_updates.atualiza_motoboy", [ "mot" => $motoboy ]);
    }

    function adicionar(Request $req){

        $req->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'telefone' => 'required',
        ]);

        $nome = $req->input('nome');
        $cpf = $req->input('cpf');
        $telefone = $req->input('telefone');

            $mot = new motoboy();
            $mot->nome = $nome;
            $mot->cpf = $cpf;
            $mot->telefone = $telefone;
        
            if ($mot->save()){
                session([
                    'mensagem' =>"motoboy: $nome, foi adicionado com sucesso!",
                    's'=>'s'
                ]);
            } else {
                session([
                    'mensagem' =>"motoboy: $nome, nao foi adicionado!",
                    'f'=>'f'
                ]);
            }
            
        return view('telas_cadastros.cadastro_motoboy');
    }

    function alterar(Request $req , $id){

        $req->validate([
            'nome' => 'required|unique:motoboy,nome',
            'cpf' => 'required|unique:motoboy,cpf',
            'telefone' => 'required|unique:motoboy,telefone',
        ]);

        $nome = $req->input('nome');
        $cpf = $req->input('cpf');
        $telefone = $req->input('telefone');

            $mot = motoboy::find($id);
            $mot->nome = $nome;
            $mot->cpf = $cpf;
            $mot->telefone = $telefone;

            if ($mot->save()){
                session([
                    'mensagem' =>"motoboy: $nome, alterada com sucesso!",
                    's'=>'s'
                ]);
            } else {
                session([
                    'mensagem' =>"motoboy: $nome, nao foi alterada!",
                    'f'=>'f'
                ]);
            }
            
        return redirect()->route('motoboy_listar');
    }
    /*function ordenar($id,$nome){
        $dados = collect(session('dados')); 
        if($id == 'asc'){
            $motoboys = $dados->sortBy($nome);
        }elseif($id == 'desc'){
            $motoboys = $dados->sortByDesc($nome);
        }          
        return motoboyController::mostrar($motoboys);  
    }*/

    function buscar(Request $req){
        $busca = $req->input('busca');
        if(isset($busca)){
            $motoboys = motoboy::where('nome', 'LIKE', "%$busca%")->get();
            return MotoboyController::mostrar($motoboys);        
        }else{
            return MotoboyController::listar();
        }              
    }

    static function mostrar($array){
        $motoboys = $array;
        session()->flash('dados',$motoboys);
        return view('telas_listas.lista_motoboys', [ "mot" => $motoboys]);
    }

    function listar(){        
        $motoboys = motoboy::all(); 
        return MotoboyController::mostrar($motoboys);
    }

    function excluir($id){        
        $motoboy = motoboy::find($id);                    
            if ($motoboy->delete()){
                session([
                    'mensagem' =>"motoboy: $motoboy->nome, foi excluída com sucesso!",
                    's'=>'s'
                ]);
            
            } else {
                session([
                    'mensagem' =>"motoboy: $motoboy->nome, nao foi excluída!",
                    'f'=>'f'
                ]);
            }
        return MotoboyController::listar();
    }
}
