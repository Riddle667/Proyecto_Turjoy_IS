@extends('layouts.app')




@section('content')
    <section class="bg-auto bg-gray-custom-50 dark:bg-gray-custom-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">

            </a>
            <div
                class="w-full bg-gray-custom-100 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <img class="m-auto w-40 h-21 mr-2 " src="https://i.ibb.co/smMLzzL/Logo-Tur-Joy.png" alt="logo">


                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-3xl font-bold font-mulish leading-tight tracking-tight text-gray-custom-50 md:text-4 dark:text-white">
                        Bienvenido a Turjoy
                    </h1>


                    <br>


                    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login.store') }}" novalidate>
                        @csrf
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-custom-50 dark:text-white font-mulish">Correo
                                electrónico </label>
                            <input type="email" name="email" id="email"
                                class="py-4 font-mulish-light bg-green-custom border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Ingresa tu correo electrónico" required>
                            @error('email')
                                <div
                                    class="whitespace-nowrap flex item-center max-w-xs ml-auto bg-gray-custom-150 text-xs text-red-custom-50 my-2 rounded-lg text-center p-2">
                                    <svg class="flex-shrink-0 w-4 h-4 text-red-custom-50 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
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
                                class="py-4 font-mulish-light bg-green-custom border border-gray-300 text-gray-custom-50 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                            @error('password')
                                <div
                                    class="flex item-center max-w-xs ml-auto bg-gray-custom-150 text-xs text-red-custom-50 my-2 rounded-lg text-center p-2">
                                    <svg class="flex-shrink-0 w-4 h-4 text-red-custom-50 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
                                    </svg>

                                    <p>{{ $message }}</p>

                                </div>
                            @enderror

                            @if (session('message'))
                                <div class="flex items-center mt-2 text-xs text-red-custom-50 dark:text-red-custom-50">
                                    <p>{{ session('message') }}</p>
                                    <svg class="w-4 h-6 text-red-custom-50 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">

                            </div>

                        </div>
                        <button type="submit"
                            class="py-4 bg-gradient-to-r from-blue-custom-50 to-blue-custom-100 font-mulish-light w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Iniciar
                            sesión</button>

                        <br>
                        <br>
                        <br>
                        <div>
                            <a href="{{ route('welcome') }}" type="button"
                                class="bg-gradient-to-r from-blue-custom-50 to-blue-custom-100 font-mulish-light px-6 py-0.5 text-s text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Atrás</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
