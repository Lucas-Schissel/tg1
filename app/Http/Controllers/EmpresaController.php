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

    function listar(){
        $empresas = Empresa::All();
        return view('telas_listas.lista_empresas', [ "emp" => $empresas ]);
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
