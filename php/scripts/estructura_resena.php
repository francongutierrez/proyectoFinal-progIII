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

    // Mostrar opcion para editar reseña si coincide con el id del usuario activo
    if ($row["id_usuario"] == $_SESSION["id_usuario"]) {
        echo '<button class="btn btn-success mt-3" onclick="mostrarFormReseña()"  id="editarResena">Editar reseña</button>';
        echo '<form method="POST" id="formResena">';
        echo '
        <input type="number" class="form-control mb-3" placeholder="Ingrese el nuevo puntaje aquí (Del 1 al 5)" min="1" max="5" name="nuevoPuntaje" id="puntajeResena" required>
        <textarea class="form-control mb-3" placeholder="Escriba la nueva reseña aquí" name="nuevaDescripcion" id="descripcionResena" maxlength="500" required></textarea>
        <input type="hidden" name="editarResena">
        <button type="submit" class="btn btn-success" name="editarResena">Guardar reseña</button>
        ';
        echo '</form>';        
    }


    if (!empty($row['respuesta'])) {
        echo "<span><h6 class='card-title'>Dueño: </h6> <p id='respuestaGuardada'>" . $row['respuesta'] . "</p></span>";
    }
    
    echo "</div>"; // Cierre de card-body
    echo "</div>"; // Cierre de card




?>