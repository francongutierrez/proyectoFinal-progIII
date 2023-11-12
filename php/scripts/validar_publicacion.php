<?php

    $validado = true;

    if (strlen($titulo) < 5 || strlen($titulo) > 50) {
        echo '<h6 class="mensajeError">El título debe tener entre 5 y 50 caracteres</h6> ';
        $validado = false;
    }
    if (strlen($descripcion) < 5 || strlen($descripcion) > 499) {
        echo '<h6 class="mensajeError">La descripción debe tener entre 5 y 25 caracteres</h6> ';
        $validado = false;
    }
    if (strlen($ubicacion) < 5 || strlen($ubicacion) > 100) {
        echo '<h6 class="mensajeError">La ubicación debe tener entre 5 y 100 caracteres</h6> ';
        $validado = false;
    }
    if (strlen($etiquetas) > 200) {
        echo '<h6 class="mensajeError">Las etiquetas deben tener menos de 200 caracteres</h6> ';
        $validado = false;
    }
    if ($tiempo_minimo < 1 || 90 < $tiempo_minimo) {
        echo '<h6 class="mensajeError">El tiempo mínimo debe estar entre 1 y 90</h6> ';
        $validado = false;
    }
    if ($tiempo_maximo < 1 || 90 < $tiempo_maximo) {
        echo '<h6 class="mensajeError">El tiempo máximo debe estar entre 1 y 90</h6> ';
        $validado = false;
    }
    if ($tiempo_minimo > $tiempo_maximo) {
        echo '<h6 class="mensajeError">El tiempo máximo debe estar entre 1 y 90</h6> ';
        $validado = false;
    }
    if ($cupo < 1 || 10 < $cupo) {
        echo '<h6 class="mensajeError">El cupo debe estar entre 1 y 10</h6> ';
        $validado = false;
    }
    if ($costo < 1000 || 999999 < $costo) {
        echo '<h6 class="mensajeError">El costo por día debe estar entre $1000 y $999999</h6>';
        $validado = false;
    }

    $totalArchivos = count($_FILES['fotos']['tmp_name']);
    if($totalArchivos > 10 || $totalArchivos < 1){
        echo "<h6 class='mensajeError'>El número de fotos subidas debe estar entre 1 y 10</h6>";
        $validado = false;
    }

    if ($inicioVigencia == "") {
        $inicioVigencia = null;
    }
    if ($finVigencia == "") {
        $finVigencia = null;
    }    



?>