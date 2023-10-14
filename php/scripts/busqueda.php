<?php

    if (isset($_POST['buscar'])) {
        extract($_POST);

        include 'scripts/conexion_db.php';

        // Consulta dinamica
        $sql = "SELECT * FROM propiedades WHERE 1";

        if (!empty($titulo)) {
            $titulo = strtolower($titulo);
            $sql .= " AND LOWER(titulo) LIKE '%$titulo%'";
        }
        if (!empty($ubicacion)) {
            $ubicacion = strtolower($ubicacion);
            $sql .= " AND LOWER(ubicacion) LIKE '%$ubicacion%'";
        }
        if (!empty($costo)) {
            $sql .= " AND costo <= $costo";
        }
        if (!empty($tiempoMaximo)) {
            $sql .= " AND tiempo_maximo <= $tiempoMaximo";
        }
        if (!empty($cupo)) {
            $sql .= " AND cupo = $cupo";
        }

        $sql .= " AND activa = 1 AND id_dueno != $_SESSION[id_usuario]";

        $result = $conn->query($sql);

        $result_array = array();

        while ($row = $result->fetch_assoc()) {
            $result_array[] = $row;
        }

        $_SESSION['resultados'] = $result_array;

        $conn->close();

        echo "<script>window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/resultados.php'</script>";
    }



?>