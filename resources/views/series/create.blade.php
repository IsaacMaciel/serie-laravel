@extends('layout')
@section('cabecalho')
Adicionar Série
@endsection
@section('conteudo')
<form method="post" action="/series/create">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="form-group">
        <label for="nome"> Nome </label>
        <input type="text" name="nome" class="form-control" id="">
    </div>
    <div class="footer d-flex justify-content-between">
        <a class="btn btn-dark" href={{route('listar_series')}}>Voltar</a>
        <button class="btn btn-dark mt-1 ">Adicionar</button>
    </div>
</form>
@endsection