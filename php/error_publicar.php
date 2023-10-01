<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/estilo_general.css" type="text/css">
    <link rel="stylesheet" href="../estilos/estilo_error_publicar.css" type="text/css">
    <title>RappiBnB - Inicio</title>
</head>
<body>
    <header>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="../php/inicio.php">
                    <img src="" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    RappiBnB
                </a>
            </div>
        </nav>
    </header>
    <section>
        <div class="container" id="mainContainer">
            <div class="row">
                <div class="col">
                    <h1>Error</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>No puede publicar mas de una propiedad si no es un usuario verificado</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Desea verificar su cuenta?</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="../php/verificar_cuenta.php" class="btn btn-outline-primary mt-3">Verificar mi cuenta</a>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <p>2023 - Gutierrez Franco</p>
    </footer>
</body>
</html>