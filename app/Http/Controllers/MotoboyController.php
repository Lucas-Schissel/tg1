<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motoboy;
use App\Disponibilidade;


class MotoboyController extends Controller
{
    function telaMenu(){
        if (session()->has("nome")){
            $email = session('email');
            $motoboy = Motoboy::where('email','=', $email)->first();
            $disponibilidade = Disponibilidade::all();
            //dd($motoboy);
			return view('menu_motoboy', [ "motoboy" => $motoboy , "disponibilidade" => $disponibilidade]);
		}else{
            return redirect()->route('login_motoboy');    
        }    
    }

    function telaConfig(){
        if (session()->has("nome")){
            $email = session('email');
            $motoboy = Motoboy::where('email','=', $email)->first();
            return view('config_motoboy', [ "motoboy" => $motoboy ]);
            
		}else{
            return redirect()->route('login_motoboy');    
        }    
    }

    function telaLogin(){
        return view('telas_login.login_motoboy');
    }

    function telaRegistro(){
        return view('telas_registros.registro_motoboy');
    }

    function telaCadastro(){
        return view('telas_cadastros.cadastro_motoboy');
    }

    function telaAlteracao($id){
            $motoboy = motoboy::find($id);
            return view("telas_updates.atualiza_motoboy", [ "mot" => $motoboy ]);
    }

    function disponibilidade(Request $req){
        if (session()->has("nome")){

            $req->validate([
                'id_disponibilidade' => 'required|numeric',
            ]);

            $id = session('id');
            $disponibilidade = $req->input('id_disponibilidade');    

            $motoboy = motoboy::find($id);     
            $motoboy->id_disponibilidade = $disponibilidade;

        if ($motoboy->save()){
            session([
                'mensagem' =>"Status alterada com sucesso! apartir de agora você aparecerá como disponivel para entregas",
                's'=>'s'
            ]);
        } else {
            session([
                'mensagem' =>"Status não alterado!",
                'f'=>'f'
            ]);
        }
        
        return redirect()->route('menu_motoboy');
        }else{
            return redirect()->route('login_motoboy');    
        } 
    }

    function adicionar(Request $req){

        $req->validate([
            'nome' => 'required|unique:motoboy,nome',
            'cpf' => 'required|unique:motoboy,cpf',
            'telefone' => 'required|unique:motoboy,telefone',
            'email' => 'required|unique:motoboy,email',
            'senha' => 'required|unique:motoboy,senha',
        ]);

        $nome = $req->input('nome');
        $cpf = $req->input('cpf');
        $telefone = $req->input('telefone');
        $email = $req->input('email');
        $senha = $req->input('senha');

            $mot = new motoboy();
            $mot->nome = $nome;
            $mot->cpf = $cpf;
            $mot->telefone = $telefone;
            $mot->email = $email;
            $mot->senha = $senha;
            $mot->id_disponibilidade = 1;
            $mot->id_liberacao = 1;
        
            if ($mot->save()){
                session([
                    'mensagem' =>"Seus dados foram enviados! assim que forem aprovados você terá permissão para poder começar a fazer entregas",
                    's'=>'s'
                ]);
            } else {
                session([
                    'mensagem' =>"Houve algum erro! tente novamente mais tarde!",
                    'f'=>'f'
                ]);
            }
            
            return redirect()->route('login_motoboy');
    }

    function alterar(Request $req , $id){

        $req->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'telefone' => 'required',
        ]);

        $nome = $req->input('nome');
        $cpf = $req->input('cpf');
        $telefone = $req->input('telefone');

            $mot = motoboy::find($id);
            $mot->nome = $nome;
            $mot->cpf = $cpf;
            $mot->telefone = $telefone;

            if ($mot->save()){
                session([
                    'mensagem' =>"Motoboy: $nome, alterada com sucesso!",
                    's'=>'s'
                ]);
            } else {
                session([
                    'mensagem' =>"Motoboy: $nome, nao foi alterada!",
                    'f'=>'f'
                ]);
            }
            
        return redirect()->route('motoboy_listar');
    }
    
    function ordenar($id,$nome){
        $dados = collect(session('dados')); 
        if($id == 'asc'){
            $motoboys = $dados->sortBy($nome);
        }elseif($id == 'desc'){
            $motoboys = $dados->sortByDesc($nome);
        }          
        return motoboyController::mostrar($motoboys);  
    }

    function buscar(Request $req){
        $busca = $req->input('busca');
        if(isset($busca)){
            $motoboys = motoboy::where('nome', 'LIKE', "%$busca%")->get();
            return MotoboyController::mostrar($motoboys);        
        }else{
            return MotoboyController::listar();
        }              
    }

    static function mostrar($array){
        $motoboys = $array;
        session()->flash('dados',$motoboys);
        return view('telas_listas.lista_motoboys', [ "mot" => $motoboys]);
    }

    function listar(){        
        $motoboys = motoboy::all(); 
        return MotoboyController::mostrar($motoboys);
    }

    function excluir($id){        
        $motoboy = motoboy::find($id);                    
            if ($motoboy->delete()){
                session([
                    'mensagem' =>"Motoboy: $motoboy->nome, foi excluída com sucesso!",
                    's'=>'s'
                ]);
            
            } else {
                session([
                    'mensagem' =>"Motoboy: $motoboy->nome, nao foi excluída!",
                    'f'=>'f'
                ]);
            }
        return MotoboyController::listar();
    }
}
