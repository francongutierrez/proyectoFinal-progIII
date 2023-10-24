<?php
    
    $fechaObjeto = new DateTime($row['fecha']);
    $fechaFormateada = $fechaObjeto->format("d-m-Y");
    $imagen_codificada = base64_encode($row['foto']);

    // Editar reseña si coincide con el id del usuario
    if ($row['id_usuario'] == $_SESSION['id_usuario']) {
        echo "<div class='card mt-3 mb-3'>";
        echo "<div class='card-header'>";
        echo '<img src="data:image/jpeg;base64,' . $imagen_codificada . '" alt="Foto de perfil" class="profile-image">';
        echo "<h4>" . $row['nombre'] . " " . $row['apellido'] . "</h4>";
        echo "</div>"; // Cierre del div con class='card-header'
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'> Puntaje: ". $row['puntaje'] . "</h5>";
        echo "<h6 class='card-title'>". $fechaFormateada ."</h6>";
        echo "<h6 class='card-title'>" . $row['descripcion'] . "</h6>";
        echo "<form id='formularioRespuesta'>";
        echo "<h6 class='card-title'>Editar reseña: </h6>";
        echo '<label>Nuevo puntaje:</label>';
        echo "<input type='text' class='form-control' name='nuevoPuntaje' id='nuevoPuntaje'>";
        echo '<label>Nuevo descripcion:</label>';
        echo "<input type='text' class='form-control' name='nuevaDescripcion' id='nuevaDescripcion'>";
        echo "<button type='button' class='btn btn-success mt-3' name='enviarNuevaReseña' onclick='cambiarRespuesta();'>Guardar respuesta</button>";
        echo "</form>"; // Cierre del formulario (form id='formularioRespuesta')
        
    } else {
        echo "<div class='card mt-3 mb-3'>";
        echo "<div class='card-header'>";
        echo '<img src="data:image/jpeg;base64,' . $imagen_codificada . '" alt="Foto de perfil" class="profile-image">';
        echo "<h4>" . $row['nombre'] . " " . $row['apellido'] . "</h4>";
        echo "</div>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'> Puntaje: ". $row['puntaje'] . "</h5>";
        echo "<h6 class='card-title'>". $fechaFormateada ."</h6>";
        echo "<h6 class='card-title'>" . $row['descripcion'] . "</h6>";
        echo '</div>';
        echo '</div>';
    }



    // Editar respuesta si esta cargada
    if (!empty($row['respuesta'])) {
        echo "<span id='ocultar'><h6 class='card-title'>Dueño: </h6> <p id='respuestaGuardada'>" . $row['respuesta'] . "</p></span>"; 
        if ($row['id_dueno'] == $_SESSION['id_usuario']) {
            echo '<button class="btn btn-success" id="editarRespuesta" onclick="mostrarForm();">Editar respuesta</button>';
            echo "<form id='formularioRespuesta'>";
            echo "<h6 class='card-title'>Editar respuesta: </h6>";
            echo "<input type='text' class='form-control' name='respuesta' id='nuevaRespuesta'>";
            echo "<button type='button' class='btn btn-success mt-3' name='enviarRespuesta' onclick='cambiarRespuesta();'>Guardar respuesta</button>";
            echo "</form>";
        }
        // Responder a la reseña
    } elseif ($row['id_dueno'] == $_SESSION['id_usuario']) {
        echo "<form>";
        echo "<h6 class='card-title'>Responder: </h6>";
        echo "<input type='text' name='respuesta' id='nuevaRespuesta'>";
        echo "<button type='button' class='btn btn-success mt-3' name='enviarRespuesta'  onclick='cambiarRespuesta();'>Guardar respuesta</button>";
        echo "</form>";
    }




    echo "</div>";
    echo "</div>";
?>