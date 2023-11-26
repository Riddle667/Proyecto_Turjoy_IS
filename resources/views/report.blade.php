@extends('layouts.navbarAdmin')

@section('content')
    <body>
        @if (auth()->check())
        @include('layouts.sidebar');
        @else
            @include('layouts.navbar')
        @endif
    </body>
@endsection
