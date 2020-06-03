<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Tittle -->
    <title>Principal</title>

    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Css -->
	<link rel="stylesheet" href="{{asset('css/principal.css')}}" type="text/css">   
    <link rel="stylesheet" href="{{asset('css/fontello.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">


</head>
<body>

<script src           = "https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src           = "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src           = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<div class= "cabecalho container-fluid bg-dark">
	<div class= "d-flex justify-content-center bg-dark">

		<div class= "dropdown">

			<button class= "btn btn-secondary" type="button" data-toggle="dropdown">
                <div class="d-flex">                
                    <span class="d-none d-sm-block ">Aplicaçao&nbsp;</span>
                    <i class="icon-snowflake-o"></i>
                </div> 
			</button>
							
			<div class= "dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class= "dropdown-item" href="#"> 
					<i class="icon-home"></i>
					Menu								
				</a>

				<div class= "dropdown-divider"></div>

				<a class= "dropdown-item" href="#"> 
					<i class="icon-logout"></i>
					Configuraçoes							
				</a>

				<div class= "dropdown-divider"></div>

				<a class= "dropdown-item" href="{{route('logout')}}"> 
					<i class="icon-logout"></i>
					Logout								
				</a>
			</div>

		</div>
					
		<div class= "dropdown">

            <button class="btn btn-secondary" type="button" data-toggle="dropdown">
                <div class="d-flex">                
                    <span class="d-none d-sm-block ">Cadastros&nbsp;</span>
                    <i class="icon-pencil"></i>
                </div> 
            </button>
							
			<div class= "dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class= "dropdown-item" href="{{route('cidade_cadastro')}}"> 
					<i class="icon-user-circle-o"></i>	
					Cidades														
				</a>

				<div class= "dropdown-divider"></div>

				<a class= "dropdown-item" href="{{route('empresa_cadastro')}}"> 
					<i class="icon-user-circle-o"></i>	
					Empresas														
				</a>

				<div class= "dropdown-divider"></div>

				<a class= "dropdown-item" href="{{route('estado_cadastro')}}"> 
					<i class="icon-user-circle-o"></i>	
					Estados														
				</a>

				<div class= "dropdown-divider"></div>
		
				<a class= "dropdown-item" href="{{route('motoboy_cadastro')}}"> 
					<i class="icon-tags"></i>
					Motoboy								
				</a>

        <div class= "dropdown-divider"></div>

				<a class= "dropdown-item" href="{{route('planos_cadastro')}}"> 
					<i class="icon-tags"></i>
					Planos								
				</a>
        
			</div>
		</div>
					
		<div class="dropdown">

            <button class="btn btn-secondary" type="button" data-toggle="dropdown">
                <div class="d-flex">                
                    <span class="d-none d-sm-block ">&nbsp;&nbsp;Listas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <i class="icon-table"></i>
                </div> 			
			</button>

			<div class= "dropdown-menu" aria-labelledby="dropdownMenuButton">

				<a class= "dropdown-item" href="{{route('cidade_listar')}}"> 
					<i class="icon-user-circle-o"></i>	
					Cidades														
				</a>

				<div class= "dropdown-divider"></div>

				<a class= "dropdown-item" href="{{route('empresa_listar')}}"> 
					<i class="icon-user-circle-o"></i>	
					Empresas														
				</a>

				<div class= "dropdown-divider"></div>

				<a class= "dropdown-item" href="#"> 
					<i class="icon-tags"></i>
					Motoboy								
				</a>

                <div class= "dropdown-divider"></div>

				<a class= "dropdown-item" href="{{route('planos_listar')}}"> 
					<i class="icon-tags"></i>
					Planos								
				</a>
			</div>

		</div>	
				
		<div class="dropdown">

            <button class="btn btn-secondary" type="button" data-toggle="dropdown">
                <div class="d-flex">                
                    <span class="d-none d-sm-block ">Dashboard&nbsp;</span>
                    <i class="icon-database"></i>
                </div> 
            </button>

			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class= "dropdown-item view_data" href="#">
					<i class="icon-chart-line"></i>
					Indicadores
				</a>
			</div>

		</div>

	</div>
</div>


    <div class="container-fluid">
		<div class="row d-flex m-2 border border-secondary rounded">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            @if ($errors->any())
			<div class="modal fade" id="recado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-body alert-danger rounded">
							<ul style="list-style: none">
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>						
					</div>
				</div>
			</div>

			<script type="text/javascript">
			$('#recado').modal('show')
			</script>
			@endif

			@if (session()->has('mensagem'))				
				
				<div class="modal fade" id="recado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							@if (session()->has('s'))
							<div class="modal-body alert-success rounded">
							{{session()->forget('s')}}
							@elseif (session()->has('f'))
							<div class="modal-body alert-danger rounded">
							{{session()->forget('f')}}
							@else
							<div class="modal-body alert-info rounded">
							@endif	
								<div>{{ session('mensagem')}}</div>	
							</div>			
						</div>
					</div>
				</div>

				<script type="text/javascript">
    					$('#recado').modal('show')
				</script>				
							
				{{session()->forget('mensagem')}}
				
			@endif

				@yield('conteudo')

			</div>
		</div>
	</div>
	
</div>
    
</body>
</html>