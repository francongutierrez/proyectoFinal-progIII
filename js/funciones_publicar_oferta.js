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

