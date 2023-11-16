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
    <title>Turjoy - Buscar pasajes</title>
</head>

<body>
    @if (auth()->check())
        @include('layouts.navbarAdmin');
        @include('layouts.sidebar');
    @else
        @include('layouts.navbar')
    @endif

    <style>
        .background-image {

            object-fit: cover;
            filter: brightness(0.6);
            position: absolute;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            z-index: -1
        }
    </style>




    <form class="" method="GET" action="{{ route('search.ticket') }}" novalidate>

        <img src="images/image8.jpg" class="background-image bg-cover bg-center h-screen w-screen">
        <div class="flex flex-col items-center justify-start h-screen pt-24">



            <div class="relative w-2/4 mt-8">
                <div class="flex items-center justify-center text-white text-4xl text-montserrat mb-5"><em>Ingresa el
                        código de la reserva a buscar</em></div>

                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="mt-14 w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" name="search" id="search"
                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ingresa código de la reserva a buscar" required>
                <button type="submit"
                    class="rounded-lg text-white absolute right-2.5 bottom-2.5 bg-blue-custom-50 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>

            </div>
            @if ($ticket == null)
                @if ($message)
                    <div
                        class="rounded-md flex items-center mt-2 text-xl bg-red-custom-50 text-white dark:text-red-custom-50 p-1">
                        <p class="ml-1">{{ $message }}</p>
                        <svg class="mr-1 w-4 h-6 text-white ml-2 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                        </svg>
                    </div>
                @endif
        </div>
    </form>
@else
    <div
        class="mt-2 w-full lg:max-w-xl p-6  space-y-5 sm:p-8 bg-white    rounded-lg shadow-xl dark:bg-gray-800 z-20  border border-black">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white text-center ">
            Detalles de la reserva
        </h2>


        <div>
            <ul>
                <li>
                    <div class="flex">
                        <div class="bg-green-custom p-2 w-1/2">
                            <p class="text-white font-bold ">Código de la reserva</p>
                        </div>
                        <div class="w-1/2  ">
                            <p class="text-black font-semibold  mt-2 ml-4">{{ $ticket->code }}</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="flex">
                        <div class="bg-green-custom p-2 w-1/2">
                            <p class="text-white font-bold ">Ciudad origen</p>
                        </div>
                        <div class="w-1/2 bg-gray-custom-150 ">
                            <p class="text-black font-semibold  mt-2 ml-4">{{ $ticket->travelDates->origin }}</p>
                        </div>
                    </div>
                </li>
                <div class="flex">
                    <div class="bg-green-custom p-2 w-1/2">
                        <p class="text-white font-bold ">Ciudad destino</p>
                    </div>
                    <div class="w-1/2  ">
                        <p class="text-black font-semibold  mt-2 ml-4">{{ $ticket->travelDates->destination }}</p>
                    </div>
                </div>
                <li>
                    <div class="flex">
                        <div class="bg-green-custom p-2 w-1/2">
                            <p class="text-white font-bold ">Día de la reserva</p>
                        </div>
                        <div class="w-1/2 bg-gray-custom-150 ">
                            <p class="text-black font-semibold  mt-2 ml-4">
                                {{ date('d/m/Y', strtotime($ticket->reservation_date)) }}</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="flex">
                        <div class="bg-green-custom p-2 w-1/2">
                            <p class="text-white font-bold ">Cantidad de asientos</p>
                        </div>
                        <div class="w-1/2  ">
                            <p class="text-black font-semibold  mt-2 ml-4">{{ $ticket->seats }}</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="flex">
                        <div class="bg-green-custom p-2 w-1/2">
                            <p class="text-white font-bold ">Fecha de la compra</p>
                        </div>
                        <div class="w-1/2 bg-gray-custom-150 ">
                            <p class="text-black font-semibold  mt-2 ml-4">
                                {{ date('d/m/Y h:i:s', strtotime($voucher->created_at)) }}</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="flex">
                        <div class="bg-green-custom p-2 w-1/2">
                            <p class="text-white font-bold ">Total de la compra</p>
                        </div>
                        <div class="w-1/2  ">
                            <p class="text-black font-semibold  mt-2 ml-4">
                                ${{ number_format($ticket->total, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="flex items-center justify-center">
            <button type="submit" style="white-space: nowrap;"
                class="px-5 py-3 text-base font-medium text-center text-white bg-green-custom rounded-lg hover:bg-green-500 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                <a href="{{ route('pdf.download', ['id' => $voucher->ticket_id]) }}">Imprimir</a>
            </button>
        </div>

    </div>

    @endif


    <footer class="z-50 w-full bg-gray-200 p-4 text-center mt-auto">
        <p class="text-sm text-gray-500 dark:text-gray-400">©
            2023 TurJoy™. Todos los derechos reservados.</p>
    </footer>

</body>
