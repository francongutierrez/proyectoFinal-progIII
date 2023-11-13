// *Manejo de la ventana modal*

const errorModal = document.getElementById('errorModal');
const closeModal = document.getElementById('closeModal');
const errorText = document.getElementById('errorText');


function validarForm() {
    // Valores
    let fechaInicio = new Date(document.getElementById('fechaInicio').value);
    let fechaFin = new Date(document.getElementById('fechaFin').value);
  
    // Elementos
    let fechaInicioInput = document.getElementById('fechaInicio');
    let fechaFinInput = document.getElementById('fechaFin');
    let enviar = true;
    let errorMessage = "";
  
    if (fechaInicio > fechaFin) {
      errorMessage += '- La fecha de fin no puede ser anterior a la de inicio.<br>';
      enviar = false;
      fechaInicioInput.classList.add('is-invalid');
      fechaInicioInput.classList.remove('is-valid');
      fechaFinInput.classList.add('is-invalid');
      fechaFinInput.classList.remove('is-valid');
    } else {
      fechaInicioInput.classList.remove('is-invalid');
      fechaInicioInput.classList.add('is-valid');
      fechaFinInput.classList.remove('is-invalid');
      fechaFinInput.classList.add('is-valid');
    }
  
    if (isNaN(fechaInicio.getTime()) || isNaN(fechaFin.getTime())) {
      errorMessage += '- Por favor, seleccione las fechas de inicio y de fin.<br>';
      enviar = false;
      fechaInicioInput.classList.add('is-invalid');
      fechaInicioInput.classList.remove('is-valid');
      fechaFinInput.classList.add('is-invalid');
      fechaFinInput.classList.remove('is-valid');
    }
  
    errorText.innerHTML = errorMessage;
  
    if (enviar) {
      return true;
    } else {
      errorModal.style.display = 'block';
      return false;
    }
  }
  

closeModal.addEventListener('click', function() {
  errorModal.style.display = 'none';
});

window.addEventListener('click', function(event) {
  if (event.target === errorModal) {
    errorModal.style.display = 'none';
  }
});