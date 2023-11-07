<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['activar'])) {
            // Si el usuario eligio una fecha de vencimiento

                include 'conexion_db.php';

                $sql_aceptar = "UPDATE propiedades 
                SET estado = 'activa',
                    activa = 1
                WHERE id = $_SESSION[selected_publicacion]";
                $conn->query($sql_aceptar);

                $conn->close();

                echo "<script>
                window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/exito_publicacion_aceptada.php';
                </script>";

            // Si el usuario no eligio una fecha de vencimiento (validar)

        }
        if (isset($_POST['rechazar'])) {

            include 'conexion_db.php';

            $sql_rechazar = "UPDATE propiedades 
            SET estado = 'rechazada',
                activa = 0
            WHERE id = $_SESSION[selected_publicacion]";
            $conn->query($sql_rechazar);

            $conn->close();


            echo "<script>
            window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/exito_rechazar_publicacion.php';
            </script>";
        }
    }


?>