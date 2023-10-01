<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/estilo_general.css" type="text/css">
    <link rel="stylesheet" href="../estilos/estilo_inicio.css" type="text/css">
    <title>RapiBnB - Inicio</title>
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
                            <img src="../img/test_image.jpg" alt="Foto de perfil" class="profile-image">
                        </button>
                        <div class="dropdown-content">
                            <a href="#">Mis alquileres</a>
                            <a href="#"><span class="cerrarSesion">Cerrar sesion</span></a>
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
                    <h1>Bienvenido a <img src="../img/logo2.png" width="300" alt=""></h1>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3 animate-text">
                    <p>Que desea hacer?</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <a href="../php/buscar_oferta.php" class="btn btn-outline-success">Alquilar una propiedad</a>
                </div>
                <div class="col-lg-4">
                    <a href="../php/publicar_oferta.php" class="btn btn-outline-success">Publicar una oferta de alquiler</a>
                </div>
                <div class="col-lg-4">
                    <a href="../php/verificar_cuenta.php" class="btn btn-outline-success">Verificar mi cuenta</a>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <p>2023 - Gutierrez Franco</p>
    </footer>
</body>
</html>