<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilo_general.css" >
    <link rel="stylesheet" type="text/css" href="estilo_verificar_cuenta.css" >
    <script src="funciones_publicar_oferta.js"></script>
    <title>RappiBnB - Verificar cuenta</title>

</head>
<body>
    <header>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <div class="col-md-6">
                    <a class="navbar-brand" href="inicio.php">
                        <img src="RapiBnB.png" alt="Logo" width="50" class="d-inline-block align-text-top">
                        <p>RapiBnB</p>
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="dropdown">
                        <button class="menu-button">
                            <img src="test_image.jpg" alt="Foto de perfil" class="profile-image">
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
                    <div class="col mt-3 animate-text">
                        <h1>Verificar mi cuenta</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="mt-3 mb-3">
                        <label for="fotos" class="form-label">Ingrese la foto del frente y la foto de su documento</label>
                        <input class="form-control" type="file" id="fotos" multiple>
                    </div>
                </div>
                <div class="row">
                    <div class="col" id="colSubmit">
                        <button type="submit" class="btn btn-success">Enviar</button>
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