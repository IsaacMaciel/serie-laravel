@extends('layout')
@section('cabecalho')
Temporadas da Série {{$serie->nome}}
@endsection
@section('conteudo')

<div class="row">
    <div class="col-md-12 text-center mb-4">
        <a href="{{$serie->capa_url}}" target="_blank">
            <img src="{{$serie->capa_url}}" class="img-thumbnail" height="400px" width="400px" alt="">
        </a>
    </div>
</div>

@foreach ($temporadas as $temporada)
<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="/temporadas/{{$temporada->id}}/episodios">
            Temporada {{$temporada->numero}}
        </a>
        <span class="badge badge-secondary">
            {{ $temporada->getEpisodiosAssistidos()->count()}} / {{$temporada->episodios->count()}}
        </span>
    </li>
</ul>
@endforeach

@endsection