<?php


include 'scripts/conexion_db.php';

// Configurar variables de paginación
$por_pagina = 10; // Cantidad de resultados por página

if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 1;
}

if ($pagina != 1) {
    $por_pagina = 7;
} else {
    $por_pagina = 7;
}

$inicio = ($pagina - 1) * $por_pagina;


$sql = "SELECT id, titulo, descripcion, costo FROM propiedades WHERE id_dueno != ? AND activa = 1 LIMIT ?, ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $_SESSION['id_usuario'], $inicio, $por_pagina);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

    // Script para manejar la estructura de las publicaciones
    //include 'estructura_publicaciones.php';


    include 'estructura_publicaciones.php';


    }
} else {
    echo "<div class='row'>";
    echo "<div class='col mb-3' id='sin-resultados'>";
    echo "<h3>Sin resultados</h3>";    
    echo "<div class='row'>";
    echo "<div class='col'>";
}

// Calcular la cantidad total de páginas para los resultados regulares
$sql_total_regulares = "SELECT COUNT(*) as total FROM propiedades WHERE dueno_certificado = 0 AND id_dueno != $_SESSION[id_usuario]";
$resultado_total_regulares = $conn->query($sql_total_regulares);
$total_registros_regulares = $resultado_total_regulares->fetch_assoc()['total'];
$total_paginas = ceil($total_registros_regulares / $por_pagina);

// Mostrar enlaces de paginación solo para los resultados regulares
echo '<div class="row">';
echo '<div class="col text-center">';
for ($i = 1; $i <= $total_paginas; $i++) {
    echo "<a href='?pagina=$i' class='selectores-pagina'>$i</a> ";
}
'</div>';
'</div>';



$conn->close();
$stmt->close();

?>