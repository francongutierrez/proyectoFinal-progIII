<?php


    if (isset($_POST["aceptar"])) {
        include '../php/scripts/conexion_db.php';
        $id_usuario_ofertante = $_POST['id_usuario_ofertante'];


        // Preparar y ejecutar la segunda consulta
        $sql_decision = "UPDATE alquileres SET estado = 'activo' WHERE alquileres.id_usuario = ? AND alquileres.id_propiedad = ? AND estado = 'pendiente'";
        $stmt_decision = $conn->prepare($sql_decision);
        $stmt_decision->bind_param("ii", $id_usuario_ofertante, $_SESSION["selected_publicacion"]);
        $execute = $stmt_decision->execute();


        if ($execute) {
            echo '<script>window.location.href = "http://localhost/ProgramacionIII/proyectoFinal/php/exito_aceptar.php"</script>';
        } else {
            $conn->rollback();
            echo '<script>window.location.href = "http://localhost/ProgramacionIII/proyectoFinal/php/error_aceptar.php"</script>';
        }

        $stmt_desicion->close();
        $conn->close();

    }

    if (isset($_POST["rechazar"])) {
        include '../php/scripts/conexion_db.php';
        $id_usuario_ofertante = $_POST['id_usuario_ofertante'];


        // Iniciar la transacción
        $conn->begin_transaction();


        // Preparar y ejecutar la segunda consulta
        $sql_decision = "UPDATE alquileres SET estado = 'rechazado' WHERE alquileres.id_usuario = ? AND alquileres.id_propiedad = ? AND estado = 'pendiente'";
        $stmt_decision = $conn->prepare($sql_decision);
        $stmt_decision->bind_param("ii", $id_usuario_ofertante, $_SESSION["selected_publicacion"]);
        $execute = $stmt_decision->execute();


        if ($execute) {
            echo '<script>window.location.href = "http://localhost/ProgramacionIII/proyectoFinal/php/exito_rechazar.php"</script>';
        } else {
            $conn->rollback();
            echo '<script>window.location.href = "http://localhost/ProgramacionIII/proyectoFinal/php/error_rechazar.php"</script>';
        }

        // Confirmar la transacción
        $conn->commit();

        $stmt_desicion->close();
        $conn->close();

    }


?>