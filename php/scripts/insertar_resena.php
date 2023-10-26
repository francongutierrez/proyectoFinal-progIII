<?php

    if (isset($_POST["guardar-resena"])) {
        include 'scripts/conexion_db.php';

        $descripcion_resena = $_POST['resena-usuario'];
        $puntaje_resena = $_POST['puntaje-resena-usuario'];
        $fecha_actual = date("Y-m-d");
    
        $sql_insertar_resena = "INSERT INTO reseñas(id_usuario, id_propiedad, puntaje, descripcion, fecha) VALUES (?,?,?,?,?)";
        $stmt_insertar_resena = $conn->prepare($sql_insertar_resena);
        $stmt_insertar_resena->bind_param("iidss", $_SESSION['id_usuario'], $_SESSION['selected_publicacion'], $puntaje_resena, $descripcion_resena, $fecha_actual);
        
    
        if ($stmt_insertar_resena->execute()) {
            echo "<script>
            window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/publicacion_exitosa.php';
            </script>";    
        } else {
            echo "<script>
            window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/error_alquiler.php';
            </script>";
        }

        $stmt_insertar_resena->close();
        $conn->close();

    }

?>