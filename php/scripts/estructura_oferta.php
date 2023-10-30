<?php
        $fechaInicioFormateada = date("d/m/Y",strtotime($row['fecha_inicio']));
        $fechaFinFormateada = date("d/m/Y",strtotime($row['fecha_fin']));

        $imagen_codificada_oferta = base64_encode($row['foto']);
        echo "<div class='card mt-3 mb-3'>";
        echo "<div class='card-header'>";
        echo '<img src="data:image/jpeg;base64,' . $imagen_codificada_oferta . '" alt="Foto de perfil" class="profile-image">';
        echo "<h4>" . $row['nombre'] . " " . $row['apellido'] . "</h4>";
        echo "</div>"; // Cierre de card-header
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'> Correo electrónico: ". $row['email'] . "</h5>";
        echo "</div>"; // cierre de card body
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'> Fecha de inicio: ". $fechaInicioFormateada . "</h5>";
        echo "</div>"; // cierre de card body 2
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'> Fecha de fin: ". $fechaFinFormateada . "</h5>";
        echo "</div>"; // cierre de card body 3
        echo "<div class='card-footer'>";
        echo 
        '<form method="POST" id="decisionOferta">
        <input type="hidden" value="'. $row['id'] . '" name="id_usuario_ofertante">
        <button type="submit" name="aceptar" class="btn btn-success" name="aceptar" id="aceptar" data-accion="aceptar">Aceptar</button>
        <button type="submit" name="rechazar" class="btn btn-danger" name="rechazar" id="rechazar" data-accion="rechazar">Rechazar</button>
    </form>';
        echo "</div>"; // cierre de card footer
        echo "</div>"; // cierre de card

?>