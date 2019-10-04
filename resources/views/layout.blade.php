<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'My Baby Jotter')</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div class="container-fluid">
        <h1 class="display-1 text-success text-center">My Baby Logger</h1>
    </div>

    <div id="app">
        @yield('content')
    </div>
    
    
</body>
</html>