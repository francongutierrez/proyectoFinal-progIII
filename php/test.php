<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página</title>
    <style>
        /* Estilos generales */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Estilo para el encabezado */
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
        }

        /* Estilo para el contenedor */
        .container {
            padding: 20px;
            min-height: calc(100vh - 160px); /* Altura mínima del contenedor (viewport - header - footer) */
        }

        /* Estilo para el pie de página */
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Encabezado</h1>
        <!-- Puedes agregar aquí el contenido de tu encabezado, como un menú de navegación, logo, etc. -->
    </header>

    <div class="container">
        <!-- Aquí va el contenido principal de tu página -->
        <h2>Contenido</h2>
        <p>Este es el contenido de mi página web.</p>
    </div>

    <footer>
        <p>Pie de página</p>
        <!-- Puedes agregar aquí información de contacto, enlaces a redes sociales, etc. -->
    </footer>
</body>
</html>
