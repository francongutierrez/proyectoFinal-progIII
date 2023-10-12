<?php


include 'scripts/conexion_db.php';

$sql = "SELECT id, titulo, descripcion, costo FROM propiedades WHERE dueno_certificado = 1 LIMIT 3";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<div class='row'>";
    echo "<div class='col'>";
    echo "<h2>Recomendadas segun tus intereses: </h2>";
    echo "</div>";
    echo "</div>";


    while ($row = $result->fetch_assoc()) {

    // Script para manejar la estructura de las publicaciones
    //include 'estructura_publicaciones.php';


    include 'estructura_publicaciones.php';


    }
} else {
}

$conn->close();
$stmt->close();

?>