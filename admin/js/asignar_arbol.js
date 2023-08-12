const DOM = document;
// let estudiantes;

const arbolesAsignadosPorEstudiante = async (dni) => {
  const peticionArbolesEstudiante = await fetch(
    `http://localhost/Dev/HuamanHuasi/admin/api/arboles_estudiante.php?cedula=${dni}`
  );

  const listaAsignaciones = DOM.querySelector("#lista_asignaciones");
  const arbolesEstudiante = await peticionArbolesEstudiante.json();
  if (arbolesEstudiante.notFound) {
    listaAsignaciones.innerText = "No se encontro arboles asignados";
    return;
  }

  const listaArbolesAsignadosEstudiante = arbolesEstudiante
    .map(
      (arbol) => `
      <li class="list-group-item" data-arbol-estudiante="${arbol.id_registro}-${arbol.id_arbol}">
        ${arbol.especie}-${arbol.nombre_ruta}
        <button type="button" class="btn" @click="eliminarAsignacion"><span class="icon-trash-o fs-5 fw-semibold"></span></button>
      </li>
    `
    )
    .join("");

  listaAsignaciones.innerHTML = listaArbolesAsignadosEstudiante;
};

/*
  Lista los arboles no asignados
*/
const arbolesNoAsignados = async () => {
  const dataListArboles = DOM.querySelector("#lista_arboles");

  const peticionArboles = await fetch(
    `http://localhost/Dev/HuamanHuasi/admin/api/arboles.php`
  );

  if (!peticionArboles.ok) {
    dataListArboles.innerHTML = `<div  class="dropdown-item">Arboles no disponibles</div>`;
    return;
  }

  const arboles = await peticionArboles.json();
  let dataListArb = "";

  arboles.forEach((arbol, index) => {
    dataListArb += `
        

       
   <label class="list-group-item" >
    <input class="form-check-input me-1" type="checkbox" name="idArbol${index}" value="${arbol.id_arbol}">
${arbol.especie} - ${arbol.nombre_ruta}
  </label>
    `;
  });

  dataListArboles.innerHTML = dataListArb;
  // console.log(dataListArboles);
};

document.addEventListener("alpine:init", () => {
  Alpine.store("estudiantesStore", {
    estudiantes: [],

    async init() {
      const respuesta = await fetch(
        "http://localhost/Dev/HuamanHuasi/admin/api/estudiantes.php"
      );
      const respuestaJSON = respuesta.json();
      this.estudiantes = respuestaJSON;
    },

    async buscarEstudiantes(event) {
      const { target } = event;
      const url = `http://localhost/Dev/HuamanHuasi/admin/api/estudiantes.php?estudianteDni=${target.value}`;
      const peticion = await fetch(url);
      const estudiantes = await peticion.json();
      this.estudiantes = estudiantes;
    },
  });

  Alpine.data("arboles", () => ({
    arboles: [],

    async init() {
      const peticionArboles = await fetch(
        `http://localhost/Dev/HuamanHuasi/admin/api/arboles.php`
      );

      const arboles = await peticionArboles.json();
      this.arboles = arboles;
    },
  }));
});

const asignarArbol = async (event) => {
  const { target } = event;
  const url = "http://localhost/Dev/HuamanHuasi/admin/api/asignar_arbol.php";
  const data = JSON.stringify(Object.fromEntries(new FormData(target)));
  const peticion = await fetch(url, {
    method: "POST",
    body: data,
    headers: {
      "Content-Type": "application/json",
    },
  });

  const respuesta = await peticion.json();
  if (respuesta.success) {
    arbolesNoAsignados();
    Swal.fire("Asignado", "Se ha asignado correctamente el arbol", "success");
    const modal = DOM.querySelector("#modal_asignar_arbol");
    const dniInput = DOM.querySelector(".input_cedula");


    arbolesAsignadosPorEstudiante(dniInput.value);
  }
};

const filtrarArboles = (event) => {
  const { target } = event;
  const dataListArboles = DOM.querySelector("#lista_arboles");
  const arboles = dataListArboles.querySelectorAll(".list-group-item");

  arboles.forEach((arbol) => {
    !arbol.innerText.includes(target.value)
      ? arbol.classList.add("visually-hidden")
      : arbol.classList.remove("visually-hidden");
  });
};

const eliminarArbolAsignado = async ({ idArbol }) => {
  const peticionEliminarArbolAsignado = await fetch(
    `http://localhost/Dev/HuamanHuasi/admin/api/arboles_estudiante.php?idArbol=${idArbol}`,
    {
      method: "DELETE",
    }
  );

  const respuesta = await peticionEliminarArbolAsignado.json();

  if (respuesta.success) {
    Swal.fire(
      "Desasignado",
      "Se ha ha removido correctamente el arbol",
      "success"
    );
    arbolesNoAsignados();
  }

  const listaAsignaciones = DOM.querySelector("#lista_asignaciones");
  if (!listaAsignaciones.innerText)
    listaAsignaciones.innerText = "No se encontro arboles asignados";
};

const mostrarDatosEnModal = (event) => {
  const { target } = event;
  const modal = DOM.querySelector("#modal_asignar_arbol");
  const modalTitle = modal.querySelector(".modal-title");
  const modalBodyInput = modal.querySelector(".modal-body .input_cedula");
  const InputIdRegistro = modal.querySelector(".modal-body .id_registro");
  const button = target;
  const datosEstudiante = button.getAttribute("data-bs-whatever");
  const idRegistro = button.getAttribute("data-bs-id-registro");

  const [dni, nombre, apellido] = datosEstudiante.split("-");
  modalTitle.textContent = `Arboles de ${nombre} ${apellido}`;
  arbolesAsignadosPorEstudiante(dni);

  InputIdRegistro.value = idRegistro;
  modalBodyInput.value = dni;

  arbolesNoAsignados();
};

// const seleccionarArbol = (event) => {
//   const modal = DOM.querySelector("#modal_asignar_arbol");
//   const { target } = event;
//   const dropdownItem = target;
//   // const btnDrowdown = modal.querySelector(".btn_dropdown_asignar_arbol");
//   // btnDrowdown.innerText = dropdownItem.innerText;
//   // const InpuidArbolItem = modal.querySelector(".input_id_arbol_item");
//   // InpuidArbolItem.value = dropdownItem.id;
// };

const eliminarAsignacion = (event) => {
  const { target } = event;
  const elementoDeLista = target.closest("li");
  const [idRegistro, idArbol] = elementoDeLista
    .getAttribute("data-arbol-estudiante")
    .split("-");
  elementoDeLista.remove();
  eliminarArbolAsignado({ idArbol });
};

const mostrarDropdownMultiSelect = (event) => {
  const dropdown = document.querySelector("#dropdown_lista_arboles");
  dropdown.classList.add("show", "mt-1");
};

const closeMultiSelect = () => {
  const dropdown = document.querySelector("#dropdown_lista_arboles");
  dropdown.classList.remove("show");
};
