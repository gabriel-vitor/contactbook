<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body id="app">
    @yield('content')
</body>

<body id="app">
    @yield('content')
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
