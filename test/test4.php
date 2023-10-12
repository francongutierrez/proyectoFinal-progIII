<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        Seleccione una imagen: <input type="file" name="imagen">
        <button type="submit">Subir imagen</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verifica si se ha seleccionado una imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            // Conecta a la base de datos
            $conexion = new mysqli('localhost', 'user_rapibnb', 'helloRAPIBNB', 'rapibnb');

            // Verifica la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Procesa la imagen
            $nombre_imagen = $_FILES['imagen']['name'];
            $tipo_mimetype = $_FILES['imagen']['type'];
            $datos_imagen = file_get_contents($_FILES['imagen']['tmp_name']);

            // Inserta la imagen en la base de datos
            $sql = "INSERT INTO imagenes (nombre, tipo_mimetype, datos) VALUES (?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("sss", $nombre_imagen, $tipo_mimetype, $datos_imagen);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "Imagen subida exitosamente.";
            } else {
                echo "Error al subir la imagen: " . $conexion->error;
            }

            $stmt->close();
            $conexion->close();
        } else {
            echo "Por favor seleccione una imagen válida.";
        }
    }
?>


</body>
</html>