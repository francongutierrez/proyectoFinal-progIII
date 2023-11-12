<?php
    $fechaInicioDate = new DateTime($row['fecha_inicio']);
    $fechaFinDate = new DateTime($row['fecha_fin']);
    $fechaInicioFormateadaPostulaciones = $fechaInicioDate->format('d/m/Y');
    $fechaFinFormateadaPostulaciones = $fechaFinDate->format('d/m/Y');
    $fechaHoy = date('Y-m-d');


    echo "<div class='card mt-3 mb-3'>";
    echo "<div class='card-header'>";
    echo "<h3>" . $row['titulo'] . "</h3>";
    echo "</div>"; // Cierre de card header
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>". $row['descripcion'] . "</h5>";
    echo "<h5 class='card-title'>Costo por dia: $" . $row['costo'] . "</h5>";
    echo "</div>"; // Cierre de card body
    echo "<div class='card-footer text-body-secondary'>";
    echo "<form method='POST'>";
    echo "<input type='hidden' name='id_publicacion' value='" . $row['id'] . "'>";
    echo "<button type='submit' class='btn btn-success opcionDueno' name='verMas' id='ver-mas-button'><a>Ver reseñas y ofertas</a></button>";
    echo "</form>";

    if ($row["estado"] == 'pendiente') {
        echo '<p class="mensajePendiente mt-3">Tiene una postulación de alquiler pendiente en esta publicación</p>';
    }
    elseif ($row["estado"] == 'activo') {
        echo '<p class="mensajeActivo mt-3">Ha alquilado esta propiedad! El alquiler inicia el '.$fechaInicioFormateadaPostulaciones.' y finaliza el '.$fechaFinFormateadaPostulaciones.'</p>';
    }
    elseif ($row["fecha_fin"] < $fechaHoy) {
        echo '<p class="mensajeRechazado mt-3">El alquiler finalizó el '.$fechaFinFormateadaPostulaciones.'</p>';
    }
    elseif ($row["estado"] == 'rechazado') {
        echo '<p class="mensajeRechazado mt-3">La postulación fue rechazada</p>';
    } else {}


    echo "</div>"; // Cierre de card footer
    echo "</div>"; // cierre de card


?>