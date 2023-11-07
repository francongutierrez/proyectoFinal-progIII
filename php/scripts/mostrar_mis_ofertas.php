<?php

include 'scripts/conexion_db.php';

$sql = "SELECT id, titulo, descripcion, costo, activa, estado FROM propiedades WHERE id_dueno = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['id_usuario']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

    // Script para manejar la estructura de las publicaciones
    include 'estructura_mis_publicaciones.php';


    }
} else {
    echo "<h3>Sin resultados</h3>";
}

$conn->close();
$stmt->close();

?>