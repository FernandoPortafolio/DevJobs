@extends('layouts.app')

@section('navigation')
    @include('partials.adminnav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Notificaciones</h1>

    @if (count($notifications) > 0)
        <ul class="max-w-md mx-auto mt-10">
            @foreach ($notifications as $notification)
                @php
                    $data = $notification->data;
                @endphp
                <li class="p-5 border border-gray-400 mb-5">
                    <p class="mb-4">Tienes un nuevo candidato en:
                        <span class="font-bold">{{ $data['vacante'] }}</span>
                    </p>
                    
                    <p class="mb-4">Te escribió:
                        <span class="font-bold">{{ $notification->created_at->diffForHumans() }}</span>
                    </p>
                        
                    <a
                        href="{{ route('candidatos.index', ['id' => $data['vacante_id']]) }}"
                        class="bg-green-600 p-3 inline-block text-xs font-bold uppercase text-white"
                    >Ver Candidatos</a>

                </li>
            @endforeach
        </ul>
    @else
        <p class="text-center mt-5">No hay notificaciones pendientes</p>
    @endif
@endsection
