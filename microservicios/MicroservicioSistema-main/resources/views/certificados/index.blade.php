<!-- resources/views/certificados/index.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Certificados</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .btn-custom {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-0">Sistema de Certificados</h1>
            </div>
            <div class="card-body">
                <p class="lead">En esta sección podrás generar o ver los certificados emitidos.</p>
                <a href="{{ route('certificados.generar') }}" class="btn btn-custom btn-lg">Generar Certificado</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (opcional, para componentes interactivos) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>