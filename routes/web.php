<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\AsistenciaController;

Route::get('/', function () {
    return view('welcome');
});

//Ruta para estudiantes
Route::resourse('/estudiantes', EstudianteController::class);
    
//Rutas para asistencias
Route::get('/asistencias', [AsistenciaController::class, 'index'])->name('asistencia.index');
Route::post('/asistencias', [AsistenciaController::class, 'store'])->name('asistencia.store');
