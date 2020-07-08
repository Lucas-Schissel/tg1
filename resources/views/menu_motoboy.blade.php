@extends('templates.motoboys')
@section('conteudo')

<div>

<form method="post" action="{{ route('motoboy_disponibilidade')}}">
@csrf

  <div class="input-group border border-secondary rounded mt-1 mr-1">
    <div class="input-group-prepend">
      <span class="input-group-text bg-secondary text-white" id="basic-addon1">
      Status:</span>
    </div>

    <select name="id_disponibilidade" class="form-control" required>
      @foreach ($disponibilidade as $d)
        <option value="{{ $d->id}}" <?php if($d->id == $motoboy->id_disponibilidade) echo"selected" ?>>{{$d->nome}}</option>
      @endforeach
    </select>    
  </div>

  <button class="btn btn-success btn-block mt-1 p-1"  type="submit">
		Salvar Alteraçoes
  </button>  
  
  <br>

<form> 

</div>


@endsection
