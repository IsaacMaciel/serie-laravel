@extends('layout')
@section('cabecalho')
Temporadas da Série {{$serie->nome}}
@endsection
@section('conteudo')

@foreach ($temporadas as $temporada)
<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="/temporadas/{{$temporada->id}}/episodios">
            Temporada {{$temporada->numero}}
        </a>
        <span class="badge badge-secondary">
            0 / {{$temporada->episodios->count()}}
        </span>
    </li>
</ul>
@endforeach

@endsection