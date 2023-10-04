<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        // Obtener todas las tareas
        $tareas = Tarea::all();
        return response()->json($tareas);
    }

    public function show($id)
    {
        // Buscar tarea por ID
        $tarea = Tarea::find($id);

        if (!$tarea) {
            return response()->json(['error' => 'Tarea no encontrada'], 404);
        }

        return response()->json($tarea);
    }

    // Implementar otros métodos para create, update, delete...

    // Implementar búsqueda por título, autor, o estado...

    // Implementar pruebas unitarias...

    // Implementar control de excepciones...
}
