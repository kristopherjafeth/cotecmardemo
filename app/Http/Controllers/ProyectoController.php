<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyectos = Proyecto::all();

        return Inertia::render('ProyectosIndex', ['proyectos' => $proyectos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('ProyectoCrear');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idproyecto' => 'required',
            'nombre' => 'required',
        ]);

        Proyecto::create($request->all());

        return Redirect::route('proyectos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyecto $proyecto)
    {
        return Inertia::render('ProyectoEditar', ['proyecto' => $proyecto]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $proyecto = Proyecto::findOrFail($proyecto->id);
        $proyecto->idbloque = $request->idbloque;
        $proyecto->nombrebloque = $request->nombrebloque;
        $proyecto->proyecto = $request->proyecto;
        $proyecto->save();

        return Redirect::route('proyectos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();

        return Redirect::route('proyectos.index');

    }
}
