<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = [
        'nombre',
        'codigo',
        'carrera',
        'email',
    ];
    //Relación con asistencias
    public function asistencias()
    {
        return $this->hasMany(asistencias::class);
    }
}
