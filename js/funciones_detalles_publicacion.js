// Imagenes

const images = document.querySelectorAll('.imagenPropiedad');

images.forEach((image) => {
    image.addEventListener('click', () => {
        image.classList.toggle('enlarged');
    });
});

// Mostrar o no mostrar respuesta

function mostrarForm() {
    let elemento = document.getElementById('formularioRespuesta');
    let boton = document.getElementById('editarRespuesta');
    let ocultar = document.getElementById('ocultar');

    if (elemento.style.display === 'none') {
        elemento.style.display = 'block';
        ocultar.style.display = 'none';
        boton.innerText = 'Cancelar edición';
        boton.classList.add('btn-danger');
        boton.classList.remove('btn-success');
    } else {
        elemento.style.display = 'none';
        ocultar.style.display = 'block';
        boton.innerText = 'Editar respuesta';
        boton.classList.add('btn-success');
        boton.classList.remove('btn-danger');
    }
}

function cambiarRespuesta() {
    let nuevaRespuesta = document.getElementById('nuevaRespuesta');
    let viejaRespuesta = document.getElementById('respuestaGuardada');
    let elemento = document.getElementById('formularioRespuesta');
    let boton = document.getElementById('editarRespuesta');
    let ocultar = document.getElementById('ocultar');

    viejaRespuesta.innerText = nuevaRespuesta.value;
    elemento.style.display = 'none';
    ocultar.style.display = 'block';
    boton.innerText = 'Editar respuesta';
    boton.classList.add('btn-success');
    boton.classList.remove('btn-danger');
}


