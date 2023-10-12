<?php

    $resultados = $_SESSION['resultados'];


    // Configurar variables de paginación
    $por_pagina = 7; // Cantidad de resultados por página

    if (isset($_GET['pagina'])) {
        $pagina = $_GET['pagina'];
    } else {
        $pagina = 1;
    }

    $inicio = ($pagina - 1) * $por_pagina;

    if (!empty($resultados)) {

        // Calcular la cantidad total de páginas
        $total_registros = count($resultados);
        $total_paginas = ceil($total_registros / $por_pagina);

        // Obtener los resultados para la página actual
        $resultados_pagina = array_slice($resultados, $inicio, $por_pagina);


        foreach ($resultados_pagina as $row) {
            // Script para manejar la estructura de las publicaciones
            include 'estructura_publicaciones.php';
        }

        // Mostrar enlaces de paginación solo para los resultados regulares
        echo '<div class="row">';
        echo '<div class="col text-center">';
        for ($i = 1; $i <= $total_paginas; $i++) {
            echo "<a href='?pagina=$i'>$i</a> ";
        }
        '</div>';
        '</div>';



    } else {
        echo "<h3>Sin resultados</h3>";
    }


?>