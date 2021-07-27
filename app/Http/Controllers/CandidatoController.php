<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vacante_id = $request->id;
        $vacante = Vacante::findOrFail($vacante_id);
        $this->authorize('view', $vacante);

        return view('candidatos.index', compact('vacante'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nombre' => 'required',
            'email' => 'required|email',
            'cv' => 'required|mimes:pdf|max:1024',
            'vacante_id' => 'required'
        ]);

        $candidato = new Candidato($data);

        if ($request->file('cv')) {
            $file = $request->file('cv');
            $fileName = time() . '.' . $request->file('cv')->extension();
            $path = public_path('/storage/cv');
            $file->move($path, $fileName);
            $candidato->cv = $fileName;
        }

        $candidato->save();

        //Notificar al reclutador
        $reclutador = $candidato->vacante->reclutador;
        $reclutador->notify(new NuevoCandidato($candidato->vacante));


        return redirect()->back()->with('status', 'Tus datos se enviaron correctamente. Suerte!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        //
    }
}
