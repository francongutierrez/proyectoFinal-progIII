// *Manejo de la ventana modal*
/*
const form = document.getElementById('formularioBuscar');
const errorModal = document.getElementById('errorModal');
const closeModal = document.getElementById('closeModal');
const errorText = document.getElementById('errorText');

form.addEventListener('submit', function(event) {
  event.preventDefault();

  const titulo = document.getElementById('tituloInput').value;
  const ubicacion = document.getElementById('ubicacionInput').value;
  const costo = document.getElementById('costoInput').value;
  const tiempoMaximo = document.getElementById('tiempoMaximoInput').value;
  const cupo = document.getElementById('cupoInput').value;
  const inicioDisponibilidad = document.getElementById('inicioDisponibilidad').value;
  const finDisponibilidad = document.getElementById('finDisponibilidad').value;

  let enviar = true;
  let errorMessage = "";

  if (titulo.length > 25) {
    errorMessage += '- El título debe tener menos de 25 caracteres.<br>';
    enviar = false;
  }
  if (ubicacion.length > 100) {
    errorMessage += '- La ubicación debe tener menos de 100 caracteres.<br>';
    enviar = false;
  }
  if (tiempoMaximo > 90 || tiempoMaximo < 1) {
    errorMessage += '- El tiempo minimo debe estar entre 1 y 90 dias.<br>';
    enviar = false;
  }
  if (costo != "" && (costo > 999999 || costo < 1000)) {
    errorMessage += '- El costo por dia debe ser de entre $999.999,00 y $1.000,00.<br>';
    enviar = false;
  }
  if (cupo != "" && (cupo < 1 || cupo > 10)) {
    errorMessage += '- El cupo de personas debe ser entre 1 y 10.<br>';
    enviar = false;
  }
  if (inicioDisponibilidad == "" || finDisponibilidad == "") {
    errorMessage += '- No ha especificado las fechas de disponibilidad.<br>';
    enviar = false;
  }


errorText.innerHTML = errorMessage;
  
if (!enviar) {
  errorModal.style.display = 'block';
} else {
  window.location.href = 'http://localhost/ProgramacionIII/proyectoFinal/php/resultados.php';
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
*/
// Cambio en el estilo de los input
/*
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
    let titulo = document.getElementById('tituloInput').value;
    let ubicacion = document.getElementById('ubicacionInput').value;
    let tiempoMaximo = document.getElementById('tiempoMaximoInput').value;
    let costo = document.getElementById('costoInput').value;
    let cupo = document.getElementById('cupoInput').value;
    let inicioDisponibilidad = document.getElementById('inicioDisponibilidad').value;
    let finDisponibilidad = document.getElementById('finDisponibilidad').value;



    // Controles

    if (titulo.length > 25) {
      tituloInput.classList.add('is-invalid');
    } else {
      tituloInput.classList.remove('is-invalid');
    }

    if (ubicacion.length > 25) {
      ubicacionInput.classList.add('is-invalid');
    } else {
      ubicacionInput.classList.remove('is-invalid');
    }

    if (costo != null && (costo > 999999 || costo < 1000)) {
      costoInput.classList.add('is-invalid');
    } else {
      costoInput.classList.remove('is-invalid');
    }

    if (tiempoMaximo > 90 || tiempoMaximo < 1) {
      tiempoMaximoInput.classList.add('is-invalid');
      tiempoMaximoInput.classList.remove('is-valid');
    } else {
      tiempoMaximoInput.classList.add('is-valid');
      tiempoMaximoInput.classList.remove('is-invalid');
    }

    if (tiempoMaximo == '') {
      tiempoMaximoInput.classList.add('is-invalid');
      tiempoMaximoInput.classList.remove('is-valid');
    } else {
      tiempoMaximoInput.classList.add('is-valid');
      tiempoMaximoInput.classList.remove('is-invalid');
    }



    if (cupo != '' && (cupo < 1 || cupo > 10)) {
      cupoInput.classList.add('is-invalid');
    } else {
      cupoInput.classList.remove('is-invalid');
    }

    if (inicioDisponibilidad == "" || finDisponibilidad == "") {
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

}

*/