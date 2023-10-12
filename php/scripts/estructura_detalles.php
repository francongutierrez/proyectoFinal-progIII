<?php


echo "<div class='container'>";
echo "<div class='row'>";
echo "<div class='col'>";
echo "<h1>".$row['titulo']."</h1>";
echo "</div>";
echo "</div>";
echo "<div class='row'>";
echo "<div class='col'>";
echo "<p><span class='titular'>Descripcion: </span>".$row['descripcion']."</p>";
echo "</div>";
echo "</div>";
echo "<div class='row'>";
echo "<div class='col'>";
echo "<p id='ubicacionShow'><span class='titular'>Ubicacion: </span>".$row['ubicacion']."</p>";
echo "</div>";
echo "</div>";
echo "<div class='row'>";
echo     "<div class='col'>";
echo         "<p id='etiquetasShow'><span class='titular'>Etiquetas:</span> ".$row['etiquetas']."</p>";
echo     "</div>";
echo "</div>";
echo "<div class='row'>";
echo     "<div class='col-md-6'>";
echo         "<p><span class='titular'>Tiempo minimo:</span> ".$row['tiempo_minimo']." dias</p>";
echo     "</div>";
echo     "<div class='col-md-6'>";
echo         "<p><span class='titular'>Tiempo maximo:</span> ".$row['tiempo_maximo']." dias</p>";
echo     "</div>";
echo "</div>";
echo "<div class='row'>";
echo     "<div class='col text-center'>";
echo         "<p>";
    include "scripts/display_fotos.php";
echo        "</p>";
echo     "</div>";
echo "</div>";
echo "<div class='row'>";
echo     "<div class='col text-center'>";
echo         "<p>";
    include "scripts/display_servicios.php";
echo        "</p>";
echo     "</div>";
echo "</div>";
echo "<div class='row'>";
echo     "<div class='col'>";
echo         "<p><span class='titular'>Costo por dia: </span> $".$row['costo']."</p>";
echo     "</div>";
echo "</div>";
echo "<div class='row'>";
echo     "<div class='col'>";
echo         "<p><span class='titular'>Cupo maximo:</span> ".$row['cupo']." personas</p>";
echo     "</div>";
echo "</div>";
echo "<div class='row'>";
echo     "<div class='col botones'>";
echo         "<form>";
echo             "<button type='submit' class='btn btn-success'>";
echo                 "Alquilar propiedad";
echo             "</button>";
echo             "<button class='btn btn-outline-success'>";
echo                 "<a href='javascript:history.back()'>Volver a todas las propiedades</a>";
echo             "</button>";
echo         "</form>";
echo     "</div>";
echo "</div>";
echo "</div>";


?>

