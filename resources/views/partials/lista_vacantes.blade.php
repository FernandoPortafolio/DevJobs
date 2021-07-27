<ul class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
    @foreach ($vacantes as $vacante)
        <li class="p-10 border border-gay-300 bg-white shadow">
            <h2 class="text-2xl font-bold text-green-700">{{ $vacante->titulo }}</h2>
            <a
                class="block text-gray-700 font-normal my-2"
                href="{{ route('categorias.show', ['categoria' => $vacante->categoria->id]) }}"
            >
                {{ $vacante->categoria->nombre }}
            </a>
            <p class="block text-gray-700 font-normal my-2">
                Ubicación:
                <span class="font-bold">
                    {{ $vacante->ubicacion->nombre }}
                </span>
            </p>
            <p class="block text-gray-700 font-normal my-2">
                Experiencia:
                <span class="font-bold">
                    {{ $vacante->experiencia->nombre }}
                </span>
            </p>
            <a
                href="{{ route('vacantes.show', ['vacante' => $vacante->id]) }}"
                class="bg-green-700 text-gray-100 mt-2 px-4 py-2 inline-block rounded font-bold text-sm"
            >
                Ver vacante
            </a>
        </li>
    @endforeach
</ul>
