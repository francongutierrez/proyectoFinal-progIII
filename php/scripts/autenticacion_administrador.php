<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'scripts/conexion_db.php';

    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Consultar la base de datos para verificar las credenciales
    $sql = "SELECT id, nombre, foto, contrasena, certificacion, certificacion_en_proceso, sexo, intereses FROM usuarios WHERE email = ? AND es_administrador = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Las credenciales son correctas, iniciar sesión

        $row = $result->fetch_assoc();
        $hash = $row['contrasena'];

        if (password_verify($contrasena, $hash)) {
            session_start();
    
            $_SESSION['nombre_usuario'] = $row['nombre'];
            $_SESSION['id_usuario'] = $row['id'];
            $_SESSION['foto_usuario'] = $row['foto'];
            $_SESSION['certificacion'] = $row['certificacion'];
            $_SESSION['intereses'] = $row['intereses'];
            $_SESSION['certificacion_en_proceso'] = $row['certificacion_en_proceso'];
            $_SESSION['sexo'] = $row['sexo'];
            $_SESSION['es_administrador'] = 1;
            
            echo "<script>
            window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/inicio_administrador.php';
            </script>";

        } else {
            echo "<p class='errorInicio'>La contraseña ingresada es incorrecta. Inténtelo de nuevo.</p>";
        }

    } else {
        // Credenciales incorrectas
        echo "<p class='errorInicio'>Credenciales incorrectas. Inténtelo de nuevo.</p>";
    }

    $stmt->close();
    $conn->close();
}


?>