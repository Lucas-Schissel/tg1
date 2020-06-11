@extends('templates.principal')
@section('conteudo')
<!-- Programar aqui-->
<div class= "row">
	<span class="d-block p-2 bg-dark text-center text-white w-100">
		<h3>
			Alteraçao de Entrega
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

			<form method="post" action="{{route('entrega_alterar' , ['id' => $etg->id])}}">
            @csrf					
                <div class="row">
				

                    <div class="form-control col-lg-6 col-md-6 col-sm-6 col-12 bg-dark text-white ">
					Pedido: 
                        <span class="badge badge-primary badge-pill"> {{ $etg->cod_pedido}}</span>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">

						<select name="id_status" class="form-control  border border-success rounded" required>
						<option value="" disabled selected>Escolha uma status:</option>
							@foreach ($std as $s)
								<option value="{{ $s->id}}">{{$s->nome}}</option>
							@endforeach
						</select>

                    </div>
					
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        
                        <button class="btn btn-success btn-block mt-1"  type="submit">
					     Salvar Alteraçoes
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