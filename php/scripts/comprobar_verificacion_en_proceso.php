<?php

    if ($_SESSION['certificacion'] == 1 || $_SESSION['certificacion_en_proceso'] == 1 ) {
        header("Location: error_verificacion.php");
        exit();
    } else {}

?>