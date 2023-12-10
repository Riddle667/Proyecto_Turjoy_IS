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
    <title>Turjoy - Reporte pasajes</title>
</head>
<style>
    .background-image {

        object-fit: cover;
        filter: brightness(0.6);
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        z-index: -1;
    }
</style>

<body class="flex flex-col max-h-screen">

    <div class="flex flex-col items-center justify-start h-screen pt-24 ">

        <img src="images/image8.jpg" class="background-image bg-cover bg-center h-screen w-screen">
        @if (auth()->check())
            @include('layouts.navbarAdmin')
            @include('layouts.sidebar')
            <div class="relative w-2/4 mt-8 p-4 sm:ml-64">
            @else
                @include('layouts.navbar')
                <div class="relative w-2/4 mt-8 p-4 ">
        @endif

        <form class="" method="GET" action="{{ route('search.ticket') }}" novalidate>
            <div class="flex items-center justify-center text-white text-4xl text-montserrat mb-5"><em>Ingresa el
                    código de la reserva a buscar</em></div>
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Buscar</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input id="search" type="text" name="search" 
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ingresa el código..." required>
                <button type="submit" data-tooltip-target="tooltip-right" data-tooltip-placement="right"
                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
                    <div id="tooltip-right" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    El código admite tanto mayúsculas como <br> minúsculas.
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
            </div>

            @if ($ticket == null)
                <div class="flex items-center justify-center">
                    <div>
                        @if ($message)
                            <div
                                class="rounded-md inline-flex items-center justify-center mt-2 text-xl bg-red-custom-50 text-white dark:text-red-custom-50 p-1">
                                <p class="">{{ $message }}</p>
                            </div>
                        @endif
                    </div>
                </div>
        </form>
    @else
        <div class="flex items-center justify-center">
            <div
                class="mt-2 w-full lg:max-w-xl p-6 space-y-5 sm:p-8 bg-white  rounded-lg shadow-xl dark:bg-gray-800 z-20  border border-black">
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
                                    <p class="text-black font-semibold  mt-2 ml-4">
                                        {{ $ticket->travelDates->origin }}
                                    </p>
                                </div>
                            </div>
                        </li>
                        <div class="flex">
                            <div class="bg-green-custom p-2 w-1/2">
                                <p class="text-white font-bold ">Ciudad destino</p>
                            </div>
                            <div class="w-1/2  ">
                                <p class="text-black font-semibold  mt-2 ml-4">
                                    {{ $ticket->travelDates->destination }}
                                </p>
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
                        <li>
                            <div class="flex">
                                <div class="bg-green-custom p-2 w-1/2">
                                    <p class="text-white font-bold ">Método de pago seleccionado</p>
                                </div>
                                <div class="w-1/2   bg-gray-custom-150">
                                    <p class="text-black font-semibold  mt-2 ml-4">{{ $ticket->pay_method }}</p>
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
        </div>
    </div>
    <footer class="z-50 w-full bg-gray-custom-100 p-4 text-center mt-auto">
        <p class="text-sm text-gray-custom-50 dark:text-gray-400">©
            2023 TurJoy™. Todos los derechos reservados.</p>
    </footer>
    </div>



</body>
