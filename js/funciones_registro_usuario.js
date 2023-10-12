// *Manejo de la ventana modal*

const form = document.getElementById('formularioRegistro');
const errorModal = document.getElementById('errorModal');
const closeModal = document.getElementById('closeModal');
const errorText = document.getElementById('errorText');
// Expresión regular para validar email
const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

form.addEventListener('submit', function(event) {
  event.preventDefault();

  const nombre = document.getElementById('nombreInput').value;
  const apellido = document.getElementById('apellidoInput').value;
  const ciudad = document.getElementById('ciudadInput').value;
  const email = document.getElementById('emailInput').value;
  const telefono = document.getElementById('telefonoInput').value;
  const intereses = document.getElementById('interesesInput').value;
  const foto = document.getElementById('fotoInput');
  const contrasena = document.getElementById('contrasenaInput').value;
  const contrasena2 = document.getElementById('contrasenaInput2').value;
  const bio = document.getElementById('bioInput').value;

  let enviar = true;
  let errorMessage = "";

  if (nombre.length < 2 || nombre.length > 50) {
    errorMessage += '- El nombre debe tener entre 2 y 50 caracteres.<br>';
    enviar = false;
  }
  if (apellido.length < 2 || apellido.length > 50) {
    errorMessage += '- El apellido debe tener entre 2 y 50 caracteres.<br>';
    enviar = false;
  }
  if (ciudad.length < 4 || ciudad.length > 100) {
    errorMessage += '- La ciudad debe tener entre 4 y 100 caracteres.<br>';
    enviar = false;
  }

  if (!emailRegex.test(email)) {
    errorMessage += '- El formato del correo electronico ingresado no es valido.<br>';
    enviar = false;
  }

  if (telefono < 999999999 || telefono > 99999999999) {
    errorMessage += '- El telefono debe tener 10 caracteres numericos.<br>';
    enviar = false;
  }
  if (intereses.length > 300) {
    errorMessage += '- Los intereses no pueden superar los 300 caracteres.<br>';
    enviar = false;
  }
  if (foto.files.size > (1048576)*5) {
    errorMessage += '- La foto subida no puede superar los 5MB.<br>';
    enviar = false;
  }
  if (foto.files.length === 0) {
    errorMessage += '- No ha subido una foto.<br>';
    enviar = false;
  }
  if (bio.length > 300) {
    errorMessage += '- La bio no puede superar los 300 caracteres.<br>';
    enviar = false;
  }
  if (contrasena.length < 8) {
    errorMessage += '- La contraseña debe tener mas de 8 caracteres.<br>';
    enviar = false;
  }
  if (contrasena != contrasena2) {
    errorMessage += '- Las contrasenas no coinciden.<br>';
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
    let nombreInput = document.getElementById('nombreInput');
    let apellidoInput = document.getElementById('apellidoInput');
    let ciudadInput = document.getElementById('ciudadInput');
    let emailInput = document.getElementById('emailInput');
    let telefonoInput = document.getElementById('telefonoInput');
    let interesesInput = document.getElementById('interesesInput');
    let fotoInput = document.getElementById('fotoInput');
    let bioInput = document.getElementById('bioInput');
    let contrasenaInput = document.getElementById('contrasenaInput');
    let contrasenaInput2 = document.getElementById('contrasenaInput2');


    // Valores
    let nombre = document.getElementById('nombreInput').value;
    let apellido = document.getElementById('apellidoInput').value;
    let ciudad = document.getElementById('ciudadInput').value;
    let email = document.getElementById('emailInput').value;
    let telefono = document.getElementById('telefonoInput').value;
    let intereses = document.getElementById('interesesInput').value;
    let foto = document.getElementById('fotoInput').value;
    let bio = document.getElementById('bioInput').value;
    let contrasena = document.getElementById('contrasenaInput').value;
    let contrasena2 = document.getElementById('contrasenaInput2').value;



    // Controles

    if (nombre.length < 2 || nombre.length > 50) {
        nombreInput.classList.add('is-invalid');
        nombreInput.classList.remove('is-valid');
  
      } else {
        nombreInput.classList.add('is-valid');
        nombreInput.classList.remove('is-invalid');
      }


    if (apellido.length < 2 || apellido.length > 50) {
      apellidoInput.classList.add('is-invalid');
      apellidoInput.classList.remove('is-valid');

    } else {
      apellidoInput.classList.add('is-valid');
      apellidoInput.classList.remove('is-invalid');
    }

    if (ciudad.length < 4 || ciudad.length > 100) {
      ciudadInput.classList.add('is-invalid');
      ciudadInput.classList.remove('is-valid');
    } else {
      ciudadInput.classList.add('is-valid');
      ciudadInput.classList.remove('is-invalid');
    }

    if (!emailRegex.test(email)) {
      emailInput.classList.add('is-invalid');
      emailInput.classList.remove('is-valid');
    } else {
      emailInput.classList.add('is-valid');
      emailInput.classList.remove('is-invalid');
    }

    if (telefono < 999999999 || telefono > 99999999999) {
      telefonoInput.classList.add('is-invalid');
      telefonoInput.classList.remove('is-valid');
    } else {
      telefonoInput.classList.add('is-valid');
      telefonoInput.classList.remove('is-invalid');
    }

    if (fotoInput.size > (1048576)*5) {
      fotoInput.classList.add('is-invalid');
      fotoInput.classList.remove('is-valid');
    } else {
      fotoInput.classList.add('is-valid');
      fotoInput.classList.remove('is-invalid');
    }

    if (fotoInput.files.length === 0) {
      fotoInput.classList.add('is-invalid');
      fotoInput.classList.remove('is-valid');
    } else {
      fotoInput.classList.add('is-valid');
      fotoInput.classList.remove('is-invalid');
    }

    if (bio.length > 300) {
      bioInput.classList.add('is-invalid');
      bioInput.classList.remove('is-valid');
    } else {
      bioInput.classList.add('is-valid');
      bioInput.classList.remove('is-invalid');
    }

    if (intereses.length > 300) {
      interesesInput.classList.add('is-invalid');
      interesesInput.classList.remove('is-valid');
    } else {
      interesesInput.classList.add('is-valid');
      interesesInput.classList.remove('is-invalid');
    }

    if (contrasena != contrasena2 && contrasena) {
      contrasenaInput.classList.add('is-invalid');
      contrasenaInput.classList.remove('is-valid');
      contrasenaInput2.classList.add('is-invalid');
      contrasenaInput2.classList.remove('is-valid');
    } else {
      contrasenaInput.classList.add('is-valid');
      contrasenaInput.classList.remove('is-invalid');
      contrasenaInput2.classList.add('is-valid');
      contrasenaInput2.classList.remove('is-invalid');
    }

    if (contrasena.length < 8) {
      contrasenaInput.classList.add('is-invalid');
      contrasenaInput.classList.remove('is-valid');
      contrasenaInput2.classList.add('is-invalid');
      contrasenaInput2.classList.remove('is-valid');
    } else {
      contrasenaInput.classList.add('is-valid');
      contrasenaInput.classList.remove('is-invalid');
      contrasenaInput2.classList.add('is-valid');
      contrasenaInput2.classList.remove('is-invalid');
    }



}