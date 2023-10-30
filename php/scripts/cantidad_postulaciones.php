<?php

    include "conexion_db.php";

    $query_cantidad_postulaciones = "SELECT COUNT(*) FROM alquileres, propiedades WHERE alquileres.id_propiedad = propiedades.id AND alquileres.id_usuario = '$_SESSION[id_usuario]' AND (alquileres.estado = 'pendiente' OR alquileres.estado = 'activo')";

    
    $result_postulaciones = mysqli_query($conn, $query_cantidad_postulaciones);

    if ($result_postulaciones) {
        $row_postulaciones = mysqli_fetch_array($result_postulaciones); // O usa mysqli_fetch_assoc si prefieres un array asociativo
        $count_postulaciones = $row_postulaciones[0]; // El valor del recuento estará en la primera columna

        echo "<div id='cantidad-ofertas'>";
        echo $count_postulaciones;
        echo "</div>";
    } else {
        echo "Error en la consulta: " . mysqli_error($conn);
    }

    mysqli_close($conn);

?>