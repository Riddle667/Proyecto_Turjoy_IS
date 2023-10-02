@extends('layouts.admin')



@section('content')


    
    <div class="flex flex-col flex-1 my-6 ">
        <div class="mb-0">
            <a class="px-6 py-3 bg-green-custom hover:bg-green-custom transition-all text-white font-semibold rounded-lg " 
            href=" {{ route('dashboard') }}">Volver</a>
        </div>
        <form class=" flex flex-col items-center w-1/2 -my-40 mr-auto" action = "{{ route('route.check') }}" method= "POST" enctype= "multipart/form-data">
            @csrf
            <div>
                <input type="file" name= "document" class="rounded-lg flex mr-auto">
                @error('document')
                    <p class="bg-red-custom-50 font-semibold my-4 text-lg text-center text-red-custom-50 px-4 py-3 rouded-lg">
                        {{ $message }}
                    </p>
                @enderror  
                <button class=" p-2 bg-green-custom ml-100 text-white font-semibold rounded-lg" type="submit">
                    ¿Estás seguro?
            </button>  
            </div>
            
        </form>
    </div>
        





@endsection



            