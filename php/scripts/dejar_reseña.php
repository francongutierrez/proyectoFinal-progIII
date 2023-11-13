<?php


    include 'scripts/conexion_db.php';
    $estado_alquiler = 'pasada';

    $sql_usuario_alquilado = "SELECT id 
                            FROM alquileres 
                            WHERE id_usuario = ? 
                            AND id_propiedad = ? 
                            AND (estado = ? OR fecha_fin < CURRENT_DATE)";
    $stmt_usuario_alquilado = $conn->prepare($sql_usuario_alquilado);
    $stmt_usuario_alquilado->bind_param("iis", $_SESSION['id_usuario'], $_SESSION['selected_publicacion'], $estado_alquiler);
    $stmt_usuario_alquilado->execute();
    $result_usuario_alquilado = $stmt_usuario_alquilado->get_result();

    $sql_resena_hecha = "SELECT id FROM reseñas WHERE id_usuario = ? AND id_propiedad = ?";
    $stmt_resena_hecha = $conn->prepare($sql_resena_hecha);
    $stmt_resena_hecha->bind_param("ii", $_SESSION['id_usuario'], $_SESSION['selected_publicacion']);
    $stmt_resena_hecha->execute();
    $result_resena_hecha = $stmt_resena_hecha->get_result();

    if ($result_usuario_alquilado->num_rows == 1 && $result_resena_hecha->num_rows == 0) {
        echo '
        <div class="row">
            <div class="col">
                <h5>Alquilaste esta propiedad! Deseas dejar una reseña?</h5>
                <form method="POST" id="formResenaAlquilada" onsubmit="validarForm()">
                    <textarea name="resena-usuario" class="form-control mt-3" placeholder="Escribe tu reseña aquí" id="descripcionResena" maxlength="500"></textarea>
                    <input type="number" name="puntaje-resena-usuario" class="form-control mt-3" placeholder="Escribe tu puntaje aquí (del 1 al 5)" min="1" max="5" id="puntajeResena">
                    <button type="submit" name="guardar-resena" class="btn btn-success mt-3">Enviar reseña</button>
                </form>
            </div>
        </div>';
    } else {}

    $stmt_usuario_alquilado->close();
    $conn->close();

?>