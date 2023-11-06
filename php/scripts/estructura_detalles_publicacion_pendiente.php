<?php
    $etiquetas = '';
    if ($row['etiquetas'] != null) {
        $palabras = explode(" ", $row['etiquetas']); 
        foreach ($palabras as &$palabra) {
            $palabra = ' ' . '#' . $palabra;
        }
        $etiquetas = implode("", $palabras);
    }

    $fechaInicioVigenciaFormateada = date("d/m/Y", strtotime($row['fecha_inicio']));
    $fechaFinVigenciaFormateada = date("d/m/Y", strtotime($row['fecha_fin']));


    echo "<div class='container'>";
    echo "<div class='row'>";
    echo "<div class='col'>";
    echo "<h1 class='mb-3'>".$row['titulo']."</h1>";
    echo "</div>";
    echo "</div>";
    echo "<div class='row'>";
    echo "<div class='col'>";
    echo "<p><span class='titular'>Descripción: </span>".$row['descripcion']."</p>";
    echo "</div>";
    echo "</div>";
    echo "<div class='row'>";
    echo "<div class='col'>";
    echo "<p id='ubicacionShow'><span class='titular'>Ubicación: </span>".$row['ubicacion']."</p>";
    echo "</div>";
    echo "</div>";
    echo "<div class='row'>";
    echo     "<div class='col'>";
    if ($etiquetas != "") {
        echo         "<p id='etiquetasShow'><span class='titular'>Etiquetas:</span> ".$etiquetas."</p>";
    }

    echo     "</div>";
    echo "</div>";
    echo "<div class='row'>";
    echo     "<div class='col-md-6'>";
    echo         "<p><span class='titular'>Tiempo mínimo:</span> ".$row['tiempo_minimo']." día/s</p>";
    echo     "</div>";
    echo     "<div class='col-md-6'>";
    echo         "<p><span class='titular'>Tiempo máximo:</span> ".$row['tiempo_maximo']." día/s</p>";
    echo     "</div>";
    echo "</div>";
    echo "<div class='row'>";
    echo     "<div class='col text-center'>";
    echo        "<p>Haga click en la imagen para ampliarla o sobre ella para cerrarla.</p>";
    echo         "<p>";
        include "scripts/display_fotos.php";
    echo        "</p>";
    echo     "</div>";
    echo "</div>";
    echo "<div class='row'>";
    echo     "<div class='col'>";
    echo         "<p> <span class='titular'>Servicios incluidos:</span> ";
        include "scripts/display_servicios.php";
    echo        "</p>";
    echo     "</div>";
    echo "</div>";
    echo "<div class='row'>";
    echo     "<div class='col'>";
    echo         "<p><span class='titular'>Costo por día: </span> $".$row['costo']."</p>";
    echo     "</div>";
    echo "</div>";
    echo "<div class='row'>";
    echo     "<div class='col'>";
    echo         "<p><span class='titular'>Tipo de propiedad:</span> ".$row['tipo']."</p>";
    echo     "</div>";
    echo "</div>";
    echo "<div class='row'>";
    echo     "<div class='col'>";
    echo         "<p><span class='titular'>Cupo máximo:</span> ".$row['cupo']." personas</p>";
    echo     "</div>";
    echo "</div>";

    if ($row["fecha_inicio"] != "") {
        echo "<div class='row'>";
        echo     "<div class='col'>";
        echo         "<p><span class='titular'>Fecha de inicio de la oferta:</span> ".$fechaInicioVigenciaFormateada."</p>";
        echo     "</div>";
        echo "</div>";
    }
    if ($row["fecha_fin"] != "") {
        echo "<div class='row'>";
        echo     "<div class='col'>";
        echo         "<p><span class='titular'>Fecha de fin de la oferta:</span> ".$fechaFinVigenciaFormateada."</p>";
        echo     "</div>";
        echo "</div>";
    }



    echo "<div class='row'>";
    echo     "<div class='col botones'>";
    echo "<h6 class='mensajeAtencion'>ATENCIÓN: Esta acción no puede deshacerse</h6>";
    echo "<form method='POST'>";
    echo         "<button type='submit' name='activar' class='btn btn-success'>";
    echo             "Activar propiedad";
    echo         "</button>";
    echo         "<button type='submit' name='rechazar' class='btn btn-danger'>";
    echo             "Rechazar publicación";
    echo         "</button>";
    echo "</form>";
    echo         "<button class='btn btn-outline-success'>";
    echo             "<a href='javascript:history.back()'>Volver a publicaciones pendientes</a>";
    echo         "</button>";
    echo     "</div>";
    echo "</div>";
    echo "</div>";

    $_SESSION["cantidadMinimaDeDias"] = $row["tiempo_minimo"];
    $_SESSION["cantidadMaximaDeDias"] = $row["tiempo_maximo"];


?>

