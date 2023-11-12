<?php

    include 'scripts/verificacion.php';
    if ($_SESSION['certificacion'] == 0) {
        include 'scripts/comprobar_ofertas_usuario.php';
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_general.css" >
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_buscar_oferta.css">
    <link rel="icon" type="image/x-icon" href="../img/icono.ico">
    <title>RappiBnB - Buscar oferta</title>

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
        <form action="" method="POST" id="formularioBuscar" onsubmit="return validarForm()">
            <div class="container" id="mainContainer">
                <div class="row">
                    <div class="col mt-3 mb-3 animate-text">
                        <h1>Buscar oferta de alquiler</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3 animate-text">
                        <h4>Ingrese las especificaciones de su alquiler:</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título</label>
                        <input type="text" class="form-control" id="tituloInput" name="titulo" placeholder="Ingrese el título de su publicación aquí" maxlength="50">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Ubicación</label>
                        <input type="text" class="form-control" id="ubicacionInput" name="ubicacion" placeholder="Ingrese la ubicación aquí" maxlength="100">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="etiquetas" class="form-label">Etiquetas</label>
                        <input type="text" class="form-control" id="etiquetasInput" name="etiquetas" placeholder="Ingrese las etiquetas aquí" maxlength="100">
                    </div>
                </div>
                <div class="row">
                    <div class="col mt-3">
                        <label for="titulo" class="form-label">Costo por día máximo</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <input type="number" class="form-control" min="0" max="999999" id="costoInput" name="costo" placeholder="Ingrese aquí el costo máximo por dia">
                    </div>
                </div>
                <div class="row">
                    <div>
                        <label for="titulo" class="form-label">Máximo tiempo de permanencia (en días)</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <input type="number" class="form-control" id="tiempoMaximoInput" name="tiempoMaximo" placeholder="Ingrese el máximo de días aquí" min="1" max="90">
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="titulo" class="form-label">Cupo de personas</label>
                        <input type="number" class="form-control" id="cupoInput" name="cupo" min="1" max="10" placeholder="Ingrese el máximo de personas aquí">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="titulo" class="form-label">Fechas de disponibilidad:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="titulo" class="form-label">Inicio:</label>
                        <input type="date" name="inicioDisponibilidad" id="inicioDisponibilidad" class="form-control" min="<?php echo date('Y-m-d', strtotime('+7 days')); ?>" max="2025-12-31">
                    </div>
                    <div class="col mb-3">
                        <label for="titulo" class="form-label">Fin:</label>
                        <input type="date" name="finDisponibilidad" id="finDisponibilidad" class="form-control" min="<?php echo date('Y-m-d', strtotime('+7 days')); ?>" max="2025-12-31">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3 mt-3" id="colSubmit">
                        <button type="submit" class="btn btn-success" name="buscar">Buscar ofertas</button>
                    </div>
                </div>
            </div>         
        </form>
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

        <?php include 'scripts/busqueda.php'; ?>
        
    </section>
    <footer>
        <p>2023 - Gutierrez Franco</p>
    </footer>

    
    <script src="../js/funciones_buscar_oferta.js"></script>
</body>
</html>