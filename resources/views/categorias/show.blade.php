@extends('layouts.app')

@section('navigation')
    @include('partials.categorias_nav')
@endsection

@section('content')

    <div class="my-10 bg-gray-100 p-10 shadow">
        <h1 class="text-3xl text-gray-700 m-0">
            Vacantes en <b>{{ $categoria->nombre }}</b>
        </h1>
        @include('partials.lista_vacantes')
    </div>
@endsection
