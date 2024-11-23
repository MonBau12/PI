<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    // Define los campos que se pueden rellenar (según tu tabla)
    protected $fillable = ['nombre', 'matricula'];  // Añadí 'matricula' como campo fillable

    // Relación con Citas (Un alumno tiene muchas citas)
    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
