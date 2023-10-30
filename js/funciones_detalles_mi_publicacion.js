/*// Selecciona todos los formularios con una clase específica, por ejemplo, "formularioPersonal"
const forms = document.querySelectorAll('form.formularioRespuesta');
const errorModal = document.getElementById('errorModal');
const closeModal = document.getElementById('closeModal');
const errorText = document.getElementById('errorText');

// Agrega un evento submit a cada formulario con la clase "formularioPersonal"
forms.forEach(function(form) {
  form.addEventListener('submit', function(event) {
    event.preventDefault();
    // Tu código para manejar el submit del formulario aquí
    const nuevaRespuesta = document.getElementById('nuevaRespuesta').value;
    const nuevaRespuestaInput = document.getElementById('nuevaRespuesta');
    let enviar = true;
    let errorMessage = "";

    if (nuevaRespuesta > 300 || nuevaRespuesta < 3) {
        errorMessage += '- La respuesta debe tener entre 3 y 300 caracteres.<br>';
        nuevaRespuestaInput.classList.add('is-invalid');
        nuevaRespuestaInput.classList.remove('is-valid');
        enviar = false;
    } else {
        nuevaRespuestaInput.classList.add('is-valid');
        nuevaRespuestaInput.classList.add('is-invalid');
    }

    errorText.innerHTML = errorMessage;
  
    if (enviar) {
        window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/detalles_mi_publicacion.php';
    } else {
        errorModal.style.display = 'block';
    }
  });
});

closeModal.addEventListener('click', function() {
    errorModal.style.display = 'none';
  });
  
  window.addEventListener('click', function(event) {
    if (event.target === errorModal) {
      errorModal.style.display = 'none';
    }
  });*/