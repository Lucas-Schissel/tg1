<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entrega;
use App\Motoboy;
use App\Disponibilidade;


class MotoboyController extends Controller
{
    function telaDashboard(){
        if (session()->has("nome")){
            $motoboy = Motoboy::where('nome', '=', session("nome"))->first();
            $et1 = Entrega::where('id_motoboy', '=', "$motoboy->id")->where('id_status','=','1')->get();
            $et1 = count($et1);
            $et2 = Entrega::where('id_motoboy', '=', "$motoboy->id")->where('id_status','=','3')->get();
            $et2 = count($et2);
            $et3 = Entrega::where('id_motoboy', '=', "$motoboy->id")->where('id_status','=','4')->get();
            $et3 = count($et3);
            $et4 = Entrega::where('id_motoboy', '=', "$motoboy->id")->where('id_status','=','5')->get();
            $et4 = count($et4);
            $et5 = Entrega::where('id_motoboy', '=', "$motoboy->id")->where('id_status','=','6')->get();
            $et5 = count($et5);
    
            return view('dashboard_motoboy',[
                'et1' => $et1,
                'et2' => $et2,
                'et3' => $et3,
                'et4' => $et4,
                'et5' => $et5,
            ]);
        }else{
            return redirect()->route('login_motoboy');    
        } 
        }

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
            return view('config_motoboy', [ "mot" => $motoboy ]);
            
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

    function listarEntregas(){ 
        if (session()->has("nome")){
                $email = session('email');
                $motoboy = Motoboy::where('email','=', $email)->first();
                $entregas = Entrega::where('id_motoboy','=', $motoboy->id)->get();
            return MotoboyController::mostrarE($entregas);              
        }else{
            return redirect()->route('login_motoboy');    
        }              
    }

    static function mostrarE($array){
        $entregas = $array;
        session()->flash('dados',$entregas);
        return view('lista_entregas_motoboy', [ "etg" => $entregas ]);
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
    if (session()->has("nome")){

        $req->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'senha' => 'required',
            
        ]);

        $nome = $req->input('nome');
        $cpf = $req->input('cpf');
        $telefone = $req->input('telefone');
        $email = $req->input('email');
        $senha = $req->input('senha');

            $mot = motoboy::find($id);
            $mot->nome = $nome;
            $mot->cpf = $cpf;
            $mot->telefone = $telefone;
            $mot->email = $email;
            $mot->senha = $senha;

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
            
        return redirect()->route('menu_motoboy');
    }else{
        return redirect()->route('login_motoboy');    
    } 
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
