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
<div class="row">

	<div class= "col-lg-2 col-md-2 col-sm-2 col-12 d-flex flex-column justify-content-center align-items-center text-white">
		<div>
			<i class="icon-address-card-o"></i>
			<span class="text-white">{{ $value = session()->get('nome')}}</span>
		</div>
	</div>

	<div class= "col-lg-10 col-md-10 col-sm-10 col-12 d-flex flex-column justify-content-rigth align-items-center">	
		
	<div class="row">

		<div class= "dropdown">

			<button class= "btn btn-secondary" type="button" data-toggle="dropdown">
                <div class="d-flex">                
                    <span class="d-none d-md-block ">Aplicaçao&nbsp;</span>
                    <i class="icon-snowflake-o"></i>
                </div> 
			</button>
							
			<div class= "dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class= "dropdown-item" href="#"> 
					<i class="icon-home"></i>
					Menu								
				</a>

				<div class= "dropdown-divider"></div>

				<a class= "dropdown-item" href="{{route('config_motoboy')}}"> 
					<i class="icon-logout"></i>
					Configuraçoes							
				</a>

				<div class= "dropdown-divider"></div>

				<a class= "dropdown-item" href="{{route('logout_motoboy')}}"> 
					<i class="icon-logout"></i>
					Logout								
				</a>
			</div>

		</div>
					
		<div class="dropdown">

            <button class="btn btn-secondary" type="button" data-toggle="dropdown">
                <div class="d-flex">                
                    <span class="d-none d-md-block ">Entregas&nbsp;</span>
                    <i class="icon-box"></i>
                </div> 
            </button>

			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class= "dropdown-item" href="#"> 
					<i class="icon-table"></i>
					Listar								
				</a>
			</div>

		</div>
				
		<div class="dropdown">

            <button class="btn btn-secondary" type="button" data-toggle="dropdown">
                <div class="d-flex">                
                    <span class="d-none d-md-block ">Dashboard&nbsp;</span>
                    <i class="icon-database"></i>
                </div> 
            </button>

			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class= "dropdown-item view_data" href="{{route('dashboard_motoboy')}}">
					<i class="icon-chart-line"></i>
					Indicadores
				</a>
			</div>

		</div>

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