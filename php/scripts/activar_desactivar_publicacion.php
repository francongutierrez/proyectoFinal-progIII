<?php
    if (isset($_POST["verMas"])) {
        if (isset($_POST['id_publicacion'])) {
            $_SESSION['selected_publicacion'] = $_POST['id_publicacion'];
            echo "<script> window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/detalles_mi_publicacion.php' </script>";
        }
    }
    if (isset($_POST['activar'])) {
        include 'conexion_db.php';
        $sql_activar = "UPDATE propiedades SET activa = 1 WHERE id = ? ";
        $stmt_activar = $conn->prepare($sql_activar);
        $stmt_activar->bind_param("i", $_SESSION['selected_publicacion']);
        $stmt_activar->execute();
        $conn->close();
        $stmt_activar->close();
        "<script> window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/mis_alquileres.php' </script>";
        $cambio == 1;
        echo "<p>Se activo la propiedad</p>";
    }
    if (isset($_POST['desactivar'])) {
        include 'conexion_db.php';
        $sql_desactivar = "UPDATE propiedades SET activa = 0 WHERE id = ? ";
        $stmt_desactivar = $conn->prepare($sql_desactivar);
        $stmt_desactivar->bind_param("i", $_SESSION['selected_publicacion']);
        $stmt_desactivar->execute();
        $conn->close();
        $stmt_desactivar->close();
        "<script> window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/mis_alquileres.php' </script>";
        $cambio == 0;
        echo "<p>Se desactivo la propiedad</p>";
    }


?>