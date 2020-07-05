<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Motoboy;
use App\Empresa;

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

	function loginMotoboy(Request $req){

		$req->validate([
            'email' => 'required|min:10',
            'senha' => 'required|min:6',
        ]);

    	$email = $req->input('email');
		$senha = $req->input('senha');		

		$motoboy = Motoboy::where('email','=', $email)->first();
		
    	if ($motoboy and $motoboy->senha == $senha){

			$variaveis = ["id" => $motoboy->id,"email" => $motoboy->email , "nome" => $motoboy->nome];
			session($variaveis);
			session([
				'mensagem' =>"Bem Vindo! $motoboy->nome",
				's'=>'s'
			]);
    		return redirect()->route('menu_motoboy');
    	} else {
			session([
                    'mensagem' =>"Dados de Login, Incorretos!",
                    'f'=>'f'
                ]);		
			return redirect()->route('login_motoboy');
    	}
	}

	function loginEmpresa(Request $req){

		$req->validate([
            'email' => 'required|min:10',
            'senha' => 'required|min:6',
        ]);

    	$email = $req->input('email');
		$senha = $req->input('senha');		

		$empresa = Empresa::where('email','=', $email)->first();
		
    	if ($empresa and $empresa->senha == $senha){

			$variaveis = ["id" => $empresa->id,"email" => $empresa->email , "nome" => $empresa->nome];
			session($variaveis);
			session([
				'mensagem' =>"Bem Vindo! $empresa->nome",
				's'=>'s'
			]);
    		return redirect()->route('menu_empresa');
    	} else {
			session([
                    'mensagem' =>"Dados de Login, Incorretos!",
                    'f'=>'f'
                ]);		
			return redirect()->route('login_empresa');
    	}
	}

	function logoutMotoboy(){
		session()->forget('nome');
		return redirect()->route('index');
	}

	function logoutEmpresa(){
		session()->forget('nome');
		return redirect()->route('index');
	}

}
