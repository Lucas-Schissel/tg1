<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Empresa;

class EmpresaController extends Controller
{
    function telaCadastro(){
        return view('telas_cadastros.cadastro_empresa');
    }
}
