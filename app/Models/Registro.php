<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $fillable = ['empleado_id', 'tipo', 'hora']; // Campos que se pueden asignar de forma masiva

    // Relación con el empleado
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
