<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Configuración del sistema</title>
</head>
<body>
<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="bg-blue-custom-50 max-w-screen flex flex-wrap items-center justify-between mx-auto">
    <a href="#" class="flex items-center">
        <img src="https://i.ibb.co/smMLzzL/Logo-Tur-Joy.png" class="h-20 w-20" alt="Turjoy Logo" />
        <div class="ml-4">
        <h2 class="text-xl font-bold text-white">Configuración Administración del sistema </h2>
        </div>
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
      </ul>
    </div>
    <div class="text-end text-xl font-bold mr-4 text-white"><h3>¡Hola Ítalo!</h3></div>
  </div>
</nav>


<main>
  @yield('content')
</main>
</body>
</html>
