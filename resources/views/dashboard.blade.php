@extends('templates.principal')
@section('conteudo')
<!-- Programar aqui-->
<div class="row bg-dark text-white border border-white rounded ">
			<div class = "col-md-12 col-sm-12 col-12">
				Clientes:
				<span class="badge badge-primary badge-pill">{{$empresas}}</span>		
			</div>
			<div class = "col-md-12 col-sm-12 col-12">
				Motoboys :
				<span class="badge badge-primary badge-pill">{{$motoboys}}</span>		
			</div>
			<div class = "col-md-12 col-sm-12 col-12">
				Entregas Efetuadas:
				<span class="badge badge-primary badge-pill">{{$entregas}}</span>	
			</div>
			<div class = "col-md-12 col-sm-12 col-12">
				Cidades Alcançadas:
				<span class="badge badge-primary badge-pill">{{$cidades}}</span>	
			</div>				
	</div>
<!------------------->
@endsection