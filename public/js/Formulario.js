document.addEventListener("DOMContentLoaded", function() {
    const botonCotizacion = document.querySelector(".Cotizacion");
    const formulario = document.querySelector("form");

    botonCotizacion.addEventListener("click", function() {
        if (formulario.style.display === "none" || formulario.style.display === "") {
            formulario.style.display = "flex"; // Muestra el formulario
        } else {
            formulario.style.display = "none"; // Oculta el formulario
        }
    });
});