<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_general.css" >
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_buscar_oferta.css" >
    <script src="../js/funciones_publicar_oferta.js"></script>
    <script src="../js/funciones_buscar_oferta.js"></script>
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
                            <img src="../img/test_image.jpg" alt="Foto de perfil" class="profile-image">
                        </button>
                        <div class="dropdown-content">
                            <a href="#">Mis alquileres</a>
                            <a href="#">Cerrrar sesion</a>
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
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="tituloInput" placeholder="Ingrese el titulo de su publicacion aqui">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Ubicacion</label>
                        <input type="text" class="form-control" id="ubicacionInput" placeholder="Ingrese la ubicacion aqui">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="etiquetas" class="form-label">Etiquetas</label>
                        <input type="text" class="form-control" id="etiquetasInput" placeholder="Ingrese las etiquetas aquí">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <button class="btn btn-outline-success" id="agregarEtiqueta" onclick="agregarEtiqueta()">Agregar Etiqueta</button>
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
                    <div class="col">
                        <label for="serviciosIncluidos" class="form-label">Ingrese los servicios incluidos</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="wifiCheckbox" value="wifi">
                            <label class="form-check-label" for="wifiCheckbox">Wi-fi</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="limpiezaCheckbox" value="limpieza">
                            <label class="form-check-label" for="limpiezaCheckbox">Servicio de limpieza</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cocheraCheckbox" value="cochera">
                            <label class="form-check-label" for="cocheraCheckbox">Cochera</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="tvCheckbox" value="tv">
                            <label class="form-check-label" for="tvCheckbox">TV</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="desayunoCheckbox" value="desayuno">
                            <label class="form-check-label" for="desayunoCheckbox">Desayuno</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="piscinaCheckbox" value="piscina">
                            <label class="form-check-label" for="inlineCheckbox3">Piscina</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mt-3">
                        <label for="titulo" class="form-label">Costo por dia</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <input type="range" class="form-range" min="0" max="100" value="50" id="miControlDeslizante" onchange="cambiarValor()">
                        <p>Valor actual: <span id="valorActual">50</span></p>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <label for="titulo" class="form-label">Maximo tiempo de permanencia (en dias)</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <input type="number" class="form-control" id="tiempoMinimoInput" placeholder="Maximo" min="1" max="90">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Cupo de personas</label>
                        <input type="number" class="form-control" id="costoInput" placeholder="Ingrese el maximo de personas">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3 mt-3" id="colSubmit">
                        <button type="submit" class="btn btn-success">Buscar oferta</button>
                        <button type="submit" class="btn btn-success">Mostrar todos</button>
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