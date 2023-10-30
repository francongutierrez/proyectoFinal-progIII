<?php


include 'scripts/conexion_db.php';

$criterios = $_SESSION['criterios'];

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


$sql = $criterios;
$stmt = $conn->prepare($sql);
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


$sql_total = "SELECT COUNT(*) as total FROM ($criterios) AS subconsulta";
$stmt_total = $conn->prepare($sql_total);
$stmt_total->execute();
$result = $stmt_total->get_result();
$row = $result->fetch_assoc();

$totalResultados = $row['total'];

// Calcular la cantidad total de páginas para los resultados regulares
$total_paginas = ceil($totalResultados / $por_pagina);

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