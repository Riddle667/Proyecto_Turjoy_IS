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
<body>
@if (!request()->is('login'))

<nav class=" bg-gray-custom-100 border-gray-200 dark:bg-gray-900">
    <div class=" full-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
        <a href="#" class="flex items-center">
            <img src="{{ asset('images/Logo.png') }}" class="h-20 w-20 mr-3" alt="Turjoy Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
        </a>

        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <a href = "{{ route('login') }}"  class=" rounded-lg shadow-md text-white font-mulish-bold bg-blue-700  hover:bg-blue-800 font-medium text-xl px-7 py-8 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Iniciar sesión</a>
        </div>
    </div>
</nav>

<div class="bg-gray-custom-100 flex items-center justify-center h-screen relative">
    <div id="default-carousel" class="relative w-full  h-screen" data-carousel="slide">
        <div class="relative h-full overflow-hidden rounded-lg">
            <div class="hidden duration-700 ease-in-out h-full" data-carousel-item>
                <img src="{{ asset('images/image1.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>

            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/image2.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>

            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/image3.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>

            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/image4.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>

            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/image5.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>

        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>

        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

</div>
@endif
<footer>
    <p>
      <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 TurJoy™. Todos los derechos reservados.</span>
    </p>
</footer>
<main>
  @yield('content')
</main>
</body>
</html>
