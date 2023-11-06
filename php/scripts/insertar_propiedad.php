<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['publicar'])) {
            extract($_POST);
            include 'validar_publicacion.php';

            if ($validado) {

                include 'scripts/conexion_db.php';
            
                $contador = 0;
                $id_dueno = $_SESSION['id_usuario'];

                if ($_SESSION['certificacion'] == 1) {
                    $activa = 1;
                    $estado = 'activa';
                } else {
                    $activa = 0;
                    $estado = 'pendiente';
                }

            
                $sql = "INSERT INTO propiedades(titulo, descripcion, ubicacion, costo, tiempo_minimo, tiempo_maximo, cupo, id_dueno, tipo, activa, fecha_inicio, fecha_fin, estado) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssiiiiisis", $titulo, $descripcion, $ubicacion, $costo, $tiempo_minimo, $tiempo_maximo, $cupo, $id_dueno, $tipo, $activa, $inicioVigencia, $finVigencia, $estado);
            
                if ($stmt->execute()) {
                    $contador++;
                    $id_publicacion = $conn->insert_id;
                    
                    // Insercion de las imagenes en la DB
                    for ($i = 0; $i < count($_FILES['fotos']['name']); $i++) {
                        $nombre_imagen = $_FILES['fotos']['name'][$i];
                        $tipo_mimetype = $_FILES['fotos']['type'][$i];
                        $datos_imagen = file_get_contents($_FILES['fotos']['tmp_name'][$i]);
                    
                    
                        // Inserta los campos y la imagen en la base de datos
                        $sql2 = "INSERT INTO imagenes (nombre, tipo_mimetype, datos, id_propiedad) VALUES (?, ?, ?, ?)";
                        $stmt2 = $conn->prepare($sql2);
                        $stmt2->bind_param("sssi", $nombre_imagen, $tipo_mimetype, $datos_imagen, $id_publicacion);
                        $stmt2->execute();
                    }

                    // Insercion de servicios en la tabla incluye
                    include "insertar_incluye.php";

                    // Creacion del evento que controla la vigencia de la publicación
                    if (isset($_POST["inicioVigencia"]) || isset($_POST["finVigencia"])) {
                        $nombreEventoVigencia = "actualizar_vigencia_" . time();
                        $nombreEventoVigencia2 = "actualizar_vigencia_" . (time() + 1);

                        // Inicio de vigencia
                        if (isset($_POST["inicioVigencia"]) && !empty($_POST["inicioVigencia"])) {

                            // Desactivar la publicacion si se establecio un inicio de la vigencia
                            $sql_desactivar_vigencia = "UPDATE propiedades SET activa = 0 WHERE id = '$id_publicacion'";
                            $conn->query($sql_desactivar_vigencia);

                            $eventoVigencia = "
                                CREATE EVENT $nombreEventoVigencia
                                ON SCHEDULE AT '$inicioVigencia'
                                DO
                                BEGIN
                                    UPDATE propiedades SET activa = 1 WHERE id = '$id_publicacion';
                                END;";
                            $conn->query($eventoVigencia);
                        }

                        // Fin de vigencia
                        if (isset($_POST["finVigencia"]) && !empty($_POST["finVigencia"])) {
                            $eventoVigencia2 = "
                                CREATE EVENT $nombreEventoVigencia2
                                ON SCHEDULE AT '$finVigencia'
                                DO
                                BEGIN
                                    UPDATE propiedades SET activa = 0 WHERE id = '$id_publicacion';
                                END;";
                            $conn->query($eventoVigencia2);
                        }
                    }

                    $stmt2->close();
            
                    echo "<script>
                    window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/publicacion_exitosa.php';
                    </script>";
                } else {
                    echo "<script>
                    window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/error_al_publicar.php';
                </script>";
                }
            
                $stmt->close();
                $conn->close();
            
            }
        }
    }


?>