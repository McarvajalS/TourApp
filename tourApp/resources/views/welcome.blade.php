<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour App - MPV</title>
    <!-- Incluir el CSS de Bootstrap -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <h1 class="mt-5 ms-3">¡Hola, Mundo :) !</h1>
    <button class="mt-3 ms-5 btn btn-danger">Soy un boton y tù?</button>

    <!-- Incluir el JS de Bootstrap -->
    @vite('resources/js/app.js')
</body>
</html>
