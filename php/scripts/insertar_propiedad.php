<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    extract($_POST);
    

    include 'scripts/conexion_db.php';


    $contador = 0;
    $id_dueno = $_SESSION['id_usuario'];



    $sql = "INSERT INTO propiedades(titulo, descripcion, ubicacion, costo, tiempo_minimo, tiempo_maximo, cupo, id_dueno, tipo) VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiiiiis", $titulo, $descripcion, $ubicacion, $costo, $tiempo_minimo, $tiempo_maximo, $cupo, $id_dueno, $tipo);

    if ($stmt->execute()) {
        $contador++;
        $id_publicacion = $conn->insert_id;

        for ($i = 0; $i < count($_FILES['fotos']['name']); $i++) {
            $nombre_imagen = $_FILES['fotos']['name'][$i];
            $tipo_mimetype = $_FILES['fotos']['type'][$i];
            $datos_imagen = file_get_contents($_FILES['fotos']['tmp_name'][$i]);
        
        
            // Inserta los campos y la imagen en la base de datos
            $sql2 = "INSERT INTO imagenes (nombre, tipo_mimetype, datos, id_propiedad) VALUES (?, ?, ?, ?)";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param("sssi", $nombre_imagen, $tipo_mimetype, $datos_imagen, $id_publicacion);
            $stmt2->execute();
        }

        echo "<script>
        window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/publicacion_exitosa.php';
        </script>";
    } else {
        echo "<script>
        window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/error_alquiler.php';
    </script>";
    }

    $stmt->close();
    $conn->close();

}




?>