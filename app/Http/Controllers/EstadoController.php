<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado;

class EstadoController extends Controller
{
    function telaCadastro(){
        return view('telas_cadastros.cadastro_estado');
    }

    function adicionar(Request $req){

        $req->validate([
            'nome' => 'required|unique:estados,nome',
            'sigla' => 'required|unique:estados,sigla',
            'regiao' => 'required',
        ]);

        $nome = $req->input('nome');
        $sigla = $req->input('sigla');
        $regiao = $req->input('regiao');

            $est = new Estado();
            $est->nome = $nome;
            $est->sigla = $sigla;
            $est->regiao = $regiao;
            

            if ($est->save()){
                session([
                    'mensagem' =>"Estado: $nome, foi adicionado com sucesso!",
                    's'=>'s'
                ]);
            } else {
                session([
                    'mensagem' =>"Estado: $nome, nao foi adicionado!",
                    'f'=>'f'
                ]);
            }
            
        return view('telas_cadastros.cadastro_estado');
    }
}
