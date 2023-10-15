@extends('layouts.admin')


<title>Turjoy - Cargar Rutas de Viaje</title>
@section('content')

    @if ($validRows || $invalidRows || $duplicatedRows)
        <div class="flex">
            {{-- SideBar --}}
            <div class="h-screen container w-1/12 border mr-1">
                <div class="grid grid-cols-1">
                    <br>
                    <br>
                    <div class="flex items-center">
                        <img src="https://thenounproject.com/api/private/icons/218334/edit/?backgroundShape=SQUARE&backgroundShapeColor=%23000000&backgroundShapeOpacity=0&exportSize=752&flipX=false&flipY=false&foregroundColor=%23000000&foregroundOpacity=1&imageFormat=png&rotation=0"
                            class="w-12 h-12 mb-6"> <!-- Ajusta el tamaño de la imagen según tus necesidades -->
                        <p class="ml-4 text-base text-gray-custom-50 mb-6 inline-block">Menú del sistema</p>
                    </div>
                    <p class="px-9 text-sm text-white p-2 bg-green-custom rounded-sm border border-black">Cargar Rutas
                        de
                        Viaje</p>
                    <a href="#" class="px-9 text-sm py-1  inline-block border border-black rounded-sm">Buscar
                        Reservas</a>
                    <div>
                        <a href="#" class=" px-9 text-sm py-1 inline-block border border-black rounded-sm">Reporte de
                            Reservas</a>
                    </div>
                </div>
            </div>
            {{-- Content --}}
            <div class="w-11/12 h-screen ">
                <div
                    class=" grid-row-1 bg-gray-custom-150 max-w-screen flex flex-wrap items-center justify-between mx-auto p-3">
                    <h2 class="flex intems-center font-bold ">Menú Sistema/Cargar Rutas de Viaje</h2>
                </div>
                <p class="text-green-custom font-bold p-4 bg-white inline-block underline_green">Cargar Rutas de
                    Viaje </p>
                <hr class="border-black">
                <div class = "grid-row-1">
                    <p class="text-black font-bold text-sm m-1">Seleccione el archivo a subir</p>
                    <form class="flex flex-col ml-1 w-1/2 mx-6 mr-auto" action="{{ route('route.check') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="flex justify-start ">
                            <div class="">
                                <input type="file" name="document" class="rounded-lg inline-block ">
                            </div>
                            <button class="py-2 ml-3 m-auto bg-green-custom text-white font-semibold rounded-lg"
                                type="submit">
                                ¿Estás seguro?
                            </button>
                        </div>
                    </form>
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
                </div>
                @if (count($validRows) > 0 && $errors->isEmpty())
                    <div class="container">
                        <div class="grid grid-row">
                            <h3 class="text-2xl text-black font-semibold uppercase col-start-2">Registro de tramos
                                cargados en el
                                sistema</h3>
                        </div>
                    </div>
                    <div class="grid grid-rows-1 relative overflow-x-auto sm:rounded-lg mb-2">
                        <table class="mx-auto text-sm text-left text-gray-500 dark:text-gray-400 ml-0 w-full">
                            <thead
                                class="text-xs text-gray-700 uppercase border-black bg-gray-custom-150 dark:text-gray-400">
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
                @endif
            </div>
        @else
            <div class="flex">
                {{-- SideBar --}}
                <div class="h-screen container w-1/12 border mr-1">
                    <div class="grid grid-cols-1">
                        <br>
                        <br>
                        <div class="flex items-center">
                            <img src="https://thenounproject.com/api/private/icons/218334/edit/?backgroundShape=SQUARE&backgroundShapeColor=%23000000&backgroundShapeOpacity=0&exportSize=752&flipX=false&flipY=false&foregroundColor=%23000000&foregroundOpacity=1&imageFormat=png&rotation=0"
                                class="w-12 h-12 mb-6"> <!-- Ajusta el tamaño de la imagen según tus necesidades -->
                            <p class="ml-4 text-base text-gray-custom-50 mb-6 inline-block">Menú del sistema</p>
                        </div>
                        <p class="px-9 text-sm text-white p-2 bg-green-custom rounded-sm border border-black">Cargar Rutas
                            de
                            Viaje</p>
                        <a href="#" class="px-9 text-sm py-1  inline-block border border-black rounded-sm">Buscar
                            Reservas</a>
                        <div>
                            <a href="#" class=" px-9 text-sm py-1 inline-block border border-black rounded-sm">Reporte
                                de
                                Reservas</a>
                        </div>
                    </div>
                </div>
                {{-- Content --}}
                <div class=" w-11/12 h-screen ">
                    <div class=" bg-gray-custom-150 max-w-screen flex flex-wrap items-center justify-between mx-auto p-3">
                        <h2 class="flex intems-center font-bold ">Menú Sistema/Cargar Rutas de Viaje</h2>
                    </div>
                    <p class="text-green-custom font-bold p-4 bg-white inline-block underline_green">Cargar Rutas
                        de Viaje </p>
                    <hr class="border-black">
                    <div>
                        <p class="text-black font-bold text-sm m-1">Seleccione el archivo a subir</p>
                        <form class="flex flex-col ml-1 w-1/2 mx-6 mr-auto" action="{{ route('route.check') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="flex justify-start">
                                <div class="">
                                    <input type="file" name="document" class="rounded-lg inline-block ">
                                </div>
                                <button class="py-2 ml-1 -mb-0 bg-green-custom  text-white font-semibold rounded-lg"
                                    type="submit">
                                    ¿Estás seguro?
                                </button>
                            </div>
                            <br>
                        </form>
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
                                <div>
                                    <p
                                        class="bg-red-custom-50 border border-black font-semibold text-lg text-black my-2 mt-0 ml-1 py-1 rounded-lg">
                                        {{ session('error-blank') }}
                                    </p>
                                </div>
                            @endif
                        </div>
                        <br>
                        <table class="table-auto rounded-xl bg-gray-custom-150">
                            <tbody>
                                <tr>
                                    <td class="border border-black px-4 py-2 font-bold rounded">Simbología de colores y
                                        errores</td>
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
