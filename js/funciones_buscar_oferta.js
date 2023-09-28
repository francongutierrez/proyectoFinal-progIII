function cambiarValor() {
    const controlDeslizante = document.getElementById("miControlDeslizante");
    const valorActual = document.getElementById("valorActual");

    controlDeslizante.addEventListener("change", function() {
    valorActual.textContent = controlDeslizante.value;
    });
}

