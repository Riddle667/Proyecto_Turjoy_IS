<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/hRG5ynk/Logo-Turjoy-Oficial.png">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Turjoy - Reservar pasajes</title>
</head>

<body class="flex flex-col min-h-screen w-full">
    @include('layouts.navbar')

    <div class="px-2 py-2 pt-10 m-28">
        <p class="text-center text-7xl font-bold text-gray-700">Error 404</p>
    </div>

    <div class="px-2 py-2">
        <p class="text-center text-3xl font-bold text-gray-700">Página no encontrada</p>
    </div>

    <div>
        <img src="{{ asset('images/error.png') }}" class="h-96 w-96 mx-auto" alt="Error-404" />
    </div>

    <footer class="bg-gray-200 p-4 text-center mt-auto">
        <p class="text-sm text-gray-500 dark:text-gray-400">©
            2023 TurJoy™. Todos los derechos reservados.</p>
    </footer>
</body>







</html>
