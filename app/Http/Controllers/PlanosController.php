<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planos;

class PlanosController extends Controller
{
    function telaCadastro(){
        return view('telas_cadastros.cadastro_plano');
    }

    function adicionar(Request $req){

        $req->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'valor' => 'required|numeric',
        ]);

        $nome = $req->input('nome');
        $descricao = $req->input('descricao');
        $valor = $req->input('valor');
    	

            $pla = new Planos();
            $pla->nome = $nome;
            $pla->descricao = $descricao;
            $pla->valor = $valor;

            if ($pla->save()){
                session([
                    'mensagem' =>"Plano: $nome, foi adicionado com sucesso!",
                    's'=>'s'
                ]);
            } else {
                session([
                    'mensagem' =>"Plano: $nome, nao foi adicionado!",
                    'f'=>'f'
                ]);
            }
            
        return view('telas_cadastros.cadastro_plano');
    }

    function ordenar($id,$nome){
        $dados = collect(session('dados')); 
        if($id == 'asc'){
            $planos = $dados->sortBy($nome);
        }elseif($id == 'desc'){
            $planos = $dados->sortByDesc($nome);
        }          
        return PlanosController::mostrar($planos);  
    }

    function buscar(Request $req){
        $busca = $req->input('busca');
        if(isset($busca)){
            $planos = Planos::where('nome', 'LIKE', "%$busca%")->get();
            return PlanosController::mostrar($planos);        
        }else{
            return PlanosController::listar();
        }              
    }

    function mostrar($array){
        $planos = $array;
        session()->flash('dados',$planos);
        return view('telas_listas.lista_planos', [ "pla" => $planos]);
    }

    function listar(){        
        $planos = Planos::all(); 
        return PlanosController::mostrar($planos);
    }

    function excluir($id){        
        $plano = Planos::find($id);                    
            if ($plano->delete()){
                session([
                    'mensagem' =>"Plano: $plano->nome, foi excluído com sucesso!",
                    's'=>'s'
                ]);
            
            } else {
                session([
                    'mensagem' =>"Plano: $plano->nome, nao foi excluído!",
                    'f'=>'f'
                ]);
            }
        return redirect()->route('planos_listar');
    }
}
