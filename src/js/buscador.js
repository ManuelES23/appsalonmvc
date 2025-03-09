document.addEventListener("DOMContentLoaded", function () {
  iniciarApp();
});

function iniciarApp() {
  buscadorPorFecha();
}

function buscadorPorFecha() {
  const fechaInput = document.querySelector("#fecha");
  fechaInput.addEventListener("change", function (e) {
    const fechaSeleccionada = e.target.value;
    console.log("🚀 ~ fechaSeleccionada:", fechaSeleccionada);

    window.location = `?fecha=${fechaSeleccionada}`;
  });
}
