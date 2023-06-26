<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = User::all();

        return response()->json([
            'data' => $empleados,
            'message' => 'Lista de empleados obtenida correctamente',
        ]);
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
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email|unique:empleados,email',
        ]);

        $empleado = Empleado::create([
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'email' => $request->input('email'),
        ]);

        return response()->json([
            'data' => $empleado,
            'message' => 'Empleado creado exitosamente',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtener el empleado por su ID
        $empleado = Empleado::findOrFail($id);

        // Obtener los registros del empleado
        $registros = $empleado->registros()->get();

        // Devolver una respuesta con la información del empleado y sus registros
        return response()->json([
            'empleado' => $empleado,
            'registros' => $registros,
        ]);
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
