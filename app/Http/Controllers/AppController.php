<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    function logout(){
		Auth::logout();
		return redirect()->route('index');
	}

	function telaConfiguracao(){
		return view('configuracao');
	}

	function telaDashboard(){
		$empresas = DB::table('empresas')->select('id')->get();
		$motoboys = DB::table('motoboy')->select('id')->get();
		$cidades = DB::table('cidades')->select('id')->get();
		$entregas = DB::table('entregas')->select('id')->get();
		$empresas = count($empresas);
		$motoboys = count($motoboys);
		$cidades = count($cidades);
		$entregas = count($entregas);

		return view('dashboard',[
			'empresas' => $empresas,
			'motoboys' => $motoboys,
			'cidades' => $cidades,
			'entregas' => $entregas,
		]);
	}
}
