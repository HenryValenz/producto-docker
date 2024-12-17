<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use App\Models\Matriculado;

class MatriculadoController1 extends Controller
{
    public function showMatriculados(Request $request)
    {
        // Inicializa la consulta de Matriculado
        $query = Matriculado::query();

        // Filtrar por fecha si ambos valores existen
        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $query->whereBetween('created_at', [$request->input('fecha_inicio'), $request->input('fecha_fin')]);
        }

        // Filtrar por DNI si se proporciona
        if ($request->filled('dni')) {
            $query->where('dni', $request->input('dni'));
        }

        // Obtener los resultados filtrados
        $matriculados = $query->get();

        return view('matriculados.index', compact('matriculados'));
    }

    public function showRegistros(Request $request)
    {
        // Inicializa la consulta de Registro
        $query = Registro::query();

        // Filtrar por DNI si se proporciona
        if ($request->filled('dni')) {
            $query->where('dni', $request->input('dni'));
        }

        // Filtrar por nombre o apellido si se proporciona
        if ($request->filled('nombre')) {
            $query->where(function($q) use ($request) {
                $q->where('nombres', 'LIKE', '%' . $request->input('nombre') . '%')
                  ->orWhere('apellidos', 'LIKE', '%' . $request->input('nombre') . '%');
            });
        }

        // Obtener los resultados filtrados
        $registros = $query->get();

        return view('registros.index', compact('registros'));
    }
}