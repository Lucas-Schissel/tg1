<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanosController extends Controller
{
    function telaCadastro(){
        return view('telas_cadastros.cadastro_plano');
    }
}
