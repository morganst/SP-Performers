<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>The Performers Platform</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">



    <!-- Styles -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    @include('inc.navbar')
    <div id="app">
        <main class="py-4">
                @if ($errors->any())
                <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <span style="background-color:palegreen"><li>{{ $error }}</li></span>
                        @endforeach
                </div>
                @endif
            @yield('content')
        </main>
    </div>
    <br>
    @include('inc.footer')
</body>
</html>
