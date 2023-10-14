<?php
    
    $fechaObjeto = new DateTime($row['fecha']);
    $fechaFormateada = $fechaObjeto->format("d-m-Y");
    $imagen_codificada = base64_encode($row['foto']);

    echo "<div class='card mt-3 mb-3'>";
    echo "<div class='card-header'>";
    echo '<img src="data:image/jpeg;base64,' . $imagen_codificada . '" alt="Foto de perfil" class="profile-image">';
    echo "<h4>" . $row['nombre'] . " " . $row['apellido'] . "</h4>";
    echo "</div>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'> Puntaje: ". $row['puntaje'] . "</h5>";
    echo "<h6 class='card-title'>". $fechaFormateada ."</h6>";
    echo "<h6 class='card-title'>" . $row['descripcion'] . "</h6>";

    if (!empty($row['respuesta'])) {
        echo "<h6 class='card-title'>Dueño: </h6> <p>" . $row['respuesta'] . "</p>"; 
    } else {}

    echo "</div>";
    echo "</div>";
?>