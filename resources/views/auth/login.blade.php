@extends('layouts.app')



<title>Turjoy - Iniciar sesión</title>
@section('content')
    <div class="">
        <img src="/images/descarga.gif" alt="" class=" h-screen w-screen relative">
    </div>
    <section class="bg-auto bg-gray-custom-100 dark:bg-gray-custom-50 ">
        <div
            class="flex flex-col items-center justify-center  pt-6  absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-96 ">

            <div
                class="border border-gray-300 shadow-lg p-1 m-4 w-full bg-gray-custom-100 rounded-lg  dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 mr-5 ml-5">
                <img class="m-auto w-28 h-28 mr-2 " src="https://i.ibb.co/smMLzzL/Logo-Tur-Joy.png" alt="logo">


                <div class="p-6 space-y-4 md:space-y-6 sm:p-10">
                    <h1
                        class="text-3xl font-bold font-mulish leading-tight tracking-tight text-gray-custom-50 md:text-4 dark:text-white ">
                        Bienvenido a Turjoy
                    </h1>


                    <br>


                    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login.store') }}" novalidate>
                        @csrf
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-custom-50 dark:text-white font-mulish">Correo
                                electrónico </label>
                            <input data-tooltip-target="tooltip-right" data-tooltip-placement="right" type="email"
                                name="email" id="email"
                                class="shadow-md py-4 font-mulish-light bg-gray-custom-100 border border-green-custom  text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Ingresa tu correo electrónico" required>

                            <div id="tooltip-right" role="tooltip"
                                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Ejemplo: example@ucn.cl
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>

                            @error('email')
                                <div
                                    class="shadow-md whitespace-nowrap flex item-center max-w-xs bg-gray-custom-150 text-xs text-red-custom-50 my-2 rounded-lg text-center p-2">
                                    <svg class="flex-shrink-0 w-4 h-4 mr-2 text-red-custom-50 dark:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
                                    </svg>

                                    <p>{{ $message }}</p>

                                </div>
                            @enderror
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-mulish-light text-gray-custom-50 dark:text-white">Contraseña</label>
                            <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña"
                                class="shadow-md py-4 font-mulish-light bg-gray-custom-100 border border-green-custom  text-gray-custom-50 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                            @error('password')
                                <div
                                    class="shadow-md flex item-center max-w-xs   bg-gray-custom-150 text-xs text-red-custom-50 my-2 rounded-lg text-center p-2">
                                    <svg class="flex-shrink-0 w-4 h-4 mr-2  text-red-custom-50 dark:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
                                    </svg>

                                    <p>{{ $message }}</p>

                                </div>
                            @enderror

                            @if (session('message'))
                                <div
                                    class="shadow-md flex item-center max-w-xs   bg-gray-custom-150 text-xs text-red-custom-50 my-2 rounded-lg text-center p-2">
                                    <svg class="flex-shrink-0 w-4 h-4 mr-2  text-red-custom-50 dark:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
                                    </svg>

                                    <p>{{ session('message') }}</p>

                                </div>
                            @endif
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                            </div>
                        </div>
                        <button type="submit"
                            class="shadow-md py-4 bg-gradient-to-r from-blue-custom-50 to-blue-custom-100 font-mulish-light w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Iniciar
                            sesión</button>
                        <div>
                            <a href="{{ route('welcome') }}" type="button"
                                class="shadow-md py-4 bg-gradient-to-r  font-mulish-light w-full text-red-custom-100 border border-red-custom-100 focus:ring-4 focus:outline-none focus:ring-secondary-300 font-medium rounded-lg text-sm px-5 text-center dark:bg-secondary-600 dark:hover:bg-secondary-700 dark:focus:ring-secondary-800">Atrás</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection
