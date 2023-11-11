@extends('layouts.app')
@section('content')

<div class="w-full lg:max-w-xl p-6  space-y-8 sm:p-8 bg-white    rounded-lg shadow-xl dark:bg-gray-800 z-20 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-56 border border-black">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white text-center ">
        Detalles de la reserva
    </h2>


    <div>
        <ul>
            <li>
                <div class="flex">
                    <div class="bg-green-custom p-2 w-1/2">
                        <p class="text-white font-bold ">Código de la reserva</p>
                    </div>
                    <div class="w-1/2  ">
                        <p class="text-black font-semibold  mt-2 ml-4">{{ $tickets->code }}</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="flex">
                    <div class="bg-green-custom p-2 w-1/2">
                        <p class="text-white font-bold ">Ciudad origen</p>
                    </div>
                    <div class="w-1/2 bg-gray-custom-150 ">
                        <p class="text-black font-semibold  mt-2 ml-4">{{ $tickets->travelDates->origin }}</p>
                    </div>
                </div>
            </li>
            <div class="flex">
                <div class="bg-green-custom p-2 w-1/2">
                    <p class="text-white font-bold ">Ciudad destino</p>
                </div>
                <div class="w-1/2  ">
                    <p class="text-black font-semibold  mt-2 ml-4">{{ $tickets->travelDates->destination }}</p>
                </div>
            </div>
            <li>
                <div class="flex">
                    <div class="bg-green-custom p-2 w-1/2">
                        <p class="text-white font-bold ">Día de la reserva</p>
                    </div>
                    <div class="w-1/2 bg-gray-custom-150 ">
                        <p class="text-black font-semibold  mt-2 ml-4">{{ date('d/m/Y', strtotime($tickets->reservation_date)) }}</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="flex">
                    <div class="bg-green-custom p-2 w-1/2">
                        <p class="text-white font-bold ">Cantidad de asientos</p>
                    </div>
                    <div class="w-1/2  ">
                        <p class="text-black font-semibold  mt-2 ml-4">{{ $tickets->seats }}</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="flex">
                    <div class="bg-green-custom p-2 w-1/2">
                        <p class="text-white font-bold ">Fecha de la compra</p>
                    </div>
                    <div class="w-1/2 bg-gray-custom-150 ">
                        <p class="text-black font-semibold  mt-2 ml-4">{{  date('d/m/Y h:i:s', strtotime($vouchers->created_at)) }}</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="flex">
                    <div class="bg-green-custom p-2 w-1/2">
                        <p class="text-white font-bold ">Total de la compra</p>
                    </div>
                    <div class="w-1/2  ">
                        <p class="text-black font-semibold  mt-2 ml-4">{{ $tickets->total }}</p>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <div class="flex items-center justify-start">
        <button type="submit" style="white-space: nowrap;" class="px-5 py-3 text-base font-medium text-center text-white bg-green-custom rounded-lg hover:bg-green-500 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" >
            <a href="{{ route('pdf.download', ['id' => $vouchers->id]) }}" >Imprimir</a>
        </button>
        <img src="{{ asset('images/banner.png') }}" alt="bus" class=" p-30  w-1/2 ml-36">
    </div>

</div>




@endsection
