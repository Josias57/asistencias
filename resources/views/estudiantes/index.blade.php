@extends('layouts.app')

@section('title', 'Lista de Estudiantes')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">👥 Estudiantes</h1>
    <a href="{{ route('estudiantes.create') }}" 
       class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded transition">
        + Nuevo Estudiante
    </a>
</div>

<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Carrera</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($estudiantes as $estudiante)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $estudiante->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $estudiante->codigo }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $estudiante->nombre }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $estudiante->carrera }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $estudiante->email ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm space-x-2">
                    <a href="{{ route('estudiantes.edit', $estudiante) }}" 
                       class="text-blue-600 hover:text-blue-800 font-medium">
                        ✏️ Editar
                    </a>
                    <form action="{{ route('estudiantes.destroy', $estudiante) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('¿Estás seguro de eliminar este estudiante?')"
                                class="text-red-600 hover:text-red-800 font-medium">
                            🗑️ Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                    <div class="text-6xl mb-4">📭</div>
                    <p class="text-xl">No hay estudiantes registrados</p>
                    <a href="{{ route('estudiantes.create') }}" class="text-blue-600 hover:underline mt-2 inline-block">
                        Crea el primero aquí
                    </a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($estudiantes->count() > 0)
<div class="mt-4">
    {{ $estudiantes->links() }}
</div>
@endif
@endsection