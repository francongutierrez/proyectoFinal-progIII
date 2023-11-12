<?php
    if (isset($_POST["verMas"])) {
        if (isset($_POST['id_publicacion'])) {
            $_SESSION['selected_publicacion'] = $_POST['id_publicacion'];
            echo "<script> window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/detalles_mi_publicacion.php' </script>";
        }
    }
    if (isset($_POST['activar'])) {
        // Si el usuario esta verificado, se activa la publicacion
        if ($_SESSION['certificacion'] == 1) {
            include 'conexion_db.php';
            $sql_activar = "UPDATE propiedades SET activa = 1, estado = 'activa' WHERE id = ? ";
            $stmt_activar = $conn->prepare($sql_activar);
            $stmt_activar->bind_param("i", $_POST['id_publicacion']);
            $stmt_activar->execute();
            $conn->close();
            $stmt_activar->close();
            "<script> window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/mis_alquileres.php' </script>";
            $cambio == 1;
            echo "<div class='row'><div class='col mensajeActivar'>";
            echo "<p>Se activo la propiedad</p>";
            echo "</div></div>";
        }
        // Si el usuario no esta verificado, la publicacion pasa a revision
        else {
            include 'conexion_db.php';
            $sql_activar = "UPDATE propiedades SET estado = 'pendiente' WHERE id = ?";
            $stmt_activar = $conn->prepare($sql_activar);
            $stmt_activar->bind_param("i", $_POST['id_publicacion']);
            $stmt_activar->execute();
            $conn->close();
            $stmt_activar->close();
            "<script> window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/mis_alquileres.php' </script>";
            $cambio == 1;
            echo "<div class='row'><div class='col mensajeActivar'>";
            echo "<p>La publicación será revisada por un administrador</p>";
            echo "</div></div>";
        }


    }
    if (isset($_POST['desactivar'])) {
        include 'conexion_db.php';
        $estado_desactivar = 'desactivada';
        $sql_desactivar = "UPDATE propiedades SET activa = 0, estado = ? WHERE id = ? ";
        $stmt_desactivar = $conn->prepare($sql_desactivar);
        $stmt_desactivar->bind_param("si", $estado_desactivar, $_POST['id_publicacion']);
        $stmt_desactivar->execute();
        $conn->close();
        $stmt_desactivar->close();
        "<script> window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/mis_alquileres.php' </script>";
        $cambio == 0;
        echo "<div class='row'><div class='col mensajeActivar'>";
        echo "<p>Se desactivo la propiedad</p>";
        echo "</div></div>";

    }


?>