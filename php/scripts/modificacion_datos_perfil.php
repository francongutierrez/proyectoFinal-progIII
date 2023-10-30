<?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST['actualizar'])) {
                extract($_POST);

                include 'validar_actualizacion_datos.php';

                if ($validado) {
                    include '../php/scripts/conexion_db.php';
                
                    $actualizaciones = array();
                    $false = 0;
                
                    // Validar campos
                    if (!empty($nombre)) {
                        $_SESSION['nombre_usuario'] = $nombre;
                        $actualizaciones[] = "nombre = '$nombre'";
                    }
                    if (!empty($apellido)) {
                        $actualizaciones[] = "apellido = '$apellido'";
                    }
                    if (!empty($ciudad)) {
                        $actualizaciones[] = "ciudad = '$ciudad'";
                    }
                    if (!empty($email)) {
                        $actualizaciones[] = "email = '$email'";
                    }
                    if (!empty($contrasena)) {
                        $contrasena_hasheada = password_hash($contrasena, PASSWORD_DEFAULT);
                        $actualizaciones[] = "contrasena = '$contrasena_hasheada'";
                    }
                    if (!empty($telefono)) {
                        $actualizaciones[] = "telefono = '$telefono'";
                    }
                    if (!empty($intereses)) {
                        $actualizaciones[] = "intereses = '$intereses'";
                    }
                    if (!empty($bio)) {
                        $actualizaciones[] = "bio = '$bio'";
                    }


                    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
                        $foto = file_get_contents($_FILES['foto']['tmp_name']);
                        $actualizaciones[] = "foto = '$foto'";
                    }

                    // Validacion del email ingresado
                    $query_email = "SELECT email FROM usuarios WHERE email = '$email'";
                    $result_email = $conn->query($query_email);


                    if ($result_email->num_rows > 0) {
                        echo "<script>
                        window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/error_email.php';
                        </script>";
                    } else {
                        if (!empty($actualizaciones)) {
                            $actualizaciones[] = "certificacion = '$false'";
                            $actualizaciones[] = "certificacion_en_proceso = '$false'";
                            $query = "UPDATE usuarios SET " . implode(", ", $actualizaciones). "WHERE id = $_SESSION[id_usuario]";
                    
                            if (mysqli_query($conn, $query)) {
                                echo "<script>
                                window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/publicacion_exitosa.php';
                                </script>";
                            } else {
                                echo "<script>
                                window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/error_alquiler.php';
                                </script>";
                            }
                        }
                    
                        mysqli_close($conn);
                    }
                }
            }
        }

?>