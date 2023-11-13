<?php


include 'scripts/conexion_db.php';

$sql = "SELECT usuarios.nombre, usuarios.apellido, usuarios.foto, usuarios.email, usuarios.id, alquileres.fecha_inicio, alquileres.fecha_fin FROM usuarios, alquileres WHERE usuarios.id = alquileres.id_usuario AND alquileres.estado = 'pendiente' AND alquileres.id_propiedad = ? ORDER BY alquileres.id";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['selected_publicacion']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Funcion interseccion
    function fechasSeIntersectan($nuevaFechaInicio, $nuevaFechaFin, $fechasExistencias) {
        $nuevaFechaInicio = new DateTime($nuevaFechaInicio);
        $nuevaFechaFin = new DateTime($nuevaFechaFin);
    
        foreach ($fechasExistencias as $rango) {
            $inicioExistente = new DateTime($rango["inicio"]);
            $finExistente = new DateTime($rango["fin"]);
    
            // Verificar si las fechas se intersectan
            if (
                ($nuevaFechaInicio >= $inicioExistente && $nuevaFechaInicio <= $finExistente) ||
                ($nuevaFechaFin >= $inicioExistente && $nuevaFechaFin <= $finExistente) ||
                ($nuevaFechaInicio <= $inicioExistente && $nuevaFechaFin >= $finExistente)
            ) {
                return true; // Las fechas se intersectan
            }
        }
    
        return false; // Las fechas no se intersectan
    }

    

    while ($row = $result->fetch_assoc()) {

        
    // Script para manejar la estructura de las reseñass
    include 'estructura_oferta.php';

    }
} else {
    echo "<h3>Esta publicación no tiene ofertas de alquiler</h3>";
}

$conn->close();
$stmt->close();

?>