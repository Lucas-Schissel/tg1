<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidade;
use App\Estado;

class CidadeController extends Controller
{
    function telaCadastro(){
        $estados = Estado::all();
        return view('telas_cadastros.cadastro_cidade' , [ 'estados' => $estados]);
    }

    function telaAlteracao($id){
        $cidade = Cidade::find($id);
        $estados = Estado::all();
        session()->flash('dados',$id);
        return view("telas_updates.atualiza_cidade", [ "cde" => $cidade , 'estados' => $estados ]);
}

    function adicionar(Request $req){

        $req->validate([
            'nome' => 'required|unique:cidades,nome',
            'id_estado' => 'required|numeric',
        ]);

        $nome = $req->input('nome');
        $id_estado = $req->input('id_estado');
      

            $cde = new Cidade();
            $cde->nome = $nome;
            $cde->id_estado = $id_estado;            

            if ($cde->save()){
                session([
                    'mensagem' =>"Cidade: $nome, foi adicionada com sucesso!",
                    's'=>'s'
                ]);
            } else {
                session([
                    'mensagem' =>"Cidade: $nome, nao foi adicionada!",
                    'f'=>'f'
                ]);
            }

        return redirect()->route('cidade_cadastro');
    }

    function alterar(Request $req, $id){

        $req->validate([
            'nome' => 'required',
            'id_estado' => 'required|numeric',
        ]);

        $nome = $req->input('nome');
        $id_estado = $req->input('id_estado');
      

            $cde = Cidade::find($id);
            $cde->nome = $nome;
            $cde->id_estado = $id_estado;            

            if ($cde->save()){
                session([
                    'mensagem' =>"Cidade: $nome, foi alterada com sucesso!",
                    's'=>'s'
                ]);
            } else {
                session([
                    'mensagem' =>"Cidade: $nome, nao foi alterada!",
                    'f'=>'f'
                ]);
            }

        return redirect()->route('cidade_listar');
    }

    function ordenar($id,$nome){
        $dados = collect(session('dados')); 
            if($id == 'asc'){
                $cidades = $dados->sortBy($nome);
            }elseif($id == 'desc'){
                $cidades = $dados->sortByDesc($nome);
            }         
        return CidadeController::mostrar($cidades);  
    }

    function buscar(Request $req){
        $busca = $req->input('busca');
        if(isset($busca)){
            $cidades = Cidade::where('nome', 'LIKE', "%$busca%")->get();
            return CidadeController::mostrar($cidades);        
        }else{
            return redirect()->route('cidade_listar');
        }              
    }

    static function mostrar($array){
        $cidades = $array;
        session()->flash('dados',$cidades);
        return view('telas_listas.lista_cidades', [ "cde" => $cidades]);
    }

    function listar(){        
        $cidades = Cidade::all(); 
        return CidadeController::mostrar($cidades);
    }

    function excluir($id){        
        $cidade = Cidade::find($id);                    
            if ($cidade->delete()){
                session([
                    'mensagem' =>"Cidade: $cidade->nome, foi excluída com sucesso!",
                    's'=>'s'
                ]);
            
            } else {
                session([
                    'mensagem' =>"Cidade: $cidade->nome, nao foi excluída!",
                    'f'=>'f'
                ]);
            }
            return redirect()->route('cidade_listar');
    }
}
