

// ----------------- Formulario de Login -----------------
const formLogin = document.getElementById("formLogin");
const formPass = document.getElementById("formPass");

// ----------------- Formulario de Empleados -----------------
const formEmpleados = document.getElementById("formEmpleados") || null;

const newMunicipioFromEmpleados = ()=>{
    const municipioSelect = document.getElementById('municipio');
    const modalTrigger = document.getElementById('modalTrigger');
    const newMunicipioInput = document.getElementById("new_municipio_input");
    const newMuniSpan = document.getElementById("new_municipio_span");

    // Agregar un evento 'change' al elemento <select>
    municipioSelect.addEventListener('change', function() {
        // Verificar si la opción seleccionada tiene el valor "new_municipio"
        if (municipioSelect.value === 'new_municipio') {
            // Imprimir un mensaje en la consola
            // console.log('Se seleccionó "Agregar Nuevo Municipio"');

            // Activar el modal de Bootstrap
            const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
            modal.show();

            // Mostrar el botón del trigger modal
            modalTrigger.classList.remove("d-none");
            newMuniSpan.classList.remove("d-none");
        } else {
            // Agregar la clase 'd-none' al botón del trigger modal
            newMuniSpan.classList.add("d-none");
            modalTrigger.classList.add("d-none");
            newMunicipioInput.value="";
            newMuniSpan.textContent = newMunicipioInput.value;

        }
    });

    document.getElementById('cuitInput').addEventListener('input', function() {
        const cuit = this.value;
        if (cuit.length === 11) {
            // Extraer los dígitos correspondientes al DNI (del tercer al décimo dígito)
            const dni = cuit.substring(2, 10);
            document.getElementById('dniInput').value = dni;
        } else {
            // Limpiar el campo DNI si el CUIT no tiene 11 dígitos
            document.getElementById('dniInput').value = '';
        }
    });

    // Agregar un evento 'input' al elemento input
    newMunicipioInput.addEventListener('input', function() {
        // Actualizar el contenido del span con el valor del input
        newMuniSpan.textContent = `"${newMunicipioInput.value}"`;
    });
}

if(formEmpleados){
    // Ejecutar funcion para agregar municipios desde empleados
    newMunicipioFromEmpleados();
}

// Funcion para mostrar la contraseña en el password
const btnMostrarPassword = ()=>{

    const inputPassword = document.getElementById("password");
    const btnMostrar = document.getElementById("btnMostrar");

    btnMostrar.addEventListener('click', ()=>{
        if (inputPassword.type === "password") {
            inputPassword.type = "text";
            btnMostrar.querySelector("path").setAttribute("d", "M4 12C4 12 5.6 7 12 7M12 7C18.4 7 20 12 20 12M12 7V4M18 5L16 7.5M6 5L8 7.5M15 13C15 14.6569 13.6569 16 12 16C10.3431 16 9 14.6569 9 13C9 11.3431 10.3431 10 12 10C13.6569 10 15 11.3431 15 13Z");
        } else {
            inputPassword.type = "password";
            btnMostrar.querySelector("path").setAttribute("d", "M4 10C4 10 5.6 15 12 15M12 15C18.4 15 20 10 20 10M12 15V18M18 17L16 14.5M6 17L8 14.5");
        }
    })
}

if(formLogin || formPass){
    btnMostrarPassword();
}


document.addEventListener('DOMContentLoaded', (event) => {
    const table = document.getElementById('myTable') || null;
    const filterButton = document.getElementById('filterBtn') || null; // Botón "Filtrar" del modal
    const clearButton = document.getElementById('clearFiltro') || null; // Botón "Limpiar" del modal
    const selectEspecialidad = document.getElementById('filterEspecialidad') || null;
    const selectSituacionRevista = document.getElementById('filterSituRevista') || null;

    // Para fechas de vacaciones en empleados
    const fechaInicioVacacion = document.getElementById('fecha_inicio') || null;
    const fechaFinVacacion = document.getElementById('fecha_final') || null;

    if (table && filterButton) {
        filterButton.addEventListener('click', () => {
            const tableBody = table.querySelector('tbody');
            const rows = tableBody.querySelectorAll('tr');
            
            if(selectEspecialidad && selectSituacionRevista){
                // console.log("Tabla Medico");
                const especialidadFiltro = selectEspecialidad.value !== '0' ? selectEspecialidad.options[selectEspecialidad.selectedIndex].text.split(' (')[0] : '';
                const situacionRevistaFiltro = selectSituacionRevista.value !== '0' ? selectSituacionRevista.options[selectSituacionRevista.selectedIndex].text.split(' (')[0] : '';
                
                

                rows.forEach(row => {
                    const especialidad = row.children[3].textContent.trim();
                    const situacionRevista = row.children[4].textContent.trim();

                    if ((especialidadFiltro === '' || especialidad === especialidadFiltro) &&
                        (situacionRevistaFiltro === '' || situacionRevista === situacionRevistaFiltro)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }else if(fechaInicioVacacion && fechaFinVacacion){
                const fechaInicioFiltro = new Date(fechaInicioVacacion.value); 
                const fechaFinFiltro = new Date(fechaFinVacacion.value); 
                // console.log("Tabla Empleado");

                rows.forEach(row => {
                    const fechaInicioVac = new Date(row.children[10].textContent.trim());
                    const fechaFinVac = new Date(row.children[11].textContent.trim());

                    if ((fechaInicioFiltro <= fechaInicioVac && fechaInicioVac <= fechaFinFiltro) ||
                        (fechaInicioFiltro <= fechaFinVac && fechaFinVac <= fechaFinFiltro) ||
                        (fechaInicioVac <= fechaInicioFiltro && fechaFinFiltro <= fechaFinVac)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });

            }
            
        });

        clearButton.addEventListener('click', () => {
            const tableBody = table.querySelector('tbody');
            const rows = tableBody.querySelectorAll('tr');

            rows.forEach(row => {
                row.style.display = '';
            });

            // Resetear los selectores a la opción por defecto
            selectEspecialidad != null ? selectEspecialidad.value = '0' : "";
            selectSituacionRevista != null ? selectSituacionRevista.value = '0' : "";

            fechaInicioVacacion != null ? fechaInicioVacacion.value="" : "";
            fechaFinVacacion != null ? fechaFinVacacion.value="" : "";
            
        });
    }



    const exportPDFButton = document.getElementById('exportPDF');
    if (exportPDFButton) {
        exportPDFButton.addEventListener('click', () => {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF({
                orientation: 'landscape', // Cambiar la orientación a paisaje
            });
            doc.autoTable({
                html: '#myTable',
                startY: 20,
                theme: 'striped',
                headStyles: { fontSize: 10 }, // Tamaño de fuente para encabezados
                bodyStyles: { fontSize: 8 },  // Tamaño de fuente para el cuerpo
                margin: { top: 10, right: 10, bottom: 10, left: 10 },
            });
            doc.save('clinica_informe.pdf');
        });
    }

    const exportExcelButton = document.getElementById('exportExcel');
    if (exportExcelButton) {
        exportExcelButton.addEventListener('click', () => {
            const wb = XLSX.utils.table_to_book(document.getElementById('myTable'), { sheet: "Sheet1" });
            XLSX.writeFile(wb, 'clinica_informe.xlsx');
        });
    }
});

const btnEliminar = document.querySelectorAll(".btn-delete");
btnEliminar.forEach(btn=>{
    btn.addEventListener("click", (event) => {
        confirmarEliminacion(event);
    });
})
const confirmarEliminacion = (event) => {
    // Mostrar un mensaje de confirmación
    let respuesta = confirm("¿Estás seguro de que deseas eliminar este registro?");
    // Si el usuario confirma la eliminación, el formulario se enviará
    if (!respuesta) {
        event.preventDefault(); // Evitar el envío del formulario si el usuario cancela
    }
};

// Para la seccion de consultas

const cards = document.querySelectorAll('.card-link') || null;
const btnsBack = document.querySelectorAll('.btnBack') || null;

if(cards && btnsBack){
    cards.forEach(card => {
        card.addEventListener('click', event => {
            event.preventDefault();
            const target = card.getAttribute('data-target');
    
            // Ocultar todas las secciones
            document.querySelectorAll('.diseno-section-cards').forEach(section => {
                section.classList.add('d-none');
            });
    
            // Mostrar la sección seleccionada
            document.getElementById(target).classList.remove('d-none');
        });
    });
    
    btnsBack.forEach(button => {
        button.addEventListener('click', () => {
            // Ocultar todas las secciones
            document.querySelectorAll('.diseno-section-cards').forEach(section => {
                section.classList.add('d-none');
            });
    
            // Mostrar la sección principal
            document.querySelector('.diseno-section-cards').classList.remove('d-none');
        });
    });
    

}


// Para el formulario de consultas
const selectPacientes = document.getElementById("selectPacientes") || null;
const rowNewPaciente = document.querySelector(".rowNewPaciente") || null;

if(selectPacientes){
    const inputsNewPaciente = rowNewPaciente.querySelectorAll("input.form-control") || null;

    selectPacientes.addEventListener("change", function() {
        const selectedOption = selectPacientes.options[selectPacientes.selectedIndex].value;
        if (selectedOption === "new_paciente") {
            rowNewPaciente.classList.remove("d-none");
            
            // Poner el required en todos los inputs del new_paciente
            inputsNewPaciente.forEach(input=>{
                input.setAttribute('required', '');
            })
        } else {
            if (!rowNewPaciente.classList.contains("d-none")) {
                rowNewPaciente.classList.add("d-none");
                
                // Quitar el required en todos los inputs del new_paciente
                inputsNewPaciente.forEach(input => {
                    input.required = false;
                });
            }
        }
    });

}


// ========================= Consultas =========================

// Seleccionar todos los elementos con la clase "estado_consulta"
// Seleccionar todos los elementos con la clase "estado_consulta"
const selectEstado = document.querySelectorAll(".estado_reserva") || null;
// console.log(selectEstado);
const btnDiagnostico = document.querySelectorAll(".btn-diagnostico") || null;
const inputIdConsulta = document.getElementById("inputIdConsulta") || null; 
const descripcionDiagnostico = document.getElementById("descripcionDiagnostico") || null;
const notasAdicionales = document.getElementById("notasAdicionales") || null;

const btnEnviarModal = document.getElementById("btnEnviarModal") || null;
const updateDiv = document.getElementById("updateDiv") || null;

if (btnDiagnostico) {
    btnDiagnostico.forEach(btn => {
        btn.addEventListener("click", () => {
            const idConsulta = btn.value;
            inputIdConsulta.value = idConsulta;

            fetch(`functions.php?id_reservacion=${idConsulta}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.success) {

                        descripcionDiagnostico.value = data.descripcion_diagnostico;
                        notasAdicionales.value = data.notas_adicionales;
                        descripcionDiagnostico.disabled=true;
                        notasAdicionales.disabled=true;
                        btnEnviarModal.disabled=true;

                        updateDiv.classList.remove("d-none");

                    } else {
                        descripcionDiagnostico.value = '';
                        notasAdicionales.value = '';
                        descripcionDiagnostico.disabled=false;
                        notasAdicionales.disabled=false;
                        btnEnviarModal.disabled=false;
                        if (!updateDiv.classList.contains("d-none")) {
                            updateDiv.classList.add("d-none");
                        }
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
}


const updateBtn = document.getElementById("updateBtn") || null;
const inputDiagnostico = document.getElementById("inputDiagnosticoModal") || null;
const deleteBtn = document.getElementById("deleteBtn") || null;

let update = false;
if(updateBtn){
    updateBtn.addEventListener("click",(e)=>{
        e.preventDefault();
        if(!update){
            // Para reahilitar los inputs y cambiar el input:hidden a update
            notasAdicionales.disabled=false;
            descripcionDiagnostico.disabled=false;
            inputDiagnostico.name="updateDiagnostico";
            btnEnviarModal.disabled=false;
            updateBtn.textContent="Cancelar";
            updateBtn.classList.add("active");
            update = true;
        }else{
            notasAdicionales.disabled=true;
            descripcionDiagnostico.disabled=true;
            inputDiagnostico.name="insertDiagnostico";
            updateBtn.textContent="Actualizar";            
            btnEnviarModal.disabled=true;
            updateBtn.classList.remove("active");
            update = false;
        }
    })
    
    // Para eliminar
    deleteBtn.addEventListener("click",()=>{
        inputDiagnostico.name="deleteDiagnostico";
        
    })
}

// Función para agregar clases de fondo a los options
function setOptionColors(selectEstadoConsulta) {
    const options = selectEstadoConsulta.options;
    if (options.length > 0) {
        options[0].classList.add("bg-success", "text-white");
        options[1].classList.add("bg-warning", "text-white");
        options[2].classList.add("bg-orange", "text-white");
        // options[3].classList.add("bg-danger", "text-white");
    }
    // Encuentra el botón cercano al select
    const btnDiagnostico = selectEstadoConsulta.closest('tr').querySelector('.btn-diagnostico') || null;

    if(btnDiagnostico){

        if (selectEstadoConsulta.selectedIndex === 1) {
            btnDiagnostico.disabled = false;
        } else {
            btnDiagnostico.disabled = true;
        }
    }
}

// Función para actualizar el color de fondo del select según la opción seleccionada
function updateSelectColor(event) {
    const selectEstadoConsulta = event.target;
    const selectedOption = selectEstadoConsulta.options[selectEstadoConsulta.selectedIndex];
    const bgColorClass = selectedOption.className.split(' ')[0];
    selectEstadoConsulta.className = 'form-select text-center ' + bgColorClass;
}
// Función para manejar el evento change y enviar el formulario
function handleSelectChange(event) {
    const selectEstadoConsulta = event.target;
    // Encontrar el formulario más cercano al select que cambió
    const form = selectEstadoConsulta.closest('form');
    // Enviar el formulario
    if (form) {
        form.submit();
    }
}

if(selectEstado){
    // Aplicar colores de fondo y actualizar el color al cargar la página para cada select
    selectEstado.forEach(selectEstadoConsulta => {
        setOptionColors(selectEstadoConsulta);
        updateSelectColor({ target: selectEstadoConsulta }); // Para aplicar el color inicial
        selectEstadoConsulta.addEventListener("change", updateSelectColor);
        selectEstadoConsulta.addEventListener("change", handleSelectChange);
    });

}


// Obtener la fecha actual
const hoy = new Date();
        
// Formatear la fecha al formato yyyy-mm-dd
const yyyy = hoy.getFullYear();
const mm = String(hoy.getMonth() + 1).padStart(2, '0'); // Los meses empiezan desde 0
const dd = String(hoy.getDate()).padStart(2, '0');

const fechaActual = `${yyyy}-${mm}-${dd}`;

// Asignar el valor al input
const fechaInput = document.getElementById('filtroFecha') || null;

// fechaInput.value = fechaActual;


//---------------------------------Cambiar max dependiendo de id_mesa---------------------------------

// Obtener el select y el campo de número
const select = document.getElementById('id_mesa');
const valor = document.getElementById('numero_personas');

// Añadir un evento de cambio en el select
select.addEventListener('change', function() {
  // Obtener la capacidad de la mesa seleccionada del atributo data-capacidad
  const capacidad = select.options[select.selectedIndex].getAttribute('data-capacidad');
  // Establecer el atributo max del input de número
  valor.setAttribute('max', capacidad);
});

// Opcional: Si se desea que el valor máximo se ajuste automáticamente al cargar la página
document.addEventListener('DOMContentLoaded', function() {
  const capacidad = select.options[select.selectedIndex].getAttribute('data-capacidad');
  valor.setAttribute('max', capacidad);
});
