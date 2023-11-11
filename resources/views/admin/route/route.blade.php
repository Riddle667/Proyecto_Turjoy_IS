@extends('layouts.admin')



@section('content')

    @if ($validRows || $invalidRows || $duplicatedRows)
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            {{-- Content --}}
            <div class="flex items-center justify-left h-12 mb-4 mt rounded bg-gray-50 dark:bg-gray-800">

                <h2 class="flex font-bold ml-4">Menú Sistema/Cargar Rutas de Viaje</h2>

            </div>
            <div class="flex items-center justify-left h-12 mb-4 mt rounded">
                <p class="text-green-custom font-bold text-xl p-4 bg-white inline-block underline_green">Cargar Rutas de
                    Viaje </p>
            </div>
            <hr class="border-black">
            <p class="text-black font-bold text-xl mr-4 ml-2 mt-4">Seleccione el archivo a subir</p>
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="flex items-center justify-center h-24 rounded ">

                    <form class="flex flex-col ml-1 w-3/4 mr-auto" action="{{ route('route.check') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf



                        <input type="file" name="document" class="rounded-lg inline-block ">

                </div>
                <div class="flex items-center justify-left h-24 rounded ">
                    <button class=" font-bold text-sm m-1 p-4 bg-green-custom text-white rounded-lg" type="submit">
                        ¿Estás seguro?
                    </button>
                </div>
                </form>

            </div>
            <div class="flex justify-start ml-auto">
                @error('document')
                    <div>
                        <p
                            class="bg-red-custom-50 border border-black font-semibold text-lg text-black my-2 mt-0 ml-1 py-1 rounded-lg">
                            {{ $message }}
                        </p>
                    </div>
                @enderror
                @if (session()->has('error-format'))
                    <div>
                        <p
                            class="bg-red-custom-50 border border-black font-semibold text-lg text-black my-2 mt-0 ml-1 py-1 rounded-lg">
                            {{ session('error-format') }}
                        </p>
                    </div>
                @endif
                @if (session()->has('error-blank'))
                    <div
                        class="bg-red-custom-50 border border-black font-semibold text-lg text-black my-2 mt-0 ml-1 py-1 rounded-lg">
                        {{ session('error-blank') }}
                    </div>
                @endif
            </div>
            <br>
            <table class="table-auto rounded-xl bg-gray-custom-150">
                <tbody>
                    <tr>
                        <td class="border border-black px-4 py-2 font-bold rounded">Simbología de colores y errores
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 border-black bg-green-custom-correct-rows">-Se cargaron
                            correctamente</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 border-black bg-red-custom-50">
                            -No se pueden cargar los datos debido a: <br>
                            *Origen y destinos repetidos <br>
                            *Datos faltantes en origen, destino, cantidad o tarifa base <br>
                            *Valores no numéricos <br>
                            *Valores negativos <br>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 border-black bg-yellow-custom-50">
                            -No se pudieron cargar debido a que ya existen anteriormente. <br>
                            El primer registro correcto entre origen y destino se considera válido, el resto
                            incorrectos.
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>

            @if (count($validRows) > 0 && $errors->isEmpty())
                <div class="container">
                    <div class="grid grid-row">
                        <h3 class="text-2xl text-black font-semibold uppercase col-start-2">Registro de tramos
                            cargados en el
                            sistema</h3>
                    </div>
                </div>
                <div class="grid grid-rows-1 overflow-y sm:rounded-lg mb-2 ml-2 mr-2 mt-2">
                    <table
                        class="table-auto overflow-scroll mx-auto text-sm text-left text-gray-500 dark:text-gray-400 ml-0 w-full">
                        <thead
                            class="text-xs text-gray-700 uppercase border-black bg-gray-custom-150 dark:text-gray-400 sticky top-0">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-black font-bold">
                                    Origen
                                </th>
                                <th scope="col" class="px-6 py-3 text-black font-bold">
                                    Destino
                                </th>
                                <th scope="col" class="px-6 py-3 text-black font-bold">
                                    Cantidad de asientos
                                </th>
                                <th scope="col" class="px-6 py-3 text-black font-bold">
                                    Tarifa base
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderRows as $orderRow)
                                @if ($colors[$loop->index] == '0')
                                    <tr
                                        class=" bg-green-custom-correct-rows border-b border-black dark:bg-gray-900 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-white">
                                            {{ $orderRow['origen'] ? $orderRow['origen'] : '---' }}
                                        </th>
                                        <td class="px-6 py-4 text-black font-medium">
                                            {{ $orderRow['destino'] ? $orderRow['destino'] : '---' }}
                                        </td>
                                        <td class="px-6 py-4 text-black font-medium">
                                            {{ $orderRow['cantidad_de_asientos'] ? $orderRow['cantidad_de_asientos'] : '---' }}
                                        </td>
                                        <td class="px-6 py-4 text-black font-medium">
                                            ${{ number_format($orderRow['tarifa_base'], 0, '.', '.') ?: '---' }}
                                        </td>
                                    </tr>
                                @endif
                                @if ($colors[$loop->index] == '1')
                                    <tr
                                        class=" bg-yellow-custom-50 border-b border-black dark:bg-gray-900 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-white">
                                            {{ $orderRow['origen'] ? $orderRow['origen'] : '---' }}
                                        </th>
                                        <td class="px-6 py-4 text-black font-medium">
                                            {{ $orderRow['destino'] ? $orderRow['destino'] : '---' }}
                                        </td>
                                        <td class="px-6 py-4 text-black font-medium">
                                            {{ $orderRow['cantidad_de_asientos'] ? $orderRow['cantidad_de_asientos'] : '---' }}
                                        </td>
                                        <td class="px-6 py-4 text-black font-medium">
                                            ${{ number_format($orderRow['tarifa_base'], 0, '.', '.') ?: '---' }}
                                        </td>
                                    </tr>
                                @endif
                                @if ($colors[$loop->index] == '2')
                                    <tr
                                        class=" bg-red-custom-50 border-b border-black dark:bg-gray-900 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-white">
                                            {{ $orderRow['origen'] ? $orderRow['origen'] : '---' }}
                                        </th>
                                        <td class="px-6 py-4 text-black font-medium">
                                            {{ $orderRow['destino'] ? $orderRow['destino'] : '---' }}
                                        </td>
                                        <td class="px-6 py-4 text-black font-medium">
                                            {{ $orderRow['cantidad_de_asientos'] ? $orderRow['cantidad_de_asientos'] : '---' }}
                                        </td>
                                        <td class="px-6 py-4 text-black font-medium">
                                            {{ is_numeric($orderRow['tarifa_base']) ? '$' . number_format((float) $orderRow['tarifa_base'], 0, '.', '.') : '---' }}

                                        </td>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    @endif
    </div>
@else
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        {{-- SideBar --}}

        {{-- Content --}}
        <div class=" h-screen ">
            <div class="flex items-center justify-left h-12 mb-4 mt rounded bg-gray-50 dark:bg-gray-800">

                <h2 class="flex font-bold ml-4">Menú Sistema/Cargar Rutas de Viaje</h2>

            </div>
            <div class="flex items-center justify-left h-12 mb-4 mt rounded">
                <p class="text-green-custom font-bold text-xl p-4 bg-white inline-block underline_green">Cargar Rutas de
                    Viaje </p>
            </div>
            <hr class="border-black">
            <p class="text-black font-bold text-xl mr-4 ml-2 mt-4">Seleccione el archivo a subir</p>
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="flex items-center justify-center h-24 rounded ">

                    <form class="flex flex-col ml-1 w-3/4 mr-auto" action="{{ route('route.check') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf



                        <input type="file" name="document" class="rounded-lg inline-block ">

                </div>
                <div class="flex items-center justify-left h-24 rounded ">
                    <button class=" font-bold text-sm m-1 p-4 bg-green-custom text-white rounded-lg" type="submit">
                        ¿Estás seguro?
                    </button>
                </div>
                </form>

            </div>
            <div class="flex justify-start ml-auto">
                @error('document')
                    <div>
                        <p
                            class="bg-red-custom-50 border border-black font-semibold text-lg text-black my-2 mt-0 ml-1 py-1 rounded-lg">
                            {{ $message }}
                        </p>
                    </div>
                @enderror
                @if (session()->has('error-format'))
                    <div>
                        <p
                            class="bg-red-custom-50 border border-black font-semibold text-lg text-black my-2 mt-0 ml-1 py-1 rounded-lg">
                            {{ session('error-format') }}
                        </p>
                    </div>
                @endif
                @if (session()->has('error-blank'))
                    <div
                        class="bg-red-custom-50 border border-black font-semibold text-lg text-black my-2 mt-0 ml-1 py-1 rounded-lg">
                        {{ session('error-blank') }}
                    </div>
                @endif
            </div>
            <br>
            <table class="table-auto rounded-xl bg-gray-custom-150">
                <tbody>
                    <tr>
                        <td class="border border-black px-4 py-2 font-bold rounded">Simbología de colores y errores
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 border-black bg-green-custom-correct-rows">-Se cargaron
                            correctamente</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 border-black bg-red-custom-50">
                            -No se pueden cargar los datos debido a: <br>
                            *Origen y destinos repetidos <br>
                            *Datos faltantes en origen, destino, cantidad o tarifa base <br>
                            *Valores no numéricos <br>
                            *Valores negativos <br>
                        </td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 border-black bg-yellow-custom-50">
                            -No se pudieron cargar debido a que ya existen anteriormente. <br>
                            El primer registro correcto entre origen y destino se considera válido, el resto
                            incorrectos.
                        </td>
                    </tr>
                </tbody>
            </table>

            @endif
        </div>
    </div>


@endsection
