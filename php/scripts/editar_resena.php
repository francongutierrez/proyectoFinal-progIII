<?php

    
    if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["editarResena"])) {
            include 'scripts/conexion_db.php';
    
            $nueva_descripcion_resena = $_POST['nuevaDescripcion'];
            $nuevo_puntaje_resena = $_POST['nuevoPuntaje'];
    
            // Validaciones de los campos ingresados por el usuario
            if (strlen($nueva_descripcion_resena) > 300 || strlen($nueva_descripcion_resena) < 3 || empty($nueva_descripcion_resena)) {
                echo '<h6 class="mensajeErrorResena">La descripción de la reseña debe tener entre 3 y 300 caracteres.</h6>';
            } elseif ($nuevo_puntaje_resena < 1 || $nuevo_puntaje_resena > 5) {
                echo '<h6 class="mensajeErrorResena">El puntaje de la reseña debe estar entre 1 y 5.</h6>';
            } else {
                $fecha_actual = date("Y-m-d");
        
                $sql_editar_resena = "UPDATE reseñas SET descripcion = ?, puntaje = ?, fecha = ? WHERE id_usuario = ? AND id_propiedad = ?";
                $stmt_editar_resena = $conn->prepare($sql_editar_resena);
                $stmt_editar_resena->bind_param("sdsii", $nueva_descripcion_resena, $nuevo_puntaje_resena, $fecha_actual, $_SESSION['id_usuario'], $_SESSION['selected_publicacion']);
                
            
                if ($stmt_editar_resena->execute()) {
                    echo 
                    '<div class="row">
                        <div class="col mensajeActualizacion">
                            <h6>Se ha actualizado tu reseña. Actualice la página para ver los cambios</h6>
                        </div>
                    </div>';
                } else {
                    echo 
                    '<div class="row">
                        <div class="col mensajeErrorActualizacion">
                            <h6 class="mensajeErrorResena">Error al actualizar la reseña</h6>
                        </div>
                    </div>';
                }
        
                $stmt_editar_resena->close();
                $conn->close();
            }
        }
    }


?>