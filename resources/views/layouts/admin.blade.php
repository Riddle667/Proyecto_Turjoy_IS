<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="180x180" href="{{ asset('images/favicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Configuración del sistema</title>
</head>

<body class="flex flex-col max-h-screen">
    @include('layouts.navbarAdmin')
    @include('layouts.sidebar')

    <div class="p-4 mt-12 sm:ml-64">
        @yield('content')
    </div>


    <footer class="z-50 w-full bg-gray-200 p-4 text-center mt-auto">
        <p class="text-sm text-gray-500 dark:text-gray-400">©
            2023 TurJoy™. Todos los derechos reservados.</p>
    </footer>

</body>

</html>
