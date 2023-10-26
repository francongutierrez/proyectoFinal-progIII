<?php

    if (isset($_POST["editarResena"])) {
        include 'scripts/conexion_db.php';

        $nueva_descripcion_resena = $_POST['nuevaDescripcion'];
        $nuevo_puntaje_resena = $_POST['nuevoPuntaje'];
        $fecha_actual = date("Y-m-d");
    
        $sql_editar_resena = "UPDATE reseñas SET descripcion = ?, puntaje = ?, fecha = ? WHERE id_usuario = ? AND id_propiedad = ?";
        $stmt_editar_resena = $conn->prepare($sql_editar_resena);
        $stmt_editar_resena->bind_param("sdsii", $nueva_descripcion_resena, $nuevo_puntaje_resena, $fecha_actual, $_SESSION['id_usuario'], $_SESSION['selected_publicacion']);
        
    
        if ($stmt_editar_resena->execute()) {
            echo 
            '<div class="row">
                <div class="col mensajeActualizacion">
                    <h6>Se ha actualizado tu reseña</h6>
                </div>
            </div>';
        } else {
            echo 
            '<div class="row">
                <div class="col mensajeErrorActualizacion">
                    <h6>Se ha actualizado tu reseña</h6>
                </div>
            </div>';
        }

        $stmt_editar_resena->close();
        $conn->close();

    }

?>