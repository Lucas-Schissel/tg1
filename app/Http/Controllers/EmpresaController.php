<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Entrega;
use Illuminate\Support\Facades\Hash;

class EmpresaController extends Controller
{

    function telaDashboard(){
    if (session()->has("nome")){
        $empresa = Empresa::where('nome', '=', session("nome"))->first();
        $et1 = Entrega::where('id_empresa', '=', "$empresa->id")->where('id_status','=','1')->get();
        $et1 = count($et1);
        $et2 = Entrega::where('id_empresa', '=', "$empresa->id")->where('id_status','=','3')->get();
        $et2 = count($et2);
        $et3 = Entrega::where('id_empresa', '=', "$empresa->id")->where('id_status','=','4')->get();
        $et3 = count($et3);
        $et4 = Entrega::where('id_empresa', '=', "$empresa->id")->where('id_status','=','5')->get();
        $et4 = count($et4);
        $et5 = Entrega::where('id_empresa', '=', "$empresa->id")->where('id_status','=','6')->get();
		$et5 = count($et5);

		return view('dashboard_empresa',[
            'et1' => $et1,
            'et2' => $et2,
            'et3' => $et3,
            'et4' => $et4,
            'et5' => $et5,
        ]);
    }else{
        return redirect()->route('login_empresa');    
    } 
	}

    function telaMenu(){
        if (session()->has("nome")){
			return view('menu_empresa');
		}else{
            return redirect()->route('login_empresa');    
        }    
    }

    function telaEntrega(){
        if (session()->has("nome")){
			return view('empresa_entrega');
		}else{
            return redirect()->route('login_empresa');    
        }    
    }

    function telaConfig(){
        if (session()->has("nome")){
            $email = session('email');
            $empresa = Empresa::where('email','=', $email)->first();
            return view('config_empresa', [ "emp" => $empresa ]);
            
		}else{
            return redirect()->route('login_empresa');    
        }    
    }

    function telaLogin(){
        return view('telas_login.login_empresa');
    }

    function telaRegistro(){
        return view('telas_registros.registro_empresa');
    }

    function telaCadastro(){
        return view('telas_cadastros.cadastro_empresa');
    }

    function telaAlteracao($id){
            $empresa = Empresa::find($id);
            return view("telas_updates.atualiza_empresa", [ "emp" => $empresa ]);
    }

    function listarEntregas(){ 
    if (session()->has("nome")){
            $email = session('email');
            $empresa = Empresa::where('email','=', $email)->first();
            $entregas = Entrega::where('id_empresa','=', $empresa->id)->get();
        return EmpresaController::mostrarE($entregas);              
	}else{
        return redirect()->route('login_empresa');    
    }              
    }

    static function mostrarE($array){
        $entregas = $array;
        session()->flash('dados',$entregas);
        return view('lista_entregas_empresa', [ "etg" => $entregas ]);
    }

    function adicionar(Request $req){

        $req->validate([
            'nome' => 'required|unique:empresas,nome',
            'cnpj' => 'required|unique:empresas,cnpj',
            'telefone' => 'required|unique:empresas,telefone',
            'email' => 'required|unique:empresas,email',
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
        $emp->url = $url;
        $emp->token = Hash::make($nome.$cnpj);


            if ($emp->save()){
                session([
                    'mensagem' =>"Empresa: $nome, foi adicionada com sucesso! logue no sistema para desfrutar dos nosso serviços",
                    's'=>'s'
                ]);
            } else {
                session([
                    'mensagem' =>"Empresa: $nome, nao foi adicionada!, tente novamente mais tarde.",
                    'f'=>'f'
                ]);
            }
            
            return redirect()->route('login_empresa');
    }

    function alterar(Request $req , $id){
    if (session()->has("nome")){

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
        $url = $req->input('url');

            $emp = Empresa::find($id);
            $emp->nome = $nome;
            $emp->cnpj = $cnpj;
            $emp->telefone = $telefone;
            $emp->email = $email;
            $emp->senha = $senha;
            $emp->url = $url;

            if ($emp->save()){
                session([
                    'mensagem' =>"Empresa: $nome, alterada com sucesso!",
                    's'=>'s'
                ]);
            } else {
                session([
                    'mensagem' =>"Empresa: $nome, nao foi alterada!",
                    'f'=>'f'
                ]);
            }
            
        return redirect()->route('menu_empresa');
    }else{
        return redirect()->route('login_empresa');    
    }
    }

    function ordenar($id,$nome){
        $dados = collect(session('dados')); 
        if($id == 'asc'){
            $empresas = $dados->sortBy($nome);
        }elseif($id == 'desc'){
            $empresas = $dados->sortByDesc($nome);
        }          
        return EmpresaController::mostrar($empresas);  
    }

    function buscar(Request $req){
        $busca = $req->input('busca');
        if(isset($busca)){
            $empresas = Empresa::where('nome', 'LIKE', "%$busca%")->get();
            return EmpresaController::mostrar($empresas);        
        }else{
            return EmpresaController::listar();
        }              
    }

    static function mostrar($array){
        $empresas = $array;
        session()->flash('dados',$empresas);
        return view('telas_listas.lista_empresas', [ "emp" => $empresas]);
    }

    function listar(){        
        $empresas = Empresa::all(); 
        $empresas = $empresas->sortBy('nome');
        return EmpresaController::mostrar($empresas);
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
            return redirect()->route('empresa_listar');
    }
}
