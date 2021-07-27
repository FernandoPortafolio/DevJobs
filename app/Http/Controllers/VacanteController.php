<?php

namespace App\Http\Controllers;

use App\Models\Salario;
use App\Models\Vacante;
use App\Models\Categoria;
use App\Models\Ubicacion;
use App\Models\Experiencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class VacanteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacantes = Vacante::where('user_id', auth()->user()->id)->latest()->paginate(10);
        return view('vacantes.index', compact('vacantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();
        return view('vacantes.create', compact('categorias', 'experiencias', 'ubicaciones', 'salarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required | min:8',
            'descripcion' => 'required | min:50',
            'skills' => 'required',
            'image_name' => 'required',
            'categoria' => 'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
        ]);
        auth()->user()->vacantes()->create([
            'titulo' => $data['titulo'],
            'descripcion' => $data['descripcion'],
            'skills' => $data['skills'],
            'image' => $data['image_name'],
            'categoria_id' => $data['categoria'],
            'experiencia_id' => $data['experiencia'],
            'ubicacion_id' => $data['ubicacion'],
            'salario_id' => $data['salario'],
        ]);
        return redirect()->route('vacantes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {
        if (!$vacante->activa)
            return abort(404);
        return view('vacantes.show', compact('vacante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {
        $this->authorize('view', $vacante);

        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();
        return view('vacantes.edit', compact('vacante', 'categorias', 'experiencias', 'ubicaciones', 'salarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacante $vacante)
    {
        $this->authorize('update', $vacante);

        $data = $request->validate([
            'titulo' => 'required | min:8',
            'descripcion' => 'required | min:50',
            'skills' => 'required',
            'image_name' => 'required',
            'categoria' => 'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
        ]);

        $vacante->titulo = $data['titulo'];
        $vacante->descripcion = $data['descripcion'];
        $vacante->skills = $data['skills'];
        $vacante->image = $data['image_name'];
        $vacante->categoria_id = $data['categoria'];
        $vacante->experiencia_id = $data['experiencia'];
        $vacante->ubicacion_id = $data['ubicacion'];
        $vacante->salario_id = $data['salario'];

        $vacante->save();

        return redirect()->route('vacantes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante)
    {
        $this->authorize('delete', $vacante);

        $oldImage = $vacante->image;
        $vacante->delete();
        Storage::delete('public/vacantes/' . $oldImage);
        return 'Se eliminó la vacante: ' . $vacante->titulo;
    }

    public function image(Request $request)
    {
        $image = $request->file('image');
        $newName = time() . '.' . $image->extension();
        $image->move('storage/vacantes', $newName);
        return response()->json(['success' => true, 'image' => $newName]);
    }

    public function deleteImage(Request $request, $name)
    {
        if ($request->ajax()) {
            if (File::exists('storage/vacantes/' . $name)) {
                File::delete('storage/vacantes/' . $name);
                return response('Imagen deleted', 200);
            }
            return response('Imagen Not Found', 404);
        }
    }

    public function changeStatus($vacante)
    {
        $vacante = Vacante::find($vacante);
        $vacante->activa = !$vacante->activa;
        $vacante->save();
        return $vacante;
    }

    public function search(Request $request)
    {
        $data = $request->validate([
            'categoria' => 'required',
            'ubicacion' => 'required',
        ]);

        $categoria = $data['categoria'];
        $ubicacion = $data['ubicacion'];

        $vacantes = Vacante::latest()
            ->where('categoria_id', $categoria)
            ->where('ubicacion_id', $ubicacion)
            ->get();

        // $vacantes = Vacante::where([
        //     'categoria_id' => $categoria,
        //     'ubicacion_id' => $ubicacion,
        // ])->get();

        return view('buscar.index', compact('vacantes'));
    }

    public function results()
    {
        return 'Resultados';
    }
}
