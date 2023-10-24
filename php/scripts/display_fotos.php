<?php

    $servername = 'localhost';
    $username = 'user_rapibnb';
    $password = 'helloRAPIBNB';
    $database = 'rapibnb';

    $conexion = new mysqli($servername, $username, $password, $database);

    if ($conexion->connect_error) {
        die('Error de conexion: ' . $conn->connect_error);
    }

    $query = "SELECT * FROM imagenes WHERE id_propiedad = ?";
    $prepara = $conexion->prepare($query);
    $prepara->bind_param("i", $_SESSION['selected_publicacion']);
    $prepara->execute();
    $result = $prepara->get_result();

    if ($result->num_rows > 0) {
        while ($row_imagen = $result->fetch_assoc()) {
            // Codifica la imagen en Base64
            $imagen_codificada = base64_encode($row_imagen['datos']);
            // Muestra la imagen en el documento HTML
            echo '<img src="data:image/jpeg;base64,' . $imagen_codificada . '" alt="" class="imagenPropiedad">';
        }
    } else {
        echo "<p>La publicacion no tiene imagenes.</p>";
    }

    $prepara->close();
    $conexion->close();



?>