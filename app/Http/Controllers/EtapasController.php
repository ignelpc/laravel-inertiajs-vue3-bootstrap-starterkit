<?php

namespace App\Http\Controllers;

use App\Models\Etapas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class EtapasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Etapas/Index', ['etapas' => Etapas::all()->map(function ($etapa) {
            return [
                'id' => $etapa->id,
                'name' => $etapa->name,
                'description' => $etapa->description,
                'created_at' => $etapa->created_at,
            ];
        })]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Etapas/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:etapas|min:3',
            'description' => 'required|min:5'
        ]);

        Etapas::create($validated);

        return Redirect::route('etapas.index')->with('success', 'Etapa adicionada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Etapas $etapa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etapas $etapa)
    {
        return Inertia::render('Etapas/Edit', ['etapa' => $etapa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etapas $etapa)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5'
        ]);

        return $etapa->update($validated) ? Redirect::route('etapas.index')->with('success', 'Etapa actualizada com sucesso') : Redirect::route('etapas.index')->with('error', 'Falha ao actualizar a etapa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etapas $etapas)
    {
        return $etapas->delete() ?
            Redirect::route('etapas.index')->with('success', 'Etapa eliminada com sucesso')
            : Redirect::route('etapas.index')->with('error', 'Falha ao eliminar a etapa');
    }
}
