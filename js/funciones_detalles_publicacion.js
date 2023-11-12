// Imagenes

const images = document.querySelectorAll('.imagenPropiedad');

images.forEach((image) => {
    image.addEventListener('click', () => {
        image.classList.toggle('enlarged');
    });
});



// Mostrar formulario para editar reseña

function mostrarFormReseña() {
  let elemento = document.getElementById('formResena');
  let boton = document.getElementById('editarResena');

  if (elemento.style.display === 'none') {
      elemento.style.display = 'block';
      boton.innerText = 'Cancelar edición';
      boton.classList.add('btn-danger');
      boton.classList.remove('btn-success');
  } else {
      elemento.style.display = 'none';
      boton.innerText = 'Editar reseña';
      boton.classList.add('btn-success');
      boton.classList.remove('btn-danger');
  }
}


