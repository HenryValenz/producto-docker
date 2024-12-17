<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro; 
use GuzzleHttp\Client;


class RegistroController extends Controller
{
    // Muestra el formulario de registro
    public function create()
    {
        return view('registro.create');
    }

    public function searchDNI(Request $request){
        // Obtén el DNI desde el formulario
        $dni = $request->input('dni');

        if (!$dni) {
            return response()->json(['error' => 'DNI no proporcionado'], 400);
        }

        // Crear un cliente Guzzle
        $client = new Client();

        try {
            // Realizar la solicitud GET a la API
            $response = $client->request('GET', 'https://api.apis.net.pe/v2/reniec/dni', [
                'query' => [
                    'numero' => $dni, // Parámetro que se envía en la URL
                ],
                'headers' => [
                    'Authorization' => 'Bearer apis-token-11936.ojUrDMsCEn2AcBEa37tbYvx1h0OV35oh',
                    'Referer' => 'https://api.net.pe/consulta-dni-api',
                ]
            ]);

            // Obtener el contenido de la respuesta y devolverlo
            $data = json_decode($response->getBody()->getContents(), true);
            
            return response()->json($data);
        } catch (\Exception $e) {
            // Manejar cualquier error
            return response()->json(['error' => 'Hubo un error al realizar la solicitud.'], 500);
        }
    }

    // Procesa el registro y guarda los datos en la base de datos
    public function store(Request $request)
{
    // Validación de los datos
    $request->validate([
        'nombres' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'dni' => 'required|numeric|digits:8',
        'celular' => 'required|numeric|digits:9',
        'edad' => 'required|integer|min:0',
        'sexo' => 'required|in:M,F',
        'fecha_nacimiento' => 'required|date',
        'curso' => 'required|string|max:100',
    ]);

    // Verificar si el DNI ya está registrado
    $existingRegistro = Registro::where('dni', $request->dni)->first();

    if ($existingRegistro) {
        // Redirige o muestra un mensaje de error si el DNI ya está registrado
        return redirect()->route('registro.create')->with('error', 'El DNI ya está registrado.');
    }

    // Creación del registro en la base de datos
    Registro::create($request->all());

    // Redirige o muestra un mensaje de éxito
    return redirect()->route('registro.create')->with('success', 'Registro exitoso');
}
}
