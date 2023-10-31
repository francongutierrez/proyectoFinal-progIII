<?php

    if (isset($_FILES['documentacion'])) {

        $archivo = $_FILES['documentacion'];
        $validado = true;

        if ($archivo['error'] === 0) {
            $fileSize = $archivo['size'];

            // Extraer la extensión del archivo
            $fileExtension = pathinfo($archivo['name'], PATHINFO_EXTENSION);

            // Validar que no esté vacío
            if ($fileSize === 0) {
                echo '<h6 class="mensajeError">No has subido ningun archivo</h6> ';
                $validado = false;
            }

            // Validar que no supere los 5 MB (5 * 1024 * 1024 bytes)
            if ($fileSize > 5 * 1024 * 1024) {
                echo '<h6 class="mensajeError">El archivo no puede superar los 5MB</h6> ';
                $validado = false;
            }

            // Validar que sea un tipo de imagen (puedes ajustar las extensiones permitidas)
            $extensionesPermitidas = ['jpg', 'jpeg', 'png', 'gif', 'doc', 'docx', 'pdf'];
            if (!in_array($fileExtension, $extensionesPermitidas)) {
                echo '<h6 class="mensajeError">El archivo debe ser de tipo jpg, jpeg, png, gif, doc, docx o pdf</h6> ';
                $validado = false;
            }
        } else {
            // Hubo un error al subir el archivo
            echo '<h6 class="mensajeError">Hubo un error al subir el archivo</h6> ';
            $validado = false;
        }
    } else {
        // No se ha subido ningún archivo
        echo '<h6 class="mensajeError">No ha seleccionado ningún archivo</h6> ';
        $validado = false;
    }
?>