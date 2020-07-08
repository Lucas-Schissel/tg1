@extends('templates.motoboys')
@section('conteudo')
<!-- Programar aqui-->
<div class="row bg-dark text-white border border-white rounded ">
<div class = "col-md-12 col-sm-12 col-12">
				Entregas efetuadas:
				<span class="badge badge-primary badge-pill">{{$et1}}</span>	
			</div>
			<div class = "col-md-12 col-sm-12 col-12">
				Entregas cancelados:
				<span class="badge badge-primary badge-pill">{{$et4}}</span>	
			</div>
			<div class = "col-md-12 col-sm-12 col-12">
				Entregas avariadas:
				<span class="badge badge-primary badge-pill">{{$et5}}</span>	
			</div>
			<div class = "col-md-12 col-sm-12 col-12">
				Cidades alcançadas:
				<span class="badge badge-primary badge-pill"></span>		
			</div>
			<div class = "col-md-12 col-sm-12 col-12">
				Média NPS:
				<span class="badge badge-primary badge-pill"></span>		
			</div>					
	</div>
<!------------------->
@endsection