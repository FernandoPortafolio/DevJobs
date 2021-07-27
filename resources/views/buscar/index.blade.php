@extends('layouts.app')

@section('navigation')
    @include('partials.categorias_nav')
@endsection

@section('content')
    <h1 class="text-2xl text-gray-700 m-0">
        Resultados de la búsqueda
    </h1>
    <div class="my-10 bg-gray-100 p-10 shadow">
        @if ($vacantes->count() > 0)
            @include('partials.lista_vacantes')
        @else
            <p class="text-center mt-3">No hay vacantes que coincidan con tu criterio de búsqueda</p>
        @endif

    </div>
@endsection
