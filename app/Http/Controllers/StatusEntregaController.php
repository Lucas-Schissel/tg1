<?php

namespace App\Http\Controllers;

use App\StatusEntrega as AppStatusEntrega;
use Illuminate\Http\Request;
use App\StatusEntrega;

class StatusEntregaController extends Controller
{
    function telaCadastro(){
        return view('telas_cadastros.cadastro_status');
    }

    function telaAlteracao($id){
            $status = StatusEntrega::find($id);
            return view("telas_updates.atualiza_status", [ "std" => $status ]);
    }

    function adicionar(Request $req){

        $req->validate([
            'nome' => 'required|unique:status_entrega,nome',
        ]);

        $nome = $req->input('nome');

            $std = new StatusEntrega();
            $std->nome = $nome;

            if ($std->save()){
                session([
                    'mensagem' =>"Status: $std, foi adicionado com sucesso!",
                    's'=>'s'
                ]);
            } else {
                session([
                    'mensagem' =>"Status: $std, nao foi adicionado!",
                    'f'=>'f'
                ]);
            }
            
        return view('telas_cadastros.cadastro_empresa');
    }

    function alterar(Request $req , $id){

        $req->validate([
            'nome' => 'required',
        ]);

        $nome = $req->input('nome');

            $std = StatusEntrega::find($id);
            $std->nome = $nome;

            if ($std->save()){
                session([
                    'mensagem' =>"Status: $std, alterado com sucesso!",
                    's'=>'s'
                ]);
            } else {
                session([
                    'mensagem' =>"Status: $nome, nao foi alterado!",
                    'f'=>'f'
                ]);
            }
            
        return redirect()->route('status_listar');
    }

    function ordenar($id,$nome){
        $dados = collect(session('dados')); 
        if($id == 'asc'){
            $status = $dados->sortBy($nome);
        }elseif($id == 'desc'){
            $status = $dados->sortByDesc($nome);
        }          
        return EmpresaController::mostrar($status);  
    }

    function buscar(Request $req){
        $busca = $req->input('busca');
        if(isset($busca)){
            $status = StatusEntrega::where('nome', 'LIKE', "%$busca%")->get();
            return EmpresaController::mostrar($status);        
        }else{
            return redirect()->route('status_listas');
        }              
    }

    static function mostrar($array){
        $status = $array;
        session()->flash('dados',$status);
        return view('telas_listas.lista_status', [ "emp" => $status]);
    }

    function listar(){        
        $status = StatusEntrega::all(); 
        return EmpresaController::mostrar($status);
    }

    function excluir($id){        
        $status = StatusEntrega::find($id);                    
            if ($status->delete()){
                session([
                    'mensagem' =>"Status: $status->nome, foi excluído com sucesso!",
                    's'=>'s'
                ]);
            
            } else {
                session([
                    'mensagem' =>"Status: $status->nome, nao foi excluído!",
                    'f'=>'f'
                ]);
            }
            return redirect()->route('status_listar');
    }
}
