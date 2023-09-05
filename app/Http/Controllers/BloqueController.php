<?php

namespace App\Http\Controllers;
use App\Models\Proyecto;
use App\Models\Bloque;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
class BloqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bloques = Bloque::all();

        return Inertia::render('BloquesIndex', ['bloques' => $bloques]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proyecto = Proyecto::all();

        return Inertia::render('BloqueCrear', ['proyecto' => $proyecto]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'idbloque' => 'required',
            'nombrebloque' => 'required',
        ]);
        Bloque::create($request->all());

        return Redirect::route('bloques.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bloque $bloque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bloque $bloque, Proyecto $proyecto)
    {
        return Inertia::render('BloqueEditar', ['bloque' => $bloque, 'proyecto' => $proyecto]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bloque $bloque)
    {
        $bloque = Bloque::findOrFail($bloque->id);
        $bloque->idbloque = $request->idbloque;
        $bloque->nombrebloque = $request->nombrebloque;
        $bloque->bloque = $request->bloque;
        $bloque->save();

        return Redirect::route('bloques.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bloque $bloque)
    {
        $bloque->delete();

        return Redirect::route('bloques.index');

    }
}
