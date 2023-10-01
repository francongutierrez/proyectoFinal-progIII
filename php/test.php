<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="../js/test.js"></script>
    <title>Mi Página</title> 
</head>
<body>
    <form action="" class="needs-validation" onsubmit="return validarFormulario()" novalidate>
        <div class="row">
            <div class="col-md-6 mb-3" id="contenedor-titulo">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="tituloInput" placeholder="Ingrese el titulo de su publicacion aqui" required>
                <div id="mensajeTituloError" class="is-invalid">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <button type="submit">Enviar</button>
            </div>
        </div>

    </form>


    </form>
    <div class="container">
        <div class="row">
                <div class="mb-3">
                    <button onclick=test()>Enviar</button>
                </div>
                <div id="testmensaje">

                </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
