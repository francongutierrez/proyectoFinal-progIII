<?php


include 'scripts/conexion_db.php';

$sql = "SELECT * FROM propiedades WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['selected_publicacion']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    while ($row = $result->fetch_assoc()) {

        // Script para manejar la estructura de las publicaciones
        include 'estructura_detalles_postulaciones.php';

    }
} else {
    echo "<h3>Sin resultados</h3>";
}

$conn->close();
$stmt->close();

?>