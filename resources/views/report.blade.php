@extends('layouts.admin')

@section('content')

    <body style=" background-image: url('images/image8.jpg'); background-size: cover; background-attachment: fixed;">
        <form class="" method="GET" action="{{ route('search.ticket') }}" novalidate>

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
                        placeholder="Ingresa el código" required>
                    <button type="submit"
                        class="rounded-lg text-white absolute right-2.5 bottom-2.5 bg-blue-custom-50 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>

                </div>



        </form>

        @if ($tickets->count() > 0)
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Codigo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha de la reserva
                        </th>
                        <th scope="col" class="px-6 py-3">
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
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $ticket->code }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ date('d/m/Y', strtotime($ticket->reservation_date)) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ date('d/m/Y h:i:s', strtotime($ticket->created_at)) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $ticket->travelDates->origin }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $ticket->travelDates->destination}}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $ticket->seats }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $ticket->total }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h3 class="font-bold text-cyan-700 text-2xl text-center">no hay reservas en sistema</h3>
        @endif




    </body>
@endsection
