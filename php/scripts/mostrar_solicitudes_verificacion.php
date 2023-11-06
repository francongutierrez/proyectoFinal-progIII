<?php

    include 'scripts/conexion_db.php';

    $page = isset($_GET['page']) ? $_GET['page'] : 1; // Página actual
    $itemsPorPagina = 10; // Cantidad de resultados por página

    $offset = ($page - 1) * $itemsPorPagina; // Calcular el desplazamiento

    $sql = "SELECT solicitudes_de_verificacion.id_usuario, solicitudes_de_verificacion.documentacion, solicitudes_de_verificacion.estado, solicitudes_de_verificacion.extension, usuarios.foto, usuarios.nombre, usuarios.apellido, usuarios.email, usuarios.telefono, usuarios.ciudad FROM solicitudes_de_verificacion, usuarios WHERE solicitudes_de_verificacion.estado = 'pendiente' AND solicitudes_de_verificacion.id_usuario = usuarios.id LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $offset, $itemsPorPagina);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

        // Script para manejar la estructura de las publicaciones
        include 'estructura_solicitudes.php';


        }
    } else {
        echo "<h3 class='mt-3'>Sin resultados</h3>";
    }


    $sqlCount = "SELECT COUNT(*) as total FROM solicitudes_de_verificacion WHERE estado = 'pendiente'";
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
        echo "<a class='enlacesPostulaciones' href='solicitudes_de_verificacion.php?page=$i'>$i</a> ";
    }
    '</div>';
    '</div>';

    $conn->close();
    $stmt->close();

?>