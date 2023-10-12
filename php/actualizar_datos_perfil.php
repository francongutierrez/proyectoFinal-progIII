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
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_publicar_oferta.css" >

    <title>RapiBnB - Registrarse</title>

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
                            <!-- <img src="../img/test_image.jpg" alt="Foto de perfil" class="profile-image"> -->


                            <?php

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
                            <a href="mi_perfil.php">Mi perfil</a>
                            <a href="mis_alquileres.php">Mis alquileres</a>
                            <form action="" method="POST">
                                <button type="submit" name="cerrar-sesion">
                                    <a href="#"><span class="cerrarSesion">Cerrar sesion</span></a>
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
                <div class="col mt-3 mb-3 animate-text">
                    <h5>ATENCION: Los datos que no ingrese permaneceran tal como estaban. Si es un usuario verificado, una vez que modifique sus datos debera volver a adjuntar la documentacion de verificacion</h5>
                </div>
            </div>
            <div class="row">
                <div class="col mt-3 mb-3 animate-text">
                    <h5>Ingrese sus datos a continuacion:</h5>
                </div>
            </div>

                <form action="" id="formularioRegistro" class="needs-validation" novalidate onsubmit="validarForm()" method="POST" enctype="multipart/form-data">
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
                            <label for="email" class="form-label">Correo electronico</label>
                            <input type="email" class="form-control"  id="emailInput" placeholder="Ingrese su email aqui" name="email" required>
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
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="number" class="form-control"  id="telefonoInput" placeholder="Ingrese su telefono aqui" name="telefono" required>
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
                            <button type="submit" class="btn btn-success" id="botonPublicar">Actualizar</button>
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
    
    
    ?>


    </section>

    <!-- FOOTER -->
    <footer>
        <p>2023 - Gutierrez Franco</p>
    </footer>

    <script src="../js/funciones_registro_usuario.js"></script>
</body>
</html>