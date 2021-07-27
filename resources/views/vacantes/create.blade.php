@extends('layouts.app')

@section('styles')
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css"
        type="text/css"
        media="screen"
        charset="utf-8"
    >
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
@endsection

@section('navigation')
    @include('partials.adminnav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Nueva Vacante</h1>
    <form
        action="{{ route('vacantes.store') }}"
        class="max-w-lg mx-auto my-10"
        method="POST"
        novalidate
    >
        @csrf
        <div class="mb-5">
            <label
                for="titulo"
                class="block text-gray-700 text-sm mb-2"
            >Titulo Vacante</label>
            <input
                id="titulo"
                type="text"
                class="p-3 bg-gray-100 rounded form-input w-full"
                name="titulo"
                value="{{ old('titulo') }}"
                required
                autofocus
                placeholder="Titulo de la Vacante"
            >

            @error('titulo')
                <div
                    class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6"
                    role="alert"
                >
                    <strong class="font-bold text-xs">Error!</strong>
                    <span class="block text-xs">{{ $message }}</span>
                </div>
            @enderror

        </div>

        <div class="mb-5">
            <label
                for="categoria"
                class="block text-gray-700 text-sm mb-2"
            >Categoría:</label>

            <select
                name="categoria"
                id="categoria"
                class="block appearance-none w-full border border-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100"
            >
                <option
                    disabled
                    selected
                >--Selecciona--</option>
                @foreach ($categorias as $categoria)
                    <option
                        value="{{ $categoria->id }}"
                        {{ old('categoria') == $categoria->id ? 'selected' : '' }}
                    >{{ $categoria->nombre }}</option>
                @endforeach
            </select>

            @error('categoria')
                <div
                    class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6"
                    role="alert"
                >
                    <strong class="font-bold text-xs">Error!</strong>
                    <span class="block text-xs">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="experiencia"
                class="block text-gray-700 text-sm mb-2"
            >Experiencia:</label>

            <select
                name="experiencia"
                id="experiencia"
                class="block appearance-none w-full border border-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100"
            >
                <option
                    disabled
                    selected
                >--Selecciona--</option>
                @foreach ($experiencias as $experiencia)
                    <option
                        value="{{ $experiencia->id }}"
                        {{ old('experiencia') == $experiencia->id ? 'selected' : '' }}
                    >{{ $experiencia->nombre }}</option>
                @endforeach
            </select>
            @error('experiencia')
                <div
                    class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6"
                    role="alert"
                >
                    <strong class="font-bold text-xs">Error!</strong>
                    <span class="block text-xs">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="ubicacion"
                class="block text-gray-700 text-sm mb-2"
            >Ubicación:</label>

            <select
                name="ubicacion"
                id="ubicacion"
                class="block appearance-none w-full border border-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100"
            >
                <option
                    disabled
                    selected
                >--Selecciona--</option>
                @foreach ($ubicaciones as $ubicacion)
                    <option
                        value="{{ $ubicacion->id }}"
                        {{ old('ubicacion') == $ubicacion->id ? 'selected' : '' }}
                    >{{ $ubicacion->nombre }}</option>
                @endforeach
            </select>
            @error('ubicacion')
                <div
                    class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6"
                    role="alert"
                >
                    <strong class="font-bold text-xs">Error!</strong>
                    <span class="block text-xs">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="salario"
                class="block text-gray-700 text-sm mb-2"
            >Salario:</label>

            <select
                name="salario"
                id="salario"
                class="block appearance-none w-full border border-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100"
            >
                <option
                    disabled
                    selected
                >--Selecciona--</option>
                @foreach ($salarios as $salario)
                    <option
                        value="{{ $salario->id }}"
                        {{ old('salario') == $salario->id ? 'selected' : '' }}
                    >{{ $salario->nombre }}</option>
                @endforeach
            </select>
            @error('salario')
                <div
                    class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6"
                    role="alert"
                >
                    <strong class="font-bold text-xs">Error!</strong>
                    <span class="block text-xs">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="descripcion"
                class="block text-gray-700 text-sm mb-2"
            >Descripción del puesto:</label>

            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700"></div>
            <input
                type="hidden"
                name="descripcion"
                id="descripcion"
                value="{{ old('descripcion') }}"
            >

            @error('descripcion')
                <div
                    class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6"
                    role="alert"
                >
                    <strong class="font-bold text-xs">Error!</strong>
                    <span class="block text-xs">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label class="block text-gray-700 text-sm mb-2">Imagen Vacante:</label>

            <div
                id="dropzone-devjobs"
                class="dropzone rounded bg-gray-100"
            ></div>

            <p
                id="error"
                class="text-red-500 mt-3 text-xs"
            ></p>
            <input
                type="hidden"
                name="image_name"
                id="image_name"
                value="{{ old('image_name') }}"
            >
            @error('image_name')
                <div
                    class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6"
                    role="alert"
                >
                    <strong class="font-bold text-xs">Error!</strong>
                    <span class="block text-xs">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="habilidades"
                class="block text-gray-700 text-sm mb-5"
            >Habilidades y Conociminetos: <span class="text-xs">(Elige al menos 3)</span></label>
            @php
                $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails'];
            @endphp
            <lista-skills
                :skills="{{ json_encode($skills) }}"
                :oldskills="{{ json_encode(old('skills')) }}"
            ></lista-skills>
            @error('skills')
                <div
                    class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6"
                    role="alert"
                >
                    <strong class="font-bold text-xs">Error!</strong>
                    <span class="block text-xs">{{ $message }}</span>
                </div>
            @enderror
        </div>


        <button
            type="submit"
            class="bg-green-600 w-full hover:bg-green-700 text-gray-100 font-bold p-3 focus:outline focus:shadow"
        >
            Publicar Vacante
        </button>
    </form>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/medium-editor@latest/dist/js/medium-editor.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"
        integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>
    <script>
        Dropzone.autoDiscover = false;
        document.addEventListener('DOMContentLoaded', function() {

            //Medium Editor
            const editor = new MediumEditor('.editable', {
                toolbar: {
                    buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft',
                        'justifyRight', 'justifyCenter', 'justifyFull', 'orderedlist', 'unorderedlist',
                        'h2', 'h3'
                    ],
                    static: true,
                    sticky: true
                },
                placeholder: {
                    text: 'Información de la Vacante'
                }
            })

            editor.subscribe('editableInput', function(event, editable) {
                const content = editor.getContent();
                document.querySelector('#descripcion').value = content;
            })
            editor.setContent(document.querySelector('#descripcion').value)

            //DropZone
            const dropzone = new Dropzone('#dropzone-devjobs', {
                url: '/vacantes/image',
                paramName: 'image',
                addRemoveLinks: true,
                dicDefaultMessage: 'Sube aquí tu archivo',
                dicRemoveFile: 'Borrar archivo',
                acceptedFiles: ".png,.jpg,.jpeg,.gif,.bmp",
                maxFiles: 1,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                init: function() {
                    if (document.querySelector('#image_name').value.trim()) {
                        const publishedImage = {}
                        publishedImage.size = 1234
                        publishedImage.name = document.querySelector('#image_name').value

                        this.options.addedfile.call(this, publishedImage)
                        this.options.thumbnail.call(this, publishedImage,
                            `/storage/vacantes/${publishedImage.name}`)
                        publishedImage.previewElement.classList.add('dz-sucess')
                        publishedImage.previewElement.classList.add('dz-complete')
                    }
                },
                success: function(file, response) {
                    console.log(response);
                    document.querySelector('#error').textContent = "";
                    document.querySelector('#image_name').value = response.image;
                    file.serverName = response.image
                },
                error: function(file, response) {
                    document.querySelector('#error').textContent = "Formato No válido";
                },
                maxfilesexceeded: function(file) {
                    // console.log(file);
                    if (this.files[1] != null) {
                        this.removeFile(this.files[0])
                        this.addFile(file)
                    }
                },
                removedfile: function(file, response) {
                    document.querySelector('#error').textContent = "";
                    const dropzone = document.querySelector('#dropzone-devjobs')
                    file.previewElement.parentNode.removeChild(file.previewElement);
                    if (dropzone.children.length > 0)
                        dropzone.removeChild(dropzone.firstChild)

                    const deleteName = file.serverName ?? document.querySelector('#image_name').value
                    axios.delete(`/vacantes/image/${deleteName}`)
                        .then(console.log)
                        .catch(console.log)
                }
            });
        })
    </script>
@endsection
