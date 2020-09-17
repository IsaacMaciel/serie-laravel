@extends('layout')
@section('cabecalho')
Séries
@endsection

@section('conteudo')
@include('mensagem',['mensagem' => $mensagem])
<a href={{route('form_create_serie')}} class="btn btn-dark mb-3">Adicionar </a>
<ul class="list-group">

    @foreach($series as $serie)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <div>
            <img src={{$serie->capa_url}} class="img-thumbnail" height="100px" width="100px" alt="">
            <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>
        </div>

        <div hidden class="input-group w-50" id="input-nome-serie-{{ $serie->id }}">
            <input type="text" class="form-control" value="{{ $serie->nome }}">
            <div class="input-group-append">
                <button class="btn btn-primary ml-2" onclick="editarSerie({{ $serie->id }})">
                    <span class="material-icons ">
                        spellcheck
                    </span>
                </button>
                @csrf
            </div>
        </div>

        <span class="d-flex">
            <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $serie->id }})">
                <span class="material-icons">
                    edit
                </span>
            </button>
            <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-info btn-sm mr-1">
                <span class="material-icons">
                    input
                </span>
            </a>
            <form method="post" action="/series/remove/{{ $serie->id }}"
                onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($serie->nome) }}?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    <span class="material-icons">
                        delete
                    </span>
                </button>
            </form>
        </span>
    </li>
    @endforeach

</ul>
<script>
    function toggleInput(serieId) {
        const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
        const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
        if (nomeSerieEl.hasAttribute('hidden')) {
            nomeSerieEl.removeAttribute('hidden');
            inputSerieEl.hidden = true;
        } else {
            inputSerieEl.removeAttribute('hidden');
            nomeSerieEl.hidden = true;
            
        }
    }

    function editarSerie(serieId) {
        let formData = new FormData();
        const nome = document
            .querySelector(`#input-nome-serie-${serieId} > input`)
            .value;
        const token = document
            .querySelector(`input[name="_token"]`)
            .value;
        formData.append('nome', nome);
        formData.append('_token', token);
        const url = `/series/${serieId}/editaNome`;
        fetch(url, {
            method: 'POST',
            body: formData
        }).then(() => {
            toggleInput(serieId);
            document.getElementById(`nome-serie-${serieId}`).textContent = nome;
        });
    }
</script>
@endsection