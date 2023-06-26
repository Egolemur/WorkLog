<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido', 'email']; // Campos que se pueden asignar de forma masiva

    // Relación con los registros del empleado
    public function registros()
    {
        return $this->hasMany(Registro::class);
    }
}
