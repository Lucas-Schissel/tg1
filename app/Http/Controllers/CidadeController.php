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
}
