<?php

    include 'conexion_db.php';

    $query_activas = "SELECT id FROM propiedades 
                    WHERE id_dueno = " . $_SESSION['id_usuario'] . " 
                    AND (activa = 1 OR estado = 'activa' OR estado = 'pendiente')";
    $result_activas = $conn->query($query_activas);

    if ($result_activas->num_rows > 0 && $_SESSION['certificacion'] == 0) {
        header("Location: error_alquiler.php");
        exit();
    } else {}

    $conn->close();


?>