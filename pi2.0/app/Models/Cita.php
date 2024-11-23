<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory; // Usamos el trait HasFactory para la creación de fábricas

    // Definir los campos que se pueden llenar de forma masiva
    protected $fillable = [
        'alumno_id', 
        'psicologo_id', 
        'fecha', 
        'hora', 
        'estado'
    ];

    // Relación con Alumno
    public function alumno()
    {
        return $this->belongsTo(Alumno::class); // Una cita pertenece a un alumno
    }

    // Relación con Psicologo
    public function psicologo()
    {
        return $this->belongsTo(Psicologo::class); // Una cita pertenece a un psicólogo
    }
    public function paciente()
{
    return $this->belongsTo(Paciente::class);
}

}
