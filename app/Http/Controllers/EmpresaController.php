<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class EmpresaController extends Controller
{
    function telaCadastro(){
        return view('telas_cadastros.cadastro_empresa');
    }

    function adicionar(Request $req){

        $req->validate([
            'nome' => 'required',
            'cnpj' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'senha' => 'required',
        ]);

        $nome = $req->input('nome');
        $cnpj = $req->input('cnpj');
        $telefone = $req->input('telefone');
    	$email = $req->input('email');
        $senha = $req->input('senha');

            $emp = new Empresa();
            $emp->nome = $nome;
            $emp->cnpj = $cnpj;
            $emp->telefone = $telefone;
            $emp->email = $email;
            $emp->senha = $senha;

            if ($emp->save()){
                session([
                    'mensagem' =>"Empresa: $nome, foi adicionada com sucesso!",
                    's'=>'s'
                ]);
            } else {
                session([
                    'mensagem' =>"Empresa: $nome, nao foi adicionada!",
                    'f'=>'f'
                ]);
            }
            
        return view('telas_cadastros.cadastro_empresa');
    }

    function ordenar($id,$nome){
        $dados = collect(session('dados')); 
        if($id == 'asc'){
            $empresas = $dados->sortBy($nome);
        }elseif($id == 'desc'){
            $empresas = $dados->sortByDesc($nome);
        }          
        return EmpresaController::mostrar($empresas);  
    }

    function buscar(Request $req){
        $busca = $req->input('busca');
        if(isset($busca)){
            $empresas = Empresa::where('nome', 'LIKE', "%$busca%")->get();
            return EmpresaController::mostrar($empresas);        
        }else{
            return EmpresaController::listar();
        }              
    }

    function mostrar($array){
        $empresas = $array;
        session()->flash('dados',$empresas);
        return view('telas_listas.lista_empresas', [ "emp" => $empresas]);
    }

    function listar(){        
        $empresas = Empresa::All();
        return EmpresaController::mostrar($empresas);
    }

    function excluir($id){
        
        $empresa = Empresa::find($id);
                    
            if ($empresa->delete()){
                session([
                    'mensagem' =>"Empresa: $empresa->nome, foi excluída com sucesso!",
                    's'=>'s'
                ]);
            
            } else {
                session([
                    'mensagem' =>"Empresa: $empresa->nome, nao foi excluída!",
                    'f'=>'f'
                ]);
            }

        return EmpresaController::listar();
    }
}
