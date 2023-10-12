<?php

    if (isset($_POST['cerrar-sesion'])) {
        session_start();
        session_destroy();
        header("Location: ../login.php");
        exit();
    }


?>