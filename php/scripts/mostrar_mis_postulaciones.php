<?php

include 'scripts/conexion_db.php';

$page = isset($_GET['page']) ? $_GET['page'] : 1; // Página actual
$itemsPorPagina = 10; // Cantidad de resultados por página

$offset = ($page - 1) * $itemsPorPagina; // Calcular el desplazamiento

$sql = "SELECT propiedades.id, propiedades.titulo, propiedades.descripcion, propiedades.costo, propiedades.activa, alquileres.estado, alquileres.fecha_inicio, alquileres.fecha_fin FROM propiedades, alquileres WHERE alquileres.id_usuario = ? AND alquileres.id_propiedad = propiedades.id
ORDER BY
  CASE
    WHEN estado = 'pendiente' THEN 1
    WHEN estado = 'activo' THEN 2
    WHEN estado = 'rechazado' THEN 3
    ELSE 4  -- Opcional: Manejar otros estados o valores por defecto
  END
  LIMIT ?, ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $_SESSION['id_usuario'], $offset, $itemsPorPagina);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

    // Script para manejar la estructura de las publicaciones
    include 'estructura_mis_postulaciones.php';


    }
} else {
    echo "<h3>Sin resultados</h3>";
}


$sqlCount = "SELECT COUNT(*) as total FROM propiedades, alquileres WHERE alquileres.id_usuario = ? AND alquileres.id_propiedad = propiedades.id";
$stmtCount = $conn->prepare($sqlCount);
$stmtCount->bind_param("i", $_SESSION['id_usuario']);
$stmtCount->execute();
$resultCount = $stmtCount->get_result();
$rowCount = $resultCount->fetch_assoc();
$totalRegistros = $rowCount['total'];

$totalRegistros = $result->num_rows;
$totalPaginas = ceil($totalRegistros / $itemsPorPagina);

for ($i = 1; $i <= $totalPaginas; $i++) {
    echo "<a href='mis_postulaciones.php?page=$i'>$i</a> ";
}

$conn->close();
$stmt->close();

?>