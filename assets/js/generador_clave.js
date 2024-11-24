const formCliente = document.getElementById("formCliente") || null;
const btnClave = document.getElementById("btn_clave") || null;
const inputClave = document.getElementById("input_clave") || null;
const btnFirst = document.querySelector(".btn-first") || null;
const btnKey = document.querySelector(".btn-key") || null;
const column = document.querySelector(".column-first") || null;
const inputFirst = document.querySelectorAll(".inputFirst") || null;
const inputHidden = document.getElementById("inputHidden") || null;

const generarCodigoUnicoPersonalizado = ()=> {
    const letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; // Cambia a solo mayúsculas si no quieres minúsculas
    const numeros = '0123456789';
    let codigo = '';

    // Generar las dos letras
    for (let i = 0; i < 2; i++) {
        const indiceAleatorio = Math.floor(Math.random() * letras.length);
        codigo += letras[indiceAleatorio];
    }

    // Generar los tres números
    for (let i = 0; i < 3; i++) {
        const indiceAleatorio = Math.floor(Math.random() * numeros.length);
        codigo += numeros[indiceAleatorio];
    }

    return codigo;
}

if(formCliente && btnClave){
    // console.log("Estoy en el lugar correcto");

    btnClave.addEventListener("click",()=>{
        inputClave.value=generarCodigoUnicoPersonalizado();
    })
// Cuando se ocultan los campos de cliente
    btnKey.addEventListener("click",()=>{
        column.classList.add("d-none");
        btnKey.classList.add("activado");
        btnFirst.classList.remove("activado");
        inputClave.disabled=false;
        btnClave.classList.add("d-none");

        inputFirst.forEach(input=>{
            input.disabled = true;
            input.required = false;
        })
        inputHidden.name="createKey";
    })
    // Cuando se muestran los campos clientes
    btnFirst.addEventListener("click",()=>{
        column.classList.remove("d-none");
        btnFirst.classList.add("activado");
        btnKey.classList.remove("activado");
        inputClave.disabled=true;
        btnClave.classList.remove("d-none");
        inputFirst.forEach(input=>{
            input.disabled = false;
            input.required = true;
        })
        inputHidden.name="create";

    })
}