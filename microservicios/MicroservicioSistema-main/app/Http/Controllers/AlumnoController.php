<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registro;
use Illuminate\Support\Facades\Validator;

class AlumnoController extends Controller
{
    public function showRegistrationForm()
    {
        return view('registro'); // 
    }
    public function landing()
    {
        return view('landing'); // 
    }

    public function register(Request $request)
    {
        // Validar los datos
        $validator = Validator::make($request->all(), [
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:registros', // Asegúrate de que el DNI sea único
            'celular' => 'required|string|max:15',
            'edad' => 'required|integer|min:0|max:120', // Ajusta según el rango de edad aceptable
            'sexo' => 'required|string|in:masculino,femenino', // O ajusta según tus requerimientos
            'fecha_nacimiento' => 'required|date',
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Crear el registro
        Registro::create([ // Corrige el nombre de la clase a 'Registro'
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'dni' => $request->dni,
            'celular' => $request->celular,
            'edad' => $request->edad,
            'sexo' => $request->sexo,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'curso' => $request->curso, //añadido
        ]);

        // Redirigir a la página de éxito con un mensaje de éxito
        return redirect()->route('success')->with('message', 'Registro completado con éxito.'); 
    }
}
