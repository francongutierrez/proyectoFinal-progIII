<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_general.css" >
    <link rel="stylesheet" type="text/css" href="../estilos/estilo_publicar_oferta.css" >

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

    <!-- CONTAINER PRINCIPAL -->
    <section>
        <div class="container" id="mainContainer">
            <div class="row">
                <div class="col mt-3 animate-text">
                    <h1>Ofertar una propiedad</h1>
                </div>
            </div>
            <div class="row">
                <div class="col mt-3 mb-3 animate-text">
                    <h5>Ingrese los datos a continuacion:</h5>
                </div>
            </div>

                <form action="" id="formularioPublicar" class="needs-validation" novalidate onsubmit="" method="POST">
                    <div class="row">
                        <div class="mb-3">
                            <label for="numeroPropiedad" class="form-label">Numero de propiedad</label>
                            <input type="number" class="form-control" id="numeroPropiedadInput" placeholder="Ingrese el numero de su propiedad aqui" name="numeroPropiedad" required>
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
                            <button type="submit" class="btn btn-success" id="botonPublicar">Ofertar propiedad</button>
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
    

    // Script de insercion


    
    ?>


    </section>

    <!-- FOOTER -->
    <footer>
        <p>2023 - Gutierrez Franco</p>
    </footer>

    <!-- <script src="../js/test.js"></script> -->
</body>
</html>