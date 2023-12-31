<?php
    
    include "scripts/verificacion_administrador.php";

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/estilo_general.css" type="text/css">
    <link rel="stylesheet" href="../estilos/estilo_inicio.css" type="text/css">
    <link rel="icon" type="image/x-icon" href="../img/icono.ico">
    <title>RapiBnB - Inicio</title>
</head>
<body>
    <header>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <div class="col-md-6">
                    <a class="navbar-brand" href="../php/inicio_administrador.php">
                        <img src="../img/RapiBnB.png" alt="Logo" width="50" class="d-inline-block align-text-top">
                        <p>RapiBnB</p>
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="dropdown">
                        <button class="menu-button">
                            <!-- <img src="../img/test_image.jpg" alt="Foto de perfil" class="profile-image"> -->


                            <?php
                            // Mostrar la imagen de perfil del usuario
                            if ($_SESSION['foto_usuario']) {
                                // Codifica la imagen en Base64
                                $imagen_codificada = base64_encode($_SESSION['foto_usuario']);
                                // Muestra la imagen en el documento HTML
                                echo '<img src="data:image/jpeg;base64,' . $imagen_codificada . '" alt="Foto de perfil" class="profile-image">';
                            } else {
                                echo "Imagen no encontrada";
                            }

                            ?>


                        </button>
                        <div class="dropdown-content">
                            <a href="">Sesión iniciada como administrador</a>
                            <a href="mi_perfil_administrador.php">Mi perfil</a>
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
        <div class="container" id="mainContainer">
            <div class="row">
                <div class="col mb-3 animate-text">
                    <h1>
                    <?php echo $_SESSION['nombre_usuario'].","?>
                    
                    <?php

                        if ($_SESSION['sexo'] == 'm') {
                            echo "bienvenido a";
                        }
                        else if ($_SESSION['sexo'] == 'f') {
                            echo "bienvenida a";
                        } else {
                            echo "bienvenide a";
                        }

                    ?>

                    <img src="../img/logo2.png" width="300" alt=""></h1>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3 animate-text">
                    <p>Qué desea hacer?</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <a href="solicitudes_de_verificacion.php" class="btn btn-outline-success">Validar solicitudes de verificación</a>
                </div>
                <div class="col-lg-6">
                    <a href="publicaciones_pendientes.php" class="btn btn-outline-success">Dar de alta publicaciones pendientes</a>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <p>2023 - Gutierrez Franco</p>
    </footer>
    <?php include 'scripts/cerrar_sesion.php' ?>
</body>
</html>