<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="{{asset('css/t2.css')}}" type="text/css">
	<link rel="stylesheet" href="{{asset('css/fontello.css')}}" type="text/css">

</head>
<body>

<div class="row d-flex justify-content-center">
    <div>
        <h3>
            Motoboy Experience!
            <i class="icon-motorcycle"></i>
        </h3>
    </div>
</div>

<div class="container mt-5 text-center">
    <div class="row">

        <div class="col-lg-2 col-md-2 col-0 mt-2">
			<!-- coluna vazia esquerda -->
		</div>

        <div  class="col-lg-8 col-md-8 col-12 mt-2 p-2">

			<form method="post" action="{{route('motoboy_add')}}">
			@csrf							
					<input class="form-control" type="text" name="nome" placeholder="Digite seu nome . . ." required>
                    
                    <input class="form-control" type="text" name="cpf" placeholder="Digite seu cpf . . ." required>

                    <input class="form-control" type="text" name="telefone" placeholder="Digite seu telefone . . ." required>

                    <input class="form-control" type="text" name="email" placeholder="Digite seu email. . ." required>

                    <input class="form-control" type="password" name="senha" placeholder="Digite uma Senha . . ." required>

                    <br>
                      
                    <button class="btn btn-success btn-block"  type="submit">
					 Registrar-se
					</button>	
					
								 
			<form>  

        </div>
			
		<div class="col-lg-2 col-md-2 col-0 mt-2">
			<!-- coluna vazia direita -->
		</div>

	</div>
</div> 

<script type="text/javascript">
        document.tela_cadastro_cliente.reset();
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>