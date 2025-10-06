@extends('layouts.app')

@section('title', 'Dashboard - Sistema de Asistencias')

@section('content')
<div class="text-center mb-12">
    <h1 class="text-5xl font-bold text-gray-800 mb-4">
        Sistema de Asistencias Los pepitosss 
    </h1>
    <p class="text-xl text-gray-600">
        Gestiona estudiantes y registra asistencias de forma fácil y rápida
    </p>
</div>

<div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
    <!-- Card Estudiantes -->
    <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition">
        <div class="text-center mb-4">
            <div class="text-6xl mb-4">👥</div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Estudiantes</h2>
            <p class="text-gray-600 mb-6">
                Registra y administra la información de los estudiantes
            </p>
        </div>
        <div class="space-y-2">
            <a href="{{ route('estudiantes.index') }}" 
               class="block w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded transition text-center">
                Ver Estudiantes
            </a>
            <a href="{{ route('estudiantes.create') }}" 
               class="block w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-4 rounded transition text-center">
                + Nuevo Estudiante
            </a>
        </div>
    </div>

    <!-- Card Asistencias -->
    <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-xl transition">
        <div class="text-center mb-4">
            <div class="text-6xl mb-4">✓</div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Asistencias</h2>
            <p class="text-gray-600 mb-6">
                Registra y consulta las asistencias diarias
            </p>
        </div>
        <div class="space-y-2">
            <a href="{{ route('asistencias.index') }}" 
               class="block w-full bg-purple-500 hover:bg-purple-600 text-white font-bold py-3 px-4 rounded transition text-center">
                Registrar hoy
            </a>
            <button class="block w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-4 rounded transition text-center">
                Registrar Hoy
            </button>
        </div>
    </div>
</div>

<!-- Estadísticas Rápidas -->
<div class="mt-12 grid md:grid-cols-3 gap-6 max-w-4xl mx-auto">
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg p-6 text-center">
        <div class="text-4xl font-bold mb-2">0</div>
        <div class="text-sm uppercase">Estudiantes Registrados</div>
    </div>
    <div class="bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg p-6 text-center">
        <div class="text-4xl font-bold mb-2">0</div>
        <div class="text-sm uppercase">Asistencias Hoy</div>
    </div>
    <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-lg p-6 text-center">
        <div class="text-4xl font-bold mb-2">0%</div>
        <div class="text-sm uppercase">Promedio Asistencia</div>
    </div>
</div>
@endsection