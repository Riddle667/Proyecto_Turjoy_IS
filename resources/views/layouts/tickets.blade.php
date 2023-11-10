@extends('layouts.app')

@section('content')

    <style>
        .background-image {
            /* background-image: url("images/image5.jpg"); */
            /* height: 100%; */
            object-fit: cover;
            filter: brightness(0.6);
            position: absolute;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;



        }
    </style>



    <img src="images/image8.jpg" class="background-image bg-cover bg-center">
    <form action="#" class="my-12" method="GET" novalidate>
        <div class="flex flex-col items-center justify-start h-screen">



            <div class="relative w-2/4 mt-8">
                <div class="flex items-center justify-center text-white text-4xl text-montserrat mb-5"><em>Tu siguiente
                        aventura empieza aquí.</em></div>

                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="mt-14 w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search"
                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ingresa código de la reserva a buscar" required>
                <button type="submit"
                    class="rounded-lg text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </div>
    </form>
