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

    // Limpiar el input
    etiquetasInput.value = "";
};


function validarFormulario() {
    // Valores
    var titulo = document.getElementById("tituloInput").value;
    
    // Elementos
    const tituloInput = document.getElementById('tituloInput');
    const mensajeTituloError = document.getElementById('mensajeTituloError');
    
    // Crear el elemento de mensaje si no existe
    let mensaje = mensajeTituloError.querySelector('p');
    if (!mensaje) {
        mensaje = document.createElement('p');
        mensaje.textContent = 'Por favor ingrese un título válido';
        mensajeTituloError.appendChild(mensaje);
    }

    // Inicio de los cambios en el estilo
    if (titulo.match(/^[A-Za-z\s]{2,}$/)) {
        tituloInput.classList.remove('is-invalid');
        tituloInput.classList.add('is-valid');
        mensaje.style.display = 'none'; // Oculta el mensaje de error
    } else {
        tituloInput.classList.remove('is-valid');
        tituloInput.classList.add('is-invalid');
        mensaje.style.display = 'block'; // Muestra el mensaje de error
        return false;
    }
  
    // FIN CAMBIOS
  
    if (titulo == "") {
        alert("Todos los campos son obligatorios");
        return false;
    }

    alert("Sus datos se han enviado correctamente");
    return true;
}




function test() {
    let elemento = document.getElementById("testmensaje");
    elemento.textContent = "Mensaje";
    alert("Hello world");
};

// Controlar todos los campos
// Segun cada control
//  Añadir un mensaje
// Mostrar mensajes al usuario