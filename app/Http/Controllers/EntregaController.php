<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Entrega;
use App\Empresa;
use App\StatusEntrega;
use App\Motoboy;
use App\Cidade;
use Auth;

class EntregaController extends Controller
{
    function telaCadastro(){
        $empresas = Empresa::all();
        $motoboys = Motoboy::all();
        $cidades = Cidade::all();

        return view('telas_cadastros.cadastro_entrega')->with(compact('empresas','motoboys','cidades'));
    }

    function telaAlteracao($id){
            $entrega = Entrega::find($id);
            $status = StatusEntrega::all();
            return view("telas_updates.atualiza_entrega", [ 'etg' => $entrega , 'std' => $status ]);
    }

    function alterar(Request $req , $id){
        $id_status = $req->input('id_status');
        $etg = Entrega::find($id);
        $etg->id_status = $id_status;
        $etg->save();

        
        if ($etg->save()){
            session([
                'mensagem' =>"Entrega: $etg->id, alterada com sucesso!",
                's'=>'s'
            ]);
        } else {
            session([
                'mensagem' =>"Entrega: $etg->id, nao foi alterada!",
                'f'=>'f'
            ]);
        }
        return redirect()->route('entrega_listar');
    }

    /*
    function buscacep(Request $req){
        $cod_pedido = $req->input('cod_pedido');
        $cep = $req->input('cep');
        $id_empresa = $req->input('id_empresa');
        $id_cidade = $req->input('id_empresa');

        $req->validate([
            'cod_pedido' => 'required',
            'cep' => 'required',
            'id_empresa' => 'required', 
            'id_cidade' => 'required', 
        ]);       

        $info = Http::get("http://viacep.com.br/ws/$cep/json/");
        
        $logradouro = $info["logradouro"];
        $bairro = $info["bairro"];
        $cidade= $info["localidade"];

        return view('telas_cadastros_cadastro_entrega2',[
            'cod_pedido' => $cod_pedido ,
            'cep' => $cep,
            'id_empresa' => $id_empresa , 
            'id_cidade' => $id_cidade ,
            'logradouro' => $logradouro,
            'bairro' => $bairro,
            'destinatario' => $cidade,
            
            ]
        );
    }
    */

    function adicionar(Request $req){

        $req->validate([
            'cod_pedido' => 'required',
            'id_cidade' => 'required',
            'cep' => 'required|numeric',
            'rua' => 'required',
            'numero' => 'required|numeric',
            'complemento' => 'required',
            'bairro' => 'required',          
            'destinatario' => 'required',
            'conteudo' => 'required',
            'id_empresa' => 'required|numeric', 
            'id_motoboy' => 'required|numeric', 
        ]);

        $cod_pedido = $req->input('cod_pedido');
        $id_cidade = $req->input('id_cidade');
        $cep = $req->input('cep');
    	$rua = $req->input('rua');
        $numero = $req->input('numero');
        $complemento = $req->input('complemento');
        $bairro = $req->input('bairro');
        $destinatario = $req->input('destinatario');
        $conteudo = $req->input('conteudo');
        $id_empresa = $req->input('id_empresa');
        $id_status = 1;
        $id_motoboy = $req->input('id_motoboy');

            $etg = new Entrega();
            $etg->cod_pedido = $cod_pedido;
            $etg->id_cidade = $id_cidade;
            $etg->cep = $cep;
            $etg->rua = $rua;
            $etg->numero = $numero;
            $etg->complemento = $complemento;
            $etg->bairro = $bairro;
            $etg->destinatario = $destinatario;
            $etg->conteudo = $conteudo;            
            $etg->id_empresa = $id_empresa;
            $etg->id_status = $id_status;
            $etg->id_motoboy = $id_motoboy;

            if ($etg->save()){
                session([
                    'mensagem' =>"Entrega: $etg->id, foi adicionada com sucesso!",
                    's'=>'s'
                ]);
            } else {
                session([
                    'mensagem' =>"Entrega: $etg->id, nao foi adicionada!",
                    'f'=>'f'
                ]);
            }
            
        return redirect()->route('entrega_cadastro');
    }             

    function ordenar(Request $req){
        $id = $req->input('var1');
        $v2 = $req->input('var2');
        if($v2 === 'data'){
            $tabela = 'empresas';
            $nome = 'created_at';
        }else if($v2 === 'empresa'){
            $tabela = 'empresas';
            $nome = 'id_empresa';
        }else if($v2 === 'motoboy'){
            $tabela = 'motoboy';
            $nome = 'id_motoboy';
        }else if($v2 === 'cidade'){
            $tabela = 'cidades';
            $nome = 'id_cidade';
        }

        $dados = collect(session('dados'));
        $valor = DB::table("$tabela")->select('id', 'nome')->get();

        foreach($dados as $d){
            foreach($valor as $v){
                if($tabela == 'empresas'){
                    if($d->id_empresa == $v->id){
                        $d->id_empresa = $v->nome;
                    }
                }else if($tabela == 'motoboy'){
                    if($d->id_motoboy == $v->id){
                        $d->id_motoboy = $v->nome;
                    }
                }else if($tabela == 'cidades'){
                    if($d->id_cidade == $v->id){
                        $d->id_cidade = $v->nome;
                    }
                }
            }
        }
        //dd($dados);
        if($id == 'asc'){
            $entregas = $dados->sortBy($nome);
        }elseif($id == 'desc'){
            $entregas = $dados->sortByDesc($nome);
        } 
        //dd($entregas);
        return EntregaController::mostrar($entregas);  
    }

    function buscar(Request $req){
        $busca = $req->input('busca');
        if(isset($busca)){
            $entregas = Entrega::where('cod_pedido', 'LIKE', "%$busca%")->get();
            return EntregaController::mostrar($entregas);        
        }else{
            return redirect()->route('entrega_listar');
        }              
    }

    static function mostrar($array){
        $entregas = $array;
        session()->flash('dados',$entregas);
        return view('telas_listas.lista_entregas', [ "etg" => $entregas]);
    }

    function listar(){        
        $entregas = Entrega::all(); 
        return EntregaController::mostrar($entregas);
    }

    function excluir($id){        
        $entrega = Entrega::find($id);                    
            if ($entrega->delete()){
                session([
                    'mensagem' =>"Entrega: $entrega->id, foi excluída com sucesso!",
                    's'=>'s'
                ]);
            
            } else {
                session([
                    'mensagem' =>"Entrega: $entrega->id, nao foi excluída!",
                    'f'=>'f'
                ]);
            }
            return redirect()->route('entrega_listar');
    }
}
