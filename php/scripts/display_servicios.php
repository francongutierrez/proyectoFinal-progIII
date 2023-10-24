<?php

    $servername = 'localhost';
    $username = 'user_rapibnb';
    $password = 'helloRAPIBNB';
    $database = 'rapibnb';

    $conexion2 = new mysqli($servername, $username, $password, $database);

    if ($conexion2->connect_error) {
        die('Error de conexion: ' . $conn->connect_error);
    }

    $query2 = "SELECT servicios.nombre FROM servicios, incluye, propiedades WHERE incluye.id_propiedad = propiedades.id AND incluye.id_servicio = servicios.id AND propiedades.id = ?";
    $prepara2 = $conexion2->prepare($query2);
    $prepara2->bind_param("i", $_SESSION['selected_publicacion']);
    $prepara2->execute();
    $result2 = $prepara2->get_result();

    if ($result2->num_rows > 0) {
        while ($row_servicios = $result2->fetch_assoc()) {
            echo '<span class="serviciosNombre">'.$row_servicios['nombre'].'</span> / ';
        }
    } else {
        echo "<p>La publicacion no tiene servicios especificados.</p>";
    }

    $prepara2->close();
    $conexion2->close();

?>