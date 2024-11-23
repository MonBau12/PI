<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psicologo extends Model
{
    use HasFactory; // Usamos el trait HasFactory para la creación de fábricas

    // Definir los campos que se pueden llenar de forma masiva
    protected $fillable = [
        'nombre_completo',  // Nombre completo del psicólogo
        'edad',             // Edad del psicólogo
        'tipo_contrato',    // Tipo de contrato del psicólogo
    ];

    // Relación con Citas
    public function citas()
    {
        return $this->hasMany(Cita::class); // Un psicólogo puede tener muchas citas
    }
}
