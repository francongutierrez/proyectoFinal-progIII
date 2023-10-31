// *Manejo de la ventana modal*
const form = document.getElementById('formularioRegistro');
const errorModal = document.getElementById('errorModal');
const closeModal = document.getElementById('closeModal');
const errorText = document.getElementById('errorText');



function validarForm() {


  // Expresión regular para validar email
  const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

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
    nombreInput.classList.add('is-invalid');
    nombreInput.classList.remove('is-valid');
  } else {
    nombreInput.classList.add('is-valid');
    nombreInput.classList.remove('is-invalid');
  }

  if (apellido.length < 2 || apellido.length > 50) {
    errorMessage += '- El apellido debe tener entre 2 y 50 caracteres.<br>';
    enviar = false;
    apellidoInput.classList.add('is-invalid');
    apellidoInput.classList.remove('is-valid');
  } else {
    apellidoInput.classList.add('is-valid');
    apellidoInput.classList.remove('is-invalid');
  }


  if (ciudad.length < 4 || ciudad.length > 100) {
    errorMessage += '- La ciudad debe tener entre 4 y 100 caracteres.<br>';
    enviar = false;
    ciudadInput.classList.add('is-invalid');
    ciudadInput.classList.remove('is-valid');
  } else {
    ciudadInput.classList.add('is-valid');
    ciudadInput.classList.remove('is-invalid');
  }

  if (!emailRegex.test(email)) {
    errorMessage += '- El formato del correo electronico ingresado no es valido.<br>';
    enviar = false;
    emailInput.classList.add('is-invalid');
    emailInput.classList.remove('is-valid');
  } else {
    emailInput.classList.add('is-valid');
    emailInput.classList.remove('is-invalid');
  }

  if (telefono < 999999999 || telefono > 99999999999) {
    errorMessage += '- El telefono debe tener 10 caracteres numericos.<br>';
    enviar = false;
    telefonoInput.classList.add('is-invalid');
    telefonoInput.classList.remove('is-valid');
  } else {
    telefonoInput.classList.add('is-valid');
    telefonoInput.classList.remove('is-invalid');
  }

  if (intereses.length > 300) {
    errorMessage += '- Los intereses no pueden superar los 300 caracteres.<br>';
    enviar = false;
    interesesInput.classList.add('is-invalid');
  } else {
    interesesInput.classList.remove('is-invalid');
  }

  if (foto.files.size > (1048576)*5) {
    errorMessage += '- La foto subida no puede superar los 5MB.<br>';
    enviar = false;
    fotoInput.classList.add('is-invalid');
    fotoInput.classList.remove('is-valid');
  } else {
    fotoInput.classList.add('is-valid');
    fotoInput.classList.remove('is-invalid');
  }

  if (foto.files.length === 0) {
    errorMessage += '- No ha subido una foto.<br>';
    enviar = false;
    fotoInput.classList.add('is-invalid');
    fotoInput.classList.remove('is-valid');
  } else {
    fotoInput.classList.add('is-valid');
    fotoInput.classList.remove('is-invalid');
  }
  if (bio.length > 300) {
    errorMessage += '- La bio no puede superar los 300 caracteres.<br>';
    enviar = false;
    bioInput.classList.add('is-invalid');
  } else {
    bioInput.classList.remove('is-invalid');
  }

  if (contrasena != contrasena2) {
    errorMessage += '- Las contrasenas no coinciden.<br>';
    enviar = false;
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

  if (contrasena.length < 8 || contrasena.length > 50) {
    errorMessage += '- La contraseña debe tener mas entre 8 y 50 caracteres.<br>';
    enviar = false;
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

