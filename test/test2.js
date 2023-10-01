const form = document.getElementById('myForm');
const errorModal = document.getElementById('errorModal');
const closeModal = document.getElementById('closeModal');
const errorText = document.getElementById('errorText');

form.addEventListener('submit', function(event) {
  event.preventDefault();

  const titulo = document.getElementById('tituloInput').value;
  const descripcion = document.getElementById('descripcionInput').value;

  let enviar = true;
  let errorMessage = "";

  if (titulo == '') {
    errorMessage += '- El titulo es obligatorio. <br>';
    enviar = false;
  }
  if (titulo.length < 5 || titulo.length > 25) {
    errorMessage += '- El titulo debe tener entre 5 y 25 caracteres.<br>';
    enviar = false;
  }
  if (descripcion == '') {
    errorMessage += '- La descripción es obligatoria.<br>';
    enviar = false;
  }
  if (descripcion.length < 5 || descripcion.length > 25) {
    errorMessage += '- La descripción debe tener entre 5 y 25 caracteres.<br>';
    enviar = false;
  }
  
  console.log(errorMessage);
  errorText.innerHTML = errorMessage;
  
  if (enviar) {
    // Envía el formulario si la validación es exitosa
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


function validarForm() {
    
    let tituloInput = document.getElementById('tituloInput');
    let descripcionInput = document.getElementById('descripcionInput')

    let titulo = document.getElementById('tituloInput').value;
    let descripcion = document.getElementById('descripcionInput').value;


    if (titulo.length < 5 || titulo.length > 25) {
      tituloInput.classList.add('is-invalid');
      tituloInput.classList.remove('is-valid'); // Elimina la clase is-valid si está presente
    } else {
      tituloInput.classList.remove('is-invalid'); // Elimina la clase is-invalid si está presente
      tituloInput.classList.add('is-valid');
    }
    
    if (descripcion.length < 5 || descripcion.length > 25) {
      descripcionInput.classList.add('is-invalid');
      descripcionInput.classList.remove('is-valid'); // Elimina la clase is-valid si está presente
    } else {
      descripcionInput.classList.remove('is-invalid'); // Elimina la clase is-invalid si está presente
      descripcionInput.classList.add('is-valid');
    }    
}