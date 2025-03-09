const cita = {
  id: "",
  nombre: "",
  precio: "",
};

document.addEventListener("DOMContentLoaded", function () {
  iniciarAppAdmin();
});

function iniciarAppAdmin() {
  mostrarServiciosAdmin();
}

async function mostrarServiciosAdmin() {
  let serviciosAdmin = document.querySelector("#contenedor-perfiles");
  let servicios = await consultarServiciosAPI();
  servicios.forEach((servicio) => {
    const { id, nombre, precio } = servicio;
    let row = `
        <li>
            <p>Nombre: <span>${nombre}</span></p>
            <p>Precio: <span>${precio}</span></p>
            <div class="acciones">
                <a class="boton boton-actualizar"
                    href="/servicios/actualizar?id=${id}">Actualizar</a>
                <form action="/servicios/eliminar" method="POST">
                    <input type="hidden" name="id" id="id" value="${id}">
                    <input type="submit" value="Eliminar" class="boton-eliminar">
                </form>
            </div>
        </li>
    `;
    serviciosAdmin.innerHTML += row;
  });
}

async function consultarServiciosAPI() {
  try {
    const url = `${location.origin}/api/servicios`;
    const resultado = await fetch(url);
    console.log("🚀 ~ consultarServiciosAPI ~ resultado:", resultado);
    const servicios = await resultado.json();
    return servicios;
  } catch (error) {
    console.log(error);
  }
}
