@extends('layout')

@section('cabecalho')
Episódios
@endsection

@section('conteudo')
@include('mensagem',['mensagem' => $mensagem])

<form action="/temporadas/{{$temporadaId}}/episodios/assistir" method="post">
    @csrf
    @foreach ($episodios as $episodio)
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center mb-1">
            Episódio {{$episodio->numero}}
            <input type="checkbox" name="episodios[]" {{$episodio->assistido ? 'checked' : ''}}
                value="{{$episodio->id}}" id="">
        </li>
        @endforeach
    </ul>

    <button class="btn btn-primary m-2">Salvar</button>

</form>
@endsection