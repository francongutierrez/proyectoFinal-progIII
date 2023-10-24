<?php
    $sql_ofertas = "SELECT COUNT(*) FROM propiedades, alquileres WHERE propiedades.id_dueno = ? AND propiedades.id = alquileres.id_propiedad AND alquileres.estado = 'pendiente'";
    $stmt_ofertas = $conn->prepare($sql_ofertas);
    $stmt_ofertas->bind_param("i", $_SESSION['id_usuario']);
    $stmt_ofertas->execute();
    $result_ofertas = $stmt_ofertas->get_result();
    $row_ofertas = $result_ofertas->fetch_assoc(); // Obtiene la fila de resultado como un array asociativo
    $count = $row_ofertas['COUNT(*)']; // Obtiene el valor de COUNT(*)
    $cambio = $row["activa"];



    echo "<div class='card mt-3 mb-3'>";
    echo "<div class='card-header'>";
    echo "<h3>" . $row['titulo'] . "</h3>";
    echo "</div>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>". $row['descripcion'] . "</h5>";
    echo "<h5 class='card-title'>Costo por dia: $" . $row['costo'] . "</h5>";
    echo "</div>";
    echo "<div class='card-footer text-body-secondary'>";
    echo "<form method='POST'>";
    echo "<input type='hidden' name='id_publicacion' value='" . $row['id'] . "'>";
    echo "<button type='submit' class='btn btn-success opcionDueno' name='verMas' id='ver-mas-button'><a>Ver reseñas y ofertas</a></button>";

    if ($row["activa"] == 1 || $cambio == 1) {
        echo "<button type='submit' class='btn btn-danger opcionDueno' name='desactivar' id='desactivar-button'><a>Desactivar</a></button>";
    } else {
        echo "<button type='submit' class='btn btn-success opcionDueno' name='activar' id='activar-button'><a>Activar</a></button>";
    }

    echo "</form>";

    if ($count > 0 && $row["activa"] == 1) {
        echo '<p class="mensajeOfertas mt-3">Tiene '. $count . ' oferta/s pendiente/s en esta publicación</p>';
    } elseif ($count == 0 && $row["activa"] == 1) {
        echo '<p class="mensajeOfertas mt-3">No tiene ofertas para esta publicación</p>';
    } else { 
        echo '<p class="mensajeOfertas mt-3">Publicación inactiva</p>';
    }



    echo "</div>";
    echo "</div>";
?>