<!-- resources/views/certificados/alumnos.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Alumnos Matriculados</h1>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Curso</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $index => $alumno)
                <tr>
                    <td>{{ $index + 1}}</td>
                    <td>{{ $alumno->nombres}}</td>
                    <td>{{ $alumno->apellidos}}</td>
                    <td>{{ $alumno->matricula->nombre }}</td>
                    <td>
                        <a href="{{ route('certificados.generar', $alumno->id) }}" class="btn btn-primary btn-sm">
                            Generar Certificado
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
