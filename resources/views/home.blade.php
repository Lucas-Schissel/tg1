@extends('templates.principal')
@section('conteudo')
<div class="container">
    <div class="row justify-content-center">
    <style>
    .card-img-top{
        width:100%;
        height:16rem;
    }
    .card{
        margin:3%;
    }
    </style>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://cdn.pixabay.com/photo/2017/03/13/17/26/ecommerce-2140604_960_720.jpg" class="img-fluid" alt="Imagem responsiva">
                <div class="card-body">
                    <h5 class="card-title">Cadastro de Planos</h5>
                        <p class="card-text">Clique aqui para que possa cadastrar novos planos para os clientes</p>
                            <a href="{{route('planos_cadastro')}}" class="btn btn-primary">Conhecer</a>
                </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://cdn.pixabay.com/photo/2018/05/09/15/28/question-3385451_960_720.jpg" class="img-fluid" alt="Imagem responsiva">
                <div class="card-body">
                    <h5 class="card-title">Status</h5>
                        <p class="card-text">Não sabe como esta o seu pedido? Clique aqui! Nós vamos te ajudar.</p>
                            <a href="{{route('status_listar')}}" class="btn btn-primary">Acompanhar</a>
                </div>
        </div>
        <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/12/20/05/24/store-1919713_960_720.png" class="img-fluid" alt="Imagem responsiva">
        <div class="card-body">
            <h5 class="card-title">Registrar Empresa</h5>
                <p class="card-text">Aqui é possivel preencher os dados da sua Empresa para que possa aproveitar nossas soluções.</p>
            <a href="{{route('empresa_cadastro')}}" class="btn btn-primary">Registrar</a>
        </div>
</div>
<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/11/23/17/51/action-1854040_960_720.jpg" class="img-fluid" alt="Imagem responsiva">
        <div class="card-body">
            <h5 class="card-title">Lista de Motoboys</h5>
                <p class="card-text">Aqui esta a lista de todos os motoboys onde é possivel ver quem são nossos associados.</p>
            <a href="{{route('motoboy_listar')}}" class="btn btn-primary">Lista Motoboy</a>
        </div>
</div>
<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/04/25/21/14/woman-1353211_960_720.png" class="img-fluid" alt="Imagem responsiva">
        <div class="card-body">
            <h5 class="card-title">Configurações</h5>
                <p class="card-text">Precisa atualizar algum dado? Ou conferir alguma permissão, esse é o lugar certo.</p>
            <a href="#" class="btn btn-primary">Acessar as Configurações</a>
        </div>
</div>
    </div>
</div>

@endsection
