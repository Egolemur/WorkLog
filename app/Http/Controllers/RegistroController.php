<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    /**
     * Registrar una nueva entrada a horario regular de trabajo
     */
    public function registrarEntradaEmpleado($id)
    {
        // Verificar si el usuario está autenticado como empleado
        $empleado = Auth::user();

        if (!$empleado) {
            return response()->json([
                'message' => 'Acceso no autorizado',
            ], 401);
        }

        // Verificar si el ID del empleado coincide con el usuario autenticado
        if ($empleado->id != $id) {
            return response()->json([
                'message' => 'Acceso no autorizado',
            ], 401);
        }

        // Obtener la hora actual
        $horaEntrada = Carbon::now();

        // Crear un nuevo registro de entrada
        $registro = new Registro();
        $registro->empleado_id = $empleado->id;
        $registro->tipo = 'entrada';
        $registro->hora = $horaEntrada;
        $registro->save();

        return response()->json([
            'message' => 'Entrada registrada exitosamente',
            'registro' => $registro,
        ]);
    }

    /**
     * Registrar un nuevo empleado
     */
    
    public function registroEmpleado(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $empleado = User::create([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return response()->json([
            'message' => 'Empleado registrado exitosamente',
            'data' => $empleado,
        ], 201);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
