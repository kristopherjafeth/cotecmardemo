<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bloque;
use App\Models\Pieza;
use Inertia\Inertia;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PiezaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $piezas = Pieza::all();

        return Inertia::render('PiezaIndex', ['piezas' => $piezas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proyectos = Proyecto::all();
        $piezas = Pieza::all();
        $bloques = Bloque::all();
        $registradoPor = Auth::user();

        return Inertia::render('PiezaCrear', ['proyectos' => $proyectos, 'piezas' => $piezas, 'bloques' => $bloques, 'registradoPor' => $registradoPor ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'idpieza' => 'required',
            'nombrepieza' => 'required',
            'pesoteorico' => 'required',
            'pesoreal' => 'required',
            'estado' => 'required',
            'bloque_id' => 'required',
            'registrado' => 'required',
            'proyecto_id' => 'required',

        ]);


        Pieza::create($request->all());

        return Redirect::route('bloques.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pieza $pieza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pieza $pieza, Proyecto $proyectos)
    {
        $proyectos = Proyecto::all();
        $piezas = Pieza::where('id', $pieza->id)->first();
        $bloques = Bloque::all();
        $registradoPor = Auth::user();

        return Inertia::render('PiezaEditar', ['proyectos' => $proyectos, 'piezas' => $piezas, 'bloques' => $bloques, 'registradoPor' => $registradoPor ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pieza $pieza)
    {
        $pieza = Pieza::findOrFail($pieza->id);
        $pieza->idpieza = $request->idpieza;
        $pieza->nombrepieza = $request->nombrepieza;
        $pieza->pesoteorico = $request->pesoteorico;
        $pieza->pesoreal = $request->pesoreal;
        $pieza->estado = $request->estado;
        $pieza->bloque_id = $request->bloque_id;
        $pieza->registrado = $request->registrado;
        $pieza->proyecto_id = $request->proyecto_id;
        $pieza->save();


        return Redirect::route('piezas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pieza $pieza)
    {
        $pieza->delete();

        return Redirect::route('piezas.index');

    }
}
