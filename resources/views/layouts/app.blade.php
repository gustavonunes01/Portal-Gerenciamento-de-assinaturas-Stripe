<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Onovolab') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.17.8/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="/assets/css/sisstripe.css" />
    <link rel="stylesheet" href="/assets/css/login.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.8/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.8/dist/js/uikit-icons.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">

    <link rel="icon" href="/assets/images/passaporteicon.png" type="image/png">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="uk-navbar-container nav-app">

            <div class="uk-container">

                <div uk-navbar>

                    <div class="uk-navbar-left">
                        <ul class="uk-navbar-nav">

                            <li class="uk-active">
                                <a href="/home">
                                    <img src="/assets/images/passaporteonovolabbranco.svg" width="150px">
                                </a>
                            </li>

                        </ul>
                    </div>

                    <div class="uk-navbar-right">
                        <ul class="uk-navbar-nav">
                            <li>
                                <a class="uk-navbar-toggle branco" uk-navbar-toggle-icon
                                   uk-toggle="target: #offcanvas-flip"></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="uk-padding-small branco">

                    <?php
//                    $fotoperfil = GetData("passaportesuser", "foto", $sistema_administrativo);
//
//
//
//                    if ($fotoperfil == "") { $fotoperfil = "nada.jpg"; } else { };



                    ?>

                    <?php $statustipoconta = 1; ?>

                    <a href="trocarfoto.php"> <img src="/assets/uploads/nada.jpg" class="imagem-bolinha" width="40px" height="40px"></a> Olá, {{Auth::user()->name}} @if($statustipoconta == 1) <span class="uk-badge">Administrador(a)</span> @endif

                </div>

            </div>


        </nav>

        <div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">

            <div class="uk-offcanvas-bar">

                <button class="uk-offcanvas-close" type="button" uk-close></button>

                <ul class="uk-list uk-list-divider">

                    <li><a style="color: white !important;" href="cadastro.php">Cadastro</a></li>

                    <li><a style="color: white !important;" href="trocarfoto.php">Trocar minha foto</a></li>

                    <li><a style="color: white !important;" href="assinaturas.php">Minhas assinaturas</a></li>

                    <li>
{{--                        <a style="color: white !important;" href="{{ route('logout') }}">Sair</a>--}}
                        <a style="color: white !important;" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>

            </div>

        </div>

        <main>
            @if(isset($breadcrumbs))
            <div class="uk-container uk-padding-small pt-0 mt-1">
                <nav aria-label="breadcrumb">
                    <ul class="uk-breadcrumb">
                        @foreach($breadcrumbs as $breadcrumb)
                            <li><a href="{{$breadcrumb['link']}}">{{$breadcrumb['name']}}</a></li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            @endif

            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    @yield('script')
</body>
</html>
