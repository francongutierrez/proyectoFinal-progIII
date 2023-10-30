<?php

    $validado = true;

    if (empty($nombre)) {
    } elseif (strlen($nombre) < 2 || strlen($nombre) > 50) {
        echo '<h6 class="mensajeError">El nombre debe tener entre 2 y 50 caracteres</h6> ';
        $validado = false;
    }

    if (empty($apellido)) {
    } elseif (strlen($apellido) < 2 || strlen($apellido) > 50) {
        echo '<h6 class="mensajeError">El apellido debe tener entre 2 y 50 caracteres</h6> ';
        $validado = false;
    }


    if (empty($ubicacion)) {
    } elseif (strlen($ubicacion) < 2 || strlen($ubicacion) > 100) {
        echo '<h6 class="mensajeError">La ubicación debe tener entre 5 y 100 caracteres</h6> ';
        $validado = false;
    }


    if (empty($ciudad)) {
    } elseif (strlen($ciudad) < 4 || strlen($ciudad) > 100) {
        echo '<h6 class="mensajeError">Las ciudad debe tener entre 4 y 100 caracteres</h6> ';
        $validado = false;
    }


    if (empty($email)) {
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<h6 class="mensajeError">El correo electrónico no tiene un formato válido</h6> ';
        $validado = false;
    }


    if (empty($telefono)) {
    } elseif ($telefono < 999999999 || $telefono > 99999999999) {
        echo '<h6 class="mensajeError">El teléfono debe tener 10 caracteres numéricos</h6> ';
        $validado = false;
    }

    if (empty($intereses)) {
    } elseif (strlen($intereses) > 300) {
        echo '<h6 class="mensajeError">Los intereses no pueden superar los 300 caracteres</h6> ';
        $validado = false;
    }

    $maxFileSize = 5 * 1024 * 1024;
    $tamano = filesize($foto);

    if (empty($tamano)) {
    } elseif ($tamano > $maxFileSize) {
        echo '<h6 class="mensajeError">La imagen subida no puede superar los 5MB</h6> ';
        $validado = false;
    }

    if (empty($bio)) {
    } elseif (strlen($bio) > 300) {
        echo '<h6 class="mensajeError">La bio no puede superar los 300 caracteres</h6>';
        $validado = false;
    } 
    
    
    if (empty($contrasena)) {
    } elseif (strlen($contrasena) < 8 || strlen($contrasena) > 50) {
        echo '<h6 class="mensajeError">La contraseña debe tener entre 8 y 50 caracteres</h6>';
        $validado = false;
    }

    if (empty($contrasena) || empty($contrasena2)) {
    } elseif ($contrasena != $contrasena2) {
        echo '<h6 class="mensajeError">Las contraseñas no coinciden</h6>';
        $validado = false;
    }

?>