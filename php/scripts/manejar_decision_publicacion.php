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

                $sql_vigencias = "SELECT fecha_inicio, fecha_fin FROM propiedades WHERE id = $_SESSION[selected_publicacion]";
                $result_vigencias = $conn->query($sql_vigencias);
                $row_vigencias = $result_vigencias->fetch_assoc();

                // Creacion del evento que controla la vigencia de la publicación
                if (isset($row_vigencias["fecha_inicio"]) || isset($row_vigencias["fecha_fin"])) {
                    $nombreEventoVigencia = "actualizar_vigencia_" . time();
                    $nombreEventoVigencia2 = "actualizar_vigencia_" . (time() + 1);
                    $id_publicacion = $_SESSION['selected_publicacion'];
                    // Inicio de vigencia
                    if (isset($row_vigencias["fecha_inicio"]) && !empty($row_vigencias["fecha_inicio"])) {
                        // Desactivar la publicacion si se establecio un inicio de la vigencia
                        $sql_desactivar_vigencia = "UPDATE propiedades SET activa = 0 WHERE id = '$id_publicacion'";
                        $conn->query($sql_desactivar_vigencia);
                        $eventoVigencia = "
                            CREATE EVENT $nombreEventoVigencia
                            ON SCHEDULE AT '$row_vigencias[fecha_inicio]'
                            DO
                            BEGIN
                                UPDATE propiedades SET activa = 1 WHERE id = '$id_publicacion';
                            END;";
                        $conn->query($eventoVigencia);
                    }
                    // Fin de vigencia
                    if (isset($row_vigencias["fecha_fin"]) && !empty($row_vigencias["fecha_fin"])) {
                        $eventoVigencia2 = "
                            CREATE EVENT $nombreEventoVigencia2
                            ON SCHEDULE AT '$row_vigencias[fecha_inicio]'
                            DO
                            BEGIN
                                UPDATE propiedades SET activa = 0 WHERE id = '$id_publicacion';
                            END;";
                        $conn->query($eventoVigencia2);
                    }
                }

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