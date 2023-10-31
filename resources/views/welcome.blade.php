@extends('layouts.app')
@section('content')
    <div
        class="w-full lg:max-w-xl p-6  space-y-8 sm:p-8 bg-gray-custom-150    rounded-lg shadow-xl dark:bg-gray-800 z-20 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-56 border border-black">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white text-center ">
            Reserva de pasajes TurJoy
        </h2>
        <form class="mt-8 space-y-6" action="#">
            <div>
                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha del
                    viaje:</label>
                <input type="date" name="date" id="date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div>
                <label for="origins" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Origen:</label>
                <select name="origins" id="origins"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Seleccione una opción</option>
                </select>
            </div>
            <div>
                <label for="destino" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Destino:</label>
                <select name="destino" id=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Seleccione una opción</option>
                </select>
            </div>
            <div>
                <label for="sientos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad de
                    asientos:</label>
                <input type="number" name="asientos" id=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="flex items-center justify-start">
                <button type="submit" style="white-space: nowrap;"
                    class="px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <a href="#">Reservar Pasajes</a>
                </button>
                <img src="{{ asset('images/banner.png') }}" alt="bus" class=" p-30  w-1/2 ml-24">
            </div>
        </form>
    </div>
@endsection


@section('js')
    <script src="{{ asset('assets/js/index.js') }}"></script>
@endsection
