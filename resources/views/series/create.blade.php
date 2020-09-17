@extends('layout')
@section('cabecalho')
Adicionar Série
@endsection
@section('conteudo')
<form method="post" enctype="multipart/form-data" action="/series/create">
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
    <div class="row align-items-center">
        <div class="form-group col col-6">
            <label for="nome"> Nome </label>
            <input type="text" name="nome" class="form-control" id="">
        </div>

        <div class="form-group col col-3">
            <label for="qtd_temporadas"> Nº Temporadas </label>
            <input type="number" name="qtd_temporadas" class="form-control" id="">
        </div>

        <div class="form-group col col-3">
            <label for="ep_por_temporadas"> Ep por Temporadas </label>
            <input type="number" name="ep_por_temporadas" class="form-control" id="">
        </div>

    </div>
    <div class="row">
        <div class="form-group col col-12">
            <label for="nome"> Capa </label>
            <input type="file" name="capa" class="form-control" id="capa">
        </div>
    </div>
    <div class="footer d-flex justify-content-between">
        <a class="btn btn-dark" href={{route('listar_series')}}>Voltar</a>
        <button class="btn btn-dark mt-1 ">Adicionar</button>
    </div>
</form>
@endsection