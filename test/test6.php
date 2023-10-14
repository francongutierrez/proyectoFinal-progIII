<?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include '../php/scripts/conexion_db.php';

            extract($_POST);
        
            $actualizaciones = array();
        
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
                $actualizaciones[] = "contrasena = '$contrasena'";
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
        
            if (!empty($actualizaciones)) {
                $actualizaciones[] = "certificacion = 0";
                $actualizaciones[] = "certificacion_en_progreso = 0";
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
        } else {
            echo "<h1>World</h1>";
        }


?>