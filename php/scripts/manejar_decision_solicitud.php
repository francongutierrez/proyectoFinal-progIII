<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['aceptar'])) {
            // Si el usuario eligio una fecha de vencimiento
            if ($_POST['vencimiento'] != null) {
                include 'conexion_db.php';
                $id_usuario_solicitud = $_POST['id_usuario'];
                $vencimiento_verificacion = $_POST['vencimiento'];

                $sql_aceptar = "UPDATE solicitudes_de_verificacion 
                SET estado = 'aceptada'
                WHERE id_usuario = $id_usuario_solicitud";
                $conn->query($sql_aceptar);

                $sql_aceptar2 = "UPDATE usuarios 
                SET certificacion = 1,
                    certificacion_en_proceso = 0,
                    vencimiento_verificacion = '$vencimiento_verificacion'
                WHERE id = $id_usuario_solicitud";
                $conn->query($sql_aceptar2);

                $sql_aceptar3 = "UPDATE propiedades 
                SET dueno_certificado = 1
                WHERE id_dueno = $id_usuario_solicitud";
                $conn->query($sql_aceptar3);

                $conn->close();

                echo "<script>
                window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/exito_validacion.php';
                </script>";
            }
            // Si el usuario no eligio una fecha de vencimiento (validar)
            else {
                echo '<h6 class="mensajeError">No ha elegido una fecha de vencimiento para la solicitud</h6>';
            }
        }
        if (isset($_POST['rechazar'])) {
            include 'conexion_db.php';
            $id_usuario_solicitud = $_POST['id_usuario'];

            $sql_aceptar = "UPDATE solicitudes_de_verificacion 
            SET estado = 'rechazada'
            WHERE id_usuario = $id_usuario_solicitud";
            $conn->query($sql_aceptar);

            $sql_aceptar2 = "UPDATE usuarios 
            SET certificacion_en_proceso = 0
            WHERE id = $id_usuario_solicitud";
            $conn->query($sql_aceptar2);

            $conn->close();

            echo "<script>
            window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/exito_validacion_rechazar.php';
            </script>";
        }
    }


?>