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
}
