<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Listar todas las asistencias
     */
    public function index()
    {
        $asistencias = Asistencia::with('estudiante')
            ->latest()
            ->paginate(15);
        
        return view('asistencias.index', compact('asistencias'));
    }

    /**
     * Mostrar formulario para crear nueva asistencia
     */
    public function create()
    {
        return view('asistencias.create');
    }

    /**
     * Guardar nueva asistencia
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'fecha' => 'required|date',
            'estado' => 'required|in:presente,ausente,tarde',
            'observaciones' => 'nullable|string|max:500'
        ]);

        Asistencia::create($validated);

        return redirect()
            ->route('asistencias.index')
            ->with('success', 'Asistencia registrada correctamente');
    }

    /**
     * Mostrar una asistencia específica
     */
    public function show(Asistencia $asistencia)
    {
        return view('asistencias.show', compact('asistencia'));
    }

    /**
     * Mostrar formulario para editar
     */
    public function edit(Asistencia $asistencia)
    {
        return view('asistencias.edit', compact('asistencia'));
    }

    /**
     * Actualizar asistencia
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        $validated = $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'fecha' => 'required|date',
            'estado' => 'required|in:presente,ausente,tarde',
            'observaciones' => 'nullable|string|max:500'
        ]);

        $asistencia->update($validated);

        return redirect()
            ->route('asistencias.index')
            ->with('success', 'Asistencia actualizada correctamente');
    }

    /**
     * Eliminar asistencia
     */
    public function destroy(Asistencia $asistencia)
    {
        $asistencia->delete();

        return redirect()
            ->route('asistencias.index')
            ->with('success', 'Asistencia eliminada correctamente');
    }

    public function index()

    $asistencias = \App\Models\Asistencia::with('estudiante')
        ->latest()
        ->get();
    
    return view('asistencias.index', compact('asistencias'));
}
