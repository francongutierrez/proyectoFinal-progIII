<?php

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

$nuevaFechaInicio = '2023-11-01';
$nuevaFechaFin = '2023-11-10';

$fechasExistencias = [
    ['inicio' => '2023-10-25', 'fin' => '2023-11-05'],
    ['inicio' => '2023-11-15', 'fin' => '2023-11-25'],
    ['inicio' => '2023-12-01', 'fin' => '2023-12-10'],
];

if (fechasSeIntersectan($nuevaFechaInicio, $nuevaFechaFin, $fechasExistencias)) {
    echo 'Las fechas se intersectan, alquiler no disponible.';
} else {
    echo 'Las fechas no se intersectan, alquiler disponible.';
}






?>