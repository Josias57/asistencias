<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class EstudianteController extends Controller
{
    /**
     * Mostrar lista de estudiantes.
     */
    public function index()
    {
        $estudiantes = Estudiante::lates()->paginate(10);
        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Mostrar formulario para crear estudiante.
     */
    public function create()
    {
        return view('Estudiantes.create');
    }

    /**
     * Guardar nuevo estudiante.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:255|unique:estudiantes',
            'carrera' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
        ],[
            'nombre.required' => 'El nombre es obligatorio.',
            'codigo.required' => 'El código es obligatorio.',
            'codigo.unique' => 'El código ya está en uso.',
            'carrera.required' => 'La carrera es obligatoria.',
            'email.email' => 'El correo electrónico no es válido.',
        ]);
        Estudiante::create($validated);
        return redirect()->route('estudiantes.index')
        ->with('success','¡Estudiante registrado exitosamente!');
    }

    /**
     * Mostrar formulario para editar estudiante.
     */
    public function edit(Estudiante $estudiante)
    {
        return view('estudiante $estudiante')

    }

    /**
     * Actualizar estudiante.
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:255|unique:estudiantes,codigo,'.$estudiante->id,
            'carrera' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);
        $estudiante->update($validated);
        return redirect()->route('estudiantes.index')
            ->with('success','¡Estudiante actualizado exitosamente!');
    }

    /**
     * Eliminar estudiante.
     */
    public function detroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect()->route('estudiantes.index')
            ->with ('success','¡Estudiante eliminado correctamente!');
    }
}
