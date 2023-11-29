@extends('layouts.app')
@if ($travelsAmount > 0 && !auth()->check())
    @section('content')
        <div
            class=" lg:max-w-xl max-h-screen p-10 space-y-8 sm:p-8 xl:pr-12 xl:pl-12 bg-gray-custom-150   rounded-lg shadow-xl dark:bg-gray-800 z-20 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-56 border border-black">
            <h2 class="sm:text-lg xl:text-2xl font-bold text-gray-900 dark:text-white text-center ">
                Reserva de pasajes TurJoy
            </h2>
            <form id="formReservation" class="mt-8 space-y-6" action="{{ route('ticket.add') }}" method="POST">
                @csrf
                <div>
                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha del
                        viaje:</label>
                    <input type="date" name="date" id="date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        min="{{ date('Y-m-d', strtotime('+0 day')) }}" onkeydown="return false">
                </div>
                <div>
                    <label for="origins"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Origen:</label>
                    <select name="origins" id="origins"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Seleccione una opción</option>
                    </select>
                </div>
                <div>
                    <label for="destinations"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Destino:</label>
                    <select name="destinations" id="destinations"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Seleccione una opción</option>
                    </select>
                </div>
                <div>
                    <label for="seatsInput" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad de
                        asientos: <label id="seats" class="text-red-custom-100"></label></label>
                    <input type="number" name="seats" id="seatsInput" min="0" inputmode="numeric"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <div class="grid gap-4 mb-4">
                    <div class="flex items-center justify-center rounded  h-4 mt-2 md:h-6 lg:h-8">
                        <button type="button" id="reservationButton" style="white-space: nowrap;"
                            class="px-1 py-3 text-base font-medium text-center text-white bg-blue-custom-50 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <a href="#">Reservar Pasajes</a>
                        </button>

                    </div>

                    {{-- Precio reserva --}}
                    <input id="baseValue" name="baseValue" value="" hidden>
                    {{-- Id Ruta --}}
                    <input id="routeId" name="routeId" value="" hidden>

            </form>
        </div>
    @endsection
@elseif ($travelsAmount == 0)
    @section('content')
        <div
            class=" lg:max-w-xl max-h-screen p-10 space-y-8 sm:p-8 xl:pr-12 xl:pl-12 bg-red-custom-100  rounded-lg shadow-xl  z-20 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-48  border border-black">
            <h2 class="sm:text-lg xl:text-2xl font-bold text-white  text-center ">
                Por el momento no es posible realizar reservas, intente más tarde.
            </h2>
        </div>
    @endsection
@endif

@section('js')
    <script src="{{ asset('assets/js/index.js') }}"></script>
@endsection
