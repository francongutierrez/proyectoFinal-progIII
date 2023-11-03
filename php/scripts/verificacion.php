<?php

session_start();

if (!isset($_SESSION['id_usuario']) || isset($_SESSION['es_administrador'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

?>