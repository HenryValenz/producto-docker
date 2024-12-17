<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matriculado;

class CertificadosController extends Controller
{
    // Método para listar los alumnos matriculados con sus cursos
    public function listarAlumnos()
    {
        // Cargar a los alumnos junto con la relación 'matricula'
        $alumnos = Matriculado::with('matricula')->get();
    
        return view('certificados.alumnos', compact('alumnos'));
    }

    // Método para generar el certificado de un alumno específico
    public function generarCertificado($id)
    {
        $alumno = Matriculado::with('matricula')->findOrFail($id);

        require_once base_path('fpdf/fpdf.php');
        $pdf = new \FPDF('L', 'mm', 'Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetCreator('Sistema de Certificados');

        // Agregar imagen al PDF
        $pdf->Image(base_path('images/certificado2.png'), 0, 0, 280, 216);

        // Nombre del alumno
        $pdf->SetFont('Arial', 'B', 26);
        $pdf->SetXY(60, 109);
        $nombreCompleto = $alumno->nombres . ' ' . $alumno->apellidos;
        $pdf->Cell(160, 5, mb_convert_encoding($nombreCompleto, 'ISO-8859-1', 'UTF-8'), 0, 1, 'C');

        // Nombre del curso
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->SetXY(90, 125);
        $pdf->Cell(160, 5, mb_convert_encoding($alumno->matricula->nombre, 'ISO-8859-1', 'UTF-8'), 0, 1, 'C');

        // Fecha
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetXY(150, 156);
        $pdf->Cell(160, 5, date('d/m/Y'), 0, 1, 'C');

        // Salida del PDF
        $pdf->Output();
    }
}
