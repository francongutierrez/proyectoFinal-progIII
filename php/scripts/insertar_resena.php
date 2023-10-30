<?php

    if (isset($_POST["guardar-resena"])) {


        $descripcion_resena = $_POST['resena-usuario'];
        $puntaje_resena = $_POST['puntaje-resena-usuario'];
        $fecha_actual = date("Y-m-d");

        // Validaciones de los campos ingresados por el usuario
        if (strlen($descripcion_resena) > 300 || strlen($descripcion_resena) < 3) {
            echo '<h6 class="mensajeErrorResena">La descripción de la reseña debe tener entre 3 y 300 caracteres.</h6>';
        } elseif ($puntaje_resena < 1 || $puntaje_resena > 5) {
            echo '<h6 class="mensajeErrorResena">El puntaje de la reseña debe estar entre 1 y 5.</h6>';
        } else {
            include 'scripts/conexion_db.php';

            $sql_insertar_resena = "INSERT INTO reseñas(id_usuario, id_propiedad, puntaje, descripcion, fecha) VALUES (?,?,?,?,?)";
            $stmt_insertar_resena = $conn->prepare($sql_insertar_resena);
            $stmt_insertar_resena->bind_param("iidss", $_SESSION['id_usuario'], $_SESSION['selected_publicacion'], $puntaje_resena, $descripcion_resena, $fecha_actual);
            
        
            if ($stmt_insertar_resena->execute()) {
                echo "<script>
                window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/publicacion_exitosa.php';
                </script>";    
            } else {
                echo "<script>
                window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/error_alquiler.php';
                </script>";
            }
    
            $stmt_insertar_resena->close();
            $conn->close();
        }
    


    }

?>