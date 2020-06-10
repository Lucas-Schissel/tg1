@extends('templates.principal')
@section('conteudo')

<!-- Programar aqui-->
<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h3>
			Cadastro de Entrega
			<i class="icon-download"></i>
		</h3>
	</span>
</div>

<div class="container">
    <div class="row text-center p-2">

        <div class="col-lg-2 col-md-0 col-sm-0 col-0">
			<!-- coluna vazia esquerda -->
		</div>

        <div  class="col-lg-8 col-md-12 col-sm-12 col-12 mt-4 p-3 border border-success rounded">

			<form method="post" action="{{ route('entrega_add') }}">
            @csrf					
                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        
                        <input class="form-control m-1 border border-success rounded" type="text"  name="cod_pedido" placeholder="Codigo pedido . . ." value="{{old('cod_pedido')}}" required>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">

                        <select name="id_empresa" class="form-control m-1 border border-success rounded" required>
			                <option value="" disabled selected>Escolha uma empresa:</option>
			                @foreach ($empresas as $e)
			                <option value="{{ $e->id}}">{{$e->nome}}</option>
			                @endforeach
		                </select>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">

                            <input id="cep" class="form-control m-1 border border-success rounded" type="text" name="cep" placeholder="Digite um cep . . ." value="{{old('cep')}}" required>
                    
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-0">        
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">

                        <select name="id_cidade" class="form-control m-1 border border-success rounded" required>
			                <option value="" disabled selected>Escolha uma cidade:</option>
			                @foreach ($cidades as $c)
			                <option value="{{ $c->id}}">{{$c->nome}}</option>
			                @endforeach
		                </select>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-0">
                    </div>

                    <div class="col-lg-9 col-md-9 col-sm-9 col-12">

                        <input id="rua" class="form-control m-1 border border-success rounded" type="text"  name="rua" placeholder="Digite uma rua . . ." value="{{old('rua')}}" required>

                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">

                        <input class="form-control m-1 border border-success rounded" type="number"  name="numero" placeholder="Nº . . ." value="{{old('numero')}}" required>

                    </div>

                    <div class="col-lg-9 col-md-9 col-sm-9 col-12">

                        <input id="bairro" class="form-control m-1 border border-success rounded" type="text"  name="bairro" placeholder="Digite um bairro . . ." value="{{old('bairro')}}" required>

                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-12">

                        <input class="form-control m-1 border border-success rounded" type="text"  name="complemento" placeholder="Complemento . . ." value="{{old('complemento')}}" required>

                    </div>
                   
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                        <input id="cidade" class="form-control m-1 border border-success rounded" type="text"  name="destinatario" placeholder="Digite um destinatario . . ." value="{{old('destinatario')}}" required>

                    </div>    
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        
                        <input class="form-control m-1 border border-success rounded" type="text"  name="conteudo" placeholder="Digite um conteudo . . ." value="{{old('conteudo')}}" required>

                    </div> 
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                        <select name="id_motoboy" class="form-control m-1 border border-success rounded" required>
			                <option value="" disabled selected>Escolha um motoboy:</option>
			                @foreach ($motoboys as $b)
			                <option value="{{ $b->id}}">{{$b->nome}}</option>
			                @endforeach
		                </select>

                    </div>
					
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        
                        <button class="btn btn-success btn-block mt-1"  type="submit">
					     Cadastrar
					    <i class="icon-plus-circled"></i>
                        </button>	

                    </div>
							     
                </div>
			<form>  

        </div>
			
		<div class="col-lg-2 col-md-0 col-sm-0 col-0">
			<!-- coluna vazia direita -->
		</div>

	</div>
</div> 

<div class= "row">
	<span class="d-block p-2 bg-dark w-100">
	</span>
</div>

<script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {

                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");

            }

            $("#cep").blur(function() {

                var cep = $(this).val().replace(/\D/g, '');

                if (cep != "") {

                    var validacep = /^[0-9]{8}$/;

                    if(validacep.test(cep)) {

                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");

                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
    
                            }
                            else {
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    }
                    else {
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } 
                else {
                    limpa_formulário_cep();
                }
            });
        });

    </script>

<!------------------->
@endsection