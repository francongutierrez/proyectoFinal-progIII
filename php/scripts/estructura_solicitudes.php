<?php

    $imagen_codificada = base64_encode($row['foto']);

    echo "<div class='card mt-3 mb-3'>";
    echo "<div class='card-header'>";
    echo "<h3> <img src='data:image/jpeg;base64," . $imagen_codificada . "' alt='Foto de perfil' class='profile-image'> ";
    echo $row['nombre'] . " " . $row['apellido'] . "</h3>";
    echo "</div>"; // Cierre de card header
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>Correo electrónico: ". $row['email'] . "</h5>";
    echo "<h5 class='card-title'>Teléfono: ". $row['telefono'] . "</h5>";
    echo "<h5 class='card-title'>Ciudad: ". $row['ciudad'] . "</h5>";
    echo "<h5 class='card-title'>Descarga la documentación de la solicitud:</h5>";
    echo "<a href='data:application/octet-stream;base64," . base64_encode($row['documentacion']) . "' download='archivo.". $row['extension'] ."'>Descargar archivo</a>";
    echo "<h5 class='mensajeAtencion'>ATENCIÓN: La siguiente acción no puede deshacerse. Verifique bien la documentación enviada antes de decidir sobre la solicitud.</h5>";
    echo "</div>"; // Cierre de card body
    echo "<div class='card-footer text-body-secondary'>";
    echo "<form method='POST'>";
    echo "<input type='hidden' name='id_usuario' value='" . $row['id_usuario'] . "'>";
    echo "<label>Vencimiento de la verificación (en caso de aceptarla)</label>";
    echo "<input type='date' class='form-control' name='vencimiento' min='" . date('Y-m-d', strtotime('+6 months')) . "' max='2025-12-31' required><br>";
    echo "<button type='submit' class='btn btn-success' name='aceptar' id='aceptar-button'><a>Aceptar solicitud</a></button>";
    echo "<button type='submit' class='btn btn-danger' name='rechazar' id='rechazar-button'><a>Rechazar solicitud</a></button>";
    echo "</form>";

    echo "</div>"; // Cierre de card footer
    echo "</div>"; // cierre de card


?>