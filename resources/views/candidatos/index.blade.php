@extends('layouts.app')

@section('navigation')
    @include('partials.adminnav')
@endsection

@section('content')
    <h1 class="text-2xl texn-center mt-10">Candidatos: {{ $vacante->titulo }}</h1>

    @if (count($vacante->candidatos) > 0)
        <ul class="mx-auto mt-10 grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($vacante->candidatos as $candidato)
                <li class="p-5 border border-gray-400 mb-5">
                    <p class="mb-4">Nombre: <span class="font-bold">{{ $candidato->nombre }}</span></p>
                    <p class="mb-4">Email: <span class="font-bold">{{ $candidato->email }}</span></p>
                    <a
                        href="/storage/cv/{{ $candidato->cv }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="bg-green-600 p-3 inline-block text-xs font-bold uppercase"
                    >Ver CV</a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="mt-5 text-center">No hay candidatos</p>
    @endif
@endsection
