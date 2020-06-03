@extends('templates.principal')
@section('conteudo')
    <div class= "row">
        <span class="d-block p-2 bg-dark text-center text-white w-100">
            <h2>
                Cadastro Motoboy
                <i class="icon-download"></i>
            </h2>
        </span>
    </div>

    <div class="container">
        <div class="row text-center p-2">

            <div class="col-lg-2 col-md-0 col-sm-0 col-0">
                <!-- coluna vazia esquerda -->
            </div>

            <div  class="col-lg-8 col-md-12 col-sm-12 col-12 mt-4 p-3 border border-success rounded">

                <form method="post" action="{{ route('motoboy_add') }}">
                @csrf					
                        <input class="form-control mt-1 border border-success rounded" type="text"  name="nome" placeholder="Digite um nome . . ." required>

                        <input class="form-control mt-1 border border-success rounded" type="text"  name="cpf" placeholder="Digite um cpf . . ." required>

                        <input class="form-control mt-1 border border-success rounded" type="text"  name="telefone" placeholder="Digite um telefone . . ." required>
                        
                        <button class="btn btn-success btn-block mt-1"  type="submit">
                        Cadastrar
                        <i class="icon-plus-circled"></i>
                        </button>			 
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
@endsection