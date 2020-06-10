@extends('templates.principal')
@section('conteudo')
<!-- Programar aqui-->

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h3>
			Cadastro de Estados
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

			<form method="post" action="{{ route('estado_add') }}">
			@csrf

				<div class="row">

				<div class="col-lg-12 col-md-12 col-sm-12 col-12">

				<input class="form-control m-1 border border-success rounded" type="text"  name="nome" placeholder="Nome . . ." required>

				</div>

				<div class="col-lg-3 col-md-3 col-sm-3 col-3">

				<input class="form-control m-1 border border-success rounded" type="text"  name="sigla" placeholder="Sigla . . ." required>

				</div>

				<div class="col-lg-9 col-md-9 col-sm-9 col-9">

				<input class="form-control m-1 border border-success rounded" type="text"  name="regiao" placeholder="Regiao . . ." required>
				
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-12">

				<button class="btn btn-success btn-block m-1 "  type="submit">
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

<!------------------->
@endsection