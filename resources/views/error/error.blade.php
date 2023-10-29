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
    {{-- <nav class="bg-gray-custom-100 border-gray-200 dark:bg-gray-900">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap items-center justify-between">

            <!-- Logo on the left side -->
            <a href="#" class="flex items-center">
                <img src="{{ asset('images/Logo.png') }}" class="h-20 w-20 mr-3" alt="Turjoy Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
            </a>

            <!-- Menu button and login inside the menu for small screens -->
            <div class="w-full md:flex md:w-auto">
                <ul>
                    <li>
                        <a href="{{ route('login') }}"
                            class="rounded-lg shadow-md text-white font-mulish-bold bg-blue-700 hover:bg-blue-800 font-medium text-xl px-7 py-8 text-center md:mr-0 dark:bg-blue-600 dark:hover-bg-blue-700 dark:focus:ring-blue-800">Iniciar
                            sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}

    <nav class="bg-gray-custom-100 border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center">
                <img src="{{ asset('images/Logo.png') }}" class="h-20 w-20 mr-3" alt="Turjoy Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li class="flex items-center">
                        <a href="{{ route('welcome') }}"
                            class="block p-4 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 font-mulish-bol font-medium text-xl px-1 py-1 pl-1 text-center md:mr-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Inicio</a>
                    </li>
                    <li>
                        <div
                            class=  "rounded-lg xl:p-4 sm:p-1 md:p-1 bg-blue-700 hover:bg-blue-800 dark:bg-blue-600 dark:hover-bg-blue-700 dark:focus:ring-blue-800">
                            <a href="{{ route('login') }}"
                                class="shadow-md text-white font-mulish-bol font-medium block text-xl px-1 py-1 pl-1 pr-4 text-center md:p-0 md:mr-0 ">Iniciar
                                sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="px-2 py-2">
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
