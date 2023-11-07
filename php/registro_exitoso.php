<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_general.css" >
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_error_alquiler.css" >
    <link rel="icon" type="image/x-icon" href="../img/icono.ico">
    <title>RappiBnB - Registro exitoso</title>

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
            </div>
        </nav>
    </header>
    <section>
        <form action="">
            <div class="container" id="mainContainer">
                <div class="row">
                    <div class="col mt-3 animate-text colMensaje">
                        <img src="../img/valid.jpg" id="imgValid" alt="">
                        <h1>Se ha registrado en RapiBnB</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="mt-3">
                        <p>Gracias por formar parte de RapiBnB<p>
                        <p id="descripcionError">Desea iniciar sesion?<p>
                    </div>
                </div>
                <div class="row">
                    <div class="col" id="colSubmit">
                    <a href="../php/login.php"><button type="button" class="btn btn-success">Iniciar sesion</button></a>
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