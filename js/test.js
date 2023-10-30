// *Manejo de la ventana modal*

const form = document.getElementById('formularioPublicar');
const errorModal = document.getElementById('errorModal');
const closeModal = document.getElementById('closeModal');
const errorText = document.getElementById('errorText');

form.addEventListener('submit', function(event) {
  event.preventDefault();

  const titulo = document.getElementById('tituloInput').value;
  const descripcion = document.getElementById('descripcionInput').value;
  const ubicacion = document.getElementById('ubicacionInput').value;
  const costo = document.getElementById('costoInput').value;
  const tiempoMinimo = document.getElementById('tiempoMinimoInput').value;
  const tiempoMaximo = document.getElementById('tiempoMaximoInput').value;
  const fotos = document.getElementById('fotos');
  const cupo = document.getElementById('cupoInput').value;

  let enviar = true;
  let errorMessage = "";

  if (titulo.length < 5 || titulo.length > 25) {
    errorMessage += '- El titulo debe tener entre 5 y 25 caracteres.<br>';
    enviar = false;
  }
  if (descripcion.length < 5 || descripcion.length > 499) {
    errorMessage += '- La descripción debe tener entre 5 y 500 caracteres.<br>';
    enviar = false;
  }
  if (ubicacion.length < 5 || ubicacion.length > 25) {
    errorMessage += '- La ubicacion debe tener entre 5 y 25 caracteres.<br>';
    enviar = false;
  }

  if (tiempoMinimo > 90 || tiempoMinimo < 1) {
    errorMessage += '- El tiempo minimo debe estar entre 1 y 90 dias.<br>';
    enviar = false;
  }
  if (tiempoMinimo > tiempoMaximo) {
    errorMessage += '- El tiempo minimo debe ser menor al tiempo maximo.<br>';
    enviar = false;
  }
  if (tiempoMaximo > 90 || tiempoMaximo < 1) {
    errorMessage += '- El tiempo minimo debe estar entre 1 y 90 dias.<br>';
    enviar = false;
  }
  if (costo > 999999 || costo < 1000) {
    errorMessage += '- El costo por dia debe ser de entre $999.999,00 y $1.000,00.<br>';
    enviar = false;
  }
  if (cupo < 1 || cupo > 10) {
    errorMessage += '- El cupo de personas debe ser entre 1 y 10<br>';
    enviar = false;
  }

  if (fotos.files.length === 0) {
    errorMessage += '- No ha seleccionado ninguna foto.<br>';
    enviar = false;
  }
  if (fotos.files.length > 10) {
    errorMessage += '- Puede subir 10 fotos como maximo.<br>';
    enviar = false;
  }

  for (let i = 0; i < fotos.files.length; i++) {
    let file = fotos.files[i];
    if (file.type.startsWith('image/')) {
      
    } else {
      errorMessage += '- Ha subido un archivo que no es una imagen<br>';
      enviar = false;
      break;
    }
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
    let tituloInput = document.getElementById('tituloInput');
    let descripcionInput = document.getElementById('descripcionInput');
    let ubicacionInput = document.getElementById('ubicacionInput');
    let tiempoMinimoInput = document.getElementById('tiempoMinimoInput');
    let tiempoMaximoInput = document.getElementById('tiempoMaximoInput');
    let costoInput = document.getElementById('costoInput');
    let fotosInput = document.getElementById('fotos');
    let cupoInput = document.getElementById('cupoInput');


    // Valores
    let titulo = document.getElementById('tituloInput').value;
    let descripcion = document.getElementById('descripcionInput').value;
    let ubicacion = document.getElementById('ubicacionInput').value;
    let tiempoMinimo = document.getElementById('tiempoMinimoInput').value;
    let tiempoMaximo = document.getElementById('tiempoMaximoInput').value;
    let costo = document.getElementById('costoInput').value;
    let cupo = document.getElementById('cupoInput').value;



    // Controles

    if (titulo.length < 5 || titulo.length > 25) {
      tituloInput.classList.add('is-invalid');
      tituloInput.classList.remove('is-valid');
    } else {
      tituloInput.classList.add('is-valid');
      tituloInput.classList.remove('is-invalid');
    }


    if (descripcion.length < 5 || descripcion.length > 499) {
      descripcionInput.classList.add('is-invalid');
      descripcionInput.classList.remove('is-valid');

    } else {
      descripcionInput.classList.add('is-valid');
      descripcionInput.classList.remove('is-invalid');
    }

    if (ubicacion.length < 5 || ubicacion.length > 25) {
      ubicacionInput.classList.add('is-invalid');
      ubicacionInput.classList.remove('is-valid');
    } else {
      ubicacionInput.classList.add('is-valid');
      ubicacionInput.classList.remove('is-invalid');
    }

    if (costo > 999999 || costo < 1000) {
      costoInput.classList.add('is-invalid');
      costoInput.classList.remove('is-valid');
    } else {
      costoInput.classList.add('is-valid');
      costoInput.classList.remove('is-invalid');
    }

    if (tiempoMinimo > 90 || tiempoMinimo < 1) {
      tiempoMinimoInput.classList.add('is-invalid');
      tiempoMinimoInput.classList.remove('is-valid');
    } else {
      tiempoMinimoInput.classList.add('is-valid');
      tiempoMinimoInput.classList.remove('is-invalid');
    }

    if (tiempoMaximo > 90 || tiempoMaximo < 1) {
      tiempoMaximoInput.classList.add('is-invalid');
      tiempoMaximoInput.classList.remove('is-valid');
    } else {
      tiempoMaximoInput.classList.add('is-valid');
      tiempoMaximoInput.classList.remove('is-invalid');
    }

    if (tiempoMinimo > tiempoMaximo) {
      tiempoMinimoInput.classList.add('is-invalid');
      tiempoMinimoInput.classList.remove('is-valid');
      tiempoMaximoInput.classList.add('is-invalid');
      tiempoMaximoInput.classList.remove('is-valid');
    } else {
      tiempoMinimoInput.classList.add('is-valid');
      tiempoMinimoInput.classList.remove('is-invalid');
      tiempoMaximoInput.classList.add('is-valid');
      tiempoMaximoInput.classList.remove('is-invalid');
    }

    if (tiempoMinimo == '') {
      tiempoMinimoInput.classList.add('is-invalid');
      tiempoMinimoInput.classList.remove('is-valid');
    } else {
      tiempoMinimoInput.classList.add('is-valid');
      tiempoMinimoInput.classList.remove('is-invalid');
    }

    if (tiempoMaximo == '') {
      tiempoMaximoInput.classList.add('is-invalid');
      tiempoMaximoInput.classList.remove('is-valid');
    } else {
      tiempoMaximoInput.classList.add('is-valid');
      tiempoMaximoInput.classList.remove('is-invalid');
    }



    if (cupo < 1 || cupo > 10) {
      cupoInput.classList.add('is-invalid');
      cupoInput.classList.remove('is-valid');
    } else {
      cupoInput.classList.add('is-valid');
      cupoInput.classList.remove('is-invalid');
    }


  
    for (let i = 0; i < fotosInput.files.length; i++) {
      let file = fotosInput.files[i];
      var errorFile = 0;
      if (file.type.startsWith('image/')) {
        
      } else {
        errorFile = 1;
        break;
      }
    }

    if (fotosInput.files.length === 0 || fotosInput.files.length > 10 || errorFile == 1) {
      fotosInput.classList.add('is-invalid');
      fotosInput.classList.remove('is-valid');
    } else {
      fotosInput.classList.add('is-valid');
      fotosInput.classList.remove('is-invalid');
    }



}

function agregarEtiqueta() {
  const etiquetasInput = document.getElementById("etiquetasInput");
  const etiquetasContainer = document.getElementById("etiquetasContainer");

  // Obtener el valor del input y dividirlo en etiquetas separadas por comas
  const etiquetas = etiquetasInput.value.split(" ");

  // Limpiar el contenido anterior del contenedor de etiquetas
  etiquetasContainer.innerHTML = "";

  // Recorrer las etiquetas y agregarlas al contenedor
  etiquetas.forEach(etiqueta => {
      etiqueta = etiqueta.trim(); // Eliminar espacios en blanco
      if (etiqueta !== "") {
          const span = document.createElement("span");
          span.textContent = "#" + etiqueta + " ";
          etiquetasContainer.appendChild(span);
      }
  });


};
