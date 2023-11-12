<?php

    $validado = true;

    if (empty($nombre)) {
        echo '<h6 class="mensajeError">El nombre debe tener entre 2 y 50 caracteres</h6> ';
        $validado = false;
    } elseif (strlen($nombre) < 2 || strlen($nombre) > 50) {
        echo '<h6 class="mensajeError">El nombre debe tener entre 2 y 50 caracteres</h6> ';
        $validado = false;
    }

    if (empty($apellido)) {
        echo '<h6 class="mensajeError">El apellido debe tener entre 2 y 50 caracteres</h6> ';
        $validado = false;
    } elseif (strlen($apellido) < 2 || strlen($apellido) > 50) {
        echo '<h6 class="mensajeError">El apellido debe tener entre 2 y 50 caracteres</h6> ';
        $validado = false;
    }


    if (empty($ciudad)) {
        echo '<h6 class="mensajeError">La ciudad debe tener entre 5 y 100 caracteres</h6> ';
        $validado = false;
    } elseif (strlen($ciudad) < 2 || strlen($ciudad) > 100) {
        echo '<h6 class="mensajeError">La ciudad debe tener entre 5 y 100 caracteres</h6> ';
        $validado = false;
    }


    if (empty($ciudad)) {
        echo '<h6 class="mensajeError">Las ciudad debe tener entre 4 y 100 caracteres</h6> ';
        $validado = false;
    } elseif (strlen($ciudad) < 4 || strlen($ciudad) > 100) {
        echo '<h6 class="mensajeError">Las ciudad debe tener entre 4 y 100 caracteres</h6> ';
        $validado = false;
    }


    if (empty($email)) {
        echo '<h6 class="mensajeError">El correo electrónico no tiene un formato válido</h6> ';
        $validado = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<h6 class="mensajeError">El correo electrónico no tiene un formato válido</h6> ';
        $validado = false;
    }


    if (empty($telefono)) {
        echo '<h6 class="mensajeError">El teléfono debe tener 10 caracteres numéricos</h6> ';
        $validado = false;
    } elseif ($telefono < 999999999 || $telefono > 99999999999) {
        echo '<h6 class="mensajeError">El teléfono debe tener 10 caracteres numéricos</h6> ';
        $validado = false;
    }

    if (strlen($intereses) > 300) {
        echo '<h6 class="mensajeError">Los intereses no pueden superar los 300 caracteres</h6> ';
        $validado = false;
    }

    $maxFileSize = 5 * 1024 * 1024;
    $tamano = filesize($_FILES['foto']['tmp_name']);

    if (empty($tamano)) {
        echo '<h6 class="mensajeError">Debe subir una imagen</h6> ';
        $validado = false;
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
        echo '<h6 class="mensajeError">La contraseña debe tener entre 8 y 50 caracteres</h6>';
        $validado = false;
    } elseif (strlen($contrasena) < 8 || strlen($contrasena) > 50) {
        echo '<h6 class="mensajeError">La contraseña debe tener entre 8 y 50 caracteres</h6>';
        $validado = false;
    }

    if (empty($contrasena) || empty($contrasena2)) {
        echo '<h6 class="mensajeError">Las contraseñas no coinciden</h6>';
        $validado = false;
    } elseif ($contrasena != $contrasena2) {
        echo '<h6 class="mensajeError">Las contraseñas no coinciden</h6>';
        $validado = false;
    }

?>