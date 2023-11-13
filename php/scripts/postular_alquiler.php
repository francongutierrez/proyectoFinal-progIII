<?php


    if (isset($_POST["enviarPostulacion"]) && $_SESSION["certificacion"] == 1) {
        include '../php/scripts/conexion_db.php';
        $estado = 'activo';
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];
        $fechaInicioDate = new DateTime($fechaInicio);
        $fechaFinDate = new DateTime($fechaFin);

        // Controlar el maximo y minimo de dias
        $intervalo = $fechaInicioDate->diff($fechaFinDate);
        $intervaloDias = $intervalo->days;

        if ($intervaloDias < $_SESSION["cantidadMinimaDeDias"] || $intervaloDias > $_SESSION["cantidadMaximaDeDias"]) {
            echo '<div class="container"><h6 class="mensajeErrorDias">Eligió un intervalo incorrecto. La cantidad mínima de días que admite esta publicación es de '.$_SESSION["cantidadMinimaDeDias"].' y la máxima es de '.$_SESSION["cantidadMaximaDeDias"].'</h6></div>';
        } else {      
            $sql_alquilar = "INSERT INTO alquileres(id_usuario, id_propiedad, estado, fecha_inicio, fecha_fin) VALUES (?,?,?,?,?)";
            $stmt_alquilar = $conn->prepare($sql_alquilar);
            $stmt_alquilar->bind_param("iisss", $_SESSION["id_usuario"], $_SESSION["selected_publicacion"], $estado, $fechaInicio, $fechaFin);
            
            if ($stmt_alquilar->execute()) {
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

    }
    if (isset($_POST["enviarPostulacion"]) && $_SESSION["certificacion"] == 0) {
        include '../php/scripts/conexion_db.php';
        $estado = 'pendiente';
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];
        $fechaInicioDate = new DateTime($fechaInicio);
        $fechaFinDate = new DateTime($fechaFin);
        $nombreEvento = "evento_rechazar_automaticamente_" . time();


        // Controlar el maximo y minimo de dias
        $intervalo = $fechaInicioDate->diff($fechaFinDate);
        $intervaloDias = $intervalo->days;

        if ($intervaloDias < $_SESSION["cantidadMinimaDeDias"] || $intervaloDias > $_SESSION["cantidadMaximaDeDias"]) {
            echo '<div class="container"><h6 class="mensajeErrorDias">Eligió un intervalo incorrecto. La cantidad mínima de días que admite esta publicación es de '.$_SESSION["cantidadMinimaDeDias"].' y la máxima es de '.$_SESSION["cantidadMaximaDeDias"].'</h6></div>';
        } else {
            $sql_alquilar = "INSERT INTO alquileres(id_usuario, id_propiedad, estado, fecha_inicio, fecha_fin) VALUES (?,?,?,?,?)";
            $stmt_alquilar = $conn->prepare($sql_alquilar);
            $stmt_alquilar->bind_param("iisss", $_SESSION["id_usuario"], $_SESSION["selected_publicacion"], $estado, $fechaInicio, $fechaFin);

            // Definir el cuerpo del evento
            $eventoSQL = "

            CREATE EVENT $nombreEvento
            ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 3 DAY
            DO
            BEGIN
                -- Almacena el resultado de la consulta en una variable
                SET @condicion_estado = (SELECT estado FROM alquileres WHERE id_usuario = {$_SESSION['id_usuario']} AND id_propiedad = {$_SESSION['selected_publicacion']});
            
                -- Verifica si el resultado de la consulta cumple con la condición deseada
                IF @condicion_estado = 'pendiente' THEN
                    -- Actualiza el estado si la condición es verdadera
                    UPDATE alquileres SET estado = 'rechazada' WHERE id_usuario = {$_SESSION['id_usuario']} AND id_propiedad = {$_SESSION['selected_publicacion']};
                END IF;
            END;                 
                
            ";        
            
            if ($stmt_alquilar->execute() && $conn->query($eventoSQL) == TRUE) {
                echo "<script>
                window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/exito_postulacion.php';
                </script>";
            } else {
                echo "<script>
                window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/error_al_alquilar.php';
                </script>";
            }

            $stmt_alquilar->close();
            $conn->close();
        }

    }



    


?>