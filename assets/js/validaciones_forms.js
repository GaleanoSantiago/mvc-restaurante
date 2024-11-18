const formEmpleadoV = document.querySelector('.formEmpleadosValidacion') || null;
const formMedicoV = document.querySelector('.formMedicosValidacion') || null;
const formPacienteV = document.querySelector('.formPacientesValidacion') || null;

if(formEmpleadoV){
    validarFormEmpleado();
}
if(formMedicoV){
    validarFormMedico();
}
// if(formPacienteV){
//     validarFormPaciente();
// }
function validarFormEmpleado() {
    formEmpleadoV.addEventListener('submit', function(event) {
        let valid = true;

        // Validar nombre y apellido
        const nombre = document.querySelector('input[name="nombre"]').value.trim();
        const nombreError = document.getElementById('nombreError');
        const nombreRegex = /^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]{2,}$/;
        if (!nombreRegex.test(nombre) || nombre.split(' ').length < 2) {
            nombreError.textContent = "Por favor, ingrese un nombre y apellido válidos.";
            valid = false;
        } else {
            nombreError.textContent = "";
        }

        // Validar CUIL
        const cuit = document.querySelector('input[name="cuit"]').value.trim();
        const cuitError = document.getElementById('cuitError');
        if (!/^\d{11}$/.test(cuit)) {
            cuitError.textContent = "Por favor, ingrese un CUIL válido de 11 dígitos.";
            valid = false;
        } else {
            cuitError.textContent = "";
        }

        // Validar DNI
        const dni = document.querySelector('input[name="dni"]').value.trim();
        const dniError = document.getElementById('dniError');
        if (!/^\d{8}$/.test(dni)) {
            dniError.textContent = "Por favor, ingrese un DNI válido de 8 dígitos.";
            valid = false;
        } else {
            dniError.textContent = "";
        }

        // Validar dirección
        const direccion = document.querySelector('input[name="direccion"]').value.trim();
        const direccionError = document.getElementById('direccionError');
        if (!direccion) {
            direccionError.textContent = "Por favor, ingrese una dirección válida.";
            valid = false;
        } else {
            direccionError.textContent = "";
        }

        // Validar código postal
        const codPostal = document.querySelector('input[name="cod_postal"]').value.trim();
        const codPostalError = document.getElementById('codPostalError');
        if (!/^[A-Za-z0-9]{4,20}$/.test(codPostal)) {
            codPostalError.textContent = "Por favor, ingrese un código postal válido de 4 hasta 20 caracteres.";
            valid = false;
        } else {
            codPostalError.textContent = "";
        }

        // Validar correo electrónico
        const email = document.querySelector('input[name="email"]').value.trim();
        const emailError = document.getElementById('emailError');
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            emailError.textContent = "Por favor, ingrese un correo electrónico válido.";
            valid = false;
        } else {
            emailError.textContent = "";
        }

        // Si alguna validación falla, prevenir el envío del formulario
        if (!valid) {
            event.preventDefault();
        }
    });
}

function validarFormMedico(){

    formMedicoV.addEventListener('submit', function(event) {

        let valid = true;

        // Validar nombre y apellido
        const nombre = document.querySelector('input[name="nombre"]').value.trim();
        const nombreError = document.getElementById('nombreError');
        const nombreRegex = /^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]{2,}$/;
        if (!nombreRegex.test(nombre) || nombre.split(' ').length < 2) {
            nombreError.textContent = "Por favor, ingrese un nombre y apellido válidos.";
            valid = false;
        } else {
            nombreError.textContent = "";
        }

        // Validar CUIL
        const cuit = document.querySelector('input[name="cuit"]').value.trim();
        const cuitError = document.getElementById('cuitError');
        if (!/^\d{11}$/.test(cuit)) {
            cuitError.textContent = "Por favor, ingrese un CUIL válido de 11 dígitos.";
            valid = false;
        } else {
            cuitError.textContent = "";
        }

        // Validar DNI
        const dni = document.querySelector('input[name="dni"]').value.trim();
        const dniError = document.getElementById('dniError');
        if (!/^\d{8}$/.test(dni)) {
            dniError.textContent = "Por favor, ingrese un DNI válido de 8 dígitos.";
            valid = false;
        } else {
            dniError.textContent = "";
        }

        // Validar dirección
        const direccion = document.querySelector('input[name="direccion"]').value.trim();
        const direccionError = document.getElementById('direccionError');
        if (!direccion) {
            direccionError.textContent = "Por favor, ingrese una dirección válida.";
            valid = false;
        } else {
            direccionError.textContent = "";
        }

        // Validar código postal
        const codPostal = document.querySelector('input[name="cod_postal"]').value.trim();
        const codPostalError = document.getElementById('codPostalError');
        if (!/^[A-Za-z0-9]{4,20}$/.test(codPostal)) {
            codPostalError.textContent = "Por favor, ingrese un código postal válido de entre 4 y 20 caracteres.";
            valid = false;
        } else {
            codPostalError.textContent = "";
        }

        // Validar correo electrónico
        const email = document.querySelector('input[name="email"]').value.trim();
        const emailError = document.getElementById('emailError');
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            emailError.textContent = "Por favor, ingrese un correo electrónico válido.";
            valid = false;
        } else {
            emailError.textContent = "";
        }

        // Validar número de colegiado
        const numColegiado = document.querySelector('input[name="num_colegiado"]').value.trim();
        const numColegiadoError = document.getElementById('numColegiadoError');
        if (!/^\d{6,}$/.test(numColegiado)) {
            numColegiadoError.textContent = "Por favor, ingrese un número de colegiado válido con al menos 6 dígitos.";
            valid = false;
        } else {
            numColegiadoError.textContent = "";
        }


        if (!valid) {
            event.preventDefault();
        }
    });

}

function validarFormPaciente(){

    formPacienteV.addEventListener('submit', function (event) {
        event.preventDefault();

        let isValid = true;

        // Validar nombre y apellido
        const nombreInput = formMedicoV.querySelector('input[name="nombre"]');
        const nombreError = document.getElementById('nombreError');
        if (!/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]{2,}$/.test(nombreInput.value) || nombreInput.value.split(' ').length < 2) {
            nombreError.textContent = "Nombre y apellido no válidos.";
            isValid = false;
        } else {
            nombreError.textContent = "";
        }

        // Validar CUIL
        const cuitInput = formMedicoV.querySelector('input[name="cuit"]');
        const cuitError = document.getElementById('cuitError');
        if (!/^\d{11}$/.test(cuitInput.value)) {
            cuitError.textContent = "CUIL no válido.";
            isValid = false;
        } else {
            cuitError.textContent = "";
        }

        // Validar DNI
        const dniInput = formMedicoV.querySelector('input[name="dni"]');
        const dniError = document.getElementById('dniError');
        if (!/^\d{8}$/.test(dniInput.value)) {
            dniError.textContent = "DNI no válido.";
            isValid = false;
        } else {
            dniError.textContent = "";
        }

        // Validar dirección
        const direccionInput = formMedicoV.querySelector('input[name="direccion"]');
        const direccionError = document.getElementById('direccionError');
        if (direccionInput.value.trim() === "") {
            direccionError.textContent = "Dirección no válida.";
            isValid = false;
        } else {
            direccionError.textContent = "";
        }

        // Validar código postal
        const codPostalInput = formMedicoV.querySelector('input[name="cod_postal"]');
        const codPostalError = document.getElementById('codPostalError');
        if (!/^[A-Za-z0-9]{4,20}$/.test(codPostalInput.value)) {
            codPostalError.textContent = "Código postal no válido.";
            isValid = false;
        } else {
            codPostalError.textContent = "";
        }

        // Validar correo electrónico
        const emailInput = formMedicoV.querySelector('input[name="email"]');
        const emailError = document.getElementById('emailError');
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)) {
            emailError.textContent = "Correo electrónico no válido.";
            isValid = false;
        } else {
            emailError.textContent = "";
        }

        // Validar número de seguro social
        const numSegSocialInput = formMedicoV.querySelector('input[name="num_seg_social"]');
        const numSegSocialError = document.getElementById('numSegSocialError');
        if (!/^\d{4,20}$/.test(numSegSocialInput.value)) {
            numSegSocialError.textContent = "Número de seguro social no válido. Debe tener entre 4 y 20 dígitos.";
            isValid = false;
        } else {
            numSegSocialError.textContent = "";
        }

        if (!isValid) {
            event.preventDefault();
        }
    });

}
