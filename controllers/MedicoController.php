<?php

require_once "./../../models/Medicos.php";

function indexMedicos() {
    $result = indexMedicosModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function contMedicosPorEspecialidad() {
    $result = contMedicosPorEspecialidadModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}
function contMedicosPorEspecialidad2() {
    $result = contMedicosPorEspecialidadModel2();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

function MedicosPorEspecialidad() {
    $result = MedicosPorEspecialidadModel();
    if ($result) {
        return $result;
    } else {
        return false;
    }
}

// Guardar Medico
function guardarMedico($id_empleado, $num_colegiado, $id_especialidad, $id_situacion_revista) {
    $id = insertarMedico($id_empleado, $num_colegiado, $id_especialidad, $id_situacion_revista);
    return $id;
}

// Para mostrar Medico
function showMedico($id) {
    $result = showMedicoModel($id);
    if ($result != false) {
        return $result;
    } else {
        // header("Location:show.php?id=".$id);
        return false;

    }
}

// para actualizar medico
function updateMedico($id_medico, $id_empleado, $numero_colegiado, $id_especialidad, $id_situacion_revista) {
    $id = updateMedicosModel($id_medico, $id_empleado, $numero_colegiado, $id_especialidad, $id_situacion_revista);
    // echo $id;
    // die();
    if ($id != false) {
        return $id;
    } else {
        return false;
    }
}

?>