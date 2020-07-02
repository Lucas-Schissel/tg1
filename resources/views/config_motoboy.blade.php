@extends('templates.motoboys')
@section('conteudo')
<form action="" name="preferencias">
@csrf
<div>
    <h6>Disponibilidade:</h6>
    @if($motoboy->id_disponibilidade == 1)
    <input type="radio" id="excluir" name="excluir" value="sim" checked>
    <label for="male">Sim</label><br>
    <input type="radio" id="excluir" name="excluir" value="nao" >
    <label for="female">Nao</label><br>
    @elseif($motoboy->id_disponibilidade == 2)
    <input type="radio" id="excluir" name="excluir" value="sim" >
    <label for="male">Sim</label><br>
    <input type="radio" id="excluir" name="excluir" value="nao" checked>
    <label for="female">Nao</label><br>
    @endif
    <br>

</div>


<input type="submit">
</form>

@endsection