<?php
require_once("./../../controllers/MedicoController.php");
require_once("./../empleados/functions.php");

if(isset($_REQUEST['insertMedico'])){
    $id = insertarMedicoFront();
    if ($id != false) {
        header("Location:create.php?msg=medGuard");
    } else {
        return "Error al almacenar medico";

    }

}elseif(isset($_REQUEST['deleteMedico'])){
    // borrarMedico();
    $response = borrarEmpleado();
    if($response != false){
        header("Location:index.php?msg=elimSuccs");

    }
}elseif(isset($_REQUEST["editMedico"])){
    // echo "editar empleado";
    // die();
    $response = editarMedico();
    if($response != false){
        header("Location:show.php?id=$response&msg=actSuccs");

    }
}elseif(isset($_REQUEST["editMedico"])){
    // echo "editar empleado";
    // die();
    $response = editarMedico();
    if($response != false){
        header("Location:show.php?id=$response&msg=actSuccs");

    }
}

function insertarMedicoFront(){

    $num_colegiado = limpiarcadena($_REQUEST["num_colegiado"]);
    $id_especialidad = limpiarcadena($_REQUEST["especialidad"]);
    $id_situacion_revista = limpiarcadena($_REQUEST["situacion_revista"]);

    $errors = [];

    if (!preg_match('/^\d{6,}$/', $num_colegiado)) {
        $errors[] = "Número de colegiado no válido. Debe tener al menos 6 dígitos.";
    }
    
    
    if (empty($errors)) {
        $id_empleado = limpiarcadena(insertarEmpleado());
        
        return guardarMedico($id_empleado, $num_colegiado, $id_especialidad, $id_situacion_revista);
    } else {
        // return implode('-', $errors);
        $mensajeError = implode(' - ', $errors);
        header("Location:create.php?msg=" . urlencode($mensajeError));
        exit;
    }

    // $id_medico = guardarMedico($id_empleado, $num_colegiado, $id_especialidad, $id_situacion_revista);
    // return $id_medico;
}

// Para editar medico
function editarMedico(){
    $id_empleado = limpiarcadena(editarEmpleado());
    $id_medico = limpiarcadena($_REQUEST["id_medico"]);
    $numero_colegiado = limpiarcadena($_REQUEST["num_colegiado"]);
    $id_especialidad = limpiarcadena($_REQUEST["especialidad"]);
    $id_situacion_revista = limpiarcadena($_REQUEST["situacion_revista"]);
    $id = updateMedico($id_medico, $id_empleado, $numero_colegiado, $id_especialidad, $id_situacion_revista);
    
    if($id != false){
        // header("Location:show.php?id=$updatedEmpleado&msg=actSucc");
        return $id;
    }else{
        echo false;
    }

}