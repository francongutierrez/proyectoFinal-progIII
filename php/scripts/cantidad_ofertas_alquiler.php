<?php

    include "conexion_db.php";

    $query_cantidad = "SELECT COUNT(*) FROM alquileres, propiedades WHERE alquileres.id_propiedad = propiedades.id AND propiedades.id_dueno = '$_SESSION[id_usuario]' AND alquileres.estado = 'pendiente'";

    
    $result = mysqli_query($conn, $query_cantidad);

    if ($result) {
        $row = mysqli_fetch_array($result); // O usa mysqli_fetch_assoc si prefieres un array asociativo
        $count = $row[0]; // El valor del recuento estará en la primera columna

        echo "<div id='cantidad-ofertas'>";
        echo $count;
        echo "</div>";
    } else {
        echo "Error en la consulta: " . mysqli_error($conn);
    }

    mysqli_close($conn);

?>