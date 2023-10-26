<?php
    
    $fechaObjeto = new DateTime($row['fecha']);
    $fechaFormateada = $fechaObjeto->format("d-m-Y");
    $imagen_codificada = base64_encode($row['foto']);



    echo "<div class='card mt-3 mb-3'>";
    echo "<div class='card-header'>";
    echo '<img src="data:image/jpeg;base64,' . $imagen_codificada . '" alt="Foto de perfil" class="profile-image">';
    echo "<h4>" . $row['nombre'] . " " . $row['apellido'] . "</h4>";
    echo "</div>"; // Cierre del div con class='card-header'
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'> Puntaje: ". $row['puntaje'] . "</h5>";
    echo "<h6 class='card-title'>". $fechaFormateada ."</h6>";
    echo "<h6 class='card-title'>" . $row['descripcion'] . "</h6>";


    if (!empty($row['respuesta'])) {
        echo "<span><h6 class='card-title mt-3'>Yo: </h6> <p id='respuestaGuardada'>" . $row['respuesta'] . "</p></span>";

        // Opcion para editar respuesta si el dueño es el usuario
        if ($_SESSION["id_usuario"] == $row["id_dueno"]) {
            echo '<h6>Deseas editar tu respuesta?:</h6>';
            echo '<form method="POST">';
            echo '
            <textarea type="number" class="form-control mb-3" name="nuevaRespuesta" placeholder="Escriba la nueva respuesta aquí"></textarea>
            <input type="hidden" name="id_usuario_resena" value="'.$row["id_usuario"].'">
            <button type="submit" class="btn btn-success" name="editarRespuesta">Guardar respuesta</button>
            ';
            echo '</form>';
        }

    // El dueño no ha respondido
    } else {
        echo '<h5>Responder a la reseña:</h5>';
        echo '<form method="POST">';
        echo '
        <textarea type="number" class="form-control mb-3 mt-3" name="nuevaRespuesta" placeholder="Escriba su respuesta aquí"></textarea>
        <input type="hidden" name="id_usuario_resena" value="'.$row["id_usuario"].'">
        <button type="submit" class="btn btn-success" name="editarRespuesta">Guardar respuesta</button>
        ';
        echo '</form>';
    }
    

    echo "</div>"; // Cierre de card-body
    echo "</div>"; // Cierre de card




?>