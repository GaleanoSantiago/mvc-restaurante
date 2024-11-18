<?php

require_once "./../../models/Pacientes.php";

// function lastId() {
//     return lastIdModel();
// }

function indexPacientes() {
    $result = indexPacientesModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}


// Guardar Paciente
function guardarPaciente($id_persona, $id_obra_social, $id_grupo_sanguineo, $num_seguro_social) {
    
    $id = insertarPacienteModel($id_persona, $id_obra_social, $id_grupo_sanguineo, $num_seguro_social);
    if ($id != false) {
        return $id;
    } else {
        return "Error al almacenar paciente";

    }
}

// Para mostrar Paciente
function showPaciente($id) {
    $result = showPacienteModel($id);
    if ($result != false) {
        return $result;
    } else {
        // header("Location:show.php?id=".$id);
        return false;

    }
}

// Para actualizar medico
function updatePacientes($id, $id_obra_social, $id_grupo_sanguineo, $num_seguro_social) {
    $id = updatePacientesModel($id, $id_obra_social, $id_grupo_sanguineo, $num_seguro_social);
    // echo $id;
    // die();
    if ($id != false) {
        return $id;
    } else {
        return false;
    }
}
