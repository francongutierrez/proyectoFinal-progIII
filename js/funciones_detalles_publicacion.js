// Imagenes

const images = document.querySelectorAll('.imagenPropiedad');

images.forEach((image) => {
    image.addEventListener('click', () => {
        image.classList.toggle('enlarged');
    });
});

// Mostrar o no mostrar respuesta






// *Manejo de la ventana modal*

const form = document.getElementById('formResena');
const errorModal = document.getElementById('errorModal');
const closeModal = document.getElementById('closeModal');
const errorText = document.getElementById('errorText');

form.addEventListener('submit', function(event) {
  event.preventDefault();

  const puntaje = document.getElementById('puntajeResena').value;
  const descripcion = document.getElementById('descripcionResena').value;

  let enviar = true;
  let errorMessage = "";

  if (puntaje < 1 || puntaje > 5) {
    errorMessage += '- El puntaje debe estar entre 1 y 5.<br>';
    enviar = false;
  }
  if (descripcion > 150) {
    errorMessage += '- La descripción debe tener menos de 150 caracteres.<br>';
    enviar = false;
  }

  errorText.innerHTML = errorMessage;
  
  if (enviar) {
    form.submit();
  } else {
    errorModal.style.display = 'block';
  }
});

closeModal.addEventListener('click', function() {
  errorModal.style.display = 'none';
});

window.addEventListener('click', function(event) {
  if (event.target === errorModal) {
    errorModal.style.display = 'none';
  }
});

// Cambio en el estilo de los input

function validarForm() {
    
    // Elementos
    let puntajeInput = document.getElementById('puntajeResena');
    let descripcionInput = document.getElementById('descripcionResena');


    // Valores
    let puntaje = document.getElementById('puntajeResena').value;
    let descripcion = document.getElementById('descripcionResena').value;

    // Controles

    if (puntaje > 5 || puntaje < 1) {
      puntajeInput.classList.add('is-invalid');
      puntajeInput.classList.remove('is-valid');
    } else {
      puntajeInput.classList.add('is-valid');
      puntajeInput.classList.remove('is-invalid');
    }

    if (descripcion.length > 150) {
      descripcionInput.classList.add('is-invalid');
      descripcionInput.classList.remove('is-valid');
    } else {
      descripcionInput.classList.add('is-valid');
      descripcionInput.classList.remove('is-invalid');
    }

}


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


