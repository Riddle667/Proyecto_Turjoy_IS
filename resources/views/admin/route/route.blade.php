@extends('layouts.admin')



@section('content')
    @if ($validRows || $invalidRows || $duplicatedRows)
        <div>
            <table class="table-auto -my-20 mx-60 ">
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
            <h3 class="text-2xl text-black font-semibold uppercase text-center">Listado de viajes</h3>
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
        <div class="flex flex-col flex-1 my-6 ">
            <div class="mb-0">
                <a class="px-6 py-3 bg-green-custom hover:bg-green-custom transition-all text-white font-semibold rounded-lg"
                    href="#">Volver</a>
            </div>
            <form class="flex flex-col items-center w-1/2 -my-40 mx-6 mr-auto" action="{{ route('route.check') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col relative mx-6">
                    <input type="file" name="document" class="rounded-lg flex">
                    @error('document')
                        <p
                            class="bg-red-custom-50 font-semibold my-2 mx-6 text-lg text-white px-4 py-3 rounded-lg text-right absolute right-0 top-full z-10">
                            {{ $message }}
                        </p>
                    @enderror
                    <button class="p-2 bg-green-custom text-white font-semibold rounded-lg" type="submit">
                        ¿Estás seguro?
                    </button>
                </div>
            </form>
        </div>

        <div>
            <table class="table-auto -my-25 mx-60 ">
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
