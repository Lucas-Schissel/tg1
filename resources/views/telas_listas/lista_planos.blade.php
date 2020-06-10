@extends('templates.principal')
@section('conteudo')
<!-- Programar aqui-->

<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h4>Lista de Planos</h4>
	</span>
</div>

<div class="row d-flex justify-content-left">
	<div class = "col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-left mt-1">
		<form style="min-width:100%;" method="get" class="d-flex justify-content-center" action="{{ route('planos_buscar') }}">
			<input class="form-control m-1" type="text" name="busca" placeholder="Busca" autocomplete="off">
			<button class="btn btn-secondary m-1" type="submit">
				<i class="icon-zoom-in"></i>			
			</button>
		</form>
	</div>

	<div class = "col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-center mt-1">	
		<select id="dados" class="btn btn-secondary btn-block m-1">			
			<option value="nome">Nome</option>
			<option value="valor">Preco</option>
		</select>
		<button class="filtro btn btn-secondary m-1" data-id="asc">              
			<i class="icon-sort-name-up"></i>	
		</button>
		<button class="filtro btn btn-secondary m-1" data-id="desc">              
			<i class="icon-sort-name-down"></i>	
		</button>
	</div>
</div>

<div class="tableFixHead">

	<table class="table table-bordered table-hover mt-2">
		<thead class="thead-dark">
			<tr>
				<th>ID:</th>
				<th>Nome:</th>
				<th class="t-preco">Preço:</th>
                <th class="t-descricao">Descriçao:</th>
                <th>Operaçoes:</th>
			</tr>
		</thead>
		
		<tbody>
		@foreach ($pla as $p)
		  <tr class="table-light">
			<td>{{ $p->id }}</td>
			<td>
				<a 
                    class="dados btn btn-light btn-block text-left m-1"					
                    data-nome="{{ $p->nome}}" 
                    data-valor="{{ $p->valor}}" 
					data-descricao="{{ $p->descricao}}"			  
				>
					{{ $p->nome }}
				</a> 
            </td>
            <td class="t-valor">R$:{{ $p->valor }}</td>
            <td class="t-descricao">{{ $p->descricao }}</td>
            
            <td class="text text-white">

			 <a class="btn btn-warning m-1" href="{{route('planos_update', [ 'id' => $p->id ])}}"> 
			 	<div class="d-flex">                
                    <span class="d-none d-md-block ">Alterar&nbsp;</span>
                    <i class="icon-arrows-cw"></i>
                </div> 
			 </a>

			 <a class="delete btn btn-danger m-1" data-nome="{{ $p->nome}}" data-id="{{ $p->id}}">
			 	<div class="d-flex">                
                    <span class="d-none d-md-block ">Excluir&nbsp;</span>
					<i class="icon-trash-empty"></i>
                </div> 			 
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
            <a class="btn btn-secondary m-1 p-1" type="button2" href="{{ route('planos_cadastro') }}">
                <i class="icon-plus-circled"></i>
                Novo			
            </a>
    </span>
</div>

<div class="modal fade" id="excluir" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"></h5>
        </button>
      </div>
      <div class="modal-body">
		Deseja realmente excluir o plano: <span class="nome"></span>?
        
      </div>
      <div class="modal-footer justify-content-center">
		<a href="#" type="button" class="btn btn-outline-secondary delete-yes">Sim</a>
		<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Não</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-dados" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
		  <b>Plano: </b><span class="nome"></span> 
		  <br>
          <b>Valor: </b><span class="valor"></span>
		  <br>
		  <b>Descriçao: </b><span class="descricao"></span>
      </div>
    </div>
  </div>
</div>

<script>
	$('.delete').on('click', function(){
		var nome = $(this).data('nome');
		var id = $(this).data('id'); 
		$('span.nome').text(nome); 
		$('a.delete-yes').attr('href', '/planos/excluir/' +id); 
		$('#excluir').modal('show');
	});
</script>

<script>
	$('.dados').on('click', function(){
		var descricao = $(this).data('descricao');
		var valor = $(this).data('valor');
		var nome = $(this).data('nome');
		$('span.nome').text(nome); 
		$('span.valor').text(valor); 
		$('span.descricao').text(descricao);
		$('#modal-dados').modal('show');
	});
</script>

<script>
	$('.filtro').on('click', function(){
		var select = document.getElementById('dados');
		var value = select.options[select.selectedIndex].value;
		var id = $(this).data('id');
		$(location).attr('href', '/planos/ordenar/'+ id + '/' + value);		
	});
</script>

<!------------------->
@endsection