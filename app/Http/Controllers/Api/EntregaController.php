<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Entrega;
use App\Cidade;
use App\Empresa;

class EntregaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Entrega::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = json_decode($request->getContent(), 1);
        $cep = $dados['cep'];
        $enderecamento = Http::get("viacep.com.br/ws/$cep/json/");
        $viaCepLogradouro = $enderecamento["logradouro"];
        $viaCepBairro = $enderecamento["bairro"];
        $viaCepCidade = $enderecamento["localidade"];
        $viaCepEstado = $enderecamento["uf"];
        
        $e = new Entrega();
        $cidade = Cidade::where('nome', '=', $viaCepCidade)->first(); //Pega a cidade com o mesmo nome do que veio do viacep
        $empresa = Empresa::where('token', '=', $dados['token'])->first(); //Pega a empresa com o mesmo token que foi recebido

        if(isset($empresa)){ //Se encontrou a empresa beleza
            $e->cod_pedido = $dados['id_pedido'];
            $e->id_cidade = $cidade->id;
            $e->cep = $cep;
            $e->rua = $viaCepLogradouro;
            $e->numero = $dados['numeroCasa'];
            $e->complemento = '';
            $e->bairro = $viaCepBairro;
            $e->destinatario = $dados['cliente'];
            $e->conteudo = $dados['qtdProdutos'];
            $e->id_empresa = $empresa->id;

            //Configurar Status e Motoboy, conforme a necessidade
            $e->id_status = 1;
            $e->id_motoboy = 1;            

            $e->save();

            return $e; 
        }else{ //Se não encontrou a empresa, retorna código 404 e mostra a mensagem de erro
            return response('Token não reconhecido', 404)
            ->header('Content-Type', 'text/plain');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entrega = Entrega::find($id); //Busca a entrega

        return $entrega->status->nome; //Retorna o status da entrega
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
