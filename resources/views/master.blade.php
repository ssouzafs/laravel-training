<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Todos os Imóveis</title>
  </head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">Lara<b>Dev</b></a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="<?= url('/imoveis/new')?>" class="nav-link navbar-brand">Novo Imóvel</a></li>
                <li class="nav-item"><a href="<?= url('/imoveis')?>" class="nav-link navbar-brand">Listar Todos</a></li>
            </ul>
        </div>
    </nav>
    @yield('content')
    <!-- Optional JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
