function agregarEtiqueta() {
    const etiquetasInput = document.getElementById("etiquetasInput");
    const etiquetasContainer = document.getElementById("etiquetasContainer");

    // Obtener el valor del input y dividirlo en etiquetas separadas por comas
    const etiquetas = etiquetasInput.value.split(",");

    // Limpiar el contenido anterior del contenedor de etiquetas
    etiquetasContainer.innerHTML = "";

    // Recorrer las etiquetas y agregarlas al contenedor
    etiquetas.forEach(etiqueta => {
        etiqueta = etiqueta.trim(); // Eliminar espacios en blanco
        if (etiqueta !== "") {
            const span = document.createElement("span");
            span.textContent = "#" + etiqueta;
            etiquetasContainer.appendChild(span);
        }
    });

    // Limpiar el input
    etiquetasInput.value = "";
};

// Validar la entrada del dinero
const montoInput = document.getElementById("costoInput");
const regex = /^\$?\d+(,\d{3})*(\.\d{2})?$/;

montoInput.addEventListener("blur", function() {
    const valor = montoInput.value;
    if (!regex.test(valor)) {
        alert("Por favor, ingrese una cantidad de dinero válida.");
        montoInput.value = ""; // Limpiar el campo si es inválido
    }
});

