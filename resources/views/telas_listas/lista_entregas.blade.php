@extends('templates.principal')
@section('conteudo')
<!-- Programar aqui-->
<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h3>Lista de Entregas</h3>
	</span>
</div>

<div class="row d-flex justify-content-left">
	<div class = "col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 d-flex justify-content-left mt-1">
		<form style="min-width:100%;" method="post" class="d-flex justify-content-center" action="{{ route('entrega_buscar')}}">
		@csrf
			<input class="form-control m-1" type="text" name="busca" placeholder="Busca" autocomplete="off">
			<button class="btn btn-secondary m-1" type="submit">
				<i class="icon-zoom-in"></i>			
			</button>
		</form>
	</div>

	<div class = "col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12 d-flex justify-content-center mt-1">
		<form style="min-width:100%;" method="post" id="form" action="{{ route('entrega_ordenar')}}">	
		@csrf
			<select id="dados" name="dados" class="form-control btn btn-secondary btn-block m-1">
				<option value="data">Data</option>			
				<option value="cidade">Cidade</option>
				<option value="empresa">Empresa</option>
				<option value="motoboy">Motoboy</option>
			</select>
	</div>
	<div class = "col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12 d-flex justify-content-center mt-1">
			<input type="hidden" id="var1" name="var1" value=""/>
			<input type="hidden" id="var2" name="var2" value=""/>
			<button class="filtro btn btn-secondary btn-block m-1" data-id="asc">              
				<i class="icon-sort-name-up"></i>	
			</button>
			<button class="filtro btn btn-secondary btn-block m-1" data-id="desc">              
				<i class="icon-sort-name-down"></i>	
			</button>
		</form>
	</div>
</div>

<div>

	<table class=" table table-bordered table-hover mt-2">
		<thead class="thead-dark">
			<tr>
				<th>ID</th>
				<th>Cod Pedido</th>
				<th class="t-data">Data</th>
				<th class="t-cep">CEP</th>
				<th class="t-empresa">Cidade</th>
                <th class="t-empresa">Empresa</th>
                <th class="t-motoboy">Motoboy</th>
                <th>Operaçoes</th>
			</tr>
		</thead>
		
		<tbody>
		@foreach ($etg as $e)
		  <tr class="table-light">
			<td>{{ $e->id }}</td>
			<td>
				<a 
					class="dados btn btn-light btn-block text-left m-1"					
					data-id ="{{ $e->id}}" 
					data-pedido ="{{ $e->cod_pedido}}"
					data-cep ="{{ $e->cep}}"
					data-rua ="{{ $e->rua}}"   
                    data-numero ="{{ $e->numero}}"
                    data-complemento ="{{ $e->complemento}}"
					data-bairro ="{{ $e->bairro}}"   
                    data-destinatario ="{{ $e->destinatario}}"
                    data-conteudo="{{ $e->conteudo}}"
					data-empresa="{{ $e->empresa->nome}}"   
                    data-cidade="{{ $e->cidade->nome}}"
                    data-motoboy="{{ $e->motoboy->nome}}"
					>
					{{ $e->cod_pedido }}
				</a> 
			</td>
			<td class="t-data">{{ $e->created_at->format('d/m/Y') }}</td>
			<td class="t-cep">{{ $e->cep }}</td>
			<td class="t-empresa">{{ $e->cidade->nome}}</td>
            <td class="t-empresa">{{ $e->empresa->nome}}</td>
            <td class="t-motoboy">{{ $e->motoboy->nome}}</td>
            <td class="d-flex justify-content-center text text-white">

			 <a class="btn btn-warning m-1" href="{{route('entrega_update', [ 'id' => $e->id ])}}"> 
			 	<div class="d-flex">                
                    <span class="d-none d-lg-block ">Alterar&nbsp;</span>
                    <i class="icon-arrows-cw"></i>
                </div> 
			 </a>

			 <a class="delete btn btn-danger m-1" data-nome="{{ $e->cod_pedido}}" data-id="{{ $e->id}}">
			 	<div class="d-flex">                
                    <span class="d-none d-lg-block ">Excluir&nbsp;</span>
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
            <a class="btn btn-secondary m-1 p-1" type="button2" href="{{ route('entrega_cadastro') }}">
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
		Deseja realmente excluir a entrega: <span class="pedido"></span>?
        
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
	  	<b>ID:</b>
		   <span class="id"></span>
          <br>
		<b>Nº Pedido:</b>
			<span class="pedido"></span>
		  <br>
		<b>CEP:</b>
			<span class="cep"></span>
		  <br>
		<b>Rua:</b>
			<span class="rua"></span>
		  <br>
		<b>Nº:</b>
			<span class="numero"></span>
          <br>
		<b>Complemento:</b>
			<span class="complemento"></span>
          <br>
		<b>Bairro:</b>
			<span class="bairro"></span>
          <br>
		<b>Destinatario:</b>
		  	<span class="destinatario"></span>
          <br>
		<b>Empresa:</b>
			<span class="empresa"></span>
          <br>
		<b>Cidade:</b> 
			<span class="cidade"></span>
          <br>
		<b>Motoboy:</b> 
			<span class="motoboy"></span>
      </div>
    </div>
  </div>
</div>


<script>
	$('.delete').on('click', function(){
		var nome = $(this).data('pedido');
		var id = $(this).data('id'); 
		$('span.nome').text(nome); 
		$('a.delete-yes').attr('href', '/entrega/excluir/' +id); 
		$('#excluir').modal('show');
	});
</script>

<script>
	$('.dados').on('click', function(){
        var empresa = $(this).data('empresa');
        var motoboy = $(this).data('motoboy');
		var cidade = $(this).data('cidade');
		var destinatario = $(this).data('destinatario');
		var conteudo = $(this).data('conteudo');
		var complemento = $(this).data('complemento');
		var bairro = $(this).data('bairro');
        var numero = $(this).data('numero');
		var rua = $(this).data('rua');
		var cep = $(this).data('cep');
		var pedido = $(this).data('pedido');
		var id = $(this).data('id'); 
        $('span.id').text(id); 
		$('span.pedido').text(pedido); 
		$('span.cep').text(cep); 
		$('span.rua').text(rua); 
        $('span.numero').text(numero);
		$('span.bairro').text(bairro); 
		$('span.complemento').text(complemento);
        $('span.conteudo').text(conteudo); 
		$('span.destinatario').text(destinatario); 
		$('span.cidade').text(cidade); 
		$('span.motoboy').text(motoboy); 
        $('span.empresa').text(empresa); 
		$('#modal-dados').modal('show');
	});
</script>

<script>
	$('.filtro').on('click', function(){
		var select = document.getElementById('dados');
		var value = select.options[select.selectedIndex].value;
		var id = $(this).data('id');
		$("#var1").val(id);
		$("#var2").val(value);
		$("#form").submit();	
	});
</script>
<!------------------->
@endsection