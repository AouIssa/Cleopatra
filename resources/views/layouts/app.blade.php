<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cleopatra')</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('partials.navbar')
    
    @yield('content')


</body>
</html>