@extends('templates.principal')
@section('conteudo')
<!-- Programar aqui-->

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h1>Lista de Empresas</h1>
	</span>
</div>

<div class="table-overflow">

	<table id="tablesorter-imasters" class="table table-bordered table-hover mt-2">
		<thead class="thead-dark">
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>CNPJ</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Operaçoes</th>
			</tr>
		</thead>
		
		<tbody>
		@foreach ($emp as $e)
		  <tr class="table-light">
			<td>{{ $e->id }}</td>
			<td>{{ $e->nome }}</td>
            <td>{{ $e->cnpj }}</td>
            <td>{{ $e->telefone }}</td>
            <td>{{ $e->email }}</td>
            <td>

			 <a class="btn btn-warning mt-1" href="#"> 
			 Alterar
			 <i class="icon-arrows-cw"></i>
			 </a>

			 <a class="delete btn btn-danger m-1" href="#">
			 Excluir
			 <i class="icon-trash-empty"></i>
			 </a>

			 <a class="btn btn-success mt-1" href="#">
			 Indices
			 <i class="icon-chart-line"></i>
			 </a>

			</td>
		  </tr>
		@endforeach
		</tbody>
	</table>

</div>

<div class= "row">
    <span class="d-block p-2 bg-dark text-center text-white w-100">    
            <a class="btn btn-secondary m-1 p-1" type="button2" href="{{ route('home') }}">
                <i class="icon-left-circled"></i>
                Voltar		
            </a>
            <a class="btn btn-secondary m-1 p-1" type="button2" href="{{ route('empresa_cadastro') }}">
                <i class="icon-plus-circled"></i>
                Novo			
            </a>
    </span>
</div>


<!------------------->
@endsection