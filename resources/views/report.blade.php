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
        @if ($tickets->count() > 0)

            <div id="refresh-tooltip" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Refresca la tabla de reservas
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <div id="initDate-tooltip" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Fecha de inicio
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <div id="finishDate-tooltip" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Fecha de término
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <div id="search-tooltip" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Buscar reservas en el rango de fechas
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <div id="date_buy" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Día que el usuario compró la reserva
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <div id="date_reservation" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Día del viaje reservado
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <div class="flex justify-center gap-4">
                <a data-tooltip-target="refresh-tooltip" data-tooltip-placement="left"
                    href="{{ route('report.index') }}"
                    class="bg-yellow-300 transition-all my-auto py-3 px-3 text-white rounded-lg">
                    <svg class="w-4 h-4 hover:animate-spin text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 1v5h-5M2 19v-5h5m10-4a8 8 0 0 1-14.947 3.97M1 10a8 8 0 0 1 14.947-3.97" />
                    </svg>
                </a>
                <form action="{{ route('searchByDate') }}" method="GET">
                    @csrf
                    <div class="flex justify-center gap-4 my-4">
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input data-tooltip-target="initDate-tooltip" data-tooltip-placement="top"
                                onkeydown="return false" datepicker type="date" name="initDate"
                                value="{{ old('initDate') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date">
                        </div>

                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input data-tooltip-target="finishDate-tooltip" data-tooltip-placement="top"
                                onkeydown="return false" datepicker type="date" name="endDate"
                                value="{{ old('finishDate') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date">
                        </div>

                        <button data-tooltip-target="search-tooltip" data-tooltip-placement="right" type="submit"
                            class="bg-blue-custom-50 hover:bg-blue-custom-100 transition-all py-2 px-4 text-white rounded-lg">
                            Buscar
                        </button>
                    </div>
                </form>
            </div>


            @if ($errors->has('initDate'))
                <div class="max-w-sm mx-auto flex items-center justify-center">
                    <p
                        class="bg-red-custom-50 font-semibold text-lg text-white p-2 my-2 rounded-lg inline-flex text-center">
                        {{ $errors->first('initDate') }}
                    </p>
                </div>
            @elseif ($errors->has('endDate'))
                <div class="max-w-sm mx-auto flex items-center justify-center">
                    <p
                        class="bg-red-custom-50 font-semibold text-lg text-white p-2 my-2 rounded-lg inline-flex text-center">
                        {{ $errors->first('endDate') }}
                    </p>
                </div>
            @elseif (session('message'))
                <div class="max-w-sm mx-auto flex items-center justify-center">
                    <p
                        class="bg-red-custom-50 text-white my-2 rounded-lg font-semibold text-lg text-justify p-2 inline-flex ">
                        {{ session('message') }}
                    </p>
                </div>
            @else
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead
                            class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Código
                                </th>
                                <th scope="col" class="px-6 py-3" data-tooltip-target="date_reservation"
                                    data-tooltip-placement="right">
                                    Fecha de la reserva
                                </th>
                                <th scope="col" class="px-6 py-3" data-tooltip-target="date_buy"
                                    data-tooltip-placement="right">
                                    Día de la reserva
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ciudad de origen
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ciudad de destino
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Cantidad de asientos
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Valor total
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $ticket->code }}
                                    </th>
                                    <td class="px-6 py-4 text-center">
                                        {{ date('d/m/Y', strtotime($ticket->reservation_date)) }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ date('d/m/Y', strtotime($ticket->created_at)) }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $ticket->travelDates->origin }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $ticket->travelDates->destination }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $ticket->seats }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        ${{ number_format($ticket->total, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        @else
            <div class="max-w-sm mx-auto flex items-center justify-center">

                <p class="bg-red-custom-50 font-semibold text-xl text-white p-2 my-2 rounded-lg">No hay reservas en
                    sistema</p>
            </div>
        @endif
    </div>



    <footer class="z-50 w-full bg-gray-custom-100 p-4 text-center mt-auto">
        <p class="text-sm text-gray-custom-50 dark:text-gray-400">©
            2023 TurJoy™. Todos los derechos reservados.</p>
    </footer>

</body>
