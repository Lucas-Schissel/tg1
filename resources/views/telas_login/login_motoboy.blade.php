<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="{{asset('css/t1.css')}}" type="text/css">
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
		<h1>Login</h1>
		<div class="row">

			  <div class="col-lg-2 col-md-2 col-0 mt-2">
				<!-- coluna vazia esquerda -->
			</div>
			<div  class="col-lg-8 col-md-8 col-12 mt-2 p-2">	
			
				<form method="post" action="{{route('motoboy_login')}}">
					@csrf
					<input class="form-control" type="text" name="email" placeholder="Email..." required>
					<br>
					<input class="form-control" type="password" name="senha" placeholder="Senha..." required>
					<br>
					<button class="btn btn-success btn-block"  type="submit">
					 Logar
					<i class="icon-login"></i>
					</button>
					<br>
				</form>		
					
			</div>
			
			<div class="col-lg-2 col-md-2 col-0 mt-2">
				<!-- coluna vazia direita -->
			</div>
		</div>
	</div>

	<footer>
	  <h3>
		  {{date("d/m/Y")}}
	  </h3>
	</footer> 
	
	<script type="text/javascript">
        document.tela_login.reset();
	</script>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

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

</body>
</html>