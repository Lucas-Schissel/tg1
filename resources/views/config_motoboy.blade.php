@extends('templates.motoboys')
@section('conteudo')

<form method="post" action="{{ route('motoboy_alterar' , ['id' => $mot->id]) }}">
@csrf

<div id="t-atualizacao" class="container-fluid border border-secondary rounded mt-1 p-1">    	

    <div class="input-group border border-secondary rounded mt-1 mr-1">
        <div class="input-group-prepend">
            <span class="input-group-text bg-secondary text-white" id="basic-addon1">
            Nome:</span>
        </div>
        <input class="form-control" type="text" name="nome" placeholder="Digite um nome..." 
        value="{{$mot->nome}}" required>
    </div>

    <div class="input-group border border-secondary rounded mt-1 mr-1">
        <div class="input-group-prepend">
            <span class="input-group-text bg-secondary text-white" id="basic-addon1">
            CPF:</span>
        </div>
        <input class="form-control" type="text"  name="cpf" placeholder="Digite um cpf..." 
        value="{{ $mot->cpf}}" required>
    </div>

    <div class="input-group border border-secondary rounded mt-1 mr-1">
        <div class="input-group-prepend">
            <span class="input-group-text bg-secondary text-white" id="basic-addon1">
            Telefone:</span>
        </div>
        <input class="form-control" type="text"  name="telefone" placeholder="Digite um telefone..." 
        value="{{ $mot->telefone}}" required>
    </div>

    <div class="input-group border border-secondary rounded mt-1 mr-1">
        <div class="input-group-prepend">
            <span class="input-group-text bg-secondary text-white" id="basic-addon1">
            Email:</span>
        </div>
        <input class="form-control" type="text"  name="email" placeholder="Digite um email..." 
        value="{{ $mot->email}}" required>
    </div>

    <div class="input-group border border-secondary rounded mt-1 mr-1">
        <div class="input-group-prepend">
            <span class="input-group-text bg-secondary text-white" id="basic-addon1">
            Senha:</span>
        </div>
        <input class="form-control" type="text"  name="senha" placeholder="Digite uma senha..." 
        value="{{ $mot->senha}}" required>
    </div>

    <button class="btn btn-success btn-block mt-3 p-3 "  type="submit">
		Salvar Alteraçoes
    </button>  

</div>
<form>  

<div class= "row">
	<span class="d-block p-2 bg-dark w-100">
	</span>
</div>

@endsection