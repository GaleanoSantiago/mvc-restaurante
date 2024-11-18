<?php
require_once("./../../controllers/EmpleadoController.php");
require_once("./../../controllers/PacienteController.php");
require_once("./../../controllers/AuxiliarController.php");


if(isset($_REQUEST['insertPaciente'])){
    $id = insertarPaciente();
    if($id != false){
        header("Location:create.php?msg=pacGuard");

    }
}elseif(isset($_REQUEST['deletePaciente'])){
    // borrarEmpleado();
    $response = borrarPaciente();
    if($response != false){
        header("Location:index.php?msg=elimSuccs");

    }
}elseif(isset($_REQUEST["editPaciente"])){
    // echo "editar empleado";
    // die();
    $response = editarPaciente();
    if($response != false){
        header("Location:show.php?id=$response&msg=actSuccs");

    }
}

function insertarPaciente(){
    // echo "Insertando empleado";
    // echo "<br>";
    $nombre = limpiarcadena($_POST["nombre"]);
    $cuit = limpiarcadena($_POST["cuit"]);
    $dni = limpiarcadena($_POST["dni"]);
    $municipio = limpiarcadena($_POST["municipio"]);
    $direccion = limpiarcadena($_POST["direccion"]);
    $cod_postal = limpiarcadena($_POST["cod_postal"]);
    $email = limpiarcadena($_POST["email"]);

    // Atributos de pacientes
    $id_obra_social = limpiarcadena($_POST["obra_social"]);
    $id_grupo_sanguineo = limpiarcadena($_POST["grupo_sanguineo"]);
    $num_seguro_social = limpiarcadena($_POST["num_seg_social"]);
    
    // Atributos no definidos adecuadamente aun
    $id_rol_persona = limpiarcadena(3);
    // $id_vacacion = limpiarcadena(1);

    // Validar input del nuevo municipio dentro del modal
    if($_REQUEST["new_municipio"]!=""){
        
        $new_municipio = $_REQUEST["new_municipio"];
        $id_departamento = $_REQUEST["departamento_empleado"];
        $municipio = guardarMunicipio($new_municipio, $id_departamento);
    }

    
    // Guardar registro en personas y obtener el id_persona
    $id_persona = guardarPersona($nombre, $cuit, $dni, $municipio, $direccion, $email, $cod_postal, $id_rol_persona);

    // Guardando paciente
    $id_paciente = guardarPaciente($id_persona, $id_obra_social, $id_grupo_sanguineo, $num_seguro_social);
    
    return $id_paciente;
};


function borrarPaciente(){
    $id_empleado = $_REQUEST["id_persona"];
    // echo $id_empleado;
    $response = deleteEmpleado($id_empleado);
    return $response;
}

// Para editar paciente
function editarPaciente(){
    $id_persona = limpiarcadena($_POST["id_persona"]);
    $id_paciente = limpiarcadena($_POST["id_paciente"]);
    // $id_empleado = limpiarcadena($_POST["id_empleado"]);
    $nombre = limpiarcadena($_POST["nombre"]);
    $cuit = limpiarcadena($_POST["cuit"]);
    $dni = limpiarcadena($_POST["dni"]);
    $municipio = limpiarcadena($_POST["municipio"]);
    $direccion = limpiarcadena($_POST["direccion"]);
    $cod_postal = limpiarcadena($_POST["cod_postal"]);
    $email = limpiarcadena($_POST["email"]);
    // $id_tipo_empleado = limpiarcadena($_POST["tipo_empleado"]);

    // Atributos de pacientes
    $id_obra_social = limpiarcadena($_POST["obra_social"]);
    $id_grupo_sanguineo = limpiarcadena($_POST["grupo_sanguineo"]);
    $num_seguro_social = limpiarcadena($_POST["num_seg_social"]);

    // $id_vacacion = limpiarcadena(2);
    // Validar input del nuevo municipio dentro del modal
    if($_REQUEST["new_municipio"]!=""){
            
        $new_municipio = $_REQUEST["new_municipio"];
        $id_departamento = $_REQUEST["departamento_empleado"];
        $municipio = guardarMunicipio($new_municipio, $id_departamento);
    }

    $updatedPersona = updatePersona($id_persona, $nombre, $cuit, $dni, $municipio, $direccion, $email, $cod_postal);

    // $updatedEmpleado = updateEmpleado($id_empleado, $id_persona, $id_tipo_empleado, $id_vacacion);
    $updatedPaciente = updatePacientes($id_paciente, $id_obra_social, $id_grupo_sanguineo, $num_seguro_social);

    if($updatedPersona != false && $updatedPaciente != false){
        // header("Location:show.php?id=$updatedEmpleado&msg=actSucc");
        return $updatedPaciente;
    }else{
        echo false;
    }

}


?>