// *Manejo de la ventana modal*

const form = document.getElementById('formularioBuscar');
const errorModal = document.getElementById('errorModal');
const closeModal = document.getElementById('closeModal');
const errorText = document.getElementById('errorText');

function validarForm() {

    // Elementos
    let tituloInput = document.getElementById('tituloInput');
    let ubicacionInput = document.getElementById('ubicacionInput');
    let tiempoMaximoInput = document.getElementById('tiempoMaximoInput');
    let costoInput = document.getElementById('costoInput');
    let cupoInput = document.getElementById('cupoInput');
    let inicioDisponibilidadInput = document.getElementById('inicioDisponibilidad');
    let finDisponibilidadInput = document.getElementById('finDisponibilidad');


    // Valores
    const titulo = document.getElementById('tituloInput').value;
    const ubicacion = document.getElementById('ubicacionInput').value;
    const costo = parseFloat(document.getElementById('costoInput').value);
    const tiempoMaximo = parseInt(document.getElementById('tiempoMaximoInput').value);
    const cupo = parseInt(document.getElementById('cupoInput').value);
    const inicioDisponibilidad = document.getElementById('inicioDisponibilidad').value;
    const finDisponibilidad = document.getElementById('finDisponibilidad').value;

    let enviar = true;
    let errorMessage = "";

    if (titulo.length > 25) {
      errorMessage += '- El título debe tener menos de 25 caracteres.<br>';
      enviar = false;
      tituloInput.classList.add('is-invalid');
    } else {
      tituloInput.classList.remove('is-invalid');
    }

    if (ubicacion.length > 100) {
      errorMessage += '- La ubicación debe tener menos de 100 caracteres.<br>';
      enviar = false;
      ubicacionInput.classList.add('is-invalid');
    } else {
      ubicacionInput.classList.remove('is-invalid');
    }

    if (tiempoMaximo > 90 || tiempoMaximo < 1 || isNaN(tiempoMaximo)) {
      errorMessage += '- El tiempo mínimo debe estar entre 1 y 90 días.<br>';
      enviar = false;
      tiempoMaximoInput.classList.add('is-invalid');
    } else {
      tiempoMaximoInput.classList.remove('is-invalid');
    }

    if (costo != "" && (costo > 999999 || costo < 1000)) {
      errorMessage += '- El costo por día debe ser de entre $999.999,00 y $1.000,00.<br>';
      enviar = false;
      costoInput.classList.add('is-invalid');
    } else {
      costoInput.classList.remove('is-invalid');
    }

    if (cupo != "" && (cupo < 1 || cupo > 10)) {
      errorMessage += '- El cupo de personas debe ser entre 1 y 10.<br>';
      enviar = false;
      cupoInput.classList.add('is-invalid');
    } else {
      cupoInput.classList.remove('is-invalid');
    }

    if (inicioDisponibilidad == "" || finDisponibilidad == "") {
      errorMessage += '- No ha especificado las fechas de disponibilidad.<br>';
      enviar = false;
      inicioDisponibilidadInput.classList.add('is-invalid');
      inicioDisponibilidadInput.classList.remove('is-valid');
      finDisponibilidadInput.classList.add('is-invalid');
      finDisponibilidadInput.classList.remove('is-valid');
    } else {
      inicioDisponibilidadInput.classList.add('is-valid');
      inicioDisponibilidadInput.classList.remove('is-invalid');
      finDisponibilidadInput.classList.add('is-valid');
      finDisponibilidadInput.classList.remove('is-invalid');
    }

  errorText.innerHTML = errorMessage;
    
  if (enviar) {
    return true;
  } else {
    errorModal.style.display = 'block';
    return false;
  }
};

closeModal.addEventListener('click', function() {
  errorModal.style.display = 'none';
});

window.addEventListener('click', function(event) {
  if (event.target === errorModal) {
    errorModal.style.display = 'none';
  }
});


