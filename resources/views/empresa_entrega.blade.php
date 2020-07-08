@extends('templates.empresas')
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

			<form method="post" action="{{ route('entrega_adicionar') }}">
            @csrf					
                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        
                        <input class="form-control m-1 border border-success rounded" type="text"  name="cod_pedido" placeholder="Codigo pedido . . ." value="{{old('cod_pedido')}}" required>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">

                        

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">

                        <input id="cep" class="form-control m-1 border border-success rounded" type="text" name="cep" placeholder="Digite um cep . . ." value="{{old('cep')}}" required autocomplete="off">
                    
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">  
                    <button  class="btn btn-info btn-block mt-1"  onclick="carregaInformacoes()"> 
                    Carregar informações 
                    </button>	    
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                        <input id="estado" class="form-control m-1 border border-success rounded" type="text"  name="estado" placeholder="Digite uma estado" value="">    

                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                        <input id="cidade" class="form-control m-1 border border-success rounded" type="text"  name="cidade" placeholder="Digite uma cidade" value="">    

                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                        <input id="bairro" class="form-control m-1 border border-success rounded" type="text"  name="bairro" placeholder="Digite um bairro . . ." value="" required>

                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                        <input id="logradouro" class="form-control m-1 border border-success rounded" type="text"  name="logradouro" placeholder="Digite uma rua" value="">    

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">

                        <input class="form-control m-1 border border-success rounded" type="number"  name="numero" placeholder="Nº . . ." value="" required>

                    </div>                   

                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">

                        <input class="form-control m-1 border border-success rounded" type="text"  name="complemento" placeholder="Complemento . . ." value="" required>

                    </div>
                   
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                        <input id="cidade" class="form-control m-1 border border-success rounded" type="text"  name="destinatario" placeholder="Digite um destinatario . . ." value="" required>

                    </div>    
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        
                        <input class="form-control m-1 border border-success rounded" type="text"  name="conteudo" placeholder="Digite um conteudo . . ." value="" required>

                    </div> 
                    					
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        
                        <button class="btn btn-success btn-block mt-1"  type="submit">
					     Cadastrar
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

<script type="text/javascript">
    function carregaInformacoes(){
        var cep, http;
        cep = document.getElementById("cep").value;

        if(cep != ""){

        http = new XMLHttpRequest();
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200 ){
                var dados = JSON.parse(this.responseText);
                document.getElementById("cidade").value = dados.localidade;
                document.getElementById("bairro").value = dados.bairro;
                document.getElementById("estado").value = dados.uf;
                document.getElementById("logradouro").value = dados.logradouro;
                document.getElementById("resposta").value ="";

            }else if(this.readyState != 4){
                
                document.getElementById("resposta").innerHTML ="Carregando";
            }
        }

        http.open("GET" , "http://viacep.com.br/ws/" + cep + "/json/");
        http.send();

        }

    }

</script>

<!------------------->
@endsection