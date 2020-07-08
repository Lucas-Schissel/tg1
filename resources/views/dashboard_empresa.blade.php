@extends('templates.empresas')
@section('conteudo')
<!-- Programar aqui-->
<div class="row bg-dark text-white border border-white rounded ">
			<div class = "col-md-12 col-sm-12 col-12">
				Pedidos efetuados:
				<span class="badge badge-primary badge-pill">{{$et1}}</span>	
			</div>
			<div class = "col-md-12 col-sm-12 col-12">
				Pedidos em andamento:
				<span class="badge badge-primary badge-pill">{{$et2}}</span>	
			</div>
			<div class = "col-md-12 col-sm-12 col-12">
				Pedidos em finalizados:
				<span class="badge badge-primary badge-pill">{{$et3}}</span>	
			</div>
			<div class = "col-md-12 col-sm-12 col-12">
				Pedidos cancelados:
				<span class="badge badge-primary badge-pill">{{$et4}}</span>	
			</div>
			<div class = "col-md-12 col-sm-12 col-12">
				Pedidos avariados:
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