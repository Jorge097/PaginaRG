function toggleBotones(id) {
    let botones = document.getElementById(`botones-${id}`);
    let infoDivs = document.querySelectorAll(`#botones-${id} .info, #botones-${id} .infoP`);

    if (botones.style.display === "block") {
        botones.style.display = "none";
        infoDivs.forEach(div => div.style.display = "none"); // Oculta TODA la información dentro del botón principal
    } else {
        botones.style.display = "block";
    }
}

function mostrarInfo(grupo, opcion) {
    let info = document.getElementById(`info-${grupo}-${opcion}`);

    if (info.style.display === "flex" || info.style.display === "block") {
        info.style.display = "none"; // Oculta solo su propia información
    } else {
        info.style.display = "flex"; // Muestra solo su información sin afectar a las demás
    }
}
