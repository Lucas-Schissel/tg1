<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entrega;

class EntregaController extends Controller
{
    function telaCadastro(){
        return view('telas_cadastros.cadastro_entrega');
    }

    function telaAlteracao($id){
            $entrega = Entrega::find($id);
            return view("telas_updates.atualiza_entrega", [ "etg" => $entrega ]);
    }

    function adicionar(Request $req){

        $req->validate([
            'cod_pedido' => 'required',
            'id_cidade' => 'required',
            'cep' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'complemento' => 'required',
            'bairro' => 'required',          
            'destinatario' => 'required',
            'conteudo' => 'required',
            'id_empresa' => 'required', 
            'id_status' => 'required', 
            'id_motoboy' => 'required', 
        ]);

        $cod_pedido = $req->input('nome');
        $id_cidade = $req->input('id_cidade');
        $cep = $req->input('cep');
    	$rua = $req->input('rua');
        $numero = $req->input('numero');
        $complemento = $req->input('complemento');
        $bairro = $req->input('bairro');
        $destinatario = $req->input('destinatario');
        $conteudo = $req->input('conteudo');
        $id_empresa = $req->input('id_empresa');
        $id_status = $req->input('id_status');
        $id_motoboy = $req->input('id_motoboy');

            $etg = new Entrega();
            $etg->cod_pedido = $cod_pedido;
            $etg->id_cidade = $id_cidade;
            $etg->cep = $cep;
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
            
        return view('telas_cadastros.cadastro_entrega');
    }

    function alterar(Request $req , $id){

        $req->validate([
            'cod_pedido' => 'required',
            'id_cidade' => 'required',
            'cep' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'complemento' => 'required',
            'bairro' => 'required',          
            'destinatario' => 'required',
            'conteudo' => 'required',
            'id_empresa' => 'required', 
            'id_status' => 'required', 
            'id_motoboy' => 'required', 
        ]);

        $cod_pedido = $req->input('nome');
        $id_cidade = $req->input('id_cidade');
        $cep = $req->input('cep');
    	$rua = $req->input('rua');
        $numero = $req->input('numero');
        $complemento = $req->input('complemento');
        $bairro = $req->input('bairro');
        $destinatario = $req->input('destinatario');
        $conteudo = $req->input('conteudo');
        $id_empresa = $req->input('id_empresa');
        $id_status = $req->input('id_status');
        $id_motoboy = $req->input('id_motoboy');

            $etg = Entrega::find($id);
            $etg->cod_pedido = $cod_pedido;
            $etg->id_cidade = $id_cidade;
            $etg->cep = $cep;
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

    function ordenar($id,$nome){
        $dados = collect(session('dados')); 
        if($id == 'asc'){
            $entregas = $dados->sortBy($nome);
        }elseif($id == 'desc'){
            $entregas = $dados->sortByDesc($nome);
        }          
        return EmpresaController::mostrar($entregas);  
    }

    function buscar(Request $req){
        $busca = $req->input('busca');
        if(isset($busca)){
            $entregas = Entrega::where('nome', 'LIKE', "%$busca%")->get();
            return EmpresaController::mostrar($entregas);        
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
        return EmpresaController::mostrar($entregas);
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
