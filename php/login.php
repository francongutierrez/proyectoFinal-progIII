<?php

if (isset($_SESSION['id_usuario'])) {
    session_destroy();
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/estilo_login.css">
    <link rel="icon" type="image/x-icon" href="../img/icono.ico">
    <title>Bienvenido a RappiBnB</title>
</head>
<body>
    <div class="container" id="mainContainer">
        <div class="row">
            <div class="col mt-3">
                <h1>Bienvenido a <img src="../img/logo2.png" width="300" alt=""></h1>
            </div>
        </div>
        <div class="row">
            <div class="col mt-3">
                <p>Descubra ahora las mejores propiedades para usted</p>
            </div>
        </div>
        <div class="container-fluid" id="subContainer">
        <form action="" method="POST">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese su email ">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Ingrese su contraseña">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <button type="submit" class="btn btn-outline-success">Ingresar</button>
                </div>
            </div>
            <div class="row">
                <div class="col mt-3">
                    <hr><p>No tiene una cuenta? <a href="../php/registro_usuario.php">Regístrese aquí</a></p>
                    <p>o</p>
                    <p> <a href="../php/login_administrador.php">Iniciar sesión como administrador</a></p>
                </div>
            </div>
        </form>
        </div>
        <div class="row">
            <div class="col">
                <?php

                    include 'scripts/autenticacion.php';

                ?>
            </div>
        </div>
    </div>




</body>
</html>