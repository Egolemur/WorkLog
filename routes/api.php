<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\RegistroController;

// Despliegue de información para hacer reportes de asistencia y puntualidad.
Route::get('/empleados', [EmpleadoController::class, 'index']); // Obtener la lista de empleados
Route::get('/empleados/{id}', [EmpleadoController::class, 'show']); // Obtener los detalles de un empleado específico

// Acciones de alta y baja del personal de Recursos Humanos.
Route::post('/empleados', [EmpleadoController::class, 'store']); // Crear un nuevo empleado
Route::put('/empleados/{id}', [EmpleadoController::class, 'update']); // Actualizar los detalles de un empleado específico
Route::delete('/empleados/{id}', [EmpleadoController::class, 'destroy']); // Eliminar un empleado específico

// Modificaciones que pueden hacer los supervisores o gerentes.
Route::post('/alta', [RegistroController::class, 'registroEmpleado']); // Dar de alta un nuevo usuario para los empleados
Route::post('/registros/entradas', [RegistroController::class, 'registrarEntrada']); // Registrar una nueva entrada para un empleado
Route::post('/registros/salidas', [RegistroController::class, 'registrarSalida']); // Registrar una nueva salida para un empleado
Route::post('/registros/comidas', [RegistroController::class, 'registrarComida']); // Registrar una nueva hora de comida para un empleado
Route::post('/registros/regreso', [RegistroController::class, 'registrarRegreso']); // Registrar una nueva hora de regreso de la comida para un empleado

// Acciones que pueden tomar los empleados directamente.
Route::post('/empleados/{id}/registros/entrada', [RegistroController::class, 'registrarEntradaEmpleado']); // Registrar la hora de entrada de un empleado
Route::post('/empleados/{id}/registros/salida', [RegistroController::class, 'registrarSalidaEmpleado']); // Registrar la hora de salida de un empleado
Route::post('/empleados/{id}/registros/comida', [RegistroController::class, 'registrarComidaEmpleado']); // Registrar la hora de salida a comer de un empleado
Route::post('/empleados/{id}/registros/regreso', [RegistroController::class, 'registrarRegreso']); // Registrar una nueva hora de regreso de la comida para un empleado

// Autenticación de usuarios
Route::post('/login', [UserController::class, 'login']); // Iniciar sesión para poder hacer registros

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
