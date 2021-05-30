<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS / + -->

    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    {{-- CSS AREA --}}

    @yield('linkcss')

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('/img/favicon.ico') }}" type="image/x-icon">
    <title>Mercadinho Compra Certa - @yield('title') </title>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light font-kalam font-weight-bold">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('/img/CompraCertaLogoMini.png') }}" class="logo" alt="">
        </a>
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navcenter -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav nav">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="/">Página inicial</a>
                    </li>
                    <li class="nav-item {{ Request::is('products') ? 'active' : '' }}">
                        <a class="nav-link" href="/products">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Fale conosco </a>
                    </li>
                </ul>
            </div>
            <!-- NavRight -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/cart/show') }}"><i class="fa fa-shopping-cart"
                                aria-hidden="true"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            @if (isset($session['usuario']) && $session['usuario']->nvlAcesso == 1)
                                <a class="dropdown-item" href="#"><i class="fa fa-child" aria-hidden="true"></i>
                                    {{ $session['usuario']->nome }}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="./clients.html">Clientes</a>
                                <a class="dropdown-item" href="{{url('/gerente/exibirconsultas')}}">Relatório de compras</a>
                            @endif

                            @if (isset($session['usuario']) && $session['usuario']->nvlAcesso == 3)
                                <a class="dropdown-item" href="#"><i class="fa fa-child" aria-hidden="true"></i>
                                    {{ $session['usuario']->nome }}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="./client-purchases.html">Minhas compras</a>
                            @endif

                            @if (!isset($session['usuario']))
                                <a class="dropdown-item" href="{{ url('/login/') }}">Entrar</a>
                                <a class="dropdown-item" href="{{ url('/register') }}">Cadastre-se</a>
                            @endif

                            @if (isset($session['usuario']))
                                <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-power-off"
                                        aria-hidden="true"></i> Sair</a>
                            @endif

                            {{-- <a class="dropdown-item" href="./purchases.html">Compras</a>
                            <a class="dropdown-item" href="./clients.html">Clientes</a>
                            <a class="dropdown-item" href="./manager-query.html">Relatório de compras</a> --}}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- INCLUSÃO DO CONTEÚDO DA PÁGINA --}}

    @yield('content')



    <footer class="mt-2">
        <img src="{{ asset('img/CompraCertaLogoMini.png') }}" alt="">
        <span class="d-block">Mercadinho CompraCerta - Todos os direitos reservados <i class="fa fa-copyright"
                aria-hidden="true"></i></span>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://use.fontawesome.com/884b02690d.js"></script>

    <script>
        $('.carousel').carousel({
            interval: 2000
        })

    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> -->

</body>

</html>
