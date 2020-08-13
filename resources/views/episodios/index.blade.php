@extends('layout')

@section('cabecalho')
Episódios
@endsection

@section('conteudo')
@foreach ($episodios as $episodio)

<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center mb-1">
        Episódio {{$episodio->numero}}
        <input type="checkbox" name="" id="">
    </li>
    @endforeach
</ul>

<button class="btn btn-primary m-2">Salvar</button>
@endsection