<?php
    
    if (isset($_POST['buscar'])) {

        extract($_POST);

        if (empty($tiempoMaximo)) {
            echo '<div class="container"><h6 class="mensajeError">Debe ingresar un tiempo máximo</h6></div>';
        }
        elseif (empty($inicioDisponibilidad) || empty($finDisponibilidad)) {
            echo '<div class="container"><h6 class="mensajeError">Debe especificar las fechas de alquiler</h6></div>';
        } else {
            include 'scripts/conexion_db.php';

            // Consulta dinamica
            $sql_busqueda = "SELECT * FROM propiedades WHERE 1";
    
            if (!empty($titulo)) {
                $titulo = strtolower($titulo);
                $sql_busqueda .= " AND LOWER(titulo) LIKE '%$titulo%'";
            }
            if (!empty($ubicacion)) {
                $ubicacion = strtolower($ubicacion);
                $sql_busqueda .= " AND LOWER(ubicacion) LIKE '%$ubicacion%'";
            }
            if (!empty($etiquetas)) {
                $etiquetas = strtolower($etiquetas);
                $sql_busqueda .= " AND LOWER(etiquetas) LIKE '%$etiquetas%'";
            }
            if (!empty($costo)) {
                $sql_busqueda .= " AND costo <= $costo";
            }
            if (!empty($tiempoMaximo)) {
                $sql_busqueda .= " AND tiempo_maximo <= $tiempoMaximo";
            }
            if (!empty($cupo)) {
                $sql_busqueda .= " AND cupo = $cupo";
            }
            if (!empty($inicioDisponibilidad) && !empty($finDisponibilidad)) {
                $sql_busqueda .= " AND id NOT IN 
                (SELECT id_propiedad FROM alquileres 
                WHERE fecha_inicio <= '$inicioDisponibilidad'
                AND fecha_fin >=  '$finDisponibilidad'
                AND (estado = 'activo'))"; // Solo estado activo para que el dueño de la propiedad decida sobre el alquiler
            }        
    
            $sql_busqueda .= " AND activa = 1 AND id_dueno != $_SESSION[id_usuario]";
    
            $_SESSION['criterios'] = $sql_busqueda;
            
            $_SESSION['fechaInicioDisponibilidad'] = $inicioDisponibilidad;
            $_SESSION['fechaFinDisponibilidad'] = $finDisponibilidad;
    
            $conn->close();
    
            echo "<script>window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/resultados.php'</script>";
        }

        

    }



?>