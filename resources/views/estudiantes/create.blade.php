@extends('layouts.app')

@section('title', 'Nuevo Estudiante')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="flex items-center mb-6">
        <a href="{{ route('estudiantes.index') }}" class="text-blue-600 hover:text-blue-800 mr-4">
            ← Volver
        </a>
        <h1 class="text-3xl font-bold text-gray-800">Nuevo Estudiante</h1>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-8">
        <form action="{{ route('estudiantes.store') }}" method="POST">
            @csrf

            <!-- Nombre -->
            <div class="mb-6">
                <label for="nombre" class="block text-gray-700 font-bold mb-2">
                    Nombre Completo <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="nombre" 
                       name="nombre" 
                       value="{{ old('nombre') }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nombre') border-red-500 @enderror"
                       placeholder="Ej: Juan Pérez García"
                       required>
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Código -->
            <div class="mb-6">
                <label for="codigo" class="block text-gray-700 font-bold mb-2">
                    Código Estudiantil <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="codigo" 
                       name="codigo" 
                       value="{{ old('codigo') }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('codigo') border-red-500 @enderror"
                       placeholder="Ej: EST-001 o 2024-0001"
                       required>
                @error('codigo')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Carrera -->
            <div class="mb-6">
                <label for="carrera" class="block text-gray-700 font-bold mb-2">
                    Carrera <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="carrera" 
                       name="carrera" 
                       value="{{ old('carrera') }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('carrera') border-red-500 @enderror"
                       placeholder="Ej: Ingeniería de Sistemas"
                       required>
                @error('carrera')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-6">
                <label for="email" class="block text-gray-700 font-bold mb-2">
                    Email <span class="text-gray-500">(opcional)</span>
                </label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="{{ old('email') }}"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                       placeholder="Ej: estudiante@universidad.edu">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botones -->
            <div class="flex space-x-4">
                <button type="submit" 
                        class="flex-1 bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg transition">
                    ✓ Guardar Estudiante
                </button>
                <a href="{{ route('estudiantes.index') }}" 
                   class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-3 px-6 rounded-lg transition text-center">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection