<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilo_publicar_oferta.css" >
    <script src="funciones_publicar_oferta.js"></script>
    <title>RappiBnB - Publicar oferta</title>

</head>
<body>
    <header>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    RappiBnB
                </a>
            </div>
        </nav>
    </header>
    <section>
        <form action="">
            <div class="container" id="mainContainer">
                <div class="row">
                    <div class="col mt-3">
                        <h1>Publicar oferta de alquiler</h1>
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
                        <label for="descipcion" class="form-label">Descripcion</label>
                        <textarea class="form-control" id="descipcionInput" rows="3" placeholder="Ingrese la descripcion del alquiler aqui"></textarea>
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
                        <button class="btn btn-primary" id="agregarEtiqueta" onclick="agregarEtiqueta()">Agregar Etiqueta</button>
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
                        <input class="form-control" type="file" id="fotos" multiple>
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
                    <div class="mt-3 mb-3">
                        <label for="titulo" class="form-label">Costo por dia</label>
                        <input type="number" class="form-control" id="costoInput" placeholder="Ingrese el costo por dia aqui">
                    </div>
                </div>
                <div class="row">
                    <div>
                        <label for="titulo" class="form-label">Tiempo de permanencia (en dias)</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <input type="number" class="form-control" id="tiempoMinimoInput" placeholder="Minimo" min="1" max="90">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <input type="number" class="form-control" id="tiempoMaximoInput" placeholder="Maximo" min="1" max="90">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Cupo de personas</label>
                        <input type="number" class="form-control" id="costoInput" placeholder="Ingrese el maximo de personas">
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
                        <input type="date" class="form-control" id="costoInput" placeholder="Ingrese el maximo de personas">
                    </div>
                    <div class="col-md-6">
                        <label for="titulo" class="form-label">Fin:</label>
                        <input type="date" class="form-control" id="costoInput" placeholder="Ingrese el maximo de personas">
                    </div>
                </div>
                <div class="row">
                    <div class="col" id="colSubmit">
                        <button type="submit" class="btn btn-primary">Publicar oferta</button>
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