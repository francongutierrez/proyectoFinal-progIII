<?php

    include 'scripts/verificacion.php';
    include 'scripts/comprobar_verificacion_publicar.php';    

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_general.css" >
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_publicar_oferta.css" >
    <link rel="icon" type="image/x-icon" href="../img/icono.ico">
    <title>RapiBnB - Publicar oferta</title>

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
                    <h1>Publicar oferta de alquiler</h1>
                </div>
            </div>
            <div class="row">
                <div class="col mt-3 mb-3 animate-text">
                    <h5>Ingrese los datos a continuacion:</h5>
                </div>
            </div>

                <form action="" id="formularioPublicar" class="needs-validation" onsubmit="return validarForm();" method="POST" enctype="multipart/form-data" novalidate>
                    <div class="row">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" class="form-control" id="tituloInput" placeholder="Ingrese el titulo de su publicacion aqui" name="titulo" maxlength="50" required>
                            <div id="mensajeTituloError" class="is-invalid"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="descipcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcionInput" rows="3" placeholder="Ingrese la descripcion del alquiler aqui" name="descripcion" maxlength="500" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Ubicación</label>
                            <input type="text" class="form-control"  id="ubicacionInput" placeholder="Ingrese la ubicacion aqui" name="ubicacion" maxlength="100" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Tipo de propiedad</label>
                            <select name="tipo" id="tipoInput" class="form-select">
                                <option value="Privada">Privada</option>
                                <option value="Pública">Pública</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="etiquetas" class="form-label">Etiquetas</label>
                            <input type="text" class="form-control" id="etiquetasInput" placeholder="Ingrese las etiquetas aquí" name="etiquetas" maxlength="200" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <button type="button" class="btn btn-outline-success" id="botonAgregarEtiquetas" onclick="agregarEtiqueta()">Agregar etiquetas</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <div id="etiquetasContainer">
                                <!-- Aquí se mostrarán las etiquetas ingresadas -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="fotos" class="form-label">Ingrese las fotos</label>
                            <input class="form-control" type="file" id="fotos" multiple name="fotos[]" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="serviciosIncluidos" class="form-label">Ingrese los servicios incluidos</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="wifiCheckbox" name="wifiCheckbox" value="1">
                                <label class="form-check-label" for="wifiCheckbox">Wi-fi</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="limpiezaCheckbox" name="limpiezaCheckbox" value="3">
                                <label class="form-check-label" for="limpiezaCheckbox">Servicio de limpieza</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="cocheraCheckbox" name="cocheraCheckbox" value="5">
                                <label class="form-check-label" for="cocheraCheckbox">Cochera</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="tvCheckbox" name="tvCheckbox" value="2">
                                <label class="form-check-label" for="tvCheckbox">TV</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="desayunoCheckbox" name="desayunoCheckbox" value="4">
                                <label class="form-check-label" for="desayunoCheckbox">Desayuno</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="piscinaCheckbox" name="piscinaCheckbox" value="6">
                                <label class="form-check-label" for="inlineCheckbox3">Piscina</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-3 mb-3">
                            <label for="titulo" class="form-label">Costo por día</label>
                            <input type="number" class="form-control" id="costoInput" placeholder="Ingrese el costo por dia aqui" name="costo" min="1000" max="999999" required>
                        </div>
                    </div>
                    <div class="row">
                        <div>
                            <label for="titulo" class="form-label">Tiempo de permanencia (en dias)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <input type="number" class="form-control" id="tiempoMinimoInput" placeholder="Minimo" min="1" max="90" name="tiempo_minimo" required>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <input type="number" class="form-control" id="tiempoMaximoInput" placeholder="Maximo" min="1" max="90" name="tiempo_maximo" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Cupo de personas</label>
                            <input type="number" class="form-control" id="cupoInput" placeholder="Ingrese el maximo de personas" min="1" max="10" name="cupo" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-3">
                            <label for="titulo" class="form-label">(Campos opcionales)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-3">
                            <label for="titulo" class="form-label">Tiempo de vigencia de la oferta</label>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="titulo" class="form-label">Inicio: </label>
                            <input type="date" class="form-control" id="inicioInput" name="inicioVigencia" placeholder="Ingrese el inicio de la vigencia de la oferta" min="<?php echo date('Y-m-d', strtotime('+7 days')); ?>" max="2025-12-31">
                        </div>
                        <div class="col-md-6">
                            <label for="titulo" class="form-label">Fin:</label>
                            <input type="date" class="form-control" id="finInput" name="finVigencia" placeholder="Ingrese el fin de la vigencia de la oferta" min="<?php echo date('Y-m-d', strtotime('+7 days')); ?>" max="2025-12-31">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" id="colSubmit">
                            <button type="submit" class="btn btn-success" id="botonPublicar" name="publicar">Publicar oferta</button>
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
    
    include "scripts/insertar_propiedad.php";
    
    ?>


    </section>

    <!-- FOOTER -->
    <footer>
        <p>2023 - Gutierrez Franco</p>
    </footer>

    <?php include 'scripts/cerrar_sesion.php' ?>

    <script src="../js/funciones_publicar_oferta.js"></script>
</body>
</html>