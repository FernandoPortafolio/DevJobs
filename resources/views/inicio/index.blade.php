@extends('layouts.app')

@section('navigation')
    @include('partials.categorias_nav')
@endsection

@section('content')

    <div class="flex lg:flex-row shadow bg-white">
        <div class="lg:w-1/2 px-8 lg:px-12 py-12 lg:py-24">
            <p class="text-2xl text-gray-700">
                Dev<span class="font-bold">Jobs</span>
            </p>
            <h1 class="mt-2 sm:mt-4 text-3xl font-bold text-gray-700 leading-tight">
                Encuentra un trabajo remoto o en tu país
                <span class="text-green-500 block">Para desarrolladores y diseñadores web</span>
            </h1>

            @include('inicio.partials.buscar')
            
        </div>
        <div class="block lg:w-1/2">
            <img
                src="{{ asset('img/4321.jpg') }}"
                alt="DevJobs"
                class="inset-0 h-full w-full object-cover object-center"
            >
        </div>
    </div>

    <div class="my-10 bg-gray-100 p-10 shadow">
        <h1 class="text-3xl text-gray-700 m-0">
            Nuevas <b>Vacantes</b>
        </h1>
        @include('partials.lista_vacantes')
    </div>
@endsection
