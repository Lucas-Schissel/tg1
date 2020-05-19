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
                    'mensagem' =>"Empresa: $nome, foi adicionadoa com sucesso!"
                ]);
            } else {
                session([
                    'mensagem' =>"Empresa: $nome, nao foi adicionada!!"
                ]);
            }
            
        return view('telas_cadastros.cadastro_empresa');
    }
}
