// *Manejo de la ventana modal*

const form = document.getElementById('formularioVerificar');
const errorModal = document.getElementById('errorModal');
const closeModal = document.getElementById('closeModal');
const errorText = document.getElementById('errorText');
const maxFileSize = 5 * 1024 * 1024;
const allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'doc', 'docx', 'pdf'];
var fileInput = document.getElementById('documentacion');

form.addEventListener('submit', function(event) {
    event.preventDefault();
    let enviar = true;
    let errorMessage = "";
    var fileName = fileInput.files[0].name;
    var fileExtension = fileName.split('.').pop().toLowerCase(); // Obtener la extensión del archivo

    if (fileInput.files.length > 0) {
        let fileSize = fileInput.files[0].size;
        if (fileSize > maxFileSize) {
            errorMessage += '- El archivo seleccionado supera el tamaño máximo permitido.<br>';
            enviar = false;
        }
}

    if (allowedExtensions.indexOf(fileExtension) === -1) {
        errorMessage += '- Tipo de archivo no permitido. Por favor, elija una imagen, Word o PDF. <br>';
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