<?php

    include 'scripts/verificacion_administrador.php';  

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_general.css" >
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_exito_validacion.css">
    <link rel="icon" type="image/x-icon" href="../img/icono.ico">
    <title>RappiBnB - Solicitud aceptada</title>

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
                            <a href="">Mi perfil</a>
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
        <form action="">
            <div class="container" id="mainContainer">
                <div class="row">
                    <div class="col mt-3 animate-text colMensaje">
                        <img src="../img/valid.jpg" alt="">
                        <h1>Solicitud de verificación aceptada</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="mt-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col" id="colSubmit">
                    <a href="../php/solicitudes_de_verificacion.php" class="btn btn-success" id="botonVolver">Volver a validar solicitudes de verificación</a>
                    </div>
                </div>
            </div>
        </form>

    </section>
    <footer>
        <p>2023 - Gutierrez Franco</p>
    </footer>
</body>
</html>