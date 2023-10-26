<?php


    if (isset($_POST["postular-alquiler"]) && $_SESSION["certificacion"] == 1) {
        include '../php/scripts/conexion_db.php';
        $estado = 'activo';

        $sql_alquilar = "INSERT INTO alquileres(id_usuario, id_propiedad, estado) VALUES (?,?,?)";
        $stmt_alquilar = $conn->prepare($sql_alquilar);
        $stmt_alquilar->bind_param("iis", $_SESSION["id_usuario"], $_SESSION["selected_publicacion"], $estado);
        
        if ($stmt_alquilar->execute()) {
            echo "<script>
            window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/exito_postulacion.php';
            </script>";
        } else {
            echo "<script>
            window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/error_postulacion.php';
            </script>";
        }

        $stmt_alquilar->close();
        $conn->close();

    }
    if (isset($_POST["postular-alquiler"]) && $_SESSION["certificacion"] == 0) {
        include '../php/scripts/conexion_db.php';
        $estado = 'pendiente';

        $sql_alquilar = "INSERT INTO alquileres(id_usuario, id_propiedad, estado) VALUES (?,?,?)";
        $stmt_alquilar = $conn->prepare($sql_alquilar);
        $stmt_alquilar->bind_param("iis", $_SESSION["id_usuario"], $_SESSION["selected_publicacion"], $estado);

        // Definir el cuerpo del evento
        $eventoSQL = "        
        CREATE EVENT evento_rechazar_automaticamente
        ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 3 DAY
        DO
        BEGIN
            DECLARE condicion_estado VARCHAR(10);
        
            -- Realiza una consulta y almacena el resultado en la variable condicion_estado
            SELECT estado INTO condicion_estado FROM alquileres WHERE id_usuario = {$_SESSION['id_usuario']} AND id_propiedad = {$_SESSION['selected_publicacion']};
        
            -- Verifica si el resultado de la consulta cumple con la condición deseada
            IF condicion_estado = 'pendiente' THEN
                -- Código a ejecutar si el resultado de la consulta es verdadero
                UPDATE alquileres SET estado = 'rechazada' WHERE id_usuario = {$_SESSION['id_usuario']} AND id_propiedad = {$_SESSION['selected_publicacion']};
            END IF;
        END;
        ";        
        
        if ($stmt_alquilar->execute() && $conn->query($eventoSQL) == TRUE) {
            echo "<script>
            window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/exito_alquiler.php';
            </script>";
        } else {
            echo "<script>
            window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/error_al_alquilar.php';
            </script>";
        }

        $stmt_alquilar->close();
        $conn->close();


    }



    


?>