@extends('templates.principal')
@section('conteudo')
<!-- Programar aqui-->

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h5>
			Atualizaçao de Cadastro
			<i class="icon-download"></i>
		</h5>
	</span>
</div>

<form method="post" action="{{ route('empresa_alterar' , ['id' => $emp->id]) }}">
@csrf

<div id="t-atualizacao" class="container-fluid border border-secondary rounded mt-1 p-1">    	

    <div class="input-group border border-secondary rounded mt-1 mr-1">
        <div class="input-group-prepend">
            <span class="input-group-text bg-secondary text-white" id="basic-addon1">
            Nome:</span>
        </div>
        <input class="form-control" type="text" name="nome" placeholder="Digite um nome..." 
        value="{{$emp->nome}}" required>
    </div>

    <div class="input-group border border-secondary rounded mt-1 mr-1">
        <div class="input-group-prepend">
            <span class="input-group-text bg-secondary text-white" id="basic-addon1">
            CNPJ:</span>
        </div>
        <input class="form-control" type="text"  name="cnpj" placeholder="Digite um cnpj..." 
        value="{{ $emp->cnpj}}" required>
    </div>

    <div class="input-group border border-secondary rounded mt-1 mr-1">
        <div class="input-group-prepend">
            <span class="input-group-text bg-secondary text-white" id="basic-addon1">
            Telefone:</span>
        </div>
        <input class="form-control" type="text"  name="telefone" placeholder="Digite um telefone..." 
        value="{{ $emp->telefone}}" required>
    </div>

    <div class="input-group border border-secondary rounded mt-1 mr-1">
        <div class="input-group-prepend">
            <span class="input-group-text bg-secondary text-white" id="basic-addon1">
            Email:</span>
        </div>
        <input class="form-control" type="email"  name="email" placeholder="Digite um email..." 
        value="{{$emp->email}}" required>
    </div>

    <div class="input-group border border-secondary rounded mt-1 mr-1">
        <div class="input-group-prepend">
            <span class="input-group-text bg-secondary text-white" id="basic-addon1">
            Senha:</span>
        </div>
        <input class="form-control" type="password"  name="senha" placeholder="Digite uma senha..." 
        value="{{$emp->senha}}" required>
    </div>

    <button class="btn btn-success btn-block mt-3 p-3 "  type="submit">
		Salvar Alteraçoes
		<i class="icon-plus-circled"></i>
    </button>  

</div>
<form>  

<div class= "row">
	<span class="d-block p-2 bg-dark w-100">
	</span>
</div>
<!------------------->
@endsection