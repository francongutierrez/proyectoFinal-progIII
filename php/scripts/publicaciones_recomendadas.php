<?php



    // Criterios de busqueda en publicaciones destacadas
    if (!empty($_SESSION['intereses'])) {
        include 'scripts/conexion_db.php';

        // Criterios de busqueda ingresados
        $intereses = strtolower($_SESSION['intereses']);

        $criterios = $_SESSION['criterios'];

        $criterios_recomendadas = $criterios;


        $criterios_recomendadas .= " AND (LOWER(descripcion) LIKE '%$intereses%' OR LOWER(etiquetas) LIKE '%$intereses%')";

        $criterios_recomendadas .= " ORDER BY RAND() LIMIT 3";
        

        $stmt = $conn->prepare($criterios_recomendadas);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            echo "<div class='row'>";
            echo "<div class='col'>";
            echo "<h2 class='mt-3 animate-text publicaciones-destacadas-title'>Publicaciones recomendadas: </h2>";
            echo "</div>";
            echo "</div>";
    
    
            while ($row = $result->fetch_assoc()) {
    
            // Script para manejar la estructura de las publicaciones
            include 'estructura_publicaciones.php';
    
    
            }
        } else {
        }
    
        $conn->close();
        $stmt->close();
    }




?>