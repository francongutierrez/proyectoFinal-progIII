<?php
    echo "<div class='card mt-3 mb-3'>";
    echo "<div class='card-header'>";
    echo "<h3>" . $row['titulo'] . "</h3>";
    echo "</div>";
    echo "<div class='card-body'>";
    echo "<h5 class='card-title'>". $row['descripcion'] . "</h5>";
    echo "<h5 class='card-title'>Costo por dia: $" . $row['costo'] . "</h5>";
    echo "</div>";
    echo "<div class='card-footer text-body-secondary'>";
    echo "<form method='POST'>";
    echo "<input type='hidden' name='id_publicacion' value='" . $row['id'] . "'>";
    echo "<button type='submit' class='btn btn-success' name='verMas' id='ver-mas-button'><a>Ver más</a></button>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
?>