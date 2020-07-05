@extends('templates.principal')
@section('conteudo')
<div class="container">
    <div class="row justify-content-center">
    
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="#" class="img-fluid" alt="Imagem responsiva">
                <div class="card-body">
                    <h5 class="card-title">Cadastro de Planos</h5>
                        <p class="card-text">Clique aqui para que possa cadastrar novos planos para os clientes</p>
                        <a href="{{route('planos_cadastro')}}" class="btn btn-primary">Conhecer</a>
                </div>
        </div>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="#" class="img-fluid" alt="Imagem responsiva">
                <div class="card-body">
                    <h5 class="card-title">Lista de Motoboys</h5>
                        <p class="card-text">Aqui esta a lista de todos os motoboys onde é possivel ver quem são nossos associados.</p>
                         <a href="{{route('motoboy_listar')}}" class="btn btn-primary">Lista Motoboy</a>
                </div>
        </div>
        
       
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="#" class="img-fluid" alt="Imagem responsiva">
                 <div class="card-body">
                    <h5 class="card-title">Configurações</h5>
                        <p class="card-text">Precisa atualizar algum dado? Ou conferir alguma permissão, esse é o lugar certo.</p>
                         <a href="#" class="btn btn-primary">Acessar as Configurações</a>
                </div>
        </div>

    </div>
</div>

@endsection
