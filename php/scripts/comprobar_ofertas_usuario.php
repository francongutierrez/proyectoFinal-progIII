<?php

    include "conexion_db.php";

    $sql_ofertas_usuario = "SELECT id 
                            FROM alquileres 
                            WHERE id_usuario = {$_SESSION['id_usuario']} 
                            AND (estado = 'pendiente' 
                            OR (estado = 'activo' AND fecha_fin >= CURRENT_DATE))";
    $resultado_ofertas_usuario = $conn->query($sql_ofertas_usuario);

    if ($resultado_ofertas_usuario->num_rows > 0) {
        header("Location: error_ofertas_usuario.php");
        exit();
    } else {}

?>