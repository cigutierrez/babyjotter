<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Baby Logger')</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <!-- Scripts -->
     <script src="{{ asset('js/script.js') }}" defer></script>
</head>
<body>
    <div class="container-fluid">
        <h1 class="display-1 text-success text-center">Baby Jotter</h1>
    </div>

    @yield('content')
    
</body>
</html>