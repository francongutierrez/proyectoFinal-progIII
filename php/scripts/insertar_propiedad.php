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

            
                $sql = "INSERT INTO propiedades(titulo, descripcion, ubicacion, etiquetas, costo, tiempo_minimo, tiempo_maximo, cupo, id_dueno, tipo, activa, fecha_inicio, fecha_fin, estado) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssiiiiisisss", $titulo, $descripcion, $ubicacion, $etiquetas, $costo, $tiempo_minimo, $tiempo_maximo, $cupo, $id_dueno, $tipo, $activa, $inicioVigencia, $finVigencia, $estado);
            
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



                    $stmt2->close();

                    if ($_SESSION['certificacion'] == 1) {
                        echo "<script>
                        window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/publicacion_exitosa.php';
                        </script>";
                    } else {
                        echo "<script>
                        window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/exito_publicacion_pendiente.php';
                        </script>";
                    }          

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