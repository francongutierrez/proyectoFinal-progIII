<?php

    if (isset($_FILES['archivo'])) {
        $archivo = $_FILES['documentacion'];

        if ($archivo['error'] === 0) {
            $fileSize = $archivo['size'];
            $fileType = $archivo['type'];

            // Validar que no esté vacío
            if ($fileSize === 0) {
                $validado = false;
            }

            // Validar que no supere los 5 MB (5 * 1024 * 1024 bytes)
            if ($fileSize > 5 * 1024 * 1024) {
                $validado = false;
            }

            // Validar que sea un tipo de imagen (puedes ajustar las extensiones permitidas)
            $extensionesPermitidas = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($fileType, $extensionesPermitidas)) {
                $validado = false;
            }
        } else {
            // Hubo un error al subir el archivo
            $validado = false;
        }
    } else {
        // No se ha subido ningún archivo
        $validado = false;
    }
?>