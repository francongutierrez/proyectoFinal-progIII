<?php

    if (isset($_POST["editarRespuesta"])) {
        include "../php/scripts/conexion_db.php";
        $textoRespuesta = $_POST["nuevaRespuesta"];
        $id_usuario_resena = $_POST["id_usuario_resena"];

        $sql_editar_respuesta = "UPDATE reseñas SET respuesta = ? WHERE id_usuario = ? AND id_propiedad = ?";
        $stmt_editar_respuesta = $conn->prepare($sql_editar_respuesta);
        $stmt_editar_respuesta->bind_param("sii", $textoRespuesta, $id_usuario_resena, $_SESSION["selected_publicacion"]);

        if ($stmt_editar_respuesta->execute()) {
            echo '<div class="row">
                <div class="col">
                    <h6 id="mensajeActualizacionRespuesta">Se ha actualizado la respuesta</h6>
                </div>
            </div>';
        } else {
            echo '<div class="row">
                <div class="col">
                    <h6>Error al actualizar la respuesta</h6>
                </div>
            </div>';
        }

    }


?>