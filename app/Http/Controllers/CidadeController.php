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
}
