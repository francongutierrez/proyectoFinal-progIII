<?php

    include 'scripts/conexion_db.php';

    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Página actual
    $itemsPorPagina = 10; // Cantidad de resultados por página

    $offset = ($page - 1) * $itemsPorPagina; // Calcular el desplazamiento

    $sql = "SELECT * FROM propiedades WHERE estado = 'pendiente' AND activa = 0 LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $offset, $itemsPorPagina);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

        // Script para manejar la estructura de las publicaciones
        include 'estructura_publicaciones.php';


        }
    } else {
        echo "<h3 class='mt-3'>Sin resultados</h3>";
    }


    $sqlCount = "SELECT COUNT(*) as total FROM propiedades WHERE estado = 'pendiente'";
    $stmtCount = $conn->prepare($sqlCount);
    $stmtCount->execute();
    $resultCount = $stmtCount->get_result();
    $rowCount = $resultCount->fetch_assoc();
    $totalRegistros = $rowCount['total'];

    $totalRegistros = $result->num_rows;
    $totalPaginas = ceil($totalRegistros / $itemsPorPagina);

    echo '<div class="row">';
    echo '<div class="col text-center">';
    for ($i = 1; $i <= $totalPaginas; $i++) {
        echo "<a class='enlacesPostulaciones' href='publicaciones_pendientes.php?page=$i'>$i</a> ";
    }
    '</div>';
    '</div>';

    $conn->close();
    $stmt->close();

?>