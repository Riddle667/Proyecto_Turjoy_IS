<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="180x180" href="{{ asset('images/favicon.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Turjoy - Reservar pasajes</title>
</head>

<body>
    @if (!request()->is('login'))
        @include('layouts.navbar')
        <div class="bg-gray-custom-100 flex items-center justify-center h-screen relative">
            <div id="default-carousel" class="relative w-full  h-screen" data-carousel="slide">
                <div class="relative h-full overflow-hidden rounded-lg">
                    <div class="hidden duration-700 ease-in-out h-full" data-carousel-item>
                        <img src="{{ asset('images/image1.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>

                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/image2.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>

                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/image3.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>

                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/image4.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>

                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('images/image5.jpg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>
                </div>

                <div class="absolute z-30 hidden space-x-3 -translate-x-1/2 bottom-5 left-1/2 md:flex">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                        data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                        data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                        data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                        data-carousel-slide-to="4"></button>
                </div>

                <div
                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 group focus:outline-none">
                    <button type="button" class="" data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                </div>
                <div
                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 group focus:outline-none">
                    <button type="button" class="" data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            </div>
        </div>

        <div id="quienes-somos"
            class="flex items-center justify-center h-48 rounded bg-gray-custom-100 dark:bg-gray-800">
            <p class="text-2xl font-bold text-gray-custom-50  text-center">
                <span class="font-bold text-blue-custom-50">Turjoy </span> es una plataforma que te permite
                reservar pasajes de bus de manera rápida y segura. </span>
            </p>
        </div>

        <div class="flex items-center justify-center h-48 mb rounded bg-blue-custom-50 dark:bg-gray-800">
            <div id="donde-trabajamos" class=" text-center text-white">
                <h2 class="text-3xl font-bold mb-4">¿Quiénes somos?</h2>
                <p class="xs:text-lg mr-2 ml-2 sm:text-xl">
                    Somos una empresa con años de experiencia y nos enorgullece decir que somos líderes del país en las
                    reservas de pasajes en autobús. Nuestra
                    misión es hacer que tus viajes sean fáciles y sin complicaciones. ¡Reserva con nosotros, no te
                    arrepentiras!
                </p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-4">

            <div class="flex items-center justify-center rounded text-gray-custom-50">
                <div>
                    <h2 class="text-4xl font-bold mb-4 mt-6 text-center">¿Dónde trabajamos?</h2>
                    <p class="text-xl md:text-2xl ml-8 ">
                        Nuestra empresa se encuentra en Antofagasta, Chile. Sin embargo, trabajamos en toda la zona
                        norte del país. Y esperamos pronto expandirnos a todo el territorio nacional.
                        Nuestros viajes cubren ciudades como Antofagasta, Iquique, Calama, Copiapó, La Serena, Coquimbo,
                        entre otros.
                    </p>
                    <div
                        class="flex items-center justify-center rounded bg-gray-custom-100 shadow-md  pt-2 pb-2 mt-10 ml-10 mb-10 mr-10 ">
                        <img src="{{ asset('images/map.png') }}" class=" p-4 m-5" alt="Mapa de la ubicación">
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center rounded bg-green-custom shadow-md sm:p-6 xl:p-0 mb-9">
                <div id="donde-trabajamos" class=" text-center text-black">
                    <h2 class="text-4xl font-bold mb-4">Contáctanos</h2>

                    <p class="text-xl mt-5">
                        <span class="font-bold">Dirección:</span> Av. Angamos 0610, Antofagasta, Chile
                    </p>
                    <p class="text-xl mt-5">
                        <span class="font-bold">Horario de atención:</span> Lunes a Viernes de 9:00 a 18:00
                    </p>
                    <p id="contactanos" class="text-xl mt-5">
                        <span class="font-bold">Para cualquier otra duda, envíanos un <a
                                href=mailto:italo.donoso@ucn.cl
                                class="border-b border-black hover:text-blue-custom-50 hover:border-blue-custom-50 ">correo</a>.</span>
                    </p>
                </div>
            </div>
        </div>
    @endif
    <main>
        @yield('content')
        @yield('js')
    </main>

    <footer class="bg-gray-200
    p-4 text-center mt-auto">
        <p class="text-sm text-gray-500 dark:text-gray-400">©
            2023 TurJoy™. Todos los derechos reservados.</p>
    </footer>
</body>

</html>
