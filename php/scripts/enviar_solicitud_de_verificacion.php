<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['enviarSolicitud'])) {


            extract($_POST);
    
            include 'validar_verificacion.php';
    
            if ($validado) {
                include 'scripts/conexion_db.php';
                $nombreDocumentacion = $_FILES['documentacion']['name'];
                $documentacion = file_get_contents($_FILES['documentacion']['tmp_name']);
                $extension = pathinfo($nombreDocumentacion, PATHINFO_EXTENSION);


                $true = 1;
                $pendiente = "pendiente";
            
                $sql = "INSERT INTO solicitudes_de_verificacion(id_usuario, documentacion, extension, estado) VALUES (?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssss", $_SESSION['id_usuario'], $documentacion, $extension, $pendiente);
            
                $sql2 = "UPDATE usuarios SET certificacion_en_proceso = ? WHERE id = ?";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->bind_param("ii", $true, $_SESSION['id_usuario']);
            
                if ($stmt->execute() && $stmt2->execute()) {
                    echo "<script>
                    window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/exito_solicitud.php';
                    </script>";
                } else {
                    echo "<script>
                    window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/error_solicitud.php';
                    </script>";
                }
            
                $stmt->close();
                $stmt2->close();
                $conn->close();
            }
        }
    }
?>