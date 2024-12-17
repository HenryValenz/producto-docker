<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO CECOMP</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        /* Estilo global */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            height: 100vh; /* Asegura que el body cubra toda la pantalla */
            overflow: hidden; /* Evita barras de desplazamiento por el fondo */
        }

        /* Menú flotante */
        .navbar {
            position: fixed;
            display: flex;
            justify-content: left;
            top: 0;
            width: 100%;
            background-color: rgba(199, 0, 57); /* Fondo semi-transparente */
            z-index: 1000; /* Asegura que el menú esté por encima de otros elementos */
        }

        .navbar a {
            color: white;
            padding: 15px 20px;
            text-decoration: none;
            text-align: center;
            
        }

        .navbar a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        /* Contenedor de fondo */
        .background-container {
            position: relative;
            height: 100%; /* Hace que el contenedor ocupe toda la pantalla */
            background-image: url('https://www.uns.edu.pe/recursos/noticias/eca1f92a2b19db4e982dbb35bbee84c7.jpg');
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            height: 100vh;
        }

        /* Capa de opacidad (overlay) */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7); /* Fondo negro con opacidad */
            z-index: 1; /* Asegura que el overlay esté encima de la imagen */
        }

        .header {
            display: flex;
            flex-direction: column; /* Coloca los elementos en una columna */
            justify-content: center; /* Centra verticalmente */
            align-items: center; /* Centra horizontalmente */
            text-align: center; /* Alinea el texto al centro */
            padding-top: 50px; /* Ajusta el espacio desde la parte superior */
            z-index: 2;
            position: relative;
            color: white;
            max-width: 1200px; /* Establece un ancho máximo para el contenedor */
            margin: 0 auto; /* Centra el contenedor horizontalmente */
        }

        .header h1 {
            font-size: 36px;
            margin-bottom: 15px;
        }

        .header p {
            font-size: 14px;
            line-height: 1.6;
            max-width: 800px; /* Limita el ancho del párrafo para mejor legibilidad */
        }

        /* Estilo del contenido */
        .content {
            text-align: center;
            padding: 20px;
            z-index: 2;
            position: relative;
            color: white; /* Asegura que el texto sea visible sobre el fondo oscuro */
        }

        .footer {
            text-align: center;
            margin-top: 70px;
            color: white;
            z-index: 2;
            position: relative;
        }

        /* Estilo para los botones de imagen en horizontal */
        .buttons-container {
            display: flex; /* Usa flexbox para alinear los botones en fila */
            justify-content: center; /* Centra los botones horizontalmente */
            gap: 40px; /* Espacio entre los botones */
            margin-top: 20px;
        }

        .image-button img {
            width: 200px; /* Tamaño de la imagen */
            height: auto;  /* Mantiene la proporción */
            border-radius: 8px; /* Bordes redondeados */
            transition: transform 0.3s ease; /* Efecto de transición */
        }

        .image-button img:hover {
            transform: scale(1.05); /* Efecto de zoom al pasar el mouse */
        }

        .nav-icon {
        width: 45px; /* Tamaño de la imagen */
        height: 20px;
        margin-right: 8px; /* Espacio entre la imagen y el texto */
    }


    </style>
</head>
<body>

    <!-- Menú flotante -->
    <div class="navbar">
    <a href="{{route('landing')}}" class="nav-item">
        <img src="https://www.uns.edu.pe/cecomp/imagen/logocecomp1.png" alt=" " class="nav-icon"> Inicio
    </a>
    <a href="https://aplicacionesenlanube.cetivirgendelapuerta.com/instituto/login" class="nav-item">Académico</a>
    <a href="https://aplicacionesenlanube.cetivirgendelapuerta.com/finanzasacademicas/public/" class="nav-item">Pagos</a>
    <a href="https://www.uns.edu.pe/campusvirtual/" class="nav-item">Campus Virtual</a>
</div>



    <!-- Contenedor principal con imagen de fondo y capa de opacidad -->
    <div class="background-container">
        <!-- Capa de opacidad (overlay) -->
        <div class="overlay"></div>

        <!-- Header -->
        <div class="header">
            <h1>Bienvenidos a CECOMP</h1>
            <p>El Centro de Cómputo de la UNS les da la bienvenida y abre sus puertas a toda la comunidad universitaria y público en general, a través de su portal web.  
            El CECOMP es una unidad de capacitación orientada a formar especialistas en diversas áreas de la Informática, preparados para incorporar en su trabajo los últimos avances tecnológicos, a través de los cursos que se dictan periódicamente.</p>
        </div>

        <!-- Content -->
        <div class="content">
            <h2>Registrate hoy mismo!!</h2>
            <p>Haz clic en uno de los botones.</p>

            <!-- Contenedor para los botones de imagen -->
            <div class="buttons-container">
                <!-- Botón 1 -->
                <div class="image-button">
                    <a href="{{ route('registro.create') }}">
                        <img src="https://cdn-icons-png.flaticon.com/512/3456/3456426.png?text=Boton+1" alt="Botón Foto 1">
                    </a>
                    <h2>Registrarse: Estudiante</h2>
                </div>

                <!-- Botón 2 -->
                <div class="image-button">
                    <a href="{{ route('loginM') }}">
                        <img src="https://cengage.my.site.com/resource/1607465003000/loginIcon?text=Boton+2" alt="Botón Foto 2">
                    </a>
                    <h2>Inicio Sesión: Administrador</h2>
                </div>
            </div>

        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; 2024 CECOMP</p>
        </div>
    </div>

</body>
</html>

