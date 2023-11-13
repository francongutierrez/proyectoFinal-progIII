<?php


include 'scripts/conexion_db.php';

$sql = "SELECT usuarios.nombre, usuarios.apellido, usuarios.foto, usuarios.email, usuarios.id, alquileres.fecha_inicio, alquileres.fecha_fin FROM usuarios, alquileres WHERE usuarios.id = alquileres.id_usuario AND alquileres.estado = 'activo' AND alquileres.id_propiedad = ? AND usuarios.certificacion = 1 AND alquileres.fecha_fin >= CURRENT_DATE ORDER BY alquileres.id";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['selected_publicacion']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $fechasVerificados = [];
    while ($row = $result->fetch_assoc()) {

    // Script para manejar la estructura de las reseñass
    include 'estructura_certificados_ofertas.php';

    }
} else {
}

$conn->close();
$stmt->close();

?>