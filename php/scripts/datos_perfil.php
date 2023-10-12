<?php


    include 'scripts/conexion_db.php';

    $sql = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_SESSION['id_usuario']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            // Script que muestra los datos del perfil
            include 'estructura_perfil.php';
        }
    } else {
        echo "<h1>Error al mostrar datos</h1>";
    }
    


?>