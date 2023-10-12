<?php





echo "<div class='row'>";
echo "<div class='col'>'";
echo     "<h4>".$row['nombre'] . " " . $row['apellido'] . "</h4>";
echo "</div>";
echo "</div>";
echo "<div class='row'>";
echo "<div class='col'>";
echo     "<p><span class='titular'>Ciudad: </span>". $row['ciudad']. "</p>";
echo "</div>";
echo "</div>";
echo "<div class='row'>";
echo "<div class='col'>";
echo     "<p><span class='titular'>Email: </span>" . $row['email']. "</p>";
echo "</div>";
echo "</div>";
echo "<div class='row'>";
echo "<div class='col'>";
echo     "<p><span class='titular'>Intereses: </span>".$row['intereses'] . "</p>";
echo "</div>";
echo "</div>";
echo "<div class='row'>";
echo "<div class='col'>";
echo     "<p><span class='titular'>Bio: </span>". $row['bio']. "</p>";
echo "</div>";
echo "</div>";
echo "<div class='row'>";
echo "<div class='col'>";
echo     "<p><span class='titular'>Telefono: </span>". $row['telefono']."</p>";
echo "</div>";
echo "</div>";
echo "<div class='row'>";
echo "<div class='col'>";
echo     "<p><span class='titular'>Foto de perfil: </span>";

    if ($row['foto']) {
        // Codifica la imagen en Base64
        $imagen_codificada = base64_encode($row['foto']);
        // Muestra la imagen en el documento HTML
        echo '<img src="data:image/jpeg;base64,' . $imagen_codificada . '" alt="Foto de perfil" class="foto-perfil-display">';
    } else {
        echo "Imagen no encontrada";
    }
    
echo     "</p>";
echo "</div>";
echo "</div> "; 

?>