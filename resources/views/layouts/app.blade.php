<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito|Open+Sans" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>

    <div class="navbar">
        <div class="nav-left">
            <div class="nav-item nav-left"><a href="/">Dashboard</a></div>
            <div class="nav-item vl"></div>
            <div class="nav-item nav-left"><a href="">Statistics</a></div>
            <div class="nav-item vl"></div>
            <div class="nav-item nav-left"><a href="">Notes</a></div>
        </div>
        <div class="nav-right">

            <div class="nav-item nav-right">
                <i class="fas fa-user mobile-hide" style="padding-right: 8px;"></i>
                <h3 class="mobile-hide">username</h3>
            </div>


            <div class="dropdown">

                <div class="dropbtn"><i class="fas fa-bars fa-2x" ></i>
                    <div class="dropdown-content">
                        <a href="">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="app">


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
