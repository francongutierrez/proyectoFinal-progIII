<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['registrarse'])) { 
        extract($_POST);

        include 'validar_usuario.php';
    
        if ($validado) {
            include 'scripts/conexion_db.php';
    
            $contrasena = $_POST['contrasena'];
        
            $valorFalso = false;
            $contrasena_hasheada = password_hash($contrasena, PASSWORD_DEFAULT);
            $foto = file_get_contents($_FILES['foto']['tmp_name']);
        
            // Validacion del email ingresado
            $query_email = "SELECT email FROM usuarios WHERE email = '$email'";
            $result_email = $conn->query($query_email);
        
            if ($result_email->num_rows > 0) {
                echo "<script>
                window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/error_email.php';
                </script>";
            } else {
                // Insercion en la DB
                $sql = "INSERT INTO usuarios(nombre, apellido, ciudad, telefono, email, intereses, foto, certificacion, es_administrador, bio, contrasena, sexo) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssisssiisss", $nombre, $apellido, $ciudad, $telefono, $email, $intereses, $foto, $valorFalso, $valorFalso, $bio, $contrasena_hasheada, $sexo);
        
                if ($stmt->execute()) {
                    echo "<script>
                    window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/registro_exitoso.php';
                    </script>";
                } else {
                    echo "<script>
                    window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/error_registro.php';
                    </script>";
                }
            }
        
            $stmt->close();
            $conn->close();
        }
    }
}




?>