<!DOCTYPE html>
<html>
<head>
    <title>Passaporte Onovolab</title>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="Content-Language" content="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.17.8/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="./assets/css/sisstripe.css" />
    <link rel="stylesheet" href="./assets/css/login.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.8/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.8/dist/js/uikit-icons.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler-flags.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler-payments.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler-vendors.min.css">

    <link rel="icon" href="./assets/images/passaporteicon.png" type="image/png">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="page page-center">
<div class="d-flex flex-column">
    <div class="container container-tight py-4">

        <div class="card-md">
            <div class="card-body">
                @yield('content')
            </div>

        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    @yield('script')
</body>
</html>
