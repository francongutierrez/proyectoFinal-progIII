<?php


include 'scripts/conexion_db.php';

$sql = "SELECT usuarios.nombre, usuarios.apellido, usuarios.foto, reseñas.puntaje, reseñas.descripcion, reseñas.respuesta, reseñas.fecha, propiedades.id_dueno, reseñas.id_usuario FROM usuarios, reseñas, propiedades WHERE usuarios.id = reseñas.id_usuario AND reseñas.id_propiedad = ? AND reseñas.id_propiedad = propiedades.id ORDER BY reseñas.fecha";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['selected_publicacion']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

    // Script para manejar la estructura de las reseñass
    include 'estructura_resena.php';

    }
} else {
    echo "<h3>Esta publicacion no tiene reseñas</h3>";
}

$conn->close();
$stmt->close();

?>