<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Conecta a la base de datos
        $conexion = new mysqli('localhost', 'user_rapibnb', 'helloRAPIBNB', 'rapibnb');

        // Verifica la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Consulta SQL para recuperar la imagen
        $sql = "SELECT datos FROM imagenes"; // Cambia 'tabla_imagenes' y 'id' según tu estructura de base de datos

        $resultado = $conexion->query($sql);

        if ($resultado) {
            $fila = $resultado->fetch_assoc();
            $imagen = $fila['datos'];
            $resultado->close();
        } else {
            echo "Error al recuperar la imagen: " . $conexion->error;
        }

        $conexion->close();
    ?>

    <?php
        if ($imagen) {
            // Codifica la imagen en Base64
            $imagen_codificada = base64_encode($imagen);
            // Muestra la imagen en el documento HTML
            echo '<img src="data:image/jpeg;base64,' . $imagen_codificada . '" />';
        } else {
            echo "Imagen no encontrada";
        }
    ?>

</body>
</html>