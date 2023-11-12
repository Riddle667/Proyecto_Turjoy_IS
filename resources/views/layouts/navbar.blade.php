<nav class="fixed top-0 z-50 w-full bg-gray-custom-100 border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center">
            <img src="{{ asset('images/Logo.png') }}" class="h-20 w-20 mr-3" alt="Turjoy Logo" />
            <span class="self-center text-2xl whitespace-nowrap dark:text-black">
                <span class="text-blue-custom-50 font-bold">Tur</span><span
                    class="text-gray-custom-50 font-bold">joy</span>
            </span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border rounded-lg md:flex-row md:space-x-3 xl:space-x-5 md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li class="flex items-center">
                    <a href="{{ route('welcome') }}"
                        class="block p-4 pr-4 text-gray-custom-50 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 xl:text-xl md:test-base font-mulish-bol font-medium  px-1 py-1 pl-1 text-center md:mr-0 md:hover:text-blue-custom-50 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Inicio</a>
                </li>
                <li class="flex items-center">
                    <a href="#"
                        class="block p-4 pr-4 text-gray-custom-50 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0  xl:text-xl md:test-base font-mulish-bol font-medium  px-1 py-1 pl-1 text-center md:mr-0 md:hover:text-blue-custom-50 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Buscar
                        reservas</a>
                </li>
                <li>
                    @if (auth()->check())
                        <div
                            class=  "rounded-lg xl:p-2 sm:p-1 md:p-1 bg-blue-custom-50 hover:bg-blue-800 dark:bg-blue-600 dark:hover-bg-blue-700 dark:focus:ring-blue-800">
                            <a href="{{ route('routes.index') }}"
                                class="shadow-md text-white font-mulish-bol md:text-base font-medium block text-lg px-1 py-1 pl-1 pr-4 text-center md:p-0 md:mr-0 ">Iniciar
                                sesión</a>
                        </div>
                    @else
                        <div
                            class=  "rounded-lg xl:p-2 sm:p-1 md:p-1 bg-blue-custom-50 hover:bg-blue-800 dark:bg-blue-600 dark:hover-bg-blue-700 dark:focus:ring-blue-800">
                            <a href="{{ route('login') }}"
                                class="shadow-md text-white font-mulish-bol md:text-base font-medium block text-lg px-1 py-1 pl-1 pr-4 text-center md:p-0 md:mr-0 ">Iniciar
                                sesión</a>
                        </div>
                    @endif

                </li>
            </ul>
        </div>
    </div>
</nav>
