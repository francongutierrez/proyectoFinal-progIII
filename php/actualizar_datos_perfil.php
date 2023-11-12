<?php
    include 'scripts/verificacion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_general.css" >
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_actualizar_datos_perfil.css" >
    <link rel="icon" type="image/x-icon" href="../img/icono.ico">
    <title>RapiBnB - Actualizar datos del perfil</title>

</head>
<body>
    
    <!-- NAVBAR -->
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

    <!-- CONTAINER PRINCIPAL -->
    <section>
        <div class="container" id="mainContainer">
            <div class="row">
                <div class="col mt-3 animate-text">
                    <h1>Modificar mis datos</h1>
                </div>
            </div>
            <div class="row">
                <div class="col mt-3 mb-3 animate-text" id="mensajeAtencion">
                    <h5>ATENCI&Oacute;N: Los datos que no ingrese en el siguiente formulario permanecerán tal como estaban. Si usted es un usuario verificado, una vez que modifique sus datos deberá volver a adjuntar la documentación de verificación</h5>
                </div>
            </div>
            <div class="row">
                <div class="col mt-3 mb-3 animate-text">
                    <h5>Ingrese sus datos a continuación:</h5>
                </div>
            </div>

                <form action="" id="formularioRegistro" class="needs-validation" method="POST" novalidate enctype="multipart/form-data" onsubmit="return validarForm()">
                    <div class="row">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreInput" placeholder="Ingrese su nombre aqui" name="nombre" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input class="form-control" id="apellidoInput" rows="3" placeholder="Ingrese su apellido aqui" name="apellido" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="ciudad" class="form-label">Ciudad</label>
                            <input type="text" class="form-control" id="ciudadInput" rows="3" placeholder="Ingrese su ciudad aqui" name="ciudad" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control"  id="emailInput" placeholder="Ingrese su correo electrónico aqui" name="email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="contrasena" class="form-label">Contraseña</label>
                            <input type="password" class="form-control"  id="contrasenaInput" placeholder="Ingrese su contraseña aqui" name="contrasena" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="contrasena2" class="form-label">Ingrese nuevamente su contraseña</label>
                            <input type="password" class="form-control"  id="contrasenaInput2" placeholder="Ingrese su contraseña aqui" name="contrasena2" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="number" class="form-control"  id="telefonoInput" placeholder="Ingrese su teléfono aqui" name="telefono" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="intereses" class="form-label">Intereses</label>
                            <textarea type="textarea" class="form-control" id="interesesInput" placeholder="Ingrese sus intereses aquí" name="intereses" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="fotos" class="form-label">Cambiar la foto de perfil</label>
                            <input class="form-control" type="file" id="fotoInput" name="foto" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-3 mb-3">
                            <label for="bio" class="form-label">Bio:</label>
                            <textarea class="form-control" id="bioInput" placeholder="Ingrese informacion sobre usted aqui" name="bio" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" id="colSubmit">
                            <button type="submit" class="btn btn-success" id="botonActualizar" name="actualizar" value="actualizar">Actualizar</button>
                        </div>
                    </div>
                </form>
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
        </div>

    <?php
    

    // Script de actualizacion
    include "../php/scripts/modificacion_datos_perfil.php";
    
    ?>


    </section>

    <!-- FOOTER -->
    <footer>
        <p>2023 - Gutierrez Franco</p>
    </footer>

    <script src="../js/funciones_actualizar_datos.js"></script>
</body>
</html>