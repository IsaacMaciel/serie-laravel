@extends('layout')
@section('cabecalho')
Adicionar Série
@endsection
@section('conteudo')
<form method="post" action="/series/create">
    @csrf
    <div class="form-group">
        <label for="nome"> Nome </label>
        <input type="text" name="nome" class="form-control" id="">
    </div>
    <div class="footer d-flex justify-content-end">
        <button class="btn btn-dark mt-1 ">Adicionar</button>
    </div>
</form>
@endsection