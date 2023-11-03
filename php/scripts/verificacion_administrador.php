<?php
    session_start();
    if (!isset($_SESSION['id_usuario']) || !isset( $_SESSION['es_administrador'])) {
        header('Location: login.php');
        exit();
    }
?>