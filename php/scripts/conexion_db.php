<?php


    $servername = 'localhost';
    $username = 'user_rapibnb';
    $password = 'helloRAPIBNB';
    $database = 'rapibnb';

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die('Error de conexion: ' . $conn->connect_error);
    }

?>