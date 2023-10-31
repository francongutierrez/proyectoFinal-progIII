<?php

    if (isset($_POST["wifiCheckbox"])) {
        $valor_checkbox_wifi = $_POST["wifiCheckbox"];
        $insertar_incluye_wifi = "INSERT INTO incluye (id_propiedad, id_servicio) VALUES ($id_publicacion, $valor_checkbox_wifi)";
        $conn->query($insertar_incluye_wifi);
    }
    if (isset($_POST["limpiezaCheckbox"])) {
        $valor_checkbox_limpieza = $_POST["limpiezaCheckbox"];
        $insertar_incluye_limpieza = "INSERT INTO incluye (id_propiedad, id_servicio) VALUES ($id_publicacion, $valor_checkbox_limpieza)";
        $conn->query($insertar_incluye_limpieza);
    }
    if (isset($_POST["cocheraCheckbox"])) {
        $valor_checkbox_cochera = $_POST["cocheraCheckbox"];
        $insertar_incluye_cochera = "INSERT INTO incluye (id_propiedad, id_servicio) VALUES ($id_publicacion, $valor_checkbox_cochera)";
        $conn->query($insertar_incluye_cochera);
    }
    if (isset($_POST["tvCheckbox"])) {
        $valor_checkbox_tv = $_POST["tvCheckbox"];
        $insertar_incluye_tv = "INSERT INTO incluye (id_propiedad, id_servicio) VALUES ($id_publicacion, $valor_checkbox_tv)";
        $conn->query($insertar_incluye_tv);
    }
    if (isset($_POST["desayunoCheckbox"])) {
        $valor_checkbox_desayuno = $_POST["desayunoCheckbox"];
        $insertar_incluye_desayuno = "INSERT INTO incluye (id_propiedad, id_servicio) VALUES ($id_publicacion, $valor_checkbox_desayuno)";
        $conn->query($insertar_incluye_desayuno);
    }
    if (isset($_POST["piscinaCheckbox"])) {
        $valor_checkbox_piscina = $_POST["piscinaCheckbox"];
        $insertar_incluye_piscina = "INSERT INTO incluye (id_propiedad, id_servicio) VALUES ($id_publicacion, $valor_checkbox_piscina)";
        $conn->query($insertar_incluye_piscina);
    }

?>