<?php
require_once("./../../controllers/EmpleadoController.php");
require_once("./../../controllers/PacienteController.php");
require_once("./../../controllers/ConsultaController.php");
require_once("./../../controllers/AuxiliarController.php");
require_once("./../../controllers/DiagnosticoController.php");
// Functions de pacientes, para acceder a la funcion de insertar paciente
require_once("./../pacientes/functions.php");


if(isset($_REQUEST['insertConsulta'])){
    $id = insertarConsulta();
    if($id != false){
        header("Location:create.php?msg=consGuard");

    }
}elseif(isset($_REQUEST["deleteConsulta"])){
    $response = borrarConsulta();
    if($response){
        header("Location:index.php?msg=elimSucc");
    }

}elseif(isset($_REQUEST["cambiarEstado"])){

    $response = cambiarEstadoConsulta();
    
    if($response){
        if(isset($_REQUEST["filtroMedico"])){

            if(isset($_REQUEST["fechaFiltro"])){

                $fecha = $_REQUEST["fechaFiltro"];
                header("Location:consultas_medico.php?fecha=$fecha");
            }else{  
                header("Location:consultas_medico.php");
            }
        }else{
            header("Location:index.php");

        }

    }
}elseif(isset($_REQUEST["insertDiagnostico"])){
    
    $response = insertarDiagnostico();
    if($response){
        if(isset($_REQUEST["fechaFiltro"])){

            $fecha = $_REQUEST["fechaFiltro"];
            header("Location:consultas_medico.php?msg=diagnosticoSuccs&fecha=$fecha");
        }else{  
            header("Location:consultas_medico.php?msg=diagnosticoSuccs");
        }
    }
}elseif(isset($_REQUEST["updateDiagnostico"])){
    
    $response = actualizarDiagnostico();
    if($response){
        if(isset($_REQUEST["fechaFiltro"])){

            $fecha = $_REQUEST["fechaFiltro"];
            header("Location:consultas_medico.php?msg=actSuccs&fecha=$fecha");
        }else{  
            header("Location:consultas_medico.php?msg=actSuccs");
        }
    }else{
        echo "error";
    }

}elseif(isset($_GET['id_consulta'])){
    
    $idConsulta = $_GET['id_consulta'];
    echo fetchDiagnosticoData($idConsulta);

}elseif(isset($_REQUEST["deleteDiagnostico"])){
    $response = borrarDiagnostico();
    if($response){
        if(isset($_REQUEST["fechaFiltro"])){

            $fecha = $_REQUEST["fechaFiltro"];
            header("Location:consultas_medico.php?msg=elimSuccs&fecha=$fecha");
        }else{  
            header("Location:consultas_medico.php?msg=elimSuccs");
        }
    }else{
        echo "error";
    }
}




function insertarConsulta(){
    $id_paciente = $_REQUEST["id_paciente"];
    $id_medico = $_REQUEST["id_medico"];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    // Combina la fecha y hora en un formato compatible con SQL
    $fecha_hora = date('Y-m-d H:i:s', strtotime($fecha . ' ' . $hora));

    if($id_paciente==="new_paciente"){
    
        $id_paciente = limpiarcadena(insertarPaciente());
    
    }
    
    $id_consulta = guardarConsulta($fecha_hora, $id_medico, $id_paciente);

    return $id_consulta;

}


// Borrar consulta

function borrarConsulta(){
    $id = $_REQUEST["id_consulta"];
    $response = deleteConsulta($id);
    return $response;
}


// Para cambiar el estado de consulta
function cambiarEstadoConsulta(){
    $id_consulta = $_REQUEST["id_consulta"];
    $id_estado_consulta = $_REQUEST["estado_consulta"];

    $response = updateEstadoConsulta($id_estado_consulta, $id_consulta);
    return $response;
}


// Para insertar diagnosticos
function insertarDiagnostico(){
    $id_consulta = $_REQUEST["id_consulta"];
    $descripcion = $_REQUEST["descripcion_diagnostico"];
    $notas_adicionales = $_REQUEST["notas_adicionales"];

    $response = guardarDiagnostico($id_consulta, $descripcion, $notas_adicionales);
    return $response;

}


// Funcion para los diagnosticos

function fetchDiagnosticoData($idConsulta) {
    $diagnostico = showDiagnostico($idConsulta);

    if ($diagnostico) {
        foreach($diagnostico as $diag){

            return json_encode([
                'success' => true,
                'id_consulta' => $diag['id_consulta'],
                'descripcion_diagnostico' => $diag['descripcion_diagnostico'],
                'notas_adicionales' => $diag['notas_adicionales']
            ]);
        }
    } else {
        return json_encode(['success' => false]);
    }
}

function actualizarDiagnostico(){
    $id_consulta = $_REQUEST["id_consulta"];
    $descripcion = $_REQUEST["descripcion_diagnostico"];
    $notas_adicionales = $_REQUEST["notas_adicionales"];

    $response = updateDiagnostico($id_consulta, $descripcion, $notas_adicionales);
    return $response;

}

// Borrar consulta

function borrarDiagnostico(){
    $id = $_REQUEST["id_consulta"];
    $response = deleteDiagnostico($id);
    return $response;
}

?>
