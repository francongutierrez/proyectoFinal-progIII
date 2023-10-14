<?php

if (isset($_POST['enviarSolicitud'])) {
    extract($_POST);

    include 'scripts/conexion_db.php';


    $documentacion = file_get_contents($_FILES['documentacion']['tmp_name']);
    $true = 1;

    $sql = "INSERT INTO solicitudes_de_verificacion(id_usuario, documentacion) VALUES (?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $_SESSION['id_usuario'], $documentacion);

    $sql2 = "UPDATE usuarios SET certificacion_en_proceso = ? WHERE id = ?";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("ii", $true, $_SESSION['id_usuario']);

    if ($stmt->execute() && $stmt2->execute()) {
        echo "<script>
        window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/publicacion_exitosa.php';
        </script>";
    } else {
        echo "<script>
        window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/error_alquiler.php';
        </script>";
    }

    $stmt->close();
    $stmt2->close();
    $conn->close();

}




?>