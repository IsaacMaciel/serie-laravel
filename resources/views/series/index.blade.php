@extends('layout')
@section('cabecalho')
Séries
@endsection

@section('conteudo')
@if ($mensagem)
<div class="alert alert-success">
    {{$mensagem}}
</div>
@endif
<a href={{route('form_create_serie')}} class="btn btn-dark mb-3">Adicionar </a>
<ul class="list-group">

    @foreach ($series as $serie)
    <form class="" method="post"
        onsubmit="return confirm('Tem certeza que deseja remover a série {{ addslashes($serie->nome)}} ?')"
        action="/series/remove/{{$serie->id}}">
        @csrf
        @method('DELETE')
        <li class="list-group-item d-flex  justify-content-between">
            <span>{{$serie->nome}}</span>
            <button type="submit" class="btn btn-danger">Excluir</button>
    </form>
    @endforeach

</ul>
@endsection