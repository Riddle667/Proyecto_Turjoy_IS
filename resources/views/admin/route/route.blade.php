@extends('layouts.admin')



@section('content')
    @if ($validRows || $invalidRows || $duplicatedRows)
    <nav class="ml-60 bg-gray-custom border-gray-200 dark:bg-gray-900">
        <div class="bg-gray-200 max-w-screen flex flex-wrap items-center justify-between mx-auto p-3">
            <h2 class= "flex intems-center font-bold  ">Menú Sistema/Cargar Rutas de Viaje</h2>
        </div>
        </nav>
        <div class="flex  bg-white text-gray-custom-150 font-bold text-left ml-8 text-xl">Menú del Sistema</div>
            <div class="mr-auto">
                <p class="px-9 mr-4 text-lg bg-green-custom py-1  rounded-sm inline-block">Cargar Rutas de Viaje</p>
                <p class= "text-green-custom font-bold inline-block underline_green">Cargar Rutas de Viaje </p>
                <hr class="border-black">
                <a href="#" class="px-9 mr-4 text-lg  py-1 inline-block ">Buscar Reservas</a>
                <br>
                <a href="#" class="px-9 mr-4 text-lg py-1 inline-block" >Reporte de Reservas</a>
                <br>
            </div>
        <div>


        <div class="flex flex-col flex-1 my-6 ">
            <form class="flex flex-col items-center w-1/2 -my-40 mx-6 mr-auto" action="{{ route('route.check') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex items-center p-10 mt-6">
                    <div class="ml-14 mb-10 ">
                        <input type="file" name="document" class="rounded-lg inline-block ">
                        @error('document')
                            <p class="bg-red-custom-50 font-semibold my-2 mx-6 text-lg text-white px-4 py-3 rounded-lg text-right absolute right-0 top-full z-10">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <button class="py-2 ml-3 mb-10  bg-green-custom text-white font-semibold inline-block rounded-lg" type="submit">
                        ¿Estás seguro?
                    </button>
                </div>
            </form>
        </div>
            <table class="table-auto -my-20 mx-60  mt-2">
                <tbody>
                    <tr>
                        <td class="border px-4 py-2 font-bold rounded">Simbología de colores y errores</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 bg-green-custom">-Se cargaron correctamente</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 bg-red-custom-50">
                            -No se pueden cargar los datos debido a: <br>
                            *Origen y destinos repetidos <br>
                            *Datos faltantes en origen, destino, cantidad o tarifa base <br>
                            *Valores no numéricos <br>
                            *Valores negativos <br>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 bg-yellow-custom-50">
                            -No se pudieron cargar debido a que ya existen anteriormente. <br>
                            El primer registro correcto entre origen y destino se considera válido, el resto
                            incorrectos.

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-end">
            <div class="my-8 mx-80">
                <a class="px-6 py-3 bg-green-500 hover:bg-green-700 transition-all text-white font-semibold rounded-lg"
                    href="#">Finalizar</a>
            </div>
        </div>
        @if (count($validRows) > 0)
            <h3 class="text-2xl text-black font-semibold uppercase text-center">Registro de tramos cargados en el sistema</h3>
            <div class="relative overflow-x-auto sm:rounded-lg mb-2">
                <table class="w-1/2 mx-auto text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-green-600 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-white font-bold">
                                Origen
                            </th>
                            <th scope="col" class="px-6 py-3 text-white font-bold">
                                Destino
                            </th>
                            <th scope="col" class="px-6 py-3 text-white font-bold">
                                Cantidad de asientos
                            </th>
                            <th scope="col" class="px-6 py-3 text-white font-bold">
                                Tarifa base
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderRows as $orderRow)
                            @if ($colors[$loop->index] == '0')
                                <tr class="bg-green-400 border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-white whitespace-nowrap dark:text-white">
                                        {{ $orderRow['origen'] ? $orderRow['origen'] : '---' }}
                                    </th>
                                    <td class="px-6 py-4 text-white font-medium">
                                        {{ $orderRow['destino'] }}
                                    </td>
                                    <td class="px-6 py-4 text-white font-medium">
                                        {{ $orderRow['cantidad_de_asientos'] ? $orderRow['cantidad_de_asientos'] : '---' }}
                                    </td>
                                    <td class="px-6 py-4 text-white font-medium">
                                        ${{ number_format($orderRow['tarifa_base'], 0, '.', '.') ?: '---' }}
                                    </td>
                                </tr>
                            @endif
                            @if ($colors[$loop->index] == '1')
                                <tr class="bg-yellow-400 border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-white whitespace-nowrap dark:text-white">
                                        {{ $orderRow['origen'] ? $orderRow['origen'] : '---' }}
                                    </th>
                                    <td class="px-6 py-4 text-white font-medium">
                                        {{ $orderRow['destino'] }}
                                    </td>
                                    <td class="px-6 py-4 text-white font-medium">
                                        {{ $orderRow['cantidad_de_asientos'] ? $orderRow['cantidad_de_asientos'] : '---' }}
                                    </td>
                                    <td class="px-6 py-4 text-white font-medium">
                                        ${{ number_format($orderRow['tarifa_base'], 0, '.', '.') ?: '---' }} </td>
                                </tr>
                            @endif
                            @if ($colors[$loop->index] == '2')
                                <tr class="bg-red-400 border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-white whitespace-nowrap dark:text-white">
                                        {{ $orderRow['origen'] ? $orderRow['origen'] : '---' }}
                                    </th>
                                    <td class="px-6 py-4 text-white font-medium">
                                        {{ $orderRow['destino'] }}
                                    </td>
                                    <td class="px-6 py-4 text-white font-medium">
                                        {{ $orderRow['cantidad_de_asientos'] ? $orderRow['cantidad_de_asientos'] : '---' }}
                                    </td>
                                    <td class="px-6 py-4 text-white font-medium">
                                        {{ is_numeric($orderRow['tarifa_base']) ? '$' . number_format((float) $orderRow['tarifa_base'], 0, '.', '.') : '---' }}

                                    </td>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        </div>
    @else
        <nav class="ml-60 bg-gray-custom border-gray-200 dark:bg-gray-900">
        <div class="bg-gray-200 max-w-screen flex flex-wrap items-center justify-between mx-auto p-3">
            <h2 class= "flex intems-center font-bold  ">Menú Sistema/Cargar Rutas de Viaje</h2>
        </div>
        </nav>
        <div class="flex  bg-white text-gray-custom-150 font-bold text-left ml-8 text-xl">Menú del Sistema</div>
            <div class="mr-auto">
                <p class="px-9 mr-4 text-lg bg-green-custom py-1  rounded-sm inline-block">Cargar Rutas de Viaje</p>
                <p class= "text-green-custom font-bold inline-block underline_green">Cargar Rutas de Viaje </p>
                <hr class="border-black">
                <a href="#" class="px-9 mr-4 text-lg  py-1 inline-block ">Buscar Reservas</a>
                <br>
                <a href="#" class="px-9 mr-4 text-lg py-1 inline-block" >Reporte de Reservas</a>
                <br>
            </div>
        <div>
        <a class="px-6 py-3 bg-green-custom hover:bg-green-custom transition-all text-white font-semibold rounded-lg"  href="#">Volver</a>
        <div class="flex flex-col flex-1 my-6 ">
            <form class="flex flex-col items-center w-1/2 -my-40 mx-6 mr-auto" action="{{ route('route.check') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex items-center p-10">
                    <div class="ml-14 mb-10 ">
                        <input type="file" name="document" class="rounded-lg inline-block ">
                        @error('document')
                            <p class="bg-red-custom-50 font-semibold my-2 mx-6 text-lg text-white px-4 py-3 rounded-lg text-right absolute right-0 top-full z-10">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <button class="py-2 ml-3 mb-10  bg-green-custom text-white font-semibold inline-block rounded-lg" type="submit">
                        ¿Estás seguro?
                    </button>
                </div>
            </form>
        </div>
            <table class="table-auto -my-20 mx-60  mt-2">
                <tbody>
                    <tr>
                        <td class="border px-4 py-2 font-bold rounded">Simbología de colores y errores</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 bg-green-custom">-Se cargaron correctamente</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 bg-red-custom-50">
                            -No se pueden cargar los datos debido a: <br>
                            *Origen y destinos repetidos <br>
                            *Datos faltantes en origen, destino, cantidad o tarifa base <br>
                            *Valores no numéricos <br>
                            *Valores negativos <br>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 bg-yellow-custom-50">
                            -No se pudieron cargar debido a que ya existen anteriormente. <br>
                            El primer registro correcto entre origen y destino se considera válido, el resto
                            incorrectos.

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif

@endsection
