<?php
require_once("./../../controllers/EmpleadoController.php");
require_once("./../../controllers/AuxiliarController.php");


if(isset($_REQUEST['insertEmpleado'])){
    $id = insertarEmpleado();
    if($id != false){
        header("Location:create.php?msg=emplGuard");

    }
}elseif(isset($_REQUEST['deleteEmpleado'])){
    // borrarEmpleado();
    $response = borrarEmpleado();
    if($response != false){
        header("Location:index.php?msg=elimSuccs");

    }
}elseif(isset($_REQUEST["editEmpleado"])){
    // echo "editar empleado";
    // die();
    $response = editarEmpleado();
    if($response != false){
        header("Location:show.php?id=$response&msg=actSuccs");

    }
}

function validarEmpleado($nombre, $cuit, $dni, $direccion, $cod_postal, $email) {
    $errores = [];

    // Validar nombre y apellido
    if (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]{2,}$/', $nombre) || count(explode(' ', $nombre)) < 2) {
        $errores[] = "Nombre y apellido no válidos.";
    }

    // Validar CUIL
    if (!preg_match('/^\d{11}$/', $cuit)) {
        $errores[] = "CUIL no válido.";
    }

    // Validar DNI
    if (!preg_match('/^\d{8}$/', $dni)) {
        $errores[] = "DNI no válido.";
    }

    // Validar dirección
    if (empty($direccion)) {
        $errores[] = "Dirección no válida.";
    }

    // Validar código postal
    if (!preg_match('/^[A-Za-z0-9]{4,20}$/', $cod_postal)) {
        $errores[] = "Código postal no válido.";
    }

    // Validar correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Correo electrónico no válido.";
    }

    return $errores;
}


function insertarEmpleado(){
    
    $nombre = limpiarcadena($_POST["nombre"]);
    $cuit = limpiarcadena($_POST["cuit"]);
    $dni = limpiarcadena($_POST["dni"]);
    $municipio = limpiarcadena($_POST["municipio"]);
    $direccion = limpiarcadena($_POST["direccion"]);
    $cod_postal = limpiarcadena($_POST["cod_postal"]);
    $email = limpiarcadena($_POST["email"]);
    $id_tipo_empleado = limpiarcadena($_POST["tipo_empleado"]);

    // Atributos no definidos adecuadamente aun
    $id_rol_persona = limpiarcadena(2);
    $id_vacacion = limpiarcadena(1);

    // Validar los datos
    $errores = validarEmpleado($nombre, $cuit, $dni, $direccion, $cod_postal, $email);
    if (!empty($errores)) {
        $mensajeError = implode(' - ', $errores);
        header("Location:create.php?msg=" . urlencode($mensajeError));
        exit;
    }

    // Validar input del nuevo municipio dentro del modal
    if($_REQUEST["new_municipio"]!=""){
        
        $new_municipio = $_REQUEST["new_municipio"];
        $id_departamento = $_REQUEST["departamento_empleado"];
        $municipio = guardarMunicipio($new_municipio, $id_departamento);
    }

    // Guardar registro en personas y obtener el id_persona
    $id_persona = guardarPersona($nombre, $cuit, $dni, $municipio, $direccion, $email, $cod_postal, $id_rol_persona);

    // Guardando empleado
    $id_empleado = guardar($id_persona, $id_tipo_empleado, $id_vacacion);
    
    return $id_empleado;
};


function borrarEmpleado(){
    $id_persona = $_REQUEST["id_persona"];
    // echo $id_empleado;
    $response = deleteEmpleado($id_persona);
    return $response;
}

function editarEmpleado(){
    $id_persona = limpiarcadena($_POST["id_persona"]);
    $id_empleado = limpiarcadena($_POST["id_empleado"]);
    $nombre = limpiarcadena($_POST["nombre"]);
    $cuit = limpiarcadena($_POST["cuit"]);
    $dni = limpiarcadena($_POST["dni"]);
    $municipio = limpiarcadena($_POST["municipio"]);
    $direccion = limpiarcadena($_POST["direccion"]);
    $cod_postal = limpiarcadena($_POST["cod_postal"]);
    $email = limpiarcadena($_POST["email"]);
    $id_tipo_empleado = limpiarcadena($_POST["tipo_empleado"]);

    $id_vacacion = limpiarcadena(2);
    // Validar input del nuevo municipio dentro del modal
    if($_REQUEST["new_municipio"]!=""){
            
        $new_municipio = $_REQUEST["new_municipio"];
        $id_departamento = $_REQUEST["departamento_empleado"];
        $municipio = guardarMunicipio($new_municipio, $id_departamento);
    }

    $updatedPersona = updatePersona($id_persona, $nombre, $cuit, $dni, $municipio, $direccion, $email, $cod_postal);

    $updatedEmpleado = updateEmpleado($id_empleado, $id_persona, $id_tipo_empleado, $id_vacacion);
    
    // echo $updatedPersona; 
    // echo "<br>";
    // echo $updatedEmpleado; 
    // die();

    if($updatedPersona != false && $updatedEmpleado != false){
        // header("Location:show.php?id=$updatedEmpleado&msg=actSucc");
        return $updatedEmpleado;
    }else{
        echo false;
    }
}
?>