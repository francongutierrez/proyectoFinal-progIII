<?php

include 'scripts/verificacion.php'

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_general.css" >
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_detalles_publicacion.css">
    <link rel="icon" type="image/x-icon" href="../img/icono.ico">
    <title>RappiBnB - Detalles de la publicación</title>

</head>
<body>
    <header>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <div class="col-md-6">
                    <a class="navbar-brand" href="../php/inicio.php">
                        <img src="../img/RapiBnB.png" alt="Logo" width="50" class="d-inline-block align-text-top">
                        <p>RapiBnB</p>
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="dropdown">
                        <button class="menu-button">
                            <?php
                            // Mostrar la imagen de perfil del usuario
                            if ($_SESSION['foto_usuario']) {
                                $imagen_codificada = base64_encode($_SESSION['foto_usuario']);
                                echo '<img src="data:image/jpeg;base64,' . $imagen_codificada . '" alt="Foto de perfil" class="profile-image">';
                            } else {
                                echo "Imagen no encontrada";
                            }
                            ?>
                        </button>
                        <div class="dropdown-content">
                            <?php
                            // Distincion en los usuarios verificados y vencimiento
                            if ($_SESSION['certificacion'] == 1) {
                                echo "<a href='' onclick='return false;' id='usuario-verificado-menu'>Usuario verificado";
                                if (isset($_SESSION['vencimiento_verificacion'])) {
                                    echo " hasta el ".$_SESSION['vencimiento_verificacion'];
                                }
                                echo "</a>";
                            } else {}
                            ?>
                            <a href="mi_perfil.php">Mi perfil</a>
                            <a href="mis_publicaciones.php">Mis publicaciones</a>
                            <a href="mis_postulaciones.php" id="ofertas">Alquileres activos/pendientes:
                                <?php include "scripts/cantidad_postulaciones.php";?>
                            </a>
                            <a href="mis_publicaciones.php" id="ofertas">Ofertas de alquiler:
                                <?php include "scripts/cantidad_ofertas_alquiler.php";?>
                            </a>
                            <form action="scripts/cerrar_sesion.php" method="POST">
                                <button type="submit" id="cerrar-sesion-button" name="cerrar-sesion">
                                    <a href="#"><span class="cerrarSesion">Cerrar sesión</span></a>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <section>
        


        <div class="container" id="resultados">
            <?php

                include 'scripts/mostrar_detalles_mi_publicacion.php';
            
            ?>
        </div>
        <div class="container" id="reseñas">
            <div class="row">
                <div class="col mt-3">
                    <h1>Reseñas de la publicación:</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                <?php include 'scripts/editar_respuesta.php'; ?>
                <?php include 'scripts/mostrar_resenas_mi_publicacion.php'; ?>
                </div>
            </div>
            
        </div>
        <div class="container" id="misOfertas">
            <div class="row">
                <div class="col mt-3">
                    <h1>Ofertas de alquiler:</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php include 'scripts/ofertas_certificados.php'; ?>
                    <?php include 'scripts/mostrar_ofertas.php'; ?>
                    <?php include '../php/scripts/manejar_decision_dueno.php'; ?>
                </div>
            </div>
            
        </div>
        <div class="container">
            <div id="errorModal" class="modal">
                <div class="modal-dialog">
                    <div class="modal-content">  
                        <div class="modal-header">
                            <h4>Error</h4>
                            <span class="close" id="closeModal">&times;</span>
                        </div>   
                        <div class="modal-body">
                            <p id="errorText"></p>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </section>
    <footer>
        <p>2023 - Gutierrez Franco</p>
    </footer>
    <?php include 'scripts/cerrar_sesion.php' ?>

    <script src="../js/funciones_detalles_mi_publicacion.js"></script>
</body>
</html>