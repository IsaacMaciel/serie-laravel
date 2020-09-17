<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Controle de Séries</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 mr-2 ml-2 d-flex justify-content-between">
        <a href="{{route('listar_series')}}" class="navbar-brand">Home</a>
        @auth
        <a href="/sair" class="text-danger">Sair</a>
        @endauth
        @guest
        <a href="/entrar">Entrar</a>
        @endguest
    </nav>

    <div class="container">
        <div class="jumbotron">
            <h1>@yield('cabecalho')</h1>
        </div>
        @yield('conteudo')
    </div>

</body>

</html>