<?php


    if (isset($_POST["aceptar"])) {
        include '../php/scripts/conexion_db.php';
        $id_usuario_ofertante = $_POST['id_usuario_ofertante'];


        // Iniciar la transacción
        $conn->begin_transaction();

        // Preparar y ejecutar la primera consulta
        $sql_decision1 = "UPDATE propiedades SET activa = 0 WHERE propiedades.id = ?";
        $stmt_decision1 = $conn->prepare($sql_decision1);
        $stmt_decision1->bind_param("i", $_SESSION["selected_publicacion"]);
        $execute1 = $stmt_decision1->execute();

        // Preparar y ejecutar la segunda consulta
        $sql_decision2 = "UPDATE alquileres SET estado = 'activo' WHERE alquileres.id_usuario = ? AND alquileres.id_propiedad = ?";
        $stmt_decision2 = $conn->prepare($sql_decision2);
        $stmt_decision2->bind_param("ii", $id_usuario_ofertante, $_SESSION["selected_publicacion"]);
        $execute2 = $stmt_decision2->execute();


        if ($execute1 && $execute2) {
            echo '<script>window.location.href = "http://localhost/ProgramacionIII/proyectoFinal/php/publicacion_exitosa.php"</script>';
        } else {
            $conn->rollback();
            echo '<script>window.location.href = "http://localhost/ProgramacionIII/proyectoFinal/php/error_alquiler.php"</script>';
        }

        // Confirmar la transacción
        $conn->commit();

        $stmt_desicion->close();
        $conn->close();

    }

    if (isset($_POST["rechazar"])) {
        include '../php/scripts/conexion_db.php';
        $id_usuario_ofertante = $_POST['id_usuario_ofertante'];


        // Iniciar la transacción
        $conn->begin_transaction();


        // Preparar y ejecutar la segunda consulta
        $sql_decision2 = "UPDATE alquileres SET estado = 'rechazado' WHERE alquileres.id_usuario = ? AND alquileres.id_propiedad = ?";
        $stmt_decision2 = $conn->prepare($sql_decision2);
        $stmt_decision2->bind_param("ii", $id_usuario_ofertante, $_SESSION["selected_publicacion"]);
        $execute2 = $stmt_decision2->execute();


        if ($execute2) {
            echo '<script>window.location.href = "http://localhost/ProgramacionIII/proyectoFinal/php/publicacion_exitosa.php"</script>';
        } else {
            $conn->rollback();
            echo '<script>window.location.href = "http://localhost/ProgramacionIII/proyectoFinal/php/error_alquiler.php"</script>';
        }

        // Confirmar la transacción
        $conn->commit();

        $stmt_desicion->close();
        $conn->close();

    }


?>